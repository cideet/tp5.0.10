<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/10/5
 * Time: 21:56
 */

namespace app\admin\controller;

class Login extends \app\common\controller\Basecontroller
{
    public function index()
    {
        echo(md5('123456vdouw9geBB2'));
        return $this->fetch();
    }

    public function check()
    {
        $username = input('post.username');
        $password = input('post.password');
        if (!trim($username) || !trim($password)) {
            return show(0, '用户名和密码不能为空');
        }
        $ret = model('Adminuser')->getAdminuserByUsername($username);
        if (!$ret || $ret['status'] != 1) {
            return show(0, '该用户不存在');
        } elseif ($ret['password'] != getVdouwMD5($password)) {
            return show(0, '密码错误');
        }
        session('adminUser', $ret);
        return show(1, '登录成功');

    }
}
