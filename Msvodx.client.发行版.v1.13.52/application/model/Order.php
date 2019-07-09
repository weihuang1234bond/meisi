<?php

namespace app\model;

use think\Db;
use think\Model;

class Order extends Model
{


    protected $autoWriteTimestamp = true;
    protected $createTime = 'add_time';
    protected $updateTime = 'update_time';
    protected $pk = 'order_sn';

    public function getStatusAbcAttr($value)
    {
        $statusArr = [1 => '已支付', 0 => '未支付'];
        return $statusArr[$value];
    }


    public static function updateOrder($orderSn, $price,$cps_uid=0)
    {
        $order = self::get($orderSn);

        if (!$order) return ['result' => 1, 'msg' => '订单不存在'];
        if ($order->status === 1) return ['result' => 2, 'msg' => '订单已完成支付，无需再进行支付'];
        if ($price < $order->real_pay_price) return ['result' => 3, 'msg' => '支付金额小于实际支付金额'];
        Db::startTrans();
        try {
            $order->status = 1;
            $order->pay_time = time();
            $order->real_pay_price = $price;
            $order->save();

            $memberModel = model('member');
            $member = $memberModel::get($order->user_id);
            if (!$member) throw new \Exception('对应的充值会员信息不存在!');

            //购买类型，1:金币，2:vip
            if ($order->buy_type == 1) {
                $member->money += $order->buy_glod_num;
                $member->save();
                //写入金币记录表
                Db::name('gold_log')->insert(['user_id' => $order->from_agent_id, 'gold' =>$order->buy_glod_num, 'add_time' => time(), 'module' => 'Order', 'explain' => '充值金币']);
                //CPS执行接口请求
                if($cps_uid>0 && function_exists('ad_cps_member_pay')){
                    ad_cps_member_pay($member->id,$price,'充值金币('.$order->buy_glod_num."个)：支付成功");
                }

            } elseif ($order->buy_type == 2) {
                $vipTypeTxt='';//充值内容简述，用于CPS接口的status
                //解析出购买的会员内容
                $buyVipInfo = \json_decode($order->buy_vip_info, true);
                if ($buyVipInfo['permanent'] != 1) {
                    //1.普通周期会员
                    if ($member->out_time > time()) {
                        $member->out_time = strtotime("+{$buyVipInfo['days']} days", $member->out_time);
                    } else {
                        $member->out_time = strtotime("+{$buyVipInfo['days']} days");
                    }
                    $member->save();
                    $vipTypeTxt=$buyVipInfo['days']."天";
                } else {
                    //2.永久会员
                    $member->is_permanent = 1;
                    $member->save();
                    $vipTypeTxt="永久";
                }

                //CPS执行接口请求
                if($cps_uid>0 && function_exists('ad_cps_member_pay')){
                    ad_cps_member_pay($member->id,$price,"购买会员({$vipTypeTxt})个：支付成功");
                }
            }
            #throw  new \think\Exception('no success');
            //充值分销商分成处理
            distributor_divide(array('id'=>$order->user_id,'gold'=>$price));
            //充值代理商有分成
            cur_agent_divide($order->user_id,$price);
            //提交
            Db::commit();
        } catch (\Exception $e) {
            echo "错误信息:$e";
            Db::rollback();
            return ['result' => 4, 'msg' => '更新订单数据时发生错误'];
        }

        return ['result' => 0, 'msg' => '订单更新成功'];
    }


}