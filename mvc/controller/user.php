<?php
namespace mvc\controller;
use mvc\model as mod;

class user extends \phpsam\mvc\controller {
    
    public $layout='full';
    
    function action_index() {
        $model_user= new mod\user();
        echo 'ini index user';
    }
    
    function action_login() {
        $model_user= new mod\user();
        
        $this->render('login',array('x'=>'y'));
    }
    
}

