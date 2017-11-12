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
\think\Route::get('test', 'api/test/index');
//postman对应的是get方式，输入网址“http://127.0.0.65/test”查看效果

\think\Route::put('test/:id', 'api/test/update');
//postman对应的是put方式，输入网址“http://127.0.0.65/test/12”查看效果，可以在body中添加参数

\think\Route::delete('test/:id', 'api/test/delete');

//Route::resource('test', 'api/test');
//\think\Route::resource('testresource','api/testresource');
//POST => '/index.php/api/testresource/save'
//GET  => '/index.php/api/testresource/index'

