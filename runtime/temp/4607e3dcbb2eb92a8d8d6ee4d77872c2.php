<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:36:"./tpl/ms360/mobile/member/novel.html";i:1531103064;s:35:"./tpl/ms360/mobile/common/head.html";i:1562562464;s:37:"./tpl/ms360/mobile/common/footer.html";i:1562413629;}*/ ?>
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
aaaa
<script src="__ROOT__/tpl/ms360/mobile/static/js/jquery.min.js"></script>
<script src="__ROOT__/tpl/ms360/mobile/static/js/jquery.mobile-1.3.2.min.js"></script>
<link rel="stylesheet" href="__ROOT__/tpl/ms360/mobile/static/css/n-list.css">
<style>
    .novel-list{overflow: hidden;}
    .novel-list li{padding: 15px 10px;width: 120%;overflow: hidden;-webkit-transition:all 0.3s linear;-moz-transition:all 0.3s linear;}
    .novel-list li:last-child{border-bottom: 1px solid #eee;}
    .novel-list li a{width: 81%;float: left;}
    .novel-list li .operation{display: block;float: left;width: 18%;margin-left: 0.16rem;text-align: center;text-decoration: none;}
    .novel-list li .operation a{display: block;height: 38px;line-height: 38px;color: #fff; width: 100%;}
    .novel-list li .operation a.remove{background: #f00;}
    .novel-list li .operation a.edit{background: #e5b559;}
    .novel-list li.selected{-webkit-transform: translate(-18%,0);-webkit-transition:all 0.3s linear;-moz-transition:all 0.3s linear;}
    .ui-page{min-height: 300px !important;outline: none;}
    .ui-loader{display: none;}
</style>

    <ul class="novel-list">
        <?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <li>
            <a target="_self"  href="<?php echo url('novel/show',array('id'=>$vo['id'])); ?>">
                <div class="novelPic">
                    <img src="<?php echo $vo['thumbnail']; ?>">
                    <?php if($vo['status'] != 1): ?>
                    <span class="btn fn-jiaobiao"><i>已禁用</i></span>
                    <?php else: if($vo['is_check'] == 0): ?><span class="btn fn-jiaobiao aspect"><i>审核中</i></span> <?php endif; if($vo['is_check'] == 2): ?>
                        <span class="btn fn-jiaobiao"><i>已拒绝</i></span>
                        <div class="examine-shadow">
                            <?php if(!(empty($vo['hint']) || (($vo['hint'] instanceof \think\Collection || $vo['hint'] instanceof \think\Paginator ) && $vo['hint']->isEmpty()))): ?>
                            <var><?php echo $vo['hint']; ?></var>
                            <?php else: ?>
                            <var>内容不符合规范</var>
                            <?php endif; ?>
                        </div>
                    <?php endif; endif; ?>

                </div>
                <div class="novel-box">
                    <p><?php echo $vo['title']; ?></p>
                    <span class="text"><?php echo (isset($vo['short_info']) && ($vo['short_info'] !== '')?$vo['short_info']:"暂没短说明"); ?></span>
                    <div>
                        <div class="box-f">
                            <span><i class="btn fn-time"></i><?php echo date('Y-m-d H:i:s',$vo['update_time']); ?></span>
                            <span><i class="btn fn-bofang"></i><?php echo $vo['click']; ?></span>
                        </div>
                    </div>
                </div>
            </a>
            <div class="operation">
                <a href="/member/editNovel/id/<?php echo $vo['id']; ?>" id="edit_<?php echo $vo['id']; ?>" target="_self" class="edit">编辑</a>
                <a href="javascript:;" id="delete_<?php echo $vo['id']; ?>" class="remove">删除</a>
            </div>
        </li>
        <?php endforeach; endif; else: echo "" ;endif; else: ?>
        <div class="not-comment not">您还没有上传过资讯哦 ~</div>
        <?php endif; ?>
    </ul>
    <a href="<?php echo url('member/addNovel'); ?>" target="_self" class="upload"><i class="btn fn-shangchuan1"></i>发布</a>
</div>


<script>
    function del(id){
        var reqData={table:'novel',id:id};
        layer.open({
            content:'确定要删除吗？',
            btn: ['确定', '取消'],
            yes:function () {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo url('api/del'); ?>",
                    data: reqData,
                    dataType : "json",
                    success: function(data){
                        console.log(data);
                        if(data.resultCode==0){
                            layer.open({content:'已成功删除', time:2,skin:'msg',end:function () {
                                window.location.reload();
                            }});
                        }else{
                            layer.open({content:'删除失败，原因：'+data.error, time:2,skin:'msg'});
                        }
                    },
                });
            }
        });
    }
    $(function(){
        $(".novel-list li").on("swipeleft",function(){
            $(this).addClass('selected').siblings().removeClass('selected');
            /*点击删除*/
            $(this).find("a.remove").on("click",function(){
                var id = $(this).attr('id').substring(7);
                del(id);
            });
        }).on("swiperight",function(){
            $(this).parents(".novel-list").find("li").removeClass('selected');
        })
    });
    var status = 1;
    var page  = 0;
    var user_id = "<?php echo $user_id; ?>";
    $(window).scroll(function(){
        var srollPos = $(window).scrollTop();
        var data = {
            "page" : page ,
            "type" : 'novel',
            "offset" : 10,
            "where" :  'user_id = '+user_id,
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
                                    var  url =  '/novel/show/id/'+item['id'];
                                    var update_time = item['update_time'];
                                    var newDate = new Date(update_time * 1000);

                                    html += '<li>';
                                    html += '<a target="_self"  href="'+url+'">';
                                    html += '    <div class="novelPic">';
                                    html += '    <img src="'+item['thumbnail']+'">';
                                    html += '    </div>';
                                    html += '    <div class="novel-box">';
                                    html += '    <p>'+item['title']+'</p>';
                                    if(item['short_info']){
                                        var short_info = item['short_info'];
                                    }else{
                                        var short_info = "暂没短说明";
                                    }
                                    html += '<span class="text">'+short_info+'</span>';
                                    html += '    <div>';
                                    html += '    <div class="box-f">';
                                    html += '    <span><i class="btn fn-time"></i>'+(newDate.getMonth() + 1)+'/'+newDate.getDate()+'</span>';
                                    html += '<span><i class="btn fn-see"></i>'+item['click']+'</span>';
                                    html += '</div>';
                                    html += '</div>';
                                    html += '</div>';
                                    html += '</a>';
                                    html += '<div class="operation">';
                                    html += '    <a href="/member/editNovel/id/'+item['id']+'" id="edit_'+item['id']+'" target="_self" class="edit">编辑</a>';
                                    html += '    <a href="javascript:;" id="delete_'+item['id']+'" class="remove">删除</a>';
                                    html += '</div>';
                                    html += '</li>';

                                });
                                $('.not-comment').remove();
                                $('.novel-list').append(html);
                                $(".novel-list li").on("swipeleft",function(){
                                    $(this).addClass('selected').siblings().removeClass('selected');
                                    /*点击删除*/
                                    $(this).find("a.remove").on("click",function(){
                                        var id = $(this).attr('id').substring(7);
                                        del(id);
                                    });
                                }).on("swiperight",function(){
                                    $(this).parents(".novel-list").find("li").removeClass('selected');
                                })
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
