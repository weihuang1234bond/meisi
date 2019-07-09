<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:34:"./tpl/ms360/mobile/video/play.html";i:1562572114;s:35:"./tpl/ms360/mobile/common/head.html";i:1562590060;s:37:"./tpl/ms360/mobile/common/footer.html";i:1562590060;}*/ ?>
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
<?php $login_status = check_is_login();?>
<link rel="stylesheet" href="__ROOT__/tpl/happy2018/mobile/static/css/play.css">
<style type="text/css">
    .layui-m-layermain .layui-m-layersection{
        vertical-align: bottom !important;
    }
    .layui-m-layer0 .layui-m-layerchild{
        bottom: 100px;
    }
    .layui-m-layercont{
        text-align: center!important;
    }
    .leftz {
        float: left;
        /*height: 400px;*/
        width: 100%;
    }
    .left {
        float: left;
        width: 100%;
        position: absolute;
        z-index: 10;
        /*height: 400px;*/
    }
    .yytf_1 {
        position: absolute;
        z-index: 100;
        /*height: 400px;*/
        width: 100%;
        background-color: #000;
    }
    .yytf_2 {
        position: absolute;
        z-index: 100;
        height: 280px;
        width: 80%;
        left: 50%;
        margin-left: -40%;
        top: 50%;
        margin-top: -40%;
    }
    #daojs {
        text-align: right;
        background-color: rgba(160, 160, 160, 0.46);
        color: #FFF;
        padding: 5px 15px;
        position: absolute;
        z-index: 10;
        right: 0;
        margin: 10px 10px 0 0;
        border-radius: 15px;
    }
    #djs{
        color:#FFDD00;
        border-right: 1px solid #696969;
        padding-right: 8px;
        margin-right: 8px;
    }
    .baiduyytf {
        /*height: 280px;*/
        width: 100%;
        margin-right: auto;
        margin-left: auto;
        background-color: #000;
        position: absolute;
    }
    .baiduyytf iframe body{
        text-align: center;
    }
</style>
<script type="text/javascript" src="/static/ckplayer/ckplayer.js"></script>
<script src="/static/msvodx/js/video_mobile.js"></script>
<script>
    $(function(){
        var _width = $(window).width()/2;
        $(".video-box").height(_width);
        $(".baiduyytf").height(_width-39);
    });

