<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/10/5
 * Time: 22:32
 */

namespace app\common;

class Basecontroller extends \think\Controller
{
    // 整站基类控制器
    public function _initialize()
    {
        //初始化方法
        echo('Basecontroller');
    }
}