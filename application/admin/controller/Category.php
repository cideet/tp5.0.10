<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/10/1
 * Time: 19:00
 */

namespace app\admin\controller;
class Category extends \think\Controller
{
    public function index()
    {
        //echo('application/admin/controller/Category.php/Category/index');
        return $this->fetch();
    }

    public function add()
    {
        //echo('application/admin/controller/Category.php/Category/add');
        return $this->fetch();
    }
}