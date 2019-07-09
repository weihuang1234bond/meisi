<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:27:"./tpl/zixun/video/play.html";i:1555991202;s:30:"./tpl/zixun/common/header.html";i:1525396004;s:30:"./tpl/zixun/common/footer.html";i:1525309312;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php $menu = getMenu(); $register_validate = empty(get_config('register_validate')) ? 0 : get_config('register_validate');?>
    <title><?php echo (isset($page_title) && ($page_title !== '')?$page_title:""); ?>_<?php echo $seo['site_title']; ?></title>
    <meta name="keywords" lang="zh-CN" content="<?php echo $seo['site_keywords']; ?>"/>
    <meta name="description" lang="zh-CN" content="<?php echo $seo['site_description']; ?>" />
    <meta name="renderer" content="webkit">

    <link href="__ROOT__/tpl/zixun/static/css/style_register.css" rel="stylesheet" type="text/css">
    <link href="__ROOT__/tpl/zixun/static/css/style_common.min.css" rel="stylesheet" type="text/css"/>
    <link href="__ROOT__/tpl/zixun/static/css/style_ergeng2016_new.css" rel="stylesheet" type="text/css"/>
    <link href="__ROOT__/tpl/zixun/static/css/style_icon_all.css" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="__ROOT__/tpl/zixun/static/css/font_485358_gtgl3zs6gyvqjjor/iconfont.css">

    <script type="text/javascript" src="__ROOT__/tpl/zixun/static/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="__ROOT__/tpl/zixun/static/js/layer/layer.js"></script>
    <script type="text/javascript" src="__ROOT__/tpl/zixun/static/js/common.js"></script>
    <script type="text/javascript" src="__ROOT__/tpl/zixun/static/js/layui/layui.js"></script>


    <script>
        $(function(){
            $(".box1").hover(function(){
                $(this).find(".video-play-btn").addClass("animation");
                $(this).find("img").addClass("bigImg");
            },function () {
                $(this).find(".video-play-btn").removeClass("animation");
                $(this).find("img").removeClass("bigImg");
            });
            $("#login").hover(function () {
                $(".info-m").show();
            },function(){
                $(".info-m").hide();
            });
        });
    </script>

