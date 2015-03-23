<?php
namespace mvc\controller;

class order extends \phpsam\mvc\controller {
    
    function action_index() {
        $this->render('index',array('x'=>'y'));
    }
    
    function action_new() {
        $department = new \mvc\model\department();
        print_r($this->input_post());
        $data_insert = array(
            'date'  => Date('Y-m-d H:i:s'),
            'name'  => $this->input_post('name'),
            'description'   => $this->input_post('description'),
            'last_department'    => $this->input_post('department')
        );
        //insert into table order
        $x=$department->medoo->insert('order',$data_insert);
        
        
        $data=$department->get_list_department();
        $view_data=array(
            'department'=>$data
        );
        $this->render('new',$view_data);
    }
    
    
}

