<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/13 0013
 * Time: 16:43
 */

namespace app\api\controller;

use vdouw\Aes;

/**
 * API模块的公共控制器
 * Class Common
 * @package app\api\controller
 */
class Common extends \think\Controller
{
    /**
     * 初始化方法
     */
    public function __initialize()
    {
        $this->checkRequestAuth();
        $this->testAes();
    }

    /**
     * 检查每次APP请求的数据，是否合法
     */
    public function checkRequestAuth()
    {
        //首先需要获取headers里的数据
        $headers = request()->header();
        halt($headers);
    }

    public function testAes()
    {
        $str = 'id=1&ms=45&username=zhangsanfeng';
        echo (new Aes())->encrypt($str);
        exit;
    }
}