</head>
<body>
<div id="eg-header" class="header-scroll">
    <div class="eg-width-1200">
        <div class="eg-logo fl">
            <div class="g1 eg-pt-5 fl">
                <a href="/" title="<?php echo $seo['site_title']; ?>">
                    <img src="<?php echo $seo['site_logo']; ?>" >
                </a>
            </div>
        </div>
        <div class="eg-menu-one g-head-center eg-mr-30 fl" style="width: 520px;">
            <ul>
                <?php if(is_array($menu) || $menu instanceof \think\Collection || $menu instanceof \think\Paginator): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li <?php if($vo['current'] == 1): ?>class="on"<?php endif; ?> >
                <a href="<?php echo $vo['url']; ?>" class="menu-list" title="<?php echo $vo['name']; ?>" >
                    <span class="menu1"><?php echo $vo['name']; ?></span>
                </a>
                <?php if(!(empty($vo['sublist']) || (($vo['sublist'] instanceof \think\Collection || $vo['sublist'] instanceof \think\Paginator ) && $vo['sublist']->isEmpty()))): ?>
                <div class="menu-level" style="display: none;">
                    <p>更多视频分类，让你无忧观看</p>
                    <?php if(is_array($vo['sublist']) || $vo['sublist'] instanceof \think\Collection || $vo['sublist'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['sublist'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                    <span <?php if($v['current'] == 1): ?>class="current"<?php endif; ?>><a href="<?php echo $v['url']; ?>"><?php echo $v['name']; ?></a></span>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <?php endif; ?>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <?php $controller =  lcfirst(request()->controller());?>
        <div class="eg-search-one eg-radius eg-border overflow">
            <form id="searchForm"
                    <?php switch($controller): case "images": ?> action="<?php echo url('search/index',array('type'=>'atlas')); ?>"<?php break; case "atlas": ?> action="<?php echo url('search/index',array('type'=>'atlas')); ?>"<?php break; case "novel": ?>action="<?php echo url('search/index',array('type'=>'novel')); ?>"<?php break; case "search": ?>action="<?php echo url('search/index',array('type'=>$type)); ?>"<?php break; default: ?>
                    action="<?php echo url('search/index',array('type'=>'video')); ?>"
                    <?php endswitch; ?>
                    method="get">

                <div class="eg-box-1 fl">
                    <input type="text" class="default input-txt02" value='<?php if(isset($key_word)): ?><?php echo $key_word; endif; ?>' name="key_word">
                </div>
                <div class="eg-box-3 fl">
                    <div>
                        <?php if($controller=="atlas" || isset($type)&& $type=='atlas'): ?> <span class="choice-box1">图册<i class="btn fn-triangle"></i></span>
                        <?php elseif($controller=="images" || isset($type)&& $type=='images'): ?> <span class="choice-box1">图册<i class="btn fn-triangle"></i></span>
                        <?php elseif($controller=="novel" || isset($type)&& $type=='novel'): ?> <span class="choice-box1">资讯<i class="btn fn-triangle"></i></span>
                        <?php elseif($controller=="member" || isset($type)&& $type=='member'): ?> <span class="choice-box1">会员<i class="btn fn-triangle"></i></span>
                        <?php elseif($controller=="video" || isset($type)&& $type=='video'): ?> <span class="choice-box1">视频<i class="btn fn-triangle"></i></span>
                        <?php else: ?>
                        <span class="choice-box1">视频<i class="btn fn-triangle"></i></span>
                        <?php endif; ?>

                        <div class="choice-btn">
                            <p onclick="$('#searchForm').attr('action','<?php echo url('search/index',array('type'=>'video')); ?>')">视频</p>
                            <p onclick="$('#searchForm').attr('action','<?php echo url('search/index',array('type'=>'atlas')); ?>')">图册</p>
                            <p onclick="$('#searchForm').attr('action','<?php echo url('search/index',array('type'=>'novel')); ?>')">资讯</p>
                            <p onclick="$('#searchForm').attr('action','<?php echo url('search/index',array('type'=>'member')); ?>')">会员</p>
                            <?php if(isset($type)): ?><p onclick="$('#searchForm').attr('action','<?php echo url('search/index',array('type'=>$type)); ?>')">自动</p><?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="eg-box-2 fl">
                    <button class="btn-eg-noradius btn-st03" type="submit"><span class="db"></span></button>
                </div>
            </form>
        </div>


        <?php $memberInfo = get_member_info();$login_status = check_is_login();if($login_status['resultCode'] != 1): ?>
        <!--未登录状态-->
        <div id="logout" class="dn" style="display: inline-block;float: right;">
            <div class="eg-menu-two fr">
                <ul>
                    <li class="m1"><a href="<?php echo url('index/login'); ?>" title="登录" class="poplogin"><em>登录</em></a></li>
                    <li class="m3"><a href="<?php echo url('index/register'); ?>" title="注册"><em>注册</em></a></li>
                </ul>
            </div>
        </div>

      <!--  <div class="cb"></div>-->

        <?php else: ?>
        <!--已经登录状态-->
        <div id="login" class="dn">

            <div class="eg-menu-three pos-r fr">

                <div class="user-box">

                    <div class="user-icon eg-mr-10 fl pos-r">

                        <a href="<?php echo url('member/member'); ?>" title=""><img id="header_avatar" src="<?php if(session('member_info')['headimgurl'] != ''): ?><?php echo session('member_info')['headimgurl']; else: ?>/static/images/user_dafault_headimg.jpg<?php endif; ?>"></a>

                    </div>

                    <div class="fl icon_arrow_down"></div>

                </div>

                <div class="info-m">
                    <div class="user-drop">
                        <div class="user-i"><a href="<?php echo url('member/member'); ?>" target="_blank"><img src="<?php if(session('member_info')['headimgurl'] != ''): ?><?php echo session('member_info')['headimgurl']; else: ?>/static/images/user_dafault_headimg.jpg<?php endif; ?>"></a>
                            <div class="user-r">
                                <div class="user-t clearfix">
                                    <div class="fl user-name"><a href="<?php echo url('member/member'); ?>" target="_blank"><?php echo session('member_info')['nickname']; ?></a></div>
                                    <div class="fl user-icon clearfix"><i class="phone-icon"></i>
                                        <?php if($memberInfo['out_time'] > time()): ?><i class="v-icon"></i><?php else: ?><i class="p-icon"><?php endif; ?></div>
                                    <?php if(isSign() != '1'): ?> <a href="javascript:void(0);" onclick="sign()" class="day-check-button fl sign-btn-sidebar">立即签到</a> <?php else: ?>
                                    <a href="javascript:void(0);" class="day-check-button fl sign-btn-sidebar ed Completion">已签到</a> <?php endif; ?> </div>
                                <div class="user-id" style="height:5px;"> </div>
                                <?php if($memberInfo['isVip']==false): ?>
                                <div class="hkb" style="border-radius:20px;"> 您还不是会员<a href="<?php echo url('system_pay/recharge'); ?>" target="_blank">开通/续费</a></div>
                                <?php else: ?>
                                <div class="hkb" style="border-radius:20px;">VIP会员 <?php if($memberInfo['is_permanent'] == 1): ?>永久<?php else: if($memberInfo['out_time'] > time()): ?><?php echo safe_date('Y-m-d',$memberInfo['out_time']); ?> 到期 <?php else: ?>已过期<?php endif; endif; ?>
                                </div>
                                <?php endif; ?> </div>
                        </div>
                        <div class="vip-info">
                            <p>开通VIP可收获更有自信的自己</p>
                            <p>海量精彩视频<span>无限观看</span></p>
                            <p>海量高清图片<span>无限游览</span></p>
                        </div>
                        <div class="vip-btn"><a href="<?php echo url('system_pay/recharge'); ?>" target="_blank">充值VIP 会员</a></div>
                        <div class="user-bottom"><a href="javascript:void(0);" class="fr" onclick="logout()">退出</a><a href="<?php echo url('homepage/index',array('uid'=>session('member_id'))); ?>" target="_self">个人主页</a></div>
                    </div>
                </div>

            </div>

            <script type="text/javascript">

                $(".eg-menu-three").bind("mouseover", function () {

                    $(".user-drop-menu").css("display", "block");

                });

                $(".eg-menu-three").bind("mouseout", function () {

                    $(".user-drop-menu").css('display', 'none');

                });
                $(function(){
                    $(".eg-menu-one li").hover(function(){
                        $(this).find(".menu-level").slideDown();
                    },function(){
                        $(this).find(".menu-level").hide();
                    });
                });
                function sign(){

                    var url = "<?php echo url('api/sign'); ?>";
                    $.post(url, {}, function (data) {
                        if (data.resultCode == 0) {
                            $('.sign-btn').find('var').html('+'+data.data['value']);
                            $('.sign-btn').addClass("signs");
                            $('.sign-btn').addClass("Completion");
                            layer.msg('签到成功',  {icon: 1, anim: 6, time: 2000},function () {
                                $('.sign-btn').removeClass("signs");
                            });
                        }else{
                            layer.msg(data.error, {icon: 2, anim: 6, time: 2000});
                        }
                    }, 'JSON');
                }
                function logout(){
                    var url="<?php echo url('api/logout'); ?>";
                    $.post(url,{},function(){
                        layer.msg('退出成功', {time: 1000, icon: 1}, function() {
                            location.reload();
                        });
                    },'JSON');
                }

            </script>

            <div class="cb"></div>

        </div>
        <?php endif; ?>
        <div class="g-ucenter">
            <div class="u-box">
                <div class="handle">
                    <a href="<?php echo url('member/member'); ?>" ><i class="btn fn-vip2"></i>VIP</a>
                </div>
            </div>
            <div class="u-box">
                <div class="handle">
                    <a href="<?php echo url('member/agent'); ?>"><i class="btn fn-dailishang"></i>代理</a>
                </div>
            </div>
            <div class="u-box">
                <div class="handle">
                    <a href="<?php echo url('member/video'); ?>" ><i class="btn fn-shangchuan"></i>上传</a>
                </div>
            </div>
            <div class="u-box web">
                <div class="handle">
                    <a href="javaScript:void(0);" ><i class="btn fn-erweima"></i>移动端</a>
                </div>
                <div class="main-code login-after" style="display: none;">
                    <div id="qrcode"></div>
                    <div style="line-height: 30px;font-weight: bold;">扫我在手机上浏览</div>
                </div>
            </div>
            <a class="btn-gotop" id="btn-gotop"><i class="btn fn-top"></i></a>
        </div>


    </div>

</div>
<div style="height:52px;"></div>


<!-- qrcode start -->
<script src="/static/js/qrcode.min.js" type="text/javascript"></script>
<script type="text/javascript">
    // 设置 qrcode 参数
    var qrcode = new QRCode('qrcode', {
        text: location.href,
        width: 130,
        height: 130,
        colorDark: '#000000',
        colorLight: '#ffffff',
        correctLevel: QRCode.CorrectLevel.H
    });
</script>
<!-- qrcode end -->
<script type="text/javascript" src="/static/ckplayer/ckplayer.js"></script>
<style>
    .sub-tab .select li a p{
        color: #bdbdbd;
    }
</style>

<script src="/static/msvodx/js/video.js"></script>
<script type="text/javascript">

    var playRequestUrl='<?php echo url("api/payVideo"); ?>';    //*必需配置项
    var player,timer;
    var page = 0;
    var addLiIndex=1;
    var trySeeTime=10;

    function adjump(){
        var canJumpAd="<?php echo $adSetting['skip_ad_on']; ?>";
        if(canJumpAd==1){
            player.videoPlay();
        }else{
            layer.msg('您不能跳过广告',{icon:2,time:2000});
        }
    }

    function replyComment(username,id,to_id){
        var reply = '回复 @'+username+' : ';
        var length = reply.length;
        $('#to_user').val(id);
        $('#to_id').val(to_id);
        //alert(length);
        $(' .comment-atuser').html(reply);
        $('#comment_content').val(reply);
        $('#comment_content').focus();
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
                $('#comment_num').html("("+data.data.count+")");
                var datas = data.data.list;
                if(datas==undefined) return false;
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
                    html += '<div style="overflow: hidden;padding-bottom: 10px;">';
                    html += '   <div class="user-avatar">';
                    html += '       <a href="javascript:">';
                    html += '           <img src="'+headimgurl+'">';
                    html += '       </a>';
                    html += '    </div>';
                    html += '    <div class="comment-section">';
                    html += '   <div class="user-info">';
                    html += '       <a href="javascript:" class="user-name">'+item.nickname+'</a>';
                    html += '       <span class="comment-timestamp">'+times+'</span>';
                    html += '       <span class="comment-Reply" onclick="replyComment(\''+item.nickname+'\',\''+item.send_user+'\',\''+item.id+'\')" ></span>';
                    html += '   </div>';
                    html += '   <div class="comment-text">'+item.content+'</div>';
                    html += '   </div>';
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
                            html += '<div style="padding: 15px 20px;overflow: hidden;border-top: 1px solid #fbfbfb;">';
                            html += '    <div class="user-avatar">';
                            html += '    <a href="javascript:"><img src="'+headimgurl+'"></a>';
                            html += '    </div>';
                            html += '    <div class="comment-section">';
                            html += '    <div class="user-info">';
                            html += '    <a href="javascript:" class="user-name">'+it.nickname+'</a>';
                            html += '    <span class="comment-timestamp">'+times+'</span>';
                            html += '       <span class="comment-Reply" onclick="replyComment(\''+it.nickname+'\',\''+it.send_user+'\',\''+item.id+'\')" ></span>';
                            html += '    </div>';
                            html += '    <div class="comment-text">'+it.content+'</div>';
                            html += '</div>';
                            html += '</div>';
                        })
                    }
                    html += ' </li>';
                })
                if(data.data.isMore == 1){
                    $('#more-comment').show();
                }else{
                    $('#more-comment').hide();
                }
                $('#not-comment').remove();
                $('#comment-list').append(html);
            }
        });
    }


    function loadedHandler(){
        if(player.getMetaDate()){
            player.addListener('pause', pauseHandler);
            player.addListener('play', playHandler);
        }
    }

    function pauseHandler(){
        clearInterval(timer);
        if(trySeeTime>0)layer.msg('试看计时暂停',{icon:6,time:1000});
    }

    function playHandler(){
        layer.msg('试看计时开始……',{icon:6,time:1000});
        timer=setInterval(checkTrySeeTime,1000);
    }

    function checkTrySeeTime(){
        if(trySeeTime<=0){
            layer.msg('很抱歉，试看时间到.',{icon:2,time:1000});
            //setTimeout("videoPlayInit(<?php echo $videoInfo['id']; ?>)",2000);
            setTimeout("location.href=\"<?php echo url('index/prompt',['id'=>$videoInfo['id']]); ?>\"",1500);
            player.videoPause();
        }else{
            trySeeTime--;
            console.log(trySeeTime);
        }
    }

    function createPlayer(playParams,isTrySee){
        //console.log(playParams);
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
            flashplayer:false
        };
        if(playParams!=undefined){
            $.ajax({
                url:playRequestUrl,
                type:'POST',
                dataType:'JSON',
                data:{id:playParams.videoInfo.id,surePlay:1,isTrySee:isTrySee},
                async:false,
                success:function(resp){
                    //console.log(resp);
                    if(resp.resultCode!=0){
                        layer.msg('您不能观看此影片！',{time:2000,icon:2});
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
                    layer.msg('影片信息加载失败！',{time:2000,icon:2});
                    return false;
                }
            });
        }

        <?php if($adSetting['ad_on']==1): ?>
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
            if(playParams!=undefined){
                setTimeout("player.videoPlay()",1000);//play
            }

        }


        $(function(){
            getCommentList();
            getGift();
            createPlayer(null,null);
            videoPlayInit(<?php echo $videoInfo['id']; ?>);

            //点赞
            <?php if($isGooded==false): ?>
            $("#giveGoodBtn").on('click',function(){
                var reqData={resourceType:'video',resourceId:<?php echo $videoInfo['id']; ?>};
                $.post('<?php echo url("api/giveGood"); ?>',reqData,function(data){
                    //console.log(data);
                    if(data.resultCode==0){
                        $('#goodNum').html(data.data.good);
                        $('#giveGoodBtn').addClass("isSelected");

                        layer.msg('点赞成功',{time:1000,icon:1});
                    }else{
                        layer.msg('点赞失败，原因：'+data.error,{time:1000,icon:2});
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
                            $('.fn-shoucang1').addClass("isSelected");
                            layer.msg('收藏成功',{time:1000,icon:1});
                        }else{
                            layer.msg('收藏失败，原因：'+data.error,{time:1000,icon:2});
                        }
                    },'json');
                });
                <?php endif; ?>

                    $("#comment_content").on("keyup",function () {
                        var length = $("#comment_content").val().length;
                        var atuser_length  = $(".comment-atuser").html().length;
                        if(length < atuser_length){
                            $(".comment-atuser").html('');
                            $("#comment_content").val('');
                            $("#length").html(0);
                            $('#to_user').val(0);
                            $('#to_id').val(0);
                        }
                        if(atuser_length > 0){
                            length = (length - atuser_length) > 0 ?  (length - atuser_length) : 0;
                        }
                        $("#length").html(length);
                        if(length > 300){
                            var text = $("#comment_content").val().substring(0,300);
                            $("#comment_content").val(text);
                        }

                    });

                    //评论
                    $("#submit_comment").on("click",function () {
                        var content =  $.trim($("#comment_content").val());
                        var to_user = $("#to_user").val();
                        var to_id = $("#to_id").val();
                        if((content == "" || content == undefined || content == null || content == $(".comment-atuser").html())) {
                            layer.msg('请输入评论的内容!');
                            return false;
                        }
                        var reqData={resourceType:'1',resourceId:<?php echo $videoInfo['id']; ?>,content:content,to_user:to_user,to_id:to_id};
                        $.post('<?php echo url("api/comment"); ?>',reqData,function(data){
                            if(data.resultCode==0){
                                layer.msg(data.message,{time:1000,icon:1});
                                $("#comment_content").val('');
                                $("#length").html(0);
                                $(".comment-atuser").html('');
                                $('#to_user').val(0);
                                $('#to_id').val(0);
                                if(data.data.comment_examine_on != 1){
                                    var headimgurl = '/static/images/user_dafault_headimg.jpg';
                                    if(data.data.userinfo.headimgurl){
                                        headimgurl = data.data.userinfo.headimgurl;
                                    }
                                    var html = '';
                                    $('#not-comment').remove();
                                    if(data.data.to_id != 0){
                                        html += '<div style="padding: 15px 20px;overflow: hidden;border-top: 1px solid #fbfbfb;" id="common_'+data.data.id+'">';
                                        html += '    <div class="user-avatar">';
                                        html += '           <img src="'+headimgurl+'">';
                                        html += '    </div>';
                                        html += '    <div class="comment-section">';
                                        html += '    <div class="user-info">';
                                        html += '    <a href="javascript:" class="user-name">'+data.data.userinfo.nickname+'</a>';
                                        html += '    <span class="comment-timestamp">刚刚</span>';
                                        html += '       <span class="comment-Reply" onclick="replyComment(\''+data.data.userinfo.nickname+'\',\''+data.data.userinfo.id+'\',\''+data.data.to_id+'\')" ></span>';
                                        html += '    </div>';
                                        html += '    <div class="comment-text">'+data.data.content+'</div>';
                                        html += '   </div>';
                                        html += '</div>';
                                        $("#common_"+data.data.to_id).append(html);
                                        var go_id = 'common_'+data.data.id;
                                        window.location.href="#"+go_id;
                                    }else{
                                        html += '<li id="common_'+data.data.id+'">';
                                        html += '<div style="overflow: hidden;padding-bottom: 10px;">';
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
                                layer.msg('评论失败，原因：'+data.error,{time:2000,icon:2});
                            }
                        },'JSON');
                    });
                });


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
                        html += '<div class="r-cel" title="'+item.name+'">' ;
                        html += '  <img src="'+item.images+'"/>' ;
                        html += '       <span>'+item.name+'</span>' ;
                        html += '       <p>'+item.price+'金币</p>' ;
                        html += '        <a onclick="reward('+item.id+','+item.price+',<?php echo $videoInfo['id']; ?>,1)">打赏</a>' ;
                        html += ' </div>' ;
                    })
                    $('#gift_box').html(html);
                }
            });
        }
