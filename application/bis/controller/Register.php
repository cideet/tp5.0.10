<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/11 0011
 * Time: 17:23
 */

namespace app\bis\controller;

class Register extends \app\common\controller\Commoncontroller
{
    /**
     * 商家注册页面
     */
    public function index()
    {
        //一级省市
        $firstCitys = model('City')->getNormalFirstCity();
        $firstCategorys = model('Category')->getNormalFirstCategory();
        return $this->fetch('', [
            'firstCitys' => $firstCitys,
            'firstCategorys' => $firstCategorys
        ]);
    }

    /**
     * 商家注册
     */
    public function add()
    {
        if (!request()->isPost()) return show(0, '请填写注册信息');
        $data = input('post.');
        //判断用户是否存在
        $accountResult = model('BisAccount')->get(['username' => $data['username']]);
        if ($accountResult) return show(0, '该用户名已存在');
        //注册到商户基本信息表Bis
        $bisData = [
            'name' => $data['name'],
            'city_id' => $data['city_id'],
            'city_path' => empty($data['se_city_id']) ? $data['city_id'] : $data['city_id'] . ',' . $data['se_city_id'],
            //'logo' => $data['logo'],
            //'licence_logo' => $data['licence_logo'],
            'description' => empty($data['description']) ? '' : $data['description'],
            'bank_info' => $data['bank_info'],
            'bank_user' => $data['bank_user'],
            'bank_name' => $data['bank_name'],
            'faren' => $data['faren'],
            'faren_tel' => $data['faren_tel'],
            'email' => $data['email'],
        ];
        $bisId = model('Bis')->add($bisData);
        //注册到总店表BisLocation
        $data['cat'] = '';
        if (!empty($data['se_category_id'])) {
            $data['cat'] = implode('|', $data['se_category_id']);
        }
        $locationData = [
            'bis_id' => $bisId,
            'name' => $data['name'],
            //'logo' => $data['logo'],
            'tel' => $data['tel'],
            'contact' => $data['contact'],
            'category_id' => $data['category_id'],
            'category_path' => $data['category_id'] . ',' . $data['cat'],
            'city_id' => $data['city_id'],
            'city_path' => empty($data['se_city_id']) ? $data['city_id'] : $data['city_id'] . ',' . $data['se_city_id'],
            'api_address' => $data['address'],
            'open_time' => $data['open_time'],
            'content' => empty($data['content']) ? '' : $data['content'],
            'is_main' => 1,// 代表的是总店信息
            //'xpoint' => empty($lnglat['result']['location']['lng']) ? '' : $lnglat['result']['location']['lng'],
            //'ypoint' => empty($lnglat['result']['location']['lat']) ? '' : $lnglat['result']['location']['lat'],
        ];
        $locationId = model('BisLocation')->add($locationData);
        //注册到商户账号表BisAccount
        $accountData = [
            'bis_id' => $bisId,
            'username' => $data['username'],
            'password' => getVdouwMD5($data['password']),
            'is_main' => 1
        ];
        $accountId = model('BisAccount')->add($accountData);
        if ($accountId) {
            session('bis', $accountData, 'bis');
            return show(1, "商家注册成功", $accountId);
        }
        return show(0, '商家注册失败', $accountId);
    }

}