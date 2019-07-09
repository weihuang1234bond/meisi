<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:39:"./tpl/ms360/mobile/member/card_pwd.html";i:1531103062;s:35:"./tpl/ms360/mobile/common/head.html";i:1562562557;s:37:"./tpl/ms360/mobile/common/footer.html";i:1562413629;}*/ ?>
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


<style>

    h2{font-weight: bold;padding: 20px 10px;font-size: 18px;}

</style>

    <div class="card-box">
        <div class="card">
            <p><label>卡号：</label><input type="text" id="card_number"/></p>
            <p>
                <label>验证码：</label>
                <input type="text" class="code" id="verifyCodeGetCardInfo" name="verifyCodeGetCardInfo">
                <img src="<?php echo url('api/getCaptcha'); ?>" onclick="this.src='<?php echo url('api/getCaptcha'); ?>?'+Math.random()" id="verifyCodeImgGetCardInfo" />
            </p>
        </div>
        <button onclick="getinfo()">查询</button>
        <span style="font-weight: normal;margin: 20px auto 0;font-size: 14px;display: block;width: 90%;">( 我没有卡密，<a  target="_blank" href="<?php echo $seo['buy_cardpassword_uri']; ?>" style="text-decoration: underline;color: #3b9eff;">去购买>></a> )</span>
    </div>
    <div id="card_info" style="display: block">
        <h2>卡密信息</h2>
        <div class="card-info">
            <p><label>卡类型</label>未知</p>
            <p><label>VIP时间</label>暂无</p>
            <p><label>面值</label>未知</p>
            <p><label>到期时间</label>暂无</p>
            <p><label>状态</label>未知</p>
            <a>充值</a>
        </div>
    </div>
<input type="hidden" id="card_id"/>
<script>
    function  use_card() {
        var card_number = $('#card_number').val();
        var card_id = $('#card_id').val();
        var url = "<?php echo url('api/use_card_password'); ?>";
        $.post(url, {card_number: card_number,id:card_id}, function (data) {
            if (data.statusCode == 0) {
                layer.open({
                    content: data.message
                    ,skin: 'msg'
                    ,time: 2 //2秒后自动关闭
                    ,end: function(){
                        window.location.href = "<?php echo url('member/member'); ?>";
                    }
                });
            } else {
                layer.open({
                    content: data.error
                    ,skin: 'msg'
                    ,time: 2 //2秒后自动关闭
                });
            }
        }, 'JSON');
    }
    function getinfo(){
        var verifyCode = $('#verifyCodeGetCardInfo').val();
        var card_number = $('#card_number').val();
        var url = "<?php echo url('api/get_card_password_info'); ?>";
        $.post(url, {card_number: card_number,verifyCode:verifyCode}, function (data) {
            if (data.statusCode == 0) {
                data = data.data;
                var html = '';
                if(data.card_type == 1){
                    html +='<p><label>卡类型</label>VIP卡</p>';
                    var vip_time = (data.vip_time == 999999999) ? '永久' :  data.vip_time+'天';
                    html +='<p><label>VIP时间</label>'+vip_time+'</p>';
                }else{
                    html +='<p><label>卡类型</label>金币卡</p>';
                    html +='<p><label>金币</label>'+data.gold+'个</p>';
                }
                html +='<p><label>面值</label>￥'+data.price+'</p>';
                html +='<p><label>到期时间</label>'+data.out_times+'</p>';
                if(data.status == 1){
                    html +='<p><label>状态</label>已使用</p>';
                }else{
                    html +='<p><label>状态</label>未使用</p>';
                }
                html +='<a onclick="use_card()">充值</a>';
                $('#card_id').val(data.id);
                $('.card-info').html(html);
                $('#card_info').show('slow');
            } else {
                layer.open({
                    content: data.error
                    ,skin: 'msg'
                    ,time: 2 //2秒后自动关闭
                });
                //layer.msg(data.error, {icon: 2, anim: 6, time: 1000});
                $('#card_info').hide('slow');
                $("#verifyCodeImgGetCardInfo").click();
            }
        }, 'JSON');
    }
</script>
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
