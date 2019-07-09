<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:31:"./tpl/ms360/homepage/index.html";i:1531103068;s:32:"./tpl/ms360/homepage/common.html";i:1531103068;s:30:"./tpl/ms360/common/header.html";i:1562307170;s:30:"./tpl/ms360/common/footer.html";i:1562231560;}*/ ?>
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

<link href="__ROOT__/tpl/ms360/static/css/home.css" rel="stylesheet">
<script src="__ROOT__/tpl/ms360/static/js/jquery.zclip.min.js"></script>
<script>

$(function(){
$("#cp-btn").zclip({
path:'__ROOT__/tpl/ms360/static/js/ZeroClipboard.swf', //记得把ZeroClipboard.swf引入到项目中
copy:function(){
return $('#tg-link').val();
}
});
});
</script>
<style>
.mod-row .mod-col{width: 223px;margin: 0 6px 15px 6px;}
.t-box .tab{margin-bottom: 20px;}
.novel-list li .novel-box{float: left;margin-left: 20px;}
.novel-left li{width: 48%;display: inline-block; float: left;border-bottom: 1px solid #eee !important;margin: 0;}
.novel-left li .novel-box{width: 400px;float: left;margin-left: 13px;}
.novel-left li .novel-box .text{margin: 0;}
.vault-main .sort-title .sort-item{line-height: 34px;}
.flow-list .flow-item{width: 235px;margin-right: 6px;}
.flow-list .flow-item .item-show{width:100%;}
.flow-list{padding: 0 20px;margin: 0;}
.pub-title{margin: 0 0px 20px;}
.flow-list .flow-item .info-title .title-name{max-width: 147px;}
.flow-list .flow-item{margin: 0 2px 20px 2px;}
.pub-title h3{font-weight: bold;}

.vault-main .sort-title{
margin: 0 22px 20px;
border-bottom: 1px solid #eee;
padding-bottom: 3px;
overflow: hidden;
}
.vault-main .sort-title .sort-label{
float: left;
width: 42px;
margin-top: 1px;
line-height: 30px;
color: #909090;
font-size: 14px;
}
.vault-main .sort-title .sort-item{
vertical-align: middle;
display: inline-block;
line-height: 31px;
}
.vault-main .sort-title .sort-item select{
background: transparent;
font-size: 13px;
color: #555;
}

.vault-main .sort-title .sort-stat{
float: right;
line-height: 34px;
font-size: 12px;
color: #999;
}
.vault-main .sort-title .sort-stat b{
margin: 0 4px;
font-weight: 400;
}
</style>
<div class="banner-img">
<div class="share">
<!--<div style="width:1230px;margin: auto;">
<input type="text" id="tg-link"  onmouseover="this.select();" value="<?php echo request()->domain(); ?>/<?php echo $userinfo['id']; ?>" /><button id="cp-btn">复制</button>
</div>-->
</div>
</div>
<div class="layout-cont">

<!--<div class="content" id="vip-content">-->
<div class="v-content">
<div class="t-top">
<div class="l-vip">
<div class="h-vip">
<img style="max-width: 100%;max-height:100%;" src="<?php echo $userinfo['headimgurl']; ?>" />
</div>
<div class="info-vip">
<p class="title"><?php echo $userinfo['nickname']; ?></p>
<p>性别：<?php if($userinfo['sex']==1): ?>男<?php elseif($userinfo['sex']==2): ?>女<?php else: ?>未知<?php endif; ?></p>
</div>
</div>
<div class="r-vip">
<ul>
<li><span>视频</span><?php echo $userVideoTotal; ?></li>
<li><span>资讯</span><?php echo $userNovelTotal; ?></li>
<li><span>图册</span><?php echo $userAtlasTotal; ?></li>
</ul>
</div>
</div>
<div class="t-box">
<div class="tab">
<a href="<?php echo url('homepage/index'); ?>" <?php if(strtolower(request()->action())=='index'): ?>class="cur"<?php endif; ?>>首页</a>
<a href="<?php echo url('homepage/videopage'); ?>" <?php if(strtolower(request()->action()=='videopage')): ?>class="cur"<?php endif; ?>>视频</a>
<a href="<?php echo url('homepage/imgpage'); ?>"  <?php if(strtolower(request()->action()=='imgpage')): ?>class="cur"<?php endif; ?>>图册</a>
<a href="<?php echo url('homepage/infopage'); ?>"  <?php if(strtolower(request()->action()=='infopage')): ?>class="cur"<?php endif; ?>>资讯</a>
</div>
<style>
    .flow-list{padding: 0 20px;margin: 0;}
    .pub-title{margin: 0 0px 20px;}
    .flow-list .flow-item .info-title .title-name{max-width: 147px;}
    .flow-list .flow-item{margin: 0 2px 20px 2px;}
    .pub-title h3{font-weight: bold;}
</style>
<!--最新图册-->
<div class="main-wrap">
    <div class="layout-cont">
        <div class="pub-title clearfix" style="margin: 0 20px 20px;"><h3>最新视频</h3></div>
        <div class="tab-cont">
            <div class="cont-body">
                <div class="flow-list clearfix">
                    <?php if(!(empty($videoList) || (($videoList instanceof \think\Collection || $videoList instanceof \think\Paginator ) && $videoList->isEmpty()))): if(is_array($videoList) || $videoList instanceof \think\Collection || $videoList instanceof \think\Paginator): $i = 0; $__LIST__ = $videoList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): $mod = ($i % 2 );++$i;?>
                    <div class="flow-item fl">
                        <a href="<?php echo url('video/play',array('id'=>$video['id'])); ?>" title="<?php echo $video['title']; ?>" target="_blank">
                        <div class="item-show">
                            <div class="show-img">
                                <img class="lazy" src="<?php echo $video['thumbnail']; ?>" alt="<?php echo $video['title']; ?>">
                                <span class="time-length"><?php echo $video['play_time']; ?></span>
                            </div>
                            <div class="show-mask"><span class="play-btn"></span></div>
                        </div>
                        <div class="item-info">
                            <div class="info-title clearfix">
                                <span class="title-name fl"><?php echo $video['title']; ?></span>
                                <span class="title-type fr">
                                    <span class="type-label type-words">金币：<?php echo $video['gold']; ?></span>
                                </span>
                            </div>
                            <div class="info-tabs clearfix">
                                <div class="tab-left fl">
                                    <span class="tabs-sp view-num"><?php echo $video['click']; ?>人已观看</span>
                                </div>
                                <span class="fr other-sp"> <?php echo safe_date('Y/m/d',$video['update_time']); ?></span>
                            </div>
                        </div>
                        </a>
                    </div>
                <?php endforeach; endif; else: echo "" ;endif; else: ?>
                <div style="text-align: center;color: #c1c1c1;line-height: 100px;">这家伙还没发布过.</div>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--最新图册-->
