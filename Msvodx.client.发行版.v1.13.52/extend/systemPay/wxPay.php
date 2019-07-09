<?php

namespace systemPay;

use think\Exception;
use think\Request;
use Yansongda\Pay\Pay;

/**
 * 微信支付 Msvodx支付插件
 * Date:    2018/03/08
 * Author:  $Dreamer
 */
class wxPay extends BasePay
{

    private $wxConfig = null;
    private $request;

    /**
     * 初始配置
     * wxPay constructor.
     */
    public function __construct()
    {
        $this->request = Request::instance();
        if (($rs = $this->driver('wxPay')) === true) {
            $this->wxConfig['wechat'] = [
                'appid' => $this->config['appid'],
                'app_id' => $this->config['appid'],
                'mch_id' => $this->config['mch_id'],
                'key' => $this->config['key'],
                'notify_url' => $this->config['notify_url'],
            ];
        } else {
            return $this->returnResult($rs['msg']);
        }
    }

    function get_client_ip($type = 0,$adv=false) {
        $type       =  $type ? 1 : 0;
        static $ip  =   NULL;
        if ($ip !== NULL) return $ip[$type];
        if($adv){
            if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $arr    =   explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                $pos    =   array_search('unknown',$arr);
                if(false !== $pos) unset($arr[$pos]);
                $ip     =   trim($arr[0]);
            }elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
                $ip     =   $_SERVER['HTTP_CLIENT_IP'];
            }elseif (isset($_SERVER['REMOTE_ADDR'])) {
                $ip     =   $_SERVER['REMOTE_ADDR'];
            }
        }elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ip     =   $_SERVER['REMOTE_ADDR'];
        }
        // IP地址合法验证
        $long = sprintf("%u",ip2long($ip));
        $ip   = $long ? array($ip, $long) : array('0.0.0.0', 0);
        return $ip[$type];
    }

    /**
     * 创建支付代码
     * @param $params
     * @return array
     */
    public function createPayCode($params)
    {
        if (($rs = $this->checkCreatePyaCodeParams($params)) === true) {
            $pay = new Pay($this->wxConfig);
            $config_biz = [
                'out_trade_no' => $params['orderSn'],
                'total_fee' => $params['price'] * 100,    //单位：分
                'body' => '购买VIP/充值金币',
            ];
            if(!empty($this->config['exchange_rate'])){
                $config_biz['total_fee' ] = $config_biz['total_fee' ] *$this->config['exchange_rate'];
                $config_biz['total_fee' ] =ceil($config_biz['total_fee' ]);
            }
            $gateway = $this->request->isMobile() ? (is_wechat() ? 'mp' : 'wap') : 'scan';
            if($gateway=='mp'){
                $wxOpenid=get_user_wechat_openid($this->config['appid'],$this->config['secret_key']);
                if(!$wxOpenid) return $this->returnResult('获取openid失败，请重试！');
                $config_biz['openid']=$wxOpenid;    //test open id oQgWXwjiRGyTbfYUcvsGwstHGAUM
            }
            if($gateway=='wap'){
                $config_biz['scene_info']= '{"h5_info": {"type":"Wap","wap_url": "http://' . $_SERVER["HTTP_HOST"] . '","wap_name": "pay"}}';
                $config_biz['spbill_create_ip'] = (string)$this->get_client_ip(0, true);
            }
            $payHtml = $pay->driver('wechat')->gateway($gateway)->pay($config_biz);
            if($gateway=='wap') {
                header('Location:'.$payHtml);exit;
            }
            $returnData= [
                'result' => 0,
                'payName' => '微信',
                'qrcode' => $gateway=='scan'?url('api/createQrCode', ['content' => base64_encode($payHtml)]):null,
                'isJump' => 0,
                'payHtml' => $payHtml,
                'price' => $params['price'],
            ];


            if($gateway=='mp') {
                $afterPayJumpUrl=url('member/member');
                //jsapi pay html code
                $_html=<<<dreamer
                
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                    <meta content="telephone=no" name="format-detection">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
                    <script type="text/javascript" src="/static/layer_mobile/layer.js"></script>
                </head>
                <body>
                <script type="text/javascript">
                    layer.open({type: 2,content:"正在支付，请稍候……"});
                    
                    function onBridgeReady(){
                        WeixinJSBridge.invoke(
                            'getBrandWCPayRequest', {
                                "appId":"{$payHtml['appId']}",     //公众号名称，由商户传入
                                "timeStamp":"{$payHtml['timeStamp']}",         //时间戳，自1970年以来的秒数
                                "nonceStr":"{$payHtml['nonceStr']}", //随机串
                                "package":"{$payHtml['package']}",
                                "signType":"{$payHtml['signType']}",         //微信签名方式：
                                "paySign":"{$payHtml['paySign']}" //微信签名
                            },
                            function(res){
                                if(res.err_msg == "get_brand_wcpay_request:ok" ) {
                                    layer.open({
                                                content: '支付成功！'
                                                ,skin: 'msg'
                                                ,time: 2
                                                ,end:function(){location.href="{$afterPayJumpUrl}";}
                                              });
                                }else{
                                    layer.open({
                                                content: '支付未能成功，请重试！'
                                                ,skin: 'msg'
                                                ,time: 2
                                                ,end:function(){history.go(-1);}
                                              });
                                }     // 使用以上方式判断前端返回,微信团队郑重提示：res.err_msg将在用户支付成功后返回    ok，但并不保证它绝对可靠。
                            }
                        );
                    }
                    if (typeof WeixinJSBridge == "undefined"){
                        if( document.addEventListener ){
                            document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
                        }else if (document.attachEvent){
                            document.attachEvent('WeixinJSBridgeReady', onBridgeReady);
                            document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
                        }
                    }else{
                        onBridgeReady();
                    }
                </script>
                </body>
                </html>
dreamer;
                $returnData['isJump']=1;
                $returnData['payHtml']=$_html;
            }

            return $returnData;

        } else {
            return $rs;
        }
    }

    /*demo 回调数据
             <xml><appid><![CDATA[wx1e076868fbfb4195]]></appid>
        <bank_type><![CDATA[CFT]]></bank_type>
        <cash_fee><![CDATA[1]]></cash_fee>
        <fee_type><![CDATA[CNY]]></fee_type>
        <is_subscribe><![CDATA[Y]]></is_subscribe>
        <mch_id><![CDATA[1458366102]]></mch_id>
        <nonce_str><![CDATA[VyhKIGLHjaFekJHt]]></nonce_str>
        <openid><![CDATA[oQgWXwjiRGyTbfYUcvsGwstHGAUM]]></openid>
        <out_trade_no><![CDATA[2018030915064794753]]></out_trade_no>
        <result_code><![CDATA[SUCCESS]]></result_code>
        <return_code><![CDATA[SUCCESS]]></return_code>
        <sign><![CDATA[98112C56F6D9ACFB8892CB8D183F1835]]></sign>
        <time_end><![CDATA[20180309150924]]></time_end>
        <total_fee>1</total_fee>
        <trade_type><![CDATA[NATIVE]]></trade_type>
        <transaction_id><![CDATA[4200000092201803095533389708]]></transaction_id>
        </xml>
     */

    /**
     * 回调数据合法性验证
     * @param $data
     */
    public function verify()
    {
        $data=file_get_contents("php://input");
        $payer = new Pay($this->wxConfig);
        /*  打印出xml对应的数组信息
            libxml_disable_entity_loader(true);
            dump(json_decode(json_encode(simplexml_load_string($data, 'SimpleXMLElement', LIBXML_NOCDATA), JSON_UNESCAPED_UNICODE), true));
        */
        try {
            if($notifyData=$payer->driver('wechat')->gateway('mp')->verify($data)){
                file_put_contents(ROOT_PATH . 'wxpay_notify.txt', "收到来自支付宝的异步通知\r\n", FILE_APPEND);
                file_put_contents(ROOT_PATH . 'wxpay_notify.txt', '订单号：' . $notifyData['out_trade_no'] . "\r\n", FILE_APPEND);
                file_put_contents(ROOT_PATH . 'wxpay_notify.txt', '订单金额：' . $notifyData['total_fee'] . "\r\n\r\n", FILE_APPEND);
                dump($notifyData);
                return $notifyData;
            }
            file_put_contents(ROOT_PATH . 'wxpay_notify.txt', "收到异步通知\r\n", FILE_APPEND);
            return false;
        }catch (\Exception $exception){
            file_put_contents(ROOT_PATH . 'wxpay_notify.txt', "创建验证失败:".$exception->getMessage()."\r\n", FILE_APPEND);
            file_put_contents(ROOT_PATH . 'wxpay_notify.txt', $data."\r\n", FILE_APPEND);
            return false;
        }
    }
}