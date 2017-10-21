<?php
namespace app\index\controller;

class Index extends \think\Controller
{
    public function index()
    {
        return $this->fetch();
    }

    /**
     * 注册
     */
    public function register()
    {
        $data = input('post.');
        if ($data) {
            //$data['status'] = 1;
            $data['password'] = getVdouwMD5($data['password']);
            $resId = model('Oauth')->add($data);
            if ($resId) {
                return show(1, "添加成功", $resId);
            }
            return show(0, '添加失败', $resId);
        } else {
            return $this->fetch();
        }
    }
}
