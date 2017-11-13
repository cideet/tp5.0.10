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

    public $httpCodeErrorNum = 500;

    public function render(\Exception $e)
    {
        if ($e instanceof ApiException) {
            $this->httpCode = $e->httpCode;
        }
        return showApi(0, $e->getMessage(), [], $this->httpCodeErrorNum);
    }
}