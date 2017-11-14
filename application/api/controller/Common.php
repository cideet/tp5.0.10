<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/13 0013
 * Time: 16:43
 */

namespace app\api\controller;

/**
 * API模块的公共控制器
 * Class Common
 * @package app\api\controller
 */
class Common extends \think\Controller
{
    /**
     * 初始化方法
     */
    public function _initialize()
    {
        parent::_initialize();
        $this->checkRequestAuth();
        //$this->testAes1();
        //$this->testAes2();
        $this->testIAuth1();
        $this->testIAuth2();
    }

    /**
     * 检查每次APP请求的数据，是否合法
     */
    public function checkRequestAuth()
    {
        //首先需要获取headers里的数据
        $headers = request()->header();
        //echo('-----headers-----');
        //halt($headers);
    }

    /**
     * 测试Aes加密
     * return '6dDiaoQrSC2tPepBYWGFhyPSjU+TIWdLmgvFB/FvGoMWWLDOJuDq+/wovs/BUXxU'
     */
    public function testAes1()
    {
        $str = 'id=1&ms=45&username=zhangsanfeng';
        $encry = (new \vdouw\Aes())->encrypt($str);
        echo('----testAes1 start-----');
        echo($encry);
        echo('----testAes1 end-----');
    }

    /**
     * 测试Aes解密
     * return 'id=1&ms=45&username=zhangsanfeng'
     */
    public function testAes2()
    {
        $str = '6dDiaoQrSC2tPepBYWGFhyPSjU+TIWdLmgvFB/FvGoMWWLDOJuDq+/wovs/BUXxU';
        $decry = (new \vdouw\Aes())->decrypt($str);
        echo('----testAes2 start-----');
        echo($decry);
        echo('----testAes2 end-----');
    }

    /**
     * 测试IAuth->setSign()
     * return 'Geo5T7xcjxkObRlfi8hQ2cPq8CZr/mHktjwNumtNgu0='
     */
    public function testIAuth1()
    {
        $data = [
            'did' => '123ddd',
            'version' => 1
        ];
        echo \vdouw\IAuth::setSign($data);
        //exit;
    }

    /**
     * return 'did=123ddd&version=1'
     */
    public function testIAuth2(){
        $str = 'Geo5T7xcjxkObRlfi8hQ2cPq8CZr/mHktjwNumtNgu0=';
        echo('----testIAuth2 start----');
        echo (new \vdouw\Aes())->decrypt($str);
        echo('----testIAuth2 end----');
    }


}