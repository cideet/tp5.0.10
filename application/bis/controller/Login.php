<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/10 0010
 * Time: 17:15
 */

namespace app\bis\controller;

class Login extends \app\common\controller\Commoncontroller
{
    /**
     * 登录页面
     * @return mixed
     */
    public function index()
    {
        return $this->fetch();
    }

    /**
     * 登录验证
     * @return array|void
     */
    public function check()
    {
        $username = input('post.username');
        $password = input('post.password');
        if (!trim($username) || !trim($password)) {
            return show(0, '用户名和密码不能为空');
        }
        $ret = model('BisAccount')->get(['username' => $username]);
        //对应 $ret = model('Adminuser')->getAdminuserByUsername($username);
        if (!$ret || $ret['status'] != 1) {
            return show(0, '该用户不存在');
        } elseif ($ret['password'] != getVdouwMD5($password)) {
            return show(0, '密码错误');
        }
        model('BisAccount')->updateById($ret->id, ['last_login_time' => time()]);
        session('bis', $ret, 'bis'); //对应 session('adminUser',$ret);
        return show(1, '登录成功');
    }

    public function logout()
    {
        session(null, 'bis');
        $this->redirect('/index.php/bis/login/index');
    }

}
