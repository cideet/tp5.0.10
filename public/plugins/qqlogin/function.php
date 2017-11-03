<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/3 0003
 * Time: 09:58
 */

/**
 * 调试输出函数
 * @param $val 调试输出源数据
 * @param bool $dump 是否启用var_dump
 * @param bool $exit 是否在调试结束后设置断点
 */
function debug($val, $dump = false, $exit = true)
{
    if ($dump) {
        $func = 'var_dump';
    } else {
        $func = (is_array($val) || is_object($val)) ? 'print_r' : 'printf';
    }
    header('Content-type:text/html;charset=utf-8');
    echo('<pre>debug output:<hr/>');
    $func($val);
    echo('</pre>');
    if ($exit) exit;
}