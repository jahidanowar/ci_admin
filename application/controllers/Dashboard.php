<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller{
    function __construct(){
        parent::__construct();
        
        $this->not_logged_in();
        $this->load->model('dashboard_model', 'd_model');
    }

    function index(){
        $page = 'dashboard';
        $data['title'] = 'Dashboard';
        $this->render_page($page,$data);
    }
}