<?php
namespace Rd\Service\Rpc\Sms\Post;

require_once realpath(dirname(__FILE__)) . '/gen-php/rpc/sms/post/Post.php';
require_once realpath(dirname(__FILE__)) . '/gen-php/rpc/sms/post/Types.php';

class Handler implements \rpc\sms\post\PostIf {

    private function error_(\rpc\sms\post\Response $rst, $code, $data = null) {

        $rst->code = $code;
        $rst->msg = \Our\Error::getErrorMsg($code);
        $rst->data = null;

        if ($data) $rst->msg = $data;

        return $rst;
    }

    private function success_(\rpc\sms\post\Response $rst, $data = null) {

        $rst->code = 0;
        $rst->msg = 'success';
        $rst->data = $data;

        return $rst;
    }

    public function run(\rpc\sms\post\Request $request) {

        $rst = new \rpc\sms\post\Response();

        // vo
        $vo = new \Rd\Vo\In\Sms\Post($request->data);
        if (!is_object($vo)) {
            return $this->error_($rst, $vo);
        }
        if (!$vo->validate()) {
            return $this->error_($rst, 1002, $vo->getError());
        }

        $bz = new \Rd\Service\Hdl\Sms\Post($vo);

        return $this->success_($rst, $bz->producer());
    }


}
