<?php

namespace mvc\controller;

class order extends \phpsam\mvc\controller {
    
    function action_index() {
        $order = new \mvc\model\order();
        $list_order=$order->get_list_order();
        $data = [
            'items'=>$list_order,
            'title'=>'Daftar Order'
        ];
        $this->render('index',$data);
    }
    
    function action_new() {
        $department = new \mvc\model\department();
        $order = new \mvc\model\order();
        if($this->input_post()) {
            $data_insert = [
                'date'  => Date('Y-m-d H:i:s'),
                'name'  => $this->input_post('name'),
                'description'   => $this->input_post('description'),
                'last_department'    => $this->input_post('department'),
                'status'    => 'active'
            ];
            //insert into table order
            $status=$order->new_order($data_insert);
            if($status[0]!=false && $status[1]!=false) {
                $this->set_flash('order_success', "Order telah masuk database, <a href='".$this->url('order/detail/'.$status[0])."'>Order id: $status[0]</a>");
            }
        }
        
        
        $data=$department->get_list_department();
        $view_data=[
            'department'=>$data,
            'title'     => 'Order Baru'
        ];
        $this->render('new',$view_data);
    }
    
    function action_detail() {
        $this->render('detail');
    }
    
    
}

