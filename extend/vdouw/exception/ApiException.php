<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2017/11/13
 * Time: 7:57
 */

namespace vdouw\exception;

class ApiException extends \think\Exception
{
    public $message = '';
    public $httpCode = 500;
    public $code = 0;

    /**
     * ApiException constructor.
     * @param string $message
     * @param int $httpCode
     * @param int $code
     */
    public function __construct($message = '', $httpCode = 0, $code = 0)
    {
        $this->httpCode = $httpCode;
        $this->message = $message;
        $this->code = $code;
    }
}