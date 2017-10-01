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

    public function save()
    {
        //print_r($_POST); //第一种获取数据的方式
        print_r(input('post.')); //第二种获取数据的方式
        //print_r(request()->post()); //第三种获取数据的方式
        //建议使用后面两条，不要用PHP原生的
        $data = input('post.');
        $data['status'] = 10; //测试validate
        $validate = validate('Category');
        //if (!$validate->check($data)) { //tp5的validate
        if (!$validate->scene('add')->check($data)) { //验证的场景设置
            $this->error($validate->getError());
        }
    }
}