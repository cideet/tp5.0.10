<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

function show($status, $message, $data = array())
{
    $result = array(
        "status" => $status,
        "message" => $message,
        "data" => $data
    );
    exit(json_encode($result));
}

//MD5加密
function getVdouwMD5($text)
{
    return md5($text . config('extra_code'));
}

//一个扯犊子的JS方法
function consolelog($a)
{
    exit('<script>console.log(' . $a . ')</script>');
}

/**
 * 获取地址传递的param参数
 * 自己写的一个比较蛋疼的方法
 * href="/index.php/admin/category/edit/id/<{$v['id']}>/id444/444">修改</a>
 * Array ( [0] => id [1] => 1 [2] => id444 [3] => 444 )
 * @param $a string
 * @return string
 */
function getParam($a)
{
    $request = \think\Request::instance()->param();
    if (count($request) % 2 != 0) {
        return '';
    }
    $i = 0;
    $k = "";
    while ($i < count($request)) {
        if ($request[$i] == $a) {
            $k = $request[$i + 1];
            break;
        }
        $i++;
    }
    return $k;
}

/**
 * 没啥卵用
 * href="<{:url('category/edit', ['id'=>$v.id,'id444'=>444])}>">修改</a>
 * Array ( [0] => 1 [1] => 444 )
 * 此方法未使用，其链接形式为：index.php/admin/index/index/1/444
 * 获取参数的方法为（比如获取id）：$id=getParams[1]
 * @return mixed
 */
function getParams()
{
    $request = \think\Request::instance()->param();
    return $request;
}

/**
 * 通用化API接口数据输出
 * @param $status 业务状态码
 * @param $message 信息提示
 * @param $data 数据
 * @param $httpCode HTTP状态码
 * @return array
 */
function showApi($status, $message, $data = [], $httpCode = 200)
{
    $data = [
        'status' => $status,
        'message' => $message,
        'data' => $data
    ];
    return json($data, $httpCode);
}

/**
 * 获取当前时间的13位时间戳
 * @return string
 */
function get13Timestamp()
{
    list($t1, $t2) = explode(' ', microtime());
    return $t2 . ceil($t1 * 1000);
}

/**
 * 万能字符串截取函数
 * 这个方法，有问题，不能去除网页标签
 * @param $string
 * @param $sublen
 * @param int $start
 * @param string $charset
 * @return string
 */
function cut_str($string, $sublen, $start = 0, $charset = 'UTF-8')
{
    if ($charset == 'UTF-8') {
        $pa = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
        preg_match_all($pa, $string, $t_string);
        if (count($t_string[0]) - $start > $sublen) return join('', array_slice($t_string[0], $start, $sublen)) . "...";
        return join('', array_slice($t_string[0], $start, $sublen));
    } else {
        $start = $start * 2;
        $sublen = $sublen * 2;
        $strlen = strlen($string);
        $tmpstr = '';
        for ($i = 0; $i < $strlen; $i++) {
            if ($i >= $start && $i < ($start + $sublen)) {
                if (ord(substr($string, $i, 1)) > 129) {
                    $tmpstr .= substr($string, $i, 2);
                } else {
                    $tmpstr .= substr($string, $i, 1);
                }
            }
            if (ord(substr($string, $i, 1)) > 129) $i++;
        }
        if (strlen($tmpstr) < $strlen) $tmpstr .= "...";
        return $tmpstr;
    }
}



