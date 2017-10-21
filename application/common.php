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
 * @param $a string
 * @return string
 */
//href="/index.php/admin/category/edit/id/<{$v['id']}>/id444/444">修改</a>
//Array ( [0] => id [1] => 1 [2] => id444 [3] => 444 )
function getParam($a)
{
    $request = \think\Request::instance()->param();
    if (count($request) % 2 != 0) return;
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

//href="<{:url('category/edit', ['id'=>$v.id,'id444'=>444])}>">修改</a>
//Array ( [0] => 1 [1] => 444 )
//此方法未使用，其链接形式为：index.php/admin/index/index/1/444
//获取参数的方法为（比如获取id）：$id=getParams[1]
function getParams()
{
    $request = \think\Request::instance()->param();
    return $request;
}



