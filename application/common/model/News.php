<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/16 0016
 * Time: 10:33
 */

namespace app\common\model;

class News extends \app\common\model\Basemodel
{
    public function getAllDatas()
    {
        $where = ['status' => 1, 'is_show' => 1];
        $order = ['id' => 'desc'];
        $res = $this->where($where)->order($order)->select();
        foreach ($res as $k => $v) {
            $tagTempData = model('NewsTag')->getDataByNewsId($v['id']);
            //根据文章id，在news_tag数据表，获取到此文章id对应的所有tag_id
            //[{"news_id":57,"tag_id":4,"id":18},{"news_id":57,"tag_id":2,"id":17}]
            $tagsIds = array();
            foreach ($tagTempData as $k1 => $v2) {
                array_push($tagsIds, model('Tag')->getTagNamesByTagId($tagTempData[$k1]['tag_id']));
            }
            $res[$k]['tag'] = $tagsIds;
        }
        return $res;
    }
}
