<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/10/5
 * Time: 23:39
 */

namespace app\common\model;

class Adminuser extends \think\Model
{
    public function getAdminuserByUsername($username = "")
    {
        $res = $this->where('username="' . $username . '"')->find();
        return $res;
    }
}