<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/12 0012
 * Time: 20:11
 */

namespace app\api\controller;

class City extends \think\Controller
{
    public function getCitysByParentId()
    {
        $id = input('post.id');
        if ($id) {
            return show(1, 'ID不合法');
        }
        $citys = model('City')->getCitysByParentId($id);
        print_r($citys);
    }
}