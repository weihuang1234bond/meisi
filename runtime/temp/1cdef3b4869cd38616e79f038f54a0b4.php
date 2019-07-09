<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:41:"./tpl/ms360/mobile/member/record_pay.html";i:1531103064;s:35:"./tpl/ms360/mobile/common/head.html";i:1562239150;s:37:"./tpl/ms360/mobile/common/footer.html";i:1562303518;}*/ ?>
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
    .summary .r-vip li{width: 49%;}
</style>
<div class="sheet">
    <div class="summary">
        <div class="summary-box">
            <div class="l-vip">
                <div class="h-vip">
                    <img style="max-width: 100%;max-height:100%;" src="<?php echo (isset($member_info['headimgurl']) && ($member_info['headimgurl'] !== '')?$member_info['headimgurl']:''); ?>" />
                </div>
                <div class="info-vip">
                    <p class="title"><?php echo (isset($member_info['nickname']) && ($member_info['nickname'] !== '')?$member_info['nickname']:'未命名'); ?></p>
                    <p>总金币：<?php echo (isset($member_info['money']) && ($member_info['money'] !== '')?$member_info['money']:'0'); ?></p>
                </div>
            </div>
            <div class="r-vip">
                <ul>
                    <li><span>总充值</span><?php echo (isset($total_data['total']) && ($total_data['total'] !== '')?$total_data['total']:'0'); ?></li>
                    <li><span>今日充值</span><?php echo (isset($total_data['day']) && ($total_data['day'] !== '')?$total_data['day']:'0'); ?></li>
                </ul>
            </div>
        </div>
    </div>
    <ul class="list" style="margin-top: 150px;">
        <?php if(!(empty($data_list) || (($data_list instanceof \think\Collection || $data_list instanceof \think\Paginator ) && $data_list->isEmpty()))): if(is_array($data_list) || $data_list instanceof \think\Collection || $data_list instanceof \think\Paginator): $i = 0; $__LIST__ = $data_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
        <li>
            <!--订单状态-->
            <p>订单号：<?php echo $v['order_sn']; ?></p>
            <span>金额：<var>￥<?php echo $v['price']; ?></var></span>
            <span style="margin-left: 10px;">充值:<?php if($v['buy_type'] == 1): ?>金币<?php echo $v['buy_glod_num']; ?>个<?php else: ?><?php echo $v['buy_vip_info']['name']; endif; ?></span>
            <p><?php echo date('Y-m-d h:i:s',$v['add_time']); ?>
                <span <?php if($v['pay_channel'] == 'aliPay'): ?>class="pay-btn btn fn-zhifubao" <?php elseif($v['pay_channel'] == 'wxPay'): ?>class="pay-btn btn fn-weixin" <?php elseif($v['pay_channel'] == 'qqPay'): ?>class="pay-btn btn fn-qq"<?php endif; ?>></span></p><!---->
            <i <?php if($v['status'] == 1): ?>class="yes-pay"<?php else: ?>class="not-pay"<?php endif; ?>></i>
        </li>
        <?php endforeach; endif; else: echo "" ;endif; else: ?>
        <div class="not-comment not">您还没有充值记录 ~</div>
        <?php endif; ?>
    </ul>
</div>

</div>
<script>
    $(function () {
        $(".show-box").on("click",function () {
            $(this).siblings().stop(true).slideToggle();
        });
        $(".show-box").first().click();
    });

    var status = 1;
    var page  = 0;
    $(window).scroll(function(){
        var srollPos = $(window).scrollTop();
        var data = {
            "page" : page,
            "offset" : 20,
        };
        if(srollPos+$(window).height() > $(document).height() - 80){
            if(status == 1) {
                status = 0;
                $.ajax({
                    type: "POST",
                    data: data,
                    dataType: "JSON",
                    url: "<?php echo url('Api/record_pay'); ?>",
                    success: function (data) {
                        if(data.resultCode == 0){
                            var datas = data.data.list;
                            if(datas){
                                var html = '';
                                datas.forEach(function(item) {

                                    var add_time = item['add_time'];
                                    var newDate = new Date(add_time * 1000);
                                    html +='<li> <p>单号：'+item['order_sn']+'</p>' ;
                                    html +='<span>充值金额：<var>￥'+item['price']+'</var></span>';

                                    if(item['buy_type']==1){
                                        html +=' <span>充值：金币'+item['buy_glod_num']+'个</span>';
                                    }else {
                                        html +=' <span>充值：'+item['buy_vip_info']['name']+'</span>';
                                    }
                                    html +=' <p>'+newDate.getFullYear()+'-'+(newDate.getMonth()+1)+'-'+newDate.getDay()+' '+newDate.getHours()+':'+newDate.getMinutes()+':'+newDate.getSeconds();
                                    if(item['pay_channel']=='aliPay'){
                                    html +='<span class="pay-btn btn fn-zhifubao"></span></p>';
                                    }else if(item['pay_channel']=='wxPay'){
                                        html +='<span class="pay-btn btn fn-weixin"></span></p>';
                                    }else if(item['pay_channel']=='qqPay'){
                                        html +='<span class="pay-btn btn fn-qq"></span></p>';
                                    }
                                    if(item['status']==1){
                                        html +=' <i class="yes-pay"></i>';
                                    }else {
                                        html +=' <i class="not-pay"></i>';
                                    }
                                    html +='</li>';
                                });
                                $('.list').append(html);
                                page++;
                                status = 1;
                            }else{
                                console.log('没有更多数据了！');
                            }
                        }else{
                            console.log('没有更多数据了！');
                        }
                    }
                });
            }
        }
    })
</script>
</div>
<?php echo $wechatCode; ?>
<footer>
    <a class="navFooter" target="_self" href="/"><i class="btn fn-shouye"></i>首页</a>
    
   <a class="navFooter active" target="_self" href="<?php echo url('video/lists'); ?>"><i class="btn fn-sort"></i>视频</a>
  <a class="navFooter " target="_self" href="<?php echo url('images/lists'); ?>"><i class="btn fn-sort"></i>图片</a> 
   <a class="navFooter " target="_self" href="<?php echo url('novel/lists'); ?>"><i class="btn fn-xuanchuan"></i>小说</a>
   <a class="navFooter " target="_self" href="<?php echo url('share/index'); ?>"><i class="btn fn-xuanchuan"></i>VIP</a>
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
