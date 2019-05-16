<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assigns extends MX_Controller {

	public function __construct(){

        parent::__construct();

        //For User's Authentication
        if(!isset($this->session->userdata('loggedin')->user_id)){
            
            redirect('auths/login');

        }

        $this->load->model('Employee');
        
        $link['title']  = 'Assign Employee';

        $link['link']   =   [

            "/assets/plugins/footable/css/footable.core.css",

            "/assets/plugins/bootstrap-select/bootstrap-select.min.css"

        ];

        $select = array("emp_code", "emp_name", "img_path");

        $link['user_dtls']   = $this->Employee->f_get_particulars("md_employee", $select, array("emp_code" => $this->session->userdata('loggedin')->user_id), 1);


        $this->load->view('header', $link);

    }

    public function index(){

        $script['script'] = [
            
            '/assets/plugins/footable/js/footable.all.min.js',

            '/assets/plugins/bootstrap-select/bootstrap-select.min.js',

            'js/footable-init.js'
        
        ];
        
        //Assign List
        $select = array("m.emp_code", "m.emp_name", "d.dept_name",
                        "m.designation", "m.email", "m.img_path");

        $where  = array(
            
                        "m.department = d.sl_no"  => NULL,
                        "emp_status"              => 'A',
                        "emp_type in ('H', 'HR')" => NULL
                    
                    );

        $asignEmp['asignEmp_dtls']    =   $this->Employee->f_get_particulars("md_employee m, md_departments d", $select, $where, 0);
       
        $this->load->view("asignEmp/dashboard", $asignEmp);

        $this->load->view('footer', $script);
        
    }

    //Assign Edit Form
    public function f_operation(){
        
        if($_SERVER['REQUEST_METHOD'] == "POST"){

            //Deleting Previous Details
            $this->Employee->f_delete("md_manager", array("manage_by" => $this->input->post('manage_by')));

            for($i = 0; $i < count($this->input->post('managed_emp')); $i++){

                //New Datas
                $data_array[] = array (

                    "manage_by"        =>  $this->input->post('manage_by'),
        
                    "managed_emp"      =>  $this->input->post('managed_emp')[$i],
        
                    "modified_by"      =>  $this->session->userdata('loggedin')->user_name,
        
                    "modified_dt"      =>  date('Y-m-d h:i:s')
        
                );

            }    
            
            $this->Employee->f_insert_multiple('md_manager', $data_array);

            //Setting Messages
            $message    =   array( 
                    
                'message'   => 'Successfully Updated!',
                
                'status'    => 'success'
                
            );

            $this->session->set_flashdata('msg', $message);
    
            redirect('employees/assign');

        }

        //Dependencies
        $data['title']  = 'Assign Employees';
        
        //Assign Details
        $select = array(

            "managed_emp"

        );

        $where = array(
            
            "manage_by" => $this->input->get('manage_by')
    
        );

        $data['manage_dtls']    = $this->Employee->f_get_particulars("md_manager", $select, $where, 0);
        
        //Employee List
        unset($where);

        $where  = array(

            "emp_code != '".$this->session->userdata('loggedin')->user_id."'" => NULL

        );

        $data['emp_dtls']       = $this->Employee->f_get_particulars("md_employee", array("emp_code", "emp_name"), $where, 0);
        
        echo $this->load->view('asignEmp/form', $data, TRUE);

        exit;

    }

}