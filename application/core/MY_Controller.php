<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {


    //login check
    public function logged_in()
	{
        if(isset($this->session->userdata['logged_in'])){
            redirect("dashboard");
        }
	}

	public function not_logged_in()
	{
		if(!isset($this->session->userdata['logged_in'])){
            redirect('auth');
        }
    }
    
    //Render Page
    public function render_page($page = NULL, $data = array()){
        
        $this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar_menu',$data);
		$this->load->view('templates/header_menu',$data);
		$this->load->view($page, $data);
		$this->load->view('templates/footer',$data);
    }

}