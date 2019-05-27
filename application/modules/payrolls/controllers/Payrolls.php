<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Global Variables.................................

class Payrolls extends MX_Controller {

    public function __construct(){

        parent::__construct();
        
        //For User's Authentication
        if(!isset($this->session->userdata('loggedin')->user_id)){
            
            redirect('User_Login/login');

        }

        $this->load->model('Payroll');

        $link['title']  = 'Payroll Details';

        $link['link']   =   [

            "/assets/plugins/footable/css/footable.core.css",

            "/assets/plugins/bootstrap-select/bootstrap-select.min.css"

        ];

        $select = array("emp_code", "emp_name", "img_path");

        $link['user_dtls']   = $this->Payroll->f_get_particulars("md_employee", $select, array("emp_code" => $this->session->userdata('loggedin')->user_id), 1);


        $this->load->view('header', $link);
        
    }

    public function f_payslipdetails(){

        if($_SERVER['REQUEST_METHOD'] == "POST"){

            $select =   array(

                "emp_code",
                "emp_name",
                "department",
                "designation",
                "basic",
                "da",
                "hra",
                "conveyance",
                "incentives",
                "others",
                "pf",
                "esi",
                "p_tax",
                "advance",
                "tds",
                "lwf",
                "accommodation",
                "laundry",
                "misc",
                "deduct_for_absent",
                "deduct_for_half",
                "tot_earnings",
                "tot_deduction",
                "net_amount",
                "bank_name",
                "bank_ac_no",
                "pf_ac_no",
                "esi_no",
                "pan_no",
                "ifsc",
                "base_or_eligibitity"

            );

            if($this->input->post('emp_code')){

                $where = array(
                    "month" => $this->input->post('month'),
                    "year"  => $this->input->post('year'),
                    "emp_code" => $this->input->post('emp_code')
                );
            }
            else{
                $where = array(

                    "month" => $this->input->post('month'),
                    "year"  => $this->input->post('year')
    
                );
            }

            $data['pay_dtls']   = $this->Payroll->f_get_particulars('td_pay_slip', $select, $where, 0);            

            //Sum of earnings & deductions
            unset($select);
            $select = array(

                "SUM(basic) basic",
                "SUM(da) da",
                "SUM(hra) hra",
                "SUM(conveyance) conveyance",
                "SUM(incentives) incentives",
                "SUM(others) others",
                "SUM(pf) pf",
                "SUM(esi) esi",
                "SUM(p_tax) p_tax",
                "SUM(advance) advance",
                "SUM(misc) misc",
                "SUM(tds) tds",
                "SUM(lwf) lwf",
                "SUM(accommodation) accommodation",
                "SUM(laundry) laundry",
                "SUM(deduct_for_absent) deduct_for_absent",
                "SUM(deduct_for_half) deduct_for_half",
                "SUM(tot_earnings) tot_earnings",
                "SUM(tot_deduction) tot_deduction",
                "SUM(net_amount) net_amount"

            );

            $data['sum_dtls']   = $this->Payroll->f_get_particulars('td_pay_slip', $select, $where, 1);            

            $this->load->view('reports/payslips', $data);

            $script['script'] = [
                '/assets/plugins/datatables/jquery.dataTables.min.js'
            ];

            $script['cdnscript'] = [
            
                "https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js",
                "https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js",
                "https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"
            ];

            $this->load->view('footer', $script);
            
        }
        else{

            $script['script'] = NULL;

            //Month List
            $data['month_list'] =   $this->Payroll->f_get_particulars("md_month",NULL, NULL, 0);

            //Employee List
            $select = array(
            
                "m.emp_code", "m.emp_name", "d.dept_name department",
                "m.designation", "m.img_path"
                
            );

            $where  = array(

                "m.emp_code = t.emp_code"   => NULL,
                "m.department = d.sl_no"    => NULL,
                "m.emp_status" => 'A'
                        
            ); 

            $data['employee_dtls'] = $this->Payroll->f_get_particulars('md_employee m, md_departments d, td_pay_statement t', $select, $where, 0);

            $this->load->view('reports/payslips', $data);

            $this->load->view('footer', $script);
        }

    }


    /************************ Monthly Payment *********************/

