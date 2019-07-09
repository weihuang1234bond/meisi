<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:27:"./tpl/ms360/member/img.html";i:1531103066;s:27:"./tpl/ms360/common/top.html";i:1531103068;s:30:"./tpl/ms360/common/header.html";i:1562559246;s:30:"./tpl/ms360/member/common.html";i:1555405552;s:30:"./tpl/ms360/common/bottom.html";i:1531103068;s:30:"./tpl/ms360/common/footer.html";i:1562231560;}*/ ?>
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

<link href="__ROOT__/tpl/ms360/static/css/msvod.css" rel="stylesheet">
<link rel="stylesheet" href="__ROOT__/tpl/ms360/static/css/fonts.css">

<link rel="stylesheet" href="__ROOT__/tpl/ms360/static/css/viewer.min.css">
<link rel="stylesheet" href="__ROOT__/tpl/ms360/static/css/member.css">
<script type="application/javascript" charset="utf-8" src="/static/UEditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/UEditor/ueditor.all.min.js"></script>

<style>

</style>

<div class="s-body">
    <div class="content">
        <!--左边选择-->
        <div class="M-left">

    <ul class="select-box">
        <li <?php if($current_left_menu == 'member'): ?> class='on'<?php endif; ?> data-for="my-info">
            <a href="<?php echo url('member/member'); ?>">
                <i class="btn fn-info"></i><span>个人设置</span>
            </a>
        </li>
        <li <?php if($current_left_menu == 'recharge'): ?> class='on'<?php endif; ?> data-for="my-info">
        <a target="_blank" href="<?php echo url('system_pay/recharge'); ?>">
            <i class="btn fn-recharge"></i><span>我要充值</span>
        </a>
        </li>
		 <li <?php if($current_left_menu == 'card_pwd'): ?> class='on'<?php endif; ?>>
        <a href="<?php echo url('member/card_pwd'); ?>">
            <i class="btn fn-qiaquan"></i><span>卡密充值</span>
        </a>
        </li>
        <li <?php if($current_left_menu == 'collection'): ?> class='on'<?php endif; ?>>
            <a href="<?php echo url('member/collection_video'); ?>">
                <i class="btn fn-collection"></i><span>我的收藏</span>
            </a>
        </li>
        <li <?php if($current_left_menu == 'video'): ?> class='on'<?php endif; ?>>
            <a href="<?php echo url('member/video'); ?>">
                <i class="btn fn-video"></i><span>我的视频</span>
            </a>
        </li>
        <li <?php if($current_left_menu == 'novel'): ?> class='on'<?php endif; ?>>
            <a href="<?php echo url('member/novel'); ?>">
                <i class="btn fn-novel"></i><span>我的资讯</span>
            </a>
        </li>
        <li <?php if($current_left_menu == 'img'): ?> class='on'<?php endif; ?>>
            <a href="<?php echo url('member/img'); ?>">
                <i class="btn fn-img"></i><span>我的图片</span>
            </a>
        </li>
        <li <?php if($current_left_menu == 'get_out_pay'): ?> class='on'<?php endif; ?>>
        <a href="<?php echo url('member/get_out_pay'); ?>">
            <i class="btn fn-tixian"></i><span>提现管理</span>
        </a>
        </li>
        <li <?php if($current_left_menu == 'record_k_gold'): ?> class='on'<?php endif; ?>>
        <a href="<?php echo url('member/record_k_gold'); ?>">
            <i class="btn fn-qiaquan"></i><span>K 币记录</span>
        </a>
        </li>
        <li <?php if($current_left_menu == 'record_gold'): ?> class='on'<?php endif; ?>>
        <a href="<?php echo url('member/record_gold'); ?>">
            <i class="btn fn-tubiao207"></i><span>金币记录</span>
        </a>
        </li>
        <li <?php if($current_left_menu == 'record_pay'): ?> class='on'<?php endif; ?>>
        <a href="<?php echo url('member/record_pay'); ?>">
            <i class="btn fn-3"></i><span>充值记录</span>
        </a>
        </li>
        <li <?php if($current_left_menu == 'record'): ?> class='on'<?php endif; ?>>
            <a href="<?php echo url('member/record_video'); ?>">
                <i class="btn fn-icon12"></i><span>消费记录</span>
            </a>
        </li>
        <li <?php if($current_left_menu == 'agent'): ?> class='on'<?php endif; ?> class="management">
            <a href="<?php echo url('member/agent'); ?>">
                <i class="btn fn-management"></i><span>代理商</span>
            </a>

        </li>
    </ul>
