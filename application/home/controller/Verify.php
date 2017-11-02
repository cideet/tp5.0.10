<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/2 0002
 * Time: 10:47
 */

namespace app\home\controller;

class Verify extends \think\Controller
{
    public function index()
    {
        $config = [
            'fontSize' => 50,       // 验证码字体大小
            'length' => 4,          // 验证码位数
            'useNoise' => false,    // 关闭验证码杂点
            'codeset' => '2345678wertyuipkjhfdsaxcvbnmQWERTYUPLKJHGFDSAZXCVBN'
        ];
        $captcha = new \think\captcha\Captcha($config);
        return $captcha->entry();
    }
}