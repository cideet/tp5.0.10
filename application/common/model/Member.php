<?php

/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/10/21
 * Time: 8:29
 */

namespace app\common\model;

class Member extends \app\common\model\Basemodel
{
    /**
     * 检测用户名是否唯一
     * @param $username
     * @return array|false|\PDOStatement|string|\think\Model
     */
    public function getMemberuserByUsername($username)
    {
        $where = ['username' => $username];
        $ret = $this->where($where)->find();
        return $ret;
    }

    /**
     * 检测邮箱是否唯一
     * @param $email
     * @return array|false|\PDOStatement|string|\think\Model
     */
    public function getMemberuserByEmail($email)
    {
        $where = ['email' => $email];
        $ret = $this->where($where)->find();
        return $ret;
    }
}