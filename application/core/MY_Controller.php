<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    //Render Page
    public function render_page($page = NULL, $data = array()){
        
        $this->load->view('templates/header',$data);
		$this->load->view('templates/header_menu',$data);
		$this->load->view('templates/sidebar_menu',$data);
		$this->load->view($page, $data);
		$this->load->view('templates/footer',$data);
    }

}