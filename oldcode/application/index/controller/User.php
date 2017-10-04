<?php
namespace app\index\controller;

class User extends \think\Controller
{
    public function login()
    {
        return $this->fetch();
    }

    public function register()
    {
        return $this->fetch();
    }
}
