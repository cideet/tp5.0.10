<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/11/15
 * Time: 19:55
 */
namespace app\api\controller;

class Testcategory extends Common
{
    /**
     * 通过接口的方式，获取分类
     * @return array
     */
    public function read()
    {
        $categorys = model('Category')->getCategorys();
        $array[] = [
            'id' => 0,
            'catename' => '首页',
            'parent_id' => 0
        ];
        $headers = request()->header();
        //halt($headers);
        if ($headers['version'] == 2) {
            $array[] = [
                'id' => 1999,
                'catename' => '测试接口版本控制=>version:2',
                'parent_id' => 0
            ];
        }
        foreach ($categorys as $id => $catename) {
            $array[] = [
                'id' => $id,
                'catename' => $catename['name'],
                'parent_id' => $catename['parent_id']
            ];
        }
        return showApi(1, 'OK', $array, 200);
    }
}