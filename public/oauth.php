<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/1 0001
 * Time: 17:06
 */

if ($_GET && $_GET['code']) {
    echo $_GET['code'];
} else {
    echo('123');
}