</script>
<script>
    var page = 0;
    var addLiIndex=1;
    var status =1;

    function  clearReply() {
        layer.closeAll();
    }

    function replyComment(username,id,to_id){
        var reply = '回复 @'+username+' : ';
        var length = reply.length;
        $('#to_user').val(id);
        layer.open({
            type: 1
            ,content: '<input type="hidden" id="to_user" value="'+id+'"><input type="hidden" id="to_id" value="'+to_id+'"><p id="reply_title" style="text-align: left;padding-left: 10px;padding: 0 0 5px 20px;">'+reply+'</p><div class="area-box" style=" width: 90%;margin: 0"> <textarea id="reply_content"></textarea>  <div class="btn-box"> <a class="canel" onclick="clearReply()">取消</a> <a class="reply_send" style="background: #218aff;">发送</a> </div> </div>'
            ,anim: 'up'
            ,style: 'position:fixed; bottom:0; left:0; width: 100%; height: 155px; padding:10px 0; border:none;'
            ,success: function(){
                $('#reply_content').focus();
                $('.reply_send').click(function () {
                    var content =  $.trim($('#reply_content').val());
                    var reply_title =  $('#reply_title').html();
                    if((content == "" || content == undefined || content == null || content == $(".comment-atuser").html())) {
                        layer.open({content:'请输入评论的内容!',skin:'msg',time:1});
                        return false;
                    }
                    var to_user = $('#to_user').val();
                    var to_id = $("#to_id").val();
                    content = reply_title + content;
                    var reqData={resourceType:'1',resourceId:<?php echo $videoInfo['id']; ?>,content:content,to_user:to_user,to_id:to_id};
                    $.post('<?php echo url("api/comment"); ?>',reqData,function(data){
                        if(data.resultCode==0){
                            clearReply();
                            layer.open({time:1,content:data.message,skin:'msg'});
                            if(data.data.comment_examine_on != 1){
                                var headimgurl = '/static/images/user_dafault_headimg.jpg';
                                if(data.data.userinfo.headimgurl){
                                    headimgurl = data.data.userinfo.headimgurl;
                                }
                                var html = '';
                                $('#not-comment').remove();
                                if(data.data.to_id != 0){
                                    html += '<div style="padding: 15px 0 15px 20px;overflow: hidden;border-top: 1px solid #f3f3f3;"  id="common_'+data.data.id+'">';
                                    html += '    <div class="user-avatar">';
                                    html += '    <a href="javascript:">';
                                    html += '    <img src="'+headimgurl+'">';
                                    html += '    </a>';
                                    html += '    </div>';
                                    html += '    <div class="comment-section">';
                                    html += '        <div class="user-info">';
                                    html += '        <a href="javascript:" class="user-name">'+data.data.userinfo.nickname+'</a>';
                                    html += '        <span class="comment-timestamp">刚刚</span>';
                                    html += '       <span class="comment-Reply" onclick="replyComment(\''+data.data.userinfo.nickname+'\',\''+data.data.userinfo.id+'\',\''+data.data.to_id+'\')" ></span>';
                                    html += '        </div>';
                                    html += '    <div class="comment-text">'+data.data.content+'</div>';
                                    html += '    </div>';
                                    html += '</div>';
                                    $("#common_"+data.data.to_id).append(html);
                                    var go_id = 'common_'+data.data.id;
                                    window.location.href="#"+go_id;
                                }else{
                                    html += '<li id="common_'+data.data.id+'">';
                                    html += '<div style="overflow: hidden;">';
                                    html += '   <div class="user-avatar">';
                                    html += '       <a href="javascript:">';
                                    html += '           <img src="'+headimgurl+'">';
                                    html += '       </a>';
                                    html += '    </div>';
                                    html += '    <div class="comment-section">';
                                    html += '   <div class="user-info">';
                                    html += '       <a href="javascript:" class="user-name">'+data.data.userinfo.nickname+'</a>';
                                    html += '       <span class="comment-timestamp">刚刚</span>';
                                    html += '       <span class="comment-Reply" onclick="replyComment(\''+data.data.userinfo.nickname+'\',\''+data.data.userinfo.id+'\',\''+data.data.id+'\')" ></span>';
                                    html += '   </div>';
                                    html += '   <div class="comment-text">'+data.data.content+'</div>';
                                    html += '   </div>';
                                    html += '</div>';
                                    html += ' </li>';
                                    $("#comment-list ").prepend(html);
                                    window.location.href="#comment_content";
                                }
                                $("#common_"+addLiIndex).hide().slideDown('fast');
                                addLiIndex++;
                            }
                        }else{
                            layer.open({content:'评论失败，原因：'+data.error,time:1,skin:'msg'});
                        }
                    },'JSON');
                });
            }
        });

    }

    function getCommentList(){
        var nowDate = new Date().getTime();
        var times = "";
        var url = "<?php echo url('api/getCommentList'); ?>";
        var  resourceId = " <?php echo $videoInfo['id']; ?>";
        var data = {
            "page":page,
            "resourceId":resourceId,
            "resourceType":1,
        };
        var html = '';
        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            dataType: 'json',
            success: function(data){
                console.log(data);
                $('#comment_num').html("("+data.data.count+")");
                var datas = data.data.list;
                if(datas){
                    page++;
                    datas.forEach(function(item) {
                        var headimgurl = '/static/images/user_dafault_headimg.jpg';
                        if(item.headimgurl){
                            headimgurl = item.headimgurl;
                        }
                        var time = parseInt(item.last_time*1000);
                        if(parseInt(time+60*30*1000) > nowDate){
                            times = '刚刚';
                        }else if(parseInt(time+60*60*1000) > nowDate){
                            times = '半个小时前';
                        } else if(parseInt(time+2*60*60*1000) > nowDate){
                            times = '1小时前';
                        }else{
                            var oDate = new Date(time);
                            var Hours = oDate.getHours()>10 ? oDate.getHours() :  '0'+oDate.getHours();
                            var Minutes = oDate.getMinutes()>10 ? oDate.getMinutes() :  '0'+oDate.getMinutes();
                            times = oDate.getFullYear()+'-'+(oDate.getMonth()+1)+'-'+oDate.getDate()+' '+Hours+':'+Minutes;
                        }
                        html += '<li id="common_'+item.id+'">';
                        html += '<div style="overflow: hidden;">';
                        html += '       <div class="user-avatar">';
                        html += '           <a href="javascript:">';
                        html += '           <img src="'+headimgurl+'">';
                        html += '           </a>';
                        html += '           </div>';
                        html += '           <div class="comment-section">';
                        html += '           <div class="user-info">';
                        html += '           <a href="javascript:" class="user-name">'+item.nickname+'</a>';
                        html += '           <span class="comment-timestamp">'+times+'</span>';
                        html += '           <span class="comment-Reply" onclick="replyComment(\''+item.nickname+'\',\''+item.send_user+'\',\''+item.id+'\')" ></span>';
                        html += '       </div>';
                        html += '       <div class="comment-text">'+item.content+'</div>';
                        html += '       </div>';
                        html += '</div>';
                        var list = item.list;
                        if(list!=undefined) {
                            list.forEach(function(it) {
                                var headimgurl = '/static/images/user_dafault_headimg.jpg';
                                if(it.headimgurl){
                                    headimgurl = it.headimgurl;
                                }
                                var time = parseInt(it.last_time*1000);
                                if(parseInt(time+60*30*1000) > nowDate){
                                    times = '刚刚';
                                }else if(parseInt(time+60*60*1000) > nowDate){
                                    times = '半个小时前';
                                } else if(parseInt(time+2*60*60*1000) > nowDate){
                                    times = '1小时前';
                                }else{
                                    var oDate = new Date(time);
                                    var Hours = oDate.getHours()>10 ? oDate.getHours() :  '0'+oDate.getHours();
                                    var Minutes = oDate.getMinutes()>10 ? oDate.getMinutes() :  '0'+oDate.getMinutes();
                                    times = oDate.getFullYear()+'-'+(oDate.getMonth()+1)+'-'+oDate.getDate()+' '+Hours+':'+Minutes;
                                }
                                html += '<div style="padding: 15px 0 15px 20px;overflow: hidden;border-top: 1px solid #f3f3f3;">';
                                html += '    <div class="user-avatar">';
                                html += '    <a href="javascript:">';
                                html += '    <img src="'+headimgurl+'">';
                                html += '    </a>';
                                html += '    </div>';
                                html += '    <div class="comment-section">';
                                html += '        <div class="user-info">';
                                html += '        <a href="javascript:" class="user-name">'+it.nickname+'</a>';
                                html += '        <span class="comment-timestamp">'+times+'</span>';
                                html += '        <span class="comment-Reply" onclick="replyComment(\''+it.nickname+'\',\''+it.send_user+'\',\''+item.id+'\')" ></span>';
                                html += '        </div>';
                                html += '         <div class="comment-text">'+it.content+'</div>';
                                html += '    </div>';
                                html += '</div>';
                            })
                        }
                        html += ' </li>';
                    })
                    $('#not-comment').remove();
                    $('#comment-list').append(html);
                    status =1;
                }
            }
        });
    }
    function clearComment(){
        $('.send').removeClass('submit');
        $("#length").html('0/300');
        $("#comment_content").val(' ');
    }
    function  addComment() {
        var content =  $.trim($("#comment_content").val());
        var to_user = $("#to_user").val();
        var to_id = $("#to_id").val();
        if((content == "" || content == undefined || content == null || content == $(".comment-atuser").html())) {
            layer.open({content:'请输入评论的内容!',skin:'msg',time:1});
            return false;
        }
        var reqData={resourceType:'1',resourceId:<?php echo $videoInfo['id']; ?>,content:content,to_user:to_user,to_id:to_id};
        $.post('<?php echo url("api/comment"); ?>',reqData,function(data){
            if(data.resultCode==0){
                layer.open({time:1,content:data.message,skin:'msg'});
                if(data.data.comment_examine_on != 1){
                    var headimgurl = '/static/images/user_dafault_headimg.jpg';
                    if(data.data.userinfo.headimgurl){
                        headimgurl = data.data.userinfo.headimgurl;
                    }
                    var html = '';
                    html += '<li id="common_'+data.data.id+'">';
                    html += '   <div class="user-avatar">';
                    html += '       <a href="javascript:">';
                    html += '           <img src="'+headimgurl+'">';
                    html += '       </a>';
                    html += '    </div>';
                    html += '    <div class="comment-section">';
                    html += '   <div class="user-info">';
                    html += '       <a href="javascript:" class="user-name">'+data.data.userinfo.nickname+'</a>';
                    html += '       <span class="comment-timestamp">刚刚</span>';
                    html += '       <span class="comment-Reply" onclick="replyComment(\''+data.data.userinfo.nickname+'\',\''+data.data.userinfo.id+'\',\''+data.data.id+'\')" ></span>';
                    html += '   </div>';
                    html += '   <div class="comment-text">'+data.data.content+'</div>';
                    html += '   </div>';
                    html += ' </li>';
                    $('#not-comment').remove();
                    $("#comment-list ").prepend(html);
                    $("#liAdd_"+addLiIndex).hide().slideDown('fast');
                    addLiIndex++;
                }
                clearComment();
            }else{
                layer.open({content:'评论失败，原因：'+data.error,time:1,skin:'msg'});
            }
        },'JSON');
    }
    $(function () {
        getCommentList();
        $(window).scroll(function(){
            var srollPos = $(window).scrollTop();
            if(srollPos+$(window).height() > $(document).height() - 80){
                if(status == 1){
                    status = 0;
                    getCommentList();
                }
            }
        });
        $("#comment_content").on("keyup",function () {
            var length = $("#comment_content").val().length;
            $("#length").html(length+'/300');
            if(length > 0){
                $('.send').addClass('submit');
                $('.submit').unbind();
                $('.submit').bind('click',function (){
                    addComment();
                })
            }else{
                $('.send').removeClass('submit');
            }
            if(length > 300){
                var text = $("#comment_content").val().substring(0,300);
                $("#comment_content").val(text);
            }
        });

        getGift();

    })

    function getGift(){
        var url = "<?php echo url('Api/getGift'); ?>";
        var data = {
            "func": "getNameAndTime" ,
        };
        var html = '';
        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            dataType: 'json',
            success: function(data){
                data.forEach(function(item) {
                    html+='<li>' +
                        '<a onclick="reward('+item.id+','+item.price+',<?php echo $videoInfo['id']; ?>,1)">'+
                        '       <img src="'+item.images+'">\n' +
                        '       <span>'+item.name+'</span>\n' +
                        '       <span class="money">'+item.price+'金币</span>\n' +
                        '       </a>'+
                        '  </li>';
                })
                $('#gift_box').html(html);
            }
        });
    }
