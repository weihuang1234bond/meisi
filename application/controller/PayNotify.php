<?php
/**
 * MsvodX支付通知处理逻辑
 * @Author: $dreamer
 * @Date:   2017/12/28
 */

namespace app\controller;

use systemPay\aliPay;
use systemPay\wxPay;
use systemPay\paypal;
use systemPay\haoaPay;
use systemPay\kuyunPay;
use systemPay\yunyiPay;
use think\Request;
use app\model\Order as Order;

class PayNotify
{

    /**
     * 码支付通知处理
     * @param Request $request
     */
    function codepayNotify(Request $request)
    {
        #header('Content-type:text/html;charset=utf8'); 加上这句后codepay监测软件会出错  by $dreamer
        @file_put_contents('../logs/codepay_notify.log', "\r\n" . date('Y-m-d H:i:s') . str_repeat('===', 30) . "\r\n" . var_export($request->param(), 1), FILE_APPEND);

        $notifyData = $request->post();

        /*
        $notifyData=array (//模拟数据
          'app_time' => '1515127780',
          'chart' => 'utf-8',
          'id' => '18709',
          'money' => '0.01',
          'order_id' => '18709',
          'pay_id' => '2018010509574458116',
          'pay_no' => '20180105200040011100540086842664',
          'pay_time' => '1515117471',
          'price' => '0.01',
          'status' => '1',
          'tag' => '0',
          'trueID' => '18709',
          'type' => '1',
          'version' => '4.350',
          'sign' => '1d7215bd32aa207c507510be7acdcea0',
        );
        */

        $codepayer = new \systemPay\codePay();
        if ($codepayer->verifyNotifyData($notifyData)) {
            $updateRs = Order::updateOrder($notifyData['pay_id'], $notifyData['money'],isset($notifyData['param'])?$notifyData['param']:0);

            if (is_array($updateRs) && isset($updateRs['result']) && $updateRs['result'] == 0) {
                ob_clean();
                exit('success');
            } else {
                exit($updateRs['msg']);
            }
        } else {
            exit('密钥验证失败');
        }
    }


    /** 支付宝支付通知 */
    function alipayNotify(Request $request)
    {
        $alipayer = new aliPay();
        if ($alipayer->verify($request->param())) {
            $updateRs = Order::updateOrder($request->param('out_trade_no'), $request->param('total_amount'));
            if (is_array($updateRs) && isset($updateRs['result']) && $updateRs['result'] == 0) {
                ob_clean();
                exit('success');
            } else {
                exit($updateRs['msg']);
            }
        } else {
            exit('数据验证失败');
        }
    }

    /** 微信支付通知 */
    function wxpayNotify(){
        $wxpayer=new wxPay();
        if(is_array($notifyData=$wxpayer->verify())){
            $updateRs = Order::updateOrder($notifyData['out_trade_no'], $notifyData['total_fee']);
            if (is_array($updateRs) && isset($updateRs['result']) && $updateRs['result'] == 0) {
                ob_clean();
                exit('success');
            } else {
                exit($updateRs['msg']);
            }
        }else{
            exit('数据验证失败');
        }
    }

    /** paypal支付通知 */
    function paypalNotify(Request $request){
        $data = $request->param();
        //$str = 'mc_gross=0.02&invoice=2018051016144332193&protection_eligibility=Eligible&address_status=confirmed&payer_id=H3R6DF4QP7P5L&address_street=NO+1+Nan+Jin+Road&payment_date=02%3A35%3A56+May+10%2C+2018+PDT&payment_status=Completed&charset=gb2312&address_zip=200000&first_name=feng&mc_fee=0.02&address_country_code=CN&address_name=rusheng+feng&notify_version=3.9&custom=&payer_status=unverified&business=280360721-facilitator%40qq.com&address_country=China&address_city=Shanghai&quantity=1&verify_sign=A6gZzLobrdwg9V2Rjfr3KKJ0eG5qANP88sI8VWcnY6-xHCcBvbAFMOnA&payer_email=280360721%40qq.com&txn_id=06M03442UH9653718&payment_type=instant&last_name=rusheng&address_state=Shanghai&receiver_email=280360721-facilitator%40qq.com&payment_fee=0.02&receiver_id=TAKGP8TVWJLJE&txn_type=web_accept&item_name=%B9%BA%C2%F2VIP%2F%B3%E4%D6%B5%BD%F0%B1%D2&mc_currency=USD&item_number=1&residence_country=CN&test_ipn=1&transaction_subject=&payment_gross=0.02&ipn_track_id=a891b67dad2c';
        //parse_str($str,$data);
        $paypals=new paypal();
        if ($paypals->verify($data)) {
            $updateRs = Order::updateOrder($data['invoice'], $data['mc_gross']);
            if (is_array($updateRs) && isset($updateRs['result']) && $updateRs['result'] == 0) {
                ob_clean();
                exit('success');
            } else {
                exit($updateRs['msg']);
            }
        }else{
            exit('数据验证失败');
        }
    }


