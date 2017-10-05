<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/10/6
 * Time: 2:32
 */

namespace app\admin\controller;

class Category extends \app\common\controller\Adminbasecontroller
{
    public function index()
    {
        $categorys = model('Category')->getCategorys();
        //print_r($categorys);
        return $this->fetch('', [
            'categorys' => $categorys
        ]);
    }

    public function add()
    {
        echo('add');
    }
}