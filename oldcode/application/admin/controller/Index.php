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
        \phpmailer\Email::send('488703045@qq.com','tp5-email','sucess..hahaha');
        echo '发送邮件成功<br>';
        //return $this->fetch();
        //return "<img src='http://www.vdouw.com/skin/vdouw/images/logo.png'/>";
        return "<img src='/index.php/admin/index/map'/>";
    }

    public function test()
    {
        return (\Map::getLngLat('北京昌平沙河地铁'));
    }

    public function map()
    {
        return \Map::staticimage('北京昌平沙河地铁');
    }
}