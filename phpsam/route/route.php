<?php
namespace phpsam\route;

class route {
    
    function __construct($server=null) {
        if($server==null) {
            $server=$_SERVER;
        }
        $base_url=$server['HTTP_HOST'].dirname($server['SCRIPT_NAME']);
        \phpsam::$base_url=$base_url;
        $uri=  str_replace(dirname($server['SCRIPT_NAME']).'/', "", $server['REQUEST_URI']);
        
        $explode_url=  explode("/", $uri);
        if(!$controller_name=@$explode_url[0]) {
            $controller_name='home';
        }
        $controller_class="\\mvc\\controller\\" . $controller_name;
        $controller=new $controller_class();
        $controller->action('index',array());
    }
    
    
    function call_controller() {
        
    }
    
}
