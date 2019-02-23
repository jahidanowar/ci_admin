<?php

class Project extends MY_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('project_model');
    }

    function index(){
        $page = 'project_index';
        $data['title'] = 'Projects';

        $this->render_page($page,$data);
    }

    public function add(){
        $page = 'project_add';
        $data['title'] = 'Add Projects';

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('project_type', 'Project Type', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        if($this->form_validation->run() == FALSE){
            $this->render_page($page,$data);
        }
        else{

            $result = $this->project_model->add($data);
            if($result == TRUE){
                $this->session->set_flashdata('suc', 'Project Added !');
                redirect('project/add');
            }
            else{
                $this->session->set_flashdata('err', 'Something Went Wrong Try Again.');
                redirect('project/add');
            }
        }
    }

    public function edit($id){
        
    }
}