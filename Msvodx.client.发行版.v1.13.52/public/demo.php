<?php


	// =====================下单操作=======================
    header("Content-type: text/html; charset=utf-8");

    $data = array();
    $data['seller']    = '100000413'; // 商户号
    $data['openKey']   = '01609b4358a2eadebf892b979aecc351'; // 商户key
    $data['payType']   = 'alipay_pingan';  // 支付方式
    $data['orderId']   = time().rand();  // 商户订单号
    $data['transTime'] = time();   // 支付时间
    $data['amount']    = 0.01;//  支付金额
    $data['notifyUrl'] = 'http://adieal.rusheng.work/fuck.php'; // 异步通知地址
    $data['backUrl']   = 'https://baidu.com'; // 前台通知地址
    $data['userId']    = '3735389';// 商户自定义用户号
    $data['signType']  = 'md5'; // 签名方式
    $data['ordeDev']   = '1001';  // 
    $data['orderDesc'] = 'jxd12311';
    $data['signData']  = getSign($data);  // 生成签名
    unset($data['openKey']);
    //$payUrl = 'http://47.94.154.191:8083/pay/order';
	//$payUrl = 'http://www.yunshuokj.com/api/youyupay/ainong/api.php';
	$payUrl = 'http://pay.yoyuspay.com:89/pay/order';
    $ret = curl($payUrl,$data);
    if($data['ordeDev']=='1001'){
        //如果是1001 则是获取支付链接 由商户自行封装
        $ret = curl($payUrl,$data);
        //echo $ret;
        //判断返回是否json格式
        if(!json_decode($ret)) {
                //不是json格式直接输出html 表单格式提交 
                echo $ret;
            } else {
                $rets  = json_decode($ret,true);
                if($rets['errcode']=='T0000'){
					//echo $rets['url'];
					$img = "http://qr.liantu.com/api.php?text=".urlencode($rets['url']);
                    echo "<img width='198' height='198' src=\"http://qr.liantu.com/api.php?text=".urlencode($rets['url'])."\"/>";
                }else{
                    echo $rets['msg'];
                    return ;
                }
        }
        
    }

    //如果是1002 直接进收银台模式会自动识别手机端 不过需要form 表单提交
    if($data['ordeDev']=='1002'){
        
        $str = '<meta http-equiv="Content-Type" content="text/html; charset=utf8" />';
        $str = $str .'<form id="Form1" name="Form1" method="post" action="'.$payUrl.'">';
        //'<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />';
        foreach ($data as $key => $val) {
            $str = $str . '<input name="'.$key.'" id="'.$key.'" type="text" value=\''.$val.'\' /><br/>';

        }
        $str = $str . '<input type="submit" value="提交" stype="display: none;">';
        $str = $str . '</form>';
        $str = $str . '<script>';
        $str = $str . 'document.Form1.submit();';
        $str = $str . '</script>';
        echo $str;
        
    }

    /**
     * 验证签名
     */
    function getSign($data){
        return strtoupper(md5(formatBizQueryParaMap($data,false)));
    }

    /**
     *  作用：格式化参数，签名过程需要使用
     *  按字典序排序参数
     */
    function formatBizQueryParaMap($paraMap, $urlencode){

        $buff = "";
        ksort($paraMap);
        foreach ($paraMap as $k => $v){
            if($v != null) {
                if($urlencode){
                    $v = urlencode($v);
                }
                $buff .= $k . "=" . $v . "&";
            }
        }
        $reqPar='';
        if (strlen($buff) > 0){
            $reqPar = substr($buff, 0, strlen($buff)-1);
        }
        return $reqPar;
    }

    #使用post的传输
     function curl($url,$data){
        //启动一个CURL会话
        $ch = curl_init();
        // 设置curl允许执行的最长秒数
        curl_setopt($ch, CURLOPT_TIMEOUT, 120);
        //忽略证书
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
        // 获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_URL,$url);
        //发送一个常规的POST请求。
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch, CURLOPT_HEADER,0);//是否需要头部信息（否）
        // 执行操作
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }





	// =====================回调操作=======================

	$post = $_POST;
	if(!$post){
		die('禁止外部访问');
	}
	$post['openKey'] = '商户秘钥';

	//开始验证签名
	save_log('log','加key以后的数据'.json_encode($post));
	if($post['status']==1){
		$signStr = $post['signData'];
		unset($post['signData']);
		$sign = getSign($post);
		
		//开始验证签名
		if($signStr == $sign){
	      	save_log('log','订单验签成功！');
	      	/*
	      	 * 
	      	 * 执行商户系统的业务逻辑
	      	 * 
	      	 * 
	      	 * 
	      	 */
	      	echo json_encode(array('errno'=>'0','content'=>'success'));
	      	exit;
		}else{
			save_log('log','验签失败！');
			echo '验签失败';
	      	exit;
		}
		
		
	}else{
		save_log('log','订单未支付成功状态status非1');
		echo '验签失败';
	    exit;
	}


	/*
	 * 记录日志文件
	 * linux 请补全路径
	 */
	function save_log($path, $msg){
   
        if (! is_dir($path)) {
            mkdir($path);
        }
        $filename = $path . '/' . date('YmdHi') . '.txt';
        $content = date("Y-m-d H:i:s")."\r\n".$msg."\r\n \r\n \r\n ";
        file_put_contents($filename, $content, FILE_APPEND);
    }

?>