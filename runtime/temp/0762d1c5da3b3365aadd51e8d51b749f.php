<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:28:"./tpl/zixun/video/lists.html";i:1555991202;s:30:"./tpl/zixun/common/header.html";i:1525396004;s:30:"./tpl/zixun/common/footer.html";i:1525309312;}*/ ?>
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

    <div id="eg-content" class="eg-mt-30 eg-mb-30">
        <div class="eg-width-1200 eg-radius">
            <div class="package">
                <div class="eg-border-b eg-pt-15 eg-mb-20">
                    <div class="eg-search-two eg-pb-10">
                        <div class="eg-text-select overflow" id="class_box">
                            <span class="fl"><strong>分类：</strong></span>
                            <span class="fl <?php if(empty($cid) || (($cid instanceof \think\Collection || $cid instanceof \think\Paginator ) && $cid->isEmpty())): ?>on<?php endif; ?>" data="0">
                                <a href="javascript:;" title="全部">全部</a>
                            </span>
                            <?php if(is_array($class_list) || $class_list instanceof \think\Collection || $class_list instanceof \think\Paginator): $i = 0; $__LIST__ = $class_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <span class="fl  <?php if($cid == $vo['id']): ?>on<?php endif; ?>" data="<?php echo $vo['id']; ?>">
                                <a href="javascript:;" title="<?php echo $vo['name']; ?>"><?php echo $vo['name']; ?></a>
                            </span>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                        <?php if(!(empty($class_sublist) || (($class_sublist instanceof \think\Collection || $class_sublist instanceof \think\Paginator ) && $class_sublist->isEmpty()))): ?>
                        <div class="eg-text-select overflow" id="sub_box">
                            <span class="fl"><strong>子分类：</strong></span>
                            <span class="fl  <?php if(empty($sub_cid) || (($sub_cid instanceof \think\Collection || $sub_cid instanceof \think\Paginator ) && $sub_cid->isEmpty())): ?>on<?php endif; ?>" data="0">
                                <a href="javascript:;" title="全部">全部</a>
                            </span>
                            <?php if(is_array($class_sublist) || $class_sublist instanceof \think\Collection || $class_sublist instanceof \think\Paginator): $i = 0; $__LIST__ = $class_sublist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <span class="fl  <?php if($sub_cid == $vo['id']): ?>on<?php endif; ?>" data="<?php echo $vo['id']; ?>" >
                            <a href="javascript:;" title="<?php echo $vo['name']; ?>"><?php echo $vo['name']; ?></a>
                            </span>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                        <?php endif; ?>

                        <div class="eg-text-select overflow" id="tag_box">
                            <span class="fl"><strong>标签：</strong></span>
                            <span class="fl <?php if(empty($tag_id) || (($tag_id instanceof \think\Collection || $tag_id instanceof \think\Paginator ) && $tag_id->isEmpty())): ?>on<?php endif; ?>"  data="0">
                                <a href="javascript:;" title="全部">全部</a>
                            </span>
                            <?php if(is_array($tag_list) || $tag_list instanceof \think\Collection || $tag_list instanceof \think\Paginator): $i = 0; $__LIST__ = $tag_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <span class="fl  <?php if($tag_id == $vo['id']): ?>on<?php endif; ?>" data="<?php echo $vo['id']; ?>" >
                                <a href="javascript:;" title="<?php echo $vo['name']; ?>"><?php echo $vo['name']; ?></a>
                            </span>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                        <?php if($area_list): ?>
                            <div class="eg-text-select overflow" id="area_box">
                                <span class="fl"><strong><?php echo $classname['name']; ?>：</strong></span>
                                <span class="fl <?php if(empty($area_id) || (($area_id instanceof \think\Collection || $area_id instanceof \think\Paginator ) && $area_id->isEmpty())): ?>on<?php endif; ?>"  data="0">
                                    <a href="javascript:;" title="全部">全部</a>
                                </span>
                                <?php if(is_array($area_list) || $area_list instanceof \think\Collection || $area_list instanceof \think\Paginator): $i = 0; $__LIST__ = $area_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <span class="fl <?php if($area_id == $vo['id']): ?>on<?php endif; ?>" data="<?php echo $vo['id']; ?>" >
                                    <a href="javascript:;" title="<?php echo $vo['name']; ?>"><?php echo $vo['name']; ?></a>
                                </span>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="new-project">
                    <ul class="overflow">
                        <?php if(!(empty($video_list) || (($video_list instanceof \think\Collection || $video_list instanceof \think\Paginator ) && $video_list->isEmpty()))): if(is_array($video_list) || $video_list instanceof \think\Collection || $video_list instanceof \think\Paginator): $i = 0; $__LIST__ = $video_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <li class="eg-border new">
                            <div class="box1">
                                <a title="<?php echo $vo['title']; ?>" href="<?php echo url('video/play',array('id'=>$vo['id'])); ?>">
                                    <div class="video-play-btn"></div>
                                    <img src="<?php echo $vo['thumbnail']; ?>" alt="<?php echo $vo['title']; ?>">
                                    <div class="tab-label">
                                        <?php if($vo['reco'] > '0'): ?>
                                        <i class="tag">推荐</i>
                                        <?php endif; if($vo['type'] == 1): ?><span class="tag" title="视频集">视频集</span><?php endif; ?>
                                    </div>
                                </a>
                            </div>
                            <div class="video-info-cnt">
                                <a class="box2 eg-mb-10" href="javascript:void(0);" target="_blank">
                                    <span class="video-times"><?php echo $vo['play_time']; ?></span>
                                    <p><?php echo $vo['title']; ?></p>
                                </a>
                                <div class="box3">
                                    <div class="author eg-mb-10">
                                        <div class="subtitle">
                                            <span><i class="btn fn-time"></i><?php echo date('Y/m/d',$vo['update_time']); ?></span>
                                            <span><i class="btn fn-jinbi1" style="margin-left: 5px;"></i><?php echo $vo['gold']; ?></span>
                                            <span style="float:right;"><i class="btn fn-see"></i><?php echo $vo['click']; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; else: ?>
                        <div class="not-comment not">暂时没有数据 ~</div>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="sort-pager">
                    <?php echo $pages; ?>
                </div>
            </div>
        </div>
        <form action="" method="get" id="forms">
            <input type="hidden" id="current_orderCodes"  name="orderCode" value="<?php echo (isset($orderCode) && ($orderCode !== '')?$orderCode:'0'); ?>" >
            <input type="hidden" id="current_tag_id" name="tag_id"  value="<?php echo (isset($tag_id) && ($tag_id !== '')?$tag_id:'0'); ?>" >
            <input type="hidden" id="current_sub_cid" name="sub_cid"  value="<?php echo (isset($sub_cid) && ($sub_cid !== '')?$sub_cid:'0'); ?>" >
            <input type="hidden" id="current_cid" name="cid"  value="<?php echo (isset($cid) && ($cid !== '')?$cid:'0'); ?>" >
            <input type="hidden" id="current_area_id" name="area_id"  value="<?php echo (isset($area_id) && ($area_id !== '')?$area_id:'0'); ?>" >
        </form>
    </div>
    
<script>
    $('.xcx').mouseover(function () {
        $('.xcx-scan').hide();
        $('.wx-scan').show();
    })
    
    $('.xcx').mouseleave(function () {
        $('.xcx-scan').show();
        $('.wx-scan').hide();
    })
    $(function(){
        $('#sub_box').find('.fl').click(function(){
            var sub = $(this).attr('data');
            $('#current_sub_cid').val(sub);
            $('#forms').submit();
        })

        $('#class_box').find('.fl').click(function(){
            var cid = $(this).attr('data');
            $('#current_cid').val(cid);
            $('#current_sub_cid').val(0);
            $('#forms').submit();
        })

        $('#tag_box').find('.fl').click(function(){
            var tag_id = $(this).attr('data');
            $('#current_tag_id').val(tag_id);
            $('#forms').submit();
        })
        
        $('#area_box').find('.fl').click(function(){
            var area_id = $(this).attr('data');
            $('#current_area_id').val(area_id);
            $('#forms').submit();
        })
    });

</script>

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