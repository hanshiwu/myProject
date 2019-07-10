{__NOLAYOUT__}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <title>跳转提示</title>
    <link href="__ADMIN__/bootstrap-3.3.0-dist/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="__ADMIN__/css/site.css" rel="stylesheet">
    <link href="__ADMIN__/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="__ADMIN__/js/jquery.min.js"></script>
    <script src="__ADMIN__/bootstrap-3.3.0-dist/dist/js/bootstrap.min.js"></script>
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        window.hdjs={};
        //组件目录必须绝对路径(在网站根目录时不用设置)
        window.hdjs.base = '__STATIC__/node_modules/hdjs';

    </script>
    <script src="__STATIC__/node_modules/hdjs/static/requirejs/require.js"></script>
    <script src="__STATIC__/node_modules/hdjs/static/requirejs/config.js"></script>
</head>
<body>
<input type="hidden" name="msg" value="<?php echo(strip_tags($msg));?>"/>
<input type="hidden" name="url" value="<?php echo $url ;?>"/>
<input type="hidden" name="wait" value="<?php echo $wait ;?>"/>
<input type="hidden" name="info" value="<?php switch ($code) { ?>
    <?php case 1:?>
    <?php echo('success');?>
    <?php break;?>
    <?php case 0:?>
    <?php echo('error');?>
    <?php break;?>
<?php } ?>
"/>
<script>
    var wait = $("input[name='wait']").val();
    var msg = $("input[name='msg']").val();
    var url = $("input[name='url']").val();
    var info = $("input[name='info']").val().replace(/(^\s*)|(\s*$)/g, "");
    console.log(msg);
    if(!msg){
        info='success';
        msg='操作成功';
    }
    require(['hdjs'], function (hdjs) {
        hdjs.message(msg,url,info,wait);
    })
</script>

</body>
</html>
