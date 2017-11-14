<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/13 0013
 * Time: 17:28
 */

return [
    'password_pre_halt' => 'vdouw1999',     //密码加密盐
    'aeskey' => 'sgg45747ss223455',         //aes密钥,服务端和客户端必须保持一致
    'apptypes' => ['ios', 'android',],
    'app_sign_time' => 10,                  //sign失效时间
    'app_sign_cache_time' => 20,            //sign缓存失效时间
];