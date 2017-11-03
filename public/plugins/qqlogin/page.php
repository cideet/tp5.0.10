<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/3 0003
 * Time: 11:26
 */

require 'function.php';
require 'qqConnectAPI.php';
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8"/>
    <title>Title</title>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
</head>
<body>
<?php
if (isset($_COOKIE['qq_accesstoken']) && isset($_COOKIE['qq_openid'])) {
    echo('<a href="qqlogout.php">退出QQ</a>');
    $qc = new QC($_COOKIE['qq_accesstoken'], $_COOKIE['qq_openid']);
    $userinfo = $qc->get_user_info();
    debug($userinfo);
} else {
    echo('<a href="index.php">登录QQ</a>');
}
?>

</body>
</html>