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

    /**
     * 检验sign是否正常
     * @param $data
     * @return bool
     */
    public static function checkSignPass($data)
    {
        $str = (new \vdouw\Aes())->decrypt($data['sign']);
        if (empty($str)) {
            return false;
        }
        parse_str($str, $arr);  //把查询字符串解析到变量中//parse_str("name=Bill&age=60",$myArray);
        if (!is_array($arr) || empty($arr['did']) || $arr['did'] != $data['did']) {
            return false;
        }
        if (!config('app_debug')) {
            //过期时间判断
            if ((time() - ceil($arr['time'] / 1000)) > config('app.app_sign_time')) {
                return false;
            }
            //判断唯一性
            //1、文件（单服务器）
            //2、mysql
            //3、redis
            //再次测试的时候，删除缓存文件即可
            if (\think\Cache::get($data['sign'])) {
                return false;
            }
        }
        return true;
    }

    public static function setPassword($data)
    {
        return md5($data . config('app.password_pre_halt'));
    }

}