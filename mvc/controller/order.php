<?php
namespace mvc\controller;

class order extends \phpsam\mvc\controller {
    
    function action_index() {
        $this->render('index',array('x'=>'y'));
    }
    
    function action_new() {
        $order = new \mvc\model\department();
        
        $data=$order->get_list_department();
        $this->render('new');
    }
    
    
}

