<?php include("head.php"); ?>
<body class="vdouw-admin-body">
<header class="height-50 width100">
    <div class="pull-left pl-15"><b class="font16 color-white">后台管理</b></div>
    <div class="pull-right pl-10 pr-10 tran-all"><span class="mr-3 color-white pull-left">你好，admin</span><a
            class="ml-20 color-white" href="/admin/login/logout"><i class="mr-3 icon-signout color-white"></i>退出登录</a>
    </div>
</header>
<article class="height-100">
    <div class="pull-left width15">
        <?php include("left.php"); ?>
    </div>
    <div class="pull-right width85 bg-white">
        <div class="main-content">
            <iframe id="content-iframe" src="main.php" frameborder="0" width="100%" height="99.99%" name="right_content"
                    scrolling="auto"></iframe>
        </div>
    </div>
</article>

</body>
</html>