</script>
<div class="new-player eg-mb-30">
    <div class="eg-width-1200 eg-pt-25 eg-bg-none">
        <div class="video-title-one eg-width-970 eg-font-size-20 eg-bg-none eg-mb-10">
            <span><?php echo $videoInfo['title']; ?></span>
            <div class="interact-box">
                <span style="margin-right: 20px;">
                    <b>分类：</b>
                    <a href="/video/lists.html?cid=<?php echo (isset($videoInfo['classid']) && ($videoInfo['classid'] !== '')?$videoInfo['classid']:''); ?>" class="label">
                        <?php echo (isset($videoInfo['classname']) && ($videoInfo['classname'] !== '')?$videoInfo['classname']:''); ?>
                    </a>
                </span>
                <?php if($videoInfo['taglist']): ?>
                    <span style="margin-right: 20px;">
                        <b>标签：</b>
                        <?php if(is_array((isset($videoInfo['taglist']) && ($videoInfo['taglist'] !== '')?$videoInfo['taglist']:'')) || (isset($videoInfo['taglist']) && ($videoInfo['taglist'] !== '')?$videoInfo['taglist']:'') instanceof \think\Collection || (isset($videoInfo['taglist']) && ($videoInfo['taglist'] !== '')?$videoInfo['taglist']:'') instanceof \think\Paginator): $i = 0; $__LIST__ = (isset($videoInfo['taglist']) && ($videoInfo['taglist'] !== '')?$videoInfo['taglist']:'');if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                            <a  href="/video/lists.html?tag_id=<?php echo $v['id']; ?>" class="label"><?php echo (isset($v['name']) && ($v['name'] !== '')?$v['name']:''); ?></a>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </span>
                <?php endif; ?>
                <span>
                    <b><?php echo $classname['name']; ?>：</b>
                    <a  href="/video/lists.html?area_id=<?php echo (isset($videoInfo['area_id']) && ($videoInfo['area_id'] !== '')?$videoInfo['area_id']:'0'); ?>" class="label"><?php echo (isset($classarea['name']) && ($classarea['name'] !== '')?$classarea['name']:'未知'); ?></a>
                </span>
            </div>
        </div>
        <div class="new-video-player eg-margin-center" id="video-box"style="overflow: hidden; background: #363535; position: relative;">

            <div class="spv-player">
                <div class="play-box" id="playerBox">
                    <img src="<?php echo $videoInfo['thumbnail']; ?>" width="100%" height="100%" />

                </div>
                <div class="box-one">
                    <div class="share">
                        <div class="bdsharebuttonbox bdshare-button-style0-16" data-bd-bind="1520817158401">
                            <span>分享到：</span>
                            <!--<a href="#" class="bds_more" data-cmd="more"></a>-->
                            <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                            <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                            <a href="#" class="popup_sqq" data-cmd="sqq" title="分享到QQ"></a>
                            <a href="#" class="popup_tieba" data-cmd="tieba" title="分享到人人网"></a>
                            <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                        </div>
                        <script>window._bd_share_config = {
                            "common": {
                                "bdSnsKey": {},
                                "bdText": "",
                                "bdMini": "2",
                                "bdPic": "",
                                "bdStyle": "0",
                                "bdSize": "16"
                            }, "share": {}
                        };
                        with (document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];</script>
                        <div class="fn-updown">
                            <span><i class="btn fn-shoucang1 <?php if($isCollected): ?>isSelected<?php endif; ?>"></i><var id="shoucang"><?php if($isCollected): ?>已收藏<?php else: ?>收藏<?php endif; ?></var></span>
                            <span><i class="btn fn-zan2 <?php if($isGooded): ?>isSelected<?php endif; ?>" id="giveGoodBtn"></i><var id="goodNum"><?php echo $videoInfo['good']; ?></var></span>
                        </div>
                    </div>
                </div>
                <div class="list-box">
                    <div class="tab">
                        <span data-for="reward" class="cur">打赏</span>
                        <?php if(isset($videoSet)): ?>
                        <span data-for="select" id="videoSetLabel">选集</span>
                        <script>
                            setTimeout("$('#videoSetLabel').click()",500);
                        </script>
                        <?php endif; ?>
                    </div>
                    <div class="sub-tab">
                        <!--打赏-->
                        <div class="reward" style="display: block;">
                            <div class="reward-box" style="overflow:hidden;">
                                <div class="reward-content" id="gift_box">
                                </div>
                            </div>
                            <p class="text">该视频被<var id="count"><?php echo $count; ?></var>位网友打赏过,总额为<var id="countprice"><?php echo $count_price; ?></var>元</p>
                        </div>
                        <!--选集-->
                        <?php if(isset($videoSet)): ?>
                        <div class="select" >
                            <ul>
                                <?php if(is_array($videoSet) || $videoSet instanceof \think\Collection || $videoSet instanceof \think\Paginator): $i = 0; $__LIST__ = $videoSet;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): $mod = ($i % 2 );++$i;?>
                                <li <?php if($video['id'] == $videoInfo['id']): ?>class="curlPlayVideoLi"<?php endif; ?>>
                                <a href="<?php echo url('video/play',array('id'=>$video['id'])); ?>" _stat="video-list-column:click">
                                    <div class="pic" style="background:#1f1f1f;border:1px solid #535351;">
                                        <img src="<?php echo $video['thumbnail']; ?>" />
                                        <!--<span><?php echo $video['play_time']; ?></span>-->
                                    </div>
                                    <p><?php echo $video['title']; ?></p>
                                    <p class="content-like">
                                        <span class="mod-like"><i class="btn fn-see"></i><?php echo $video['click']; ?></span>
                                        <span class="mod-like" style="float: right;"><i class="btn fn-zan2"></i><?php echo (isset($video['good']) && ($video['good'] !== '')?$video['good']:"0"); ?></span>
                                    </p>
                                </a>
                                </li>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="eg-width-1200 eg-bg-none overflow">

    <!--截图-->
    <div class="left-part fl">

        <?php if(!(empty($img) || (($img instanceof \think\Collection || $img instanceof \think\Paginator ) && $img->isEmpty()))): ?>
        <div class="new-video-info translate">
            <p>视频截图</p>
            <div id="video-img">
                <?php if(is_array($img) || $img instanceof \think\Collection || $img instanceof \think\Paginator): $i = 0; $__LIST__ = $img;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <span><img src="<?php echo $v; ?>"/> </span>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
        <?php endif; if(!(empty($videoInfo['info']) || (($videoInfo['info'] instanceof \think\Collection || $videoInfo['info'] instanceof \think\Paginator ) && $videoInfo['info']->isEmpty()))): ?>
        <div class="new-video-info eg-pt-20 eg-pb-20 eg-mb-15 eg-radius">
            <h3 class="eg-font-size-22 eg-pb-10">视频简介：</h3>
            <div class="tj eg-color-333"> <?php echo htmlspecialchars_decode($videoInfo['info']); ?></div>
        </div>
        <?php endif; ?>
        <div class="new-video-info eg-pt-20 eg-pb-20 eg-mb-15 eg-radius">
            <div class="area-form">
                <div class="comment-form">
                    <div class="form-cell">
                        <div class="form-wordlimit">
                            <span class="form-wordlimit-input input-count" id="length">0</span>
                            <span class="form-wordlimit-upper">/300</span>
                        </div>
                        <div class="form-textarea form-textarea-picdom">
                            <textarea data-maxlength="300" name="content" placeholder="看点槽点，不吐不快！别憋着，马上大声说出来吧！" id="comment_content"></textarea>
                            <div class="comment-atuser" style="position:absolute;left:5px;top:32px;font-size:12px;background: #ebebeb"></div>
                            <input type="hidden" id="to_user" value="0">
                            <input type="hidden" id="to_id" value="0">
                        </div>
                        <div class="form-toolbar">
                            <div class="form-tool form-action">
                                <a href="javascript:;" class="form-btn-submit" id="submit_comment">发表评论</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="area-box">
                <div class="comment-tab">
                    <span class="comment-tab-left">全部评论<em class="num" id="comment_num">(0)</em></span>
                </div>
                <div class="comment-list" >
                    <ul id="comment-list">
                        <li id='not-comment'>暂没评论~</li>
                    </ul>
                    <div id="more-comment"><span onclick="getCommentList()">更多<i class="btn fn-more"></i></span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="right-part fr">
        <div class="creator-work eg-radius eg-mb-15">
            <div class="package">
                <div class="photo-info">
                    <div class="box1">
                        <!---->
                        <a href="<?php echo url('homepage/index',array('uid'=>$videoInfo['user_id'])); ?>">
                            <img src="<?php echo (isset($videoInfo['headimgurl']) && ($videoInfo['headimgurl'] !== '')?$videoInfo['headimgurl']:''); ?>">
                        </a>
                    </div>
                    <div class="box2 eg-font-size-18 tc">
                        <div class="fl" style="position: relative; left:50%;">
                            <span class="eg-color-333 eg-mr-5 fl" style="position: relative; right:50%">
                                <?php if($videoInfo['user_id']>0): ?><a title="进入ta的主页" href="<?php echo url('homepage/index',array('uid'=>$videoInfo['user_id'])); ?>"><var><?php echo $videoInfo['member']; ?></var></a><?php else: ?>管理员<?php endif; ?>
                            </span>
                        </div>
                        <div class="cl"></div>
                    </div>
                    <div class="box3 tc"></div>
                    <h3 class="tc eg-pd-20 eg-font-size-20"><em class="eg-bg-white">相关推荐</em></h3>
                    <ul>
                        <?php if(is_array($recom_list) || $recom_list instanceof \think\Collection || $recom_list instanceof \think\Paginator): $i = 0; $__LIST__ = $recom_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <li>
                            <a href="<?php echo url('video/play',array('id'=>$vo['id'])); ?>" title="<?php echo $vo['title']; ?>">
                                <div class="video-play-btn"></div>
                                <img src="<?php echo $vo['thumbnail']; ?>" alt="<?php echo $vo['title']; ?>">
                            </a><a class="box4 eg-mb-10" href="<?php echo url('video/play',array('id'=>$vo['id'])); ?>"  title="<?php echo $vo['title']; ?>">
                            <p><?php echo $vo['title']; ?></p>
                        </a>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="__ROOT__/tpl/zixun/static/css/viewer.min.css">
