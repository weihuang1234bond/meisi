<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:36:"./tpl/ms360/mobile/images/lists.html";i:1562572071;s:37:"./tpl/ms360/mobile/common/header.html";i:1562665000;s:37:"./tpl/ms360/mobile/common/footer.html";i:1562665001;}*/ ?>
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
    <!-- <link rel="stylesheet" href="__ROOT__/tpl/ms360/mobile/static/css/swiper.min.css">
 -->    <link rel="stylesheet" href="__ROOT__/tpl/ms360/mobile/static/css/common.css" />


    <script src="__ROOT__/tpl/ms360/mobile/static/js/jquery-3.2.1.min.js"></script>
    <!-- <script src="__ROOT__/tpl/ms360/mobile/static/js/swiper.min.js"></script> -->
    <script type="text/javascript" src="__ROOT__/tpl/ms360/mobile/static/js/layer_mobile/layer.js"></script>
    <script type="text/javascript" src="__ROOT__/tpl/ms360/mobile/static/js/common.js?v=1.0"></script>
    <link rel="stylesheet" href="__ROOT__/tpl/default/static/css/font_485358_gtgl3zs6gyvqjjor/iconfont.css">


</head>
<body>
<div>
<header class="js-header">
<div class="dingbutu"  ><img src="http://43.226.124.180/images/12.gif" width="100%"></div>
  

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

<link rel="stylesheet" href="__ROOT__/tpl/ms360/mobile/static/css/i-list.css">
    <div class="vault-box">
        <div class="vault-top">
            <div class="tab">
                <a href="<?php echo url('video/lists'); ?>">视频</a>
                <a href="<?php echo url('images/lists'); ?>" class="cur">图片</a>
                <a href="<?php echo url('novel/lists'); ?>">资讯</a>
            </div>
            <div class="item">
                <label>分类：</label>
                <ul id="class_box">
                    <li <?php if(empty($cid) || (($cid instanceof \think\Collection || $cid instanceof \think\Paginator ) && $cid->isEmpty())): ?>class="current" <?php endif; ?> data="0"><a href="#">全部</a></li>
                    <?php if(is_array($class_list) || $class_list instanceof \think\Collection || $class_list instanceof \think\Paginator): $i = 0; $__LIST__ = $class_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <li  data="<?php echo $vo['id']; ?>"  <?php if($cid == $vo['id']): ?>class="current"<?php endif; ?>>
                    <a href="#"  >
                        <?php echo $vo['name']; ?>
                    </a>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <?php if($class_sublist): ?>
                <div class="item" style="display:block;"><label>子分类：</label>
                    <ul id="sub_box">
                        <li <?php if(empty($sub_cid) || (($sub_cid instanceof \think\Collection || $sub_cid instanceof \think\Paginator ) && $sub_cid->isEmpty())): ?>class="current" <?php endif; ?> data="0"><a href="javascript:;">全部</a></li>
                        <?php if(is_array($class_sublist) || $class_sublist instanceof \think\Collection || $class_sublist instanceof \think\Paginator): $i = 0; $__LIST__ = $class_sublist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <li id="ls-<?php echo $vo['id']; ?>" data="<?php echo $vo['id']; ?>" <?php if($sub_cid == $vo['id']): ?>class="current"<?php endif; ?>>
                        <a href="javascript:;">
                            <?php echo $vo['name']; ?>
                        </a>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
                <div id="class_heiht" style="display:none;">45</div>
            <?php else: ?>
                <div id="class_heiht" style="display:none;">0</div>
            <?php endif; ?>
            <div class="item">
                <label>标签：</label>
                <ul id="tag_box">
                    <li <?php if(empty($tag_id) || (($tag_id instanceof \think\Collection || $tag_id instanceof \think\Paginator ) && $tag_id->isEmpty())): ?>class="current" <?php endif; ?> data="0"><a href="#">全部</a></li>
                    <?php if(is_array($tag_list) || $tag_list instanceof \think\Collection || $tag_list instanceof \think\Paginator): $i = 0; $__LIST__ = $tag_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <li data="<?php echo $vo['id']; ?>"  <?php if($tag_id == $vo['id']): ?>class="current"<?php endif; ?>>
                    <a href="#" ><?php echo $vo['name']; ?></a>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <?php if($area_list): ?>
                <div class="item">
                    <label><?php echo $classname['name']; ?>：</label>
                    <ul id="area_box">
                        <li <?php if(empty($area_id) || (($area_id instanceof \think\Collection || $area_id instanceof \think\Paginator ) && $area_id->isEmpty())): ?>class="current" <?php endif; ?> data="0"><a href="javascript:;">全部</a></li>
                        <?php if(is_array($area_list) || $area_list instanceof \think\Collection || $area_list instanceof \think\Paginator): $i = 0; $__LIST__ = $area_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <li id="lt-<?php echo $vo['id']; ?>" data="<?php echo $vo['id']; ?>"  <?php if($area_id == $vo['id']): ?>class="current"<?php endif; ?>>
                            <a href="javascript:;"><?php echo $vo['name']; ?></a>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
                <div id="list_heiht" style="display:none;">45</div>
            <?php else: ?>
            <div id="list_heiht" style="display:none;">0</div>
            <?php endif; ?>
            <div class="item">
                <label>排序：</label>
                <ul id="orderCode">
                    <li id="lastTime" <?php if($orderCode == 'lastTime'): ?>class="current"<?php endif; ?>><a href="#">最新</a></li>
                    <li id="hot" <?php if($orderCode == 'hot'): ?>class="current"<?php endif; ?>><a href="#">最热</a></li>

                </ul>
            </div>
        </div>
        <span class="select">更多</span>
    </div>
        <div class="panel">
            <ul class="pic-list clearfix">
                <?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li>
                    <div class="ub-list">
                        <a href="<?php echo url('images/show',array('id'=>$vo['id'])); ?>" class="ub-link">
                            <div class="ub-pic"
                                 style="background-image: url('<?php echo $vo['cover']; ?>');"></div>
                            <span class="ub-tit"><?php echo $vo['title']; ?></span>
                            <span class="ub-tit">
                                <i class="btn fn-bofang"></i><span class="v-num" title="访问量"><?php echo $vo['click']; ?></span>
                                <var style="float: right;"><i class="btn fn-time"></i><?php echo date('m/d',$vo['update_time']); ?></var>
                            </span>
                        </a>
                    </div>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; else: ?>
                <div class="not-comment not">暂时没有数据 ~</div>
                <?php endif; ?>
            </ul>
        </div>
    <form action="" method="get" id="forms">
        <input type="hidden" id="current_orderCodes"  name="orderCode" value="<?php echo (isset($orderCode) && ($orderCode !== '')?$orderCode:'0'); ?>" >
        <input type="hidden" id="current_tag_id" name="tag_id"  value="<?php echo (isset($tag_id) && ($tag_id !== '')?$tag_id:'0'); ?>" >
        <input type="hidden" id="current_sub_cid" name="sub_cid"  value="<?php echo (isset($sub_cid) && ($sub_cid !== '')?$sub_cid:'0'); ?>" >
        <input type="hidden" id="current_cid" name="cid"  value="<?php echo (isset($cid) && ($cid !== '')?$cid:'0'); ?>" >
        <input type="hidden" id="current_area_id" name="area_id"  value="<?php echo (isset($area_id) && ($area_id !== '')?$area_id:'0'); ?>" >
    </form>
