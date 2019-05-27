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

        /* //Employee List
        $select = array(
            
            "m.emp_code", "m.emp_name", "d.dept_name department",
            "m.designation", "m.img_path"
                    
        );
        
        $where  = array(

            "m.emp_code = t.emp_code" => NULL,
            "m.department = d.sl_no"  => NULL,
            "m.emp_status" => 'A'
                    
        ); 

        $data['emp_list'] = $this->Payroll->f_get_particulars('md_employee', $select, $where, 0);
     */
        $this->load->view("statement/dashboard");

        $this->load->view('footer');

    }


    //Add Salary Statement
    public function f_add(){

        if($_SERVER['REQUEST_METHOD'] == "POST") {

            $data_array = array (

                "emp_code"         =>  $this->input->post('emp_code'),

                "basic"            =>  $this->input->post('basic'),

                "da"               =>  $this->input->post('da'),
                
                "hra"              =>  $this->input->post('hra'),
                
                "conveyance"       =>  $this->input->post('conveyance'),
                
                "others"           =>  $this->input->post('others'),
                
                "tot_earnings"     =>  $this->input->post('tot_earnings'),
                
                "pf"               =>  $this->input->post('pf'),

                "esi"              =>  $this->input->post('esi'),

                "p_tax"            =>  $this->input->post('ptax'),

                "incentives"       =>  $this->input->post('incentives'),

                "tds"              =>  $this->input->post('tds'),

                "lwf"              =>  $this->input->post('lwf'),

                "accommodation"    =>  $this->input->post('accommodation'),

                "laundry"          =>  $this->input->post('laundry'),

                "advance"          =>  $this->input->post('advance'),

                "misc"             =>  $this->input->post('misc'),

                "tot_deduction"    =>  $this->input->post('tot_deductions'),

                "net_amount"       =>  $this->input->post('net_sal'),

                "bank_name"        =>  $this->input->post('bank_name'),

                "bank_ac_no"       =>  $this->input->post('bank_acc_no'),

                "location"         =>  $this->input->post('location'),
                
                "pf_ac_no"         => $this->input->post('pf_acc_no'), 

                "esi_no"           =>  $this->input->post('esi_no'),

                "pan_no"           =>  $this->input->post('pan_no'),
                
                "base_or_eligibitity"=>  $this->input->post('base_or_eligibitity'),
                
                "ifsc"             =>  $this->input->post('ifsc'),

                "created_by"       =>  $this->session->userdata('loggedin')->user_name,
    
                "created_dt"       =>  date('Y-m-d h:i:s')
    

            );  
            
            $this->Payroll->f_insert('td_pay_statement', $data_array);

            //Setting Messages
            $message    =   array( 
                    
                'message'   => 'Successfully added!',
                
                'status'    => 'success'
                
            );

            $this->session->set_flashdata('msg', $message);

            redirect('payrolls/statements');

        }

        else {

            //Dependencies
            $data['url']    = 'add';

            //Employees
            $data['employee'] = $this->Payroll->f_get_particulars("md_employee", array("emp_code", "emp_name"), array('org_id' => $this->session->userdata('loggedin')->org_id), 0);
            
            //Setting Null values
            $data['emp']  = (object) array (
                "emp_code" =>  null,
                "amount" => NULL
            );

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

            $data_array = array (

                "basic"            =>  $this->input->post('basic'),

                "da"               =>  $this->input->post('da'),
                
                "hra"              =>  $this->input->post('hra'),
                
                "conveyance"       =>  $this->input->post('conveyance'),
                
                "others"           =>  $this->input->post('others'),
                
                "tot_earnings"     =>  $this->input->post('tot_earnings'),
                
                "pf"               =>  $this->input->post('pf'),

                "esi"              =>  $this->input->post('esi'),

                "p_tax"            =>  $this->input->post('ptax'),

                "incentives"       =>  $this->input->post('incentives'),

                "tds"              =>  $this->input->post('tds'),

                "lwf"              =>  $this->input->post('lwf'),

                "accommodation"    =>  $this->input->post('accommodation'),

                "laundry"          =>  $this->input->post('laundry'),

                "advance"          =>  $this->input->post('advance'),

                "misc"             =>  $this->input->post('misc'),

                "tot_deduction"    =>  $this->input->post('tot_deductions'),

                "net_amount"       =>  $this->input->post('net_sal'),

                "bank_name"        =>  $this->input->post('bank_name'),

                "bank_ac_no"       =>  $this->input->post('bank_acc_no'),

                "location"         =>  $this->input->post('location'),
                
                "pf_ac_no"         =>  $this->input->post('pf_acc_no'), 

                "esi_no"           =>  $this->input->post('esi_no'),

                "pan_no"           =>  $this->input->post('pan_no'),
                
                "base_or_eligibitity"=>  $this->input->post('base_or_eligibitity'),
                
                "ifsc"             =>  $this->input->post('ifsc'),

                "modified_by"       =>  $this->session->userdata('loggedin')->user_name,
    
                "modified_dt"       =>  date('Y-m-d h:i:s')

            );  
            
            $where = array(

                "emp_code"  => $this->session->userdata('valid')['emp_code']

            );

            $this->Payroll->f_edit('td_pay_statement', $data_array, $where);

            //Setting Messages
            $message    =   array( 
                    
                'message'   => 'Successfully updated!',
                
                'status'    => 'success'
                
            );

            $this->session->set_flashdata('msg', $message);

            $this->session->unset_userdata('valid');

            redirect('payrolls/statements');

        }

        else {

            //Dependencies
            $data['url']    = 'edit';

            //Employee List
            $select = array(
                
                "m.emp_code", "m.emp_name", "d.dept_name department"
            );

            $where  = array(

                        "m.department = d.sl_no"    => NULL
            ); 

            $data['employee_dtls']    =   $this->Payroll->f_get_particulars("md_employee m, md_departments d", $select, $where, 0);

            //Statement Details
            $where  = array(

                "emp_code"    => $this->input->get('emp_code')
            ); 

            $data['statemets']  =   $this->Payroll->f_get_particulars("td_pay_statement", NULL, $where, 1);
            
            $this->session->set_userdata('valid', $where);

            $this->load->view("statement/form", $data);

            $script['script'] = [

                "/assets/plugins/moment/moment.js",
    
                "/assets/plugins/daterangepicker/daterangepicker.js",

                "/js/moduleValidations.js"
    
            ];

            $this->load->view('footer', $script);

        }

    }

    //Checking P-Tax
    public function f_ptax(){

        $this->calculate(1);

        exit();
    }

    public function calculate($id){

        $amount     = (int)$this->input->get('amount');
        $data       = $this->Payroll->f_get_particulars('md_ptax_slab', array('from_amt', 'to_amt'), array('sl_no' => $id), 1);
        
        $from_amt   = (int)$data->from_amt;
        $to_amt     = (int)$data->to_amt;
        
        if(($amount >= $from_amt) && ($amount <= $to_amt)){

            echo $this->Payroll->f_get_particulars('md_ptax_slab', array('tax_amt'), array('sl_no' => $id), 1)->tax_amt;

        }
        else{

            $this->calculate(++$id);

        }

    }   
	
}
    
?>
