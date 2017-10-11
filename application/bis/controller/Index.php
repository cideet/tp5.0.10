<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/10 0010
 * Time: 17:12
 */

namespace app\bis\controller;

class Index extends \app\bis\controller\Basecontroller
{
    public function index()
    {
        return $this->fetch('', [
            'bisUsername' => session('bis','','bis')['username']
        ]);
    }

    public function main()
    {
        //echo('<br>发送邮件开始<br>');
        //\phpmailer\Email::send('488703045@qq.com', 'title', 'content');
        //echo('<br>发送邮件完成<br>');
        print_r(session('bis','','bis')['username']);
        echo('<br>');
        return $this->fetch();
    }
}
