<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/10/1
 * Time: 22:36
 */

namespace app\common\model;

class Category extends \think\Model
{
    //TP5技巧，把create_time和update_time都更新了
    protected $autoWriteTimestamp = true;

    //插入新的生活服务分类
    public function add($data)
    {
        $data['status'] = 1;
        //$data['create_time'] = time();
        return $this->save($data);
    }

    //获取一级分类
    public function getNormalFirstCategory()
    {
        $data = [
            'status' => 1,
            'parent_id' => 0,
        ];
        $order = ['id' => 'desc'];
        return $this->where($data)->order($order)->select();
    }

    //获取一级栏目
    public function getFirstCategorys($parentID = 0)
    {
        $data = [
            'parent_id' => $parentID,
            'status' => ['neq', -1]
        ];
        $order = ['id' => 'desc'];
        $result = $this->where($data)
            ->order($order)
            //->select();
            ->paginate(2);
        //echo $this->getLastSql(); //TP5提供的方法，用于打印出SQL语句
        return $result;
    }
}