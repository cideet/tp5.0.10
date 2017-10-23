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
            foreach ($tagTempData as $k1 => $v2) {
                array_push($tagsNames, model('Tag')->getTagNamesByTagId($tagTempData[$k1]['tag_id']));
            }
            $info['tag'] = $tagsNames;  //获取到文章的Tags
            $info['content'] = model('NewsContent')->getDataByNewsId($info['id'])['content'];
            //echo(json_encode($info));
            return $this->fetch('', [
                'memberUsername' => $this->memberUsername,
                'info' => $info
            ]);
        } else {
            echo('你丫坑爹呀');
        }
    }

    public function comment()
    {
        $data = input('post.');
        $commentId = model('NewsComment')->add($data);
        //echo $commentId;
        if ($commentId) {
            return show(1, "添加成功", $commentId);
        }
        return show(0, '添加失败');
    }

}
