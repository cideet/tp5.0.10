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
     * 网站首页 || 列表页
     * @return mixed
     */
    public function index()
    {
        $categoryId = getParam('id');
        $this->getNavPid(12);
        if (!!$categoryId) {
            $allNews = model('News')->getAllDatas($categoryId);
            //echo(json_encode($allNews));
            return $this->fetch('', [
                'allNews' => $allNews
            ]);
        } else {
            $allNews = model('News')->getAllDatas();
            //echo(json_encode($allNews));
            return $this->fetch('', [
                'allNews' => $allNews
            ]);
        }
    }

    public function getNavPid($id)
    {
        $nav = model('Category')->find($id);
        echo(json_encode($nav));
        if ($nav['parent_id'] != 0) {
            return $this->getNavPid($nav['parent_id']);
        }
        return $nav['id'];
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
            $info['prev'] = model('News')->getPrevNews($info['category_id'], $info['id']);
            $info['next'] = model('News')->getNextNews($info['category_id'], $info['id']);
            if ($info['prev']['id']) {
                $info['prev_url'] = '/index.php/home/index/article/id/' . $info['prev']['id'];
                $info['prev_title'] = $info['prev']['title'];
            } else {
                $info['prev_url'] = '/index.php/home/index/index/id/' . $info['category_id'];
                $info['prev_title'] = '返回列表页';
            }
            if ($info['next']['id']) {
                $info['next_url'] = '/index.php/home/index/article/id/' . $info['next']['id'];
                $info['next_title'] = $info['next']['title'];
            } else {
                $info['next_url'] = '/index.php/home/index/index/id/' . $info['category_id'];
                $info['next_title'] = '返回列表页';
            }
            $info['commentCount'] = model('NewsComment')->getCount($articleId);
            //echo(json_encode($info));
            return $this->fetch('', [
                'info' => $info
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
