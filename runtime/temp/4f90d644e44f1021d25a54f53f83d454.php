<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:32:"./tpl/ms360/member/seek_pwd.html";i:1531103066;s:27:"./tpl/ms360/common/top.html";i:1531103068;s:30:"./tpl/ms360/common/header.html";i:1562592688;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<?php $menu = getMenu(); $register_validate = empty(get_config('register_validate')) ? 0 : get_config('register_validate');?>
<meta http-equiv='Content-Type' content='text/html;charset=UTF-8'>
<meta charset='UTF-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
<meta name='viewport' content='width=device-width, maximum-scale=1, user-scalable=yes, minimal-ui'>
<meta name="keywords" lang="zh-CN" content="<?php echo $seo['site_keywords']; ?>"/>
<meta name="description" lang="zh-CN" content="<?php echo $seo['site_description']; ?>" />
<title><?php echo (isset($page_title) && ($page_title !== '')?$page_title:""); ?><?php echo $seo['site_title']; ?></title>
<link href="__ROOT__/tpl/ms360/static/awesome/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="__ROOT__/tpl/ms360/static/js/layui/css/layui.css">
<link rel="stylesheet" href="__ROOT__/tpl/ms360/static/css/detail.css">
<link rel="stylesheet" href="__ROOT__/tpl/ms360/static/css/common.css">

