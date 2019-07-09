<?php

namespace sms;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use think\Db;

require_once 'class.SmsApi.php';
class Sms
{

    /**
     * 创建SendEmail对象
     * @param email  接收邮件的email信箱
     * @param  username 收件人姓名
     * @param  subject  邮件标题
     *@param  body  内容
     */
    public function send($param)
    {
        $sms  = new SmsApi();
        $result = $sms->sendSMS($param['tel'],$param['msg']);
      /*  if(!is_null(json_decode($result))){
            $output=json_decode($result,true);
            if(isset($output['code'])  && $output['code']=='0'){
                echo '短信发送成功！' ;
            }else{
                echo $output['errorMsg'];
            }
        }else{
            echo $result;
        }*/

    }


}

