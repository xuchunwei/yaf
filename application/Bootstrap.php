<?php

class Bootstrap extends Yaf_Bootstrap_Abstract{

    // Init config
    public function _initConfig() {
        $config = Yaf_Application::app()->getConfig();
        Yaf_Registry::set('config', $config);
    }

    // Load libaray, MySQL model, function
    public function _initCore() {
        define('TB_PREFIX',    'cpx_');  // 表前缀
        define('APP_NAME'   ,  'cpx');
        define('LIB_PATH',     APP_PATH.'/application/library');
        define('MODEL_PATH',   APP_PATH.'/application/models');
        define('FUNC_PATH',    APP_PATH.'/application/function');
        //define('ADMIN_PATH',   APP_PATH.'/application/modules/Shop');

        // CSS, JS, IMG PATH
        define('CSS_PATH', '/css');
        define('JS_PATH',  '/js');
        define('IMG_PATH',  '/img');

        Yaf_Loader::import('M_Model.pdo.php');
        Yaf_Loader::import('Helper.class.php');

        Helper::import('Basic');
        Helper::import('Network');
        
        Yaf_Loader::import('C_Basic.php');
        Yaf_Loader::import(LIB_PATH.'/yar/Yar_Basic.php');

        // header.html and left.html
        //define('HEADER_HTML', APP_PATH.'/public/common/header.html');
        //define('LEFT_HTML',   APP_PATH.'/public/common/left.html');

        // API KEY for api sign
        define('API_KEY', 'THIS_is_OUR_API_keY');
    }

    // 这里我们添加三种路由，分别为 rewrite, rewrite_category, regex 顺序尝试路由
    // 用于 url rewrite 的讲解
    public function _initRoute() {
        $router = Yaf_Dispatcher::getInstance()->getRouter();

        // rewrite
        $route = new Yaf_Route_Rewrite(
            '/article/detail/:articleID',
            array(
                'controller' => 'article',
                'action'     => 'detail',
            )
        );

        $router->addRoute('rewrite', $route);

        // rewrite_category
        $route = new Yaf_Route_Rewrite(
            '/article/detail/:categoryID/:articleID',
            array(
                'controller' => 'article',
                'action'     => 'detail',
            )
        );

        $router->addRoute('rewrite_category', $route);

        // regex
        $route = new Yaf_Route_Regex(
            '#article/([0-9]+).html#',
            array('controller' => 'article', 'action' => 'detail'),
            array(1 => 'articleID')
        );

        $router->addRoute('regex', $route);
    }

    // 注册插件
    public function _initPlugin(Yaf_Dispatcher $dispatcher) {
        $router = new RouterPlugin();
        $dispatcher->registerPlugin($router);

        $admin = new AdminPlugin();
        $dispatcher->registerPlugin($admin);
        Yaf_Registry::set('adminPlugin', $admin);
    }

}
