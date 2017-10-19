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
     * 根据文章ID获取tag
     */
    public function getDataByNewsId($newsId)
    {
        $order = ['id' => 'desc'];
        $where = ['news_id' => $newsId];
        $ret = $this->where($where)->order($order)->select();
        return $ret;
    }

    /**
     * 更新文章时，先直接删除对应的tag
     * @param $news_id
     * @return bool
     */
    public function deleteTag($news_id)
    {
        $where = array("news_id" => $news_id);
        $this->where($where)->delete();
        return true;
    }
}
