<?php

namespace Our;

class Error {

    private static $codes = array('9999' => '调试专用',
                                  '1000' => 'method does not exist',
                                  '1001' => 'service does not exist',
                                  '1002' => '入参错误',
                                  '1003' => 'object is null',
                                  'user0003' => '入参method错误');

    public static function getErrorMsg($code) {
        return self::$codes[$code];
    }

}
