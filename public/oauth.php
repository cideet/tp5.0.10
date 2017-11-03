<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/1 0001
 * Time: 17:06
 */

require 'Connect2.1/function.php';
require 'Connect2.1/qqConnectAPI.php';

//echo $_GET['code'];

//请求accessToken
$oauth = new Oauth();
$accesstoken = $oauth->qq_callback();
//debug($accesstoken);
