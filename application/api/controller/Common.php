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
     * headers信息
     * 方便子类继承
     * @var string
     */
    public $headers = '';

    /**
     * 初始化方法
     */
    public function _initialize()
    {
        parent::_initialize();
        $this->checkRequestAuth();
        $this->testAes1();
        $this->testAes2();
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
        //基础参数校验
        if (empty($headers['sign'])) {
            throw new \vdouw\exception\ApiException('sign不存在', 400);
        }
        if (!in_array($headers['app_type'], config('app.apptypes'))) {
            throw new \vdouw\exception\ApiException('app_type不合法', 400);
        }
        if (!\vdouw\IAuth::checkSignPass($headers)) {
            throw new \vdouw\exception\ApiException('Sign授权码失败', 401);
        }
        \think\Cache::set($headers['sign'],1,config('app.app_sign_cache_time'));  //写入缓存
        $this->headers = $headers;
    }

    /**
     * 测试Aes加密
     * return '6dDiaoQrSC2tPepBYWGFhyPSjU+TIWdLmgvFB/FvGoMWWLDOJuDq+/wovs/BUXxU'
     */
    public function testAes1()
    {
        $str = 'id=1&ms=45&username=zhangsanfeng';
        $encry = (new \vdouw\Aes())->encrypt($str);
        echo('<br>----testAes1 start-----<br>');
        echo($encry);
        echo('<br>----testAes1 end-----<br>');
    }

    /**
     * 测试Aes解密
     * return 'id=1&ms=45&username=zhangsanfeng'
     */
    public function testAes2()
    {
        $str = '6dDiaoQrSC2tPepBYWGFhyPSjU+TIWdLmgvFB/FvGoMWWLDOJuDq+/wovs/BUXxU';
        $decry = (new \vdouw\Aes())->decrypt($str);
        echo('<br>----testAes2 start-----<br>');
        echo($decry);
        echo('<br>----testAes2 end-----<br>');
    }

    /**
     * 测试IAuth->setSign()
     * return 'Geo5T7xcjxkObRlfi8hQ2cPq8CZr/mHktjwNumtNgu0='
     */
    public function testIAuth1()
    {
        $data = [
            'did' => '123ddd',
            'version' => 1,
            'time' => get13Timestamp()
        ];
        echo('<br>----testIAuth1 start----<br>');
        echo \vdouw\IAuth::setSign($data);
        echo('<br>----testIAuth1 end----<br>');
        //exit;
    }

    /**
     * return 'did=123ddd&version=1'
     */
    public function testIAuth2()
    {
        //$str = 'Geo5T7xcjxkObRlfi8hQ2cPq8CZr/mHktjwNumtNgu0=';
        $str = 'JUH7jXhA7TjhvANBNIihq/+Ed2F4DgUyCrL0xA7VtO2/C+Y+3QpYyVQOcCFfVj6X';
        echo('<br>----testIAuth2 start----<br>');
        echo (new \vdouw\Aes())->decrypt($str);
        echo('<br>----testIAuth2 end----<br>');
    }


}