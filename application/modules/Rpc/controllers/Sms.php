<?php

class SmsController extends \Our\Controller\Rpc {

    // 入口方法
    public function indexAction() {

        $rpc =  new \Rd\Service\Rpc\Sms\Post\Server();
        $rpc->run();
    }

    // zoo 注册
    public function zooAction() {
        echo 123123;
    }


}
