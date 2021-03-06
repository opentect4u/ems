<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leaves extends MX_Controller {

	public function __construct(){

        parent::__construct();

        //For User's Authentication
        if(!isset($this->session->userdata('loggedin')->user_id)){
            
            redirect('auths/login');

        }

        $this->load->model('Leave');
        
        $link['title']  = 'Leave Management';

        $select = array("emp_code", "emp_name", "img_path");

        $link['user_dtls']   = $this->Leave->f_get_particulars("md_employee", $select, array("emp_code" => $this->session->userdata('loggedin')->user_id), 1);
        $link['notice_count']   = $this->Leave->f_get_particulars("td_notices", array("count(1) count"), array( "org_id" => $this->session->userdata('loggedin')->org_id ), 1);

        $this->load->view('header', $link);

    }

    public function index(){

        //Leave List
        $select =   array(
            "t.trans_cd", "t.trans_dt", "m.type_desc leave_type",
            "t.reason", "t.from_dt", "t.to_dt", "t.remarks"
        
        );

        $where  =   array(
            "t.org_id = m.org_id" => NULL,
            "t.leave_type = m.type_cd" => NULL,
            "t.emp_code"          =>  $this->session->userdata('loggedin')->user_id,
            "t.approval_status"   =>  0,
            "t.org_id" => $this->session->userdata('loggedin')->org_id,
        );

        $leave['leave_dtls']    =   $this->Leave->f_get_particulars("td_leaves_trans t, md_leave_type m", $select, $where, 0);
        
        //Department List
        $leave['department']    =   $this->Leave->f_get_particulars("md_departments", array("sl_no", "dept_name"), NULL, 0);

        $this->load->view("leave/dashboard", $leave);

        $this->load->view('footer');
        

    }

    //Leave Add Form
    public function f_add(){
        
        if($_SERVER['REQUEST_METHOD'] == "POST"){

            $transCd = $this->Leave->f_get_particulars("td_leaves_trans", array("max(trans_cd) + 1 trans_cd"), array('year(trans_dt)' => date('Y')), 1);

  			if (!isset($transCd->trans_cd)) {
                  
                $maxCode = date('Y').'1';

              }
              else{

                $maxCode = $transCd->trans_cd;

              }
            
            //Difference between to dates
            $diff_period    =  date_diff(date_create($this->input->post('from_dt')), date_create($this->input->post('to_dt')))->format("%a") + 1;
            
            //For Leave Trans Table
            $data_array     =   array (
                "org_id" => $this->session->userdata('loggedin')->org_id,
                "trans_cd"         =>  $maxCode,
                "trans_dt"         =>  date('Y-m-d'),
                "emp_code"         =>  $this->session->userdata('loggedin')->user_id,
                "department"       =>  $this->session->userdata('loggedin')->department,
                "leave_type"       =>  $this->input->post('leave_type'),
                "reason"           =>  $this->input->post('reason'),
                "from_dt"          =>  $this->input->post('from_dt'),
                "to_dt"            =>  $this->input->post('to_dt'),
                "remarks"          =>  $this->input->post('remarks'),
                "amount"           =>  $diff_period,
                "created_by"       =>  $this->session->userdata('loggedin')->user_name,
                "created_dt"       =>  date('Y-m-d h:i:s')
            );

            $this->Leave->f_insert('td_leaves_trans', $data_array);            

            //For Leave Date Table
            unset($data_array);
            for($i = 0; $i < $diff_period; $i++){

                $date = strtotime("+".$i." day", strtotime($this->input->post('from_dt')));
                
                $data_array[]     =   array(
                    "org_id" => $this->session->userdata('loggedin')->org_id,
                    "trans_cd"  =>  $maxCode,
                    "emp_code"  =>  $this->session->userdata('loggedin')->user_id,
                    "leave_dt"  =>  date("Y-m-d", $date)
                );

            }
            
            $this->Leave->f_insert_multiple('td_leave_dates', $data_array);

            //Setting Messages
            $message    =   array( 
                    
                'message'   => 'Successfully added!',
                
                'status'    => 'success'
                
            );

            $this->session->set_flashdata('msg', $message);

            redirect('leave');

        }

        //Dependencies
        $data['url']    = 'add';
        
        //Leave Types
        $data['leave_type'] = $this->Leave->f_get_particulars('md_leave_type', array('type_cd', 'type_desc'), array( "org_id" => $this->session->userdata('loggedin')->org_id), 0);
        
        $data['leave']   =   (object) array ( "trans_cd"       =>    NULL,
                                              "from_dt"        =>    date('Y-m-d'),
                                              "to_dt"          =>    date('Y-m-d'),
                                              "reason"         =>    NULL,
                                              "leave_type"     =>    NULL,
                                              "remarks"        =>    NULL,
                                              "reason"         =>    NULL
                                            );

        $this->load->view('leave/form', $data);

        $this->load->view('footer');

    }

    //Leave Edit Form
    public function f_edit(){
        
        if($_SERVER['REQUEST_METHOD'] == "POST"){

            //Difference between to dates
            $diff_period    =  date_diff(date_create($this->input->post('from_dt')), date_create($this->input->post('to_dt')))->format("%a") + 1;            

            //For Leave Trans Table
            $data_array     =   array (

                "trans_dt"         =>  date('Y-m-d'),
                "emp_code"         =>  $this->session->userdata('loggedin')->user_id,
                "department"       =>  $this->session->userdata('loggedin')->department,
                "leave_type"       =>  $this->input->post('leave_type'),
                "reason"           =>  $this->input->post('reason'),
                "from_dt"          =>  $this->input->post('from_dt'),
                "to_dt"            =>  $this->input->post('to_dt'),
                "remarks"          =>  $this->input->post('remarks'),
                "amount"           =>  $diff_period,
                "modified_by"      =>  $this->session->userdata('loggedin')->user_name,
                "modified_dt"      =>  date('Y-m-d h:i:s')

            );

            $where  =   array(
                "org_id" => $this->session->userdata('loggedin')->org_id, 
                "emp_code" =>  $this->session->userdata('loggedin')->user_id,
                "trans_cd" =>  $this->input->post('trans_cd')
            );

            $this->Leave->f_edit('td_leaves_trans', $data_array, $where);            

            //Delete Dates            
            $this->Leave->f_delete('td_leave_dates', $where);

            //For Leave Date Table
            unset($data_array);

            for($i = 0; $i < $diff_period; $i++) {

                $date = strtotime("+".$i." day", strtotime($this->input->post('from_dt')));
                
                $data_array[]     =   array(
                    "org_id" => $this->session->userdata('loggedin')->org_id,
                    "trans_cd"  =>  $this->input->post('trans_cd'),
                    "emp_code"  =>  $this->session->userdata('loggedin')->user_id,
                    "leave_dt"  =>  date("Y-m-d", $date)
                );

            }

            $this->Leave->f_insert_multiple('td_leave_dates', $data_array);

            //Setting Messages
            $message    =   array( 
                    
                'message'   => 'Successfully updated!',
                
                'status'    => 'success'
                
            );

            $this->session->set_flashdata('msg', $message);
    
            redirect('leave');

        }

        //Dependencies
        $leave['url']    = 'edit';
        
        //Leave Details
        $select =   array(
            
            "trans_cd", "leave_type", "reason",
            "from_dt", "to_dt", "remarks"
        
        );

        $where  =   array(
            "org_id" => $this->session->userdata('loggedin')->org_id,
            "trans_cd"         =>  $this->input->get('trans_cd'),
            "emp_code"         =>  $this->session->userdata('loggedin')->user_id,
            "approval_status"  => 0
        );

        $leave['leave']    =   $this->Leave->f_get_particulars("td_leaves_trans", $select, $where, 1);

        //Leave Types
        $leave['leave_type'] = $this->Leave->f_get_particulars('md_leave_type', array('type_cd', 'type_desc'), array( "org_id" => $this->session->userdata('loggedin')->org_id), 0);
        
        $this->load->view('leave/form', $leave);

        $this->load->view('footer');

    }

    //Leave Delete
    public function f_delete(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $this->Leave->f_delete('td_leaves_trans', array("trans_cd" => $this->input->post('trans_cd')));

            $this->Leave->f_delete('td_leave_dates', array("trans_cd" => $this->input->post('trans_cd')));

            exit;

        }

    }


