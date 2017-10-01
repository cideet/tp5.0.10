<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/10/1
 * Time: 19:00
 */

namespace app\admin\controller;
class Category extends \think\Controller
{
//    private $obj;
//
//    public function _initialize()
//    {
//        $this->obj = model('Category');
//    }

    //生活服务分类 首页
    public function index()
    {
        $parentID = input('get.parent_id', 0, 'intval');
        $categorys = model('Category')->getFirstCategorys($parentID);
        //print_r($categorys);
        return $this->fetch('', [
            'categorys' => $categorys
        ]);
    }

    //生活服务分类 添加分类（点击按钮进入页面）
    public function add()
    {
        //获取一级分类
        $categorys = model('Category')->getNormalFirstCategory();
        //$categorys = $this->obj->getNormalFirstCategory();
        //print_r($categorys);
        return $this->fetch('', [
            'categorys' => $categorys
        ]);
    }

    //生活服务分类 添加分类（保存到数据库）
    public function save()
    {
        //print_r($_POST); //第一种获取数据的方式
        print_r(input('post.')); //第二种获取数据的方式
        //print_r(request()->post()); //第三种获取数据的方式
        //建议使用后面两条，不要用PHP原生的
        if (!request()->isPost()) {
            $this->error('请求失败');
        }
        $data = input('post.');
        //$data['status'] = 10; //测试validate
        $validate = validate('Category');
        //if (!$validate->check($data)) { //tp5的validate
        if (!$validate->scene('add')->check($data)) { //验证的场景设置
            $this->error($validate->getError());
        }
        if (!empty($data['id'])) {
            return $this->update($data);
        }
        //把$data提交到model层
        $res = model('Category')->add($data);
        if ($res) {
            $this->success('新增成功');
        } else {
            $this->error('新增失败');
        }
    }

    //分类 编辑
//    public function edit(){
//        echo input('get.id'); //这样也能获取到传递过来的参数
//    }
    public function edit($id = 0)
    {
        if (intval($id) < 1) {
            $this->error('参数不合法');
        }
        $category = model('Category')->get($id);
        $categorys = model('Category')->getNormalFirstCategory();
        return $this->fetch('', [
            'categorys' => $categorys,
            'category' => $category
        ]);
    }

    //更新编辑
    public function update($data)
    {
        $res = model('Category')->save($data, ['id' => intval($data['id'])]); //更新的条件是id=$data['id']
        if ($res) {
            $this->success('更新成功');
        } else {
            $this->error('更新失败');
        }
    }
}
