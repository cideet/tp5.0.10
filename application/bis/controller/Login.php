<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/10 0010
 * Time: 17:15
 */

namespace app\bis\controller;

class Login extends \app\bis\controller\Basecontroller
{
    public function index()
    {
        return $this->fetch();
    }
}