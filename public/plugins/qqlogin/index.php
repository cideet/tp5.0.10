<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/3 0003
 * Time: 10:17
 */

require 'function.php';
require 'qqConnectAPI.php';

//访问QQ登录页面
$oauth = new Oauth();
$oauth->qq_login();