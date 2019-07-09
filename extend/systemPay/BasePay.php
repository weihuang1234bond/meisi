<?php
namespace systemPay;
/**
 * 支付基类
 * 2018/03/08
 */
use think\Db;
use think\Exception;

class BasePay{
    protected $config = null;

    /**
     * 根据支付类型获取支付的配置信息
     * @param $payType 支付类型，如 wxPay aliPay
     * @return array|bool array:错误信息 bool==true:成功
     */
    protected function driver($payType){
        if(empty(trim($payType))) throw new \Exception('参数支付类型不能为空');

        $where = ['pay_code' => $payType, 'is_third_payment' => 0];
        $payInfo = Db::name('payment')->where($where)->find();
        if (!$payInfo || $payInfo['status'] == 0)  throw new \Exception("支付方式:{$payType},配置不存在或支付被禁用!");
        $payConfig = \json_decode($payInfo['config'], true);
        if (!is_array($payConfig))  throw new \Exception("支付方式:{$payType},配置信息不正确!");

        $returnData=[];
        foreach ($payConfig as $item){
            $returnData[$item['name']]=$item['value'];
        }
        $this->config=$returnData;
        return true;
    }


    /**
     * 返回执行结果信息数组
     * @param $msg  执行结果描述信息
     * @param int $statusCode 返回状态码，0表示成功，其他表示非成功状态
     * @return array
     */
    protected function returnResult($msg,$statusCode=5002,$data=null){
        return ['result' => $statusCode, 'msg' => $msg,'data'=>$data];
    }

    /**
     * 检测支持代码创建参数合法性
     * @param $params
     * @return array|bool
     */
    protected function checkCreatePyaCodeParams($params){
        if(!isset($params['orderSn'])||!isset($params['price'])) return $this->returnResult('支付订单信息不完整，请重试!');
        if($params['price']<$this->config['min_money']) return $this->returnResult('当前支付最低支付额为'.$this->config['min_money'].'元.');

        return true;
    }


}