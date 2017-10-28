<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/23 0023
 * Time: 17:35
 */

namespace app\common\model;

class NewsComment extends \app\common\model\Basemodel
{
    /**
     * 获取顶级评论
     * @param $articleId
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getNewsFirstComments($articleId)
    {
        $where = ['news_id' => $articleId, 'parents_id' => 0];
        $order = ['date' => 'desc'];
        $res = $this->where($where)->order($order)->select();
        foreach ($res as $k => $v) {
            $res[$k]['memberName'] = model('Member')->getMembernameById($res[$k]['member_id']);
        }
        return $res;
    }

    /**
     * 获取非顶级评论
     * @param $articleId
     * @param $parentsId
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getNewsSecondComments($articleId, $parentsId)
    {
        $where = ['news_id' => $articleId, 'parents_id' => $parentsId];
        $order = ['date' => 'asc'];
        $res = $this->where($where)->order($order)->select();
        foreach ($res as $k => $v) {
            $res[$k]['memberName'] = model('Member')->getMembernameById($res[$k]['member_id']);
        }
        return $res;
    }

    public function getCount($newsid)
    {
        $where = ['news_id' => $newsid];
        return $this->where($where)->count();
    }
}