<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approves extends MX_Controller {

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
        
        //Approve List
        $select = array(
            
            "claim_cd", "claim_dt", "amount",
            "narration", "approval_status"
                    
        );
        
        $where  = array(
            "approval_status"    => 0,
            "rejection_status"   => 0,
            "org_id"             => $this->session->userdata('loggedin')->org_id
        ); 

        $Approve['claim_dtls']    =   $this->Claim->f_get_particulars("td_claim", $select, $where, 0);
        
        $this->load->view("approve/dashboard", $Approve);

        $this->load->view('footer');

    }

    //Approve Add Form
    public function f_form(){
        
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            
            //For Approval
            if($this->input->post('approve_status')){

                //For Claim
                $data_array =   array (

                    "approval_status"       =>  1,
                    "approval_remarks"      =>  $this->input->post('remarks'),
                    "approved_by"           =>  $this->session->userdata('loggedin')->user_name,
                    "approval_dt"           =>  date('Y-m-d h:i:s')
        
                );

                $where      =   array(

                    "org_id" => $this->session->userdata('loggedin')->org_id,
                    "claim_cd" => $this->input->post('claim_cd'),
                    "emp_code" => $this->input->post('emp_code'),
                    "rejection_status"=> 0

                );
                
                $this->Claim->f_edit('td_claim', $data_array, $where);
                
                //Max Balance Amount
                unset($where);
                
                $where = array(
                    "org_id" => $this->session->userdata('loggedin')->org_id,
                    "emp_code = '".$this->input->post('emp_code')."' GROUP BY emp_code, balance_amt" => NULL
                );
                
                $max_balance_amt = $this->Claim->f_get_particulars('td_balance_amt', array("emp_code", "MAX(balance_dt)", "(ifnull(balance_amt, 0)) balance_amt"), $where, 1);
                
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
                        'claim_amt' => $this->input->post('tot_amout'),
                        'balance_amt' => $this->input->post('tot_amout') + $max_balance_amt->balance_amt
                    );
                    $this->Claim->f_edit('td_balance_amt', $data_array, $where);

                }
                else{

                    $data_array = array(
                        'org_id' => $this->session->userdata('loggedin')->org_id,
                        'emp_code' => $this->input->post('emp_code'),
                        'balance_dt' => date('Y-m-d'),
                        'claim_amt' => $this->input->post('tot_amout'),
                        'balance_amt' => $this->input->post('tot_amout') + $max_balance_amt->balance_amt
                    );

                    $this->Claim->f_insert('td_balance_amt', $data_array);

                }    

                //Setting Messages
                $message    =   array( 
                    
                    'message'   => 'Successfully Approved!',
                    
                    'status'    => 'success'
                    
                );

                $this->session->set_flashdata('msg', $message);

                redirect('claim/approve');

            }

            //For Reject
            else{

                $data_array =   array (

                    "rejection_status"       =>    1,

                    "rejection_remarks"      =>  $this->input->post('remarks'),
        
                    "rejected_by"            =>  $this->session->userdata('loggedin')->user_name,
        
                    "rejected_dt"            =>  date('Y-m-d h:i:s')
        
                );

                $where      =   array(

                    "org_id" => $this->session->userdata('loggedin')->org_id,
                    "claim_cd" => $this->input->post('claim_cd'),
                    "emp_code" => $this->input->post('emp_code'),
                    "approval_status"=> 0

                );
                
                $this->Claim->f_edit('td_claim', $data_array, $where);

                //Setting Messages
                $message    =   array( 
                    
                    'message'   => 'Successfully Rejected!',
                    
                    'status'    => 'danger'
                    
                );

                $this->session->set_flashdata('msg', $message);

                redirect('claim/approve');

            }
        }

        //Approve List
        $select = array(
            
            "e.emp_name", "p.purpose_desc", "t.*"
                    
        );
        
        $where  = array(
            "t.emp_code = e.emp_code"   => NULL,
            "t.purpose = p.id"     => NULL,
            "t.org_id = e.org_id"  => NULL,
            "t.org_id = p.org_id"  => NULL,
            "t.claim_cd"           => $this->input->get('claim_cd'),
            "t.approval_status"    => 0,
            "t.rejection_status"   => 0,
            "t.org_id"             => $this->session->userdata('loggedin')->org_id
        ); 


        $approve['claim']   =  $this->Claim->f_get_particulars("td_claim t, md_employee e, md_purpose p", $select, $where, 1);

        unset($select);
        unset($where);

        $select = array(
            "h.head_desc", "t.remarks", "t.amount"
        );

        $where  = array(
            "t.org_id = h.org_id"  => NULL,
            "t.claim_hd = h.head_cd" => NULL,
            "t.claim_cd" => $this->input->get('claim_cd'),
            "t.org_id" => $this->session->userdata('loggedin')->org_id
        ); 

        $approve['claim_trans']   =  $this->Claim->f_get_particulars("td_claim_trans t, md_claim_head h", $select, $where, 0);
        
        echo $this->load->view('approve/form', $approve, TRUE);

        exit;

    }

}