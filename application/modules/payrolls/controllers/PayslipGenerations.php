<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Global Variables.................................

class PayslipGenerations extends MX_Controller {

    public function __construct(){

        parent::__construct();
        
        //For User's Authentication
        if(!isset($this->session->userdata('loggedin')->user_id)){
            
            redirect('User_Login/login');

        }

        $this->load->model('Payroll');

        $link['title']  = 'Payslip Generation';

        $select = array("emp_code", "emp_name", "img_path");

        $link['user_dtls']   = $this->Payroll->f_get_particulars("md_employee", $select, array("emp_code" => $this->session->userdata('loggedin')->user_id), 1);
        $link['notice_count']   = $this->Payroll->f_get_particulars("td_notices", array("count(1) count"), array( "org_id" => $this->session->userdata('loggedin')->org_id ), 1);

        $this->load->view('header', $link);
        
    }

    public function index(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $year  = date('Y');
            $month = $year.'-'.$this->input->post('month').'-01';
            
            if($this->input->post('submit') == 'regenerate'){
                //Delete Previvous Data if Exist
                $this->Payroll->f_delete('td_pay_slip', array('month' => date('F', mktime(0, 0, 0, $this->input->post('month'), 10)), 'year' => $year, "org_id" => $this->session->userdata('loggedin')->org_id));
                $this->Payroll->f_delete('td_pay_trans', array('month' => date('F', mktime(0, 0, 0, $this->input->post('month'), 10)), 'year' => $year, "org_id" => $this->session->userdata('loggedin')->org_id));

            }

            $this->Payroll->f_generation();

            //Setting Messages
            $message    =   array( 
                    
                'message'   => 'Successfully Generated!',
                
                'status'    => 'success'
                
            );

            $this->session->set_flashdata('msg', $message);

            redirect('payroll/payslipgeneration');

        }
        else{
            
            //Month List
            $data['month_list'] =   $this->Payroll->f_get_particulars("md_month",NULL, NULL, 0);

            $this->load->view("payslipgeneration/form", $data);

            $this->load->view('footer');

        }

    }

    public function f_check(){

        $year  = $this->input->get('year');
        $month = date('F', strtotime($year.'-'.$this->input->get('month').'-01'));
           
        $data = $this->Payroll->f_get_particulars('td_pay_slip', array('count(1) count'), array('month' => $month, 'year' => $this->input->get('year')), 1);

        echo $data->count;

        exit();            

    }

}