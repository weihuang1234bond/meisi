<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:32:"./tpl/ms360/member/addnovel.html";i:1556015336;}*/ ?>

<link rel="stylesheet" href="__ROOT__/tpl/ms360/static/css/member.css">
<link rel="stylesheet" href="__ROOT__/tpl/ms360/static/js/layui/css/layui.css">
<link rel="stylesheet" href="//at.alicdn.com/t/font_485358_4ldl1uwbzj16ecdi.css">

<script type="text/javascript" src="__ROOT__/tpl/ms360/static/js/layer/layer.js"></script>
<script type="text/javascript" charset="utf-8" src="__ROOT__/tpl/ms360/static/js/layui/layui.js"></script>
<script type="text/javascript" src="__ROOT__/tpl/ms360/static/js/jquery-3.2.1.min.js"></script>

<script type="application/javascript" charset="utf-8" src="/static/UEditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/UEditor/ueditor.all.min.js"></script>

<!--uper js files-->
<script type="text/javascript" src="/static/plupload-2.3.6/js/plupload.full.min.js"></script>
<script type="text/javascript" src="/static/xuploader/webServerUploader.js"></script>

<style>
    .popup li .form-box{width: 380px;}
</style>
<script>
    layui.use(['form', 'layedit', 'laydate'], function(){

    });

    $(function(){
        createWebUploader('choseThumbBtn','','','image',setThumbUrl,false);
    });

    function setThumbUrl(resp){
        if(resp.filePath!=undefined){
            $("#thumbnail").val(resp.filePath);
            $("#img_thumbnail").attr('src',resp.filePath);
            $("#img_thumbnail").show();
            layer.msg('上传成功！');
        }else{
            layer.msg('上传发生异常,请重试');
            createWebUploader('choseThumbBtn','','','image',setThumbUrl,false);
        }
    }
</script>
<!--创建我的资讯弹窗-->
<div class="novel-popup popup">
    <form class="layui-form" action="" id="editForm" method="post"  style="margin-bottom: 50px">
        <ul>
            <li>
                <label>资讯标题：</label>
                <input type="text" placeholder="" name="title"  value="" />
            </li>
            <li>
                <label>观看金币：</label>
                <input type="text" placeholder="" name="gold"  value=""/>
            </li>
            <li>
                <label>上传图片：</label>
                <input id="thumbnail" type="text" placeholder="" name="thumbnail"  value="" />
                <a id="choseThumbBtn">上传</a>
                <div class="narrow-img">
                    <img id="img_thumbnail" src="" style="display: none"/>
                </div>
            </li>
            <li>
                <label>资讯标签：</label>
                <!--<div class="form-box">
                    <?php if(is_array($tag_list) || $tag_list instanceof \think\Collection || $tag_list instanceof \think\Paginator): $i = 0; $__LIST__ = $tag_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                    <div class="form-checkbox">
                        <span><?php echo $v['name']; ?></span>
                        <i class="btn fn-correct"></i>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>-->
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
                <label>资讯分类：</label>
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
                <label>摘要：</label>
                <textarea name="short_info"></textarea>
            </li>
            <li>
                <label>内容：</label>
                <textarea id="editor" name="content" type="text/plain" style="width:500px;height:200px;margin-left: 83px;"></textarea>
            </li>
            <li>
                <label></label>
                <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">提交</button>
            </li>
        </ul>
    </form>
</div>

<script>
    var ue = UE.getEditor('editor',{
        toolbars: [
            ['bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor','selectall', 'cleardoc']
        ],
        autoHeightEnabled: true,
        autoFloatEnabled: true
    });
</script>


