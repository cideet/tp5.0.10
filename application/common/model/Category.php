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
    public function getCategorys($field = "all", $tree = false)
    {
        if ($field == 'all') {
            $where = ['status' => 1];
            $order = ['id' => 'asc', 'listorder' => 'asc'];
            $data = $this->where($where)->order($order)->select();
            if ($tree) {
                //Loader::import('\Org\Vdouw', EXTEND_PATH);
                //return \Org\Vdouw\Date::tree($data, 'name');
                return $data;
            } else {
                return $data;
            }
        } else {
            $where = ['status' => 1];
            $order = ['id' => 'asc', 'listorder' => 'asc'];
            $data = $this->where($where)->order($order)->select();
            return $data;
        }
    }
}
