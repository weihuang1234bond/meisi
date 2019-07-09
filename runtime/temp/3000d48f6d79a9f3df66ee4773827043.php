<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:47:"./tpl/ms360/mobile/member/collection_video.html";i:1531103064;s:35:"./tpl/ms360/mobile/common/head.html";i:1562562557;s:37:"./tpl/ms360/mobile/common/footer.html";i:1562413629;}*/ ?>
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
    footer a.active{
        color: #888;
    }
    footer a:last-child{
        color: #dc1d1d;
    }
</style>
    <div class="tab-box">
        <a href="<?php echo url('member/collection_video'); ?>" target="_self" class="cur">视频</a>
        <a href="<?php echo url('member/collection_img'); ?>" target="_self">图片</a>
        <a href="<?php echo url('member/collection_novel'); ?>" target="_self">资讯</a>
    </div>
    <ul class="content-list">
        <?php if(!(empty($video_info) || (($video_info instanceof \think\Collection || $video_info instanceof \think\Paginator ) && $video_info->isEmpty()))): if(is_array($video_info) || $video_info instanceof \think\Collection || $video_info instanceof \think\Paginator): $i = 0; $__LIST__ = $video_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>

        <li>
            <div class="v">
                <a href="<?php echo url('video/play',['id'=>$v['video_id']]); ?>">
                <div class="v-thumb">
                    <img src="<?php echo $v['thumbnail']; ?>">
                    <div class="v-tagrb"><span class="v-time"><?php echo $v['play_time']; ?></span></div>
                    <?php if($v['reco'] > '0'): ?>
                    <div class="v-straw">推荐</div>
                    <?php endif; ?>
                </div>
                </a>
                <div class="v-metadata">
                    <a href="<?php echo url('video/play',['id'=>$v['id']]); ?>"><div class="v-title"><?php echo $v['title']; ?></div></a>
                    <div class="v-desc">
                        <i class="btn fn-bofang" title="播放"></i>
                        <span class="v-num"><?php echo $v['click']; ?></span>&nbsp;
                        <i class="btn fn-zan2" title="点赞"></i>
                        <span class="v-num"><?php echo $v['good']; ?></span>
                        <var style="float: right;padding: 0 5px;" onclick="delcolect(<?php echo $v['id']; ?>,'video')">
                            <i class="btn fn-shanchu" title="删除"></i>
                        </var>
                    </div>
                </div>
            </div>
        </li>

        <?php endforeach; endif; else: echo "" ;endif; else: ?>
        <div class="not-comment not">您还没收藏视频哦 ~</div>
        <?php endif; ?>
    </ul>

</div>

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

<script>
    var status = 1;
    var page  = 0;
    var type = 'video';
    $(window).scroll(function(){
        var srollPos = $(window).scrollTop();

        var data = {
            "page" : page ,
            "offset" : 10,
        };
        if(srollPos+$(window).height() > $(document).height() - 80){
            if(status == 1) {
                status = 0;
                $.ajax({
                    type: "POST",
                    data: data,
                    dataType: "JSON",
                    url: "<?php echo url('Api/moreCollection'); ?>",
                    success: function (data) {
                        if(data.resultCode == 0){
                            var datas = data.data.list;
                            if(datas){
                                var html = '';
                                datas.forEach(function(item) {
                                    var  url =  '/video/play/id/'+item['video_id'];
                                    var update_time = item['update_time'];
                                    var newDate = new Date(update_time * 1000);
                                    var types = 'video';
                                    html += '<li>';
                                    html += '<div class="v">';
                                    html += '<a href="'+url+'">';
                                    html += '    <div class="v-thumb">';
                                    html += '    <img src="'+item['thumbnail']+'">';
                                    html += '    <div class="v-tagrb"><span class="v-time">'+item['play_time']+'</span></div>';
                                    if(item['reco'] > 0){
                                        html += '    <div class="v-straw">推荐</div>';
                                    }
                                    html += '</div>';
                                    html += '</a>';
                                    html += '<div class="v-metadata">';
                                    html += '    <div class="v-title">'+item['title']+'</div>';
                                    html += '    <div class="v-desc">';
                                    html += '    <i class="btn fn-bofang" title="播放"></i>';
                                    html += '    <span class="v-num">'+item['click']+'</span>&nbsp;';
                                    html += '<i class="btn fn-zan2" title="点赞"></i>';
                                    html += '    <span class="v-num">'+item['good']+'</span>';
                                    html += '    <var style="float: right;">';
                                    html += '    <i class="btn fn-shanchu" title="删除" onclick="delcolect('+item['id']+',type)"></i>';
                                    html += '    </var>';
                                    html += '</div>';
                                    html += '</div>';
                                    html += '</div>';
                                    html += '</li>';

                                });
                                $('.not-comment').remove();
                                $('.content-list').append(html);
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