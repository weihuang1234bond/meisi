<?php
/**
 * 微信分享基础类
 * 2017/08/18
 * add by @Dreamer
 */
namespace wechatShare;
use think\cache;
use think\Db;

class wxShare
{
    //公众号配置
    private $appid;
    private $secret;


    function __construct()
    {
        $where = ['pay_code' => 'wxPay'];
        $payInfo = Db::name('payment')->where($where)->find();
        $payConfig = \json_decode($payInfo['config'], true);
        if (!is_array($payConfig))  throw new \Exception("配置:Wechat,配置信息不正确!");

        $returnData=[];
        foreach ($payConfig as $item){
            $returnData[$item['name']]=$item['value'];
        }

        try{
            $this->appid=$returnData['appid'];
            $this->secret=$returnData['secret_key'];

        }catch (\Exception $exception){
            $this->appid='';
            $this->secret='';
        }
    }

    /**
     * return 返回 access_token值
     */
    function get_access_token()
    {
        $ini_info = json_decode(Cache::get('access_token'), true);

        if (is_array($ini_info) && $ini_info['expires_time'] > time()) {
            //在有效期内，则直接返回
            return $ini_info['access_token'];
        } else {
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$this->appid&secret=$this->secret";
            $get_rs = $this->ihttp_request($url);
            if (is_array($get_rs) && isset($get_rs['content'])) {
                $access_token_infos = json_decode($get_rs['content'], true);
                if (is_array($access_token_infos) && isset($access_token_infos['access_token'])) {
                    $data['expires_time'] = time() + $access_token_infos['expires_in'];
                    $data['access_token'] = $access_token_infos['access_token'];
                    Cache::set('access_token', json_encode($data),7100);
                    // $this->write_ini($this->token_ini_path, json_encode($data));
                    return $access_token_infos['access_token'];
                } else {
                    return false;
                    die('获取access_token失败！');
                }
            }
        }
    }
    /**
     * 获取jsapi ticket
     * return bool|mixed 返回ticket
     */
    function get_ticket()
    {

        $ini_info = json_decode(Cache::get('ticket'), true);
        if (is_array($ini_info) && $ini_info['expires_time'] > time()) {
            return $ini_info['ticket'];
        } else {
            $access_token = $this->get_access_token();
            $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=$access_token&type=jsapi";
            $get_rs = $this->ihttp_request($url);
            $ticket_infos = json_decode($get_rs['content'], true);
            if (is_array($ticket_infos) && isset($ticket_infos['ticket'])) {
                $data['expires_time'] = time() + $ticket_infos['expires_in'];
                $data['ticket'] = $ticket_infos['ticket'];
                Cache::set('ticket', json_encode($data),7100);
                //     $this->write_ini($this->ticket_ini_path, json_encode($data));
                return $ticket_infos['ticket'];
            } else {
                return false;
                die('获取ticket失败！');
            }
        }
    }


    /**
     * 生成jssdkconfig配置
     * return array
     */

    function getJssdkConfig()
    {
        //var_dump( $_SERVER);die;
        if(!isset($_SERVER['PATH_INFO'])){
            $_SERVER['PATH_INFO']=null;
        }
        $jsapiTicket = $this->get_ticket();
        $nonceStr = $this->random(16);
        $timestamp = time();
        $query_str = empty($_SERVER['QUERY_STRING']) ? '' : '?' . $_SERVER['QUERY_STRING'];
        $url = 'http://'.$_SERVER['HTTP_HOST'].'/'.$_SERVER['PATH_INFO'] . $query_str;
        $string1 = "jsapi_ticket={$jsapiTicket}&noncestr={$nonceStr}&timestamp={$timestamp}&url={$url}";
        $signature = sha1($string1);
        $config = array(
            "appId" =>   $this->appid,
            "nonceStr" => $nonceStr,
            "timestamp" => "$timestamp",
            "signature" => $signature,
        );
        return $config;
    }

