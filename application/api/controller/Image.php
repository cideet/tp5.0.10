<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/10/14
 * Time: 11:26
 */

namespace app\api\controller;

class Image extends \think\Controller
{
    public function upload()
    {
        $file = \think\Request::instance()->file('file');
        $info = $file->move('upload');
        if ($info) {
            return show(1, '上传成功', '/' . $info->getPathname());
        }
        return show(0, '上传失败');
    }

    public function imageUpload() {
        $res = \think\Request::instance()->file('file');

        if($res) {
            return '/' . $res['file']['savepath'] . $res['file']['savename'];
        }else{
            return false;
        }
    }
}