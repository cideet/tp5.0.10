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
            'allNews' => $allNews
        ]);
    }

    public function category()
    {
        $categoryId = getParam('id');
        if (!!$categoryId) {
            $allNews = model('News')->getAllDatas();
            //echo(json_encode($allNews));
            return $this->fetch('', [
                'allNews' => $allNews
            ]);
        } else {
            echo('你丫坑爹呀');
        }
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
            $comments = model('NewsComment')->getNewsFirstComments($articleId);
            foreach ($comments as $k => $v) {
                $comments[$k]['sonComments'] = model('NewsComment')->getNewsSecondComments($articleId, $comments[$k]['id']);
                foreach ($comments[$k]['sonComments'] as $k1 => $v1) {
                    $v1['parent_name'] = model('Member')->getMembernameById($v1['parent_id']);
                }
            }
            $info['comments'] = $comments;
            //echo(json_encode($info));
            $commentCount = model('NewsComment')->getCount($articleId);
            return $this->fetch('', [
                'info' => $info,
                'commentCount' => $commentCount
            ]);
        } else {
            echo('你丫坑爹呀');
        }
    }

    /**
     * 添加评论
     * @return array|void
     */
    public function addComment()
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

    /**
     * 浏览量加1
     */
    public function clickAdd()
    {
        $data = input('post.');
        model('News')->where(array('id' => $data['id']))->setInc('click', 1);
    }

}
