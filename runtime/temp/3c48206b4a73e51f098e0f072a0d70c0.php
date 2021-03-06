<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:28:"./tpl/ms360/index/login.html";i:1562154604;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<?php $menu = getMenu(); $register_validate = empty(get_config('register_validate')) ? 0 : get_config('register_validate');?>
<title><?php echo (isset($page_title) && ($page_title !== '')?$page_title:""); ?>_<?php echo $seo['site_title']; ?></title>
<meta name="keywords" lang="zh-CN" content="<?php echo $seo['site_keywords']; ?>"/>
<meta name="description" lang="zh-CN" content="<?php echo $seo['site_description']; ?>" />
<meta name="renderer" content="webkit">
<link href="__ROOT__/tpl/ms360/static/sign/css/style_register.css" rel="stylesheet" type="text/css">
<link href="__ROOT__/tpl/ms360/static/sign/css/style_common.min.css" rel="stylesheet" type="text/css"/>
<link href="__ROOT__/tpl/ms360/static/sign/css/style_ergeng2016_new.css" rel="stylesheet" type="text/css"/>
<link href="__ROOT__/tpl/ms360/static/sign/css/style_icon_all.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="__ROOT__/tpl/ms360/static/js/jquery-3.2.1.min.js"></script>
</head>
<body>
<div id="eg-header">
<div class="eg-width-1200">
<div class="eg-logo fl">
<div class="g1 eg-pt-5 fl">
<a href="/" title="<?php echo $seo['site_title']; ?>" style="display: block;">
<img src="<?php echo $seo['site_logo']; ?>" alt="<?php echo $seo['site_title']; ?>">
</a>
</div>
</div>
<div class="eg-font-size-22 eg-lh-52 eg-pl-15 fl">用户登录</div>
<div class="cb"></div>
</div>
</div>
<div id="eg-register-1" class="eg-register-1 pos-r ">
<div class="register-content mar-center">
<div class="eg-border-b tc">
<div class="row-one">
<img src="__ROOT__/tpl/ms360/static/sign/images/find_password.png" alt="" class="mar-left-267 mar-bom-25">
<p class="eg-font-size-22 font mar-bot-10">用户登录</p>
<p class="eg-font-size-16">为了您更好的体验，请登录</p>
</div>
</div>
<div class="form01">
<div class="row-onef">
<label class="label-st02"><span class="xing">*</span>帐号</label>
<div class="collection error500">
<input type="text" name="mobile" id="userName" class="input-txt01" placeholder="手机号">
</div>
</div>
<div class="row-onef">
<label class="label-st02"><span class="xing">*</span>密码</label>
<div class="collection error500">
<input type="password" name="password" id="password" class="input-txt01" placeholder="密码">
</div>
</div>
<?php if(get_config('verification_code_on')): ?>
<div class="row-onef">
<label class="label-st02"><span class="xing">*</span>验证码</label>
<div class="collection error500 pos-r">
<input type="password" name="password" id="verifyCode" class="input-txt01" placeholder="验证码">
<img src="<?php echo url('api/getCaptcha'); ?>" class="check-btn pos-a" style="border: 0;" onclick="this.src='<?php echo url('api/getCaptcha'); ?>?'+Math.random()" id="verifyCodeImg" />
</div>
</div>
<?php endif; ?>
<div class="row-onet pad-left-132  pos-r" style="width: 455px;">
<span class="video_check_num video_check_num3 pos-a" style="display: none;left:25px;right: auto;">
<img src="__ROOT__/tpl/ms360/static/sign/images/danger.png" alt="">
<span class="error_info">号码格式有误，请重新输入</span>
</span>
</div>
<div class="row-onef">
<button class="btn-wst01 btn-wst01-creator mar-left-80 submit-btn" id="btn-wst01" onclick="return login()">登 录</button>
</div>
<div class="row-onev pad-left-132 " style="width: 455px;">
</div>
</div>
</div>
</div>
<script type="text/javascript">

    //console.log("当前用户Id:<?php echo session('member_id'); ?>");
    var disabled = 0;
    function login() {
        var user = $('#userName').val();
        var password = $('#password').val();
        var verifyCode=$('#verifyCode');
        if (user == '' || password == '') {
            $(".row-onet .pos-a").show();
            $(".error_info").html("用户名或密码不能为空！");
            return  false;
        }

        if(verifyCode.val()==''){
            $(".row-onet .pos-a").show();
            $(".error_info").html("验证码不能为空!");
            verifyCode.focus();
            return false;
        }
        var url = "<?php echo url('api/login'); ?>";
        $.post(url, {userName: user, password: password,verifyCode:verifyCode.val()}, function (data) {

            if (data.statusCode == 0) {
                /*layer.msg('登陆成功', {time: 1000, icon: 1}, function() {
                 location.reload();
                 });*/
                $(".row-onet .pos-a").show();
                $(".error_info").html("登陆成功");
                location.href="/";
            } else {
                $(".row-onet .pos-a").show();
                $(".error_info").html(data.error);
//                layer.msg(data.error, {icon: 2, anim: 6, time: 1000});
                $("#verifyCodeImg").click();
            }
        }, 'JSON');

    }

    $(document).keyup(function(event){
        if(event.keyCode ==13){
            if($(".login").is(":hidden")){
                return null;
            }else{
                login();
            }

        }
    });


    function codetTmes() {
        var second = $('#register_code').html();
        second--;
        if(second > 0){
            $('#register_code').html(second);
            setTimeout("codetTmes()",1000);
        }else{
            $('#register_code').html('获取验证码');
            disabled = 0;
        }
    }


</script>
</body>
</html>
