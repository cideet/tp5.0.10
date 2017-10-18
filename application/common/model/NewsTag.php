<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/16 0016
 * Time: 10:33
 */

namespace app\common\model;

class NewsTag extends \app\common\model\Basemodel
{
    /**
     * 根据文章ID获取tag_id
     * @param $newsId
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getDataByNewsId($newsId)
    {
        $order = ['id' => 'desc'];
        $where = ['news_id' => $newsId];
        $ret = $this->where($where)->order($order)->select();
        return $ret;
    }
}