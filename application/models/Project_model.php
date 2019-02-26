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
            $this->db->order_by('id', 'DESC');
            $query = $this->db->get('project');
            return $query->result_array();
        }
    }

    public function update($id,$data){
        if($id && $data){
            $this->db->where('id',$id);
            return $this->db->update('project',$data);
        }
    }

    public function delete($id){
        if($id){
            $this->db->where('id', $id);
            return $this->db->delete('project');
        }
    }

    //get Project Type
    public function get_project_type($id=NULL){
        if($id){
            $query  = $this->db->get_where('project_type', array('id'=>$id));
            return $query->row_array();
        }
        else{
            $query = $this->db->get('project_type');
            return $query->result_array();
        }
    }
    // Add Project Type
    public function add_type($data){
        return $this->db->insert('project_type',$data);
    }
    //Update Project Type
    public function update_project_type($id,$data){
        if($id && $data){
            $this->db->where('id',$id);
            return $this->db->update('project_type',$data);
        }
    }
    //delete Project type
    public function delete_project_type($id){
        if($id){
            $this->db->where('id',$id);
            return $this->db->delete('project_type');
        }
    }

    //get Project Status
    public function get_project_status($id=NULL){
        if($id){
            $query  = $this->db->get_where('project_status', array('id'=>$id));
            return $query->row_array();
        }
        else{
            $this->db->order_by('id','DESC');
            $query = $this->db->get('project_status');
            return $query->result_array();
        }
    }
    // Add Project Status
    public function add_status($data=NULL){
        return $this->db->insert('project_status',$data);
    }


}