    /*生成wx.config html代码*/
    function register_jssdk($debug = false)
    {

        $debug = $debug ? 'true' : 'false';
        $jssdkconfig=$this->getJssdkConfig();
        $jssdkconfig = json_encode($jssdkconfig);
        $script = <<<EOF
<script src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">
	// jssdk config 对象
	jssdkconfig = $jssdkconfig || {};
	  var imgs= document.getElementById('imgs').src;
	   var info =document.getElementById("info").innerText;
	  console.log(info);
	// 是否启用调试
	jssdkconfig.debug = $debug;
	
	jssdkconfig.jsApiList = [
		'checkJsApi',
		'onMenuShareTimeline',
		'onMenuShareAppMessage',
		'onMenuShareQQ',
		'onMenuShareWeibo'
	];
	
	wx.config(jssdkconfig);
	
	    wx.ready(function() {
        wx.onMenuShareTimeline({
            title: document.title,
            link: location.href,
            imgUrl:imgs
        });
        wx.onMenuShareAppMessage({
            title: document.title,
            desc: info,
            link: location.href,
            imgUrl: imgs,
            type: '',
            dataUrl: ''
        });
        wx.onMenuShareQQ({
            title: document.title,
            desc:info,
            link: location.href,
            imgUrl: imgs
        });
    });
	
</script>
EOF;
        return $script;
    }

