<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/10/6
 * Time: 0:30
 */

namespace app\admin\controller;

class Index extends \app\admin\controller\Basecontroller
{
    public function index()
    {
        return $this->fetch('', [
            'adminUsername' => session('adminUser', '', 'adminUser')['username']
            //'adminUsername' => $_SESSION['adminUser']['adminUser']['username']//这种方法不对
        ]);
    }

    public function main()
    {
        echo(config('config.myname') . '<br>');
        //echo('<br>发送邮件开始<br>');
        //\phpmailer\Email::send('488703045@qq.com', 'title', 'content');
        //echo('<br>发送邮件完成<br>');
        return $this->fetch();
    }

}

