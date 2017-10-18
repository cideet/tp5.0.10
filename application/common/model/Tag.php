<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/16 0016
 * Time: 10:33
 */

namespace app\common\model;

class Tag extends \app\common\model\Basemodel
{
    /**
     * 获取全部标签Tag
     * @return mixed
     */
    public function getAllTags()
    {
        $where = ['status' => 1];
        $order = ['id' => 'asc'];
        return $this->where($where)->order($order)->select();
    }

    /**
     * 根据标签ID获取标签name
     * @param $tagId
     * @return array|false|\PDOStatement|string|\think\Model
     */
    public function getTagNamesByTagId($tagId)
    {
        $where = ['id' => $tagId];
        $ret = $this->where($where)->field('name')->find();
        return $ret;
    }
}