<script>
    $(function(){
        $('#orderCode').find('li').click(function(){
            $('#current_orderCodes').val($(this).attr('id'));
            $('#forms').submit();
        })
        $('#sub_box').find('li').click(function(){
            var sub = $(this).attr('data');
            $('#current_sub_cid').val(sub);
            $('#forms').submit();
        })
        $('#class_box').find('li').click(function(){
            var cid = $(this).attr('data');
            $('#current_cid').val(cid);
            $('#current_sub_cid').val(0);
            $('#forms').submit();
        })
        $('#tag_box').find('li').click(function(){
            var tag_id = $(this).attr('data');
            $('#current_tag_id').val(tag_id);
            $('#forms').submit();
        })
        $('#area_box').find('li').click(function(){
            var area_id = $(this).attr('data');
            $('#current_area_id').val(area_id);
            $('#forms').submit();
        })
        var status = 1;
        var page  = 0;
        $(window).scroll(function(){
            var srollPos = $(window).scrollTop();
            var orderCode = $('#current_orderCodes').val();
            var tag_id =  $('#current_tag_id').val();
            var sub_id = $('#current_sub_cid').val();
            var cid = $('#current_cid').val();
            var area_id = $('#current_area_id').val();
            var data = {
                "page" : page ,
                "orderCode" : orderCode,
                "tag_id" : tag_id,
                "sub_id" : sub_id,
                "cid" : cid,
                "area_id" : area_id,
                "offset" : 20,
                "type" : 'atlas',
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
                                        var url =  '/images/show/id/'+item['id'];
                                        var update_time = item['update_time'];
                                        var newDate = new Date(update_time * 1000);
                                         html += '<li>';
                                         html += '<div class="ub-list">';
                                         html += '    <a href="'+url+'" class="ub-link">';
                                         html += '    <div class="ub-pic"';
                                         html += 'style="background-image: url('+item['cover']+');"></div>';
                                         html += '    <span class="ub-tit">'+item['title']+'</span>';
                                         html += '    <span class="ub-tit">';
                                         html += '    <i class="btn fn-bofang"></i><span class="v-num" title="访问量">'+item['click']+'</span>';
                                         html += '    <var style="float: right;"><i class="btn fn-time"></i>'+(newDate.getMonth() + 1)+'/'+newDate.getDate()+'</var>';
                                         html += '</span>';
                                         html += '</a>';
                                         html += '</div>';
                                         html += '</li>';
                                    });
                                    $('.not-comment').remove();
                                    $('.pic-list').append(html);
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
    })
</script>
</div>
<?php echo $wechatCode; ?>
<footer>
    <a class="navFooter" target="_self" href="/"><i class="btn fn-shouye"></i>首页</a>
    <a class="navFooter active" target="_self" href="<?php echo url('Video/lists'); ?>"><i class="btn fn-sort"></i>视频</a>
     <a class="navFooter active" target="_self" href="<?php echo url('Images/lists'); ?>"><i class="btn fn-sort"></i>图片</a>
      <a class="navFooter active" target="_self" href="<?php echo url('Novel/lists'); ?>"><i class="btn fn-sort"></i>小说</a>
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