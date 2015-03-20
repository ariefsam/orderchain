<?php
namespace mvc\model;

class department extends \phpsam\mvc\medooModel {
    
    function get_list_department() {
        $data=$this->medoo->select('department','*');
        
        return $data;
    }
    
}