/**********************REPORTS************************/

    //For Leave Leaser
    public function f_ledger(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //Opening Balances
            $select =    array(

                "trans_cd", "ml_bal", "el_bal", 
                "comp_off_bal", "MAX(balance_dt) balance_dt"

            );

            $where  =   array(

                "emp_code = '".($this->input->post('emp_code')? $this->input->post('emp_code') : $this->session->userdata('loggedin')->user_id)."'" => NULL,

                "balance_dt < '".$this->input->post('from_date')."' GROUP BY trans_cd, ml_bal, el_bal, comp_off_bal ORDER BY balance_dt DESC, trans_cd DESC LIMIT 0,1" => NULL
                
            );

            $data['open_bal']  = $this->Leave->f_get_particulars("td_leave_balance", $select, $where, 1);

            //Remaining Balances
            unset($select);
            unset($where);
            $select =    array(

                "trans_cd", "ml_in", "el_in", "comp_off_in",
                "ml_out", "el_out", "comp_off_out",
                "ml_bal", "el_bal", "comp_off_bal",
                "balance_dt"

            );

            $where  =   array(

                "emp_code = '".($this->input->post('emp_code')? $this->input->post('emp_code') : $this->session->userdata('loggedin')->user_id)."'" => NULL,

                "balance_dt BETWEEN '".$this->input->post('from_date')."' AND '".$this->input->post('to_date')."' ORDER BY balance_dt" => NULL
                
            );

            $data['remaining_bal']  = $this->Leave->f_get_particulars("td_leave_balance", $select, $where, 0);

            $script['script'] = [
            
                '/assets/plugins/footable/js/footable.all.min.js',
    
                '/assets/plugins/bootstrap-select/bootstrap-select.min.js',
                
                '/assets/plugins/datatables/jquery.dataTables.min.js'
            ];

            $script['cdnscript'] = [
            
                "https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js",
                "https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js",
                "https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"
            ];

            $this->load->view('reports/ledger/leaveledger', $data);

            $this->load->view('footer', $script);
        }
        else{

            //IF User is a HOD or HR
            if($this->session->userdata('loggedin')->emp_type != 'E'){

                //Select Employees dependent on this HOD or HR
                $emp_list   =   $this->Leave->f_get_particulars("md_manager", array('managed_emp'), array("manage_by" => $this->session->userdata('loggedin')->user_id), 0);
                
                $where_in = [$this->session->userdata('loggedin')->user_id];

                foreach($emp_list as $e_list){

                    array_push($where_in, $e_list->managed_emp);
                    
                }
                
                //Unrecommended Leave List
                $select     =   array(

                    "m.emp_code", "m.emp_name"

                );

                $data['emp_dtls']     =   $this->Leave->f_get_particulars_in("md_employee m", $select, $where_in, NULL);
                
            }
            else{

                $data['emp_dtls'] = NULL;

            }

            $this->load->view('reports/ledger/form', $data);
            
            $script['script'] = [
            
                '/assets/plugins/footable/js/footable.all.min.js',
    
                '/assets/plugins/bootstrap-select/bootstrap-select.min.js'
            
            ];

            $this->load->view('footer', $script);
        }

    }

    public function f_leaveBalance(){

        //Maximum Leave Balances
        $select = array(
            
            "trans_cd", "ml_bal", "el_bal",
            "comp_off_bal", "MAX(balance_dt) balance_dt"
        
        );

        $where  =   array(

            "emp_code = '".$this->session->userdata('loggedin')->user_id."' GROUP BY trans_cd, ml_bal, el_bal, comp_off_bal ORDER BY balance_dt DESC LIMIT 0,1" => NULL

        );

        $data = $this->Leave->f_get_particulars('td_leave_balance', $select, $where, 1);

        echo json_encode($data);
        
        exit();
    }

    //For EL count 
    public function f_countEl(){

        $where  =   array(

            "emp_code"  =>  $this->session->userdata('loggedin')->user_id,

            "trans_dt BETWEEN '".$this->input->get('fromDt')."' AND '".$this->input->get('toDt')."'" => NULL

        );

        $data   =  $this->Leave->f_get_particulars("td_leaves_trans", array("count(1) count"), $where, 1);

        echo $data->count;

        exit;

    }

    //for overlapping dates
    public function f_overlapp(){

        $where  =   array(

            "emp_code"  =>  $this->session->userdata('loggedin')->user_id,

            "leave_dt BETWEEN '".$this->input->get('fromDt')."' AND '".$this->input->get('toDt')."'" => NULL

        );

        $data   =  $this->Leave->f_get_particulars("td_leave_dates", array("count(1) count"), $where, 1);

        if($data->count != 0){

            $data   =   $this->Leave->f_get_particulars("td_leave_dates", array("MAX(leave_dt) leave_dt"), array("emp_code"  =>  $this->session->userdata('loggedin')->user_id), 1);

            //Max leave date
            echo $data->leave_dt;

        }
        else {

            echo 1;

        }
        
        exit;

    }

    //for Lower Value of Compp Of
    public function f_lowerVal(){

        $select =    array(

            "emp_code", "comp_off_bal",
            "MAX(balance_dt) balance_dt",

        );

        $where  =   array(

            "emp_code = '".$this->session->userdata('loggedin')->user_id."' GROUP BY emp_code, comp_off_bal ORDER BY balance_dt DESC LIMIT 0,1" => NULL
            
        );

        $data   =  $this->Leave->f_get_particulars("td_leave_balance", $select, $where, 1);
        
        if($data->comp_off_bal == 0){

            echo false;

        }
        else {

            echo true;

        }
        
        exit;

    }

    #El Limit for those employees
    #Who have el balance <= 18

    public function f_elLimit(){

        //Last EL Out Date
        $data = $this->Leave->f_get_particulars('td_leave_balance', array('month(MAX(balance_dt)) month', 'year(MAX(balance_dt)) year'), array('emp_code' => $this->session->userdata('loggedin')->user_id, 'el_out > 0' => NULL, 'year(balance_dt)'=>date('Y')), 1);

        $lastDate= ($data->month) ? ($data->year.'-'.$data->month.'-'.'01') : date('Y').'-01-01';
        $curDate= date('Y').'-'.date('m').'-'.'01';
        
        $data = $this->Leave->f_get_particulars(NULL, array("TIMESTAMPDIFF(month, '$lastDate', '$curDate') AS DateDiff"), NULL, 1);
        
        echo $data->DateDiff;

        exit();
    }
}