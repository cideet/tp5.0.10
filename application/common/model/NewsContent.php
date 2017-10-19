<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/16 0016
 * Time: 10:33
 */

namespace app\common\model;

class NewsContent extends \app\common\model\Basemodel
{
    /**
     * 根据文章ID获取tag
     */
    public function getDataByNewsId($newsId)
    {
        $where = ['news_id' => $newsId];
        return $this->where($where)->find();
    }
}
