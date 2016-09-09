<?php
define("APP_PATH",  realpath(dirname(__FILE__) . '/../')); /* 指向public的上一级 */
$app = new Yaf_Application(APP_PATH . "/conf/application.ini");
require APP_PATH.'/application/init.php';
$app->bootstrap()->run();