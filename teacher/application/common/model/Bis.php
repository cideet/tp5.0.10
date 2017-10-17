<?php
namespace app\common\model;

use think\Model;

class Bis extends BaseModel
{
    /**
     * 通过状态获取商家数据
     * @param $status
     */
    public function getBisByStatus($status=0) {
        $order = [
            'id' => 'desc',
        ];

        $data = [
            'status' => $status,
        ];
        $result = $this->where($data)
            ->order($order)
            ->paginate();
        return $result;
    }
}


[
{"id":57,
"title":"\u6807\u9898122222222222",
"author":"\u5f20\u4e09\u4e30",
"keywords":"\u5173\u952e\u8bcd",
"description":"\u63cf\u8ff0",
"is_show":1,
"status":1,
"is_top":0,
"is_original":1,
"click":0,
"addtime":1508223491,
"category_id":56,
"titleimg":"",
"tag":[{"news_id":57,"tag_id":4,"id":18},{"news_id":57,"tag_id":2,"id":17}]
},
{"id":56,"title":"\u6807\u9898123123","author":"\u5f20\u4e09\u4e30","keywords":"\u5173\u952e\u8bcd","description":"\u63cf\u8ff0","is_show":1,"status":1,"is_top":0,"is_original":1,"click":0,"addtime":1508210740,"category_id":45,"titleimg":"","tag":[]},{"id":55,"title":"\u6807\u9898111","author":"\u5f20\u4e09\u4e30111","keywords":"\u5173\u952e\u8bcd111","description":"\u63cf\u8ff0222","is_show":1,"status":1,"is_top":0,"is_original":1,"click":0,"addtime":1508209111,"category_id":44,"titleimg":"\/upload\\20171017\\7860ab2e945905639beef1d9b7727d7a.jpg","tag":[{"news_id":55,"tag_id":3,"id":14},{"news_id":55,"tag_id":4,"id":13}]}]

{"id":55,"title":"\u6807\u9898111","author":"\u5f20\u4e09\u4e30111","keywords":"\u5173\u952e\u8bcd111","description":"\u63cf\u8ff0222","is_show":1,"status":1,"is_top":0,"is_original":1,"click":0,"addtime":1508209111,"category_id":44,"titleimg":"\/upload\\20171017\\7860ab2e945905639beef1d9b7727d7a.jpg","tag":[3,4]}]