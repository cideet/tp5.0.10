<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/10/15
 * Time: 22:56
 */

namespace app\admin\controller;

class Tag extends \app\admin\controller\Basecontroller
{
    public function index()
    {
        $allTags = model('Tag')->getAllTags();
        return $this->fetch('', [
            'allTags' => $allTags
        ]);
    }

    //添加
    public function add()
    {
        $data = input('post.');
        if ($data) {
            //$data['status'] = 1;
            $resId = model('Tag')->add($data);
            if ($resId) {
                return show(1, "添加成功", $resId);
            }
            return show(0, '添加失败', $resId);
        } else {
            $allTags = model('Tag')->getAllTags();
            return $this->fetch('', [
                'allTags' => $allTags
            ]);
        }
    }

    //删除
    public function delete()
    {
        if (request()->isPost()) {
            $id = input('post.id');
            $data = array('status' => input('post.status'));
            $res = model('Tag')->updateById($id, $data);
            if ($res) {
                return (show(1, "操作成功"));
            } else {
                return (show(0, "操作失败"));
            }
        }
    }

}
