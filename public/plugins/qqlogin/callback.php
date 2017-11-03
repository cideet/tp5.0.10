<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/1 0001
 * Time: 17:06
 */

require 'function.php';
require 'qqConnectAPI.php';

//echo $_GET['code'];

//请求accessToken
$oauth = new Oauth();
$accesstoken = $oauth->qq_callback();
//debug($accesstoken);

//获取openid
$openid = $oauth->get_openid();
//debug($openid);

setcookie('qq_accesstoken', $accesstoken, time() + 86400);
setcookie('qq_openid', $openid, time() + 86400);

header('location:page.php');

