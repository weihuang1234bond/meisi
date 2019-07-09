<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:43:"./tpl/ms360/mobile/system_pay/recharge.html";i:1562572111;s:35:"./tpl/ms360/mobile/common/head.html";i:1562582439;s:37:"./tpl/ms360/mobile/common/footer.html";i:1562582439;}*/ ?>
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

</style>

        <div class="recharge">
            <form method="post" action="<?php echo url('SystemPay/createOrder'); ?>">
            <div class="switch">
                <span data-for="vip" data-buytype="2" class="buyType active">VIP会员<i></i></span>
                <span data-for="Gold" data-buytype="1" class="buyType">金币<i></i></span>
            </div>
            <div class="recharge-box">
                <div class="vip">
                    <?php if(is_array($rechargeList) || $rechargeList instanceof \think\Collection || $rechargeList instanceof \think\Paginator): $i = 0; $__LIST__ = $rechargeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                    <div class="vip-cel packageid" data-packageid="<?php echo $item['id']; ?>" data-price="<?php echo $item['price']; ?>">
                        <div class="vip-box">
                            <span><?php echo $item['name']; ?></span>
                            <p>￥<var><?php echo $item['price']; ?></var></p>
                        </div>
                        <div class="Month">
                            <span><?php if($item['permanent']==1): ?>永久VIP<?php else: ?>VIP <?php echo $item['days']; ?>天<?php endif; ?></span>
                        </div>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <div class="Gold" style="display: none;">
                    <?php if(is_array($goldPackageList)): if(is_array($goldPackageList) || $goldPackageList instanceof \think\Collection || $goldPackageList instanceof \think\Paginator): $i = 0; $__LIST__ = $goldPackageList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                    <div class="vip-cel goldNum" data-price="<?php echo $item['price']; ?>">
                        <div class="vip-box">
                            <span><?php echo $item['name']; ?></span>
                            <p><var><?php echo $item['gold']; ?></var></p>
                        </div>
                        <div class="Month">
                            <span>￥<?php echo $item['price']; ?></span>
                        </div>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                    <div class="vip-cel goldNum" onclick="$('#userInputGoldNum')[0].focus()">
                        <div class="vip-box">
                            <span>自定义</span>
                        </div>
                        <div class="Month">
                            <p><input type="number" onblur="setGold()" id="userInputGoldNum" /></p>
                        </div>
                    </div>
                    <div style="padding-left: 15px;clear: both;color:#c0a16b;font-size:12px;">
                        <p style="line-height: 30px;"><i class="btn fn-wenxintishi" style="font-size: 13px;"></i>温馨提示：</p>
                        1、 当前金币兑换比例：1元人民币可兑换<?php echo $gold_exchange_rate; ?>个金币.<br>
                        2、 您输入的金币将会自动调整为整数.
                    </div>
                </div>
            </div>
            <div class="pay-box">
                <div class="pay-title"><span>支付方式</span></div>
                <div class="tab">
                    <?php if(is_array($paymentList) || $paymentList instanceof \think\Collection || $paymentList instanceof \think\Paginator): $i = 0; $__LIST__ = $paymentList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                    <span class="payCode" data-paycode="<?php echo $item['payCode']; ?>">
                        <img src="<?php echo $item['payIcon']; ?>" title="<?php echo $item['payName']; ?>">
                    </span>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <div class="payment">
                <span>支付</span>
                <span>￥<var id="payPrice">0</var></span>
                <button type="submit" class="credit">充值</button>
            </div>

                <input type="hidden" name="packageId" id="packageId" />
                <input type="hidden" name="payCode" id="payCode" />
                <input type="hidden" name="price" id="price" />
                <input type="hidden" name="buyType" id="buyType" />
            </form>
        </div>
    </div>


<script>
    $(function () {

        //vip
        $('.packageid').click(function () {
            $('#packageId').val($(this).attr('data-packageid'));
            $('#price').val($(this).attr('data-price'));
            $('#payPrice').html($(this).attr('data-price'));
        });

        //chose payment
        $('.payCode').click(function(){
            $('#payCode').val($(this).attr('data-payCode'));
        });

        //chose buy vip or gold
        $('.buyType').click(function () {
            reset();
            $('#buyType').val($(this).attr('data-buytype'));
            if($(this).attr('data-buytype')==2){
                $('.packageid').first().click().addClass('on');
            }else if($(this).attr('data-buytype')==1){
                $('.goldNum').first().click().addClass('on');
            }
        });

        //gold
        $('.vip-cel').click(function(){
            $price=$(this).attr('data-price');
            $('#payPrice').html($price);
            $('#price').val($price);
        });

        $('.payCode').first().click().addClass('on');

        if(1==<?php echo request()->param('type/d',0); ?>){
            setTimeout("$('.buyType:eq(1)').click()",1);
        }else{
            $('.buyType').first().click();
        }

        /*金币和VIP的点击切换*/
        $(".switch span").click(function(){
            var $self = $(this).attr("data-for");
            $(".switch span").removeClass("active");
            $(this).addClass("active");
            $(".recharge-box").find("."+$self).show();
            $(".recharge-box").find("."+$self).siblings().hide();
        });
        /* **选择  */
        $(".vip .vip-cel").click(function(){
            $(".vip .vip-cel").removeClass("on");
            $(this).addClass("on");
        });
        $(".Gold .vip-cel").click(function(){
            $(".Gold  .vip-cel").removeClass("on");
            $(this).addClass("on");
        });
        /*支付方式*/
        $(".recharge .tab span").click(function(){
            $(".recharge .tab span").removeClass("on");
            $(this).addClass("on");
        });

        var navTopTitle="<?php echo (isset($navTopTitle) && ($navTopTitle !== '')?$navTopTitle:'视频站'); ?>";
        $('#navTopTitle').html(navTopTitle);

    });


    function setGold(){
        var gold=parseInt($('#userInputGoldNum').val());
        var rate=<?php echo $gold_exchange_rate; ?>;
        if(gold<=0 || isNaN(gold)) gold=1;

        var upPrice=Math.ceil(gold/rate);
        var upGold=upPrice*rate;

        $('#userInputGoldNum').val(upGold);
        $('#price').val(upPrice);
        $('#payPrice').html(upPrice);
    }

    function reset(){
        $("#packageId").val('');
        $("#price").val('');
        $("#payPrice").html('');
        $("#buyType").val('');
        $('.packageid').removeClass('on');
        $('.vip-cel').removeClass('on');
    }

</script>


<!--
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
</html>-->
