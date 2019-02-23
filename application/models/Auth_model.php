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

    public function login_check($username,$password){
       
        if($username && $password){

            $sql = "SELECT * FROM admin WHERE email = ?";
            $query = $this->db->query($sql, array($username));
            $row = $query->row_array();
            
            $hash_password = password_verify($password,$row['password']);
            
            if($hash_password == TRUE){
                return $row;
            }else{
                return FALSE;
            }
        }

        return FALSE;
    }

}