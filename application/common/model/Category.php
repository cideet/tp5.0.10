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
    public function add($data)
    {
        $data['status'] = 1;
        $data['create_time'] = time();
        return $this->save($data);
    }
}