<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"E:\wamp64\www\tp5_blog\public/../application/admin\view\rules\index.html";i:1514818132;s:65:"E:\wamp64\www\tp5_blog\public/../application/admin\view\base.html";i:1515507774;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>博客网后台管理系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
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
        //上传文件后台地址
        window.hdjs.uploader = "<?php echo url('system/component/uploader'); ?>?";
        //获取文件列表的后台地址
        window.hdjs.filesLists = "<?php echo url('system/component/filesLists'); ?>?";
    </script>
    <script src="__STATIC__/node_modules/hdjs/static/requirejs/require.js"></script>
    <script src="__STATIC__/node_modules/hdjs/static/requirejs/config.js"></script>
    <script>
        if (navigator.appName == 'Microsoft Internet Explorer') {
            if (navigator.userAgent.indexOf("MSIE 5.0") > 0 || navigator.userAgent.indexOf("MSIE 6.0") > 0 || navigator.userAgent.indexOf("MSIE 7.0") > 0) {
                alert('您使用的 IE 浏览器版本过低, 推荐使用 Chrome 浏览器或 IE8 及以上版本浏览器.');
            }
        }
    </script>
    <style>
        i {
            color: #337ab7;
        }
    </style>

</head>
<body>
<div class="container-fluid admin-top">
    <!--导航-->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <h4 style="display: inline;line-height: 50px;float: left;margin: 0px"><a href="index.html" style="color: white;margin-left: -14px">博客网</a>
                </h4>
                <div class="navbar-header">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="http://www.kancloud.cn/manual/thinkphp5/118003" target="_blank"><i class="fa fa-w fa-file-code-o"></i>
                                在线文档</a>
                        </li>
                        <li>
                            <a href="http://fontawesome.dashgame.com/" target="_blank"><i
                                    class="fa fa-w fa-hand-o-right"></i> 图标库</a>
                        </li>
                        <li>
                            <a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'];?>" target="_blank"><i
                                    class="fa fa-w fa-desktop"></i> 网站首页</a>
                        </li>
                    </ul>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="fa fa-w fa-user"></i>
                            <?php echo session('admin_username'); ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo url('entry/pass'); ?>">修改密码</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="">退出</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--导航end-->
