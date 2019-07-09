<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:41:"./tpl/ms360/mobile/systemMsg/message.html";i:1562572109;s:37:"./tpl/ms360/mobile/common/header.html";i:1562594432;s:37:"./tpl/ms360/mobile/common/footer.html";i:1562590060;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php $menu = getMenu();?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta content="telephone=no" name="format-detection">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?php echo $seo['site_title']; ?></title>
    <meta name="keywords" lang="zh-CN" content="<?php echo $seo['site_keywords']; ?>"/>
    <meta name="description" lang="zh-CN" content="<?php echo $seo['site_description']; ?>" />
    <link rel="stylesheet" href="__ROOT__/tpl/ms360/mobile/static/css/swiper.min.css">
    <link rel="stylesheet" href="__ROOT__/tpl/ms360/mobile/static/css/common.css" />


    <script src="__ROOT__/tpl/ms360/mobile/static/js/jquery-3.2.1.min.js"></script>
    <script src="__ROOT__/tpl/ms360/mobile/static/js/swiper.min.js"></script>
    <script type="text/javascript" src="__ROOT__/tpl/ms360/mobile/static/js/layer_mobile/layer.js"></script>
    <script type="text/javascript" src="__ROOT__/tpl/ms360/mobile/static/js/common.js?v=1.0"></script>
    <link rel="stylesheet" href="__ROOT__/tpl/default/static/css/font_485358_gtgl3zs6gyvqjjor/iconfont.css">


</head>
<body>
<div>
<header class="js-header">
<div class="dingbutu"><img src="http://43.226.124.180/images/12.gif" width="100%"></div>
  

        <div class="head">
            <a class="logo"><img src="<?php echo $seo['site_logo_mobile']; ?>"/></a>
            <?php $controller =  lcfirst(request()->controller());?>
            <form
                <?php switch($controller): case "images": ?> action="<?php echo url('search/index',array('type'=>'atlas')); ?>"<?php break; case "atlas": ?> action="<?php echo url('search/index',array('type'=>'atlas')); ?>"<?php break; case "novel": ?>action="<?php echo url('search/index',array('type'=>'novel')); ?>"<?php break; case "search": ?>action="<?php echo url('search/index',array('type'=>$type)); ?>"<?php break; default: ?>
                action="<?php echo url('search/index',array('type'=>'video')); ?>"
                <?php endswitch; ?>
            method="get" id="myform">
            <div class="search">
                <div style="display: inline-block;float: left;">
                    <?php if($controller=="atlas" || isset($type)&& $type=='atlas'): ?> <span class="choice-box1">图册<i class="btn fn-triangle"></i></span>
                    <?php elseif($controller=="images" || isset($type)&& $type=='images'): ?> <span class="choice-box1">图册<i class="btn fn-triangle"></i></span>
                    <?php elseif($controller=="novel" || isset($type)&& $type=='novel'): ?> <span class="choice-box1">资讯<i class="btn fn-triangle"></i></span>
                    <?php elseif($controller=="member" || isset($type)&& $type=='member'): ?> <span class="choice-box1">会员<i class="btn fn-triangle"></i></span>
                    <?php elseif($controller=="video" || isset($type)&& $type=='video'): ?> <span class="choice-box1">视频<i class="btn fn-triangle"></i></span>
                    <?php else: ?>
                    <span class="choice-box1">视频<i class="btn fn-triangle"></i></span>
                    <?php endif; ?>

                    <div class="choice-btn">
                        <div class="choice-shadow">
                            <p onclick="$('#myform').attr('action','<?php echo url('search/index',array('type'=>'video')); ?>')">视频</p>
                            <p onclick="$('#myform').attr('action','<?php echo url('search/index',array('type'=>'atlas')); ?>')">图册</p>
                            <p onclick="$('#myform').attr('action','<?php echo url('search/index',array('type'=>'novel')); ?>')">资讯</p>
                            <p onclick="$('#myform').attr('action','<?php echo url('search/index',array('type'=>'member')); ?>')">会员</p>
                            <?php if(isset($type)): ?><p onclick="$('#myform').attr('action','<?php echo url('search/index',array('type'=>$type)); ?>')">自动</p><?php endif; ?>
                        </div>
                    </div>
                </div>
                <input class="js-placeholder" placeholder="请输入" type="search" value='<?php if(isset($key_word)): ?><?php echo $key_word; endif; ?>' name="key_word"><i class="btn fn-sousuo" onclick="$('#myform').submit();" style="float: right;width: 23px;"></i>
            </div>
            </form>

            <div class="menu"><span class="btn fn-sort"></span></div>
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
    </header><script type="text/javascript" src="/tpl/ms360/static/js/home/first.js"></script>
    <div class="content">

