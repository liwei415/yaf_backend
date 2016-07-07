<?php
namespace Mysql;

use \Mysql\AbstractModel;

class MessageSmsSendLogModel extends AbstractModel {

    protected $_table_name = 'message_sms_send_log';

    public function add($fields = array()) {
        // 以下两种写法都可以
        return $this->insert($fields);
        return parent::insert($fields);
    }

    public function get() {
    }

    public function edt() {
    }

    public function del() {
    }


}
