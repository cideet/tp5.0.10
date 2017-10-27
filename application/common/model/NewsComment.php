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
    public function getNewsComments($articleId, $parentId)
    {
        $where = ['news_id' => $articleId, 'parents_id' => $parentId];
        $order = ['date' => 'desc'];
        $res = $this->where($where)->order($order)->select();
        foreach ($res as $k => $v) {
            //$res['memberName'] = model('Member')->getMembernameById($res[$k]['member_id']);
            $res[$k]['memberName'] = model('Member')->getMembernameById($res[$k]['member_id']);
        }
        return $res;
    }
}