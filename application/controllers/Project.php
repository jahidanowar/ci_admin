<?php

class Project extends MY_Controller{

    function __construct(){
        parent::__construct();
        $this->not_logged_in();
        $this->load->model('project_model');
    }

    //Project Home Page
    function index(){
        $page = 'projects/project_index';
        $data['title'] = 'Projects';
        // $data['projects'] = $this->project_model->get();
        $data['project_types'] = $this->project_model->get_project_type();
        $data['project_status'] = $this->project_model->get_project_status();

        $this->render_page($page,$data);
    }

    //Project Table
    public function  project_show(){
        $project_data = $this->project_model->get();
        $project_final_data = array();
        $i = 1;
        if(empty($project_data)){
            $result = array('data' => array());
        }
        foreach ($project_data as $k => $v) {
            $project_type = $this->project_model->get_project_type($v['project_types_id']);
            $project_status = $this->project_model->get_project_status($v['project_status_id']);

            $project_final_data[$k] = $v;
            $project_final_data[$k]['project_type'] = $project_type;
            $project_final_data[$k]['project_status'] = $project_status;
            $url =  site_url('project/view/'.$v['id']);

            $dt = new DateTime($v['created_at']);
            $newDate = $dt->format('d/m/Y');

            $result['data'][$k] = array(
                $i++,
                $v['name'],
                $newDate,
                $project_type['name'],
                $project_status['name'],
                '<div class="text-center"><div class="btn-group">
                <button class="btn btn-xs btn-primary" onclick="window.location.href=\''.$url.'\';"><i class="far fa-eye"></i></button>
                <button class="btn btn-xs btn-warning" onclick="editFunc('.$v['id'].')" data-toggle="modal" data-target="#editProjectModal"><i class="far fa-edit"></i></button>
                <button class="btn btn-xs btn-danger delteProject" data-id="'.$v['id'].'"><i class="far fa-trash-alt"></i></button>
                </div></div>'
            );
        }
        // $data['projects'] = $project_final_data;
        
        echo json_encode($result);
    }

    //Single Project View
    public function view($id){
        if($id){
            $data['title'] = 'Manage Project';
            $page = 'projects/project_single';
            $data['project']  = $this->project_model->get($id);

            $this->render_page($page,$data);
        }
    }

    //Add Project Method
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

    //Get a Single Project
    public function edit(){
        $id = $this->input->post('id');
        if($id){
            $data['project_types'] = $this->project_model->get_project_type();
            $data['project_status'] = $this->project_model->get_project_status();

            $data['project'] = $this->project_model->get($id);
            // $this->load->view('ajax/project_edit',$data);
            echo json_encode($data['project']);
        }
    }

    //Update Project Method
    public function update(){
        $id = $this->input->post('id');
        $response = array();
        if($id){
            //Convert Team string by comma
            $team = NULL;
            if(!empty($this->input->post('user'))){
                $user_arr = array_unique($this->input->post('user')); //Filter only Unique Value
                $team = implode(',', $user_arr);
            }
            
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            if(!$this->form_validation->run()==FALSE){
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
                    $response = array(
                        'status'=>TRUE,
                        'message'=>'Project Updated'
                    );
                }
                else{
                    $response = array(
                        'status'=>FALSE,
                        'message'=>'Something Went Wrong Try Again.'
                    );
                }
            }
            else{
                $response = array(
                    'status'=>FALSE,
                    'message'=>'Name Feild is Required.'
                );
            }
            
        }
        echo json_encode($response);
    }

    //Delete Project Method
    public function delete(){
        $response = array();
        $id = $this->input->post('id');
        if($id){
            $result = $this->project_model->delete($id);
            if($result == TRUE){
                $response = array(
                    'status'=>TRUE,
                    'message'=>'Project Deleted'
                );
            }
            else{
                $response = array(
                    'status'=>FALSE,
                    'message'=>'Something Went Wrong Try Again.'
                );
            }
        }
        else{
            $response = array(
                'status'=>FALSE,
                'message'=>'No Project Selected'
            );
        }

        echo json_encode($response);
    }

    /* 
    *******************
    Type and Status 
    *******************
    */

    //Project Type List and Add
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

    //Get Single Project Type
    public function getProjectType(){
        $id = $this->input->post('id');

        if($id){
            $result = $this->project_model->get_project_type($id);
            if($result == true){
                echo json_encode($result);
            }
            else{
                $response = array(
                    'status'=>false,
                    'message'=>"Something went wrong, Try Again"
                );
                echo json_encode($response);
            }
        }
    }
    //Update Single Project Type
    public function updateProjectType(){
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $data = array(
            'id'=>$id,
            'name'=>$name
        );
        $result = $this->project_model->update_project_type($id,$data);
        $response = array($id,$name,$result);
        echo json_encode($response);

    }

    //Project Status List and Add
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