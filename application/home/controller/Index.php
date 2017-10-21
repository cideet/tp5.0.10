<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/10/21
 * Time: 22:40
 */

namespace app\home\controller;

class Index extends \app\home\controller\Basecontroller
{
    public $memberUsername;

    public function _initialize()
    {
        parent::_initialize();
        $this->memberUsername = $this->memberUname;
    }

    /**
     * 网站首页
     * @return mixed
     */
    public function index()
    {
        $allNews = model('News')->getAllDatas();
        //echo(json_encode($allNews));
        return $this->fetch('', [
            'memberUsername' => $this->memberUsername,
            'allNews' => $allNews
        ]);
    }

    /**
     * 文章 内容页
     * @return mixed
     */
    public function article()
    {
        $articleId = getParam('id');
        if (!!$articleId) {
            return $this->fetch('', [
                'memberUsername' => $this->memberUsername
            ]);
        } else {
            echo('你丫坑爹呀');
        }
    }

}
