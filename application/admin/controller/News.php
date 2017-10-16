<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/10/15
 * Time: 22:56
 */

namespace app\admin\controller;

class News extends \app\admin\controller\Basecontroller
{
    private $obj;

    public function __construct()
    {
        parent::__construct();
        $this->obj = model('News');
        $this->categorys = model('Category')->getCategorys();
    }

    public function index()
    {
        return $this->fetch('', [
            'categorys' => $this->categorys
        ]);
    }

    public function add()
    {
        $data = input('post.');
        if ($data) {
            $newsData['title'] = $data['title'];
            $newsData['author'] = $data['author'];
            $newsData['category_id'] = $data['category_id'];
            $newsData['titleimg'] = $data['titleimg'];
            $newsData['keywords'] = $data['keywords'];
            $newsData['description'] = $data['description'];
            $newsData['is_original'] = $data['is_original'];
            $newsData['is_show'] = $data['is_show'];
            $newsData['is_top'] = $data['is_top'];
            $newsData['title'] = $data['title'];
            $newsData['title'] = $data['title'];
            $newsData['addtime'] = time();
            $newsId = model('News')->add($newsData);
            if (!$newsId) {
                return show(0, "添加主表失败", $newsId);
            }
            $newsContentData['content'] = $data['content'];
            $newsContentData['news_id'] = $newsId;
            $newsContentId = model('NewsContent')->add($newsContentData);
            if (!$newsContentData) {
                return show(0, "添加“文章正文”数据表失败", $newsContentData);
            }
            $tagData = explode(',', $data['tag']);
            //model('NewsTag')->addData($newsId, $tagData);     //第一种方法有问题
//            foreach ($tagData as $k => $v) {                    //第二种方法也只加进去了一个
//                $tag_data1 = array(
//                    'news_id' => $newsId,
//                    'tag_id' => $v,
//                );
//                model('NewsTag')->add($tag_data1);
//            }
            return show(1, '添加成功', $newsContentId);
        } else {
            $allTags = model('Tag')->getAllTags();
            return $this->fetch('', [
                'categorys' => $this->categorys,
                'allTags' => $allTags
            ]);
        }
    }
}