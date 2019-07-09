<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:39:"./tpl/ms360/mobile/member/add_card.html";i:1554106288;s:35:"./tpl/ms360/mobile/common/head.html";i:1562239150;s:37:"./tpl/ms360/mobile/common/footer.html";i:1562303518;}*/ ?>
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

<link rel="stylesheet" href="//at.alicdn.com/t/font_485358_4ldl1uwbzj16ecdi.css">


<script type="text/javascript" src="__ROOT__/tpl/default/static/js/jquery-3.2.1.min.js"></script>

<!--uper js files-->
<script type="text/javascript" src="/static/plupload-2.3.6/js/plupload.full.min.js"></script>
<script type="text/javascript" src="/static/xuploader/webServerUploader.js"></script>
<style>
    .switch span {
        width: 33%;
    }
    .Alipay{display: none;}
    .Wx{display: none;}
    .recharge-box .Bank,.recharge-box .Wx ,.recharge-box .Alipay{padding: 20px;}
    .recharge-box .Bank li,
    .recharge-box .Wx li,
    .recharge-box .Alipay li{padding: 10px 0;border-bottom: 1px solid #eee;}
    .recharge-box .Bank label,
    .recharge-box .Wx label,
    .recharge-box .Alipay label{width: 65px;display: inline-block;}
    .recharge-box .Bank input,
    .recharge-box .Wx input,
    .recharge-box .Alipay input,
    .recharge-box .Bank select,
    .recharge-box .Wx select,
    .recharge-box .Alipay select{width: 190px;height:20px;border:none;}
    .recharge-box .Bank select{background: transparent;}
    .recharge-box .Bank a,
    .recharge-box .Wx a,
    .recharge-box .Alipay a{margin: 40px 10px;border-radius: 22px;background: #2692ff;color:#fff; display: block;text-align: center;line-height: 40px;height:40px;}
    .upload-img{width: 100px;}
</style>

<div class="switch">
    <span data-for="Bank" class="buyType active">添加银行卡<i></i></span>
    <span data-for="Alipay" class="buyType">添加支付宝<i></i></span>
    <span data-for="Wx" class="buyType">添加微信<i></i></span>
</div>
<div class="recharge-box">
    <div class="Bank">
        <ul>
            <li><label>持卡人</label><input type="text" id="account_name"  placeholder="请输入持卡人姓名" /></li>
            <li><label style="width: 61px;">开户行</label>
                <select id="bank" name="bank">
                    <option value="0">请选择银行类型</option>
                    <option value="中国银行">中国银行</option>
                    <option value="中国工商银行">中国工商银行</option>
                    <option value="中国建设银行">中国建设银行</option>
                    <option value="中国农业银行">中国农业银行</option>
                    <option value="中国光大银行">中国光大银行</option>
                    <option value="中国民生银行">中国民生银行</option>
                    <option value="中信银行">中信银行</option>
                    <option value="交通银行">交通银行</option>
                    <option value="华夏银行">华夏银行</option>
                    <option value="招商银行">招商银行</option>
                    <option value="兴业银行">兴业银行</option>
                    <option value="广发银行">广发银行</option>
                    <option value="平安银行">平安银行</option>
                    <option value="上海浦东发展银行">上海浦东发展银行</option>
                    <option value="浙商银行">浙商银行</option>
                    <option value="渤海银行">渤海银行</option>
                    <option value="中国邮政储蓄银行">中国邮政储蓄银行</option>
                    <option value="北京银行">北京银行</option>
                    <option value="天津银行">天津银行</option>
                    <option value="河北银行">河北银行</option>
                </select>
            </li>
            <li><label>卡&nbsp;&nbsp;&nbsp;号</label><input type="number" id="bankaccount" placeholder="请输入卡号" /></li>
        </ul>
        <a onclick="addcar('Bank')">添加银行卡</a>
    </div>
    <div class="Alipay">
        <ul>
            <li><label>账号</label><input type="text" name="alipayaccount" id="alipayaccount" placeholder="请输入支付宝账号" /></li>
            <li><label>真实姓名</label><input type="text" id="account_names"  placeholder="请输入真实姓名" /></li>
            <li>
               收款二维码
            </li>
            <li>
                <img class="upload-img" id="Alipay_code">
                <input type="hidden" id="Alipay_code_url" value="">
                <button type="button" class="layui-btn" id="Alipay_code_bt">上传图片</button>
            </li>
        </ul>
        <a onclick="addcar('Alipay')">添加支付宝</a>
    </div>
    <div class="Wx">
        <ul>
            <li><label>账号</label><input type="text" name="wxnickname" id="wxnickname" placeholder="请输入微信昵称" /></li>
            <li>
                收款二维码
            </li>
            <li>
                <img class="upload-img" id="Wx_code">
                <input type="hidden" id="Wx_code_url" value="">
                <button type="button" class="layui-btn" id="Wx_code_bt">上传图片</button>
            </li>
        </ul>
        <a onclick="addcar('Wx')">添加微信</a>
    </div>
</div>
<script>
    $(function(){
        createWebUploader('Alipay_code_bt','','','image',setAlipayUrl,false);
        createWebUploader('Wx_code_bt','','','image',setWxUrl,false);
    });
    function setAlipayUrl(resp){
        if(resp.filePath!=undefined){
            $("#Alipay_code_url").val(resp.filePath);
            $("#Alipay_code").attr('src',resp.filePath);
            $("#Alipay_code").show();
            layer.open({
                content: '上传成功'
                ,skin: 'msg'
            });return false;

        }else{
            layer.open({
                content: '上传发生异常,请重试'
                ,skin: 'msg'
            });return false;
            createWebUploader('Alipay_code_bt','','','image',setAlipayUrl,false);
        }
    }
    function setWxUrl(resp){
        if(resp.filePath!=undefined){
            $("#Wx_code_url").val(resp.filePath);
            $("#Wx_code").attr('src',resp.filePath);
            $("#Wx_code").show();
            layer.open({
                content: '上传成功'
                ,skin: 'msg'
            });return false;
        }else{
            layer.open({
                content: '上传发生异常,请重试'
                ,skin: 'msg'
            });return false;
            createWebUploader('Wx_code_bt','','','image',setWxUrl,false);
        }
    }
</script>

<script>
    $(function(){
        $(".switch span").click(function(){
            var $self = $(this).attr("data-for");
            $(".switch span").removeClass("active");
            $(this).addClass("active");
            $(".recharge-box").find("."+$self).show();
            $(".recharge-box").find("."+$self).siblings().hide();
        });
    });
    function addcar(type) {
        var url='/api/pay_way';
        if(type=='Bank'){
            var account_name=$('#account_name').val();
            var bank=$("#bank").val();
            var bankaccount=$('#bankaccount').val();
            var msg=true;
            if(account_name==null||account_name==""){msg='持卡人不能为空';}
            if(bank==null||bank==""||bank=='0'||bank==0){msg='请选择开户行';}
            if(bankaccount==null||bankaccount==""){msg='卡号不能为空';}
            if(msg==true){
                var data={type:type,account_name:account_name,bank:bank,bankaccount:bankaccount}
                $.post(url,data,function(e){
                    if(e.statusCode==0){
                        layer.open({
                            content: e.message
                            ,skin: 'msg'
                            ,time: 2 //2秒后自动关闭
                            ,end:function(){
                                top.location='/member/get_out_pay.html';
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
            }else {
                layer.open({
                    content: msg
                    ,skin: 'msg'
                    ,time: 2 //2秒后自动关闭
                });
            }
        }else if(type=='Alipay') {
            var alipayaccount=$('#alipayaccount').val();
            var Alipay_code_url=$('#Alipay_code_url').val();
            var account_name=$('#account_names').val();
            if(account_name==null||account_name==""){
                layer.open({
                    content: '真实姓名不能为空'
                    ,skin: 'msg'
                    ,time: 2 //2秒后自动关闭
                });return false;
            }
            if(alipayaccount==null||alipayaccount==""){
                layer.open({
                content: '支付宝账号不能为空'
                ,skin: 'msg'
                ,time: 2 //2秒后自动关闭
            });return false;
            }
            if(Alipay_code_url==null||Alipay_code_url==""){
                layer.open({
                    content: '支付宝收款二维不能为空'
                    ,skin: 'msg'
                });return false;
            }
            var data={type:type,alipayaccount:alipayaccount,img:Alipay_code_url,account_name:account_name}
            $.post(url,data,function(e){
                if(e.statusCode==0){
                    layer.open({
                        content: e.message
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                        ,end:function(){
                            top.location='/member/get_out_pay.html';
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

        }else if(type=='Wx') {
            var wxnickname=$('#wxnickname').val();
            var Wx_code_url=$('#Wx_code_url').val();

            if(wxnickname==null||wxnickname==""){
                layer.open({
                    content: '微信昵称不能为空'
                    ,skin: 'msg'
                });return false;
            }
            if(Wx_code_url==null||Wx_code_url==""){
                layer.open({
                    content: '微信收款码不能为空'
                    ,skin: 'msg'
                });return false;
            }
            var data={type:type,alipayaccount:wxnickname,img:Wx_code_url}
            $.post(url,data,function(e){
                if(e.statusCode==0){
                    layer.open({
                        content: e.message
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                        ,end:function(){
                            top.location='/member/get_out_pay.html';
                        }
                    });
                }else {
                    layer.open({
                        content: e.message
                        ,skin: 'msg'
                    });
                }
            },'json')

        }

    }



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
