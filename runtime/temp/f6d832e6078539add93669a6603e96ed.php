<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:28:"./tpl/zixun/index/index.html";i:1548149124;s:30:"./tpl/zixun/common/header.html";i:1525396004;s:30:"./tpl/zixun/common/footer.html";i:1525309312;}*/ ?>

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
<script type="text/javascript" src="__ROOT__/tpl/zixun/static/js/index.js"></script>
<script>
    setInterval(function () {
        doItPerSecond();
    }, 4000);

    function doItPerSecond() {
        var self = document.getElementsByClassName("fn-huangguan");

    }

    /*公告弹窗*/
    function showNotice(html) {
        $(".tips-box").show();
        $('.tips').html(html);

    }

    $(function () {
        $(".tips-box .tips-bg").click(function () {
            $(".tips-box").hide();
        });
    });
</script>

<div id="eg-content" class="eg-mb-30">


    <!--banner-->
    <div class="focus-wrap">
        <ul class="focus-list">
            <?php if(is_array($seo['banner']) || $seo['banner'] instanceof \think\Collection || $seo['banner'] instanceof \think\Paginator): $i = 0; $__LIST__ = $seo['banner'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            <li class="pic">
                <a href="<?php echo $v['url']; ?>" <?php if($v['target'] == 1): ?> target='_bank'<?php endif; ?> style="background: url(<?php echo $v['images_url']; ?>)no-repeat;background-size: cover;background-position: center;">
                <!--<img src="<?php echo $v['images_url']; ?>" />-->
                </a>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>

        </ul>
    </div>

    <?php if(!(empty($notice) || (($notice instanceof \think\Collection || $notice instanceof \think\Paginator ) && $notice->isEmpty()))): ?>
    <div class="copyright-tips">
        <div class="layout-cont">
            <span><i class="fa fa-volume-up"></i> &nbsp;公告：</span>
            <ul>
                <?php if(is_array($notice) || $notice instanceof \think\Collection || $notice instanceof \think\Paginator): $i = 0; $__LIST__ = $notice;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <li><a <?php if($v['type'] == 1): ?> onclick="showNotice('<?php echo $v['content']; ?>')" <?php else: ?> href="<?php echo $v['url']; ?>"
                    target='_bank' <?php endif; ?> > <?php echo $i; ?>、<?php echo $v['title']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <?php endif; ?>
    <!--公告弹窗-->
    <div class="tips-box">
        <div class="tips-bg"></div>
        <div class="tipsBox">
            <p>公告</p>
            <div class="tips"></div>
        </div>
    </div>

<!--    <div class="eg-width-1200 count eg-radius eg-mb-30" style="margin-top: 30px !important;">
        <div class="count-one">
            <ul class="overflow">
                <li class="eg-col-3 tc">
                    <div class="box1 eg-mb-25">
                        <span class="t1">4329</span>
                        <span class="t3"></span>
                        <span class="t2 eg-color-333">部</span>
                    </div>
                    <div class="box2 eg-mb-30"><span class="s1">累计发行作品</span></div>
                </li>
                <li class="eg-col-3 tc">
                    <div class="box1 eg-mb-25">
                        <span class="t1">258</span>
                        <span class="t3"></span>
                        <span class="t2 eg-color-333">亿</span>
                    </div>
                    <div class="box2 eg-mb-30"><span class="s2">累计播放数量</span></div>
                </li>
                <li class="eg-col-3 tc">
                    <div class="box1 eg-mb-25">
                        <span class="t1">320</span>
                        <span class="t3"></span>
                        <span class="t2 eg-color-333">家</span>
                    </div>
                    <div class="box2 eg-mb-30"><span class="s3">合作媒体渠道</span></div>
                </li>
                <li class="eg-col-3 tc">
                    <div class="box1 eg-mb-25">
                        <span class="t1">10000</span>
                        <span class="t3"><sup>+</sup></span>
                        <span class="t2 eg-color-333">名</span>
                    </div>
                    <div class="box2 eg-mb-30"><span class="s4">专业创作人加入</span></div>
                </li>
            </ul>
        </div>
    </div>-->

    <div class="eg-width-1200 eg-radius eg-mb-30" style="margin-top: 30px !important;">
        <div class="package-one">
            <h3 class="eg-title-1 eg-border-b eg-mb-15 overflow">
                <em class="one fl"><span>推荐视频</span></em>
                <span class="more eg-mr-20 fr"><a href="<?php echo url('video/lists'); ?>" title="更多>">更多<i>/MORE&gt;</i></a></span>
            </h3>
            <div class="new-project">
                <ul class="overflow">
                    <?php if(is_array($recom_list) || $recom_list instanceof \think\Collection || $recom_list instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($recom_list) ? array_slice($recom_list,0,8, true) : $recom_list->slice(0,8, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <li class="eg-border new">
                        <div class="box1">
                            <a title="<?php echo $vo['title']; ?>" href="<?php echo url('video/play',array('id'=>$vo['id'])); ?>" target="_self">
                                <div class="video-play-btn"></div>
                                <img src="<?php echo $vo['thumbnail']; ?>" alt="<?php echo $vo['title']; ?>">
                            </a>
                        </div>
                        <div class="video-info-cnt">
                            <a class="box2 eg-mb-10" title="<?php echo $vo['title']; ?>" href="<?php echo url('video/play',array('id'=>$vo['id'])); ?>">
                                <span class="video-times"><?php echo $vo['play_time']; ?></span>
                                <p><?php echo $vo['title']; ?></p>
                            </a>
                            <div class="box3">
                                <div class="author eg-mb-10">
                                    <div class="subtitle">
                                        <span><i class="btn fn-see"></i><?php echo $vo['click']; ?></span>
                                        <span><i class="btn fn-jinbi1" style="margin-left: 5px;"></i><?php echo $vo['gold']; ?></span>
                                        <span style="float:right;"><i class="btn fn-time"></i><?php echo date('Y/m/d',$vo['update_time']); ?></span><!--<?php echo $vo['good']; ?>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
    </div>


    <?php if(is_array($video_list) || $video_list instanceof \think\Collection || $video_list instanceof \think\Paginator): $i = 0; $__LIST__ = $video_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if(!(empty($vo['list']) || (($vo['list'] instanceof \think\Collection || $vo['list'] instanceof \think\Paginator ) && $vo['list']->isEmpty()))): ?>
    <div class="eg-width-1200 eg-radius eg-mb-30">
        <div class="package-one">
            <h3 class="eg-title-1 eg-border-b eg-mb-15 overflow">
                <em class="one fl"><span><?php echo $vo['name']; ?></span></em>
                <span class="more eg-mr-20 fr"><a href="<?php echo url('video/lists'); ?>" title="更多>">更多<i>/MORE&gt;</i></a></span>
            </h3>
            <div class="new-project">
                <ul class="overflow">
                    <?php if(is_array($vo['list']) || $vo['list'] instanceof \think\Collection || $vo['list'] instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($vo['list']) ? array_slice($vo['list'],0,8, true) : $vo['list']->slice(0,8, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                    <li class="eg-border new">
                        <div class="box1">
                            <a title="<?php echo $v['title']; ?>" href="<?php echo url('video/play',array('id'=>$v['id'])); ?>" target="_self">
                                <div class="video-play-btn"></div>
                                <img src="<?php echo $v['thumbnail']; ?>" alt="<?php echo $v['title']; ?>">
                            </a>
                        </div>
                        <div class="video-info-cnt">
                            <a class="box2 eg-mb-10" title="<?php echo $v['title']; ?>" href="#">
                                <span class="video-times"><?php echo $v['play_time']; ?></span>
                                <p><?php echo $v['title']; ?></p>
                            </a>
                            <div class="box3">
                                <div class="author eg-mb-10">
                                    <div class="subtitle">
                                        <span><i class="btn fn-see"></i><?php echo $v['click']; ?></span>
                                        <span><i class="btn fn-jinbi1" style="margin-left: 5px;"></i><?php echo $v['gold']; ?></span>
                                        <span style="float:right;"><i class="btn fn-time"></i><?php echo date('Y/m/d',$v['update_time']); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>

                </ul>
            </div>
        </div>
    </div>
    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
<!--图集-->

    <?php if(is_array($image_list) || $image_list instanceof \think\Collection || $image_list instanceof \think\Paginator): $i = 0; $__LIST__ = $image_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if(!(empty($vo['list']) || (($vo['list'] instanceof \think\Collection || $vo['list'] instanceof \think\Paginator ) && $vo['list']->isEmpty()))): ?>
    <div class="eg-width-1200 eg-radius eg-mb-30">

        <div class="package">

            <h3 class="eg-title-1 eg-border-b eg-mb-15 overflow">
                <em class="two fl"><span><?php echo $vo['name']; ?></span></em>
                <span class="more eg-mr-20 fr">
                    <a href="<?php echo url('images/lists'); ?>" title="更多">更多<i>/MORE&gt;</i></a></span>
            </h3>

            <div class="eg-film-list">
                <ul class="eg-pb-10 overflow">
                    <?php if(is_array($vo['list']) || $vo['list'] instanceof \think\Collection || $vo['list'] instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($vo['list']) ? array_slice($vo['list'],0,8, true) : $vo['list']->slice(0,8, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                    <li>
                        <div class="box1 eg-mb-10">
                            <img src="<?php echo $v['cover']; ?>" alt="<?php echo $v['title']; ?>">
                        </div>
                        <div class="box2 tc eg-font-size-20 eg-mb-5">
                            <a href="<?php echo url('images/show',array('id'=>$v['id'])); ?>"
                                title="<?php echo $v['title']; ?>"><?php echo $v['title']; ?></a>
                        </div>
                        <div class="box3 tc eg-color-666"><?php echo date('Y-m-d',$v['update_time']); ?></div>
                        <div class="box3 tc eg-color-666 eg-mb-5">
                            <span><i class="btn fn-see"></i><?php echo $v['click']; ?></span>
                            <span><i class="btn fn-jinbi1" style="margin-left: 5px;"></i><?php echo $v['gold']; ?></span>
                            <span><i class="btn fn-zan2"></i><?php echo $v['good']; ?></span>
                        </div>
                        <div class="eg-menu-five eg-font-size-14 eg-margin-center">
                            <a href="<?php echo url('images/show',array('id'=>$v['id'])); ?>" title="查看详情">查看详情</a>
                        </div>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>

                </ul>
            </div>
        </div>
    </div>
    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
<!--小说-->

    <?php if(is_array($novel_list) || $novel_list instanceof \think\Collection || $novel_list instanceof \think\Paginator): $i = 0; $__LIST__ = $novel_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if(!(empty($vo['list']) || (($vo['list'] instanceof \think\Collection || $vo['list'] instanceof \think\Paginator ) && $vo['list']->isEmpty()))): ?>
    <div class="eg-width-1200 eg-radius eg-mb-30">

        <div class="package">

            <h3 class="eg-title-1 eg-border-b overflow">

                <em class="three eg-mr-20 fl"><span><?php echo $vo['name']; ?></span></em>

                <span class="more eg-mr-20 fr">
                    <a href="<?php echo url('novel/lists'); ?>" title="更多">更多<i>/MORE&gt;</i></a></span>

            </h3>

            <div class="eg-item-one">

                <ul>
                    <?php if(is_array($vo['list']) || $vo['list'] instanceof \think\Collection || $vo['list'] instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($vo['list']) ? array_slice($vo['list'],0,8, true) : $vo['list']->slice(0,8, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                    <li class="eg-border-b overflow">
                        <div class="eg-pic pos-r fl eg-mr-20">
                            <a href="<?php echo url('novel/show',array('id'=>$v['id'])); ?>" title="<?php echo $v['title']; ?>">
                                <img src="<?php echo $v['thumbnail']; ?>" alt="<?php echo $v['title']; ?>"></a>
                           <!-- <span class="status-st01 pos-a db tc">已完成</span>-->
                        </div>
                        <div class="eg-info pos-r overflow">
                            <div class="play-count-two tc pos-a">
                                <div class="p1 eg-color-666"><span>全网点击量</span></div>
                                <div class="p2 eg-font-size-24"><?php echo $v['click']; ?></div>
                            </div>
                            <dl class="eg-mb-15">
                                <dt class="eg-pl-20 eg-mb-10"><a href="<?php echo url('novel/show',array('id'=>$v['id'])); ?>" title="<?php echo $v['title']; ?>"><?php echo $v['title']; ?></a></dt>
                                <dd>
                                    <?php echo (isset($v['short_info']) && ($v['short_info'] !== '')?$v['short_info']:"暂没短说明"); ?>
                                </dd>
                            </dl>
                        </div>
                        <div class="detail-box">

                            <div class="box-f">
                                <span><i class="btn fn-time"></i><?php echo date("y-m-d H:i:s",$v['update_time']); ?></span>
                                <span><i class="btn fn-jinbi1"></i><?php echo $v['gold']; ?></span>
                            </div>
                            <div class="box-r">

                            </div>

                        </div>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>

                </ul>

            </div>

        </div>

    </div>
    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
    <div class="eg-width-1200 eg-radius eg-mb-30">

        <div class="package">

            <h3 class="eg-title-1 eg-border-b eg-mb-15 overflow">
                <em class="five fl">
                    <span>品牌客户</span>
                </em>
            </h3>

            <div class="new-brand-one">
                <?php 
                $baseConfig = get_config_by_group('base');
                $baseConfig['friend_link'] =  empty($seo['friend_link']) ? $baseConfig['friend_link'] : $seo['friend_link'];
                $baseConfig['site_icp'] = empty($seo['site_icp']) ? $baseConfig['site_icp'] : $seo['site_icp'];
                $baseConfig['site_statis'] = empty($seo['site_statis']) ? $baseConfig['site_statis'] : $seo['site_statis'];
                $linkList=get_friend_link($baseConfig);
                 ?>
                <ul class="overflow">
                    <?php if(is_array($linkList) || $linkList instanceof \think\Collection || $linkList instanceof \think\Paginator): $i = 0; $__LIST__ = $linkList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$link): $mod = ($i % 2 );++$i;?>
                    <li>
                        <a href="<?php echo $link['url']; ?>" target="_blank" title="<?php echo $link['name']; ?>"><?php echo $link['name']; ?></a>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>

                </ul>

            </div>

        </div>

    </div>

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
