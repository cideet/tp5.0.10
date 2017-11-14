<?php
/**
 * Created by PhpStorm.
 * User: zhangsanfeng
 * Date: 2017/11/14 0014
 * Time: 19:03
 */
namespace vdouw;

class IAuth
{
    /**
     * 生成每次请求的sign
     * @param array $data
     * @return string
     */
    public static function setSign($data = [])
    {
        ksort($data);   //按字段排序
        $str1 = http_build_query($data);  //拼接字符串数据a=b&c=d
        $str2 = (new \vdouw\Aes())->encrypt($str1);
        return $str2;
    }

    public static function setPassword($data)
    {
        return md5($data . config('app.password_pre_halt'));
    }
}