<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/10/5
 * Time: 22:34
 */

namespace app\common\controller;

class Adminbasecontroller extends \app\common\controller\Basecontroller
{
    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        if (!session('adminUser')) {
            $this->error('请先登录', '/index.php/admin/login/index');
        }
    }
}