<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/10/21
 * Time: 17:12
 */

namespace app\index\controller;

class Register extends \think\Controller
{
    /**
     * 会员注册
     * @return array|mixed|void
     */
    public function index()
    {
        $data = input('post.');
        if ($data) {
            if (trim($data['rpassword']) != trim($data['password'])) return show(0, '密码不一致');
            if (model('Member')->checkUsernameOnly(trim($data['username']))) return show(0, '用户名不唯一');
            if (model('Member')->checkEmailOnly(trim($data['email']))) return show(0, ',邮件不唯一');
            $data['password'] = getVdouwMD5($data['password']);
            $resId = model('Member')->add($data);
            if ($resId) {
                return show(1, "添加成功", $resId);
            }
            return show(0, '添加失败', $resId);
        } else {
            return $this->fetch();
        }
    }
}