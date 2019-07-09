<?php

namespace systemPay;

use function GuzzleHttp\default_ca_bundle;
use think\Db;
use think\Request;
use Yansongda\Pay\Pay;

/**
 * 微信支付 Msvodx支付插件
 * Date:    2018/03/08
 * Author:  $Dreamer
 */
class paypal extends BasePay
{
    private $aliConfig=[];
    private $request;

    public function __construct()
    {
        $this->request=Request::instance();
        if (($rs = $this->driver('paypal')) === true) {
            $this->config['currency_code'] = empty($this->config['currency_code']) ? 'USD':$this->config['currency_code'];
            $this->aliConfig['paypal'] = [
                'business' => $this->config['business'],
                'notify_url' => $this->config['notify_url'],
                'return' => $this->config['return'],
                'cancel_return' => $this->config['cancel_return'],
                'currency_code' => $this->config['currency_code']
            ];
        } else {
            return  $this->returnResult($rs['msg']);
        }
    }

    /**
     * 创建支付代码
     * @param $params
     * @return array|mixed  执行正确返回html代码，否则返回相应的数组信息
     */
    public function createPayCode($params){
        if(!isset($params['orderSn'])||!isset($params['price'])) return $this->returnResult('支付订单信息不完整，请重试!');
        if($params['price']<$this->config['min_money']) return $this->returnResult('当前支付最低支付额为'.$this->config['min_money'].'元.');
        $payHtml = <<<dreamer
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                    <meta content="telephone=no" name="format-detection">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
           
                </head>
                <style>

@-webkit-keyframes g {
	0% {
	-webkit-transform:rotate(0deg)
}
to {
	-webkit-transform:rotate(359deg)
}
}@-o-keyframes g {
	0% {
	-o-transform:rotate(0deg)
}
to {
	-o-transform:rotate(359deg)
}
}@keyframes g {
	0% {
	-webkit-transform:rotate(0deg);
	-o-transform:rotate(0deg);
	transform:rotate(0deg)
}
to {
	-webkit-transform:rotate(359deg);
	-o-transform:rotate(359deg);
	transform:rotate(359deg)
}
}
.spinner .loader,.spinner .spinnerImage {
	height:100px;
	width:100px;
	position:absolute;
	top:0;
	left:50%;
	opacity:1;
	filter:alpha(opacity=100)
}
.spinner .loader {
	margin:0 0 0 -55px;
	background-color:transparent;
	-webkit-animation:g .7s infinite linear;
	-o-animation:g .7s infinite linear;
	animation:g .7s infinite linear;
	border-left:5px solid #cbcbca;
	border-right:5px solid #cbcbca;
	border-bottom:5px solid #cbcbca;
	border-top:5px solid #2380be;
	border-radius:100%
}
.spinner.preloader {
	position:fixed;
	top:0;
	left:0;
	z-index:1000;
	background-color:#fff
}
.spinner {
    height: 100%;
    width: 100%;
    position: fixed;
    z-index: 10;
}
.spinner .spinWrap {
    width: 200px;
    height: 100px;
    position: fixed;
    top: 42%;
    left: 50%;
    margin-left: -98px;
    margin-top: -50px;
}
.spinner .spinnerImage {
    margin: 28px 0 0 -25px;
    background: url(https://www.paypalobjects.com/images/checkout/hermes/icon_ot_spin_lock_skinny.png) no-repeat;
}
.spinner .loadingMessage {
	-webkit-box-sizing:border-box;
	-ms-box-sizing:border-box;
	box-sizing:border-box;
	width:100%;
	margin-top:125px;
	text-align:center;
	z-index:100;
	outline:none
}
.spinner .loader,.spinner .spinnerImage {
	height:100px;
	width:100px;
	position:absolute;
	top:0;
	left:50%;
	opacity:1;
	filter:alpha(opacity=100)
}
.spinner .loader {
	margin:0 0 0 -55px;
	background-color:transparent;
	-webkit-animation:g .7s infinite linear;
	-o-animation:g .7s infinite linear;
	animation:g .7s infinite linear;
	border-left:5px solid #cbcbca;
	border-right:5px solid #cbcbca;
	border-bottom:5px solid #cbcbca;
	border-top:5px solid #2380be;
	border-radius:100%
}

</style>
                <body>
                    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="go_pay"> 
                    <!-- <form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="go_pay">-->
                    <input type="hidden" name="cmd" value="_xclick">
                    <input type="hidden" name="business" value="{$this->config['business']}">
                    <input type="hidden" name="amount" value="{$params['price']}">
                    <input type="hidden" name="notify_url" value="{$this->config['notify_url']}"> 
                    <input type="hidden" name="cancel_return" value="{$this->config['cancel_return']}"> 
                    <input type="hidden" name="return" value="{$this->config['return']}"> 
                    <input type="hidden" name="no_shipping" value="2">
                    <input type="hidden" name="item_name" value="购买VIP/充值金币">
                    <input type="hidden" name="invoice" value="{$params['orderSn']}">
                    <input type="hidden" name="item_number" value="1">
                    <input type="hidden" name="charset" value="UTF-8">
                    <!-- 备注 -->
                    <input type="hidden" name="no_note" value="1"> 
                    <input type="hidden" name="currency_code" value="{$this->config['currency_code']}">
                    <input type="hidden" name="bn" value="IC_Sample">
                    <input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but23.gif" name="submit" alt="Make payments with payPal - it's fast,free and secure!">
                    <img alt="" src="https://www.paypal.com/en_US/i/scr/pixel.gif"  width="1" height="1">
                    </form>
                    <div id="preloaderSpinner" class="preloader spinner" style="/* display: none; */">
                        <div class="spinWrap">
                            <p class="spinnerImage"></p>
                            <p class="loader"></p>
                            <p class="loadingMessage" id="spinnerMessage"></p>
                            <p class="loadingSubHeading" id="spinnerSubHeading"></p>
                        </div>
                    </div>
                    <script type="text/javascript">
                       window.onload = function(){
                            document.getElementById("go_pay").submit();
                        }
                    </script>
                </body>
                </html>
dreamer;

        return [
            'result'=>0,
            'payName'=>'paypal',
            'isJump'=>1,
            'payHtml'=>$payHtml
        ];
    }



    public function verify($data){
        try {
            if($data['payment_status'] == 'Completed'){
                file_put_contents(ROOT_PATH . 'paypal_notify.txt', "收到来paypal的异步通知\r\n", FILE_APPEND);
                file_put_contents(ROOT_PATH . 'paypal_notify.txt', '订单状态：' . $data['payment_status'] . "\r\n", FILE_APPEND);
                file_put_contents(ROOT_PATH . 'paypal_notify.txt', '订单号：' . $data['invoice'] . "\r\n", FILE_APPEND);
                file_put_contents(ROOT_PATH . 'paypal_notify.txt', '订单金额：' . $data['mc_gross'] . "\r\n\r\n", FILE_APPEND);
                return true;
            }else{
                file_put_contents(ROOT_PATH . 'paypal_notify.txt', "收到异步通知\r\n", FILE_APPEND);
                return false;
            }
        }catch (\Exception $exception){
            return false;
        }
    }


}