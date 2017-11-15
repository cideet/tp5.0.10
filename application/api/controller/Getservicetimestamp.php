<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/15 0015
 * Time: 11:02
 */
namespace app\api\controller;

class Getservicetimestamp extends \app\api\controller\Common
{
    /**
     * 获取服务器时间戳
     * @return array
     */
    public function index()
    {
        return showApi(1, 'OK', time());
    }
}