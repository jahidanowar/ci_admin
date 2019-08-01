<?php 

class Invoice_model extends CI_Model{
    public function get($id=NULL){
        if(!$id){
            $query = $this->db->get("invoice");
            return $query->result_array();
        }
    }
}