<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:36:"./tpl/ms360/mobile/member/agent.html";i:1531722854;s:35:"./tpl/ms360/mobile/common/head.html";i:1562239150;s:37:"./tpl/ms360/mobile/common/footer.html";i:1562303518;}*/ ?>
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

<script type="application/javascript" charset="utf-8" src="/static/UEditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/UEditor/ueditor.all.min.js"></script>
<script src="__ROOT__/tpl/default/static/js/jquery.zclip.min.js"></script>

<!--uper js files-->
<script type="text/javascript" src="/static/plupload-2.3.6/js/plupload.full.min.js"></script>
<script type="text/javascript" src="/static/xuploader/webServerUploader.js"></script>
<script type="text/javascript" src="/static/js/clipboard.min.js"></script>

<script type="text/javascript">
    layui.use(['form', 'layedit', 'laydate'], function(){

    });


    $(function(){
        createWebUploader('logo_btn','','','image',setLogoUrl,false);
        setTimeout("createWebUploader('logo_mobile_btn','','','image',setLogoUrl1,false)",500);
    });
    function setLogoUrl(resp){
        if(resp.filePath!=undefined){
            $("#site_logo_url").val(resp.filePath);
            $("#site_logo").attr('src',resp.filePath);
            layer.msg('上传成功！');
        }else{
            layer.msg('上传发生异常,请重试');
            createWebUploader('logo_btn','','','image',setLogoUrl,false);
        }
    }
    function setLogoUrl1(resp){
        if(resp.filePath!=undefined){
            $("#site_logo_mobile_url").val(resp.filePath);
            $("#site_logo_mobile").attr('src',resp.filePath);
            //editUserInfo('headimgurl',resp.filePath);
            layer.msg('上传成功！');
        }else{
            layer.msg('上传发生异常,请重试');
            createWebUploader('logo_mobile_btn','','','image',setLogoUrl,false);
        }
    }
    function agent_apply() {
        var url = "<?php echo url('api/agentApply'); ?>";
        $.post(url, {}, function (data) {
            if (data.resultCode == 0) {
                layer.msg(data.message, {time: 1000, icon: 1}, function() {
                    location.reload();
                });
            } else {
                layer.msg(data.error, {icon: 2, anim: 6, time: 1000});
            }
        }, 'JSON');

    }
</script>
<?php if($is_agent != 1): ?>
<!--代理申请-->
<div class="apply">
    <p class="title">代理申请</p>
    <p>亲爱的用户<b> <?php echo session('member_info')['nickname']; ?> </b>，您好！您当前还不是代理商，成为代理商后将享有更多权益。</p>
    <?php if($status != 3): ?>
    <p>
        您的申请审核状态：
        <span class="adopt">
                    <?php if($status == 0): ?>
                    <span class="adopt">审核中...</span>
                    <?php elseif($status == 2): ?>
                    <span class="adopt">已拒绝...</span>
                    <?php endif; ?>
        </span>
    </p>
    <?php endif; ?>
    <a onclick="agent_apply()">申请成为代理商</a><!-- class="apply-btn"-->
</div>
<!--代理申请结束-->
<?php else: ?>
<style>
    .exten-btn{
        height: 32px;
        margin-left: -5px;
        width: 13%;
        vertical-align: middle;
        font-size: 12px;
        display: inline-block;
    }
</style>

