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
    return md5($text . 'vdouw9geBB2');
}

//后台获取登录用户名
function getLoginUsername()
{
    return (isset($_SESSION['think']['adminUser']['username']) ? $_SESSION['think']['adminUser']['username'] : "");
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
    //for ($i = 0; $i < count($request); $i++) {
    //    if ($request[$i] == $a) {
    //        return $request[$i + 1];
    //    }
    //}
    //return '';
}

//href="<{:url('category/edit', ['id'=>$v.id,'id444'=>444])}>">修改</a>
//Array ( [0] => 1 [1] => 444 )
function getParams()
{
    $request = \think\Request::instance()->param();
    return $request;
}



