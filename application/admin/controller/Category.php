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
        $this->categorys = model('Category')->getCategorys('all',true);
    }

    //分类 列表页
    public function index()
    {
        return $this->fetch('', [
            'categorys' => $this->categorys
        ]);
    }

    //分类 添加页
    public function add()
    {
        return $this->fetch();
    }

    //插入新分类
    public function insert($data = array())
    {
        print_r($data);
        if (!$data || !is_array($data)) return 0;
        model('Category')->add($data);
    }
}