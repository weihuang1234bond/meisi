<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:27:"./tpl/ms360/video/play.html";i:1562590182;s:30:"./tpl/ms360/common/header.html";i:1562592688;s:30:"./tpl/ms360/common/footer.html";i:1562231560;}*/ ?>
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

<link href="__ROOT__/tpl/ms360/static/css/detail.css" rel="stylesheet">
<link href="__ROOT__/tpl/ms360/static/css/player.css" rel="stylesheet">
<style>
.layui-layer-hui{
background-color: #fff!important;
color:#000;
}
.layui-layer-hui .layui-layer-content{
font-size:16px!important;
text-align: left!important;
}
.important{
font-weight: bold;
color:#843534;
}
.member_link{
border:none!important;
padding: 0px !important;
}
</style>
<div class="alternate">
  <div class="wrapper clearfix pad26">
    <div class="barrage-box"> </div>
    <div class="live-player" style="border-radius:5px;">
      <p style="line-height:25px;font-size:15px;color:#fff;">&nbsp;&nbsp;正在播放：<?php echo $videoInfo['title']; ?></p>
      <div class="player-box" style="border-radius:5px;">
        <div class="play-box" id="playerBox" style="height:473px;"> <img src="<?php echo $videoInfo['thumbnail']; ?>" width="100%" height="100%" /> </div>
      </div>
    </div>
    <div class="host-box" style="border-radius:5px;">
     <!--  <div class="host-header"> <a <?php if($videoInfo['user_id']>0): ?>href="<?php echo url('homepage/index',array('uid'=>$videoInfo['user_id'])); ?>" target="_blank"<?php else: ?>href="#" onclick="alert('管理员没有开通个人主页哦~！');"<?php endif; ?>> <img src="<?php echo (isset($videoInfo['headimgurl']) && ($videoInfo['headimgurl'] !== '')?$videoInfo['headimgurl']:'/static/images/user_dafault_headimg.jpg'); ?>"></a></div>
      <div class="host-name"><a <?php if($videoInfo['user_id']>0): ?>href="<?php echo url('homepage/index',array('uid'=>$videoInfo['user_id'])); ?>" target="_blank"<?php else: ?>href="#" onclick="alert('管理员没有开通个人主页哦~！');"<?php endif; ?>><?php if($videoInfo['user_id']>0): ?><?php echo (isset($videoInfo['member']) && ($videoInfo['member'] !== '')?$videoInfo['member']:''); else: ?>管理员<?php endif; ?></a></div>
      <div class="host-tags"> <span class="host-tags-1" id="giveGoodBtn"><i class="fa fa-thumbs-o-up"></i> 支持（<var id="goodNum"><?php echo $videoInfo['good']; ?></var>）</span> <span class="host-tags-2 fn-shoucang1" id="shoucang"><i class="fa fa-star"></i> <var id="shoucang"><?php if($isCollected): ?>已收藏<?php else: ?>收藏<?php endif; ?></var></span> </div>
      <div class="host-num">
        <p>视频日期：<?php echo date('Y-m-d', $videoInfo['add_time']); ?></p>
        <p>打赏人次：<var id="count" style="color:red;"><?php echo $count; ?></var> 次<span>|</span>打赏金额：<var id='countprice' style="color:red;"><?php echo $count_price; ?></var> 元</p>
      </div>
      <div class="mshost-concerned" style="margin-top:0px;"> <a <?php if($videoInfo['user_id']>0): ?>href="<?php echo url('homepage/index',array('uid'=>$videoInfo['user_id'])); ?>" target="_blank"<?php else: ?>href="#" onclick="alert('管理员没有开通个人主页哦~！');"<?php endif; ?> class="host-btn">TA的主页</a> </div>
      <div class="share1" style="padding: 0 18px 20px;margin-top:50px;">
        <div class="bshare-custom icon-medium"><a title="分享到QQ空间" class="bshare-qzone"></a> <a title="分享到新浪微博" class="bshare-sinaminiblog"></a><a title="分享到人人网" class="bshare-renren"></a> <a title="分享到腾讯微博" class="bshare-qqmb"></a><a title="分享到网易微博" class="bshare-neteasemb"></a> <a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a><span class="BSHARE_COUNT bshare-share-count">0</span></div>
        <script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=2&amp;lang=zh"></script>
        <script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script>
      </div> -->
    </div>
  </div>
  <div style="width:1200px;margin: auto;height:60px;padding: 0px 0px 0px;">
    <!-- <p style="float:right;">
    <div class="reward" style="display: block;float:right;padding:7px 0px 0px;text-align: center;">
      <div class="reward-box" style="overflow:hidden;">
        <div class="reward-content" id="gift_box"> </div>
      </div>
    </div>
    </p>
    <p style="float:right;">
    <div class="reward" style="display: block;float:right;padding:7px 0px 10px;text-align: center;">
      <div class="reward-box" style="overflow:hidden;border: 1px solid #eee;padding:5px;margin-right: 5px;border-radius: 5px;color:#4B4B4B;background-color: #f6f6f6;"> <b style="">打赏<br>
        作者</b> </div>
    </div>
    </p>
    <p style="line-height:60px;float:left;margin-right:30px;"> <b style="font-size:15px;">分类：</b> <a href="/video/lists.html?cid=<?php echo (isset($videoInfo['classid']) && ($videoInfo['classid'] !== '')?$videoInfo['classid']:''); ?>" target="_blank" style="border: 1px solid #00aaee;padding: 5px;margin-right: 5px;border-radius: 5px;color: #00aaee;"><?php echo (isset($videoInfo['classname']) && ($videoInfo['classname'] !== '')?$videoInfo['classname']:''); ?></a> </p>
    <?php if($videoInfo['taglist']): ?>
      <p style="line-height:60px;float:left;margin-right:30px;"> <b style="font-size:15px;">标签：</b><?php if(is_array((isset($videoInfo['taglist']) && ($videoInfo['taglist'] !== '')?$videoInfo['taglist']:'')) || (isset($videoInfo['taglist']) && ($videoInfo['taglist'] !== '')?$videoInfo['taglist']:'') instanceof \think\Collection || (isset($videoInfo['taglist']) && ($videoInfo['taglist'] !== '')?$videoInfo['taglist']:'') instanceof \think\Paginator): $i = 0; $__LIST__ = (isset($videoInfo['taglist']) && ($videoInfo['taglist'] !== '')?$videoInfo['taglist']:'');if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?> <a  href="/video/lists.html?tag_id=<?php echo $v['id']; ?>" target="_blank" style="border: 1px solid #da2657;padding: 5px;margin-right: 5px;border-radius: 5px;color: #da2657;"><?php echo (isset($v['name']) && ($v['name'] !== '')?$v['name']:''); ?></a><?php endforeach; endif; else: echo "" ;endif; ?> </p>
    <?php endif; ?>
    <p style="line-height:60px;float:left;"> <b style="font-size:15px;"><?php echo $classname['name']; ?>：</b><a  href="/video/lists.html?area_id=<?php echo (isset($videoInfo['area_id']) && ($videoInfo['area_id'] !== '')?$videoInfo['area_id']:'0'); ?>" target="_blank" style="border: 1px solid #FF5722;padding: 5px;margin-right: 5px;border-radius: 5px;color: #FF5722;"><?php echo (isset($classarea['name']) && ($classarea['name'] !== '')?$classarea['name']:'未知'); ?></a> </p> -->
  </div>
  <?php if(!(empty($videoInfo['info']) || (($videoInfo['info'] instanceof \think\Collection || $videoInfo['info'] instanceof \think\Paginator ) && $videoInfo['info']->isEmpty()))): ?>
  <div class="section" >
    <div class="wrapper clearfix bigbox">
      <div class="wrapper">
        <h3>视频<span>简介</span></h3>
        <div style="margin-top:10px;border-top: 1px solid #e0e0e0;font-size:13px;line-height:22px;">
          <p style="margin-top:10px;"><?php echo htmlspecialchars_decode($videoInfo['info']); ?></p>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>
  <script src="__ROOT__/tpl/ms360/static/js/zoom.js"></script>
  <style>