<div class="wrap">
    <div class="pub-title clearfix">
        <div class="pt-left fl">
            <h3>最新图册</h3>
        </div>
    </div>
    <?php if(!(empty($atlasList) || (($atlasList instanceof \think\Collection || $atlasList instanceof \think\Paginator ) && $atlasList->isEmpty()))): if(is_array($atlasList) || $atlasList instanceof \think\Collection || $atlasList instanceof \think\Paginator): $i = 0; $__LIST__ = $atlasList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$atlas): $mod = ($i % 2 );++$i;?>
    <div class="list" >
        <div class="img">
            <a href="<?php echo url('images/show',array('id'=>$atlas['id'])); ?>" target="_blank">
                <img src="<?php echo $atlas['cover']; ?>">
            </a>
        </div>
        <div class="con">
            <a href="<?php echo url('images/show',array('id'=>$vo['id'])); ?>" target="_blank"><?php echo $atlas['title']; ?></a>
        </div>
        <div class="con">
            <span style=""><i class="fa fa-eye" style="color:#666666;margin-right:5px;"></i><?php echo $atlas['click']; ?></span>
            <span style="margin-left:8px;"> <i class="fa fa-dot-circle-o" style="color:#666666;margin-left:10px;"></i> <?php echo $atlas['good']; ?></span>
            <span style="float:right;"><?php echo date('Y/m/d',$atlas['update_time']); ?></span>
        </div>
    </div>
    <?php endforeach; endif; else: echo "" ;endif; else: ?>
    <div style="text-align: center;color: #c1c1c1;line-height: 100px;">这家伙还没发布过.</div>
    <?php endif; ?>
</div>
<div class="wrap" id="wrap" style="margin-top:15px;">
    <div class="pub-title clearfix">
        <div class="pt-left fl">
            <h3>最新资讯</h3>
        </div>
    </div>
    <div class="software-wrap">
        <div class="news-cont">
            <div class="software-lesson">
                <ul class="lesson-cont clearfix">
                    <?php if(!(empty($novelList) || (($novelList instanceof \think\Collection || $novelList instanceof \think\Paginator ) && $novelList->isEmpty()))): if(is_array($novelList) || $novelList instanceof \think\Collection || $novelList instanceof \think\Paginator): $i = 0; $__LIST__ = $novelList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$novel): $mod = ($i % 2 );++$i;?>
                    <li class="lesson-item fl">
                        <a href="<?php echo url('novel/show',array('id'=>$novel['id'])); ?>" class="item-img fl" title="<?php echo $novel['title']; ?>" target="_blank">
                            <img src="<?php echo $novel['thumbnail']; ?>" alt="<?php echo $novel['title']; ?>"></a>
                        <div class="img-info">
                            <div style="width:100%; overflow: hidden; text-overflow:ellipsis; white-space: nowrap;">
                                <a href="<?php echo url('novel/show',array('id'=>$vo['id'])); ?>" style="" class="les-tit" target="_blank"><?php echo $novel['title']; ?></a>
                            </div>
                            <p class="les-num"> <span><i class="fa fa-calendar-o"></i><?php echo date('Y/m/d',$novel['update_time']); ?></span>
                                <em class="fg-line">|</em>
                                <span><i class="fa fa-eye"></i><?php echo $novel['click']; ?></span>
                                <em class="fg-line">|</em>
                                <span><i class="fa fa-dot-circle-o"></i><?php echo $novel['gold']; ?></span>
                            </p>
                            <p class="pre-num" style="width:280px;overflow: hidden; text-overflow:ellipsis; white-space: nowrap;"><?php echo (isset($novel['short_info']) && ($novel['short_info'] !== '')?$novel['short_info']:"暂没简介"); ?></p>
                            <a href="<?php echo url('novel/show',array('id'=>$vo['id'])); ?>" class="to-learn-btn tran" target="_blank">立即阅读</a>
                        </div>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; else: ?>
                    <div align="center" style="text-align: center;color: #c1c1c1;line-height: 100px;">这家伙还没发布过.</div>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
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
