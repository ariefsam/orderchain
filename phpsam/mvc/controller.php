<?php
namespace phpsam\mvc;
class controller {
    function before_action() {
        
    }
    
    function action($action_name=null,$action_params=null) {
        if($action_name==null) $action_name='index';
        $this->before_action();
        call_user_func_array(array($this, 'action_' . $action_name), $action_params);
        $this->after_action();
    }
    
    function after_action() {
        
    }
}