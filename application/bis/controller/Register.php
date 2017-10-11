<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/11 0011
 * Time: 17:23
 */

namespace app\bis\controller;

class Register extends \app\common\controller\Commoncontroller
{
    /**
     * 商家注册页
     */
    public function index()
    {
        return $this->fetch();
    }
}