</div>
        <!--右边内容-->
        <div class="M-content">
            <div class="M-info">
                <!--我的图片-->
                <div class="block my-img">
                    <div class="establish img-btn">
                        <a>创建图集</a>
                    </div>
                    <div class="img-box">
                        <ul class="Atlas-box">
                            <?php if(!(empty($atlas_list) || (($atlas_list instanceof \think\Collection || $atlas_list instanceof \think\Paginator ) && $atlas_list->isEmpty()))): if(is_array($atlas_list) || $atlas_list instanceof \think\Collection || $atlas_list instanceof \think\Paginator): $i = 0; $__LIST__ = $atlas_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                            <li id="li_<?php echo $v['id']; ?>">
                                <a href="<?php echo url('member/pic',array('atlasid'=>$v['id'])); ?>">
                                    <img src="<?php echo $v['cover']; ?>"/>
                                    <span class="num"><?php echo $v['good']; ?></span>
                                    <?php if($v['is_check'] == 2): ?>
                                    <div class="examine-shadow">
                                        <?php if(!(empty($v['hint']) || (($v['hint'] instanceof \think\Collection || $v['hint'] instanceof \think\Paginator ) && $v['hint']->isEmpty()))): ?>
                                        <var><?php echo $v['hint']; ?></var>
                                        <?php else: ?>
                                        <var>内容不符合规范</var>
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                                </a>
                                <div class="edit-box">
                                    <i class="btn fn-down-bold"></i>
                                    <div class="editBox">
                                        <span  data-id="<?php echo $v['id']; ?>"><i class="btn fn-bianji1"></i>编辑</span>
                                        <span  data-id="<?php echo $v['id']; ?>" id="del"><i class="btn fn-shanchu"></i>删除</span>
                                    </div>
                                </div>
                                <?php if($v['status'] != 1): ?>
                                <span class="btn fn-jiaobiao"><i>已禁用</i></span>
                                <?php else: if($v['is_check'] == 0): ?><span class="btn fn-jiaobiao aspect"><i>审核中</i></span> <?php endif; if($v['is_check'] == 2): ?><span class="btn fn-jiaobiao"><i>已拒绝</i></span> <?php endif; endif; ?>
                                <p class="title"><?php echo $v['title']; ?></p>
                                <div class="subtitle"><?php echo date('Y-m-d',$v['add_time']); ?><span><?php echo $v['click']; ?>次播放</span></div>
                            </li>
                            <?php endforeach; endif; else: echo "" ;endif; else: ?>
                            <div class="not-comment not">您还没有上传过图片哦 ~</div>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="sort-pager">
                        <?php echo $pages; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    $(function () {

        /*上传图片、点击标签*/
        $(".form-checkbox").click(function(){
            $(this).toggleClass("cur");
        });

        /*鼠标移动到图册效果*/
        $(".Atlas-box li").hover(function () {
            $(this).find(".edit-box").show();
        }, function () {
            $(this).find(".edit-box").hide();
            $(".edit-box .fn-down-bold").siblings().slideUp();
        });
        /*点击图册上按钮效果*/
        $(".edit-box .fn-down-bold").click(function () {
            $(this).siblings().slideToggle();
        });
        /*我的图片、上传图集*/
        $(".img-btn a").click(function () {
            layer.open({
                type: 2,
                title: '创建图集',
                area: ['650px', '500px'],
                shadeClose: false,
                skin: 'demo-class',
                anim: 0,
                content: "<?php echo url('member/addAtlas'); ?>"
            });
        });

        /*我的图片、编辑图集*/
        $(".img-box .editBox span:first-child").click(function () {
                       var id= $(this).data('id');
            layer.open({
                type: 2,
                title: '编辑图集信息',
                area: ['650px', '500px'],
                shadeClose: false,
                skin: 'demo-class',
                anim: 0,
                content:  "/member/editAtlas/atlasid/"+id
            });
        });
        /*我的图集删除*/
        $("#del").click(function(){
            var id = $(this).data('id');
            var reqData={table:'atlas',id:id};
            layer.confirm('确定删除吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                $.ajax({
                    type: 'POST',
                    url: "<?php echo url('api/del'); ?>",
                    data: reqData,
                    dataType : "json",
                    success: function(data){
                        console.log(data);
                        if(data.resultCode==0){
                            layer.msg('已成功删除', {icon: 1});
                            $('#li_'+id).slideUp("200", function() {
                                $('#li_'+id).remove();
                            });
                        }else{
                            layer.msg('删除失败，原因：'+data.error,{time:2000,icon:2});
                        }
                    },
                });

            });
        });

    });
</script>
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
