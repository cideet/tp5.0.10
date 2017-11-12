<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/11/12
 * Time: 15:13
 */

namespace app\api\controller;

class Test extends \think\Controller
{
    public function index()
    {
        return [
            '1234', '4567777'
        ];
    }
    
}