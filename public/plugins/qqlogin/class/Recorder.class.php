<?php
/* PHP SDK
 * @version 2.0.0
 * @author connect@qq.com
 * @copyright © 2013, Tencent Corporation. All rights reserved.
 */

require_once(QQ_CONNECT_SDK_CLASS_PATH . "ErrorCase.class.php");

class Recorder
{
    private static $data;
    private $inc;
    private $error;

    public function __construct()
    {
        $this->error = new ErrorCase();

        //-------读取配置文件
        //$incFileContents = '{"appid":"101439632","appkey":"2258276bc846bcbbda4df3432c8759eb","callback":"http://127.0.0.65/oauth.php","scope":"get_user_info","errorReport":true,"storageType":"file","host":"localhost","user":"root","password":"root","database":"test"}';
        //$this->inc = json_decode($incFileContents);
        $this->inc = new stdClass();
        $this->inc->appid = '101439632';
        $this->inc->appkey = '2258276bc846bcbbda4df3432c8759eb';
        $this->inc->callback = 'http://blog.vdouw.com/plugins/qqlogin/callback.php';
        $this->inc->scope = 'get_user_info';
        $this->inc->errorReport = true;
        $this->inc->storageType = 'file';

        if (empty($this->inc)) {
            $this->error->showError("20001");
        }
        if (empty($_SESSION['QC_userData'])) {
            self::$data = array();
        } else {
            self::$data = $_SESSION['QC_userData'];
        }
    }

    public function write($name, $value)
    {
        self::$data[$name] = $value;
    }

    public function read($name)
    {
        if (empty(self::$data[$name])) {
            return null;
        } else {
            return self::$data[$name];
        }
    }

    public function readInc($name)
    {
        if (empty($this->inc->$name)) {
            return null;
        } else {
            return $this->inc->$name;
        }
    }

    public function delete($name)
    {
        unset(self::$data[$name]);
    }

    function __destruct()
    {
        $_SESSION['QC_userData'] = self::$data;
    }
}
