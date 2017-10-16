<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/10/15
 * Time: 22:56
 */

namespace app\admin\controller;

class News extends \app\admin\controller\Basecontroller
{
    private $obj;

    public function __construct()
    {
        parent::__construct();
        $this->obj = model('News');
        $order = ['listorder' => 'asc', 'id' => 'asc',];
        $this->categorys = model('Category')->getCategorys();
    }

    public function index()
    {
        return $this->fetch('', [
            'categorys' => $this->categorys
        ]);
    }

    public function add()
    {
        return $this->fetch('', [
            'categorys' => $this->categorys
        ]);
    }
}