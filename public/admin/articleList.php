<?php include("head.php"); ?>

<body class="vdouw-main-body">
<div class="vdouw-admin-position">
    <i class="icon-home mr-3"></i><span>后台首页</span>
    <cite class="ml-3 mr-3">></cite>
    <span>文章列表</span>
</div>
<div class="mt-10 mb-10 vdouw-admin-title">
    <b class="font20 height-100">文章管理</b>
    <i class="ml-10 mr-10">|</i>
    <a class="c-pointer color-admin-blue" href="articleAdd.php" target="right_content">添加文章</a>
</div>
<table class="width100 vdouw-table" cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <td class="width5 text-overflow">ID</td>
        <td class="width10">所属栏目</td>
        <td class="width20">标题</td>
        <td class="width15">标签</td>
        <td class="width5">作者</td>
        <td class="width5 text-align-center">原创</td>
        <td class="width5 text-align-center">显示</td>
        <td class="width5 text-align-center">置顶</td>
        <td class="width5 text-align-center">点击数</td>
        <td class="width10 text-overflow">发布时间</td>
        <td class="width15">操作</td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>1234</td>
        <td>所属栏目</td>
        <td>这是标题这是标题这是标题这是标题这是标题这是标题</td>
        <td>这是标签，会有很多很多的标签</td>
        <td>张三丰</td>
        <td class="text-align-center"><i class="icon-ok"></i></td>
        <td class="text-align-center"><i class="icon-remove"></i></td>
        <td class="text-align-center"><i class="icon-ok"></i></td>
        <td class="text-align-center">11234</td>
        <td>2016-12-12 14:12:00</td>
        <td>
            <a class="c-pointer color-admin-blue" title="修改" href="articleList.php" target="right_content">修改</a>
            <i class="ml-3 mr-3">|</i>
            <span class="c-pointer color-admin-blue" title="置顶">置顶</span>
            <i class="ml-3 mr-3">|</i>
            <span class="c-pointer color-admin-blue" title="删除">删除</span>
        </td>
    </tr>
    </tbody>
</table>

<div class="page text-align-left">
    <a class="first" href="/index.php/Admin/Article/index/p/1">首页</a>
    <a class="prev not-allowed" href="javascript:;">上一页</a>
    <span class="current">1</span>
    <a class="next not-allowed" href="javascript:;">下一页</a>
    <a class="end hidden-xs" href="/index.php/Admin/Article/index/p/1">末页</a>
    <span class="rows">共 1 条记录</span>
</div>

</body>
</html>