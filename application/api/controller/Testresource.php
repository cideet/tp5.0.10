<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/11/12
 * Time: 15:58
 * 此文件仅用于测试application/api/controller/Testresource.php
 * 但是效果不是很明显
 * update方法，不知道怎么配置，先放下吧
 */

namespace app\api\controller;

class Testresource extends \think\Controller
{

    public function index()
    {
        halt(input('get.'));
    }

    public function save()
    {
        halt(input('post.'));
    }

    public function update($id = 0)
    {
        halt(input('put.') . '$id=' . $id);
    }
}