<div class="set-up">
    <p class="title">我的站点SEO设置</p>
    <div class="set-box">
        <p><label>我的独立域名</label>
            <input type="text" id="tg-link" class="extension" onmouseover="this.select();" readonly="readonly"
                   value="<?php echo $agentDomain; ?>">
            <button  class="btn exten-btn" data-clipboard-action="copy" data-clipboard-target="#tg-link">复制</button>
        </p>
        <p style="position: relative"><label>绑定域名</label>
            <input type="text" name="domain_name" value="<?php echo (isset($agent_config['domain_name']['webhost']) && ($agent_config['domain_name']['webhost'] !== '')?$agent_config['domain_name']['webhost']:''); ?>">
            <span class="status" style=" position: absolute;top: 38px;right: 0px;width: 60px;text-align:center;height: 32px;line-height: 32px;background: blue;color: #fff">
                 <?php if($agent_config['domain_name']['status'] == 1): ?>
                已生效
                <?php else: ?>
                未生效
                <?php endif; ?>
            </span>
        </p>
        <script>
            $(function(){
                var clipboard = new Clipboard('.btn');
                clipboard.on('success', function(e) {
                    layer.msg('复制成功！');
                });
            });
        </script>
        <form action="" method="post" id="myform">
            <p><label>网站主标题</label><input type="text" name="site_title" placeholder="显示在浏览器选项卡上的内容" value="<?php echo (isset($agent_config['site_title']) && ($agent_config['site_title'] !== '')?$agent_config['site_title']:''); ?>"></p>
            <p><label>网站keywords</label><input type="text" name="site_keywords" placeholder="提升站点在搜索引擎上的收录"  value="<?php echo (isset($agent_config['site_keywords']) && ($agent_config['site_keywords'] !== '')?$agent_config['site_keywords']:''); ?>"></p>
            <p><label>网站描述信息</label><input type="text" name="site_description" placeholder="提升站在搜索引擎上的收录"  value="<?php echo (isset($agent_config['site_description']) && ($agent_config['site_description'] !== '')?$agent_config['site_description']:''); ?>"></p>
            <p style="position: relative;">
                <label>网站LOGO</label>
                <a class="layui-btn" id="logo_btn" value=""
                   style="margin-right: 15px; width: 105px; float: left; position: relative; z-index: 1;">上传LOGO</a>
                <img id="site_logo" src="<?php echo (isset($agent_config['site_logo']) && ($agent_config['site_logo'] !== '')?$agent_config['site_logo']:''); ?>"
                     style="height:36px;display:block;max-width: 200px;">
                <input name="site_logo" id="site_logo_url" type="hidden"
                       value="<?php echo (isset($agent_config['site_logo']) && ($agent_config['site_logo'] !== '')?$agent_config['site_logo']:''); ?>">
            </p>
            <p style="position: relative;">
                <label>手机LOGO</label>
                <a class="layui-btn" id="logo_mobile_btn" value=""
                   style="margin-right: 15px; width: 105px; float: left; position: relative; z-index: 1;">上传LOGO</a>
                <img id="site_logo_mobile" src="<?php echo (isset($agent_config['site_logo_mobile']) && ($agent_config['site_logo_mobile'] !== '')?$agent_config['site_logo_mobile']:''); ?>"
                     style="height:36px;display:block;max-width: 200px;">
                <input name="site_logo_mobile" id="site_logo_mobile_url" type="hidden"
                       value="<?php echo (isset($agent_config['site_logo_mobile']) && ($agent_config['site_logo_mobile'] !== '')?$agent_config['site_logo_mobile']:''); ?>">
            </p>
        </form>
        <a class="submit" onclick="$('#myform').submit()">保存设置</a>
    </div>
</div>
<?php endif; ?>
<!--seo设置结束-->
<style>
    .agent label{font-size: 14px; line-height:20px;font-weight: bold;}
    .agent .title-two{margin-top:10px;line-height: 36px;}
    .agent .title-two i{color: #ccc;font-size: 12px;font-style: normal;}
    .agent .content-two{width: 93%;border: 1px solid #e6e6e6;line-height: 30px;padding: 0 10px;}
</style>
<div class="agent">
    <p class="title">代理关系</p>
    <p><label>我的上级：</label><?php if(!(empty($pid) || (($pid instanceof \think\Collection || $pid instanceof \think\Paginator ) && $pid->isEmpty()))): ?><?php echo $puserinfo['username']; else: ?>没有上级<?php endif; ?></p>
    <?php if($is_agent == 1): 
        $user1 =  implode(" , ",array_column($list[1], 'username'));
        $user2 =  implode(" , ",array_column($list[2], 'username'));
        $user3 =  implode(" , ",array_column($list[3], 'username'));
    ?>
    <p class="title-two"><label>一级代理（<?php echo count($list[1]); ?>）</label><i>下级</i></p>
    <p class="content-two"><?php echo (isset($user1) && ($user1 !== '')?$user1:'暂无'); ?></p>
    <p class="title-two"><label>二级代理（<?php echo count($list[2]); ?>）</label><i>下下级</i></p>
    <p class="content-two"><?php echo (isset($user2) && ($user2 !== '')?$user2:'暂无'); ?></p>
    <p class="title-two"><label>三级代理（<?php echo count($list[3]); ?>）</label><i>下下下级</i></p>
    <p class="content-two"><?php echo (isset($user3) && ($user3 !== '')?$user3:'暂无'); ?></p>
    <?php endif; ?>
</div>

<!--代理权益-->
<div class="agent">
    <p class="title">代理权益</p>
    <div class="picBox">
        <div class="img-cel">
            <div>
                <img src="/static/images/myself_domain.png"/>
            </div>
            <span>独立域名</span>
        </div>
        <div class="img-cel">
            <div>
                <img src="/static/images/myself_seo.png"/>
            </div>
            <span>定义站点SEO信息</span>
        </div>
        <div class="img-cel">
            <div>
                <img src="/static/images/myself_moey.png"/>
            </div>
            <span>充值收益</span>
        </div>
    </div>
</div>
<!--代理权益结束-->

</div>

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
