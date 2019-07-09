<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:27:"./tpl/ms360/novel/show.html";i:1531103068;s:30:"./tpl/ms360/common/header.html";i:1562559246;s:30:"./tpl/ms360/common/footer.html";i:1562231560;}*/ ?>
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
        <li class="nav-topics"><a href="<?php echo url('system_pay/recharge'); ?>" target="_blank"></li>
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

<link href="__ROOT__/tpl/ms360/static/css/novel.css" rel="stylesheet">
<link href="__ROOT__/tpl/ms360/static/css/video-sort.css" rel="stylesheet">
<link href="__ROOT__/tpl/ms360/static/css/msvod.css" rel="stylesheet">
<link href="__ROOT__/tpl/ms360/static/css/fonts.css" rel="stylesheet">
<style>
.novel-main .novel-left{box-shadow:none;}
</style>
<script>
<?php if($permit == 0): ?>
novelpermit(<?php echo $info['gold']; ?>,<?php echo $info['id']; ?>);
<?php endif; ?>
var page = 0;
var addLiIndex=1;
function replyComment(username,id,to_id){
var reply = '回复 @'+username+' : ';
var length = reply.length;
$('#to_user').val(id);
$('#to_id').val(to_id);
//alert(length);
$(' .comment-atuser').html(reply);
$('#comment_content').val(reply);
$('#comment_content').focus();
}
function getCommentList(){
var nowDate = new Date().getTime();
var times = "";
var url = "<?php echo url('api/getCommentList'); ?>";
var  resourceId = " <?php echo $info['id']; ?>";
var data = {
"page":page,
"resourceId":resourceId,
"resourceType":3,
};
var html = '';
$.ajax({
type: 'POST',
url: url,
data: data,
dataType: 'json',
success: function(data){
console.log(data);
$('#comment_num').html("("+data.data.count+")");
var datas = data.data.list;
if(datas){
page++;
datas.forEach(function(item) {
var headimgurl = '/static/images/user_dafault_headimg.jpg';
if(item.headimgurl){
headimgurl = item.headimgurl;
}
var time = parseInt(item.last_time*1000);
if(parseInt(time+60*30*1000) > nowDate){
times = '刚刚';
}else if(parseInt(time+60*60*1000) > nowDate){
times = '半个小时前';
} else if(parseInt(time+2*60*60*1000) > nowDate){
times = '1小时前';
}else{
var oDate = new Date(time);
var Hours = oDate.getHours()>10 ? oDate.getHours() :  '0'+oDate.getHours();
var Minutes = oDate.getMinutes()>10 ? oDate.getMinutes() :  '0'+oDate.getMinutes();
times = oDate.getFullYear()+'-'+(oDate.getMonth()+1)+'-'+oDate.getDate()+' '+Hours+':'+Minutes;
}
html += '<li id="common_'+item.id+'">';
html += '<div style="overflow: hidden;padding-bottom: 10px;">';
html += '   <div class="user-avatar">';
html += '       <a href="javascript:">';
html += '           <img src="'+headimgurl+'">';
html += '       </a>';
html += '    </div>';
html += '    <div class="comment-section">';
html += '   <div class="user-msinfo">';
html += '       <a href="javascript:" class="user-msname" style="color:#FF6600;">'+item.nickname+'</a>';
html += '       <span class="comment-timestamp">'+times+'</span>';
html += '       <span class="comment-Reply" onclick="replyComment(\''+item.nickname+'\',\''+item.send_user+'\',\''+item.id+'\')" ></span>';
html += '   </div>';
html += '   <div class="comment-text">'+item.content+'</div>';
html += '   </div>';
html += '</div>';
var list = item.list;
if(list!=undefined) {
list.forEach(function(it) {
var headimgurl = '/static/images/user_dafault_headimg.jpg';
if(it.headimgurl){
headimgurl = it.headimgurl;
}
var time = parseInt(it.last_time*1000);
if(parseInt(time+60*30*1000) > nowDate){
times = '刚刚';
}else if(parseInt(time+60*60*1000) > nowDate){
times = '半个小时前';
} else if(parseInt(time+2*60*60*1000) > nowDate){
times = '1小时前';
}else{
var oDate = new Date(time);
var Hours = oDate.getHours()>10 ? oDate.getHours() :  '0'+oDate.getHours();
var Minutes = oDate.getMinutes()>10 ? oDate.getMinutes() :  '0'+oDate.getMinutes();
times = oDate.getFullYear()+'-'+(oDate.getMonth()+1)+'-'+oDate.getDate()+' '+Hours+':'+Minutes;
}
html += '<div style="padding: 15px 20px;overflow: hidden;border-top: 1px solid #fbfbfb;">';
html += '    <div class="user-avatar">';
html += '    <a href="javascript:"><img src="'+headimgurl+'"></a>';
html += '    </div>';
html += '    <div class="comment-section">';
html += '    <div class="user-msinfo">';
html += '    <a href="javascript:" class="user-msname" style="color:#FF6600;">'+it.nickname+'</a>';
html += '    <span class="comment-timestamp">'+times+'</span>';
html += '       <span class="comment-Reply" onclick="replyComment(\''+it.nickname+'\',\''+it.send_user+'\',\''+item.id+'\')" ></span>';
html += '    </div>';
html += '    <div class="comment-text">'+it.content+'</div>';
html += '</div>';
html += '</div>';
})
}
html += ' </li>';
})
if(data.data.isMore == 1){
$('#more-comment').show();
}else{
$('#more-comment').hide();
}
$('#not-comment').remove();
$('#comment-list').append(html);
//$('#liAdd_'+curIndex).show('SLOW');
}
}
});
}
$(function () {
getCommentList();
//收藏
<?php if(!$isCollected): ?>
$(".fn-shoucang1").on("click",function () {
var collectData={type:'3',id:'<?php echo $info["id"]; ?>'};
$.post('<?php echo url("api/colletion"); ?>',collectData,function (data) {
if(data.resultCode==0){
$('.fn-shoucang1').addClass("isSelected");
layer.msg('收藏成功',{time:1000,icon:1});
$('#collectText').html('已收藏');
}else{
layer.msg('收藏失败，原因：'+data.error,{time:1000,icon:2});
}
},'json');
});
<?php endif; ?>
//点赞
<?php if(!$isGooded): ?>
$("#giveGoodBtn").on('click',function(){
var reqData={resourceType:'novel',resourceId:<?php echo $info['id']; ?>};
$.post('<?php echo url("api/giveGood"); ?>',reqData,function(data){
//console.log(data);
if(data.resultCode==0){
$('#goodNum').html(data.data.good);
$('#giveGoodBtn').addClass("isSelected");
layer.msg('点赞成功',{time:1000,icon:1});
}else{
layer.msg('点赞失败，原因：'+data.error,{time:1000,icon:2});
}
},'JSON');
});
<?php endif; ?>
$("#comment_content").on("keyup",function () {
var length = $("#comment_content").val().length;
var atuser_length  = $(".comment-atuser").html().length;
if(length < atuser_length){
$(".comment-atuser").html('');
$("#comment_content").val('');
$("#length").html(0);
$('#to_user').val(0);
$('#to_id').val(0);
}
if(atuser_length > 0){
length = (length - atuser_length) > 0 ?  (length - atuser_length) : 0;
}
$("#length").html(length);
if(length > 300){
var text = $("#comment_content").val().substring(0,300);
$("#comment_content").val(text);
}
});
//评论
$("#submit_comment").on("click",function () {
var content =  $.trim($("#comment_content").val());
var to_user = $("#to_user").val();
var to_id = $("#to_id").val();
if((content == "" || content == undefined || content == null || content == $(".comment-atuser").html())) {
layer.msg('请输入评论的内容!');
return false;
}
var reqData={resourceType:'3',resourceId:<?php echo $info['id']; ?>,content:content,to_user:to_user,to_id:to_id};
$.post('<?php echo url("api/comment"); ?>',reqData,function(data){
if(data.resultCode==0){
layer.msg(data.message,{time:1000,icon:1});
$("#comment_content").val('');
$("#length").html(0);
$(".comment-atuser").html('');
$('#to_user').val(0);
$('#to_id').val(0);
if(data.data.comment_examine_on != 1){
var headimgurl = '/static/images/user_dafault_headimg.jpg';
if(data.data.userinfo.headimgurl){
headimgurl = data.data.userinfo.headimgurl;
}
var html = '';
$('#not-comment').remove();
if(data.data.to_id != 0){
html += '<div style="padding: 15px 20px;overflow: hidden;border-top: 1px solid #fbfbfb;" id="common_'+data.data.id+'">';
html += '    <div class="user-avatar">';
html += '           <img src="'+headimgurl+'">';
html += '    </div>';
html += '    <div class="comment-section">';
html += '    <div class="user-msinfo">';
html += '    <a href="javascript:" class="user-msname" style="color:#FF6600;">'+data.data.userinfo.nickname+'</a>';
html += '    <span class="comment-timestamp">刚刚</span>';
html += '       <span class="comment-Reply" onclick="replyComment(\''+data.data.userinfo.nickname+'\',\''+data.data.userinfo.id+'\',\''+data.data.to_id+'\')" ></span>';
html += '    </div>';
html += '    <div class="comment-text">'+data.data.content+'</div>';
html += '   </div>';
html += '</div>';
$("#common_"+data.data.to_id).append(html);
var go_id = 'common_'+data.data.id;
window.location.href="#"+go_id;
}else{
html += '<li id="common_'+data.data.id+'">';
html += '<div style="overflow: hidden;padding-bottom: 10px;">';
html += '   <div class="user-avatar">';
html += '       <a href="javascript:">';
html += '           <img src="'+headimgurl+'">';
html += '       </a>';
html += '    </div>';
html += '    <div class="comment-section">';
html += '   <div class="user-msinfo">';
html += '       <a href="javascript:" class="user-msname" style="color:#FF6600;">'+data.data.userinfo.nickname+'</a>';
html += '       <span class="comment-timestamp">刚刚</span>';
html += '       <span class="comment-Reply" onclick="replyComment(\''+data.data.userinfo.nickname+'\',\''+data.data.userinfo.id+'\',\''+data.data.id+'\')" ></span>';
html += '   </div>';
html += '   <div class="comment-text">'+data.data.content+'</div>';
html += '   </div>';
html += '</div>';
html += ' </li>';
$("#comment-list ").prepend(html);
window.location.href="#comment_content";
}
$("#common_"+addLiIndex).hide().slideDown('fast');
addLiIndex++;
}
}else{
layer.msg('评论失败，原因：'+data.error,{time:2000,icon:2});
}
},'JSON');
});
});
</script>
<div class="s-body">
<div class="content">
<div class="spv-comment comment">
<div class="comment-left">
<div class="novel-main">
<div class="novel-left">
<h1 style="font-size:18px;"><?php echo $info['title']; ?></h1>
<div class="source" style="font-size:15px;">
•&nbsp;&nbsp;发布时间：<var><?php echo date("y-m-d H:i:s",$info['update_time']); ?></var>
&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp;作者：<?php if($info['user_id']>0): ?><a title="进入ta的主页"  href="<?php echo url('homepage/index',array('uid'=>$info['user_id'])); ?>"><var><?php echo $info['username']; ?></var></a><?php else: ?>管理员<?php endif; ?>
&nbsp;&nbsp;•
<span class="see" style="margin-bottom:5px;"><i class="btn fn-shoucang1 <?php if($collect_info=="已收藏"): ?>isSelected<?php endif; ?>"></i>
<?php if($collect_info=="已收藏"): ?><var id="collectText">已收藏</var><?php else: ?><var id="collectText">收藏</var><?php endif; ?></span>
<span class="see" style="margin-bottom:5px;"><i class="btn fn-zan2 <?php if($isGooded): ?>isSelected<?php endif; ?>" id="giveGoodBtn"></i><var id="goodNum"><?php echo $info['good']; ?></var></span>
</div>
<div class="source">
<?php if(is_array($tag_list) || $tag_list instanceof \think\Collection || $tag_list instanceof \think\Paginator): $i = 0; $__LIST__ = $tag_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
<span><?php echo $vo['name']; ?></span>
<?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<div class="paragraph">
<?php echo htmlspecialchars_decode($info['content']); ?>
</div>
<!--切换-->
<div class="cut">
<?php if(!empty($previous_info)): ?>
<!-- <a class="prev"><i class="btn fn-prev"></i>上一篇</a>
<a class="next">下一篇<i class="btn fn-next"></i></a>-->
<a class="prev" title="<?php echo $previous_info['title']; ?>" href="<?php echo url('novel/show',array('id'=>$previous_info['id'])); ?>">
<div class="prev-btn" style="margin-left: -7px;"><i class="btn fn-prev"></i></div>
<div class="prev-box">
<div class="img-bg">
<img src="<?php echo $previous_info['thumbnail']; ?>" />
</div>
<p><?php echo $previous_info['title']; ?></p>
</div>
</a>
<?php endif; if(!empty($next_info)): ?>
<a class="next" title="<?php echo $next_info['title']; ?>"  href="<?php echo url('novel/show',array('id'=>$next_info['id'])); ?>">
<div class="prev-box">
<div class="img-bg">
<img src="<?php echo $next_info['thumbnail']; ?>" />
</div>
<p><?php echo $next_info['title']; ?></p>
</div>
<div class="prev-btn" style="margin-right: -7px;"><i class="btn fn-next"></i></div>
</a>
<?php endif; ?>
</div>
</div>
</div>
<!--评论-->
<div class="area-form">
<div class="comment-form">
<div class="form-cell">
<?php if(session('member_id') <= 0): ?>
<div class="form-user-info">
<a href="javascript:;" class="form-user-login avatar">登录</a>
<span>|</span>
<a href="" target="_blank">注册</a>
</div>
<?php endif; ?>
<div class="form-wordlimit" style="margin-bottom:7px;">
<span class="form-wordlimit-input input-count" id="length">0</span>
<span class="form-wordlimit-upper">/300</span>
</div>
<div class="form-textarea form-textarea-picdom">
<textarea data-maxlength="300" name="content"
placeholder="看点槽点，不吐不快！别憋着，马上大声说出来吧！"  id="comment_content" ></textarea>
<div class="comment-atuser" style="position:absolute;left:5px;top:22px;background: #ebebeb"></div>
<input type="hidden" id="to_user" value="0">
<input type="hidden" id="to_id" value="0">
</div>
<div class="form-toolbar">
<div class="form-tool form-action">
<a href="javascript:;" class="form-btn-submit" id="submit_comment">发表评论</a>
</div>
</div>
</div>
</div>
</div>
<!--展示-->
<div class="area-box">
<div class="comment-tab">
<span class="comment-tab-left">全部评论<em class="num" id="comment_num">(0)</em></span>
<!--<span class="comment-tab-right">我的评论消息</span>-->
</div>
<div class="comment-list" >
<ul id="comment-list">
<li class='not-comment' id='not-comment'>暂没评论 ~</li>
</ul>
<div id="more-comment" style="display: none"><span onclick="getCommentList()">加载更多…<i class="btn fn-more"></i></span></div>
</div>
</div>
</div>
<!--相关推荐-->
<div class="comment-right">
<div class="sub-tab">
<p class="title">相关推荐</p>
<div class="select" style="display: block;">
<ul>
<?php if(!(empty($recom_list) || (($recom_list instanceof \think\Collection || $recom_list instanceof \think\Paginator ) && $recom_list->isEmpty()))): if(is_array($recom_list) || $recom_list instanceof \think\Collection || $recom_list instanceof \think\Paginator): $i = 0; $__LIST__ = $recom_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
<li>
<a href="<?php echo url('novel/show',array('id'=>$vo['id'])); ?>">
<div class="pic">
<img src="<?php echo $vo['thumbnail']; ?>">
</div>
<p><?php echo $vo['title']; ?></p>
<p class="content-like">
<span class="mod-like"><i class="btn fn-see"></i><?php echo $vo['click']; ?></span>
<span class="mod-like" style="float: right;"><i class="btn fn-zan2"></i><?php echo $vo['good']; ?></span>
</p>
</a>
</li>
<?php endforeach; endif; else: echo "" ;endif; else: ?>
<div class="not-comment not">暂时没有数据 ~</div>
<?php endif; ?>
</ul>
</div>
</div>
</div>
</div>
</div>
<?php 
$baseConfig = get_config_by_group('base');
$baseConfig['friend_link'] =  empty($seo['friend_link']) ? $baseConfig['friend_link'] : $seo['friend_link'];
$baseConfig['site_icp'] = empty($seo['site_icp']) ? $baseConfig['site_icp'] : $seo['site_icp'];
$baseConfig['site_statis'] = empty($seo['site_statis']) ? $baseConfig['site_statis'] : $seo['site_statis'];
$linkList=get_friend_link($baseConfig);
$type=getMenu();
 ?>
