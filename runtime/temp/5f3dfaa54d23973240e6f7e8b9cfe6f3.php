<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:34:"./tpl/ms360/mobile/novel/show.html";i:1562572101;s:35:"./tpl/ms360/mobile/common/head.html";i:1562590060;s:37:"./tpl/ms360/mobile/common/footer.html";i:1562590060;}*/ ?>
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
<link rel="stylesheet" href="__ROOT__/tpl/ms360/mobile/static/css/n-list.css">
<style>
    .novel-main .novel-left{box-shadow:none;}
    .layui-m-layercont{
        text-align: center!important;
    }
</style>
<script>
    <?php if($permit == 0): ?>
    novelpermit(<?php echo $info['gold']; ?>,<?php echo $info['id']; ?>);
    <?php endif; ?>
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
            ,style: 'position:fixed; bottom:0; left:0; width: 100%; height: 145px; padding:10px 0; border:none;'
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
                    var reqData={resourceType:'3',resourceId:<?php echo $info['id']; ?>,content:content,to_user:to_user,to_id:to_id};
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
        var  resourceId = " <?php echo $info['id']; ?>";
        var data = {
            "page":page,
            "resourceId":resourceId,
            "resourceType":3,
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
        var reqData={resourceType:'3',resourceId:<?php echo $info['id']; ?>,content:content,to_id:to_id};
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

        //收藏
        <?php if(!$isCollected): ?>
        $("#giveCollectBtn").on("click",function () {
            var collectData={type:'3',id:'<?php echo $info["id"]; ?>'};
            $.post('<?php echo url("api/colletion"); ?>',collectData,function (data) {
                if(data.resultCode==0){
                    $('#giveCollectBtn .fn-shoucang1').addClass("gived");
                    layer.open({skin:'msg',content:'收藏成功',time:2});
                    $('#shoucang').html('已收藏');
                    $("#giveCollectBtn").unbind('click');
                }else{
                    layer.open({skin:'msg',content:'收藏失败，原因：'+data.error,time:2});
                }
            },'json');
        });
        <?php endif; ?>

            //点赞
            <?php if(!$isGooded): ?>
            $("#giveGoodBtn").on('click',function(){
                var reqData={resourceType:'novel',resourceId:<?php echo $info['id']; ?>};
                $.post('<?php echo url("api/giveGood"); ?>',reqData,function(data){
                    //console.log(data);
                    if(data.resultCode==0){
                        $('#goodNum').html(data.data.good);
                        $('#giveGoodBtn i').addClass("gived");
                        $('#giveGoodBtn').unbind('click');
                        layer.open({skin:'msg',content:'点赞成功',time:2});
                    }else{
                        layer.open({skin:'msg',content:'点赞失败，原因：'+data.error,time:2});
                    }
                },'JSON');
            });
            <?php endif; ?>

    });

</script>

        <div class="novel-detail">
            <div class="novel-top">
                <p class="n-title"><?php echo $info['title']; ?></p>
                <div class="n-info">
                    • <span>作者：<?php if($info['user_id']>0): ?><a title="进入ta的主页"  href="<?php echo url('homepage/index',array('uid'=>$info['user_id'])); ?>"><var><?php echo $info['username']; ?></var></a><?php else: ?>管理员<?php endif; ?>
                            &nbsp;&nbsp;</span> •
                    <span>时间：<?php echo date("y-m-d H:i:s",$info['update_time']); ?></span> •
                    <ul class="operate">
                        <li id="giveGoodBtn"><i class="btn fn-zan2 <?php if($isGooded==true): ?>gived<?php endif; ?>"></i>点赞(<var id="goodNum"><?php echo (isset($info['good']) && ($info['good'] !== '')?$info['good']:"0"); ?></var>)
                        </li>
                        <li id="giveCollectBtn"><i class="btn fn-shoucang1 <?php if($isCollected==true): ?>gived<?php endif; ?>"></i><var
                                id="shoucang"><?php if($isCollected==true): ?>已收藏<?php else: ?>未收藏<?php endif; ?></var></li>
                    </ul>
                    <div class="tag">
                        <?php if(is_array($tag_list) || $tag_list instanceof \think\Collection || $tag_list instanceof \think\Paginator): $i = 0; $__LIST__ = $tag_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <span style="margin-bottom: 5px;"><?php echo $vo['name']; ?></span>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
            </div>

            <div class="n-decs">
                <?php echo htmlspecialchars_decode($info['content']); ?>
            </div>
            <div class="cut">
                <?php if(!empty($previous_info)): ?>
                <a class="prev" title="<?php echo $previous_info['title']; ?>"
                   href="<?php echo url('novel/show',array('id'=>$previous_info['id'])); ?>">
                    <div class="prev-btn" style="margin-left: -7px;"><i class="btn fn-prev"></i></div>
                    <div class="prev-box">
                        <div class="img-bg">
                            <img src="<?php echo $previous_info['thumbnail']; ?>">
                        </div>
                        <p><?php echo $previous_info['title']; ?></p>
                    </div>
                </a>
                <?php endif; if(!empty($next_info)): ?>
                <a class="next" title="<?php echo $next_info['title']; ?>" href="<?php echo url('novel/show',array('id'=>$next_info['id'])); ?>">
                    <div class="prev-box">
                        <div class="img-bg">
                            <img src="<?php echo $next_info['thumbnail']; ?>">
                        </div>
                        <p><?php echo $next_info['title']; ?></p>
                    </div>
                    <div class="prev-btn" style="margin-right: -7px;"><i class="btn fn-next"></i></div>
                </a>
                <?php endif; ?>
            </div>
            <div class="n-discuss">
                <p class="title">资讯评论</p>
                <div class="font-text">
                    <img src="/tpl/default/static/images/header.png">
                    <input type="text">
                    <div class="area-box">
                        <textarea id="comment_content"></textarea>
                        <span id="length">0/300</span>
                        <div class="btn-box">
                            <a class="canel" onclick="clearComment()">取消</a>
                            <a class="send">发送</a>
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