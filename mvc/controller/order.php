<?php
namespace mvc\controller;

class order extends \phpsam\mvc\controller {
    
    function action_index() {
        $this->render('index',array('x'=>'y'));
    }
    
    function action_new() {
        $this->render('new');
    }
    
}

