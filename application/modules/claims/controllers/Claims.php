<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Claims extends MX_Controller {

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
        
        //Claim List
        $select = array(
            
            "claim_cd", "claim_dt", "amount",
            "narration", "approval_status"
                    
        );
        
        $where  = array(

            "approval_status"    => 0,
            "org_id"             => $this->session->userdata('loggedin')->org_id,
            "emp_code"           => $this->session->userdata('loggedin')->user_id
        ); 

        $claim['claim_dtls']    =   $this->Claim->f_get_particulars("td_claim", $select, $where, 0);
        
        $this->load->view("claim/dashboard", $claim);

        $this->load->view('footer');

    }

    //Claim Add Form
    public function f_add(){
        
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $where = array(
                
                "org_id" => $this->session->userdata('loggedin')->org_id,
                "year(claim_dt)" => date('Y')
            );

            $max_claim_cd = $this->Claim->f_get_particulars('td_claim', array('(MAX(claim_cd) + 1) claim_cd'), $where, 1);

            //Claim Details
            $data_array = array ( "org_id" => $this->session->userdata('loggedin')->org_id,
                                  "claim_cd" => ($max_claim_cd)? $max_claim_cd->claim_cd : date('Y').'1',
                                  "emp_code" => $this->session->userdata('loggedin')->user_id,         
                                  "claim_dt" => date('Y-m-d'),          
                                  "purpose" => $this->input->post("purpose"),   
                                  "from_dt" => $this->input->post("from_dt"),       
                                  "to_dt" => $this->input->post("to_dt"),        
                                  "narration" => $this->input->post("narration"),          
                                  "amount" => $this->input->post("tot_amount"),            
                                  "created_by" =>  $this->session->userdata('loggedin')->user_name,
                                  "created_dt" =>  date('Y-m-d h:i:s')
                                );
            
            $this->Claim->f_insert('td_claim', $data_array);
            
            //Claim Trans
            unset($data_array);
            if(!empty($this->input->post('claim_head')[0])){

                for($i = 0; $i < count($this->input->post('claim_head')); $i++){
                    $data_array[] = array(
                        "org_id" => $this->session->userdata('loggedin')->org_id,
                        "claim_cd" => ($max_claim_cd)? $max_claim_cd->claim_cd : date('Y').'1',
                        "emp_code" => $this->session->userdata('loggedin')->user_id,
                        "claim_hd" => $this->input->post("claim_head")[$i],
                        "remarks" => $this->input->post("remarks")[$i],
                        "amount" => $this->input->post("amount")[$i] 
                    );
                }

                $this->Claim->f_insert_multiple('td_claim_trans', $data_array);

            }

            //Setting Messages
            $message    =   array( 
                    
                'message'   => 'Successfully added!',
                
                'status'    => 'success'
                
            );

            $this->session->set_flashdata('msg', $message);
    
            redirect('claim');
        }

        //Dependencies
        $data['url']    = 'add';
        $data['type']   = 'text';
        $data['title']  = 'Add New Claim';

        //Claim List
        $data['claim']    =   (object) array(
            "claim_code" => NULL,
            "from_dt"    => NULL,
            "to_dt"      => NULL,
            "narration"  => NULL,
            "purpose"    => NULL,
            "amount"     => NULL
        );

        //Purpose
        $data['purpose']    =   $this->Claim->f_get_particulars("md_purpose", NULL, array('org_id' => $this->session->userdata('loggedin')->org_id), 0);
        
        //Claim Head
        $data['claim_head'] =   $this->Claim->f_get_particulars("md_claim_head", NULL, array('org_id' => $this->session->userdata('loggedin')->org_id), 0);
        
        //Training
        $data['claim_trans'] =  array((object)array(
            "claim_hd"    => NULL,
            "remarks"    => NULL,
            "amount"     => NULL
        ));
        
        $this->load->view('claim/form', $data);

        $this->load->view('footer');

    }

    //Claim Edit Form
    public function f_edit(){
        
        if($_SERVER['REQUEST_METHOD'] == "POST"){

            $where = array(
                "org_id" => $this->session->userdata('loggedin')->org_id,
                "emp_code" => $this->session->userdata('loggedin')->user_id,         
                "claim_cd" => $this->input->post('claim_code')
            );
            //Claim Details
            $data_array = array ( 
                                  "claim_dt" => date('Y-m-d'),          
                                  "purpose" => $this->input->post("purpose"),   
                                  "from_dt" => $this->input->post("from_dt"),       
                                  "to_dt" => $this->input->post("to_dt"),        
                                  "narration" => $this->input->post("narration"),          
                                  "amount" => $this->input->post("tot_amount"),            
                                  "modified_by" =>  $this->session->userdata('loggedin')->user_name,
                                  "modified_dt" =>  date('Y-m-d h:i:s')
                                );
            
            $this->Claim->f_edit('td_claim', $data_array, $where);
            
            $this->Claim->f_delete('td_claim_trans', $where);
            //Education
            unset($data_array);
            if(!empty($this->input->post('claim_head')[0])){

                for($i = 0; $i < count($this->input->post('claim_head')); $i++){
                    $data_array[] = array(
                        "org_id" => $this->session->userdata('loggedin')->org_id,
                        "claim_cd" => ($max_claim_cd)? $max_claim_cd->claim_cd : date('Y').'1',
                        "emp_code" => $this->session->userdata('loggedin')->user_id,
                        "claim_hd" => $this->input->post("claim_head")[$i],
                        "remarks" => $this->input->post("remarks")[$i],
                        "amount" => $this->input->post("amount")[$i] 
                    );
                }

                $this->Claim->f_insert_multiple('td_claim_trans', $data_array);

            }

            //Setting Messages
            $message    =   array( 
                    
                'message'   => 'Successfully updated!',
                
                'status'    => 'success'
                
            );

            $this->session->set_flashdata('msg', $message);
    
            redirect('claim');

        }

        //Dependencies
        $data['url']    = 'edit';
        $data['title']  = 'Edit Claim';
        
        //Claim List
        $data['claim']    =   $this->Claim->f_get_particulars("td_claim", NULL, array('org_id' => $this->session->userdata('loggedin')->org_id, 'claim_cd' => $this->input->get('claim_cd'), $this->session->userdata('loggedin')->user_id), 1);

        //Purpose
        $data['purpose']    =   $this->Claim->f_get_particulars("md_purpose", NULL, array('org_id' => $this->session->userdata('loggedin')->org_id), 0);
        
        //Claim Head
        $data['claim_head'] =   $this->Claim->f_get_particulars("md_claim_head", NULL, array('org_id' => $this->session->userdata('loggedin')->org_id), 0);
        
        //Training
        $data['claim_trans'] =  $this->Claim->f_get_particulars("td_claim_trans", NULL, array('org_id' => $this->session->userdata('loggedin')->org_id, 'claim_cd' => $this->input->get('claim_cd'), $this->session->userdata('loggedin')->user_id), 0);

        $this->load->view('claim/form', $data);
        $this->load->view('footer');
    }

}