</script>
<!--播放-->

<?php 
$subject = strip_tags(htmlspecialchars_decode($videoInfo['info']));//去除html标签
$pattern = '/\s/';//去除空白
$content = preg_replace($pattern, '', $subject);
$infodata = mb_substr($content, 0, 20);//截取80个汉字
 ?>
<div class="layui-m-layerchild  layui-m-anim-up" id="layui-comment" style="position:fixed; bottom:0; left:0; width: 100%; height: 200px; padding:10px 0; border:none;display: none ">
    <div class="layui-m-layercont">可传入任何内容，支持html。一般用于手机页面中</div>
</div>
<!--    <div class="video-box" id="playerBox">
        <img src="<?php echo $videoInfo['thumbnail']; ?>" width="100%" height="100%" />
    </div>-->
<div class="video-box" style="position: relative;height:215px;">
    <div class="leftz">
        <div class="left">
            <?php if($adSetting['ad_on']==1): ?>
            <div id="yytf" class="yytf_1">
                <div id="daojs"><span id="djs"><?php echo $adSetting["play_video_ad_time"]; ?></span>关闭广告</div>
                <a href="<?php echo $adSetting["pre_ad_url"]; ?>">
                <div class="baiduyytf"><iframe style="width: 100%;height: 100%;border: 0;" src="<?php echo $adSetting['web_pre_ad']; ?>"></iframe></div>
                </a>
            </div>
            <div id="playerBox" style="display: none;z-index: 9;height:215px;"></div>
            <?php else: ?>
            <div id="playerBox" style="z-index: 9;height:215px;"></div>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="panel p-title" style='margin-top: 20px;'>
    <p class="biaoti"><?php echo $videoInfo['title']; ?></p>
    <span><i class="btn fn-bofang"></i><?php echo $videoInfo['click']; ?></span>&nbsp;&nbsp;
    <span><i class="btn fn-time" style="font-size: 12px;"></i><?php echo date('Y-m-d H:i:s',(int)$videoInfo['add_time']); ?></span>
    <div class="drop-down"><i class="btn fn-down-bold"></i></div>
    <div class="desc">
        <p class="up_user_info">
            <?php if($videoInfo['user_id']>0): ?>
            <a title="进入ta的主页"  class="member_link" href="<?php echo url('homepage/index',array('uid'=>$videoInfo['user_id'])); ?>">
                <img title="上传者" width="30" src="<?php echo (isset($videoInfo['headimgurl']) && ($videoInfo['headimgurl'] !== '')?$videoInfo['headimgurl']:'/static/images/user_dafault_headimg.jpg'); ?>" />
            </a>
            <a title="进入ta的主页"  class="member_link" href="<?php echo url('homepage/index',array('uid'=>$videoInfo['user_id'])); ?>"><span><?php echo (isset($videoInfo['member']) && ($videoInfo['member'] !== '')?$videoInfo['member']:'无名氏'); ?></span></a>
            <?php else: ?>
            <img title="上传者" width="30" src="<?php echo (isset($videoInfo['headimgurl']) && ($videoInfo['headimgurl'] !== '')?$videoInfo['headimgurl']:'/static/images/user_dafault_headimg.jpg'); ?>" />
            <span><?php echo (isset($videoInfo['member']) && ($videoInfo['member'] !== '')?$videoInfo['member']:'无名氏'); ?></span>
            <?php endif; ?>
        </p>
        <p><label style="line-height:21px;">分类：</label><a href="/video/lists.html?cid=<?php echo (isset($videoInfo['classid']) && ($videoInfo['classid'] !== '')?$videoInfo['classid']:''); ?>"><?php echo (isset($videoInfo['classname']) && ($videoInfo['classname'] !== '')?$videoInfo['classname']:''); ?></a></p>
        <?php if($videoInfo['taglist']): ?>
            <p><label style="line-height:21px;">标签：</label>
                <?php if(is_array((isset($videoInfo['taglist']) && ($videoInfo['taglist'] !== '')?$videoInfo['taglist']:'')) || (isset($videoInfo['taglist']) && ($videoInfo['taglist'] !== '')?$videoInfo['taglist']:'') instanceof \think\Collection || (isset($videoInfo['taglist']) && ($videoInfo['taglist'] !== '')?$videoInfo['taglist']:'') instanceof \think\Paginator): $i = 0; $__LIST__ = (isset($videoInfo['taglist']) && ($videoInfo['taglist'] !== '')?$videoInfo['taglist']:'');if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <a href="/video/lists.html?tag_id=<?php echo $v['id']; ?>"><?php echo $v['name']; ?></a>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </p>
        <?php endif; ?>
        <p><label style="line-height:21px;"><?php echo $classname['name']; ?>：</label>
            <a href="/video/lists.html?area_id=<?php echo (isset($videoInfo['area_id']) && ($videoInfo['area_id'] !== '')?$videoInfo['area_id']:'0'); ?>"><?php echo (isset($classarea['name']) && ($classarea['name'] !== '')?$classarea['name']:'未知'); ?></a>
        </p>
        <?php if(!(empty($videoInfo['info']) || (($videoInfo['info'] instanceof \think\Collection || $videoInfo['info'] instanceof \think\Paginator ) && $videoInfo['info']->isEmpty()))): ?>
        <h3 style="font-weight: bold;margin-bottom: 5px;">视频简介：</h3>
        <div style="height: 75px; display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 4;overflow: hidden;line-height: 20px;"> <?php echo htmlspecialchars_decode($videoInfo['info']); ?></div>
        <?php endif; ?>
    </div>
