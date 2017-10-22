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
    /**
     * 获取文章列表
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getAllDatas()
    {
        $where = ['status' => 1];
        $order = ['is_top' => 'desc', 'id' => 'desc'];
        $res = $this->where($where)->order($order)->select();
        foreach ($res as $k => $v) {
            $tagTempData = model('NewsTag')->getDataByNewsId($v['id']);
            //根据文章id，在news_tag数据表，获取到此文章id对应的所有tag_id
            //[{"news_id":57,"tag_id":4,"id":18},{"news_id":57,"tag_id":2,"id":17}]
            $tagsNames = array();
            foreach ($tagTempData as $k1 => $v2) {
                array_push($tagsNames, model('Tag')->getTagNamesByTagId($tagTempData[$k1]['tag_id']));
            }
            $res[$k]['tag'] = $tagsNames;
            $res[$k]['category_name'] = model('Category')->getNamesById($res[$k]['category_id']);
        }
        return $res;
    }

    /**
     * 传递文章ID获取单条全部数据，$map主要为前台页面上下页使用
     * @param $newsId
     * @param string $map
     * @return array|false|\PDOStatement|string|\think\Model
     */
    public function getNewsById($newsId, $map = '')
    {
        if ($map == '') {   // $map为空则不获取上下篇文章
            $where = ['id' => $newsId];
            $ret = $this->where($where)->find();
            return $ret;
        } else {

        }

    }
}
