<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/12 0012
 * Time: 20:11
 */

namespace app\api\controller;

class Category extends \think\Controller
{
    public function getCategorysByParentId()
    {
        $id = input('post.id');
        if (!$id) {
            return show(0, 'ID不合法');
        }
        $citys = model('Category')->getCategorysByPid($id);
        if ($citys) {
            return show(1, "获取二级分类成功", $citys);
        }
        return show(0, '获取二级分类失败', $citys);
    }
}