<div class="footer">
  <div class="wrapper clearfix">
    <div class="aboutus">
      <h4>关于我们</h4>
      <p>本网站严禁发表不合法的内容本站所有视频、图片、资讯均由网友发布，如有侵犯权限请联系本站客服删除，本站不承担任何版权相关的法律责任， 请遵守本站协议勿发布不合法内容,如果您不自觉遵守本站相关规定否则请单击离开谢谢合作。</p>
      <div class="videologo"><a><?php echo $seo['site_title']; ?></a></div>
    </div>
    <div class="business">
      <h4>商务洽谈</h4>
      <ul>
        <li><p>网站合作</p>邮箱：12345678@qq.com</li>
        <li><p>视频推广</p>邮箱：12345678@qq.com &nbsp;&nbsp;QQ群:123456789</li>
        <li><p>广告合作</p>邮箱：12345678@qq.com</li>
      </ul>
    </div>
    <div class="links clearfix">
      <h4>友情链接</h4>
       <ul>
        <?php if(is_array($linkList) || $linkList instanceof \think\Collection || $linkList instanceof \think\Paginator): $i = 0; $__LIST__ = $linkList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$link): $mod = ($i % 2 );++$i;?>
        <li><a href="<?php echo $link['url']; ?>" target="_blank"><?php echo $link['name']; ?></a></li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
         </ul>
          <h4>快速导航</h4>
	<ul>
        <?php if(is_array($type) || $type instanceof \think\Collection || $type instanceof \think\Paginator): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if(!(empty($vo['sublist']) || (($vo['sublist'] instanceof \think\Collection || $vo['sublist'] instanceof \think\Paginator ) && $vo['sublist']->isEmpty()))): if(is_array($vo['sublist']) || $vo['sublist'] instanceof \think\Collection || $vo['sublist'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['sublist'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
	        <li><a href="<?php echo $v['url']; ?>" target="_blank"><?php echo $v['name']; ?></a></li>
		<?php endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; ?>
         </ul>


    </div>
  </div>
  <div class="copyright">ICP备案号：<?php echo $baseConfig['site_icp']; ?>  - Copyright © 2014-2018 All Rights Reserved - <a href="#">免责声明</a> - <a href="#">意见反馈</a> - <a href="#">合作联系</a> - <?php echo htmlspecialchars_decode($baseConfig['site_statis']); ?></div>
</div>
<div class="totop">
  <ul>
   <li><a href="javascript:scroll(0,0)" class="totop-top" target="_self"><span>返回顶部</span></a></li>
  </ul>
</div>
<script src="__ROOT__/tpl/ms360/static/js/js.js" ></script>
<div class="modal" id="login-modal">
<a class="close" data-dismiss="modal">×</a>
<h1>登录</h1>
<?php  $longwait=get_sanfanlogin(); if(is_array($longwait) || $longwait instanceof \think\Collection || $longwait instanceof \think\Paginator): if( count($longwait)==0 ) : echo "" ;else: foreach($longwait as $key=>$vo): ?>
<ul class="login-bind-tp">
<?php if($vo['login_code'] == 'qq'): ?>
<li class="qweibo"> <a href="<?php echo url('open/login',['code'=>'qq']); ?>"><em>&nbsp;</em> QQ登录</a> </li>
<?php endif; if($vo['login_code'] == 'wechat'): ?>
<li class="douban"> <a href="<?php echo url('open/login',['code'=>'wechat']); ?>"><em>&nbsp;</em> 微信登录</a> </li>
<?php endif; ?>
</ul>
<?php endforeach; endif; else: echo "" ;endif; ?>
<p>
</p>
<form class="login-form clearfix">
<div class="form-arrow"></div>
<input id="userName" type="text" placeholder="用户名/手机号/邮箱">
<input id="password" type="password" placeholder="输入登陆密码：">
<?php if(get_config('verification_code_on')): ?>
<input type="text" name="verifyCode" id="verifyCode" placeholder="请输入验证码" style="width: 50%;float: left;">
<div class="yz-r fr"> <img src="<?php echo url('api/getCaptcha'); ?>" onClick="this.src='<?php echo url('api/getCaptcha'); ?>?'+Math.random()" id="verifyCodeImg" style="float: right;width:120px;height:39px;border: 1px #ffa900 solid;"/> </div><br>
<?php endif; ?>
<input type="submit" onclick="login()" class="button-blue login" value="登录">
<div class="clearfix"></div>
<a href="<?php echo url('/index/register'); ?>" class="forgot">没有账号？去注册</a>
<?php if($register_validate != 0): ?><a href="<?php echo url('member/seek_pwd'); ?>"><label class="remember">忘记密码？</label></a><?php endif; ?>

</form>
</div>
<script type="text/javascript" src="__ROOT__/tpl/ms360/static/sign/js/modal.js"></script>
<link rel="stylesheet" type="text/css" href="__ROOT__/tpl/ms360/static/sign/css/style.css">
<script type="text/javascript">
$(document).ready(function(){
$("a.forgot").click(function(){
$("#login-modal").modal("hide");
$("#forgetform").modal({show:!0})
});
$("#signup-modal").modal("hide");
$("#forgetform").modal("hide");
$("#login-modal").modal("hide");
$("#activation-modal").modal("hide");
$("#setpassword-modal").modal("hide");
});
</script>
<script>
$(document).ready(function(){
$('.flicker-example').flicker();
});
</script>
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
console.log(data);
layer.msg('注册成功', {time: 1000, icon: 1}, function() {
location.reload();
});
}else{
layer.msg(data.error, {icon: 2, anim: 6, time: 1000});
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
$(".select-loginType .account-login").click(function(){
$(this).parent().hide().siblings().show();
});
$(".return-qqWechat").click(function () {
$(this).parent().parent().hide().siblings().show();
});
});
</script>
<script>
layui.use(['form', 'layedit', 'laydate'], function(){
});
if(!!window.ActiveXObject || "ActiveXObject" in window){
location.href="<?php echo url('index/remind'); ?>"
}
</script>
<?php if($login_status['resultCode'] == 3): ?>
<script>
layer.msg('该账号已在其他地方登陆',
{
icon: 5,
time: 0,
shadeClose: false,
shade: 0.8,
btn: ['确定'],
yes:function (index) {
layer.close(index);
window.location.reload();
},
success: function (layero) {
var btn = layero.find('.layui-layer-btn');
btn.css('text-align', 'center');
}
});
</script>
<?php endif; ?>
</body>
</html>
