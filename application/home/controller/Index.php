<?php
namespace app\home\controller;

class Index extends \app\home\controller\Basecontroller
{
    public $memberUsername;

    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        $this->memberUsername = $this->memberUname;
    }

    /**
     * 网站首页
     * @return mixed
     */
    public function index()
    {
        return $this->fetch('', [
            'memberUsername' => $this->memberUsername
        ]);
    }


}
