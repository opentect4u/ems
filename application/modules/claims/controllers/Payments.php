<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends MX_Controller {

	public function __construct(){

        parent::__construct();

        //For User's Authentication
        if(!isset($this->session->userdata('loggedin')->user_id)){
            
            redirect('auths/login');

        }

        $this->load->model('Claim');
        
        $link['title']  = 'Claim Management';

        $link['link']   =   [

            "/assets/plugins/footable/css/footable.core.css",

            "/assets/plugins/bootstrap-select/bootstrap-select.min.css"

        ];

        $select = array("emp_code", "emp_name", "img_path");

        $link['user_dtls']   = $this->Claim->f_get_particulars("md_employee", $select, array("emp_code" => $this->session->userdata('loggedin')->user_id), 1);


        $this->load->view('header', $link);

    }

    public function index(){
        
        //Payment List
        $select = array(
            
            "t.payment_dt", "t.payment_cd", "t.emp_code",
            "e.emp_name", "t.paid_amt", "t.payment_mode"
                    
        );
        
        $where  = array(
            "t.org_id = e.org_id AND t.emp_code = e.emp_code" => NULL,
            "t.approval_status"    => 0,
            "t.org_id"             => $this->session->userdata('loggedin')->org_id
        ); 

        $Payment['payment_dtls']    =   $this->Claim->f_get_particulars("td_payment t, md_employee e", $select, $where, 0);
        
        $this->load->view("payment/dashboard", $Payment);

        $this->load->view('footer');

    }

    //Claim Add Form
    public function f_add(){
        
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $where = array(
                
                "org_id" => $this->session->userdata('loggedin')->org_id,
                "year(payment_dt)" => date('Y')
            );

            $max_payment_cd = $this->Claim->f_get_particulars('td_payment', array('(MAX(payment_cd) + 1) payment_cd'), $where, 1);

            //Payment Details
            $data_array = array ( "org_id" => $this->session->userdata('loggedin')->org_id,
                                  "payment_cd" => (isset($max_payment_cd->payment_cd))? $max_payment_cd->payment_cd : date('Y').'1',
                                  "emp_code" => $this->input->post("emp_code"),         
                                  "payment_dt" => date('Y-m-d'),          
                                  "payment_mode" => $this->input->post("pay_mode"),   
                                  "payment_type" => $this->input->post("pay_type"),          
                                  "chq_dt" => $this->input->post("cheque_dt"),            
                                  "chq_no" => $this->input->post("cheque_no"),            
                                  "bank" => $this->input->post("bank"),            
                                  "paid_amt" => $this->input->post("paid_amt"),            
                                  "created_by" =>  $this->session->userdata('loggedin')->user_name,
                                  "created_dt" =>  date('Y-m-d h:i:s')
                                );
            
            $this->Claim->f_insert('td_payment', $data_array);

            //Setting Messages
            $message    =   array( 
                    
                'message'   => 'Successfully added!',
                
                'status'    => 'success'
                
            );

            $this->session->set_flashdata('msg', $message);
    
            redirect('claim/payment');
        }

        //Dependencies
        $data['url']    = 'add';
        $data['title']  = 'Add New Payment';
        
        //Claim List
        $data['payment']    =   (object) array(
            "payment_cd" => NULL,
            "payment_dt" => date('Y-m-d'),
            "emp_code" => NULL,
            "payment_mode" => NULL,
            "payment_type" => NULL,
            "chq_dt" => NULL,
            "chq_no" => NULL,
            "bank" => NULL,
            "paid_amt" => NULL
        );

        //Employees
        $data['employee'] = $this->Claim->f_get_particulars("md_employee", array("emp_code", "emp_name"), array('org_id' => $this->session->userdata('loggedin')->org_id), 0);
        
        //Bank
        $data['bank'] = $this->Claim->f_get_particulars("md_bank", NULL, array('org_id' => $this->session->userdata('loggedin')->org_id), 0);

        $this->load->view('payment/form', $data);

        $this->load->view('footer');

    }

    //Claim Edit Form
    public function f_edit(){
        
        if($_SERVER['REQUEST_METHOD'] == "POST"){

            $where = array(
                "org_id" => $this->session->userdata('loggedin')->org_id,
                "emp_code" => $this->input->post("emp_code"),         
                "payment_cd" => $this->input->post('payment_code')
            );

            //Claim Details
            $data_array = array ( "payment_mode" => $this->input->post("pay_mode"),   
                                  "payment_type" => $this->input->post("pay_type"),          
                                  "chq_dt" => $this->input->post("cheque_dt"),            
                                  "chq_no" => $this->input->post("cheque_no"),            
                                  "bank" => $this->input->post("bank"),            
                                  "paid_amt" => $this->input->post("paid_amt"),            
                                  "modified_by" =>  $this->session->userdata('loggedin')->user_name,
                                  "modified_dt" =>  date('Y-m-d h:i:s')
                                );
            
            $this->Claim->f_edit('td_payment', $data_array, $where);

            //Setting Messages
            $message    =   array( 
                    
                'message'   => 'Successfully updated!',
                
                'status'    => 'success'
                
            );

            $this->session->set_flashdata('msg', $message);
    
            redirect('claim/payment');

        }

        //Dependencies
        $data['url']    = 'edit';
        $data['title']  = 'Edit Payment';
        
        //Claim List
        $data['payment'] = $this->Claim->f_get_particulars("td_payment", NULL, array('org_id' => $this->session->userdata('loggedin')->org_id, 'payment_cd' => $this->input->get('payment_cd')), 1);
        
        //Employees
        $data['employee'] = $this->Claim->f_get_particulars("md_employee", array("emp_code", "emp_name"), array('org_id' => $this->session->userdata('loggedin')->org_id), 0);
                
        //Bank
        $data['bank'] = $this->Claim->f_get_particulars("md_bank", NULL, array('org_id' => $this->session->userdata('loggedin')->org_id), 0);

        $this->load->view('payment/form', $data);
        $this->load->view('footer');
    }

    //Claim Delete
    public function f_delete(){
        
        $where = array(
            "org_id" => $this->session->userdata('loggedin')->org_id,
            "payment_cd" =>  $this->input->post('payment_cd')
        );

        $this->Claim->f_delete('td_payment', $where);
        exit;
    }

    //Payment Add Form
    public function f_approve(){
        
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            

            //For Claim
            $data_array =   array (

                "approval_status"       =>  1,
                "approved_by"           =>  $this->session->userdata('loggedin')->user_name,
                "approval_dt"           =>  date('Y-m-d h:i:s')
    
            );

            $where      =   array(

                "org_id" => $this->session->userdata('loggedin')->org_id,
                "payment_cd" => $this->input->post('payment_cd'),

            );
            
            $this->Claim->f_edit('td_payment', $data_array, $where);
            
            //Max Balance Amount
            unset($where);
            
            $where = array(
                "org_id" => $this->session->userdata('loggedin')->org_id,
                "emp_code = '".$this->input->post('emp_code')."' GROUP BY emp_code, balance_amt ORDER BY balance_dt DESC LIMIT 0,1" => NULL
            );
            
            $max_balance_amt = $this->Claim->f_get_particulars('td_balance_amt', array("emp_code", "MAX(balance_dt) balance_dt", "(ifnull(balance_amt, 0)) balance_amt"), $where, 1);
            
            if(!isset($max_balance_amt->balance_amt)){
                $max_balance_amt = (object) array(
                    'balance_amt' => 0
                );
            }

            //Checking if row present in current date
            unset($where);

            $where = array(
                "balance_dt" => date('Y-m-d'),
                "org_id" => $this->session->userdata('loggedin')->org_id,
                "emp_code" => $this->input->post('emp_code'),
            );
            
            if($this->Claim->f_get_particulars('td_balance_amt', array('COUNT(1) count'), $where, 1)->count != 0){
                
                $data_array = array(
                    'rcvd_amt' => $this->input->post('tot_amout'),
                    'balance_amt' => $max_balance_amt->balance_amt - $this->input->post('tot_amout')
                );
                $this->Claim->f_edit('td_balance_amt', $data_array, $where);

            }
            else{

                $data_array = array(
                    'org_id' => $this->session->userdata('loggedin')->org_id,
                    'emp_code' => $this->input->post('emp_code'),
                    'balance_dt' => date('Y-m-d'),
                    'rcvd_amt' => $this->input->post('tot_amout'),
                    'balance_amt' => $max_balance_amt->balance_amt - $this->input->post('tot_amout') 
                );

                $this->Claim->f_insert('td_balance_amt', $data_array);

            }    

            exit;

        }

    }

}