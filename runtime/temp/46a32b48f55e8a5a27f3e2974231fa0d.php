<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:31:"./tpl/ms360/index/register.html";i:1562224423;}*/ ?>
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
<link rel="stylesheet" href="__ROOT__/tpl/ms360/static/css/fonts.css">
<script type="text/javascript" src="__ROOT__/tpl/ms360/static/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="__ROOT__/tpl/ms360/static/js/layer/layer.js"></script>
<script type="text/javascript" src="__ROOT__/tpl/ms360/static/js/layui/layui.js"></script>
</head>
<body>
<div id="eg-header">
<div class="eg-width-1200">
<div class="eg-logo fl">
<div class="g1 eg-pt-5 fl">
<a href="/" title="<?php echo $seo['site_title']; ?>">
<img src="<?php echo $seo['site_logo']; ?>" alt="<?php echo $seo['site_title']; ?>">
</a>
</div>
</div>
<div class="eg-font-size-22 eg-lh-52 eg-pl-15 fl">用户注册</div>
<div class="cb"></div>
</div>
</div>
<div id="eg-register-1" class="eg-register-1 pos-r ">
<div class="register-content mar-center border_color2">
<div class="eg-border-b tc">
<div class="row-one">
<img src="__ROOT__/tpl/ms360/static/sign/images/find_password.png" alt="" class="mar-left-267 mar-bom-25">
<p class="eg-font-size-22 font mar-bot-10">用户注册</p>
<p class="eg-font-size-16">为了您更好的体验，请注册</p>
</div>
</div>
<div class="form01 ">
<div class="row-onef">
<label class="label-st02"><span class="xing">*</span>账户</label>
<div class="collection error500">
<input type="text" name="mobile" id="reg_userName" class="input-txt01" <?php if($register_validate == 1): ?>placeholder="邮箱地址"<?php else: if($register_validate == 2): ?>placeholder="手机号码"<?php else: ?>placeholder="用户名"<?php endif; endif; ?>>
</div>
</div>
<div class="row-onef">
<label class="label-st02"><span class="xing">*</span>昵称</label>
<div class="collection error300">
<input type="text" name="nickname" id="nickname" class="input-txt01" placeholder="用户昵称">
</div>
</div>
<div class="row-onef">
<label class="label-st02"><span class="xing">*</span>密码</label>
<div class="collection error502">
<input type="password" name="password" id="reg_pwd" class="input-txt01" placeholder="点击输入">
</div>
</div>
<div class="row-onef">
<label class="label-st02"><span class="xing">*</span></span>确认密码</label>
<div class="collection">
<input type="password" name="password_confirm" id="reg_pwd_re" class="input-txt01" placeholder="确认密码">
</div>
</div>
<?php if($register_validate != 0): ?>
<div class="row-onef">
<label class="label-st02"><span class="xing">*</span>手机验证码</label>
<div class="collection pos-r error501">
<input type="text"  name="verifyCode" id="codes" class="code input-txt01" placeholder="手机验证码" />
<span id="register_code" onclick="getCode()" style="border:0px solid #ddd;padding:5px 5px 5px;border-radius:10px;color:#fff;background:#66CC33;font-size:13px;">获取验证码</span>
</div>
</div>
<?php endif; if(get_config('verification_code_on')): ?>
<div class="row-onef">
<label class="label-st02"><span class="xing">*</span>验证码</label>
<div class="collection pos-r error501">
<input type="text" name="verifyCode" id="codes" class="code input-txt01" placeholder="验证码" />
<img src="<?php echo url('api/getCaptcha'); ?>?<?php echo time(); ?>" onclick="this.src='<?php echo url('api/getCaptcha'); ?>?'+Math.random()" id="verifyCodeImg" />
</div>
</div>
<?php endif; ?>
</div>
<div class="row-onef">
<button class="btn-wst01 btn-wst01-creator mar-left-990" id="btn-wst01" onclick="register()">注册</button>
</div>
<div class="row-onev pad-left-132 " style="width: 455px;margin-left:30px;">
<span class="fl "><a href="<?php echo url('index/login'); ?>" class="rc-st01">已有账号？去登录</a></span>
<?php if($register_validate != 0): ?>
<span class="fr mar-right-58">
<a href="<?php echo url('member/seek_pwd'); ?>" title="" class="rc-st01">找回密码</a>
</span>
<?php endif; ?>
</div>
</div>
</div>
<script type="text/javascript">
var cpa_uid="<?php echo request()->param('uid/d'); ?>"; //cpa
//console.log("当前用户Id:<?php echo session('member_id'); ?>");
var disabled = 0;
var register_validate = "<?php echo $register_validate; ?>";
if(register_validate == 1){
var reg_userName = '邮箱地址';
}else if(register_validate == 2){
var reg_userName = '手机号码';
}else{
var reg_userName = '用户名';
}
function login() {
var user = $('#userName').val();
var password = $('#password').val();
var verifyCode=$('#verifyCode');
if (user == '' || password == '') {
layer.msg(reg_userName+'或密码不能为空.', {icon: 2, anim: 6, time: 1000});
return false;
}
if(verifyCode.val()==''){
layer.msg('验证码不能为空.', {icon: 2, anim: 6, time: 1000});
verifyCode.focus();
return false;
}
var url = "<?php echo url('api/login'); ?>";
$.post(url, {userName: user, password: password,verifyCode:verifyCode.val()}, function (data) {
if (data.statusCode == 0) {
layer.msg('登陆成功', {time: 1000, icon: 1}, function() {
location.reload();
});
} else {
layer.msg(data.error, {icon: 2, anim: 6, time: 1000});
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
function getCode(){
var user = $('#reg_userName').val();
if(disabled)  return false;
if (user == '') {
$('#reg_userName').focus();
layer.msg(reg_userName+'不能为空.', {icon: 2, anim: 6, time: 1000});
return false;
}
var url = "<?php echo url('api/getRegisterCode'); ?>";
$.post(url, {username: user,reg_username:reg_userName}, function (data) {
if (data.statusCode == 0) {
disabled = 1;
layer.msg(data.error, {icon: 1, anim: 6, time: 3000});
$('#register_code').html('60');
codetTmes();
}else{
layer.msg(data.error, {icon: 2, anim: 6, time: 1000});
}
}, 'JSON');
}
function register(){
var user = $('#reg_userName').val();
var password = $('#reg_pwd').val();
var confirm_password=$('#reg_pwd_re').val();
var verifyCode=$('#codes').val();
var nickname = $('#nickname').val();
if (user == '') {
layer.msg(reg_userName+'不能为空.', {icon: 2, anim: 6, time: 1000});
return false;
}
if (nickname == '') {
layer.msg('用户昵称不能为空.', {icon: 2, anim: 6, time: 1000});
return false;
}
if (password == '') {
layer.msg('密码不能为空.', {icon: 2, anim: 6, time: 1000});
return false;
}
if (password != confirm_password) {
layer.msg('两次密码不一致.', {icon: 2, anim: 6, time: 1000});
return false;
}
if(verifyCode==''){
layer.msg('验证码不能为空.', {icon: 2, anim: 6, time: 1000});
$('#codes').focus();
return false;
}
var url = "<?php echo url('api/register'); ?>";
$.post(url, {username: user,nickname:nickname, password: password,confirm_password:confirm_password,verifyCode:verifyCode,cpa_uid:cpa_uid}, function (data) {
if (data.statusCode == 0) {
layer.msg('注册成功', {time: 1000, icon: 1}, function() {
    window.location.href="<?php echo url('index/index'); ?>";
});
}else{
layer.msg(data.error, {icon: 2, anim: 6, time: 1000}, function() {
  	$verifyCodeImg = "<?php echo url('api/getCaptcha'); ?>?"+Math.random();
    $('#verifyCodeImg').attr('src',$verifyCodeImg);
});
}
}, 'JSON');
}
function sign(){
var url = "<?php echo url('api/sign'); ?>";
$.post(url, {}, function (data) {
if (data.resultCode == 0) {
$('.sign-btn').find('var').html('+'+data.data['value']);
$('.sign-btn').addClass("signs");
$('.sign-btn').addClass("Completion");
layer.msg('签到成功',  {icon: 1, anim: 6, time: 2000},function () {
$('.sign-btn').removeClass("signs");
});
}else{
layer.msg(data.error, {icon: 2, anim: 6, time: 2000});
}
}, 'JSON');
}
function logout(){
var url="<?php echo url('api/logout'); ?>";
$.post(url,{},function(){
layer.msg('退出成功', {time: 1000, icon: 1}, function() {
location.reload();
});
},'JSON');
}
//$.post("",{userName:})
$(function () {
  $verifyCodeImg = "<?php echo url('api/getCaptcha'); ?>?"+Math.random();
    $('#verifyCodeImg').attr('src',$verifyCodeImg);
$(".select-loginType .account-login").click(function(){
$(this).parent().hide().siblings().show();
});
$(".return-qqWechat").click(function () {
$(this).parent().parent().hide().siblings().show();
});
});
</script>
</body>
</html>