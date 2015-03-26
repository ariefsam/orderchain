<?php
namespace mvc\model;

class order extends \phpsam\mvc\medooModel {
    
    function new_order($data){
        $new_order=$this->medoo->insert('order',$data);
        $data_chain=[
            'date'          => Date('Y-m-d H:i:s'),
            'order_id'      => $new_order,
            'department_id'  => $data['last_department'],
            'status'        => 'active'
        ];
        $new_orderchain=$this->medoo->insert('orderchain',$data_chain);
        return [$new_order,$new_orderchain];
    }
    
    function get_list_order($status='active') {
        $x=$this->medoo->select('order',
                ["[>]department" => ["last_department" => "id"]],
                [
                    'order.id',
                    'order.name',
                    'order.description',
                    'department.name(department_name)'
                ],
                ['order.status'=>'active']);
        return $x;
    }
    
}