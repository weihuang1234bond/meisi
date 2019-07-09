<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:36:"./tpl/ms360/mobile/video/search.html";i:1531103068;s:37:"./tpl/ms360/mobile/common/header.html";i:1562398555;s:37:"./tpl/ms360/mobile/common/footer.html";i:1562303518;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php $menu = getMenu();?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta content="telephone=no" name="format-detection">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?php echo $seo['site_title']; ?></title>
    <meta name="keywords" lang="zh-CN" content="<?php echo $seo['site_keywords']; ?>"/>
    <meta name="description" lang="zh-CN" content="<?php echo $seo['site_description']; ?>" />
    <link rel="stylesheet" href="__ROOT__/tpl/ms360/mobile/static/css/swiper.min.css">
    <link rel="stylesheet" href="__ROOT__/tpl/ms360/mobile/static/css/common.css" />


    <script src="__ROOT__/tpl/ms360/mobile/static/js/jquery-3.2.1.min.js"></script>
    <script src="__ROOT__/tpl/ms360/mobile/static/js/swiper.min.js"></script>
    <script type="text/javascript" src="__ROOT__/tpl/ms360/mobile/static/js/layer_mobile/layer.js"></script>
    <script type="text/javascript" src="__ROOT__/tpl/ms360/mobile/static/js/common.js?v=1.0"></script>
    <link rel="stylesheet" href="__ROOT__/tpl/default/static/css/font_485358_gtgl3zs6gyvqjjor/iconfont.css">


</head>
<body>
<div class="adver-moblie">
<script src="__ROOT__/tpl/ms360/mobile/static/js/adver.js"></script>
</div>
<div>
    <header class="js-header">
        <div class="head">
            <a class="logo"><img src="<?php echo $seo['site_logo_mobile']; ?>"/></a>
            <?php $controller =  lcfirst(request()->controller());?>
            <form
                <?php switch($controller): case "images": ?> action="<?php echo url('search/index',array('type'=>'atlas')); ?>"<?php break; case "atlas": ?> action="<?php echo url('search/index',array('type'=>'atlas')); ?>"<?php break; case "novel": ?>action="<?php echo url('search/index',array('type'=>'novel')); ?>"<?php break; case "search": ?>action="<?php echo url('search/index',array('type'=>$type)); ?>"<?php break; default: ?>
                action="<?php echo url('search/index',array('type'=>'video')); ?>"
                <?php endswitch; ?>
            method="get" id="myform">
            <div class="search">
                <div style="display: inline-block;float: left;">
                    <?php if($controller=="atlas" || isset($type)&& $type=='atlas'): ?> <span class="choice-box1">图册<i class="btn fn-triangle"></i></span>
                    <?php elseif($controller=="images" || isset($type)&& $type=='images'): ?> <span class="choice-box1">图册<i class="btn fn-triangle"></i></span>
                    <?php elseif($controller=="novel" || isset($type)&& $type=='novel'): ?> <span class="choice-box1">资讯<i class="btn fn-triangle"></i></span>
                    <?php elseif($controller=="member" || isset($type)&& $type=='member'): ?> <span class="choice-box1">会员<i class="btn fn-triangle"></i></span>
                    <?php elseif($controller=="video" || isset($type)&& $type=='video'): ?> <span class="choice-box1">视频<i class="btn fn-triangle"></i></span>
                    <?php else: ?>
                    <span class="choice-box1">视频<i class="btn fn-triangle"></i></span>
                    <?php endif; ?>

                    <div class="choice-btn">
                        <div class="choice-shadow">
                            <p onclick="$('#myform').attr('action','<?php echo url('search/index',array('type'=>'video')); ?>')">视频</p>
                            <p onclick="$('#myform').attr('action','<?php echo url('search/index',array('type'=>'atlas')); ?>')">图册</p>
                            <p onclick="$('#myform').attr('action','<?php echo url('search/index',array('type'=>'novel')); ?>')">资讯</p>
                            <p onclick="$('#myform').attr('action','<?php echo url('search/index',array('type'=>'member')); ?>')">会员</p>
                            <?php if(isset($type)): ?><p onclick="$('#myform').attr('action','<?php echo url('search/index',array('type'=>$type)); ?>')">自动</p><?php endif; ?>
                        </div>
                    </div>
                </div>
                <input class="js-placeholder" placeholder="请输入" type="search" value='<?php if(isset($key_word)): ?><?php echo $key_word; endif; ?>' name="key_word"><i class="btn fn-sousuo" onclick="$('#myform').submit();" style="float: right;width: 23px;"></i>
            </div>
            </form>

            <div class="menu"><span class="btn fn-sort"></span></div>
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
    <div class="content">

<link rel="stylesheet" href="__ROOT__/tpl/ms360/mobile/static/css/v-list.css">
<style>
    .panel{margin-top: 0;}
