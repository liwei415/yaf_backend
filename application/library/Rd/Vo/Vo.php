<?php
namespace Rd\Vo;
/**
 * @desc: ValueObject抽象类，所以VO类必须继续该类
 * ==============================================
 * roadoor.com Lib
 * 版权所有 @2015 roadoor.com
 * ----------------------------------------------
 * 这不是一个自由软件，未经授权不许任何使用和传播。
 * ----------------------------------------------
 * 权限（全局限制访问）
 * ==============================================
 * @date: 2016年6月22日 下午5:06:19
 * @author:liufeilong<liufeilong@roadoor.com>
 * @version: 2.0.0.0
 */
abstract class Vo {

    protected $validate = array();
    protected $error = NULL;

    public function getError() {
        return $this->error;
    }
    /**
     * 验证
     * @param 参数类型 参数变量
     * @return
     * @date   : 2016年6月22日 下午5:08:31
     * @author : liufeilong <liufeilong@roadoor.com>
     * @vesion : 2.0.0.0
     */
    public function validate(){
        if(count($this->validate) > 0){
            foreach ($this->validate as $key => $value) {
                if ($value['required'] == TRUE && !isset($this->$key)) {
                    $this->error = $key . ' is not exists!';
                    return false;
                }

                if ($value['required'] == FALSE && !isset($this->$key)) {
                    continue;
                }

                if (isset($value['min']) && $value['min'] > strlen($this->$key)) {
                    $this->error = $key . ' length < ' . $value['min'];
                    return false;
                }

                if (isset($value['max']) && $value['max'] < strlen($this->$key)) {
                    $this->error = $key . ' length > ' . $value['max'];
                    return false;
                }
            }
        }else{
            $this->error = "validate is empty";
        }
        return true;
    }
}
