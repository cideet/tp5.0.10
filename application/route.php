<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;

//return [
//    '__pattern__' => [
//        'name' => '\w+',
//    ],
//    '[hello]'     => [
//        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//        ':name' => ['index/hello', ['method' => 'post']],
//    ],
//
//];

//通过域名加test，就可以访问/index.php/api/test/index
Route::get('test', 'api/test/index');
//postman对应的是get方式，输入网址“http://127.0.0.65/test”查看效果

Route::put('test/:id', 'api/test/update');
//postman对应的是put方式，输入网址“http://127.0.0.65/test/12”查看效果，可以在body中添加参数

Route::post('test', 'api/test/save');

Route::delete('test/:id', 'api/test/delete');

//Route::resource('test', 'api/test');
//Route::resource('testresource','api/testresource');
//POST => '/index.php/api/testresource/save'
//GET  => '/index.php/api/testresource/index'

//indexx就可以打开首页，由于本程序事先未考虑这样去做路由，所以有一些问题
//Route::resource('indexx', 'home/index');

//获取服务器时间戳
Route::get('getservicetimestamp', 'api/getservicetimestamp/index');

//获取分类
Route::get('testgetallcategory', 'api/testcategory/read');


Route::get('testresource', 'api/testresource/index');
Route::post('testresource', 'api/testresource/save');


