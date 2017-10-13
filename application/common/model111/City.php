<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/10/6
 * Time: 2:45
 */

namespace app\common\model;


class City extends \app\common\model\Basemodel
{
    /**
     * 获取分类
     * @param string $field
     * @param bool $tree
     */
    public function getCitys($field = "all", $tree = true)
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
    public function getNormalFirstCity()
    {
        $where = ['status' => 1, 'parent_id' => 0];
        $order = ['listorder' => 'asc', 'id' => 'asc'];
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

    /**
     * 根据ID值更新记录
     * @param $id
     * @param $data
     * @return mixed
     */
    public function updateCityByID($id, $data)
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
     * 根据ID获取下一级城市
     * @param int $parentId
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getCitysByParentId($parentId = 0)
    {
        $where = ['status' => 1, 'parent_id' => $parentId];
        $order = ['id' => 'asc'];
        return $this->where($where)->order($order)->select();
    }

}

