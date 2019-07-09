<?php
/**
 *  Msvodx支付插件
 * Date:    2018/06/28
 * Author:  $frs
 *
 */

namespace systemPay;

use think\Db;
use think\Exception;
class yunyiPay{
    private $config = [
        'business' => '',         //商户id
        'return_url' => '',         //同步通知地址
        'notify_url' => '',         //异步通知地址
        'key' => '',
        'min_money' => '',
    ];
    function __construct()
    {
        $config=$paymentInfo=Db::name('payment')->where(array('pay_code'=>'yunyiPay'))->find();
        $config=json_decode($config['config'],true);
        foreach ($config as  $v){
            switch ($v['name']){
                case 'business':
                    $this->config['business']=$v['value'];
                    break;
                case 'key':
                    $this->config['key']=$v['value'];
                    break;
                case 'min_money':
                    $this->config['min_money']=$v['value'];
                    break;
                case 'return':
                    $this->config['return_url']=$v['value'];
                    break;
                case 'notify_url':
                    $this->config['notify_url']=$v['value'];
                    break;
            }
        }
    }

    /**
     * 订单创建
     * @param Request $request
     */
    public function createPayQrcode($params)
    {
        switch ($params['payChannel']) {
            case "aliPay":
                $paytype = '1';
                break;
            case "wxPay":
                $paytype = '2';
                break;
        }
        if(!isset($params['orderSn'])||!isset($params['price'])) return $this->returnResult('支付订单信息不完整，请重试!');
        $price = (float)$params['price'];
        if($price< $this->config['min_money']) return  ['result' => 401, 'msg' => '当前支付最低支付额为'. $this->config['min_money'].'元.'];
        error_reporting(E_ALL & ~E_NOTICE);
        date_default_timezone_set('Asia/Shanghai');
        header("Content-type: text/html; charset=utf-8");


        /**************************请求参数**************************/

        $gatewayurl = "http://gateway.feuzl.cn"; //网关


        //需http://格式的完整路径，不能加?id=123这类自定义参数
        $notify_url =  $this->config['notify_url'];
        //需http://格式的完整路径，不能加?id=123这类自定义参数

        //页面跳转同步通知页面路径
        $return_url =  $this->config['return_url'];
        //需http://格式的完整路径，不能加?id=123这类自定义参数，不能写成http://localhost/

        //商户订单号
        $out_trade_no = $params['orderSn'];
        //商户网站订单系统中唯一订单号，必填

        //支付方式
        $alipaytype = 'aa';
        //key
        $key=$this->config['key'];
        //id
        $id=$this->config['business'];

        //商品名称
        $name = 'VIP基础服务';
        //付款金额
        $money = $price;
        //站点名称
        //$sitename = 'SAF支付测试站点';
        //签名sign
        $sign= md5(floatval($money) . trim($out_trade_no) . $key);
        /************************************************************/
        $param="sdk=&record={$out_trade_no}&money={$money}&type=html&notify_url={$notify_url}&refer={$return_url}&sign={$sign}&paytype={$paytype}&id={$id}&alipaytype={$alipaytype}";

        $r = $this->topay($gatewayurl,$param,$type,$return_url);



        //$fxgetway = "http://demo.ykpays.com/Pay"; //网关
        $backr = $r;
        $r = json_decode($backr, true); //json转数组
        if ($r["status"] != 1) {
            return [
                'msg'=>$r["error"],
                'result'=>2,
            ];
            exit;
        }
        return [
            'result'=>0,
            'payName'=>'kuyun',
            'isJump'=>1,
            'payHtml'=> $r['payurl']
        ];




    }

    /**
     * 验证通知数据的密钥合法性
     * @param $returnArray
     * @return bool  true:合法，false:非法
     */
    function verify($returnArray)
    {
        $key=$returnArray['key'];
        //支付金额
        $money=$returnArray['money'];
        //平台交易号
        $trade_no=$returnArray['order'];
        //商户订单号
        $out_trade_no=$returnArray['record'];
        //签名
        $sign=$returnArray['sign'];

        //生成签名
        $sign_index = md5(floatval($money) . trim($out_trade_no) . $key);
        return ($sign_index == $sign) ? true : false;
    }

    function topay($url,$data,$type,$return_url){
        $data=$this->getHtml($url,$data);
        exit($data);
    }

    function getHtml($url,$data=''){
        $ch = curl_init($url) ;
        $header[]= 'Mozilla/5.0 (Linux; U; Android 7.1.2; zh-cn; GiONEE F100 Build/N2G47E) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30';
        if(!empty($data)){
            curl_setopt($ch, 47, 1);
            curl_setopt($ch, 10015, $data);
        }
        curl_setopt($ch,10023,$header);
        curl_setopt($ch, 64, FALSE); // 对认证证书来源的检查
        curl_setopt($ch, 81, FALSE); // 从证书中检查SSL加密算法是否存在
        curl_setopt($ch, 19913, true) ;
        curl_setopt($ch, 19914, true) ;
        curl_setopt($ch, 52,1);
        curl_setopt($ch, 13, 60);
        ob_start();
        @$data = curl_exec($ch);
        ob_end_clean();
        curl_close($ch);
        return $data;
    }

    function getClientIP($type = 0, $adv = false) {
        global $ip;
        $type = $type ? 1 : 0;
        if ($ip !== NULL)
            return $ip[$type];
        if ($adv) {
            if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                $pos = array_search('unknown', $arr);
                if (false !== $pos)
                    unset($arr[$pos]);
                $ip = trim($arr[0]);
            }elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (isset($_SERVER['REMOTE_ADDR'])) {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
        } elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        // IP地址合法验证
        $long = sprintf("%u", ip2long($ip));
        $ip = $long ? array(
            $ip,
            $long) : array(
            '0.0.0.0',
            0);
        return $ip[$type];
    }

}
