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
    /**
     * 获取分类
     * @param string $field
     * @param bool $tree
     */
    public function getCategorys($field = "all", $tree = true)
    {
        if ($field == 'all') {
            $where = ['status' => 1];
            $order = ['id' => 'asc', 'listorder' => 'asc'];
            $d = $this->where($where)->order($order)->select();
            if ($tree) {
                return \Vdouw\Data::tree($d, 'name', 'id', 'parent_id');
            } else {
                return $d;
            }
        } else {
            $where = ['status' => 1];
            $order = ['id' => 'asc', 'listorder' => 'asc'];
            $d = $this->where($where)->order($order)->select();
            return $d;
        }
    }

    /**
     * 获取一级分类
     */
    public function getNormalFirstCategory()
    {
        $where = ['status' => 1, 'parent_id' => 0];
        $order=['id'=>'asc'];
        return $this->where($where)->order($order)->select();
    }
    
    /**
     * 插入新分类
     * @param array $data
     * @return false|int
     */
    public function add($data = array())
    {
        if (!$data || !is_array($data)) return 0;
        return $this->save($data);
    }
}
