<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/10/5
 * Time: 21:56
 */

namespace app\admin\controller;

class Login extends \app\common\Basecontroller
{
    public function index()
    {
        return $this->fetch();
    }
}
