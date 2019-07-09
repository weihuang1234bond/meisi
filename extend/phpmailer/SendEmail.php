<?php

namespace phpmailer;
use think\Db;
require_once 'class.phpmailer.php';
class SendEmail
{

    /**
     * 创建SendEmail对象
     * @param email  接收邮件的email信箱
     * @param  username 收件人姓名
     * @param  subject  邮件标题
     *@param  body  内容
     */
    public static function send($param)
    {
        $config = Db::name('admin_config')->where(array('group'=>'email'))->column('value','name');
        $mail = new PHPMailer(true); //建立邮件发送类
        $mail->CharSet = "UTF-8";//设置信息的编码类型
        $mail->SMTPAuth = true; // 启用SMTP验证功能
        $mail->IsSMTP(); // 使用SMTP方式发送

        $mail->Host = $config['email_host']; //邮箱服务器
        $mail->Username = $config['send_email'];//服务器邮箱账号
        $mail->Password = $config['email_password']; // 邮箱密码
        $mail->Port = $config['email_port']; //邮箱服务器端口号
        $mail->From = $config['from_email']; //邮件发送者email地址
        $mail->FromName = $config['email_from_name'];//发件人名称
//       $mail->Password = "bzrqxxmhxezebicf"; // 163邮箱密码


        $mail->AddAddress($param['email'], $param['username']); //收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
        $mail->IsHTML(true);//是否使用HTML格式
        $mail->Subject = $param['subject']; //邮件标题
        $mail->Body = $param['body']; //邮件内容，上面设置HTML，则可以是HTML
        $result = $mail->Send();
//        if (!$result) {
//            echo "邮件发送失败. <p>";
//            echo "错误原因: " . $mail->ErrorInfo;
//            exit;
//        }else{
//            var_dump($result);exit;
//        }
    }
}

