<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/10/1
 * Time: 19:45
 */

namespace app\admin\validate;

class Category extends \think\Validate
{
    protected $rule = [
        ['name', 'require|max:20', '分类名必须传递|不能超过20个字符'],
        ['parent_id', 'number', '父ID必须是数字'],
        ['id', 'number'],
        ['status', 'number|in:-1,0,1', '状态必须是数字|状态范围不合法'],
        ['listorder', 'number']
    ];

    //场景设置
    protected $scene = [
        'add' => ['name', 'parent_id', 'id'],    //添加
        'listorder' => ['id', 'listorder'],    //排序

    ];
}