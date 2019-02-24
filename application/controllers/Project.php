<?php

class Project extends MY_Controller{

    function __construct(){
        parent::__construct();
        $this->not_logged_in();
        $this->load->model('project_model');
    }

    function index(){
        $page = 'projects/project_index';
        $data['title'] = 'Projects';
        // $data['projects'] = $this->project_model->get();
        
        $this->render_page($page,$data);
    }

    public function  project_show(){
        $project_data = $this->project_model->get();
        $project_final_data = array();

        foreach ($project_data as $k => $v) {
            $project_type = $this->project_model->get_project_type($v['project_types_id']);
            $project_status = $this->project_model->get_project_status($v['project_status_id']);

            $project_final_data[$k] = $v;
            $project_final_data[$k]['project_type'] = $project_type;
            $project_final_data[$k]['project_status'] = $project_status;
            
            $result['data'][$k] = array(
                $v['id'],
                $v['name'],
                $v['created_at'],
                $project_type['name'],
                $project_status['name'],
                '<div class="btn-group">
                <button class="btn btn-xs btn-primary"><i class="far fa-eye"></i></button>
                <button class="btn btn-xs btn-warning" onclick="editFunc('.$v['id'].')" data-toggle="modal" data-target="#editProjectModal"><i class="far fa-edit"></i></button>
                <button class="btn btn-xs btn-danger delteProject" data-id="'.$v['id'].'"><i class="far fa-trash-alt"></i></button>
                </div>'
            );
        }
        // $data['projects'] = $project_final_data;
        
        echo json_encode($result);
    }
    public function add(){
        $page = 'projects/project_add';
        $data['title'] = 'Add Projects';
        $data['project_types'] = $this->project_model->get_project_type();
        $data['project_status'] = $this->project_model->get_project_status();

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('project_type', 'Project Type', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        if($this->form_validation->run() == FALSE){
            $this->render_page($page,$data);
        }
        else{
            //Convert User Arry To String and Separete by Comma
            $user_arr = array_unique($this->input->post('user'));
            $team = implode(',', $user_arr);

            $data = array(
                'project_types_id' => $this->input->post('project_type'),
                'project_status_id' => $this->input->post('status'),
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

    public function view($id){

        if($id){
           $data['project'] = $this->project_model->get($id);
           $this->load->view('ajax/project_view',$data);
        }
        
    }

    public function edit($id){
        if($id){
            $data['project_types'] = $this->project_model->get_project_type();
            $data['project_status'] = $this->project_model->get_project_status();

            $data['project'] = $this->project_model->get($id);
            $this->load->view('ajax/project_edit',$data);
        }
    }

    public function update(){
            $id = $this->input->post('id');
            $team = NULL;

            if(!empty($this->input->post('user'))){
                $user_arr = array_unique($this->input->post('user'));
                $team = implode(',', $user_arr);
            }
            

            $data = array(
                'project_types_id' => $this->input->post('project_type'),
                'project_status_id' => $this->input->post('status'),
                'name' => $this->input->post('name'),
                'live_url' => $this->input->post('live_url'),
                'test_url' => $this->input->post('test_url'),
                'dead_line' => $this->input->post('dead_line'),
                'description' => $this->input->post('description'),
                'file_url' => $this->input->post('file_url'),
                'team' => $team
            );

            $result = $this->project_model->update($id,$data);

            if($result == TRUE){
                $this->session->set_flashdata('suc', 'Project Type Updated !');
                redirect('project');
            }
            else{
                $this->session->set_flashdata('err', 'Something Went Wrong Try Again.');
                redirect('project');
            }
    }

    public function delete($id){

    }
    // Type and Status
    public function type(){
        $page = 'projects/project_type';
        $data['title'] = 'Manage Project Type';
        $data['project_types'] = $this->project_model->get_project_type();

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        if($this->form_validation->run() == FALSE){
            $this->render_page($page,$data);
        }
        else{
            $data = array(
                'name'=>$this->input->post('name')
            );
            $result = $this->project_model->add_type($data);
            if($result == TRUE){
                $this->session->set_flashdata('suc', 'Project Type Added !');
                redirect('project/type');
            }
            else{
                $this->session->set_flashdata('err', 'Something Went Wrong Try Again.');
                redirect('project/type');
            }
        }
    }

    //Status
    public function status(){
        $page = 'projects/project_status';
        $data['title'] = 'Manage Project Status';
        $data['project_status'] = $this->project_model->get_project_status();

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        if($this->form_validation->run() == FALSE){
            $this->render_page($page,$data);
        }
        else{
            $data = array(
                'name'=>$this->input->post('name')
            );
            $result = $this->project_model->add_status($data);
            if($result == TRUE){
                $this->session->set_flashdata('suc', 'Project status Added !');
                redirect('project/status');
            }
            else{
                $this->session->set_flashdata('err', 'Something Went Wrong Try Again.');
                redirect('project/status');
            }
        }
    }
}