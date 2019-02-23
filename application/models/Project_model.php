<?php

class Project_model extends CI_Model{

    public function add($data=array()){
        if(!empty($data)){
            return $this->db->insert('project',$data);
        }
    }
}