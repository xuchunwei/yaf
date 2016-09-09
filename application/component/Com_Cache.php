<?php
/**
 * Created by PhpStorm.
 * User: xuchunwei
 * Date: 16/3/2
 * Time: 上午11:41
 */
class Com_Cache {

    public function __construct() {

    }

    public function test(){
        // code
        $config = Yaf_Application::app()->getConfig();
        $host = $config['redis_host'];
        $port = $config['redis_port'];
        $redis = new Redis();
        $redis->connect($host, $port);
        $redis->set('test', '这是个测试', 60);
        $result = $redis->get('test');
        return ['status' => 0, 'data' => $result];
    }
}