<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<style>
    html{background: #f1f2f3;}
    .s-body{min-height:auto !important;}
    .error-box{display: block;margin: 70px auto 0;background: #fff;padding: 50px 0;width: 1230px;}
    .prompt,.error,.success{text-align: center;}
    .prompt .error-img i,.error .error-img i,.success .error-img i{font-size: 65px;width: auto;}
    .error-box a{width: 80px;height: 35px;line-height: 35px;margin: 10px auto;border-radius: 25px;text-decoration: none;}
    .error-box p{margin: 20px 0 7px;font-size: 18px;}
    .error-box span{color: #afafaf;}
    .error-box var{font-style: normal;font-weight: bold;}
    .error-box .error-img i,.error-box p,.error-box a{display: block;text-align: center;}

    .prompt .error-img i,.prompt p,.prompt a{color:#1296DB;}
    .prompt span{color: #afafaf;}
    .prompt a{border: 1px solid #1296DB;}

    .error .error-img i,.error p,.error a{color:#D81E06;}
    .error a{border: 1px solid #D81E06;}

    .success .error-img i,.success p,.success a{color:#4CBD27;}
    .success a{border: 1px solid #4CBD27;}
    @media screen and (max-width: 1400px) {
        .error-box {width: 980px !important;}
    }
    @media screen and (max-width: 768px) {
        .error-box {width: auto !important;}
    }

</style>
<script>
    $(function(){
        var $height = $(window).height();
        $(".error-box").css("padding-top",$height/6);
        $(".error-box").css("height",$height/2);
        $(".error-box").css("padding-bottom",$height/6.4)
    });
</script>
<div class="s-body">
    <div class="error-box">
        <?php switch($code) {
            case 3:
        ?>
        <!--提示-->
        <div class="prompt" style="">
            <div class="error-img"><i class="btn fn-zhuyi"></i></div>
            <div class="error-info">
                <p><?php echo(strip_tags($msg));?></p>
                <span>自动跳转，时间：<var><b id="wait"><?php echo($wait);?></b>s</var></span>
                <a id="href" href="<?php echo($url);?>">返回</a>
            </div>
        </div>
        <?php
            break;
            case 0:
        ?>
        <!--失败-->
        <div class="error">
            <div class="error-img"><i class="btn fn-error"></i></div>
            <div class="error-info">
                <p><?php echo(strip_tags($msg));?></p>
                <span>自动跳转，时间：<var><b id="wait"><?php echo($wait);?></b>s</var></span>
                <a id="href" href="<?php echo($url);?>">返回</a>
            </div>
        </div>
        <?php
            break;
            case 1:
        ?>
        <!--成功-->
        <div class="success" style="">
            <div class="error-img"><i class="btn fn-tongguo"></i></div>
            <div class="error-info">
                <p><?php echo(strip_tags($msg));?></p>
                <span>自动跳转，时间：<var><b id="wait"><?php echo($wait);?></b>s</var></span>
                <a id="href" href="<?php echo($url);?>">返回</a>
            </div>
        </div>
        <?php
            break;
            }
        ?>
    </div>
</div>

<script type="text/javascript">
    (function(){
        var wait = document.getElementById('wait'),
            href = document.getElementById('href').href;
        var interval = setInterval(function(){
            var time = --wait.innerHTML;
            if(time <= 0) {
                location.href = href;
                clearInterval(interval);
            };
        }, 1000);
    })();
</script>
</div>
<?php echo $wechatCode; ?>
<footer>
    <a class="navFooter" target="_self" href="/"><i class="btn fn-shouye"></i>首页</a>
    <a class="navFooter active" target="_self" href="<?php echo url('video/lists'); ?>"><i class="btn fn-sort"></i>分类</a>
    <a class="navFooter" target="_self" href="<?php echo url('Share/Index'); ?>"><i class="btn fn-xuanchuan"></i>宣传</a>
    <a class="navFooter" target="_self" href="<?php echo url('member/member'); ?>"><i class="btn fn-wode"></i>我的</a>
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