</div>
<ul class="panel powerful">
    <li id="giveGoodBtn"><i class="btn fn-zan2 <?php if($isGooded==true): ?>gived<?php endif; ?>"></i>点赞(<var id="goodNum"><?php echo (isset($videoInfo['good']) && ($videoInfo['good'] !== '')?$videoInfo['good']:"0"); ?></var>)</li>
    <li><i class="btn fn-shoucang1 <?php if($isCollected==true): ?>gived<?php endif; ?>"></i><var id="shoucang"><?php if($isCollected==true): ?>已收藏<?php else: ?>未收藏<?php endif; ?></var></li>
    <!--<li><i class="btn fn-xiazai"></i>下载</li>-->
    <li onclick="layer.open({skin:'msg',content:'建议使用浏览器自带的分享功能 ',time:2})"><i class="btn fn-fenxiang"></i>分享</li>
</ul>

<div class="reward">
    <p>打赏</p>
    <ul id="gift_box">

    </ul>
</div>

<!--截图-->
<?php if(!(empty($img) || (($img instanceof \think\Collection || $img instanceof \think\Paginator ) && $img->isEmpty()))): ?>
<div class="new-video-img"  id="gallery">
    <p>视频截图</p>
    <div id="video-img">
        <?php if(is_array($img) || $img instanceof \think\Collection || $img instanceof \think\Paginator): $i = 0; $__LIST__ = $img;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
        <a href="<?php echo $v; ?>"><img src="<?php echo $v; ?>"/></a>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>
