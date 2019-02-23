<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model('auth_model');
        $this->logged_in();
    }

    function index(){
        //Render Login Page
        $data['title'] = 'Login';

        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
        if($this->form_validation->run() == FALSE){
            $this->load->view('login',$data);
        }
        else{
            $this->login();
        }
    }

    private function login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $check_email = $this->auth_model->check_email($email);
        if($check_email == FALSE){
            $this->session->set_flashdata('err', 'Admin not Exists!');
            redirect('auth');
        }
        else{
            $login_check = $this->auth_model->login_check($email,$password);

            if($login_check == TRUE){

                //Store User Data in Session
                $login_ses = array(
                    'id'  => $login['id'],
                    'email' => $login['email'],
                    'group' => $login['admin_group'],
                    'logged_in' => TRUE
                );

                $this->session->set_userdata('logged_in', $login_ses);
                redirect('dashboard');
            }
            else{
                $this->session->set_flashdata('err', 'Email or Passwor is Wrong');
                redirect('auth');
            }
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('auth');
    }


}