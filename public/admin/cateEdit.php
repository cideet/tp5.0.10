<?php include("head.php"); ?>

<body class="vdouw-main-body">
<div class="vdouw-admin-position">
    <i class="icon-home mr-3"></i><span>后台首页</span>
    <cite class="ml-3 mr-3">></cite>
    <span>分类管理</span>
</div>
<div class="mt-10 mb-10 vdouw-admin-title">
    <b class="font20 height-100">编辑文章分类</b>
    <i class="ml-10 mr-10">|</i>
    <a class="c-pointer color-admin-blue" href="cateList.php" target="right_content">文章分类列表</a>
</div>
<table class="width100 vdouw-table mb-20" cellpadding="0" cellspacing="0">
    <tbody>
    <tr>
        <td>分类名称</td>
        <td><input type="text" class="form-control width300 height-30"/></td>
    </tr>
    <tr>
        <td>分类名称</td>
        <td>
            <select class="form-control width300 height-30">
                <option>测试分类</option>
                <option>测试分类2</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>关键词</td>
        <td><input type="text" class="form-control width500 height-30"/></td>
    </tr>
    <tr class="vdouw-table-intro">
        <td>描述</td>
        <td><textarea type="text" class="form-control width500 height-100"></textarea></td>
    </tr>
    <tr>
        <td>排序</td>
        <td><input type="text" class="form-control width200 height-30"/></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="button" class="btn btn-primary width200 color-white" value="提交"/></td>
    </tr>
    </tbody>
</table>

</body>
</html>