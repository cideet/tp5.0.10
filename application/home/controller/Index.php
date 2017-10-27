<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/10/21
 * Time: 22:40
 */

namespace app\home\controller;

class Index extends \app\home\controller\Basecontroller
{
    public $memberUsername;

    public function _initialize()
    {
        parent::_initialize();
        $this->memberUsername = $this->memberUname;
    }

    /**
     * 网站首页
     * @return mixed
     */
    public function index()
    {
        $allNews = model('News')->getAllDatas();
        //echo(json_encode($allNews));
        return $this->fetch('', [
            'memberUsername' => $this->memberUsername,
            'allNews' => $allNews
        ]);
    }

    /**
     * 文章 内容页
     * @return mixed
     */
    public function article()
    {
        $articleId = getParam('id');
        if (!!$articleId) {
            $info = model('News')->getNewsById($articleId);
            $info['categoryName'] = model('Category')->getNamesById($info['category_id']);  //获取到文章的分类名
            $tagTempData = model('NewsTag')->getDataByNewsId($info['id']);
            $tagsNames = array();
            foreach ($tagTempData as $k => $v) {
                array_push($tagsNames, model('Tag')->getTagNamesByTagId($tagTempData[$k]['tag_id']));
            }
            $info['tag'] = $tagsNames;  //获取到文章的Tags
            $info['content'] = model('NewsContent')->getDataByNewsId($info['id'])['content'];
            $comments = model('NewsComment')->getNewsComments($articleId, 0);
            foreach ($comments as $k => $v) {
                $comments[$k]['sonComments'] = model('NewsComment')->getNewsComments($articleId, $comments[$k]['id']);
            }
            $info['comments'] = $comments;
            //echo(json_encode($info));
            return $this->fetch('', [
                'memberUsername' => $this->memberUsername,
                'info' => $info
            ]);
        } else {
            echo('你丫坑爹呀');
        }
    }

    /**
     * 添加一级评论
     * @return array|void
     */
    public function addFirstComment()
    {
        $data = input('post.');
        $data['date'] = time();
        $commentId = model('NewsComment')->add($data);
        //echo $commentId;
        if ($commentId) {
            return show(1, "添加成功", $commentId);
        }
        return show(0, '添加失败');
    }

}
