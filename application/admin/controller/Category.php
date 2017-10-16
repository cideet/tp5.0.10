<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/10/6
 * Time: 2:32
 */

namespace app\admin\controller;

class Category extends \app\admin\controller\Basecontroller
{
    private $obj;

    public function __construct()
    {
        parent::__construct();
        $this->obj = model('Category');
        $order = ['listorder' => 'asc', 'id' => 'asc',];
        $this->categorys = $this->obj->getCategorys();
        $this->firstCategory = $this->obj->getNormalFirstCategory();
        //dump($this->categorys);
    }

    //分类的列表页
    public function index()
    {
        return $this->fetch('', [
            'categorys' => $this->categorys
        ]);
    }

    //添加分类
    public function add()
    {
        $data = input('post.');
        if ($data) {
            $data['status'] = 1;
            //$data['create_time'] = time();
            //$data['update_time'] = time();
            $resId = $this->obj->add($data);
            if ($resId) {
                return show(1, "添加成功", $resId);
            }
            return show(0, '添加失败', $resId);
        } else {
            return $this->fetch('', [
                'categorys' => $this->categorys
            ]);
        }
    }

    //编辑分类
    public function edit()
    {
        if (request()->isPost()) {
            $data = input('post.');
            $id = $data['id'];
            $res = $this->obj->save($data, ['id' => intval($data['id'])]);
            if ($res) {
                return show(1, "更新成功");
            } else {
                return show(0, "更新失败");
            }
        } else {
            $id = getParam('id');
            $thiscate = $this->obj->find($id);
            return $this->fetch('', [
                'categorys' => $this->categorys,
                'thiscate' => $thiscate
            ]);
        }
    }

    //删除分类
    public function delete()
    {
        if (request()->isPost()) {
            $id = input('post.id');
            $data = array('status' => input('post.status'));
            $res = $this->obj->updateById($id, $data);
            if ($res) {
                return (show(1, "操作成功"));
            } else {
                return (show(0, "操作失败"));
            }
        }
    }

    //添加子分类
    public function addson()
    {
        $data = input('post.');
        if ($data) {
            $data['status'] = 1;
            $cateID = $this->obj->add($data);
            if ($cateID) {
                return show(1, "添加成功", $cateID);
            }
            return show(0, '添加失败', $cateID);
        } else {
            $id = getParam('id');
            return $this->fetch('', [
                'id' => $id,
                'categorys' => $this->categorys
            ]);
        }
    }

    // 排序逻辑
    public function listorder()
    {
        $id = input('post.id');
        $listorder = input('post.listorder');
        $res = $this->obj->save(['listorder' => $listorder], ['id' => $id]);
        if ($res) {
            return (show(1, "操作成功", $res));
        } else {
            return (show(0, "操作失败"));
        }
    }

}
