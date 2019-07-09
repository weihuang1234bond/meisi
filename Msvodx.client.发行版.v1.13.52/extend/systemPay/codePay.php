<?php
/**
 * 码支付 Msvodx支付插件
 * Date:    2017/12/27
 * Author:  $Dreamer
 *
 * 接口 https://codepay.fateqq.com/run_app.html?userID=用户ID&money=金额&tag=金额备注  [可唤醒支付宝app]
 */

namespace systemPay;

use think\Db;
use think\Exception;

if (isset($___setPayment) && $___setPayment == true) {
    $curIndex = isset($payLists) ? count($payLists) : 0;
    $payLists[$curIndex] = [
        'pay_code' => basename(__FILE__, '.php'),
        'pay_name' => 'MsvodX码支付',
        'description' => '由MsvodX官方整合的第三方支付接口',
        'version' => '1.0',
        'config' => [
            ['name' => 'merchant_id', 'type' => 'text', 'value' => '', 'desc' => '商户id'],
            ['name' => 'key', 'type' => 'text', 'value' => '', 'desc' => '码支付通信密钥'],
            ['name' => 'min_money', 'type' => 'text', 'value' => '0.01', 'desc' => '最低支付金额'],
        ]
    ];
    return;
}

include_once dirname(__FILE__) . "/codePay/lib/codepay_core.function.php";

class codePay
{

    private $config = [
        'id' => -1,
        'key' => '',
        'chart' => 'utf-8',
        'act' => 0,
        'page' => 3,
        'style' => 1,
        'outTime' => 360,
        'pay_type' => 1,            //启用支付宝官方接口 会员版授权后生效
        'return_url' => '',         //同步通知地址
        'notify_url' => '',         //异步通知地址
    ];
    private $gateWay = '';
    private $minMoney=0.01;

    function __construct()
    {
        $config=$paymentInfo=Db::name('payment')->where(array('pay_code'=>'codePay'))->find();
        $config=json_decode($config['config'],true);
        foreach ($config as  $v){
            switch ($v['name']){
                case 'merchant_id':
                    $this->config['id']=$v['value'];
                    break;
                case 'key':
                    $this->config['key']=$v['value'];
                    break;
                case 'min_money':
                    $this->minMoney=$v['value'];
                    break;
            }
        }
        $this->config['notify_url'] = url('PayNotify/codepayNotify');
        $this->gateWay = $this->getApiHost() . 'creat_order/?';

        if ($this->config['id'] <= 0 || empty($this->config['key'])) {
            throw new Exception('码支付配置参数不正确');
        }

    }

    /**
     * 生成支付二维码
     * @param $params
     * @return array result:0 成功，其他则表示生成失败(msg为失败原因)
     */
    function createPayQrcode($params)
    {
        set_time_limit(30);

        if (!isset($params['price']) || !isset($params['orderSn'])) return ['result' => 401, 'msg' => '订单价格和订单号不能为空.'];
        $price = (float)$params['price'];
        if($price<$this->minMoney) return  ['result' => 401, 'msg' => '当前支付最低支付额为'.$this->minMoney.'元.'];

        $this->config['price'] = $price;
        $this->config['pay_id'] = $params['orderSn'];
        $payChannel = isset($params['payChannel']) ? $params['payChannel'] : 'aliPay';    //1:支付宝，2：QQ，3：微信
        $payChannel=$this->getChannelId($payChannel);


        $requestData = $this->config;
        $requestData['type'] = $payChannel;
        $requestData['param']=isset($params['needReturnParam'])?$params['needReturnParam']:'';
        $requestData = paramFilter($requestData);
        $requestData = argSort($requestData);
        $paramsStr = createLinkstring($requestData);
        $requestData['sign'] = md5Sign($paramsStr, $this->config['key']);
        $url = $this->gateWay . createLinkstringUrlencode($requestData);

        try{
            $response = json_decode(file_get_contents($url), true);
        }catch (\Exception $err){
            $respData = [
                'result' => 404,
                'msg' => '与支付服务器通信出错，请稍候再试！'
            ];
            return $respData;
        }
        $response = argSort($response);
        #dump($response);

        if ($response['status'] == 0) {
            $respData = [
                'result' => 0,
                'endTime' => $response['endTime'],
                'realPayPrice' => $response['money'],       //实际付款金额
                'thirdOrderId' => $response['trade_no'],    // 'trade_no'  'order_id'
                'orderSn' => $response['pay_id'],
                'price' => $response['price'],              //订单原价
                'qrcode' => $response['qrcode'],
                'tag' => $response['tag'],
                'payName'=>$this->getChannelNameById($payChannel)
            ];
            if(is_mobile() && $payChannel==1) {
                $respData['run_app_url']="https://codepay.fateqq.com/run_app.html?userID=".$this->config['id']."&money=".$respData['realPayPrice']."&tag=";
            }
        } else {
            $respData = [
                'result' => 501,
                'msg' => $response['msg']
            ];
        }

        return $respData;
    }


    /**
     * 验证通知数据的密钥合法性
     * @param $data
     * @return bool  true:合法，false:非法
     */
    function verifyNotifyData($data)
    {
        if (!isset($data['sign']) || empty($data) || !is_array($data)) return false;
        $data = filterArray($data);
        argSort($data);
        $respSign=$data['sign'];
        unset($data['sign']);
        $paramsStr = createLinkstring($data);
        $sign = md5Sign($paramsStr, $this->config['key']);
        //dump($sign);

        return $respSign == $sign ? true : false;
    }


    //获取API接口的域名
    function getApiHost()
    {
        $mainApi = 1;
        $codePay_api_url = "";
        $codePay_api_url .= is_HTTPS() ? "https://" : 'http://';
        $codePay_api_url .= $mainApi ? "codepay.fateqq.com:" : 'api.fateqq.com:'; //应急预案
        $codePay_api_url .= is_HTTPS() ? "51888" : '52888';
        $codePay_api_url .= '/';
        return $codePay_api_url;
    }


    /**
     * 根据支付code取对应的id
     * @param $payCode
     * @return int
     */
    function getChannelId($payCode){
        $payCode=strtolower($payCode);
        switch ($payCode){
            case 'wxpay':
                return 3;
                break;
            case 'qqpay':
                return 2;
                break;
            case 'alipay':
                return 1;
                break;
            default:
                return 1;
        }
    }

    function getChannelNameById($id){
        switch ($id){
            case 3:
                return '微信';
                break;
            case 2:
                return 'QQ钱包';
                break;
            case 1:
                return '支付宝';
                break;
            default:
                return 1;
        }
    }

}
