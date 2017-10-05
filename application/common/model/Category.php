<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/10/6
 * Time: 2:45
 */

namespace app\common\model;

class Category extends \think\Model
{
    public function getCategorys()
    {
        $where = ['status' => 1];
        $order = ['id' => 'asc'];
        return $this->where($where)->order($order)->select();
    }
}