<script type="text/javascript" src="__ROOT__/tpl/zixun/static/js/viewer.min.js"></script>
<script>
    var viewer = new Viewer(document.getElementById('video-img'), {
        url: 'data-original'
    });
</script>
<script>
    $(function(){
        $(".list-box .tab span").click(function(){
            var $self = $(this);
            $self.addClass("cur").siblings().removeClass("cur");
            var $attr = $self.attr("data-for");
            $(".list-box .sub-tab>div").hide();
            $(".list-box .sub-tab").find("."+ $attr).show();
        });

        $(".select1").on("click","a",function(){
            $(".select1 a").removeClass("cur");
            $(this).addClass("cur");
        });
    });
    function check_logins(){
        $.post('/api/get_login_status','{}',function (e) {
            if(e.resultCode == 3){
                layer.msg('该账号已在其他地方登陆',
                    {
                        icon: 5,
                        time: 3000,
                        shadeClose: false,
                        shade: 0.8,
                        btn: ['确定'],
                        yes:function (index) {
                            layer.close(index);
                            window.location.reload();
                        },
                        success: function (layero) {
                            var btn = layero.find('.layui-layer-btn');
                            btn.css('text-align', 'center');
                        }
                    },function () {
                        window.location.reload();
                    });
            }
        },'json');
        setTimeout('check_logins()', 5000);
    }
