<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/16 0016
 * Time: 10:33
 */

namespace app\common\model;

class NewsTag extends \app\common\model\Basemodel
{
    public function addData($news_id, $tag_ids)
    {
        foreach ($tag_ids as $k => $v) {
            $tag_data = array(
                'news_id' => $news_id,
                'tag_id' => $v,
            );
            return $this->add($tag_data);
        }
        return true;
    }
}
