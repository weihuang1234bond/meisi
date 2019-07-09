<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:32:"./tpl/ms360/member/addvideo.html";i:1556015338;}*/ ?>

<link rel="stylesheet" href="__ROOT__/tpl/ms360/static/css/member.css">
<link rel="stylesheet" href="__ROOT__/tpl/ms360/static/js/layui/css/layui.css">
<link rel="stylesheet" href="//at.alicdn.com/t/font_485358_4ldl1uwbzj16ecdi.css">

<script type="text/javascript" src="__ROOT__/tpl/ms360/static/js/layer/layer.js"></script>
<script type="text/javascript" charset="utf-8" src="__ROOT__/tpl/ms360/static/js/layui/layui.js"></script>
<script type="text/javascript" src="__ROOT__/tpl/ms360/static/js/jquery-3.2.1.min.js"></script>

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
<style type="text/css">
    #yzm_file_list{margin: 30px;font-size: 12px!important;}
    .popup li{position: static!important;}
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
        console.log(resp);
        if(resp.filePath!=undefined){
            //$("#video").val(resp.filePath);
            $("#odownpath1").val(resp.filePath);
            layer.msg('上传成功！');
        }else{
            layer.msg('上传发生异常,请重试');
            createWebUploader('choseVideoBtn','','','video',setVideoUrl,false);
        }
    }
    function setThumbUrl(resp){
        if(resp.filePath!=undefined){
            $("#thumbnail").val(resp.filePath);
            $("#img_thumbnail").attr('src',resp.filePath);
            layer.msg('上传成功！');
        }else{
            layer.msg('上传发生异常,请重试');
            createWebUploader('choseThumbBtn','','','image',setThumbUrl,false);
        }
    }
</script>
<!--上传视频弹窗-->
<div class="upload-popup popup" style="display: block">
    <form class="layui-form"  action="" id="editForm" method="post"  style="margin-bottom: 50px">
        <ul>
            <li>
                <label>视频名称：</label>
                <input type="text" placeholder="" name="title" id="title" value=""  />
            </li>
            <li>
                <label>观看金币：</label>
                <input type="text" placeholder="" name="gold" value="" />
            </li>
            <li>
                <label>视频标签：</label>
                <div class="form-box">
                    <div class="layui-form-item" style="margin-bottom:13px">
                        <div class="layui-input-block">
                            <?php if(is_array($tag_list) || $tag_list instanceof \think\Collection || $tag_list instanceof \think\Paginator): $i = 0; $__LIST__ = $tag_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                            <input type="checkbox" name="tag[]" value="<?php echo $v['id']; ?>"    title="<?php echo $v['name']; ?>">
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <label>视频分类：</label>
                <div class="form-box">
                    <div class="layui-form-item" style="margin-bottom:8px">
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
                <li>
                    <label><?php echo $custom_class['name']; ?>：</label>
                    <div class="form-box">
                        <div class="layui-form-item" style="margin-bottom:8px">
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
            <li>
                <label>上传视频：</label>
                <input type="text" placeholder="" id="odownpath1" value="" name="url" />
                <a id="choseVideoBtn" style="margin-left:20px;width:35px;padding-left:20px;">上传</a>

                <div id="yzm_panel" class="layui-input-inline" style="display:block;">
                    <a  id="chosevideo" style="display: none;border:none;height:30px;">上传</a>
                </div>
            </li>

            <li>
                <label>缩略图：</label>
                <input type="text" placeholder=""  value="" id="thumbnail" name="thumbnail"  />

                <a id="choseThumbBtn" style="margin-left:20px;width:35px;padding-left:20px;"> 上传</a>
                <div class="narrow-img">
                    <img id="img_thumbnail" src="/static/images/images_default.png" width="175"/>
                </div>
            </li>
            <div id="imgbox">
                <li>
                    <label>截图1：</label>
                    <input type="text" placeholder=""  value=""  id="thumbnail1"  name="img[]"  />
                    <a  style="margin-left:20px;width:35px;padding-left:20px;"  onclick="uploadimg(1)" id="choseThumbBtn1"> 上传</a><i class="layui-icon" id="add" style="color: green;padding-left:20px;font-size: 20px;">&#xe654;</i>
                </li>
            </div>
            <li>
                <label>视频时长：</label>
                <input type="text" placeholder="" id="playtime" value="" name="play_time"  />
            </li>
            <li>
                <label>简介：</label>
                <textarea placeholder="请输入简介" name="info"></textarea>
            </li>
            <li>

                <label></label>
                <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">提交</button>
            </li>
        </ul>
    </form>
</div>
<li id="yzm_file_list"></li>
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
                    '                <a  onclick="uploadimg('+(a+1)+')" id="choseThumbBtn'+(a+1)+'" style="margin-left:20px;width:35px;padding-left:20px;"> 上传</a>' +
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

