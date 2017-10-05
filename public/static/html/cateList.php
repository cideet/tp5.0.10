<?php include("head.php"); ?>

<body class="vdouw-main-body">
<div class="vdouw-admin-position">
    <i class="icon-home mr-3"></i><span>后台首页</span>
    <cite class="ml-3 mr-3">></cite>
    <span>文章分类管理</span>
</div>
<div class="mt-10 mb-10 vdouw-admin-title">
    <b class="font20 height-100">文章分类列表</b>
    <i class="ml-10 mr-10">|</i>
    <a class="c-pointer color-admin-blue" href="cateAdd.php" target="right_content">添加文章分类</a>
</div>
<table class="width100 vdouw-table" cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <td class="width10">ID</td>
        <td class="width10">排序</td>
        <td class="width30">菜单名</td>
        <td class="width20">链接地址</td>
        <td class="width30">操作</td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>123</td>
        <td><input type="text" size="5" class="form-control text-align-center"/></td>
        <td>系统设置</td>
        <td>Admin/ShowNav/config</td>
        <td>
            <a class="c-pointer color-admin-blue" title="添加子菜单" href="cateAddson.php" target="right_content">添加子菜单</a>
            <i class="ml-5 mr-5">|</i>
            <span class="c-pointer color-admin-blue" title="修改">修改</span>
            <i class="ml-5 mr-5">|</i>
            <span class="c-pointer color-admin-blue" title="删除">删除</span>
        </td>
    </tr>
    <tr>
        <td>333</td>
        <td><input type="text" size="5" class="form-control text-align-center"/></td>
        <td><i class="color-llgray">>></i><span>系统设置</span></td>
        <td>Admin/ShowNav/config</td>
        <td>
            <a class="c-pointer color-admin-blue" title="添加子菜单" href="cateAddson.php" target="right_content">添加子菜单</a>
            <i class="ml-5 mr-5">|</i>
            <a class="c-pointer color-admin-blue" title="修改" href="cateEdit.php" target="right_content">修改</a>
            <i class="ml-5 mr-5">|</i>
            <span class="c-pointer color-admin-blue" title="删除">删除</span>
        </td>
    </tr>
    <tr>
        <td>555</td>
        <td><input type="text" size="5" class="form-control text-align-center"/></td>
        <td><i class="color-llgray">>></i><i class="color-llgray">>></i><span>系统设置</span></td>
        <td>Admin/ShowNav/config</td>
        <td>
            <a class="c-pointer color-admin-blue" title="添加子菜单" href="cateAddson.php" target="right_content">添加子菜单</a>
            <i class="ml-5 mr-5">|</i>
            <a class="c-pointer color-admin-blue" title="修改" href="cateEdit.php" target="right_content">修改</a>
            <i class="ml-5 mr-5">|</i>
            <span class="c-pointer color-admin-blue" title="删除">删除</span>
        </td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4"><input type="button" class="btn btn-primary color-white" value="更新排序"/></td>
    </tr>
    </tbody>
</table>

</body>
</html>