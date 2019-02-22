<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model('auth_model');
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
        $check_email = $this->auth_model->check_email($this->input->post('email'));
        if($check_email == FALSE){
            $this->session->set_flashdata('err', 'Admin not Exists!');
            redirect('auth');
        }
        else{
            $this->session->set_flashdata('suc', 'Admin Exists!');
            redirect('auth');
        }
    }


}