    /** haoapay支付通知 */
    function haopayNotify(){
        // 测试数据
        /* $str = "memberid=10002&orderid=2018061411261256689&amount=0.0100&datetime=20180614112547&transaction_id=20180614112535102501&returncode=00&sign=28AC874BADBD91A910B9E35A541784CD";
          parse_str($str,$_REQUEST);*/
        $returnArray = array( // 返回字段
            "memberid" => $_REQUEST["memberid"], // 商户ID
            "orderid" =>  $_REQUEST["orderid"], // 订单号
            "amount" =>  $_REQUEST["amount"], // 交易金额
            "datetime" =>  $_REQUEST["datetime"], // 交易时间
            "transaction_id" =>  $_REQUEST["transaction_id"], // 支付流水号
            "returncode" => $_REQUEST["returncode"],
            "sign" => $_REQUEST["sign"],
        );
        $payer=new haoaPay();
        $data = http_build_query($returnArray);
        file_put_contents('haopayNotify.txt', "收到异步通知\r\n", FILE_APPEND);
        file_put_contents('haopayNotify.txt', "{$data}\r\n", FILE_APPEND);
        if($payer->verify($returnArray)){
            $updateRs = Order::updateOrder($returnArray['orderid'], $returnArray['amount']);
            if (is_array($updateRs) && isset($updateRs['result']) && $updateRs['result'] == 0) {
                ob_clean();
                exit("ok");
            } else {
                exit($updateRs['msg']);
            }
        }else{
            exit('数据验证失败');
        }
    }

    /** haoapay支付通知 */
    function kuyunpayNotify(){
        $payer=new  kuyunPay();
        $data = http_build_query($_REQUEST);
        //$str = 'fxid=2018104&fxddh=2018062815021591335&fxorder=qzf2018062815033473704&fxdesc=VIP%E5%9F%BA%E7%A1%80%E6%9C%8D%E5%8A%A1&fxfee=0.01&fxattch=VIP%E5%9F%BA%E7%A1%80%E6%9C%8D%E5%8A%A1&fxstatus=1&fxtime=1530169414&fxsign=ba89357464ee22d28433aa16025532ec';
        //parse_str($str,$_REQUEST);
        //var_dump($arr);exit;
        file_put_contents('kuyunpayNotify.txt', "收到异步通知\r\n", FILE_APPEND);
        file_put_contents('kuyunpayNotify.txt', "{$data}\r\n", FILE_APPEND);
        if($payer->verify($_REQUEST)){
            if ($_REQUEST['fxstatus']  == '1') {
                $updateRs = Order::updateOrder($_REQUEST['fxddh'], $_REQUEST['fxfee']);
                if (is_array($updateRs) && isset($updateRs['result']) && $updateRs['result'] == 0) {
                    ob_clean();
                    exit("success");
                } else {
                    exit($updateRs['msg']);
                }
            }else{
                echo 'fail';
            }
        }else {
            echo 'sign error';
        }
        exit();

    }

    /** haoapay支付通知 */
    function yunyipayNotify(){
        $payer=new  yunyiPay();
        //$str ="key=da72fd6e4108d1283b&money=0.02&amount=0.02&order=20190417174226155549414681363&record=2019041717425884360&remark=2019041717425884360&sign=d5ed2ff7e20e276df7417186bf46a00a&sdk=4acde1b904f9c990af02473f2d";
        //parse_str($str,$_REQUEST);

        $data = http_build_query($_REQUEST);
        file_put_contents('yunyiPay.txt', "收到异步通知\r\n", FILE_APPEND);
        file_put_contents('yunyiPay.txt', "{$data}\r\n", FILE_APPEND);

        if($payer->verify($_REQUEST)){
            $updateRs = Order::updateOrder($_REQUEST['record'], $_REQUEST['money']);
            if (is_array($updateRs) && isset($updateRs['result']) && $updateRs['result'] == 0) {
                ob_clean();
                exit("success");
            } else {
                exit($updateRs['msg']);
            }

        }else {
            echo 'sign error';
        }
        exit();

    }

}