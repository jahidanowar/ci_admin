<?php
class Auth_model extends CI_Model{

    //Get Values
    public function check_email($email){
        if($email){
            $query = $this->db->get_where('admin',array('email'=>$email,'status'=>1));
            if($query->num_rows() == 1){
                return TRUE;
            }
            return FALSE;
        }
    }
}