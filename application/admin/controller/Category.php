<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/10/6
 * Time: 2:32
 */

namespace app\admin\controller;

class Category extends \app\common\controller\Adminbasecontroller
{
    public function __construct()
    {
        parent::__construct();
        $this->categorys = model('Category')->getCategorys();
        $this->firstCategory = model('Category')->getNormalFirstCategory();
        //dump($this->categorys);
    }

    //分类 列表页
    public function index()
    {
        return $this->fetch('', [
            'categorys' => $this->categorys
        ]);
    }

    //分类 添加分类
    public function add()
    {
        $data = input('post.');
        if ($data) {
            $data['status'] = 1;
            $data['create_time'] = time();
            $data['update_time'] = time();
            $cateID = model("Category")->add($data);
            if ($cateID) {
                return show(1, "success", $cateID);
            }
            return show(0, 'error', $cateID);
        } else {
            return $this->fetch('', [
                'categorys' => $this->categorys
            ]);
        }
    }

    public function edit()
    {
        if (request()->isPost()) {
            echo(123);
        } else {
            $id = getParam('id');
            echo($id);
//            $thiscate = model('Category')->find($id);
//            //dump($thiscate);
//            return $this->fetch('', [
//                'firstCategory' => $this->firstCategory,
//                'thiscate' => $thiscate
//            ]);
        }
    }


}