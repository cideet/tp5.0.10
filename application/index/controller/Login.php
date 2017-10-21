<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/10/21
 * Time: 17:20
 */

namespace app\index\controller;

class Login extends \think\Controller
{
    public function index()
    {
        return $this->fetch();
    }
}