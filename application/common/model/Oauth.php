<?php

/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/10/21
 * Time: 8:29
 */
namespace app\common\model;
class Oauth extends \app\common\model\Basemodel
{
    public function add($data = array())
    {
        if (!$data || !is_array($data)) return 0;
        //return $this->save($data);
        $this->allowField(true)->save($data);   //返回新增数据的ID
        return $this->id;
    }
}