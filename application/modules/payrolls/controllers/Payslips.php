<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Global Variables.................................

class Payslips extends MX_Controller {

    public function __construct(){

        parent::__construct();
        
        //For User's Authentication
        if(!isset($this->session->userdata('loggedin')->user_id)){
            
            redirect('User_Login/login');

        }

        $this->load->model('Payroll');

        $link['title']  = "Payslip";

        $select = array("emp_code", "emp_name", "img_path");

        $link['user_dtls']   = $this->Payroll->f_get_particulars("md_employee", $select, array("emp_code" => $this->session->userdata('loggedin')->user_id), 1);


        $this->load->view('header', $link);
        
    }

    public function index(){
        
        //Employee List

        $data['pay_list'] = $this->Payroll->f_get_netsal_emp_wise();

        $this->load->view("payslip/dashboard", $data);

        $this->load->view('footer');

    }

    public function f_view(){
        
        $script['script'] = [];

        $where = array(
            
            "month"     => $this->input->get('month'),
            "year"      => $this->input->get('year'),
            "emp_code"  => $this->session->userdata('loggedin')->user_id

        );

        $data['pay_list'] = $this->Payroll->f_get_particulars('td_pay_slip', NULL, $where, 1);
        
        unset($where);
        $where = array(
            "t.head_cd = m.sl_no" => NULL,
            "t.org_id = m.org_id" => NULL,
            "t.org_id"    => $this->session->userdata('loggedin')->org_id,
            "t.emp_code"  => $this->session->userdata('loggedin')->user_id,
            "m.flag"      => 'E',
            "t.month"     => $this->input->get('month'),
            "t.year"      => $this->input->get('year'),

        );

        $data['earnings'] = $this->Payroll->f_get_particulars('td_pay_trans t, md_heads m', array("head_desc", "amount"), $where, 0);

        unset($where);
       
        $where = array(
            "t.head_cd = m.sl_no" => NULL,
            "t.org_id = m.org_id" => NULL,
            "t.org_id"    => $this->session->userdata('loggedin')->org_id,
            "t.emp_code"  => $this->session->userdata('loggedin')->user_id,
            "m.flag"      => 'D',
            "t.month"     => $this->input->get('month'),
            "t.year"      => $this->input->get('year'),

        );

        $data['deductions'] = $this->Payroll->f_get_particulars('td_pay_trans t, md_heads m', array("head_desc", "amount"), $where, 0);

        /* echo "<pre>";
        var_dump($data);
        die; */
        $this->load->view("payslip/salaryslip", $data);

        $this->load->view('footer', $script);

    }
    
}
    
?>
