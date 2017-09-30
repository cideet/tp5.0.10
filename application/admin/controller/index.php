<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/9/30
 * Time: 23:44
 */

namespace app\admin\controller;

class Index extends \think\Controller
{
    public function index()
    {
        //echo('admin/controller/index.php');
        return $this->fetch();
    }

    public function welcome()
    {
        //\phpmailer\Email::send('463785435@qq.com','tp5-emaiil','sucess-hala');
        //return '发送邮件成功';
        //return $this->fetch();
        return "欢迎来到o2o主后台首页!";
    }
}