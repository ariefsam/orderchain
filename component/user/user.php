<?php
namespace component\user;

class user {
    
    function hook() {
        if(\phpsam::$controller_name!='user' && \phpsam::$controller_name!='login') {
            //\phpsam::redirect('user', 'login');
        }
    }
    
    function is_login() {
        if(isset($_SESSION['username'])) {
            return true;
        }
    }
    
    function is_has_access($controller,$action) {
        if(isset($_SESSION['username'])) {
            return true;
        }
    }
    
}

