<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Closings extends MX_Controller {

	public function __construct(){

        parent::__construct();

        //For User's Authentication
        if(!isset($this->session->userdata('loggedin')->user_id)){
            
            redirect('auths/login');

        }

        $this->load->model('Leave');
        
        $link['title']  = 'Leave Management';

        $link['link']   =   [
            
            "/assets/plugins/footable/css/footable.core.css",

            "/assets/plugins/bootstrap-select/bootstrap-select.min.css",

            "/assets/plugins/daterangepicker/daterangepicker.css"
        
        ];

        $select = array("emp_code", "emp_name", "img_path");

        $link['user_dtls']   = $this->Leave->f_get_particulars("md_employee", $select, array("emp_code" => $this->session->userdata('loggedin')->user_id), 1);


        $this->load->view('header', $link);

    }

    public function index(){
        
        //Employee List
        $data['closings']    =   $this->Leave->f_get_closings();

        $this->load->view("closings/form", $data);

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

    public function updateclosings(){

        $this->Leave->f_delete('td_leave_balance', array('balance_dt' => date('Y-m-d')));

        $csvMimes = array('text/x-comma-separated-values',
					   'text/comma-separated-values',
					   'application/octet-stream',
					   'application/vnd.ms-excel',
					   'application/x-csv',
					   'text/x-csv',
					   'text/csv',
					   'application/csv',
					   'application/excel',
					   'application/vnd.msexcel',
					   'text/plain');
        if(!empty($_FILES['closings']['name']) && in_array($_FILES['closings']['type'], $csvMimes)){
 
            $csvFile = fopen($_FILES['closings']['tmp_name'], 'r');
            
            while(($line = fgetcsv($csvFile)) !== FALSE){
                
                $data[] = array(
                    
                    'balance_dt'          =>  date('Y-m-d'),
                    'emp_code'            =>  $line[1],
                    'trans_cd'            =>  date('Y').'1',
                    'ml_bal'              =>  $line[4],
                    'el_bal'              =>  $line[5],
                    'comp_off_bal'        =>  $line[6]

                );
                            
            }
            
            unset($data[0]);
            $data = array_values($data);
            
            $this->Leave->f_insert_multiple('td_leave_balance', $data);

            fclose($csvFile);

            //Setting Messages
            $message    =   array( 
                    
                'message'   => 'Successfully updated!',
                
                'status'    => 'success'
                
            );

            $this->session->set_flashdata('msg', $message);

            redirect('leaves/closings');

        }

    }

}