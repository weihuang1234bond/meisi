<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:35:"./tpl/ms360/mobile/member/info.html";i:1531103064;s:35:"./tpl/ms360/mobile/common/head.html";i:1562562557;s:37:"./tpl/ms360/mobile/common/footer.html";i:1562413629;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo (isset($page_title) && ($page_title !== '')?$page_title:""); ?>_<?php echo $seo['site_title']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="__ROOT__/tpl/ms360/mobile/static/css/common.css" />
    <link rel="stylesheet" href="__ROOT__/tpl/ms360/mobile/static/css/member.css">
    <link rel="stylesheet" href="__ROOT__/tpl/ms360/mobile/static/css/style.css" />
    <link rel="stylesheet" href="__ROOT__/tpl/default/static/js/layui/css/layui.css">

    <script src="__ROOT__/tpl/ms360/mobile/static/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="__ROOT__/tpl/ms360/mobile/static/js/layer_mobile/layer.js"></script>

    <script type="text/javascript" charset="utf-8" src="__ROOT__/tpl/default/static/js/layui/layui.js"></script>
    <script type="text/javascript" src="__ROOT__/tpl/ms360/mobile/static/js/common.js"></script>
    <link rel="stylesheet" href="__ROOT__/tpl/default/static/css/font_485358_gtgl3zs6gyvqjjor/iconfont.css">
    <!--
    <script>
        layui.use(['form', 'layedit', 'laydate'], function(){ });
    </script>
    -->
    <?php $menu = getMenu();?>
