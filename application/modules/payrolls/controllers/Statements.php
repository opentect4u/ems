<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Global Variables.................................

class Statements extends MX_Controller {

    public function __construct(){

        parent::__construct();
        
        //For User's Authentication
        if(!isset($this->session->userdata('loggedin')->user_id)){
            
            redirect('User_Login/login');

        }

        $this->load->model('Payroll');

        $link['title']  = 'Salary Statements';

        $link['link']   =   [

            "/assets/plugins/footable/css/footable.core.css",

            "/assets/plugins/bootstrap-select/bootstrap-select.min.css"

        ];

        $select = array("emp_code", "emp_name", "img_path");

        $link['user_dtls']   = $this->Payroll->f_get_particulars("md_employee", $select, array("emp_code" => $this->session->userdata('loggedin')->user_id), 1);


        $this->load->view('header', $link);
        
    }

    public function index(){

        //Employee List
        
        $data['emp_list'] = $this->Payroll->f_get_netsal();
        
        $this->load->view("statement/dashboard", $data);

        $this->load->view('footer');

    }


    //Add Salary Statement
    public function f_add(){

        if($_SERVER['REQUEST_METHOD'] == "POST") {

            for($i = 0; $i < count($this->input->post('head_cd')); $i++){
                
                $data_array[] = array (

                    "org_id"     =>  $this->session->userdata('loggedin')->org_id,

                    "emp_code"   =>  $this->input->post('emp_code'),

                    "head_cd"    =>  $this->input->post('head_cd')[$i],

                    "amount"     =>  $this->input->post('amount')[$i],

                    "created_by" =>  $this->session->userdata('loggedin')->user_name,
        
                    "created_dt" =>  date('Y-m-d h:i:s')
        

                ); 
                
            }
            
            $this->Payroll->f_insert_multiple('td_pay_statement', $data_array);

            //Setting Messages
            $message    =   array( 
                    
                'message'   => 'Successfully added!',
                
                'status'    => 'success'
                
            );

            $this->session->set_flashdata('msg', $message);

            redirect('payroll/statement');

        }

        else {

            //Dependencies
            $data['url']    = 'add';

            //Employees
            $data['employee'] = $this->Payroll->f_get_particulars("md_employee", array("emp_code", "emp_name"), array('org_id' => $this->session->userdata('loggedin')->org_id), 0);

            //Default Statements
            $data['statement'] =  array((object)array(
                "sl_no"  => NULL,
                "amount" => NULL
            ));

            //Heads
            $where = array(
                "org_id" => $this->session->userdata('loggedin')->org_id,
            );

            $data['heads'] = $this->Payroll->f_get_particulars('md_heads', NULL, $where, 0);

            $this->load->view("statement/form", $data);

            $this->load->view('footer');

        }

    }

    //Edit Salary Statement
    public function f_edit(){

        if($_SERVER['REQUEST_METHOD'] == "POST") {

            $this->Payroll->f_delete('td_pay_statement', array('org_id' => $this->session->userdata('loggedin')->org_id, 'emp_code' => $this->input->post('emp_code')));

            for($i = 0; $i < count($this->input->post('head_cd')); $i++){
                
                $data_array[] = array (

                    "org_id"     =>  $this->session->userdata('loggedin')->org_id,

                    "emp_code"   =>  $this->input->post('emp_code'),

                    "head_cd"    =>  $this->input->post('head_cd')[$i],

                    "amount"     =>  $this->input->post('amount')[$i],

                    "created_by" =>  $this->session->userdata('loggedin')->user_name,
        
                    "created_dt" =>  date('Y-m-d h:i:s')
        

                ); 
                
            }
            
            $this->Payroll->f_insert_multiple('td_pay_statement', $data_array);

            //Setting Messages
            $message    =   array( 
                    
                'message'   => 'Successfully updated!',
                
                'status'    => 'success'
                
            );

            $this->session->set_flashdata('msg', $message);

            $this->session->unset_userdata('valid');

            redirect('payroll/statement');

        }

        else {

            //Dependencies
            $data['url']    = 'edit';

            //Employees
            $data['employee'] = $this->Payroll->f_get_particulars("md_employee", array("emp_code", "emp_name"), array('org_id' => $this->session->userdata('loggedin')->org_id), 0);
            
            //Statements
            $data['statement'] =  $this->Payroll->f_get_particulars("td_pay_statement", array("head_cd", "amount"), array('org_id' => $this->session->userdata('loggedin')->org_id, 'emp_code' => $this->input->get('emp_code')), 0);
                
            //Heads
            $where = array(
                "org_id" => $this->session->userdata('loggedin')->org_id,
            );

            $data['heads'] = $this->Payroll->f_get_particulars('md_heads', NULL, $where, 0);

            $this->load->view("statement/form", $data);

            $this->load->view('footer');

        }

    }

}
    
?>
