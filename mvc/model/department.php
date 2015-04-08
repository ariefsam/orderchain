<?php
namespace mvc\model;

class department extends \phpsam\mvc\medooModel {
    
    function get_list_department($option=[]) {
        $data=$this->medoo->select('department','*',['status'=>'active','ORDER'=>'priority']);
        if(@$option['relevant_department']==true) {
            foreach($data as $value) {
                $temp[$value['id']]=$value['name'];
            }
            foreach($data as $key=>$value) {
                $custom=json_decode($value['custom_value'],true);
                $data[$key]['relevant_department_text']='';
                if(isset($custom['relevant_department'])) {
                    foreach($custom['relevant_department'] as $rel) {
                        $data[$key]['relevant_department_text'].=$temp[$rel].', ';
                    }
                    $data[$key]['relevant_department_text']=  substr($data[$key]['relevant_department_text'], 0,-2);
                }
            }
        } 
        return $data;
    }
    
    function get($id) {
        $data=$this->medoo->select('department','*',['id'=>$id]);
        if($data) {
            $custom=  json_decode($data[0]['custom_value'],true);
            if(isset($custom['relevant_department'])) {
                $data[0]['relevant_department']=$custom['relevant_department'];
            }
            else {
                $data[0]['relevant_department']=[];
            }
            return $data[0];
        }
        else return [];
    }
    
    function update($id,$data) {
        $x=$this->medoo->update('department',$data,['id'=>$id]);
        return $x;
    }
    
}