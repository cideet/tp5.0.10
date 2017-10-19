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
        $this->allTags = model('Tag')->getAllTags();
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
            //这时有个问题，未选标签的文章，在news_tag表中插入了一个0值，后期需要修复一下
            model('NewsTag')->insertAll($tag_data);
            return show(1, '添加成功', $newsContentId);
        } else {
            return $this->fetch('', [
                'categorys' => $this->categorys,
                'allTags' => $this->allTags
            ]);
        }
    }

    /**
     * 编辑
     */
    public function edit()
    {
        if (request()->isPost()) {
            $data = input('post.');
            if ($data['id']) {
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
                $newsData['id'] = $data['id'];
                $ret = model('News')->updateById($data['id'], $newsData);
                if (!$ret) {
                    return show(0, "更新主表失败");
                }
                $newsContentData['content'] = $data['content'];
                $newsContentData['news_id'] = $data['id'];
                $newsContentId = model('NewsContent')->updateByNewsId($data['id'], $newsContentData);
                if (!$newsContentId) {
                    return show(0, '更新文章正文失败');
                }
                model('NewsTag')->deleteTag($data['id']);
                $tagData = explode(',', $data['tag']);
                foreach ($tagData as $k => $v) {
                    $tag_data[] = array(
                        'news_id' => $data['id'],
                        'tag_id' => $v,
                    );
                }
                model('NewsTag')->insertAll($tag_data);
                return show(1, '修改成功', $ret);
            }
        } else {
            $id = getParam('id');
            $info = model('News')->getNewsById($id);
            //var_dump($info);
            $tags = model('NewsTag')->getDataByNewsId($id);
            //[{"id":25,"news_id":37,"tag_id":4},{"id":24,"news_id":37,"tag_id":3}]
            $hasTagsIds = array();
            foreach ($tags as $k => $v) {
                array_push($hasTagsIds, $tags[$k]['tag_id']);
            }
            //print_r(json_encode($hasTagsIds));
            //[4,3]
            $content = model('NewsContent')->getDataByNewsId($id);
            return $this->fetch('', [
                'categorys' => $this->categorys,
                'allTags' => $this->allTags,
                'info' => $info,
                'hasTagsIds' => $hasTagsIds,
                'tagIds' => implode(',', $hasTagsIds),
                'content' => $content
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

    /**
     * 切换文章状态之“审核”
     * @return array|void
     */
    public function isshow()
    {
        $data = input('post.');
        $res = model('News')->updateById($data['id'], ['is_show' => $data['is_show']]);
        if ($res) {
            return show(1, "修改成功", $res);
        }
        return show(0, '修改失败');
    }

    /**
     * 切换文章状态之“置顶”
     * @return array|void
     */
    public function istop()
    {
        $data = input('post.');
        $res = model('News')->updateById($data['id'], ['is_top' => $data['is_top']]);
        if ($res) {
            return show(1, "修改成功", $res);
        }
        return show(0, '修改失败');
    }

    /**
     * 切换文章状态之“删除”
     * @return array|void
     */
    public function delete()
    {
        $data = input('post.');
        $res = model('News')->updateById($data['id'], ['status' => $data['status']]);
        if ($res) {
            return show(1, "删除成功", $res);
        }
        return show(0, '删除失败');
    }
}