<?php
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
        return $this->fetch('', [
            'memberUsername' => $this->memberUsername,
            'allNews' => $allNews
        ]);
    }


}
