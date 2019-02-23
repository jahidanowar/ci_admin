<?php

class Project extends MY_Controller{

    function __construct(){
        parent::__construct();
        $this->not_logged_in();
        $this->load->model('project_model');
    }

    function index(){
        $page = 'project_index';
        $data['title'] = 'Projects';
        $data['projects'] = $this->project_model->get();
        $this->render_page($page,$data);
    }

    public function add(){
        $page = 'project_add';
        $data['title'] = 'Add Projects';

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('project_type', 'Project Type', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        if($this->form_validation->run() == FALSE){
            $this->render_page($page,$data);
        }
        else{
            //Convert User Arry To String and Separete by Comma
            $user_arr = array_unique($this->input->post('user'));
            $team = implode(', ', $user_arr);
            $date = date();

            $data = array(
                'project_types_id' => $this->input->post('project_type'),
                'project_status_id' => $this->input->post('status'),
                'created_at' => $date,
                'name' => $this->input->post('name'),
                'live_url' => $this->input->post('live_url'),
                'test_url' => $this->input->post('test_url'),
                'dead_line' => $this->input->post('dead_line'),
                'description' => $this->input->post('description'),
                'file_url' => $this->input->post('file_url'),
                'team' => $team
            );
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