<?php endif; ?>

<div class="tab">
    <?php if(isset($videoSet)): ?>
    <span data-for="drama" class="active">剧集</span>
    <?php endif; ?>
    <span data-for="discuss">评论1</span>
    <span data-for="r-list">推荐1</span>
</div>
<div class="set-box">
    <!--剧集-->
    <?php if(isset($videoSet)): ?>
    <div class="panel drama" style="display: block;">
        <ul>
            <?php if(is_array($videoSet) || $videoSet instanceof \think\Collection || $videoSet instanceof \think\Paginator): $i = 0; $__LIST__ = $videoSet;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): $mod = ($i % 2 );++$i;?>
            <li <?php if($video['id'] == $videoInfo['id']): ?>class="curlPlayVideoLi"<?php endif; ?>>
            <a href="<?php echo url('video/play',array('id'=>$video['id'])); ?>">
                <div class="img-box">
                    <img src="<?php echo $video['thumbnail']; ?>" />
                    <span><?php echo $video['play_time']; ?></span>
                </div>
                <div class="font-box">
                    <p><?php echo $video['title']; ?></p>
                    <span><i class="btn fn-zan2"></i><?php echo $video['good']; ?></span>
                    <span style="margin-left: 20px;"><i class="btn fn-see"></i><?php echo $video['click']; ?></span>
                </div>
            </a>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <?php endif; ?>
    <!--推荐-->
    <div class="panel r-list">
        <!--<p class="title">大家都在看</p>-->
        <ul>
            <?php if(is_array($recom_list) || $recom_list instanceof \think\Collection || $recom_list instanceof \think\Paginator): $i = 0; $__LIST__ = $recom_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <li>
                <a href="<?php echo url('video/play',array('id'=>$vo['id'])); ?>">
                    <div class="img-box">
                        <img src="<?php echo $vo['thumbnail']; ?>">
                        <span><?php echo $vo['play_time']; ?></span>
                    </div>
                    <div class="font-box">
                        <p><?php echo $vo['title']; ?></p>
                        <span><i class="btn fn-zan2"></i><?php echo $vo['good']; ?></span>
                        <span style="margin-left: 20px;"><i class="btn fn-see"></i><?php echo $vo['click']; ?></span>
                    </div>
                </a>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <!--评论-->
    <div class="panel discuss">
        <p class="title">评论</p>
        <!--<div class="cmt-input">快来说说你的感想吧</div>-->
        <div class="font-text">
            <img src="/tpl/happy2018/static/images/header.png">
            <input type="text" />
            <div class="area-box">
                <textarea id="comment_content"></textarea>
                <span id="length">0/300</span>
                <div class="btn-box">
                    <a class="canel" onclick="clearComment()">取消</a>
                    <a class="send">发送</a><!--class="submit"-->
                </div>
            </div>
        </div>
        <div class="comment-list">
            <ul id="comment-list">
                <li class='not-comment' id='not-comment'>暂没评论 ~</li>
            </ul>
        </div>
    </div>
