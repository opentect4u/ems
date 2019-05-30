<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notices extends MX_Controller {

	public function __construct(){

        parent::__construct();

        //For User's Authentication
        if(!isset($this->session->userdata('loggedin')->user_id)){
            
            redirect('auths/login');

        }

        $this->load->model('Notice');
        
        $data['title']  = 'Notice Management';

        $data['notice_count']   = $this->Notice->f_get_particulars("td_notices", array("count(1) count"), array( "org_id" => $this->session->userdata('loggedin')->org_id ), 1);

        $this->load->view('header', $data);

    }

    public function index(){
        
        //Approve List
        $select = array(
            
            "notice_cd", "notice_dt", "subject",
            "notice"
                    
        );
        
        $where  = array(
            "org_id" => $this->session->userdata('loggedin')->org_id
        ); 

        $notice['notices'] = $this->Notice->f_get_particulars("td_notices", $select, $where, 0);
        
        $this->load->view("dashboard", $notice);

        $this->load->view('footer');

    }

    //Approve Add Form
    public function f_add(){
        
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            
            //Max Notice Id
            $where = array(
            
                "org_id" => $this->session->userdata('loggedin')->org_id
            );

            $max_cd = $this->Notice->f_get_particulars('td_notices', array('(MAX(notice_cd) + 1) notice_cd'), $where, 1);

            $data_array = array(
                'org_id' => $this->session->userdata('loggedin')->org_id,
                'notice_cd' => (isset($max_cd->notice_cd))? $max_cd->notice_cd : '1',
                'notice_dt' => date('Y-m-d'),
                'subject' => $this->input->post('subject'),
                'notice' => $this->input->post('notice'),
                'created_by' =>  $this->session->userdata('loggedin')->user_name,
                'created_dt' =>  date('Y-m-d h:i:s')
            );

            $this->Notice->f_insert('td_notices', $data_array);


            //Setting Messages
            $message    =   array( 
                
                'message'   => 'Successfully added!',
                
                'status'    => 'success'
                
            );

            $this->session->set_flashdata('msg', $message);

            redirect('notice');

        }

        //Dependencies
        $data['url']    = 'add';
        $data['title']  = 'Edit Notice';

        //Approve List
        $data['notice']  =  (object) array(
            "notice_cd" => NULL,
            "subject" => NULL,
            "notice" => NULL
        );

        $this->load->view('form', $data);
        $this->load->view('footer');

    }

    //Approve Add Form
    public function f_edit(){
        
        if($_SERVER['REQUEST_METHOD'] == "POST"){
           
            $where = array(
                'org_id' => $this->session->userdata('loggedin')->org_id,
                'notice_cd' => $this->input->post('notice_cd')
            );
            $data_array = array(
                
                'subject' => $this->input->post('subject'),
                'notice' => $this->input->post('notice'),
                'modified_by' =>  $this->session->userdata('loggedin')->user_name,
                'modified_dt' =>  date('Y-m-d h:i:s')
            );

            $this->Notice->f_edit('td_notices', $data_array, $where);

            //Setting Messages
            $message    =   array( 
                
                'message'   => 'Successfully updated!',
                
                'status'    => 'success'
                
            );

            $this->session->set_flashdata('msg', $message);

            redirect('notice');

        }

        //Dependencies
        $data['url']    = 'edit';
        $data['title']  = 'Edit Notice';
        $where = array(
            'org_id' => $this->session->userdata('loggedin')->org_id,
            'notice_cd' => $this->input->get('notice_cd')
        );
        //Approve List
        $data['notice']  =  $this->Notice->f_get_particulars('td_notices', NULL, $where, 1);

        $this->load->view('form', $data);
        $this->load->view('footer');

    }

}