<?php
namespace phpsam\route;

class route {
    
    function __construct($server=null) {
        if($server==null) {
            $server=$_SERVER;
        }
        print_r($server);
        $base_url=$server['HTTP_HOST'].dirname($server['SCRIPT_NAME']);
        \phpsam::$base_url=$base_url;
        
        $controller=new \mvc\controller\home();
        $controller->action('index',array());
    }
    
    
    function call_controller() {
        
    }
    
}
