<?php
namespace mvc\controller;

class department extends \phpsam\mvc\controller {
    
    function action_index() {
        $department = new \mvc\model\department();
        $department_list = $department->get_list_department(['relevant_department'=>true]);
        $data=[
            'items'=>$department_list,
        ];
        $this->render('index',$data);
    }
    
    function action_detail() {
        $id=intval(@$this->params[2]);
        $department = new \mvc\model\department();
        $department_list = $department->get_list_department();
        $item=$department->get($id);
        $data=['item'=>$item,'items'=>$department_list];
        $this->render('detail',$data);
    }
    
    function action_edit() {
        $id=intval(@$this->params[2]);
        $department = new \mvc\model\department();
        $data = [
            'name'=>$this->input_post('name'),
            'description'=>$this->input_post['description'],
            'custom_value'=>json_encode(['relevant_department'=>$this->input_post['relevant_department']])
        ];
        
        $x=$department->update($id, $data);
        if($x) $this->set_flash ('department_success', "Sukses Update Data");
        $this->redirect('department', 'detail',$id);
    }
    
}