</div>

</div>
<input type="hidden" id="ad_on" value="0">
<link rel="stylesheet" href="__ROOT__/tpl/happy2018/mobile/static/css/touchTouch.css">

<script src="__ROOT__/tpl/happy2018/mobile/static/js/touchTouch.jquery.js"></script>

<script>
    $(function () {

        $("#video-img a").touchTouch();

    });
    function check_logins(){
        $.post('/api/get_login_status','{}',function (e) {
            if(e.resultCode == 3){
                layer.open(
                    {
                        content:'该账号已在其他地方登陆！',
                        time:3,
                        skin:'msg',
                        end: function(){
                            window.location.reload();
                        }
                    });
            }
        },'json');
        setTimeout('check_logins()', 5000);
    }
    $(function(){
        /*推荐，评论，剧集的切换*/
        $(".tab span").click(function(){
            var $t = $(this).attr("data-for");
            $(".set-box").children().hide();
            $(".set-box").find("."+$t).show();
            $(".tab span").removeClass("active");
            $(this).addClass("active");
        });

        $(".drop-down").click(function () {
            if($(this).hasClass("on")==false){
                $(".p-title .desc").stop().show();
                $(this).find(".fn-down-bold").css("transform","rotate(180deg)");
                $(this).addClass("on");
            }else{
                $(".p-title .desc").stop().hide();
                $(this).find(".fn-down-bold").css("transform","rotate(0deg)");
                $(this).removeClass("on");
            }
        });

    });


    //---------play video ---------------------------------------------------------

    var playRequestUrl='<?php echo url("api/payVideo"); ?>';    //*必需配置项
    var player,timer;
    var page = 0;
    var addLiIndex=1;
    var trySeeTime=10;
    var loginPageUrl="<?php echo url('index/login'); ?>";

    function adjump(){
        var canJumpAd="<?php echo $adSetting['skip_ad_on']; ?>";
        if(canJumpAd==1){
            player.videoPlay();
        }else{
            layer.msg('您不能跳过广告',{icon:2,time:2000});
        }
    }

    function loadedHandler(){
        if(player.getMetaDate()){
            player.addListener('pause', pauseHandler);
            player.addListener('play', playHandler);
        }
    }

    function pauseHandler(){
        console.log('pause');
        clearInterval(timer);
        if(trySeeTime>0)layer.open({content:'试看计时暂停',time:1,skin:'msg'});
    }

    function playHandler(){
        layer.open({content:'试看计时开始……',time:1,skin:'msg'});
        timer=setInterval(checkTrySeeTime,1000);
    }

    function checkTrySeeTime(){
        if(trySeeTime<=0){
            layer.open({content:'很抱歉，试看时间到.',time:1,skin:'msg'});
            //setTimeout("videoPlayInit(<?php echo $videoInfo['id']; ?>)",2000);

            setTimeout("location.reload()",1000);
            player.videoPause();
        }else{
            trySeeTime--;
            console.log(trySeeTime);
        }
    }

    function createPlayer(playParams,isTrySee){
        if(isTrySee==undefined) isTrySee=false;
        if(layer!=undefined) layer.closeAll();
        var vodUrl=(playParams==undefined)?'#':playParams.videoInfo.url;
        var params={
            container: '#playerBox',
            variable: 'player',
            poster:'<?php echo $videoInfo["thumbnail"]; ?>',
            video: vodUrl,
            //loaded:'loadedHandler',
            autoplay:false,
            flashplayer: true,
        };


        if(playParams!=undefined){
            $.ajax({
                url:playRequestUrl,
                type:'POST',
                dataType:'JSON',
                data:{id:playParams.videoInfo.id,surePlay:1,isTrySee:isTrySee},
                async:false,
                success:function(resp){
                    if(resp.resultCode!=0){
                        layer.open({content:'您不能观看此影片！',time:1,skin:'msg'});
                        return false;
                    }
                    params.video=resp.data.videoInfo.url;

                    if(resp.data.freeType==2 && resp.data.videoInfo.gold>0 && isTrySee){
                        //按时长试看
                        trySeeTime=resp.data.freeNum;
                        console.log('begion try see:'+trySeeTime+'s');
                        params.loaded="loadedHandler";
                    }

                },
                error:function(){
                    layer.open({content:'影片信息加载失败！',time:2,skin:'msg'});
                    return false;
                }
            });
        }

        <?php if($adSetting['ad_on']==1): ?>
        $('#ad_on').val(1);
        params.adfront='<?php echo $adSetting["pre_ad"]; ?>';
        params.adfrontlink='<?php echo $adSetting["pre_ad_url"]; ?>';
        params.adfronttime='<?php echo $adSetting["play_video_ad_time"]; ?>';

        params.adpause='<?php echo $adSetting["suspend_ad"]; ?>';
        params.adpauselink='<?php echo $adSetting["suspend_ad_url"]; ?>';
        params.adpausetime='<?php echo $adSetting["play_video_ad_time"]; ?>';
        <?php endif; ?>

            params.skipButtonShow=false;
            player = new ckplayer(params);
            if(isTrySee) setTimeout("player.changeControlBarShow(false)",1000); //hide control
            if(playParams!=undefined) setTimeout("player.videoPlay()",1000); //play
        }


        $(function(){
            createPlayer(null,null);
            videoPlayInit(<?php echo $videoInfo['id']; ?>);

            $(".tab").find('span').first().click();

            //点赞
            <?php if($isGooded==false): ?>
            $("#giveGoodBtn").on('click',function(){
                var reqData={resourceType:'video',resourceId:<?php echo $videoInfo['id']; ?>};
                $.post('<?php echo url("api/giveGood"); ?>',reqData,function(data){
                    //console.log(data);
                    if(data.resultCode==0){
                        $('#goodNum').html(data.data.good);
                        $('#giveGoodBtn').find('.fn-zan2').addClass("gived");
                        $('#giveGoodBtn').unbind('click')
                        layer.open({content:'点赞成功',skin:'msg',time:2});
                    }else{
                        if(data.error=='用户未登陆'){
                            layer.open({content:'点赞失败,请登陆后再试!',skin:'msg',time:2,end:function () {
                                location.href="<?php echo url('index/login'); ?>";
                            }});
                        }else{
                            layer.open({content:'点赞失败，原因：'+data.error,skin:'msg',time:2});
                        }
                    }
                },'JSON');
            });
            <?php endif; ?>

                //收藏
                <?php if(!$isCollected): ?>
                $(".fn-shoucang1").on("click",function () {
                    var collectData={type:'1',id:'<?php echo $videoInfo["id"]; ?>'};
                    $.post('<?php echo url("api/colletion"); ?>',collectData,function (data) {
                        if(data.resultCode==0){
                            $('#shoucang').html('已收藏');
                            $('.fn-shoucang1').addClass("gived").unbind('click');
                            layer.open({content:'收藏成功',skin:'msg',time:2});
                        }else{
                            if(data.error=='用户未登陆'){
                                layer.open({content:'收藏失败,请登陆后再试!',skin:'msg',time:2,end:function () {
                                    location.href="<?php echo url('index/login'); ?>";
                                }});
                            }else{
                                layer.open({content:'收藏失败，原因：'+data.error,skin:'msg',time:2});
                            }
                        }
                    },'json');
                });
                <?php endif; ?>
                });

</script>

<?php if($login_status['resultCode'] == 1): ?>
<script>
    check_logins();
</script>
<?php endif; ?>
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