</script>
<?php if($login_status['resultCode'] == 1): ?>
<script>
    check_logins();
</script>
<?php endif; ?>

    <!--底部-->
    <?php 
    $baseConfig = get_config_by_group('base');
    $baseConfig['friend_link'] =  empty($seo['friend_link']) ? $baseConfig['friend_link'] : $seo['friend_link'];
    $baseConfig['site_icp'] = empty($seo['site_icp']) ? $baseConfig['site_icp'] : $seo['site_icp'];
    $baseConfig['site_statis'] = empty($seo['site_statis']) ? $baseConfig['site_statis'] : $seo['site_statis'];
    $linkList=get_friend_link($baseConfig);
     ?>
    <div class="f12 footer">
        <div class="copyright">
            <div class="main">
                <p class="notice">警告：本网站明确不能包含非法信息，本网站严禁发表任何类型的不合法的内容<br>
                   本站所有视频、图片、资讯均由网友上传，如有侵犯权限请联系本站客服删除，本站不承担任何版权相关的法律责任， 请遵守本站协议勿上传不合法内容。<br>
                    若发现将永久封号封IP处理，如果您不自觉遵守本站相关规定否则请单击离开，谢谢合作！</p>

        <!--        <p class="link">
                    <?php if(is_array($linkList) || $linkList instanceof \think\Collection || $linkList instanceof \think\Paginator): $i = 0; $__LIST__ = $linkList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$link): $mod = ($i % 2 );++$i;?>
                    <a href="<?php echo $link['url']; ?>" target="_blank"><?php echo $link['name']; ?></a>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </p>-->

                <p class="copyright">ICP备案号:<?php echo $baseConfig['site_icp']; ?>&nbsp;&nbsp; Copyright (c) 2017-2018 All Rights Reserved.</p>

                <!--统计代码-->
                <span style="    display: block;width: 1px;margin: 0 auto;">
                    <?php echo htmlspecialchars_decode($baseConfig['site_statis']); ?>
                </span>
            </div>
        </div>
    </div>

</div>

    <?php if($login_status['resultCode'] == 3): ?>
    <script>
        layer.msg('该账号已在其他地方登陆',
            {
                icon: 5,
                time: 0,
                shadeClose: false,
                shade: 0.8,
                btn: ['确定'],
                yes:function (index) {
                    layer.close(index);
                    window.location.reload();
                },
                success: function (layero) {
                    var btn = layero.find('.layui-layer-btn');
                    btn.css('text-align', 'center');
                }
            });
    </script>
    <?php endif; ?>
</body>
</html>