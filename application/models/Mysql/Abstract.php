<?php
namespace Mysql;

abstract class AbstractModel {

    protected $_link = NULL;

    public function begin() {
        $this->_link = \Our\Mysql::getInstance();
        return $this->_link->begin();
    }

    public function rollback() {
        $this->_link = \Ou\Mysql::getInstance();
        return $this->_link->rollback();
    }

    public function commit() {
        $this->_link = \Our\Mysql::getInstance();
        return $this->_link->commit();
    }

    public function insert($fileds = array()) {
        $this->_link = \Our\Mysql::getInstance();
        return $this->_link->add($this->_table_name, $fileds);
    }

    public function find() {
    }

    public function update() {
    }

    public function delete() {
    }


}
