<?php
/**
 * 鱿鱼支付 Msvodx支付插件
 * Date:    2018/06/11
 * Author:  $frs
 *
 */

namespace systemPay;

use think\Db;
use think\Exception;
class haoaPay{
    private $config = [
        'memberid' => '',         //商户id
        'return_url' => '',         //同步通知地址
        'notify_url' => '',         //异步通知地址
        'key' => '',
        'min_money' => '',
    ];
    function __construct()
    {
        $config=$paymentInfo=Db::name('payment')->where(array('pay_code'=>'haoPay'))->find();
        $config=json_decode($config['config'],true);
        foreach ($config as  $v){
            switch ($v['name']){
                case 'business':
                    $this->config['memberid']=$v['value'];
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
                $bankcode = (request()->isMobile() == 'true' ) ? '904':'903';
                break;
            case "wxPay":
                $bankcode = (request()->isMobile() == 'true' ) ? '912':'902';
                break;
            case "qqPay":
                $bankcode = (request()->isMobile() == 'true' ) ? '905':'908';
                break;
        }
        if(!isset($params['orderSn'])||!isset($params['price'])) return $this->returnResult('支付订单信息不完整，请重试!');
        $price = (float)$params['price'];
        if($price< $this->config['min_money']) return  ['result' => 401, 'msg' => '当前支付最低支付额为'. $this->config['min_money'].'元.'];
        error_reporting(0);
        header("Content-type: text/html; charset=utf-8");
        $pay_memberid = "{$this->config['memberid']}";   //商户ID
        $pay_orderid = "{$params['orderSn']}";    //订单号
        $pay_amount = "{$params['price']}";    //交易金额
        $pay_applydate = date("Y-m-d H:i:s");  //订单时间
        $pay_notifyurl = "{$this->config['notify_url']}";   //服务端返回地址
        $pay_callbackurl = "{$this->config['return_url']}";  //页面跳转返回地址
        $Md5key = "{$this->config['key']}";   //密钥
        $tjurl = "https://www.haoapay.cn/Pay_Index.html";   //提交地址
        $pay_bankcode = $bankcode;   //银行编码
//扫码
        $native = array(
            "pay_memberid" => $pay_memberid,
            "pay_orderid" => $pay_orderid,
            "pay_amount" => $pay_amount,
            "pay_applydate" => $pay_applydate,
            "pay_bankcode" => $pay_bankcode,
            "pay_notifyurl" => $pay_notifyurl,
            "pay_callbackurl" => $pay_callbackurl,
        );
        ksort($native);
        $md5str = "";
        foreach ($native as $key => $val) {
            $md5str = $md5str . $key . "=" . $val . "&";
        }
//echo($md5str . "key=" . $Md5key);
        $sign = strtoupper(md5($md5str . "key=" . $Md5key));
        $native["pay_md5sign"] = $sign;
        $native['pay_attach'] = "1234|456";
        $native['pay_productname'] ='VIP基础服务';

        $payHtml = <<<dreamer
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>支付Demo</title>
<!-- Bootstrap -->
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css"
integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!--[if lt IE 9]>
<script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
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
    background: url('./static/images/icon_ot_spin_lock_skinny.png') no-repeat;
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
<div class="container">
<div class="row" style="margin:15px;0;">
<div class="col-md-12">
    <form class="form-inline" method="post" action="http://www.haoapay.com/Pay_Index.html" id="go_pay">
        <input type="hidden" name="pay_amount" value="{$pay_amount}">
        <input type="hidden" name="pay_applydate" value="{$pay_applydate}">
        <input type="hidden" name="pay_bankcode" value="{$pay_bankcode}">
        <input type="hidden" name="pay_callbackurl" value="{$pay_callbackurl}">
        <input type="hidden" name="pay_memberid" value="{$pay_memberid}">
        <input type="hidden" name="pay_notifyurl" value="{$pay_notifyurl}">
        <input type="hidden" name="pay_orderid" value="{$pay_orderid}">
        <input type="hidden" name="pay_md5sign" value="{$sign}">
        <input type="hidden" name="pay_attach" value="1234|456">
        <input type="hidden" name="pay_productname" value="VIP基础服务">
        <button type="submit" class="btn btn-success btn-lg">扫码支付(金额：{$pay_amount}元)</button>
    </form>
    <div id="preloaderSpinner" class="preloader spinner" style="/* display: none; */">
        <div class="spinWrap">
            <p class="spinnerImage"></p>
            <p class="loader"></p>
            <p class="loadingMessage" id="spinnerMessage"></p>
            <p class="loadingSubHeading" id="spinnerSubHeading"></p>
        </div>
    </div>
</div>
</div>
</div>
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"crossorigin="anonymous"></script>
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

    /**
     * 验证通知数据的密钥合法性
     * @param $returnArray
     * @return bool  true:合法，false:非法
     */
    function verify($returnArray)
    {
        $signs = $returnArray['sign'];
        unset($returnArray['sign']);
        $md5key = "{$this->config['key']}";
        ksort($returnArray);
        reset($returnArray);
        $md5str = "";
        foreach ($returnArray as $key => $val) {
            $md5str = $md5str . $key . "=" . $val . "&";
        }
        $sign = strtoupper(md5($md5str . "key=" . $md5key));
        return ($sign == $signs)? true : false;
    }

}
