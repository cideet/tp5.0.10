<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/11/12
 * Time: 15:13
 */

namespace app\api\controller;

class Test extends \app\api\controller\Common
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
        //return [
        //    'status' => 1,
        //    'message' => 'OK',
        //    'data' => input('post.')
        //];
        //在postman中可以看出，输出的状态码是200，但是我们需要输出的是201

        //$data = [
        //    'status' => 1,
        //    'message' => 'OK',
        //    'data' => input('post.')
        //];
        //return json($data, 201);
        //post方式 save方法中的状态码从200，就改成201了

        //return showApi(1, 'OK', input('post.'), 201);
        //封装通用化API接口数据输出

        //model('sdfsdg'); //接口报错

        //try {
        //    model('sdfsg');
        //} catch (\Exception $e) {
        //    return showApi(0, $e->getMessage(),'this have error', 400);
        //}
        //当然，我们可以这么处理
        //但是这，并不能处理更多的一些不可预支的程序错误

        //$data = input('post.');
        //if($data['mt']!=1){
        //    exception('您提交的数据不合法');
        //}
        //返回的状态码是500，这明显不是我们想要的值
        
        $data = input('post.');
        if ($data['mt'] != 1) {
            //exception("input('post.mt')!=1");    //错误码:500
            throw new \vdouw\exception\ApiException("input('post.mt')!=1", 403);
        }
        return showApi(1, 'OK', input('post.'), 201);
    }
}