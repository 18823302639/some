<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"E:\myphp_www\PHPTutorial\WWW\some\public/../app/admin\view\index\index.html";i:1551364270;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>layout 后台大布局 - Layui</title>
    <link rel="stylesheet" href="http://www.zgxmall.com/html/layui/css/layui.css">

</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo">layui 后台布局</div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <ul class="layui-nav layui-layout-left">
            <li class="layui-nav-item"><a href="">控制台</a></li>
            <li class="layui-nav-item"><a href="">商品管理</a></li>
            <li class="layui-nav-item"><a href="">用户</a></li>
            <li class="layui-nav-item">
                <a href="javascript:;">其它系统</a>
                <dl class="layui-nav-child">
                    <dd><a href="">邮件管理</a></dd>
                    <dd><a href="">消息管理</a></dd>
                    <dd><a href="">授权管理</a></dd>
                </dl>
            </li>
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                    贤心
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="">基本资料</a></dd>
                    <dd><a href="">安全设置</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="">退了</a></li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree" lay-filter="test">
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">控制台</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;">水牌数据</a></dd>
                    </dl>
                </li>
                <!--<li class="layui-nav-item"><a href="">发布商品</a></li>-->

            </ul>
        </div>
    </div>

    <div class="layui-body">
        <!-- 内容主体区域 -->
        <table class="layui-table">
            <colgroup>
                <col width="150">
            </colgroup>
            <thead>
            <tr>
                <th style="text-align:center;">公司名称</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($arr) || $arr instanceof \think\Collection || $arr instanceof \think\Paginator): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr>
                <td style="text-align:center;"><?php echo $vo['some_name']; ?></td>
                <td style="text-align:center;"><?php echo $vo['inser_time']; ?></td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <tr>
                <td>
                    <ul class="pagination">
                        <li><a href="?page=1">&laquo;</a></li>
                        <li><a href="?page=1">1</a></li>
                        <li class="active"><span>2</span></li>
                        <li class="disabled"><span>&raquo;</span></li>
                    </ul>
                </td>
            </tr>
            </tbody>
        </table>
        <div style="padding: 15px;">
            <form method="post" action="<?php echo url('Index/upload'); ?>" class="form-signin" enctype="multipart/form-data">
                <input name="file" type="file" class="form-control">
                <button class="btn btn-lg btn-primary btn-block">导入</button>
            </form>
        </div>
    </div>

    <div class="layui-footer">
        <!-- 底部固定区域 -->
        © layui.com - 底部固定区域
    </div>
</div>
<script src="http://www.zgxmall.com/html/layui/layui.js"></script>
<script>
    //JavaScript代码区域
    layui.use('element', function () {
        var element = layui.element;

    });
</script>
</body>
</html>