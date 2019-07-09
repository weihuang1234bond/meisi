<?php
/**
 * 码支付 Msvodx支付插件
 * Date:    2017/12/27
 * Author:  $Dreamer
 */

namespace systemPay;

use think\Exception;
if (isset($___setPayment) && $___setPayment==true) {
    $curIndex=isset($payLists)?count($payLists):0;

    $payLists[$curIndex] = [
        'pay_code'=>basename(__FILE__,'.php'),
        'pay_name'=>'Demo支付',
        'description'=>'由MsvodX官方整合的第三方支付接口',
        'version'=>'1.0',
        'config'=>[
            ['name'=>'merchant_id','type'=>'text','value'=>'','desc'=>'商户id'],
            ['name'=>'key','type'=>'text','value'=>'UM6iE8R9UD44MHxyB0qRvlXpF6jgqfOk','desc'=>'码支付通信密钥'],
            ['name'=>'min_money','type'=>'text','value'=>'0.01','desc'=>'最低支付金额'],
        ]
    ];
    return;
}

class testPay
{

    private $config = [
        'id' => 18709,
        'key' => 'UM6iE8R9UD44MHxyB0qRvlXpF6jgqfOk',
        'chart' => 'utf-8',
        'act' => 0,
        'page' => 3,
        'style' => 1,
        'outTime' => 360,
        'min' => 0.01,              //最低金额限制
        'pay_type' => 1,            //启用支付宝官方接口 会员版授权后生效
        'userOff' => false,
        'return_url' => '',         //同步通知地址
        'notify_url' => '',         //异步通知地址
    ];

    function __construct()
    {
        $this->config['notify_url']=url('PayNotify/codepayNotify');
        if ($this->config['id'] <= 0 || empty($this->config['key'])) {
            throw new Exception('码支付配置参数不正确');
        }

        echo json_encode([
            ['name'=>'merchant_id','type'=>'text','value'=>'','desc'=>'商户id'],
            ['name'=>'key','type'=>'text','value'=>'UM6iE8R9UD44MHxyB0qRvlXpF6jgqfOk','desc'=>'码支付通信密钥'],
            ['name'=>'min_money','type'=>'text','value'=>'0.01','desc'=>'最低支付金额'],
        ]);

        die;
    }


    function buildRequestForm($params){


    }



    function getConfig()
    {
        return $this->config;
    }


}

