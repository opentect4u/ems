<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends MX_Controller {

	public function __construct(){

        parent::__construct();

        //For User's Authentication
        if(!isset($this->session->userdata('loggedin')->user_id)){
            
            redirect('auths/login');

        }

        $this->load->model('Employee');
        
        $link['title']  = 'Employee Management';

        $select = array("emp_code", "emp_name", "img_path");

        $link['user_dtls']   = $this->Employee->f_get_particulars("md_employee", $select, array("emp_code" => $this->session->userdata('loggedin')->user_id), 1);
        $link['notice_count']   = $this->Employee->f_get_particulars("td_notices", array("count(1) count"), array( "org_id" => $this->session->userdata('loggedin')->org_id ), 1);

        $this->load->view('header', $link);

    }

    public function index(){
        
        //Employee List
        $select = array(
            
                    "m.emp_code", "m.emp_name", "d.dept_name department",
                    "m.designation", "m.personal_email", "m.img_path", "m.emp_status",
                    "m.prof_email"
                    
        );
        
        $where  = array(

            "m.department = d.sl_no"    => NULL,
            "m.org_id" => $this->session->userdata('loggedin')->org_id
        ); 

        $employee['employee_dtls']    =   $this->Employee->f_get_particulars("md_employee m, md_departments d", $select, $where, 0);
        
        $this->load->view("employee/dashboard", $employee);

        $this->load->view('footer');

    }

    //For Status Update of Farmer
    public function f_updateStatus(){

        $value =  ($this->input->get('value') == "A")? "I":"A";

        $this->Employee->f_edit('md_employee', array("emp_status" => $value), array('emp_code' => $this->input->get('trans_id')));
        $this->Employee->f_edit('md_users', array("user_status" => $value), array('user_id' => $this->input->get('trans_id')));

        echo $value;

        exit();
    }

    //Employee Add Form
    public function f_add(){
        
        if($_SERVER['REQUEST_METHOD'] == "POST"){

            //Employee Details
            $data_array = array ( "org_id" => $this->session->userdata('loggedin')->org_id,
                                  "emp_code" => $this->input->post("emp_code"),         
                                  "emp_name" => $this->input->post("emp_name"),      
                                  "primary_mob" => $this->input->post("prim_mob"),                   
                                  "secondary_mob" => $this->input->post("sec_mob"),          
                                  "personal_email" => $this->input->post("personal_email"),   
                                  "prof_email" => $this->input->post("prof_email"),       
                                  "gurd_name" => $this->input->post("gurd_name"),        
                                  "country" => $this->input->post("country"),          
                                  "state" => $this->input->post("state"),            
                                  "marital_status" => $this->input->post("marital_status"),   
                                  "gender" => $this->input->post("gender"),           
                                  "city" => $this->input->post("city"),          
                                  "pin" => $this->input->post("postal_code"),      
                                  "department" => $this->input->post("department"), 
                                  "present_addr" => $this->input->post("present_address"),  
                                  "permanent_add" => $this->input->post("parmanent_address"),
                                  "blood_group" => $this->input->post("blood_grp"),        
                                  "identity_marks" => $this->input->post("identity_mark"),    
                                  "bank_name" => $this->input->post("bank_name"),        
                                  "branch_name" => $this->input->post("branch_name"),      
                                  "acc_no" => $this->input->post("account_no"),       
                                  "pan_no" => $this->input->post("pan_no"),           
                                  "pf_no" => $this->input->post("pf_no"),            
                                  "esi_no" => $this->input->post("esi_no"),           
                                  "adhar_no" => $this->input->post("adhar_no"),        
                                  "passport" => $this->input->post("passport_no"),      
                                  "relation" => $this->input->post("relation"),         
                                  "emg_name" => $this->input->post("emargency_name"),   
                                  "contact_no" => $this->input->post("imargency_contact_no"),
                                  "contact_address" => $this->input->post("imargency_address"),
                                  "designation" => $this->input->post("designation"),
                                  "emp_catg" => $this->input->post("category"),
                                  "joining_date" => $this->input->post("joining_dt"),
                                  "doc_sub" => $this->input->post("document_sub"),
                                  "emp_status" => $this->input->post("status"),
                                  "termination_date" => $this->input->post("termination_dt"),
                                  "emp_file_no" => $this->input->post("file_no"),
                                  "img_path" => 'assets/images/users/profile.png',
                                  "created_by" =>  $this->session->userdata('loggedin')->user_name,
                                  "created_dt" =>  date('Y-m-d h:i:s')
                            );
            
            $this->Employee->f_insert('md_employee', $data_array);
            
            //Education
            unset($data_array);
            if(!empty($this->input->post('board')[0])){

                for($i = 0; $i < count($this->input->post('board')); $i++){
                    $data_array[] = array(
                        "org_id" => $this->session->userdata('loggedin')->org_id,
                        "emp_code" => $this->input->post("emp_code"),
                        "sl_no" => $i+1,
                        "board" => $this->input->post("board")[$i],
                        "passing_yr" => $this->input->post("passing_yr")[$i],
                        "score" => $this->input->post("score")[$i],
                        "created_by" =>  $this->session->userdata('loggedin')->user_name,
                        "created_dt" =>  date('Y-m-d h:i:s')  
                    );
                }

                $this->Employee->f_insert_multiple('md_emp_edu', $data_array);

            }

            //Experience
            unset($data_array);
            if(!empty($this->input->post('job_title')[0])){

                for($i = 0; $i < count($this->input->post('job_title')); $i++){
                    $data_array[] = array(
                        "org_id" => $this->session->userdata('loggedin')->org_id,
                        "emp_code" => $this->input->post("emp_code"),
                        "sl_no" => $i+1,
                        "job_title" => $this->input->post("job_title")[$i],
                        "from_dt" => $this->input->post("exp_from_date")[$i],
                        "to_dt" => $this->input->post("exp_to_date")[$i],
                        "created_by" =>  $this->session->userdata('loggedin')->user_name,
                        "created_dt" =>  date('Y-m-d h:i:s')
                    );
                }

                $this->Employee->f_insert_multiple('md_emp_exp', $data_array);

            }

            //Skill
            unset($data_array);
            if(!empty($this->input->post('skill_name')[0])){

                for($i = 0; $i < count($this->input->post('skill_name')); $i++){
                    $data_array[] = array(
                        "org_id" => $this->session->userdata('loggedin')->org_id,
                        "emp_code" => $this->input->post("emp_code"),
                        "sl_no" => $i+1,
                        "skill_name" => $this->input->post("skill_name")[$i],
                        "tot_exp" => $this->input->post("total_exp")[$i],
                        "created_by" =>  $this->session->userdata('loggedin')->user_name,
                        "created_dt" =>  date('Y-m-d h:i:s')
                    );
                }

                $this->Employee->f_insert_multiple('md_emp_skills', $data_array);

            }

            //Training
            unset($data_array);
            if(!empty($this->input->post('training_type')[0])){

                for($i = 0; $i < count($this->input->post('training_type')); $i++){
                    $data_array[] = array(
                        "org_id" => $this->session->userdata('loggedin')->org_id,
                        "emp_code" => $this->input->post("emp_code"),
                        "sl_no" => $i+1,
                        "training_type" => $this->input->post("training_type")[$i],
                        "training_place" => $this->input->post("training_place")[$i],
                        "from_dt" => $this->input->post("training_from_date")[$i],
                        "to_dt" => $this->input->post("training_to_date")[$i],
                        "created_by" =>  $this->session->userdata('loggedin')->user_name,
                        "created_dt" =>  date('Y-m-d h:i:s')
                    );
                }

                $this->Employee->f_insert_multiple('md_emp_training', $data_array);

            }

            //User Details
            unset($data_array);
            
            $data_array = array (

                "org_id" => $this->session->userdata('loggedin')->user_id,
                "emp_code" => $this->input->post('emp_code'),
                "user_id" =>  $this->input->post('emp_code'),
                "password" =>  '$2y$10$I5RflPqwjOrxRneEL0V/ROxvDIgXy9eUkjSiTAnPbBj3LnFSRuwJy',
                "user_name" =>  $this->input->post('emp_name'),
                "user_status" =>  $this->input->post("status"),
                "created_by" =>  $this->session->userdata('loggedin')->user_name,
                "created_dt" =>  date('Y-m-d h:i:s')
    
            );

            $this->Employee->f_insert('md_users', $data_array);

            //User Details
            unset($data_array);

            /* $data_array = array (

                "balance_dt"        =>  date('Y-m-d'),
                "trans_cd"          =>  date('Y').'1',
                "emp_code"          =>  $this->input->post('emp_code'),
                "ml_bal"            =>  0,
                "el_bal"            =>  0,
                "comp_off_bal"      =>  0
    
            );

            $this->Employee->f_insert('td_leave_balance', $data_array);
            */

            //Setting Messages
            $message    =   array( 
                    
                'message'   => 'Successfully added!',
                
                'status'    => 'success'
                
            );

            $this->session->set_flashdata('msg', $message);
    
            redirect('employee');
        }

        //Dependencies
        $data['url']    = 'add';
        $data['type']   = 'text';
        $data['title']  = 'Add New Employee';

        //Forwarding Null Value to view
        $data['emp'] = (object) array ( "emp_code"         =>    NULL,
                                        "emp_name"         =>    NULL,
                                        "joining_date"     =>    NULL,
                                        "prim_mob"         =>    NULL,
                                        "phn_no"           =>    NULL,
                                        "sec_mob"          =>    NULL,
                                        "personal_email"   =>    NULL,
                                        "prof_email"       =>    NULL,
                                        "gurd_name"        =>    NULL,
                                        "country"          =>    NULL,
                                        "state"            =>    NULL,
                                        "marital_status"   =>    NULL,
                                        "gender"           =>    NULL,
                                        "city"             =>    NULL,
                                        "designation"      =>    NULL,
                                        "postal_code"      =>    NULL,
                                        "department"       =>    NULL,
                                        "termination_date" =>    NULL,
                                        "present_address"  =>    NULL,
                                        "parmanent_address"=>    NULL,
                                        "blood_grp"        =>    NULL,
                                        "identity_mark"    =>    NULL,
                                        "bank_name"        =>    NULL,
                                        "branch_name"      =>    NULL,
                                        "account_no"       =>    NULL,
                                        "pan_no"           =>    NULL,
                                        "pf_no"            =>    NULL,
                                        "esi_no"           =>    NULL,
                                        "adhar_no"         =>    NULL,
                                        "passport_no"      =>    NULL,
                                        "relation"         =>    NULL,
                                        "emargency_name"   =>    NULL,
                                        "imargency_contact_no" =>NULL,
                                        "imargency_address"=>    NULL,
                                        "category"         =>    NULL,
                                        "joining_dt"       =>    NULL,
                                        "document_sub"     =>    NULL,
                                        "status"           =>    NULL,
                                        "termination_dt"   =>    NULL,
                                        "file_no"          =>    NULL

                                    );
        
        //Department List
        $data['department']    =   $this->Employee->f_get_particulars("md_departments", array("sl_no", "dept_name"), NULL, 0);
        
        //Country List
        $data['country']    =   $this->Employee->f_get_particulars("md_countries", array("id", "country_name"), NULL, 0);
        
        //State List
        $data['state']    =   $this->Employee->f_get_particulars("md_states", array("id", "state"), NULL, 0);
        
        //Education
        $data['education'] =  array((object)array(
            "board"            =>    NULL,
            "passing_yr"       =>    NULL,
            "score"            =>    NULL
        ));
        //Experience
        $data['experience'] =  array((object)array(
            "job_title"       =>    NULL,
            "exp_from_date"   =>    NULL,
            "exp_to_date"     =>    NULL
        ));
        //Skill
        $data['skills'] =  array((object)array(
            "skill_name"  =>    NULL,
            "total_exp"   =>    NULL,
        ));
        //Training
        $data['training'] =  array((object)array(
            "training_type"       =>    NULL,
            "training_place"      =>    NULL,
            "training_from_date"  =>    NULL,
            "training_to_date"    =>    NULL
        ));
        
        $this->load->view('employee/form', $data);

        $this->load->view('footer');

    }

    //Employee Edit Form
    public function f_edit(){
        
        if($_SERVER['REQUEST_METHOD'] == "POST"){

            $data_array = array ( "org_id" => $this->session->userdata('loggedin')->org_id,
                                  "emp_code" => $this->input->post("emp_code"),         
                                  "emp_name" => $this->input->post("emp_name"),      
                                  "primary_mob" => $this->input->post("prim_mob"),                   
                                  "secondary_mob" => $this->input->post("sec_mob"),          
                                  "personal_email" => $this->input->post("personal_email"),   
                                  "prof_email" => $this->input->post("prof_email"),       
                                  "gurd_name" => $this->input->post("gurd_name"),        
                                  "country" => $this->input->post("country"),          
                                  "state" => $this->input->post("state"),            
                                  "marital_status" => $this->input->post("marital_status"),   
                                  "gender" => $this->input->post("gender"),           
                                  "city" => $this->input->post("city"),          
                                  "pin" => $this->input->post("postal_code"),      
                                  "department" => $this->input->post("department"), 
                                  "present_addr" => $this->input->post("present_address"),  
                                  "permanent_add" => $this->input->post("parmanent_address"),
                                  "blood_group" => $this->input->post("blood_grp"),        
                                  "identity_marks" => $this->input->post("identity_mark"),    
                                  "bank_name" => $this->input->post("bank_name"),        
                                  "branch_name" => $this->input->post("branch_name"),      
                                  "acc_no" => $this->input->post("account_no"),       
                                  "pan_no" => $this->input->post("pan_no"),           
                                  "pf_no" => $this->input->post("pf_no"),            
                                  "esi_no" => $this->input->post("esi_no"),           
                                  "adhar_no" => $this->input->post("adhar_no"),        
                                  "passport" => $this->input->post("passport_no"),      
                                  "relation" => $this->input->post("relation"),         
                                  "emg_name" => $this->input->post("emargency_name"),   
                                  "contact_no" => $this->input->post("imargency_contact_no"),
                                  "contact_address" => $this->input->post("imargency_address"),
                                  "designation" => $this->input->post("designation"),
                                  "emp_catg" => $this->input->post("category"),
                                  "joining_date" => $this->input->post("joining_dt"),
                                  "doc_sub" => $this->input->post("document_sub"),
                                  "emp_status" => $this->input->post("status"),
                                  "termination_date" => $this->input->post("termination_dt"),
                                  "emp_file_no" => $this->input->post("file_no"),
                                  "img_path" => 'assets/images/users/profile.png',
                                  "modified_by"      =>  $this->session->userdata('loggedin')->user_name,
                                  "modified_dt"      =>  date('Y-m-d h:i:s')
    
            );
            
            $where = array(
                "org_id" => $this->session->userdata('loggedin')->org_id,
                "emp_code" => $this->input->post('emp_code')
            );

            $this->Employee->f_edit('md_employee', $data_array, $where);
            
            $this->Employee->f_delete('md_emp_edu', $where);
            $this->Employee->f_delete('md_emp_exp', $where);
            $this->Employee->f_delete('md_emp_skills', $where);
            $this->Employee->f_delete('md_emp_training', $where);

            //Education
            unset($data_array);
            if(!empty($this->input->post('board')[0])){

                for($i = 0; $i < count($this->input->post('board')); $i++){
                    $data_array[] = array(
                        "org_id" => $this->session->userdata('loggedin')->org_id,
                        "emp_code" => $this->input->post("emp_code"),
                        "sl_no" => $i+1,
                        "board" => $this->input->post("board")[$i],
                        "passing_yr" => $this->input->post("passing_yr")[$i],
                        "score" => $this->input->post("score")[$i],
                        "modified_by" =>  $this->session->userdata('loggedin')->user_name,
                        "modified_dt" =>  date('Y-m-d h:i:s')  
                    );
                }

                $this->Employee->f_insert_multiple('md_emp_edu', $data_array);

            }

            //Experience
            unset($data_array);
            if(!empty($this->input->post('job_title')[0])){

                for($i = 0; $i < count($this->input->post('job_title')); $i++){
                    $data_array[] = array(
                        "org_id" => $this->session->userdata('loggedin')->org_id,
                        "emp_code" => $this->input->post("emp_code"),
                        "sl_no" => $i+1,
                        "job_title" => $this->input->post("job_title")[$i],
                        "from_dt" => $this->input->post("exp_from_date")[$i],
                        "to_dt" => $this->input->post("exp_to_date")[$i],
                        "modified_by" =>  $this->session->userdata('loggedin')->user_name,
                        "modified_dt" =>  date('Y-m-d h:i:s')
                    );
                }

                $this->Employee->f_insert_multiple('md_emp_exp', $data_array);

            }

            //Skill
            unset($data_array);
            if(!empty($this->input->post('skill_name')[0])){

                for($i = 0; $i < count($this->input->post('skill_name')); $i++){
                    $data_array[] = array(
                        "org_id" => $this->session->userdata('loggedin')->org_id,
                        "emp_code" => $this->input->post("emp_code"),
                        "sl_no" => $i+1,
                        "skill_name" => $this->input->post("skill_name")[$i],
                        "tot_exp" => $this->input->post("total_exp")[$i],
                        "modified_by" =>  $this->session->userdata('loggedin')->user_name,
                        "modified_dt" =>  date('Y-m-d h:i:s')
                    );
                }

                $this->Employee->f_insert_multiple('md_emp_skills', $data_array);

            }

            //Training
            unset($data_array);
            if(!empty($this->input->post('training_type')[0])){

                for($i = 0; $i < count($this->input->post('training_type')); $i++){
                    $data_array[] = array(
                        "org_id" => $this->session->userdata('loggedin')->org_id,
                        "emp_code" => $this->input->post("emp_code"),
                        "sl_no" => $i+1,
                        "training_type" => $this->input->post("training_type")[$i],
                        "training_place" => $this->input->post("training_place")[$i],
                        "from_dt" => $this->input->post("training_from_date")[$i],
                        "to_dt" => $this->input->post("training_to_date")[$i],
                        "modified_by" =>  $this->session->userdata('loggedin')->user_name,
                        "modified_dt" =>  date('Y-m-d h:i:s')
                    );
                }

                $this->Employee->f_insert_multiple('md_emp_training', $data_array);

            }

            //Setting Messages
            $message    =   array( 
                    
                'message'   => 'Successfully updated!',
                
                'status'    => 'success'
                
            );

            $this->session->set_flashdata('msg', $message);
    
            redirect('employee');

        }

        //Dependencies
        $data['url']    = 'edit';
        $data['type']   = 'hidden';
        $data['title']  = 'Edit Employee';
        
        //Employee Details
        $select = array(

            "org_id", "emp_code", "emp_name", "primary_mob prim_mob",
            "secondary_mob sec_mob", "personal_email", "prof_email",
            "gurd_name", "country", "state", "marital_status",
            "gender", "city", "pin postal_code", "department", "present_addr present_address",
            "permanent_add parmanent_address", "blood_group blood_grp", "identity_marks identity_mark", "bank_name",
            "branch_name", "acc_no account_no", "pan_no", "pf_no", "esi_no",
            "adhar_no", "passport passport_no", "relation", "emg_name emargency_name", "contact_no imargency_contact_no",
            "contact_address imargency_address", "designation", "emp_catg category", "joining_date joining_dt",
            "doc_sub document_sub", "emp_status status", "termination_date termination_dt",
            "emp_file_no file_no"

        );

        //Department List
        $data['department']    =   $this->Employee->f_get_particulars("md_departments", array("sl_no", "dept_name"), NULL, 0);
        
        //Country List
        $data['country']    =   $this->Employee->f_get_particulars("md_countries", array("id", "country_name"), NULL, 0);
        
        //State List
        $data['state']    =   $this->Employee->f_get_particulars("md_states", array("id", "state"), NULL, 0);

        $data['emp'] = $this->Employee->f_get_particulars("md_employee", $select, array("org_id" => $this->session->userdata('loggedin')->org_id, "emp_code" => $this->input->get('emp_no')), 1);

        //Education
        $education =  $this->Employee->f_get_particulars("md_emp_edu", array("board", "passing_yr", "score"), array("org_id" => $this->session->userdata('loggedin')->org_id, "emp_code" => $this->input->get('emp_no')), 0);
        //Experience
        $experience =  $this->Employee->f_get_particulars("md_emp_exp", array("job_title","from_dt exp_from_date","to_dt exp_to_date"), array("org_id" => $this->session->userdata('loggedin')->org_id, "emp_code" => $this->input->get('emp_no')), 0);
        //Skill
        $skills =  $this->Employee->f_get_particulars("md_emp_skills", array("skill_name","tot_exp total_exp"), array("org_id" => $this->session->userdata('loggedin')->org_id, "emp_code" => $this->input->get('emp_no')), 0);
        //Training
        $training =  $this->Employee->f_get_particulars("md_emp_training", array("training_type","training_place","from_dt training_from_date","to_dt training_to_date"), array("org_id" => $this->session->userdata('loggedin')->org_id, "emp_code" => $this->input->get('emp_no')), 0);

        //Education
        $data['education'] =  ($education)? $education:array((object)array(
            "board"            =>    NULL,
            "passing_yr"       =>    NULL,
            "score"            =>    NULL
        ));
        //Experience
        $data['experience'] =  ($experience)? $experience:array((object)array(
            "job_title"       =>    NULL,
            "exp_from_date"   =>    NULL,
            "exp_to_date"     =>    NULL
        ));
        //Skill
        $data['skills'] =  ($skills)? $skills:array((object)array(
            "skill_name"  =>    NULL,
            "total_exp"   =>    NULL,
        ));
        //Training
        $data['training'] =  ($training)? $training:array((object)array(
            "training_type"       =>    NULL,
            "training_place"      =>    NULL,
            "training_from_date"  =>    NULL,
            "training_to_date"    =>    NULL
        ));

        $this->load->view('employee/form', $data);
        $this->load->view('footer');
    }

}