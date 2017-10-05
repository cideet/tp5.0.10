<?php include("head.php"); ?>

<body class="vdouw-main-body">
<div class="vdouw-admin-position">
    <i class="icon-home mr-3"></i><span>后台首页</span>
    <cite class="ml-3 mr-3">></cite>
    <span>文章管理</span>
</div>
<div class="mt-10 mb-10 vdouw-admin-title">
    <b class="font20 height-100">添加文章</b>
    <i class="ml-10 mr-10">|</i>
    <a class="c-pointer color-admin-blue" href="articleList.php" target="right_content">文章列表</a>
</div>
<table class="width100 vdouw-table mb-20" cellpadding="0" cellspacing="0">
    <tbody>
    <tr>
        <td>所属分类</td>
        <td>
            <select class="form-control width500 height-30">
                <option>测试分类</option>
                <option>测试分类2</option>
            </select>
        </td>
    </tr>

    <tr>
        <td>标题</td>
        <td><input type="text" class="form-control width500 height-30"/></td>
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
        <td>标签</td>
        <td data-choice="more">
            <span class="mr-10 c-pointer"><i class="icon-check-empty font18 color-admin-blue mr-3"></i>测试标签1</span>
            <span class="mr-10 c-pointer"><i class="icon-check font18 color-admin-blue mr-3"></i>测试标签2</span>
        </td>
    </tr>

    <tr>
        <td>作者</td>
        <td><input type="text" class="form-control width500 height-30" value="张三丰"/></td>
    </tr>

    <tr class="vdouw-kingeditor">
        <td>内容</td>
        <td><textarea class="js-editor" id="vdouw-editor" name="content" rows="20" style="width:800px;"></textarea></td>
    </tr>

    <tr>
        <td>原创</td>
        <td data-choice="one">
            <span class="mr-10 c-pointer"><i class="icon-ok-sign font18 color-admin-blue mr-3"></i>是</span>
            <span class="mr-10 c-pointer"><i class="icon-circle-blank font18 color-admin-blue mr-3"></i>否</span>
        </td>
    </tr>

    <tr>
        <td>置顶</td>
        <td data-choice="one">
            <span class="mr-10 c-pointer"><i class="icon-circle-blank font18 color-admin-blue mr-3"></i>是</span>
            <span class="mr-10 c-pointer"><i class="icon-ok-sign font18 color-admin-blue mr-3"></i>否</span>
        </td>
    </tr>

    <tr>
        <td>显示</td>
        <td data-choice="one">
            <span class="mr-10 c-pointer"><i class="icon-ok-sign font18 color-admin-blue mr-3"></i>是</span>
            <span class="mr-10 c-pointer"><i class="icon-circle-blank font18 color-admin-blue mr-3"></i>否</span>
        </td>
    </tr>

    <tr>
        <td></td>
        <td><input type="button" class="btn btn-primary width300 color-white" value="提交"/></td>
    </tr>
    </tbody>
</table>

<script>
    KindEditor.ready(function (K) {
        window.editor = K.create('#vdouw-editor', {
            uploadJson: '/admin.php/Image/kindupload',
            afterBlur: function () {
                this.sync();
            }
        });
    });
</script>

</body>
</html>