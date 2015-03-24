<?php
namespace mvc\controller;

class order extends \phpsam\mvc\controller {
    
    function action_index() {
        $this->render('index',array('x'=>'y'));
    }
    
    function action_new() {
        $department = new \mvc\model\department();
        $order = new \mvc\model\order();
        if($this->input_post()) {
            $data_insert = [
                'date'  => Date('Y-m-d H:i:s'),
                'name'  => $this->input_post('name'),
                'description'   => $this->input_post('description'),
                'last_department'    => $this->input_post('department')
            ];
            //insert into table order
            $status=$order->new_order($data_insert);
            if($status[0]!=false && $status[1]!=false) {
                $this->set_flash('order_success', "Order telah masuk database, <a href='".$this->url('order/detail')."'Order id: ");
            }
        }
        
        
        $data=$department->get_list_department();
        $view_data=[
            'department'=>$data
        ];
        $this->render('new',$view_data);
    }
    
    
}

