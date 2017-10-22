<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/10/6
 * Time: 2:45
 */

namespace app\common\model;


class Category extends \app\common\model\Basemodel
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
            $order = ['listorder' => 'asc', 'id' => 'asc'];
            $d = $this->where($where)->order($order)->select();
            if ($tree) {
                return \Vdouw\Data::tree($d, 'name', 'id', 'parent_id');
            } else {
                return $d;
            }
        } else {
            $where = ['status' => 1];
            $order = ['listorder' => 'asc', 'id' => 'asc'];
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
        $order = ['listorder' => 'asc', 'id' => 'asc'];
        return $this->where($where)->order($order)->select();
    }

    /**
     * 根据ID值更新记录
     * @param $id
     * @param $data
     * @return mixed
     */
    public function updateCateByID($id, $data)
    {
        if (!$id || !is_numeric($id)) {
            throw_exception("ID不合法");
        }
        if (!$data || !is_array($data)) {
            throw_exception("更新的数据不合法");
        }
        return $this->where("id=" . $id)->save($data);
    }

    /**
     * 根据ID获取下一级分类
     * @param int $parentId
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getCategorysByPid($parentId = 0)
    {
        $where = ['status' => 1, 'parent_id' => $parentId];
        $order = ['id' => 'asc'];
        return $this->where($where)->order($order)->select();
    }

    /**
     * 根据ID获取name
     * @param $id
     * @return array|false|\PDOStatement|string|\think\Model
     */
    public function getNamesById($id)
    {
        $where = ['id' => $id];
        $ret = $this->where($where)->field('name')->find();
        return $ret;
    }
    
}

?>



