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

    //get Project Type
    public function get_project_type($id){
        if($id){
            $query  = $this->db->get_where('project_type', array('id'=>$id));
            return $query->row_array();
        }
    }

    //get Project Status
    public function get_project_status($id){
        if($id){
            $query  = $this->db->get_where('project_status', array('id'=>$id));
            return $query->row_array();
        }
    }

}