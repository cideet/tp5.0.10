<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/11/15
 * Time: 19:55
 */
namespace app\api\controller\v1;

class Testcategory extends \app\api\controller\Common
{
    /**
     * 通过接口的方式，获取分类
     * @return array
     */
    public function read()
    {
        $categorys = model('Category')->getCategorys();
        $array = [
            ['id' => 0, 'catename' => '首页=>version:1', 'parent_id' => 0],
            ['id' => 1999, 'catename' => '测试接口版本控制=>version:1', 'parent_id' => 0]
        ];
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