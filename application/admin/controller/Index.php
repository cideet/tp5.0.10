<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/10/6
 * Time: 0:30
 */

namespace app\admin\controller;

class Index extends \app\common\controller\Adminbasecontroller
{
    public function index()
    {
        return $this->fetch();
    }

    public function main()
    {
        //echo('<br>发送邮件开始<br>');
        //\phpmailer\Email::send('488703045@qq.com', 'title', 'content');
        //echo('<br>发送邮件完成<br>');
        print_r($_SESSION);
        echo('<br><br>');
        print_r($_SESSION['think']['adminUser']['username']);
        echo('<br><br>');
        return $this->fetch();
    }

}
