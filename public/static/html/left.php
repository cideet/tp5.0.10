<ul>
    <li>
        <div class="tran-all pl-15 pr-15"><a href="main.php" target="right_content"><i class="icon-desktop mr-5"></i><b>后台首页</b><i
                    class="pull-right icon-sort-down"></i></a></div>
    </li>
    <li attr-onoff="off">
        <div class="tran-all pl-15 pr-15"><i class="icon-cog mr-5"></i><b>文章管理</b><i
                class="pull-right icon-sort-down"></i></div>
        <dl>
            <dd class="tran-all">
                <small class="icon-double-angle-right font16"></small>
                <a href="articleAdd.php" target="right_content">添加文章</a></dd>
            <dd class="tran-all">
                <small class="icon-double-angle-right font16"></small>
                <a href="articleList.php" target="right_content">文章列表</a></dd>
        </dl>
    </li>
    <li attr-onoff="on">
        <div class="tran-all pl-15 pr-15"><i class="icon-cog mr-5"></i><b>文章分类管理</b><i
                class="pull-right icon-sort-down"></i></div>
        <dl>
            <dd class="tran-all">
                <small class="icon-double-angle-right font16"></small>
                <a href="cateAdd.php" target="right_content">添加分类</a></dd>
            <dd class="tran-all">
                <small class="icon-double-angle-right font16"></small>
                <a href="cateList.php" target="right_content">分类列表</a></dd>
        </dl>
    </li>
    <!--    <li attr-onoff="off">-->
    <!--        <div class="tran-all pl-15 pr-15"><i class="icon-cog mr-5"></i><b>标签管理</b><i class="pull-right icon-sort-down"></i></div>-->
    <!--        <dl>-->
    <!--            <dd class="tran-all"><small class="icon-double-angle-right font16"></small><a href="tagsAdd.php" target="right_content">添加标签</a></dd>-->
    <!--            <dd class="tran-all"><small class="icon-double-angle-right font16"></small><a href="tagsList.php" target="right_content">标签列表</a></dd>-->
    <!--        </dl>-->
    <!--    </li>-->
    <li attr-onoff="off">
        <div class="tran-all pl-15 pr-15"><i class="icon-cog mr-5"></i><b>菜单管理</b><i
                class="pull-right icon-sort-down"></i></div>
        <dl>
            <dd class="tran-all">
                <small class="icon-double-angle-right font16"></small>
                <a href="navAdd.php" target="right_content">添加菜单</a></dd>
            <dd class="tran-all">
                <small class="icon-double-angle-right font16"></small>
                <a href="navList.php" target="right_content">菜单列表</a></dd>
        </dl>
    </li>
    <li attr-onoff="off">
        <div class="tran-all pl-15 pr-15"><i class="icon-globe mr-5"></i><b>权限控制</b><i
                class="pull-right icon-sort-down"></i></div>
        <dl>
            <dd class="tran-all">
                <small class="icon-double-angle-right font16"></small>
                <a href="ruleList.php" target="right_content">权限列表</a></dd>
            <dd class="tran-all">
                <small class="icon-double-angle-right font16"></small>
                <a href="groupList.php" target="right_content">用户组列表</a></dd>
            <dd class="tran-all">
                <small class="icon-double-angle-right font16"></small>
                <a href="adminList.php" target="right_content">管理员列表</a></dd>
        </dl>
    </li>

</ul>

<script>
    $("article > .pull-left li > div").click(function () {
        if ($(this).parent().attr("attr-onoff") == "off") {
            $(this).next("dl").slideDown();
            $(this).parent().attr("attr-onoff", "on");
        } else {
            $(this).next("dl").slideUp();
            $(this).parent().attr("attr-onoff", "off");
        }
    });

    $("article > .pull-left li dd").click(function () {
        $("article > .pull-left li dd").removeClass("active");
        $(this).addClass("active");
    });
</script>