    /*发起http请求*/
    function ihttp_request($url, $post = '', $extra = array(), $timeout = 60)
    {
        $urlset = parse_url($url);
        //var_dump($urlset);die;
        if (empty($urlset['path'])) {
            $urlset['path'] = '/';
        }
        if (!empty($urlset['query'])) {
            $urlset['query'] = "?{$urlset['query']}";
        }
        if (empty($urlset['port'])) {
            $urlset['port']='';
        }
        if ($this->strexists($url, 'https://') && !extension_loaded('openssl')) {
            if (!extension_loaded("openssl")) {
                die('请开启您PHP环境的openssl');
            }
        }
        if (function_exists('curl_init') && function_exists('curl_exec')) {
            $ch = curl_init();
            if (!empty($extra['ip'])) {
                $extra['Host'] = $urlset['host'];
                $urlset['host'] = $extra['ip'];
                unset($extra['ip']);
            }
            curl_setopt($ch, CURLOPT_URL, $urlset['scheme'] . '://' . $urlset['host'] . ($urlset['port'] == '80' || empty($urlset['port']) ? '' : ':' . $urlset['port']) . $urlset['path'] . $urlset['query']);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_HEADER, 1);
            curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
            if ($post) {
                if (is_array($post)) {
                    $filepost = false;
                    foreach ($post as $name => &$value) {
                        if (version_compare(phpversion(), '5.6') >= 0 && substr($value, 0, 1) == '') {
                            $value = new CURLFile(ltrim($value, ''));
                        }
                        if ((is_string($value) && substr($value, 0, 1) == '') || (class_exists('CURLFile') && $value instanceof CURLFile)) {
                            $filepost = true;
                        }
                    }
                    if (!$filepost) {
                        $post = http_build_query($post);
                    }
                }
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
            }
            if (!empty($GLOBALS['_W']['config']['setting']['proxy'])) {
                $urls = parse_url($GLOBALS['_W']['config']['setting']['proxy']['host']);
                if (!empty($urls['host'])) {
                    curl_setopt($ch, CURLOPT_PROXY, "{$urls['host']}:{$urls['port']}");
                    $proxytype = 'CURLPROXY_' . strtoupper($urls['scheme']);
                    if (!empty($urls['scheme']) && defined($proxytype)) {
                        curl_setopt($ch, CURLOPT_PROXYTYPE, constant($proxytype));
                    } else {
                        curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
                        curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
                    }
                    if (!empty($GLOBALS['_W']['config']['setting']['proxy']['auth'])) {
                        curl_setopt($ch, CURLOPT_PROXYUSERPWD, $GLOBALS['_W']['config']['setting']['proxy']['auth']);
                    }
                }
            }
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSLVERSION, 1);
            if (defined('CURL_SSLVERSION_TLSv1')) {
                curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1);
            }
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:9.0.1) Gecko/20100101 Firefox/9.0.1');
            if (!empty($extra) && is_array($extra)) {
                $headers = array();
                foreach ($extra as $opt => $value) {
                    if ($this->strexists($opt, 'CURLOPT_')) {
                        curl_setopt($ch, constant($opt), $value);
                    } elseif (is_numeric($opt)) {
                        curl_setopt($ch, $opt, $value);
                    } else {
                        $headers[] = "{$opt}: {$value}";
                    }
                }
                if (!empty($headers)) {
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                }
            }
            $data = curl_exec($ch);
            $status = curl_getinfo($ch);
            $errno = curl_errno($ch);
            $error = curl_error($ch);
            curl_close($ch);
            if ($errno || empty($data)) {
                return error(1, $error);
            } else {
                return $this->ihttp_response_parse($data);
            }
        }
        $method = empty($post) ? 'GET' : 'POST';
        $fdata = "{$method} {$urlset['path']}{$urlset['query']} HTTP/1.1\r\n";
        $fdata .= "Host: {$urlset['host']}\r\n";
        if (function_exists('gzdecode')) {
            $fdata .= "Accept-Encoding: gzip, deflate\r\n";
        }
        $fdata .= "Connection: close\r\n";
        if (!empty($extra) && is_array($extra)) {
            foreach ($extra as $opt => $value) {
                if (!$this->strexists($opt, 'CURLOPT_')) {
                    $fdata .= "{$opt}: {$value}\r\n";
                }
            }
        }
        $body = '';
        if ($post) {
            if (is_array($post)) {
                $body = http_build_query($post);
            } else {
                $body = urlencode($post);
            }
            $fdata .= 'Content-Length: ' . strlen($body) . "\r\n\r\n{$body}";
        } else {
            $fdata .= "\r\n";
        }
        if ($urlset['scheme'] == 'https') {
            $fp = fsockopen('ssl://' . $urlset['host'], $urlset['port'], $errno, $error);
        } else {
            $fp = fsockopen($urlset['host'], $urlset['port'], $errno, $error);
        }
        stream_set_blocking($fp, true);
        stream_set_timeout($fp, $timeout);
        if (!$fp) {
            return error(1, $error);
        } else {
            fwrite($fp, $fdata);
            $content = '';
            while (!feof($fp))
                $content .= fgets($fp, 512);
            fclose($fp);
            return $this->ihttp_response_parse($content, true);
        }
    }

    function strexists($string, $find)
    {
        return !(strpos($string, $find) === FALSE);
    }

    function ihttp_response_parse($data, $chunked = false)
    {
        $rlt = array();
        $headermeta = explode('HTTP/', $data);
        if (count($headermeta) > 2) {
            $data = 'HTTP/' . array_pop($headermeta);
        }
        $pos = strpos($data, "\r\n\r\n");
        $split1[0] = substr($data, 0, $pos);
        $split1[1] = substr($data, $pos + 4, strlen($data));

        $split2 = explode("\r\n", $split1[0], 2);
        preg_match('/^(\S+) (\S+) (.*)$/', $split2[0], $matches);
        $rlt['code'] = $matches[2];
        $rlt['status'] = $matches[3];
        $rlt['responseline'] = $split2[0];
        $header = explode("\r\n", $split2[1]);
        $isgzip = false;
        $ischunk = false;
        foreach ($header as $v) {
            $pos = strpos($v, ':');
            $key = substr($v, 0, $pos);
            $value = trim(substr($v, $pos + 1));
            if(isset($rlt['headers'][$key])){
                if (is_array($rlt['headers'][$key])) {
                    $rlt['headers'][$key][] = $value;
                } elseif (!empty($rlt['headers'][$key])) {
                    $temp = $rlt['headers'][$key];
                    unset($rlt['headers'][$key]);
                    $rlt['headers'][$key][] = $temp;
                    $rlt['headers'][$key][] = $value;
                }
            } else {
                $rlt['headers'][$key] = $value;
            }
            if (!$isgzip && strtolower($key) == 'content-encoding' && strtolower($value) == 'gzip') {
                $isgzip = true;
            }
            if (!$ischunk && strtolower($key) == 'transfer-encoding' && strtolower($value) == 'chunked') {
                $ischunk = true;
            }
        }
        if ($chunked && $ischunk) {
            $rlt['content'] = $this->ihttp_response_parse_unchunk($split1[1]);
        } else {
            $rlt['content'] = $split1[1];
        }
        if ($isgzip && function_exists('gzdecode')) {
            $rlt['content'] = gzdecode($rlt['content']);
        }

        $rlt['meta'] = $data;
        if ($rlt['code'] == '100') {
            return $this->ihttp_response_parse($rlt['content']);
        }
        return $rlt;
    }

    /* 生成随机数 */
    function random($length, $numeric = FALSE)
    {
        $seed = base_convert(md5(microtime() . $_SERVER['DOCUMENT_ROOT']), 16, $numeric ? 10 : 35);
        $seed = $numeric ? (str_replace('0', '', $seed) . '012340567890') : ($seed . 'zZ' . strtoupper($seed));
        if ($numeric) {
            $hash = '';
        } else {
            $hash = chr(rand(1, 26) + rand(0, 1) * 32 + 64);
            $length--;
        }
        $max = strlen($seed) - 1;
        for ($i = 0; $i < $length; $i++) {
            $hash .= $seed{mt_rand(0, $max)};
        }
        return $hash;
    }


}