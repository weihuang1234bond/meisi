<?php

namespace systemPay;

use think\Db;
use think\Request;
use Yansongda\Pay\Pay;

/**
 * 微信支付 Msvodx支付插件
 * Date:    2018/03/08
 * Author:  $Dreamer
 */
class aliPay extends BasePay
{
    private $aliConfig=[];
    private $request;

    public function __construct()
    {
        $this->request=Request::instance();
        if (($rs = $this->driver('aliPay')) === true) {
            $this->aliConfig['alipay'] = [
                'app_id' => $this->config['appid'],
                'notify_url' => $this->config['notify_url'],
                'return_url' => $this->config['return_url'],
                'ali_public_key' => $this->config['ali_public_key'],
                'private_key' => $this->config['user_private_key']
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


        $config_biz = [
            'out_trade_no' => $params['orderSn'],
            'total_amount' => $params['price'], //单位元，同系统默认单位一样，微信支付单位是分
            'subject' => '购买VIP/充值金币',
            #'qr_pay_mode' => '4',
            #'qrcode_width' => '80',
        ];
        if(!empty($this->config['exchange_rate'])){
            $config_biz['total_amount' ] = $config_biz['total_amount' ] *$this->config['exchange_rate'];
            $config_biz['total_amount' ] = round($config_biz['total_amount' ] ,2);
        }
        $pay = new Pay($this->aliConfig);
        $gateway=$this->request->isMobile()?'wap':'web';

        $payHtml=$pay->driver('alipay')->gateway($gateway)->pay($config_biz);
        return [
            'result'=>0,
            'payName'=>'支付宝',
            'qrcode'=>null,
            'isJump'=>1,
            'payHtml'=>$payHtml
        ];
    }

    /*
     * demo data
     http://www.client.com/pay_notify/alipayNotify?total_amount=0.01&timestamp=2018-03-08+21%3A04%3A02&sign=h18bkNDKRt36sz9oj%2Fel1q2woFxznN82vUROeRwAmQIyx%2FIt95lV%2F8nwQb%2Fjai%2FgMC%2FWwK3DcCn7Y8U62R4immBCyFE527Fx6uPB%2BSqrxRdMayck%2BIa%2FPt8AGFxr34%2BULHtKsv0Sl%2FWUvw%2BKk71MeqPdUkaGc5%2FGwaEK07dv6nu7hnHfCerEjslEI5L41DJVlc6ETNqr3In%2FcbolMva9i1H%2FOWOjxdnrpg2BwLJrdopsmcSP8pt7QKxfesiR27YvNB8g2x7hZqLyBWGDJ1mr%2F4XiagDwf%2FSbJTbj1bqnkjsP826JTUFBfMs%2F%2F%2BGMd6pSTFznsPOP0EVfFJ8QdDnNVg%3D%3D&trade_no=2018030821001004660516215490&sign_type=RSA2&auth_app_id=2017071907814717&charset=utf-8&seller_id=2088521378747408&method=alipay.trade.page.pay.return&app_id=2017071907814717&out_trade_no=2018030821032788151&version=1.0
     */

    public function verify($data){
        $alipayer=new Pay($this->aliConfig);
        try {
            if ($alipayer->driver('alipay')->gateway()->verify($data)) {
                file_put_contents(ROOT_PATH . 'alipay_notify.txt', "收到来自支付宝的异步通知\r\n", FILE_APPEND);
                file_put_contents(ROOT_PATH . 'alipay_notify.txt', '订单号：' . $data['out_trade_no'] . "\r\n", FILE_APPEND);
                file_put_contents(ROOT_PATH . 'alipay_notify.txt', '订单金额：' . $data['total_amount'] . "\r\n\r\n", FILE_APPEND);
                return true;
            } else {
                file_put_contents(ROOT_PATH . 'alipay_notify.txt', "收到异步通知\r\n", FILE_APPEND);
                return false;
            }
        }catch (\Exception $exception){
            return false;
        }
    }


}