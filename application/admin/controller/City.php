<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/10/6
 * Time: 2:32
 */

namespace app\admin\controller;

class City extends \app\admin\controller\Basecontroller
{
    private $obj;

    public function __construct()
    {
        parent::__construct();
        $this->obj = model('City');
        $order = ['listorder' => 'asc', 'id' => 'asc',];
        $this->citys = $this->obj->getCitys();
        $this->firstCity = $this->obj->getNormalFirstCity();
        //dump($this->citys);
    }

    //分类的列表页
    public function index()
    {
        return $this->fetch('', [
            'citys' => $this->citys
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
            $cateID = $this->obj->add($data);
            if ($cateID) {
                return show(1, "添加成功", $cateID);
            }
            return show(0, '添加失败', $cateID);
        } else {
            return $this->fetch('', [
                'firstCity' => $this->firstCity
            ]);
        }
    }

    //编辑分类
    public function edit()
    {
        if (request()->isPost()) {
            $data = input('post.');
            $res = $this->obj->save($data, ['id' => intval($data['id'])]);
            if ($res) {
                return show(1, "更新成功");
            } else {
                return show(0, "更新失败");
            }
        } else {
            $id = getParam('id');
            $thisCity = $this->obj->find($id);
            return $this->fetch('', [
                'firstCity' => $this->firstCity,
                'thisCity' => $thisCity
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
            $cityID = $this->obj->add($data);
            if ($cityID) {
                return show(1, "操作成功", $cityID);
            }
            return show(0, '操作失败', $cityID);
        } else {
            $id = getParam('id');
            return $this->fetch('', [
                'id' => $id,
                'firstCity' => $this->firstCity
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