</head>
<body>
<header class="js-header">
    <div  class="head">
        <a id="navBackBtn" href="javascript:history.go(-1);" class="go-back"><i></i></a>
        <span id="navTopTitle"></span>
        <div class="menu"><i class="btn fn-sort"></i></div>
    </div>
    <nav class="js-nav">
        <ul>
            <?php if(is_array($menu) || $menu instanceof \think\Collection || $menu instanceof \think\Paginator): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <li <?php if($vo['current'] == 1): ?>class="cur"<?php endif; ?> >
            <a  target="_self" href="<?php echo $vo['url']; ?>" >
                <?php echo $vo['name']; if(!(empty($vo['sublist']) || (($vo['sublist'] instanceof \think\Collection || $vo['sublist'] instanceof \think\Paginator ) && $vo['sublist']->isEmpty()))): ?>
                <div class="menu-two">
                    <?php if(is_array($vo['sublist']) || $vo['sublist'] instanceof \think\Collection || $vo['sublist'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['sublist'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                    <a target="_self" <?php if($v['current'] == 1): ?>class="cur"<?php endif; ?> href="<?php echo $v['url']; ?>"><?php echo $v['name']; ?></a>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <?php endif; ?>
            </a>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </nav>
    <div class="nav-masklayer"></div>
</header>


<div class="box">

<!--uper js files-->
<script type="text/javascript" src="/static/plupload-2.3.6/js/plupload.full.min.js"></script>
<script type="text/javascript" src="/static/xuploader/webServerUploader.js"></script>
<style>
    .details{font-size: 12px;}
    .logout{margin-top: 40px;background: #2692ff;}
    .logout a:active{color:#fff;}
    .layui-input-block  .layui-form-switch{
        position: absolute!important;
        right: 0;
    }
    .layui-form-switch{
        background-color: deeppink;
        color: #fff;
        border: 1px solid #fff;
    }
    .layui-form-onswitch {
        border-color: #5FB878;
        background-color: #5FB878;
    }
    .layui-form-switch i{
        background-color: #FFF;
    }
    .layui-form-switch em{
        color: #FFF!important;
    }
</style>
<script type="text/javascript">
    layui.use(['form', 'layedit', 'laydate'], function(){

    });

    $(function(){
        createWebUploader('headimgurl','','','image',setHeadImgUrl,false);
    });

    function setHeadImgUrl(resp){
        console.log(resp);
        if(resp.filePath!=undefined){
            $("#headimgurl").attr('src',resp.filePath);
            $("#headimgurl_input").val(resp.filePath);
            layer.msg('上传成功！');
        }else{
            layer.msg('上传发生异常,请重试！');
            createWebUploader('choseheadimgurlBtn','','','image',setHeadImgUrl,false);
        }
    }
</script>
<form class="layui-form" action="" id="editForm" method="post" style="margin-bottom: 50px">
    <div class="details">
        <ul>
            <li>
                <label>头像</label>
                <img id="headimgurl" class="headPic"  src="<?php echo $info['headimgurl']; ?>" title="点击更换头像" alt="点击更换头像">
                <input type="text" name="headimgurl" id="headimgurl_input" value="<?php echo $info['headimgurl']; ?>" />
            </li>
            <li>
                <label>昵称</label>
                <input type="text" value="<?php echo $info['nickname']; ?>" name="nickname" >
            </li>
            <li>
                <label>性别</label>
                <div class="layui-input-block">
                    <input type="checkbox" name="sex" lay-skin="switch" lay-text="男|女"  <?php if($info['sex']  == 1): ?>checked<?php endif; ?>>
                </div>
            </li>
            <li>
                <label>邮箱</label>
                <span style="float: right;color: #d2d2d2"> <?php echo hidden_mail_str($info['email']); ?></span>
            </li>
        </ul>
    </div>
    <div class="logout" onclick="$('#editForm').submit()">
        <i class="btn fn-baocun"></i>
        <a >保存</a>
    </div>
</form>

</div>
<?php echo $wechatCode; ?>
<footer>
    <a class="navFooter" target="_self" href="/"><i class="btn fn-shouye"></i>首页</a>
    
   <a class="navFooter active" target="_self" href="<?php echo url('video/lists'); ?>"><i class="btn fn-sort"></i>视频</a>
  <a class="navFooter " target="_self" href="<?php echo url('images/lists'); ?>"><i class="btn fn-sort"></i>图片</a> 
   <a class="navFooter " target="_self" href="<?php echo url('novel/lists'); ?>"><i class="btn fn-xuanchuan"></i>小说</a>
   <a class="navFooter " target="_self" href="<?php echo url('share/index'); ?>"><i class="btn fn-xuanchuan"></i>宣传</a>
    <a class="navFooter " target="_self" href="<?php echo url('member/member'); ?>"><i class="btn fn-wode"></i>我的</a>
</footer>
<a class="btn-gotop" id="btn-gotop"><i class="btn fn-top"></i></a>
</div>
<script type="text/javascript">
    $(function(){
        //to and footer nav setting
        var navTopTitle="<?php echo (isset($navTopTitle) && ($navTopTitle !== '')?$navTopTitle:'视频站'); ?>";
        $('#navTopTitle').html(navTopTitle);
        $('.navFooter').removeClass('active');
        $('.navFooter:nth-child(<?php echo (isset($curFooterNavIndex) && ($curFooterNavIndex !== '')?$curFooterNavIndex:2); ?>)').addClass('active');

        $(window).scroll(function () {
            if ($(window).scrollTop() > 100) {
                $("#btn-gotop").fadeIn(500);
            }else {
                $("#btn-gotop").fadeOut(500);
            }
        });
        //当点击跳转链接后，回到页面顶部位置
        $("#btn-gotop").click(function () {
            $('body,html').animate({ scrollTop: 0 }, 1000); //1000代表1秒时间回到顶点
            return false;
        });

    });
</script>
<style>
    .btn-gotop{display: none;position: fixed;bottom: 150px;right: 10px;background: rgba(0,0,0,.5);width: 50px;height:50px;border-radius: 5px;z-index: 99;text-align: center;line-height: 50px;color:#fff;}
    .btn-gotop:hover{color:#fff;}
    .btn-gotop i{font-size: 40px;}

</style>
<?php $login_status = check_is_login();if($login_status['resultCode'] == 3): ?>
<script>
    layer.open({content:'该账号已在其他地方登陆！',time:3,skin:'msg'});
</script>
<?php endif; 
$baseConfig = get_config_by_group('base');
$baseConfig['friend_link'] =  empty($seo['friend_link']) ? $baseConfig['friend_link'] : $seo['friend_link'];
$baseConfig['site_icp'] = empty($seo['site_icp']) ? $baseConfig['site_icp'] : $seo['site_icp'];
$baseConfig['site_statis'] = empty($seo['site_statis']) ? $baseConfig['site_statis'] : $seo['site_statis'];
$linkList=get_friend_link($baseConfig);
 ?>
<?php echo htmlspecialchars_decode($baseConfig['site_statis']); ?>
</body>
</html>