    public function f_payment(){

        if($_SERVER['REQUEST_METHOD'] == "POST"){

            $data['pay_dtls']   = $this->Payroll->f_get_payment();            

            //Sum of earnings & deductions
            $data['sum_dtls']   = $this->Payroll->f_get_payment_sum();            

            $this->load->view('reports/payment', $data);

            $script['script'] = [
                '/assets/plugins/datatables/jquery.dataTables.min.js'
            ];

            $script['cdnscript'] = [
            
                "https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js",
                "https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js",
                "https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"
            ];
            
            $this->load->view('footer', $script);

        }
        else{

            $script['script'] = NULL;

            //Month List
            $data['month_list'] =   $this->Payroll->f_get_particulars("md_month",NULL, NULL, 0);

            //Employee List
            $select = array(
            
                "m.emp_code", "m.emp_name", "d.dept_name department",
                "m.designation", "m.img_path"
                
            );

            $where  = array(

                "m.emp_code = t.emp_code"   => NULL,
                "m.department = d.sl_no"    => NULL,
                "m.emp_status" => 'A'
                        
            ); 

            $data['employee_dtls'] = $this->Payroll->f_get_particulars('md_employee m, md_departments d, td_pay_statement t', $select, $where, 0);

            $this->load->view('reports/payment', $data);

            $this->load->view('footer', $script);

        }

    }
    
    public function f_heads(){

        $where = array(
            "org_id" => $this->session->userdata('loggedin')->org_id,
        );
        $data['heads'] = $this->Payroll->f_get_particulars('md_heads', NULL, $where, 0);
        $this->load->view('heads/dashboard', $data);
        $this->load->view('footer');
    }

    //Head Add
    public function f_head_add(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $where = array(
                
                "org_id" => $this->session->userdata('loggedin')->org_id
                
            );

            $max_cd = $this->Payroll->f_get_particulars('md_heads', array('(MAX(sl_no) + 1) sl_no'), $where, 1);

            $data_array = array(
                "org_id" => $this->session->userdata('loggedin')->org_id,
                "sl_no" => (isset($max_cd->sl_no))? $max_cd->sl_no : '1',
                "head_desc" => $this->input->post('head_desc'),
                "flag" => $this->input->post('flag'),
                "created_by" =>  $this->session->userdata('loggedin')->user_name,
                "created_dt" =>  date('Y-m-d h:i:s')
            );

            $this->Payroll->f_insert('md_heads', $data_array);

            //Setting Messages
            $message    =   array( 
                    
                'message'   => 'Successfully added!',
                
                'status'    => 'success'
                
            );

            $this->session->set_flashdata('msg', $message);
    
            redirect('payroll/heads');

        }
        else {
            
            //Dependencies
            $data['url']    = 'add';
            $data['title']  = 'Add Head';
            $data['head'] = (object) array(
                "sl_no" => NULL,
                "head_desc" => NULL,
                "flag" => NULL
            );
            $this->load->view('heads/form', $data);

        }
    }

    //Head Edit
    public function f_head_edit(){
        
        if($_SERVER['REQUEST_METHOD'] == "POST"){

            $where = array(                
                "org_id" => $this->session->userdata('loggedin')->org_id,
                "sl_no" => $this->input->post('sl_no')
            );

            //Payroll Details
            $data_array = array ( 
                                  "head_desc" => $this->input->post('head_desc'),
                                  "flag" => $this->input->post('flag'),           
                                  "modified_by" =>  $this->session->userdata('loggedin')->user_name,
                                  "modified_dt" =>  date('Y-m-d h:i:s')
                                );
            
            $this->Payroll->f_edit('md_heads', $data_array, $where);

            //Setting Messages
            $message    =   array( 
                    
                'message'   => 'Successfully updated!',
                
                'status'    => 'success'
                
            );

            $this->session->set_flashdata('msg', $message);
    
            redirect('payroll/heads');

        }

        //Dependencies
        $data['url']    = 'edit';
        $data['title']  = 'Edit Head';
        
        $where = array(                
            "org_id" => $this->session->userdata('loggedin')->org_id,
            "sl_no" => $this->input->get('sl_no')
        );

        //Payroll Head
        $data['head'] = $this->Payroll->f_get_particulars("md_heads", NULL, $where, 1);
        
        $this->load->view('heads/form', $data);
        $this->load->view('footer');
    }
}
    
?>
