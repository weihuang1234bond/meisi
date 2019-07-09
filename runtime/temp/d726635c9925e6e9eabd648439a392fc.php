<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:42:"./tpl/ms360/mobile/member/get_out_pay.html";i:1555405552;s:35:"./tpl/ms360/mobile/common/head.html";i:1562239150;}*/ ?>
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
        body {background: #f1f2f3;}

    </style>

    <div class="pay-box">
        <div>
            <p class="mode"><span>请选择提现账户</span><i class="btn fn-fanhui-copy-copy"></i></p>
            <div class="mode-box">
                <ul>
                    <?php if(!(empty($momey_account) || (($momey_account instanceof \think\Collection || $momey_account instanceof \think\Paginator ) && $momey_account->isEmpty()))): if(is_array($momey_account) || $momey_account instanceof \think\Collection || $momey_account instanceof \think\Paginator): $i = 0; $__LIST__ = $momey_account;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                    <li data-id="<?php echo $v['id']; ?>"><span><?php echo $v['title']; ?></span><a  onclick="pay_way_del('<?php echo $v['id']; ?>')" class="btn fn-shanchu1"></a></li>
                    <?php endforeach; endif; else: echo "" ;endif; else: ?>
                    <li class="not-comment not" data-id="0" style="text-align: left;min-height: 40px;height: 40px;">您还没有可以提现的账户哦~</li>
                    <?php endif; ?>
                </ul>
                <p><a href="<?php echo url('member/add_card'); ?>">新增提现账户<i class="btn fn-fanhui-copy-copy"></i></a></p>
            </div>
        </div>
        <?php if($config == 1): ?>
            <p class="out-title">可提现金币数<var style="color: #888;font-size: 12px;font-style: normal;transform: scale(.9);">（<?php echo $menber_info['money']; ?>）</var></p>
            <div class="get-out">
                <span class="btn fn-jinbi"></span>
                <input type="hidden" value="0" name="type" id="type">
                <input type="hidden" value="0" name="money" id="paymoney">
                <input type="number" placeholder="可转出<?php echo $menber_info['money']; ?>个金币" value=""  onblur="get_mun()"  id="fname" />
            </div>
            <div class="pay-explain">
                当前转出金币价值 <span id="money">0</span> 元
            </div>
            <div class="reminder">
                <span><i class="btn fn-wenxintishi" style="font-size: 13px;margin-bottom: 5px;"></i>温馨提示：</span>
                <p>1、<?php echo $gold_exchange_rate; ?>个金币等于1元，最低提现金币数<?php echo $min_withdrawals; ?>个金币。</p>
                <p>2、提现金币必须是<?php echo $gold_exchange_rate; ?>的整数倍。</p>
            </div>
            <button onclick="submitmoney('j')">提现</button>
        <?php else: ?>
            <p class="out-title">K币提现</p>
            <div class="get-out">
                <span class="btn fn-jinbi"></span>
                <input type="hidden" value="0" name="type" id="type">
                <input type="hidden" value="0" name="money" id="paymoney">
                <input type="number" placeholder="输入提现K币数" value="" id="fname" />
            </div>
            <div class="pay-explain">
                当前可提现K币 <b id="k_money" style="color:red"><?php echo $menber_info['k_money']; ?></b> 个
            </div>
            <div class="reminder">
                <span><i class="btn fn-wenxintishi" style="font-size: 13px;margin-bottom: 5px;"></i>温馨提示：</span>
                <p>1、1个K币等于1元，最低提现K币数<span id="min_withdrawals"><?php echo $min_withdrawals; ?></span>个。</p>
                <p>2、提现K币数必须是正整数。</p>
            </div>
            <button onclick="submitmoney('k')">提现</button>
        <?php endif; ?>
    </div>

<script>
    var gold_exchange=<?php echo $gold_exchange_rate; ?>;
    var usermoney =parseInt(<?php echo $menber_info['money']; ?>);//金币
    var userkmoney=parseInt(<?php echo $menber_info['k_money']; ?>);//K 币
    $(function () {
        $("#fname").focus();
        $(".mode").click(function(){
            $(".pay-box .mode-box").stop().slideToggle();
            $(".pay-box li span").click(function () {
                var id=$(this).parent().data('id');
                $('#type').val(id);
                if(id=='0'){
                   return false;
                }
                $(".mode span").html($(this).text());
                $(".pay-box .mode-box").slideUp();
            });
        });

        //to and footer nav setting
        var navTopTitle="<?php echo (isset($navTopTitle) && ($navTopTitle !== '')?$navTopTitle:'视频站'); ?>";
        $('#navTopTitle').html(navTopTitle);
        $('.navFooter').removeClass('active');
        $('.navFooter:nth-child(<?php echo (isset($curFooterNavIndex) && ($curFooterNavIndex !== '')?$curFooterNavIndex:2); ?>)').addClass('active');
    });
    //删除提现方式
    function pay_way_del(id){
        var ids=id;
        layer.open({
            content: '你确定删除该信息吗？'
            ,btn: ['删除', '取消']
            ,skin: 'footer'
            ,yes: function(index){
                var data={id:ids}
                $.post('/api/way_del',data,function(e){
                    layer.open({content: '删除成功',time:2,end:function(){
                        window.location.reload();
                    }})
                })
            }
        });

    }
    function get_mun(){
        var gold=parseInt($('#fname').val());
        if(gold<=0 || isNaN(gold) ) gold=1;
        if(gold>usermoney) gold=usermoney;
        var fname=Math.floor(gold/gold_exchange);
        var upfname=fname*gold_exchange;
        $('#fname').val(upfname);
        $('#paymoney').val(fname);
        $('#money').html(fname);
    }
    //提交
    function submitmoney(tx_type){
        var type=$("#type").val();
        var paymoney=parseInt($('#paymoney').val());
        var fname=parseInt($('#fname').val());
        if(type=='0'){
            layer.open({
                content: '请选择提现账户'
                ,skin: 'msg'
                ,time: 2 //2秒后自动关闭
            });
            return false;
        }
        if(tx_type == 'j'){ //金币
            if(fname<0 || isNaN(fname) || usermoney<fname){
                layer.open({
                    content: '你的提现金币数有误'
                    ,skin: 'msg'
                    ,time: 2 //2秒后自动关闭
                });
                return false;
            }
        }else{ //K币
            if(fname<0 || isNaN(fname) || userkmoney<fname){
                layer.open({
                    content: '您输入的K币数有误'
                    ,skin: 'msg'
                    ,time: 2 //2秒后自动关闭
                });
                return false;
            }
        }
        var url='/api/get_pay'
        var data={type:type,gold:fname,money:paymoney,tx_type:tx_type}
        $.post(url,data,function(e){
            if(e.statusCode==0){
                layer.open({
                    content: e.message
                    ,skin: 'msg'
                    ,time: 2 //2秒后自动关闭
                    ,end:function(){
                        window.location.reload();//刷新当前页面.
                    }
                });
            }else {
                layer.open({
                    content: e.message
                    ,skin: 'msg'
                    ,time: 2 //2秒后自动关闭
                });
            }
        },'json')
    }
</script>
</body>
</html>