<script type="text/javascript" src="__ROOT__/tpl/ms360/static/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="__ROOT__/tpl/ms360/static/js/layer/layer.js"></script>
<script type="text/javascript" src="__ROOT__/tpl/ms360/static/js/meisicms.js"></script>
<script type="text/javascript" charset="utf-8" src="__ROOT__/tpl/ms360/static/js/layui/layui.js"></script>
<style>
.videologo {
background: url(<?php echo $seo['site_logo']; ?>);
float:left;
height: 48px;
margin: 10px 0;
overflow: hidden;
text-indent: -9999px;
width: 150px;
background-size: 100% auto;
}
</style>
</head>
<body id="tvHome">
<link href="__ROOT__/tpl/ms360/static/css/common.css" rel="stylesheet">
<link href="__ROOT__/tpl/ms360/static/css/index.css" rel="stylesheet">
<div class="header clearfix">
  <div class="header-fixe clearfix">
    <div class="wrapper header-wrap">
      <h1 class="videologo"><a href="/" title="<?php echo $seo['site_title']; ?>" target="_self"><?php echo $seo['site_title']; ?></a></h1>
      <ul class="nav">
        <li class="nav-more"><a href="/" target="_self">首页</a></li>
        <?php if(is_array($menu) || $menu instanceof \think\Collection || $menu instanceof \think\Paginator): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <li <?php if($vo['current'] == 1): ?>class="nav-more nav-more-cur"<?php else: ?>class="nav-more"<?php endif; ?>> <a href="<?php echo $vo['url']; ?>"><?php echo $vo['name']; ?><i class="arr"></i></a>
          <div class="nav-pop"> <i class="nav-pop-arr"></i>
            <h3 class="nav-pop-tit"><?php echo $vo['name']; ?>分类</h3>
            <ul class="nav-pop-list">
              <?php if(!(empty($vo['sublist']) || (($vo['sublist'] instanceof \think\Collection || $vo['sublist'] instanceof \think\Paginator ) && $vo['sublist']->isEmpty()))): if(is_array($vo['sublist']) || $vo['sublist'] instanceof \think\Collection || $vo['sublist'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['sublist'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
              <li><a href="<?php echo $v['url']; ?>" target="_self"><?php echo $v['name']; ?></a></li>
              <?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </ul>
          </div>
        </li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      <!-- <li class="nav-topics"><a href="<?php echo url('system_pay/recharge'); ?>" target="_blank"></li> -->
      </ul>
      <?php $controller = lcfirst(request()->controller());$memberInfo = get_member_info();$login_status = check_is_login();?>
      <div class="login">
        <div class="login-box" style="<?php if($login_status['resultCode'] != 1): ?>display: block;<?php else: ?>display: none;<?php endif; ?>">
        <a data-toggle="modal" href="<?php echo url('index/login'); ?>">登录</a> | <a href="<?php echo url('index/register'); ?>" target="_blank">注册</a> </div>
      <div class="user-info" style="<?php if($login_status['resultCode'] != 1): ?>display: none;<?php else: ?>display: block;<?php endif; ?>">
      <div class="user-info-item"> <span class="user-img"> <a href="<?php echo url('member/member'); ?>"><img src="<?php if(session('member_info')['headimgurl'] != ''): ?><?php echo session('member_info')['headimgurl']; else: ?>/static/images<?php echo url('member/member'); ?>_dafault_headimg.jpg<?php endif; ?>""></a></span> <span class="user-name"><a href="<?php echo url('member/member'); ?>" se_prerender_url="complete"><?php echo session('member_info')['nickname']; ?> <i class="fa fa-angle-down" aria-hidden="true"></i></a></span></div>
      <div class="user-pop" style="left: 81px; display: none;"> <i class="user-pop-arr" style="left: 222px;"></i> <a href="javascript:void(0);" class="user-out" onClick="logout()" title="退出">退出</a>
        <div class="user-pop-grade" style="display: block;">
          <div class="user-pop-header"> <img src="<?php if(session('member_info')['headimgurl'] != ''): ?><?php echo session('member_info')['headimgurl']; else: ?>/static/images<?php echo url('member/member'); ?>_dafault_headimg.jpg<?php endif; ?>"" alt=""></div>
          <div class="user-pop-detail">
            <div class="btn-pop-signin"> <a href="javascript:void(0);" style="color:#fff;" onClick="sign()">今日签到</a> </div>
            <div class="name">
              <p style="font-size:16px;"><?php echo session('member_info')['nickname']; ?></p>
              <div class="user-pop-level" style="color:#000;">级别：<?php if($memberInfo['is_permanent'] == 1): ?>永久VIP<?php else: if($memberInfo['out_time'] > time()): ?><?php echo safe_date('Y-m-d',$memberInfo['out_time']); ?>（<b style="color:red;">VIP</b>）<?php else: ?>普通会员<?php endif; endif; ?></div>
            </div>
          </div>
        </div>
        <div class="user-pop-task" style="display: block;">
          <ul>
            <li>
              <div class="pic"><i class="fa fa-upload" style="color:#33CC00;font-size:1.3rem"></i></div>
              <div class="info"><span>上传视频与网友分享，还可以赚取佣金哦！</span></div>
              <div class="status task-status-checkin"> <a href="<?php echo url('member/video'); ?>" target="_blank">
                <p>上传</p>
                </a> </div>
            </li>
            <li>
              <div class="pic"><i class="fa fa-users" style="color:#FF0099;font-size:1.1rem"></i></div>
              <div class="info"><span>成为本站三级分销商赚取丰厚佣金<span></div>
              <div class="status task-status-watchLiveHalfhour"> <a href="<?php echo url('member/agent'); ?>" target="_blank">
                <p>申请</p>
                </a> </div>
            </li>
            <li>
              <div class="pic"><i class="fa fa-share-alt" style="color:#FF6600;font-size:1.3rem"></i></div>
              <div class="info"> <span>分享本站通过别人点击赚取观看金币</span></div>
              <div class="status task-status-watchFiveAnchors"> <a href="<?php echo url('member/member'); ?>" target="_blank">
                <p>分享</p>
                </a> </div>
            </li>
          </ul>
        </div>
        <div class="user-pop-loadimg" style="display: none;"> <img src="__ROOT__/tpl/ms360/static/images/loading.gif"></div>
        <div class="user-pop-nav"> <a href="<?php echo url('member/member'); ?>" target="_blank"> <i class="fa fa-user-circle fa-2x" style="line-height:33px;"></i><br>
          个人中心</a> <a href="<?php echo url('system_pay/recharge'); ?>" target="_blank"> <i class="fa fa-diamond fa-2x" style="line-height:33px;"></i><br>
          会员充值</a> <a href="<?php echo url('member/collection_video'); ?>" target="_blank"> <i class="fa fa-star fa-2x" style="line-height:33px;"></i><br>
          我的收藏</a> <a href="<?php echo url('homepage/index',array('uid'=>session('member_id'))); ?>" target="_blank"> <i class="fa fa-home fa-2x" style="line-height:33px;"></i><br>
          个人主页</a> </div>
      </div>
    </div>
  </div>
  <div class="hd-search">
    <div class="hd-search-box">
      <form <?php switch($controller): case "images": ?> action="<?php echo url('search/index',array('type'=>'atlas')); ?>"<?php break; case "atlas": ?> action="<?php echo url('search/index',array('type'=>'atlas')); ?>"<?php break; case "novel": ?>action="<?php echo url('search/index',array('type'=>'novel')); ?>"<?php break; case "search": ?>action="<?php echo url('search/index',array('type'=>$type)); ?>"<?php break; default: ?>action="<?php echo url('search/index',array('type'=>'video')); ?>"
    <?php endswitch; ?> method="get" id="myform">
      <input type="text" class="ms-search-input"  value='<?php if(isset($key_word)): ?><?php echo $key_word; endif; ?>' name="key_word" placeholder="输入关键词搜索...">
      <button class="ms-search-submit" type="submit">搜索</button>
      </form>
    </div>
  </div>



</div>
</div>
</div>
</div>

<link href="__ROOT__/tpl/ms360/static/css/msvod.css" rel="stylesheet">
<link rel="stylesheet" href="__ROOT__/tpl/ms360/static/css/fonts.css">

<link rel="stylesheet" href="__ROOT__/tpl/ms360/static/css/member.css">


<div id="block-B" class="pp_con_wrap">
    <div class="pp_main fc-main clearfix" id="J_verify-phone">
        <!--外框架结束-->
        <div class="top_tips">
            <i class="pp_icon diamond_gray"></i>
            温馨提示：为了保护您的帐号安全，修改前请先进行安全验证。
        </div>
        <form action="" method="post" id="myform">
        <!--安全验证-->

        <div id="step1" class="pp_pw_retakeStep">
            <div class="retakeStep_wrap">
                <div class="pp_icon step_bg stepOne">
                    <div class="step_list">
                        <ul>
                            <li class="step_pass">1.进行安全验证</li>
                            <li>2.设置新密码</li>
                            <li>3.修改成功</li>
                        </ul>
                    </div>
                </div>
                <div class="step_con">
                        <div class="pp_account_form_item">
                            <span class="vl-inline item_title_big">
                                <?php if($register_validate == 1): ?>
                                    <label>绑定邮箱地址：</label>
                                <?php else: ?>
                                    <label>绑定手机号码：</label>
                                <?php endif; ?>
                            </span>
                            <span class="vl-inline item_input">
                                <input id="email" name="email" class="input-common input-common-ph" type="text"
                                       <?php if($register_validate == 1): ?>placeholder="请输入您绑定的完整邮箱地址"<?php else: ?>placeholder="请输入您绑定的手机号码"<?php endif; ?> >

                            </span>
                            <a class="set-warnning" id="getCodeBtn" onclick="sendCode()">获取验证码</a><!--发送之后追加class="sent"-->
                            <!--<span class="error-warnning">邮箱不正确</span>-->
                        </div>
                        <div class="pp_account_form_item">
                            <span class="vl-inline item_title_big">
                                <label>请输入验证码：</label>
                            </span>
                            <span class="vl-inline item_input" style="width: 170px;">
                                <input id="mailVerifyCode" class="input-common input-common-ph" style="width: 150px;"
                                       type="text" placeholder="请输入验证码">
                            </span>
                        </div>
                        <!--发送验证按钮开始-->
                        <div class="pp_account_form_item">
                            <span class="vl-inline item_title_big">
                                <label></label>
                            </span>
                            <span class="vl-inline">
                             <a id="nextStepBtn" class="pc-btn pc-btn-green" onclick="checkCode()" href="javascript:void(0)"
                                style="width: 150px;margin-top: 25px;">下一步</a>
                            </span>
                        </div>
                        <!--发送验证邮件按钮结束-->

                </div>
            </div>
        </div>
        <!--设置新邮箱-->
        <div id="step2" style="display: none;" class="pp_pw_retakeStep">
            <div class="retakeStep_wrap">
                <div class="pp_icon step_bg stepTwo">
                    <div class="step_list">
                        <ul>
                            <li class="step_pass">1.进行安全验证</li>
                            <li class="step_pass">2.设置新密码</li>
                            <li>3.修改成功</li>
                        </ul>
                    </div>
                </div>
                <div class="step_con">
                    <form action="">
                        <div class="pp_account_form_item">
                                <span class="item_title_big">
                                    <label for="">新的密码：</label>
                                </span>
                            <span class="item_input">
                                    <input class="input-common" id='new' name="new"  type="password" placeholder="6~20位字母或数字">
                                </span>
                            <!--<span class="error_warnning"></span>-->
                        </div>
                        <div class="pp_account_form_item">
                                <span class="item_title_big">
                                    <label for="">确认密码：</label>
                                </span>
                            <span class="item_input">
                                    <input class="input-common" id='confirm' name="confirm" type="password" placeholder="请再次输入密码">
                                </span>
                            <!--<span class="error_warnning"></span>-->
                        </div>
                        <!--发送验证按钮开始-->
                        <div class="pp_account_form_item">
                             <span class="vl-inline item_title_big">
                                <label></label>
                            </span>
                            <span class="vl-inline">
                             <a id="saveBindBtn" class="pc-btn pc-btn-green" onclick="setPassWord()" href="javascript:void(0)"
                                style="width: 150px;margin-top: 25px;">确认修改</a>
                            </span>
                        </div>
                        <!--发送验证邮件按钮结束-->
                    </form>
                </div>
            </div>
        </div>
        <!--修改成功-->
        <div id="step3" style="display: none;" class="pp_pw_retakeStep">
            <div class="retakeStep_wrap">
                <div class="pp_icon step_bg stepThree">
                    <div class="step_list">
                        <ul>
                            <li class="step_pass">1.进行安全验证</li>
                            <li class="step_pass">2.设置新密码</li>
                            <li class="step_pass">3.修改成功</li>
                        </ul>
                    </div>
                </div>
                <div class="step_con">
                    <div class="success_note">
                        <i class="success_hint_bd btn fn-baocunchenggong"></i>
                        <span>恭喜您，密码修改成功！</span><br>
                        <a href="<?php echo url('member/member'); ?>">个人中心</a>
                        <a href="/">首页</a>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<script>
    var register_validate = "<?php echo $register_validate; ?>";
    var  curTime  = 0;
    var disabled = 0;
    var curGetCodeBtn = $('#getCodeBtn');
    var curMailObj = $('#email');
    if(register_validate == 1){
        var pregStr = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
        var types = '邮箱地址';
        var type = 'email';
    }else{
        var pregStr = /((13[0-9])|(14[5|7])|(15([0-3]|[5-9]))|(18[0,5-9]))\d{8}$/;
        var types = '手机号码';
        var type = 'tel';
    }
    //send code
    function sendCode() {
        if(disabled)  return false;
        var mailUrl= $('#email').val();
        if (pregStr.test(mailUrl)) {
            var url = "<?php echo url('api/getFindPassWordCode'); ?>";
            var postData = {content: mailUrl,type:type};
            $.post(url, postData, function (resp) {
                if (resp.statusCode == 0) {
                    disabled = 1;
                    $('#mailVerifyCode').focus();
                    curTime = 35;
                    layer.msg(resp.error);
                    timerIndex = setInterval("timer()", 1000);
                } else {
                    layer.tips(resp.error, curMailObj);
                }
            }, 'JSON');
        } else {
            layer.tips('请输入正确的'+types, curMailObj);
            return false;
        }
    }
    function timer() {
        curTime--;
        if (curTime <= 0) {
            clearInterval(timerIndex);
            disabled = 0;
            curGetCodeBtn.html('获取验证码').on('click', function(){
            }).removeClass('sent');
        }else{
            curGetCodeBtn.html('获取验证码(' + curTime + '秒)').addClass('sent');
        }
    }
    function checkCode() {
        var mailUrl= $('#email').val();
        var code =  $('#mailVerifyCode').val();
        if (pregStr.test(mailUrl)) {
            var url = "<?php echo url('api/checkPassWordCode'); ?>";
            var postData = {content: mailUrl,code:code,type:type};
            $.post(url, postData, function (resp) {
                if (resp.statusCode == 0) {
                    $('#step1').hide('slow');
                    $('#step2').show('slow');
                } else {
                    layer.tips(resp.message, curMailObj);
                }
            }, 'JSON');
        } else {
            layer.tips('请输入正确的'+types, curMailObj);
            return false;
        }
    }
    function setPassWord() {
        curMailObj = $('#new');
        var newpass = curMailObj.val();
        var confirm = $('#confirm').val();
        if(newpass.length < 6 || (newpass.length >20)){
            layer.tips('密码为6~20位字母或数字', curMailObj);
            return false;
        }
        if(newpass != confirm) {
            layer.tips('两次密码不一致', curMailObj);
            return false;
        }
        $('#myform').submit();
    }
</script>
<?php if($status == '1'): ?>
<script>
$('#step1').hide();
$('#step2').hide();
$('#step3').show();
</script>
<?php endif; ?>
</body>
</html>