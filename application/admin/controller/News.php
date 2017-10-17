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

    /**
     * 首页
     * @return mixed
     */
    public function index()
    {
        $allNews = model('News')->getAllDatas();
        //print_r(json_encode($allNews));
        return $this->fetch('', [
            'categorys' => $this->categorys,
            'allNews' => $allNews
        ]);
    }

    /**
     * 添加
     * @return array|mixed|void
     */
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
            foreach ($tagData as $k => $v) {
                $tag_data[] = array(
                    'news_id' => $newsId,
                    'tag_id' => $v,
                );
            }
            model('NewsTag')->insertAll($tag_data);
            return show(1, '添加成功', $newsContentId);
        } else {
            $allTags = model('Tag')->getAllTags();
            return $this->fetch('', [
                'categorys' => $this->categorys,
                'allTags' => $allTags
            ]);
        }
    }

    /**
     * 切换文章状态之“原创”
     * @return array|void
     */
    public function original()
    {
        $data = input('post.');
        $res = model('News')->updateById($data['id'], ['is_original' => $data['is_original']]);
        if ($res) {
            return show(1, "修改成功", $res);
        }
        return show(0, '修改失败');
    }

    public function setStatus()
    {
        var_dump(input('post.'));
    }
}