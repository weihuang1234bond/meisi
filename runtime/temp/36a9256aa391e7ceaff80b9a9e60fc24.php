<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:39:"./tpl/ms360/mobile/member/addvideo.html";i:1562572082;s:35:"./tpl/ms360/mobile/common/head.html";i:1562582439;s:37:"./tpl/ms360/mobile/common/footer.html";i:1562582439;}*/ ?>
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

<!--yzmuper---start--->
<script type="text/javascript" src="/static/yzmuper/js/webuploader.js"></script>
<script type="text/javascript" src="/static/yzmuper/js/upload.js"></script>
<script type="text/javascript" src="/static/yzmuper/js/md5.js"></script>
<script type="text/javascript" src="/static/yzmuper/js/jquery.xdomainrequest.min.js"></script>
<link rel="stylesheet" href="/static/yzmuper/css/upload.css"/>
<script>
    var ServerUrl="<?php echo get_config('yzm_upload_url'); ?>/uploads";
</script>
<style>
    #chosevideo .webuploader-pick{
        padding: 3px!important;
        width:30px!important;
    }
</style>
<!--yzmuper---end--->


<script>
    layui.use(['form', 'layedit', 'laydate'], function(){

    });
    $(function(){
        createWebUploader('choseThumbBtn','','','image',setThumbUrl,false);
        createWebUploader('choseVideoBtn','','','video',setVideoUrl,false);

        //隐藏云转码按钮
        <?php if(get_config('video_save_server_type')=='yunzhuanma'): ?>
        $("#chosevideo").show();
        $("#choseVideoBtn").remove();
        <?php endif; ?>
        });
    function  setVideoUrl(resp) {
        if(resp.filePath!=undefined){
            $("#odownpath1").val(resp.filePath);
            layer.msg('上传成功！');
        }else{
            layer.msg('上传发生异常,请重试！');
            createWebUploader('choseVideoBtn','','','video',setVideoUrl,false);
        }
    }
    function setThumbUrl(resp){
        if(resp.filePath!=undefined){
            $("#thumbnail").val(resp.filePath);
            $("#img_thumbnail").attr('src',resp.filePath);
            layer.msg('上传成功！');
        }else{
            layer.msg('上传发生异常,请重试！');
            createWebUploader('choseThumbBtn','','','image',setThumbUrl,false);
        }
    }
</script>

<script>
    layui.use(['form', 'layedit', 'laydate'], function () {
    });
</script>

