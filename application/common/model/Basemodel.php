<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/10/9
 * Time: 21:57
 */

namespace app\common\model;

class Basemodel extends \think\Model
{
    /**
     * 自动更新create_time | update_time等字段
     * @var bool
     */
    protected $autoWriteTimestamp = true;

    /**
     * 插入新数据
     * @param array $data
     * @return false|int
     */
    public function add($data = array())
    {
        if (!$data || !is_array($data)) return 0;
        //return $this->save($data);
        $this->allowField(true)->save($data);   //返回新增数据的ID
        return $this->id;
    }

    /**
     * 根据ID更新数据
     * @param $id
     * @param $data
     * @return false|int
     */
    public function updateById($id, $data)
    {
        return $this->allowField(true)->save($data, ['id' => $id]);
    }
}