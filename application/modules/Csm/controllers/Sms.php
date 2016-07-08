<?php

class SmsController extends \Our\Controller\Csm {

    // 入口方法
    public function postAction() {

        $hdl = new \Rd\Service\Hdl\Sms\Post();
        echo $hdl->consumer();
    }


}