</div>
<!--主体-->
<div class="container-fluid admin_menu">
    <div class="row">
        <div class="col-xs-12 col-sm-3 col-lg-2 left-menu">
            <div class="panel panel-default" id="menus">
                <!--栏目菜单-->
                <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample"
                     aria-expanded="false" aria-controls="collapseExample"
                     style="border-top: 1px solid #ddd;border-radius: 0%">
                    <h4 class="panel-title">栏目管理</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <i class="fa fa-chevron-circle-down"></i>
                    </a>
                </div>
                <ul class="list-group menus collapse in" id="collapseExample">
                    <a href="<?php echo url('category/index'); ?>" class="list-group-item">
                        <i class="fa fa-certificate" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        栏目列表
                    </a>
                </ul>
                <!--栏目菜单 end-->

                <!--标签菜单-->
                <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample2"
                     aria-expanded="false" aria-controls="collapseExample">
                    <h4 class="panel-title">标签管理</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="#collapseExample2" aria-expanded="true">
                        <i class="fa fa-chevron-circle-down"></i>
                    </a>
                </div>
                <ul class="list-group menus collapse in" id="collapseExample2">
                    <a href="<?php echo url('tag/index'); ?>" class="list-group-item">
                        <i class="fa fa-tags" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        标签列表
                    </a>

                </ul>
                <!--标签菜单 end-->

                <!--文章菜单-->
                <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample3"
                     aria-expanded="false" aria-controls="collapseExample">
                    <h4 class="panel-title">文章管理</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="#collapseExample3" aria-expanded="true">
                        <i class="fa fa-chevron-circle-down"></i>
                    </a>
                </div>
                <ul class="list-group menus collapse in" id="collapseExample3">
                    <a href="<?php echo url('article/index'); ?>" class="list-group-item">
                        <i class="fa fa-book" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        文章列表
                    </a>
                    <a href="<?php echo url('article/recycle'); ?>" class="list-group-item">
                        <i class="fa fa-hourglass-3" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        文章回收站
                    </a>
                </ul>
                <!--文章菜单 end-->
                <!--友情菜单-->
                <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample3"
                     aria-expanded="false" aria-controls="collapseExample">
                    <h4 class="panel-title">友链管理</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="#collapseExample3" aria-expanded="true">
                        <i class="fa fa-chevron-circle-down"></i>
                    </a>
                </div>
                <ul class="list-group menus collapse in" id="collapseExample4">
                    <a href="<?php echo url('link/index'); ?>" class="list-group-item">
                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        友链首页
                    </a>
                </ul>
                <!--友情链接end-->
                <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample3"
                     aria-expanded="false" aria-controls="collapseExample">
                    <h4 class="panel-title">站点管理</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="#collapseExample3" aria-expanded="true">
                        <i class="fa fa-chevron-circle-down"></i>
                    </a>
                </div>
                <ul class="list-group menus collapse in" id="collapseExample5">
                    <a href="<?php echo url('webset/index'); ?>" class="list-group-item">
                        <i class="fa fa-wrench" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        网站配置
                    </a>
                </ul>
                <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample3"
                     aria-expanded="false" aria-controls="collapseExample">
                    <h4 class="panel-title">权限管理</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="#collapseExample3" aria-expanded="true">
                        <i class="fa fa-chevron-circle-down"></i>
                    </a>
                </div>
                <ul class="list-group menus collapse in" id="collapseExample6">
                    <a href="<?php echo url('admin/index'); ?>" class="list-group-item">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        用户管理
                    </a>
                    <a href="<?php echo url('rules/index'); ?>" class="list-group-item">
                        <i class="fa fa-vcard" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        规则管理
                    </a>
                    <a href="<?php echo url('group/index'); ?>" class="list-group-item">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        用户组管理
                    </a>
                </ul>
            </div>
        </div>
        <!--右侧主体区域部分 start-->
        <div class="col-xs-12 col-sm-9 col-lg-10">
            
<div class="col-xs-12 col-sm-9 col-lg-10">
    <ol class="breadcrumb" style="background-color: #f9f9f9;padding:8px 0;margin-bottom:10px;">
        <li>
            <a href="javascript:void(0)"><i class="fa fa-cogs"></i>
                规则管理</a>
        </li>
        <li class="active">
            <a href="javascript:void(0)">规则添加</a>
        </li>
    </ol>
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="<?php echo url('rules/index'); ?>">规则列表</a></li>
        <li><a href="<?php echo url('rules/add'); ?>">规则添加</a></li>
    </ul>
    <form action="" method="post">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>编号</th>
                        <th>规则中文名称</th>
                        <th>标识</th>
                        <th>导航</th>
                        <th width="200" style="text-align: center">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($field) || $field instanceof \think\Collection || $field instanceof \think\Paginator): if( count($field)==0 ) : echo "" ;else: foreach($field as $key=>$vo): ?>
                    <tr>
                        <td><?php echo $vo['id']; ?></td>
                        <td><?php echo $vo['_title']; ?></td>
                        <td><?php echo $vo['name']; ?></td>
                        <td><?php echo $vo['nav']; ?></td>
                        <td style="text-align: center">
                            <div class="btn-group">
                                <a href="<?php echo url('rules/edit',['id'=>$vo['id']]); ?>">编辑</a>&nbsp;|
                                <a href="javascript:;" onclick="del(<?php echo $vo['id']; ?>)">删除</a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </form>
    <div class="pagination pagination-sm pull-right">
    </div>
    <script type="text/javascript">
        function del(id) {
            require(['hdjs'], function (hdjs) {
                hdjs.confirm('确定删除吗?', function () {
                    location.href = "<?php echo url('del'); ?>"+"?id="+id;
                })
            })
        }
    </script>
</div>


        </div>
    </div>
    <!--右侧主体区域部分结束 end-->
</div>
</div>
</body>
</html>