<!--上传视频弹窗-->
<div class="upload-popup popup" style="display: block;margin-top:15px;">
    <form class="layui-form" action="" id="editForm" method="post" style="margin-bottom: 50px">
        <ul>
            <li>
                <label>视频名称：</label>
                <input type="text" placeholder="" name="title" id="title" value=""/>
            </li>
            <li>
                <label>观看金币：</label>
                <input type="text" placeholder="" name="gold" value=""/>
            </li>
            <li style="margin-bottom:0px">
                <label>视频标签：</label>
                <div class="form-box">
                    <div class="layui-input-block">
                        <?php if(is_array($tag_list) || $tag_list instanceof \think\Collection || $tag_list instanceof \think\Paginator): $i = 0; $__LIST__ = $tag_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                        <input type="checkbox" name="tag[]" value="<?php echo $v['id']; ?>"    title="<?php echo $v['name']; ?>">
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
            </li>
            <li style="margin-bottom:0px">
                <label>视频分类：</label>
                <div class="form-box">
                    <div class="layui-form-item" style="margin-bottom:-8px">
                        <div class="layui-inline">
                            <div class="layui-input-inline">
                                <select name="class">
                                    <?php if(is_array($class_list) || $class_list instanceof \think\Collection || $class_list instanceof \think\Paginator): $i = 0; $__LIST__ = $class_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo $v['id']; ?>" level="<?php echo $v['id']; ?>" >|-<?php echo $v['name']; ?></option>
                                    <?php if(is_array($v['childs']) || $v['childs'] instanceof \think\Collection || $v['childs'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo $vv['id']; ?>" level="<?php echo $vv['id']; ?>"  >|&nbsp;&nbsp;&nbsp;|-<?php echo $vv['name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <?php if($custom_list): ?>
                <li style="margin-bottom:0px">
                    <label><?php echo $custom_class['name']; ?>：</label>
                    <div class="form-box">
                        <div class="layui-form-item" style="margin-bottom:-8px">
                            <div class="layui-inline">
                                <div class="layui-input-inline">
                                    <select name="area_id">
                                        <?php if(is_array($custom_list) || $custom_list instanceof \think\Collection || $custom_list instanceof \think\Paginator): $i = 0; $__LIST__ = $custom_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?>
                                            <option value="<?php echo $c['id']; ?>" level="<?php echo $c['id']; ?>" >|-<?php echo $c['name']; ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endif; ?>
            <li style="margin-bottom:2px">
                <label>上传视频：</label>
                <input type="text" placeholder="" id="odownpath1" value="" name="url" />
                <a id="choseVideoBtn">上传</a>

                <div id="yzm_panel" class="layui-input-inline" style="display:block;">
                    <a  id="chosevideo" style="display: none;border:none;height:30px;">上传</a>
                </div>
            </li>
            <style>
                #yzm_file_list>div{height:145px!important;}
                #yzm_file_list{padding: 0 10px!important;}
                #yzm_file_list .progressBarStatus li {width:45%!important; padding: 0!important;}
                #yzm_file_list  .progressBarStatus ul li.first,  #yzm_file_list  .progressBarStatus ul li.last {text-align: center !important; }
                .progressName  a{  width: 68px!important; padding: 0px;}
            </style>
            <li id="yzm_file_list"></li>
            <li>
                <label>缩略图：</label>
                <input type="text" placeholder="" value="" id="thumbnail" name="thumbnail"/>
                <a id="choseThumbBtn">上传</a>
            </li>
            <li>
                <div class="narrow-img" >
                    <img id="img_thumbnail" src="/static/images/images_default.png" />
                </div>
            </li>
            <div id="imgbox">
                <li>
                    <label>截图1：</label>
                    <input type="text" placeholder=""  value=""  id="thumbnail1"  name="img[]" style="width:10px;" />
                    <a  style="margin-left:20px;width:35px;"  onclick="uploadimg(1)" id="choseThumbBtn1"> 上传</a><i class="layui-icon" id="add" style="color: green;padding-left:20px;font-size: 20px;">&#xe654;</i>
                </li>
            </div>
            <li>
                <label>视频时长：</label>
                <input type="text" placeholder="" id="playtime" value="" name="play_time"/>
            </li>
            <li>
                <label></label>
                <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">提交</button>
            </li>
        </ul>
    </form>
</div>

</div>
<script>
    var  onclicknum=1;
    $(function(){
        setTimeout("uploadimg(1)",500);
        /*上传视频、点击视频标签*/
        $(".form-checkbox").click(function(){
            $(this).toggleClass("cur");
        });

        $('#add').click(function () {
            var a=$("#imgbox").find('li').length;
            if(a<6){
                var html='            <li>' +
                    '                <label>截图'+(a+1)+'：</label>' +
                    '                <input type="text" placeholder=""  value=""  id="thumbnail'+(a+1)+'" name="img[]"/>' +
                    '                <a  onclick="uploadimg('+(a+1)+')" id="choseThumbBtn'+(a+1)+'" style="margin-left:20px;width:35px;"> 上传</a>' +
                    '            </li>';
                $("#imgbox").append(html);
                createWebUploader('choseThumbBtn'+(a+1),'','','image',setimgurl,false);
            }
        })
    } );
    function uploadimg(a){
        if(a>1){
            onclicknum=a;
        }
        createWebUploader('choseThumbBtn'+a,'','','image',setimgurl,false);
    }
    function setimgurl(resp){
        $('#thumbnail'+onclicknum).val(resp.filePath);
    }
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
