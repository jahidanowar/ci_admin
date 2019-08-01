<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends MY_Controller{

    function __construct(){
        parent::__construct();

        $this->not_logged_in();
        $this->load->model('Invoice_model', 'i_model');
    }

    function index(){

        $page = "invoice/invoice_index";
        $data['title'] = "Manage Invoice";
        $data['invoices'] =  $this->i_model->get();

        $this->render_page($page,$data);
    }


    //Create Invoice 

    public function create(){
        $page = "invoice/invoice_add";
        $data['title'] = "Create Invoice";

        $this->render_page($page,$data);


    }

    public function invoice_show(){
        $project_data = $this->i_model->get();
        $project_final_data = array();
        $i = 1;
        if(empty($project_data)){
            $result = array('data' => array());
        }
        foreach ($project_data as $k => $v) {
            // $project_type = $this->project_model->get_project_type($v['project_types_id']);
            // $project_status = $this->project_model->get_project_status($v['project_status_id']);

            $project_final_data[$k] = $v;

            $url =  site_url('invoice/view/'.$v['id']);

            $dt = new DateTime($v['date']);
            $newDate = $dt->format('d/m/Y');

            $result['data'][$k] = array(
                $i++,
                $newDate,
                $v['particluer'],
                $v['amount'],
                $v['status'],
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
    
}