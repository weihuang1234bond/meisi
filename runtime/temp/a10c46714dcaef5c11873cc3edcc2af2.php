<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:29:"./tpl/ms360/index/remind.html";i:1531103066;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>温馨提示</title>
    <meta name="renderer" content="webkit">
    <script type="text/javascript" src="__ROOT__/tpl/ms360/static/js/jquery-3.2.1.min.js"></script>
    <style>
        .remind{width: 600px;margin: 150px auto 0;text-align: center}
        .remind img{width: 250px;}
        .remind p{text-align: center;color: #a7a7a7;margin:50px 0;}
        .remind-box{background: url("../tpl/ms360/static/images/remind.png") no-repeat;display: block;width: 600px;height:250px;background-size: 600px auto;}
    </style>

    <script>
       
        if(window.navigator.userAgent.indexOf('AppleWebKit') != -1) {
            location.href="<?php echo url('index/index'); ?>"
        }
    </script>
</head>
<body>

<div class="remind">
    <img src="../tpl/ms360/static/images/remind-pic.png" />
    <p>为了您最佳的体验,强烈建议您使用以下浏览器</p>
    <div class="remind-box" style="text-align: center;"></div>
</div>
</body>
</html>