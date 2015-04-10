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
    
    function move_order($id,$new_department) {
        $data_chain=[
            'date'          => Date('Y-m-d H:i:s'),
            'order_id'      => $id,
            'department_id'  => $new_department,
            'status'        => 'active'
        ];
        $new_orderchain=$this->medoo->insert('orderchain',$data_chain);
        $data=['last_department'=>$new_department];
        $x=$this->update($id, $data);
        return $x;
    }
    
    function get_list_order($status='active') {
        $x=$this->medoo->select('order',
                ["[>]department" => ["last_department" => "id"]],
                [
                    'order.id',
                    'order.name',
                    'order.description',
                    'order.last_department',
                    'department.name(department_name)'
                ],
                ['order.status'=>'active']);
        return $x;
    }
    
    function get_detail_order($id=0) {
        $x=$this->medoo->select('order',
                ["[>]department" => ["last_department" => "id"]],
                [
                    'order.id',
                    'order.name',
                    'order.description',
                    'order.last_department',
                    'department.name(department_name)'
                ],
                ['order.id'=>$id]);
        if(!$x) $x=[];
        else $x=$x[0];
        return $x;
    }
    
    function get_history_department($id) {
        $x=$this->medoo->select(
                'orderchain',
                ["[>]department" => ["department_id" => "id"]],
                [
                    'orderchain.id',
                    'orderchain.date',
                    'orderchain.status',
                    'department.name(department_name)'
                ],
                ['orderchain.order_id'=>$id]
        );
        if(!$x) $x=[];
        return $x;
    }
    
    function update($id,$data) {
        $x=$this->medoo->update('order',$data,['id'=>$id]);
        return $x;
    }
    
}