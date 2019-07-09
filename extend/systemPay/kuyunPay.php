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
class kuyunPay{
    private $config = [
        'business' => '',         //商户id
        'return_url' => '',         //同步通知地址
        'notify_url' => '',         //异步通知地址
        'key' => '',
        'min_money' => '',
    ];
    function __construct()
    {
        $config=$paymentInfo=Db::name('payment')->where(array('pay_code'=>'kuyunPay'))->find();
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
                $fxpay = (request()->isMobile() == 'true' ) ? 'zfbwap':'zfbpc';
                break;
            case "wxPay":
                $fxpay = (request()->isMobile() == 'true' ) ? 'wxwap':'wxsm';
                break;
        }
        if(!isset($params['orderSn'])||!isset($params['price'])) return $this->returnResult('支付订单信息不完整，请重试!');
        $price = (float)$params['price'];
        if($price< $this->config['min_money']) return  ['result' => 401, 'msg' => '当前支付最低支付额为'. $this->config['min_money'].'元.'];
        error_reporting(E_ALL & ~E_NOTICE);
        date_default_timezone_set('Asia/Shanghai');
        header("Content-type: text/html; charset=utf-8");

        $fxgetway = "http://www.yukupay.com/Pay"; //网关
        //$fxgetway = "http://demo.ykpays.com/Pay"; //网关

        $data = array(
            "fxid" => $this->config['business'], //商户号
            "fxddh" => $params['orderSn'], //商户订单号
            "fxdesc" => "VIP基础服务", //商品名
            "fxfee" => $price, //支付金额 单位元
            "fxattch" => 'VIP基础服务', //附加信息
            "fxnotifyurl" =>  $this->config['notify_url'], //异步回调 , 支付结果以异步为准
            "fxbackurl" =>  $this->config['return_url'], //同步回调 不作为最终支付结果为准，请以异步回调为准
            "fxpay" => $fxpay, //支付类型 此处可选项以网站对接文档为准 微信公众号：wxgzh   微信H5网页：wxwap  微信扫码：wxsm   支付宝H5网页：zfbwap  支付宝扫码：zfbsm 等参考API
            "fxip" => $this->getClientIP(0, true), //支付端ip地址
            'fxbankcode'=>'',
            'fxfs'=>'',
        );

        $data["fxid"] = '2018103';
        $data["fxsign"] = md5($data["fxid"] . $data["fxddh"] . $data["fxfee"] . $data["fxnotifyurl"] . $this->config['key']); //加密
        $data["fxsign"] = md5($data["fxid"] . $data["fxddh"] . $data["fxfee"] . $data["fxnotifyurl"] . 'oUmSSexXiZZWfoNTLHJguaVUjXtCwaml'); //加密
        $r = $this->getHttpContent($fxgetway, "POST", $data);
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
        $key = "{$this->config['key']}";
        $fxid = $returnArray['fxid']; //商户编号
        $fxddh = $returnArray['fxddh']; //商户订单号
        $fxorder = $returnArray['fxorder']; //平台订单号
        $fxdesc = $returnArray['fxdesc']; //商品名称
        $fxfee = $returnArray['fxfee']; //交易金额
        $fxattch = $returnArray['fxattch']; //附加信息
        $fxstatus = $returnArray['fxstatus']; //订单状态
        $fxtime = $returnArray['fxtime']; //支付时间
        $fxsign = $returnArray['fxsign']; //md5验证签名串
        //获取商户编号对应key
        $mysign = md5($fxstatus . $fxid . $fxddh . $fxfee . $key); //验证签名
        return ($mysign == $fxsign)? true : false;
    }

    function getHttpContent($url, $method = 'GET', $postData = array()) {
        $data = '';
        $user_agent = $_SERVER ['HTTP_USER_AGENT'];
        $header = array(
            "User-Agent: $user_agent"
        );
        if (!empty($url)) {
            try {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_HEADER, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_TIMEOUT, 30); //30秒超时
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
                //curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_jar);
                if(strstr($url,'https://')){
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // https请求 不验证证书和hosts
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
                }

                if (strtoupper($method) == 'POST') {
                    $curlPost = is_array($postData) ? http_build_query($postData) : $postData;
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
                }
                $data = curl_exec($ch);
                curl_close($ch);
            } catch (Exception $e) {
                $data = '';
            }
        }
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
