<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/11/12
 * Time: 15:13
 */

namespace app\api\controller;

class Test extends \think\Controller
{
    /**
     * 对应postman中的get方式
     * 请求地址是http://127.0.0.65/test
     * @return array
     */
    public function index()
    {
        return [
            '1234', '4567777'
        ];
    }

    /**
     * 对应postman中的put方式
     * 请求地址是http://127.0.0.65/test/1233
     * @param int $id
     */
    public function update($id = 0)
    {
        echo($id);
        halt(input('put.'));
    }

    /**
     * 对应postman中的delete方式
     * 请求地址是http://127.0.0.65/test/1233
     * @param int $id
     */
    public function delete($id = 0)
    {
        echo($id);
    }

    /**
     * 对应postman中的post方式
     * 请求地址是http://127.0.0.65/test
     * @return array
     */
    public function save()
    {
        return [
            'status' => 1,
            'message' => 'OK',
            'data' => input('post.')
        ];
    }
}