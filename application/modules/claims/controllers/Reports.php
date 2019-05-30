<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends MX_Controller {

	public function __construct(){

        parent::__construct();

        //For User's Authentication
        if(!isset($this->session->userdata('loggedin')->user_id)){
            
            redirect('auths/login');

        }

        $this->load->model('Claim');
        
        $link['title']  = 'Claim Management';

        $select = array("emp_code", "emp_name", "img_path");

        $link['user_dtls'] = $this->Claim->f_get_particulars("md_employee", $select, array("emp_code" => $this->session->userdata('loggedin')->user_id), 1);

        $this->load->view('header', $link);

    }

    /*************************USER*************************/

    public function f_details(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //Approve List
            $select = array(
                
                "claim_cd", "claim_dt", "amount",
                "approval_dt",
                        
            );
            
            $where  = array(
                "emp_code"  => $this->session->userdata('loggedin')->user_id,
                "org_id" => $this->session->userdata('loggedin')->org_id,
                "claim_dt BETWEEN '".$this->input->post('from_dt')."' AND '".$this->input->post('to_dt')."'" => NULL
            ); 

            $claim['claim_dtls']    =   $this->Claim->f_get_particulars("td_claim", $select, $where, 0);
            
            $this->load->view('reports/user/claimdetails', $claim);
            $this->load->view('footer');

        }else{

            $this->load->view('reports/user/claimdetails');
            $this->load->view('footer');
        }

    }

    public function f_claimdetails(){

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
            "t.org_id"             => $this->session->userdata('loggedin')->org_id
        ); 


        $claim['claim']   =  $this->Claim->f_get_particulars("td_claim t, md_employee e, md_purpose p", $select, $where, 1);

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

        $claim['claim_trans']   =  $this->Claim->f_get_particulars("td_claim_trans t, md_claim_head h", $select, $where, 0);
        
        echo $this->load->view('reports/user/claimdetailsmodal', $claim, TRUE);

        exit;

    }
    
    public function f_ledger(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //Ledger List
            $select = array(
                
                "balance_dt", "claim_amt", "rcvd_amt",
                "balance_amt",
                        
            );
            
            $where  = array(
                "org_id" => $this->session->userdata('loggedin')->org_id,
                "emp_code"  => $this->session->userdata('loggedin')->user_id,
                "balance_dt BETWEEN '".$this->input->post('from_dt')."' AND '".$this->input->post('to_dt')."'" => NULL
                
            ); 

            $claim['ledger_dtls'] = $this->Claim->f_get_particulars("td_balance_amt", $select, $where, 0);
            
            unset($where);
            $where = array(
                "org_id" => $this->session->userdata('loggedin')->org_id,
                "emp_code"  => $this->session->userdata('loggedin')->user_id,
                "balance_dt <= '".$this->input->post('from_dt')."' GROUP BY emp_code, balance_amt ORDER BY balance_dt DESC LIMIT 0,1" => NULL
            );

            $claim['closing_bal'] = $this->Claim->f_get_particulars("td_balance_amt", array('emp_code', 'MAX(balance_dt) balance_dt', 'balance_amt'), $where, 1);
            
            $this->load->view('reports/user/ledgerdetails', $claim);
            $this->load->view('footer');

        }else{

            $this->load->view('reports/user/ledgerdetails');
            $this->load->view('footer');
        }

    }

    public function f_payment(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //Ledger List
            $select = array(
                
                "payment_dt", "payment_mode", 
                "chq_dt", "chq_no", "paid_amt"
                        
            );
            
            $where  = array(
                "org_id" => $this->session->userdata('loggedin')->org_id,
                "emp_code"  => $this->session->userdata('loggedin')->user_id,
                "payment_dt BETWEEN '".$this->input->post('from_dt')."' AND '".$this->input->post('to_dt')."'" => NULL,
                "approval_status" => 1

            ); 

            $claim['payment_dtls'] = $this->Claim->f_get_particulars("td_payment", $select, $where, 0);
            
            unset($where);
            $where = array(
                "org_id" => $this->session->userdata('loggedin')->org_id,
                "emp_code"  => $this->session->userdata('loggedin')->user_id,
                "payment_dt <= '".$this->input->post('from_dt')."' GROUP BY emp_code, balance_amt ORDER BY balance_dt DESC LIMIT 0,1" => NULL
            );

            $this->load->view('reports/user/paymentdetails', $claim);
            $this->load->view('footer');

        }else{

            $this->load->view('reports/user/paymentdetails');
            $this->load->view('footer');
        }

    }

    /*************************Admin*************************/

    public function f_admindetails(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //Approve List
            $select = array(
                
                "claim_cd", "claim_dt", "amount",
                "approval_dt",
                        
            );
            
            $where  = array(
                "org_id" => $this->session->userdata('loggedin')->org_id,
                "emp_code"  => $this->input->post('emp_code'),
                "claim_dt BETWEEN '".$this->input->post('from_dt')."' AND '".$this->input->post('to_dt')."'" => NULL
            ); 

            $claim['claim_dtls']    =   $this->Claim->f_get_particulars("td_claim", $select, $where, 0);
            
            //Employees
            $claim['employee'] = $this->Claim->f_get_particulars("md_employee", array("emp_code", "emp_name"), array('org_id' => $this->session->userdata('loggedin')->org_id), 0);
            
            $this->load->view('reports/admin/claimdetails', $claim);
            $this->load->view('footer');

        }else{
            
            //Employees
            $claim['employee'] = $this->Claim->f_get_particulars("md_employee", array("emp_code", "emp_name"), array('org_id' => $this->session->userdata('loggedin')->org_id), 0);
            
            $this->load->view('reports/admin/claimdetails', $claim);
            $this->load->view('footer');
        }

    }

    public function f_adminclaimdetails(){

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
            "t.org_id"             => $this->session->userdata('loggedin')->org_id
        ); 


        $claim['claim']   =  $this->Claim->f_get_particulars("td_claim t, md_employee e, md_purpose p", $select, $where, 1);

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

        $claim['claim_trans']   =  $this->Claim->f_get_particulars("td_claim_trans t, md_claim_head h", $select, $where, 0);
        
        echo $this->load->view('reports/admin/claimdetailsmodal', $claim, TRUE);

        exit;

    }
    
    public function f_adminledger(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //Ledger List
            $select = array(
                
                "balance_dt", "claim_amt", "rcvd_amt",
                "balance_amt",
                        
            );
            
            $where  = array(
                "org_id" => $this->session->userdata('loggedin')->org_id,
                "emp_code"  => $this->input->post('emp_code'),
                "balance_dt BETWEEN '".$this->input->post('from_dt')."' AND '".$this->input->post('to_dt')."'" => NULL
                
            ); 

            $claim['ledger_dtls'] = $this->Claim->f_get_particulars("td_balance_amt", $select, $where, 0);
            
            unset($where);
            $where = array(
                "org_id" => $this->session->userdata('loggedin')->org_id,
                "emp_code"  => $this->input->post('emp_code'),
                "balance_dt <= '".$this->input->post('from_dt')."' GROUP BY emp_code, balance_amt ORDER BY balance_dt DESC LIMIT 0,1" => NULL
            );

            $claim['closing_bal'] = $this->Claim->f_get_particulars("td_balance_amt", array('emp_code', 'MAX(balance_dt) balance_dt', 'balance_amt'), $where, 1);
            
            //Employees
            $claim['employee'] = $this->Claim->f_get_particulars("md_employee", array("emp_code", "emp_name"), array('org_id' => $this->session->userdata('loggedin')->org_id), 0);
            
            $this->load->view('reports/admin/ledgerdetails', $claim);
            $this->load->view('footer');

        }else{

            //Employees
            $claim['employee'] = $this->Claim->f_get_particulars("md_employee", array("emp_code", "emp_name"), array('org_id' => $this->session->userdata('loggedin')->org_id), 0);
            
            $this->load->view('reports/admin/ledgerdetails', $claim);
            $this->load->view('footer');
        }

    }

    public function f_adminpayment(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //Ledger List
            $select = array(
                
                "payment_dt", "payment_mode", 
                "chq_dt", "chq_no", "paid_amt"
                        
            );
            
            $where  = array(
                "org_id" => $this->session->userdata('loggedin')->org_id,
                "emp_code"  => $this->input->post('emp_code'),
                "payment_dt BETWEEN '".$this->input->post('from_dt')."' AND '".$this->input->post('to_dt')."'" => NULL,
                "approval_status" => 1

            ); 

            $claim['payment_dtls'] = $this->Claim->f_get_particulars("td_payment", $select, $where, 0);
            
            unset($where);
            $where = array(
                "org_id" => $this->session->userdata('loggedin')->org_id,
                "emp_code"  => $this->input->post('emp_code'),
                "payment_dt <= '".$this->input->post('from_dt')."' GROUP BY emp_code, balance_amt ORDER BY balance_dt DESC LIMIT 0,1" => NULL
            );

            //Employees
            $claim['employee'] = $this->Claim->f_get_particulars("md_employee", array("emp_code", "emp_name"), array('org_id' => $this->session->userdata('loggedin')->org_id), 0);
            
            $this->load->view('reports/admin/paymentdetails', $claim);
            $this->load->view('footer');

        }else{

            //Employees
            $claim['employee'] = $this->Claim->f_get_particulars("md_employee", array("emp_code", "emp_name"), array('org_id' => $this->session->userdata('loggedin')->org_id), 0);
            
            $this->load->view('reports/admin/paymentdetails', $claim);
            $this->load->view('footer');
        }

    }

    public function f_closings(){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $claim['closings'] = $this->Claim->f_get_closings();
            
            $this->load->view('reports/admin/closings', $claim);
            $this->load->view('footer');

        }else{

            $this->load->view('reports/admin/closings');
            $this->load->view('footer');
        }
    }
}
?>