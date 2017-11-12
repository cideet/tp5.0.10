<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/11/13
 * Time: 7:26
 */

namespace vdouw\exception;

class ApiHandleException extends \think\exception\Handle
{

    public $httpCodeError = 500;

    public function render(\Exception $e)
    {
        return showApi(0, $e->getMessage(), [], $this->httpCodeError);
    }
}