<?php

class Project_model extends CI_Model{

    public function add($data=array()){
        if(!empty($data)){
            return $this->db->insert('project',$data);
        }
    }

    public function get($id=NULL){
        if($id){
            $query  = $this->db->get_where('project', array('id'=>$id));
            return $query->row_array();
        }
        else{
            $query = $this->db->get('project');
            return $query->result_array();
        }
    }
}