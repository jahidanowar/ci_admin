<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setup extends MY_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('project_model');
    }

    function index(){
        
        $result = $this->project_model->get();
        header('Content-Type: application/json');
        echo json_encode($result);
    }
    public function string(){
        echo "My First App With API";
    }
    public function serach($string){
        $result = $this->project_model->search_project($string);
        header('Content-Type: application/json');
        echo json_encode($result);
    }
    

}
