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
        return $this->select();
    }


    public function getTagNamesByTagId($tagId)
    {
        $where = ['id' => $tagId];
        $ret = $this->where($where)->field('name')->find();
        return $ret;
    }
}
