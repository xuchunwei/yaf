<?php

date_default_timezone_set('Asia/Shanghai');
define('CUR_DATE', date('Y-m-d'));
define('CUR_TIMESTAMP', time());

define('ENV', strtoupper(ini_get('yaf.environ')));

switch(ENV) {
    case 'DEV':
        error_reporting(E_ALL ^E_NOTICE);
        ini_set('display_errors', 'on');

        $SERVER_DOMAIN = 'http://yaf.com';
        $STATIC_DOMAIN = '';
        $IMG_DOMAIN    = 'http://yaf.com';
    break;

    case 'TEST':
        error_reporting(E_ALL ^E_NOTICE);
        $logFile = APP_PATH.'/log/php/'.CUR_DATE.'.log';

        if(!file_exists($logFile)){
            touch($logFile);
        }

        ini_set('yaf.cache_config', 1);
        ini_set('display_errors', 'off');
        ini_set('log_errors', 'on');
        ini_set('error_log', $logFile);

        $SERVER_DOMAIN = 'http://yaf.com';
        $STATIC_DOMAIN = 'http://yaf.com';
        $IMG_DOMAIN    = 'http://yaf.com';
    break;

    case 'PRODUCT':
        error_reporting(E_ALL ^E_NOTICE);
        $logFile = APP_PATH.'/log/php/'.CUR_DATE.'.log';

        if(!file_exists($logFile)){
            touch($logFile);
        }

        ini_set('yaf.cache_config', 1);
        ini_set('display_errors', 'off');
        ini_set('log_errors', 'on');
        ini_set('error_log', $logFile);

        $SERVER_DOMAIN = 'http://yaf.com';
        $STATIC_DOMAIN = 'http://yaf.com';
        $IMG_DOMAIN    = 'http://yaf.com';
    break;
}

define('LOG_FILE', $logFile);

define('SERVER_DOMAIN', $SERVER_DOMAIN);
define('STATIC_DOMAIN', $STATIC_DOMAIN);
define('IMG_DOMAIN',    $IMG_DOMAIN);

//define('SITE_PROVINCE', 440000);
//define('SITE_CITY',     440100);
//define('SITE_REGION',   440106);

define('TMP_PATH', APP_PATH.'/tmp');
define('UPLOAD_PATH', APP_PATH.'/public/upload');