<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/10/4
 * Time: 7:39
 */

<?
php
namespace app\common\validate;

class Bis extends \think\Validate
{
    protected $rule = [
        'name' => 'require|max:25',
        'email' => 'email',
        'logo' => 'require',
        'city_id' => 'require',
        'bank_info' => 'require',
        'bank_name' => 'require',
        'bank_user' => 'require',
        'faren' => 'require',
        'faren_tel' => 'require',
    ];

    // 场景设置
    protected $scene = [
        'add' => ['name', 'email', 'logo', 'city_id', 'bank_info', 'bank_name', 'bank_user', 'faren', 'faren_tel'],
    ];
}