</style>
<div class="item" style="border-bottom: 1px solid #eee;">
    <label>排序：</label>
    <ul id="orderCode">
        <li id="lastTime"  <?php if($orderCode == 'lastTime'): ?>class="current"<?php endif; ?> ><a href="#">最新</a></li>
        <li id="hot" <?php if($orderCode == 'hot'): ?>class="current"<?php endif; ?>  ><a href="#">最热</a></li>
        <li id="reco" <?php if($orderCode == 'reco'): ?>class="current"<?php endif; ?> ><a href="#">推荐</a></li>
    </ul>
</div>
        <div class="panel">
            <ul class="content-list">
                <?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <li>
                    <a class="v" href="<?php echo url('video/play',array('id'=>$v['id'])); ?>">
                        <div class="v-thumb">
                            <div class="v-pic-real" style="background-image:url('<?php echo $v['thumbnail']; ?>');"></div>
                            <div class="v-tagrb"><span class="v-time"><?php echo $v['play_time']; ?></span></div>
                        </div>
                        <div class="v-metadata">
                            <div class="v-title">
                                <?php
                                    $regex  = '/('.$key_word.')/i';
                                    preg_match_all($regex,$v['title'],$rs);
                                    foreach($rs[1] as $val){
                                        $keywords =$val;
                                          $v['title'] = str_replace( $keywords,"<font>$keywords</font>",$v['title']);
                                }
                                ?>
                                <?php echo $v['title']; ?>
                            </div>
                            <div class="v-desc">
                                <i class="btn fn-bofang" title="播放"></i>
                                <span class="v-num"><?php echo $v['click']; ?></span>&nbsp;
                                <i class="btn fn-jinbi1" title="金币"></i>
                                <span class="v-num"><?php echo $v['gold']; ?></span>
                                <var style="float: right;">
                                    <i class="btn fn-time" title="上传时间"></i>
                                    <span class="v-num"><?php echo date('m/d',$v['update_time']); ?></span>
                                </var>
                            </div>
                        </div>
                    </a>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; else: ?>
                <div class="not-comment not">暂时没有数据 ~</div>
                <?php endif; ?>
            </ul>
        </div>
        <form action="" method="get" id="forms">
            <input type="hidden" id="current_orderCodes"  name="orderCode" value="<?php echo (isset($orderCode) && ($orderCode !== '')?$orderCode:'0'); ?>" >
            <input type="hidden" id="key_word" name="key_word" value="<?php echo (isset($key_word) && ($key_word !== '')?$key_word:''); ?>" >
            <input type="hidden"  name="type" value="<?php echo (isset($type) && ($type !== '')?$type:'video'); ?>" >
        </form>
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

<script type="text/javascript">
    $(function () {
        $('#orderCode').find('li').click(function(){
            $('#current_orderCodes').val($(this).attr('id'));
            $('#forms').submit();
        })
    })
    var status = 1;
    var page  = 0;
    $(window).scroll(function(){
        var srollPos = $(window).scrollTop();
        var orderCode = $('#current_orderCodes').val();
        var key_word =  $('#key_word').val();
        var where =" and title like '%"+$('#key_word').val()+"%'";
        var data = {
            "page" : page ,
            "orderCode" : orderCode,
            "offset" : 20,
            "where" :where,
            "type" : 'video',
        };
        if(srollPos+$(window).height() > $(document).height() - 80){
            if(status == 1) {
                status = 0;
                $.ajax({
                    type: "POST",
                    data: data,
                    dataType: "JSON",
                    url: "<?php echo url('Api/moreData'); ?>",
                    success: function (data) {
                        if(data.resultCode == 0){
                            var datas = data.data.list;
                            if(datas){
                                var html = '';
                                datas.forEach(function(item) {
                                    var update_time = item['update_time'];
                                    var newDate = new Date(update_time * 1000);
                                    var url = '/video/play/id/'+item['id'];
                                    var reg = '/'+key_word+'/g';
                                    reg=eval(reg);
                                    item['title'] = item['title'].replace(reg, "<font>"+key_word+"</font>");
                                     html += '<li>';
                                     html += '<a class="v" href="'+url+'">';
                                     html += '    <div class="v-thumb">';
                                     html += '    <div class="v-pic-real" style="background-image:url('+item['thumbnail']+');"></div>';
                                     html += '    <div class="v-tagrb"><span class="v-time">'+item['play_time']+'</span></div>';
                                     html += '    </div>';
                                     html += '    <div class="v-metadata">';
                                     html += '    <div class="v-title">'+item['title']+'</div>';
                                     html += '<div class="v-desc">';
                                     html += '    <i class="btn fn-bofang" title="播放"></i>';
                                     html += '    <span class="v-num">'+item['click']+'</span>&nbsp;';
                                     html += '<i class="btn fn-jinbi1" title="金币"></i>';
                                     html += '    <span class="v-num">'+item['gold']+'</span>';
                                     html += '    <var style="float: right;">';
                                     html += '    <i class="btn fn-time" title="上传时间"></i>';
                                     html += '    <span class="v-num">'+(newDate.getMonth() + 1)+'/'+newDate.getDate()+'</span>';
                                     html += '</var>';
                                     html += '</div>';
                                     html += '</div>';
                                     html += '</a>';
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