body{background: #f5f5f5}
.bigimg{width:600px;position: fixed;left: 0;top: 0; right: 0;bottom: 0;margin:auto;display: none;z-index:9999;border: 10px solid #fff;}
.mask{position: fixed;left: 0;top: 0; right: 0;bottom: 0;background-color: #000;opacity:0.5;filter: Alpha(opacity=50);z-index: 98;transition:all 1s;display: none}
.bigbox{width:1200px;background: #fff;border:1px solid #ededed;margin:0 auto;border-radius: 10px;overflow: hidden;padding:10px;}
.bigbox>.imgbox{width:400px;height:250px;float:left;border-radius:5px;overflow: hidden;margin: 0 10px 10px 10px;}
.bigbox>.imgbox>img{width:100%;}
.imgbox:hover{cursor:zoom-in}
.mask:hover{cursor:zoom-out}
.mask>img{position: fixed;right:10px;top: 10px;width: 60px;}
.mask>img:hover{cursor:pointer}
</style>
  <script>
$(function(){
var obj = new zoom('mask', 'bigimg','smallimg');
obj.init();
})
</script>
  <?php if(!(empty($img) || (($img instanceof \think\Collection || $img instanceof \think\Paginator ) && $img->isEmpty()))): ?>
  <div class="section" >
    <div class="wrapper clearfix bigbox">
      <div class="wrapper">
        <h3>视频<span>截图</span></h3>
        <div style="margin-top:10px;border-top: 1px solid #e0e0e0;"> <?php if(is_array($img) || $img instanceof \think\Collection || $img instanceof \think\Paginator): $i = 0; $__LIST__ = $img;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
          <p style="margin-top:10px;float:left;padding: 0 7px 5px;" class="imgbox"><img src="<?php echo $v; ?>" class="smallimg" width="225" height="140"></p>
          <?php endforeach; endif; else: echo "" ;endif; ?> </div>
      </div>
    </div>
  </div>
  <img src="" alt="" class="bigimg">
  <div class="mask"></div>
  <?php endif; ?>
  <div class="section">
    <div class="wrapper clearfix bigbox"">
      <div class="wrapper">
        <h3>猜你<span>喜欢</span></h3>
        <?php
        $params = array(
        'type' => 'video',
        'limit'=>10,
        );
        $recom_list = get_recom_data($params);
        ?>
        <ul class="live-list clearfix">
          <?php if(is_array($recom_list) || $recom_list instanceof \think\Collection || $recom_list instanceof \think\Paginator): $i = 0; $__LIST__ = $recom_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
          <li> <a href="<?php echo url('video/play',array('id'=>$vo['id'])); ?>" title="<?php echo $vo['title']; ?>"> <img src="/tpl/ms360/static/images/404.png" data-original="<?php echo $vo['thumbnail']; ?>">
            <p class="title"> <span><?php echo $vo['title']; ?></span> <em><?php echo $vo['click']; ?></em> </p>
            <p class="desc"> <span>20<?php echo date("y-m-d",$vo['update_time']); ?></span> <em><i class="fa fa-usd" aria-hidden="true"></i> <?php echo $vo['gold']; ?></em> </p>
            <p class="play"></p>
            <p class="time"><?php echo $vo['play_time']; ?></p>
            </a> 
			</li>
          <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </div>
    </div>
    <div class="section" >
      <div class="wrapper clearfix bigbox">
        <div class="wrapper">
          <h3>视频<span>评论</span></h3>
          <div class="area-form">
            <div class="comment-form">
              <div class="form-cell">
                <div class="form-wordlimit"> <span class="form-wordlimit-input input-count" id="length">0</span> <span class="form-wordlimit-upper">/300</span> </div>
                <div class="form-textarea form-textarea-picdom" style="position:relative">
                  <textarea data-maxlength="300" name="content"placeholder="看点槽点，不吐不快！别憋着，马上大声说出来吧！"  id="comment_content" ></textarea>
                  <div class="comment-atuser" style="position:absolute;left:5px;top:41px;background: #ebebeb"></div>
                  <input type="hidden" id="to_user" value="0">
                  <input type="hidden" id="to_id" value="0">
                </div>
                <div class="form-toolbar">
                  <div class="form-tool form-action"> <a href="javascript:;" class="form-btn-submit" id="submit_comment">发表评论</a> </div>
                </div>
              </div>
            </div>
          </div>
          <div class="area-box">
            <div class="comment-tab"> <span class="comment-tab-left">全部评论<em class="num" id="comment_num">(0)</em></span> </div>
            <div class="comment-list" >
              <ul id="comment-list">
                <li id='not-comment'>暂没评论~</li>
              </ul>
              <div id="more-comment"><span onclick="getCommentList()">更多<i class="btn fn-more"></i></span></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
var viewer = new Viewer(document.getElementById('video-img'), {
url: 'data-original'
});
</script>
<script type="text/javascript" src="/static/ckplayer/ckplayer.js"></script>
<style>
.layui-layer-hui{
background-color: #fff!important;
color:#000;
}
.layui-layer-hui .layui-layer-content{
font-size:16px!important;
text-align: left!important;
}
.important{
font-weight: bold;
color:#843534;
}
.member_link{
border:none!important;
padding: 0px !important;
}
</style>
<script src="__ROOT__/tpl/ms360/static/js/video.js"></script>
<script type="text/javascript">
var playRequestUrl='<?php echo url("api/payVideo"); ?>';    //*必需配置项
var player,timer;
var page = 0;
var addLiIndex=1;
var trySeeTime=10;
function adjump(){
var canJumpAd="<?php echo $adSetting['skip_ad_on']; ?>";
if(canJumpAd==1){
player.videoPlay();
}else{
layer.msg('您不能跳过广告',{icon:2,time:2000});
}
}
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
var  resourceId = " <?php echo $videoInfo['id']; ?>";
var data = {
"page":page,
"resourceId":resourceId,
"resourceType":1,
};
var html = '';
$.ajax({
type: 'POST',
url: url,
data: data,
dataType: 'json',
success: function(data){
$('#comment_num').html("("+data.data.count+")");
var datas = data.data.list;
if(datas==undefined) return false;
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
html += '       <a href="javascript:" class="user-msname">'+item.nickname+'</a>';
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
html += '    <div class="user-info">';
html += '    <a href="javascript:" class="user-name">'+it.nickname+'</a>';
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
}
});
}
function loadedHandler(){
if(player.getMetaDate()){
player.addListener('pause', pauseHandler);
player.addListener('play', playHandler);
}
}
function pauseHandler(){
console.log('pause');
clearInterval(timer);
if(trySeeTime>0)layer.msg('试看计时暂停',{icon:6,time:1000});
}
function playHandler(){
layer.msg('试看计时开始……',{icon:6,time:1000});
timer=setInterval(checkTrySeeTime,1000);
}
function checkTrySeeTime(){
if(trySeeTime<=0){
layer.msg('很抱歉，试看时间到.',{icon:2,time:1000});
//setTimeout("videoPlayInit(<?php echo $videoInfo['id']; ?>)",2000);
setTimeout("location.href=\"<?php echo url('index/prompt',['id'=>$videoInfo['id']]); ?>\"",1500);
player.videoPause();
}else{
trySeeTime--;
console.log(trySeeTime);
}
}
function createPlayer(playParams,isTrySee){
//console.log(playParams);
if(isTrySee==undefined) isTrySee=false;
if(layer!=undefined) layer.closeAll();
var vodUrl=(playParams==undefined)?'#':playParams.videoInfo.url;
var params={
container: '#playerBox',
variable: 'player',
poster:'<?php echo $videoInfo["thumbnail"]; ?>',
video: vodUrl,
//loaded:'loadedHandler',
autoplay:false,
flashplayer:false
};
if(playParams!=undefined){
$.ajax({
url:playRequestUrl,
type:'POST',
dataType:'JSON',
data:{id:playParams.videoInfo.id,surePlay:1,isTrySee:isTrySee},
async:false,
success:function(resp){
//console.log(resp);
if(resp.resultCode!=0){
layer.msg('您不能观看此视频！',{time:2000,icon:2});
return false;
}
params.video=resp.data.videoInfo.url;
if(resp.data.freeType==2 && resp.data.videoInfo.gold>0 && isTrySee){
//按时长试看
trySeeTime=resp.data.freeNum;
console.log('begion try see:'+trySeeTime+'s');
params.loaded="loadedHandler";
}
},
error:function(){
layer.msg('视频信息加载失败！',{time:2000,icon:2});
return false;
}
});
}
<?php if($adSetting['ad_on']==1): ?>
params.adfront='<?php echo $adSetting["pre_ad"]; ?>';
params.adfrontlink='<?php echo $adSetting["pre_ad_url"]; ?>';
params.adfronttime='<?php echo $adSetting["play_video_ad_time"]; ?>';
params.adpause='<?php echo $adSetting["suspend_ad"]; ?>';
params.adpauselink='<?php echo $adSetting["suspend_ad_url"]; ?>';
params.adpausetime='<?php echo $adSetting["play_video_ad_time"]; ?>';
<?php endif; ?>
params.skipButtonShow=false;
player = new ckplayer(params);
if(isTrySee) setTimeout("player.changeControlBarShow(false)",1000); //hide control
if(playParams!=undefined){
setTimeout("player.videoPlay()",1000);//play
}
}
$(function(){
getCommentList();
getGift();
createPlayer(null,null);
videoPlayInit(<?php echo $videoInfo['id']; ?>);
//点赞
<?php if($isGooded==false): ?>
$("#giveGoodBtn").on('click',function(){
var reqData={resourceType:'video',resourceId:<?php echo $videoInfo['id']; ?>};
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
//收藏
<?php if(!$isCollected): ?>
$(".fn-shoucang1").on("click",function () {
var collectData={type:'1',id:'<?php echo $videoInfo["id"]; ?>'};
$.post('<?php echo url("api/colletion"); ?>',collectData,function (data) {
if(data.resultCode==0){
$('#shoucang').html('已收藏');
$('.fn-shoucang1').addClass("isSelected");
layer.msg('收藏成功',{time:1000,icon:1});
}else{
layer.msg('收藏失败，原因：'+data.error,{time:1000,icon:2});
}
},'json');
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
var reqData={resourceType:'1',resourceId:<?php echo $videoInfo['id']; ?>,content:content,to_user:to_user,to_id:to_id};
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
html += '    <div class="user-info">';
html += '    <a href="javascript:" class="user-name">'+data.data.userinfo.nickname+'</a>';
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
html += '   <div class="user-info">';
html += '       <a href="javascript:" class="user-name">'+data.data.userinfo.nickname+'</a>';
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
function getGift(){
var url = "<?php echo url('Api/getGift'); ?>";
var data = {
"func": "getNameAndTime" ,
};
var html = '';
$.ajax({
type: 'POST',
url: url,
data: data,
dataType: 'json',
success: function(data){
data.forEach(function(item) {
html += '<div class="r-cel" style="float:left;margin-left:25px;" title="'+item.name+'">' ;
html += '<a onclick="reward('+item.id+','+item.price+',<?php echo $videoInfo['id']; ?>,1)"><img src="'+item.images+'"/ width="30"></a><br>' ;
html += '<a onclick="reward('+item.id+','+item.price+',<?php echo $videoInfo['id']; ?>,1)"><span>'+item.name+'</span></a>' ;
html += ' </div>' ;
})
$('#gift_box').html(html);
}
});
}
</script>
<script>
$(function(){
$(".list-box .tab span").click(function(){
var $self = $(this);
$self.addClass("cur").siblings().removeClass("cur");
var $attr = $self.attr("data-for");
$(".list-box .sub-tab>div").hide();
$(".list-box .sub-tab").find("."+ $attr).show();
});
$(".select1").on("click","a",function(){
$(".select1 a").removeClass("cur");
$(this).addClass("cur");
});
});
function check_logins(){
$.post('/api/get_login_status','{}',function (e) {
if(e.resultCode == 3){
layer.msg('该账号已在其他地方登陆',
{
icon: 5,
time: 3000,
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
},function () {
window.location.reload();
});
}
},'json');
setTimeout('check_logins()', 5000);
}
</script>
<?php if($login_status['resultCode'] == 1): ?>
<script>
check_logins();
</script>
<?php endif; 
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
