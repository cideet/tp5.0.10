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
//            $resId = model('Tag')->add($data);
//            if ($resId) {
//                return show(1, "添加成功", $resId);
//            }
//            return show(0, '添加失败', $resId);
        } else {
            $allTags = model('Tag')->getAllTags();
            return $this->fetch('', [
                'categorys' => $this->categorys,
                'allTags' => $allTags
            ]);
        }
    }
}