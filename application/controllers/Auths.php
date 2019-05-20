<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auths extends MX_Controller {

	public function __construct(){
        
        parent::__construct();

        $this->load->model('Auth');
        
    }

	public function index()	{
        
		if ($_SERVER['REQUEST_METHOD'] === 'POST'){

			if($pass = $this->Auth->f_get_particulars("md_users", array('password'), array("user_id" => $this->input->post('user_id')), 1)) {

			    if(password_verify($this->input->post('password'), $pass->password)){
                    
                    //User Information
                    $select =   array(

                        "u.user_id", "u.user_name", "m.department", "m.emp_catg",

                        "u.org_id",

                    );

                    $where  =   array(
                        
                        "u.user_id = m.emp_code"    =>  NULL,
                        
                        "u.user_id"                 =>  $this->input->post('user_id'),
                        
                        "u.user_status"             =>  'A'
                    );
                
                    $user_data = $this->Auth->f_get_particulars("md_users u, md_employee m", $select, $where, 1);
                    
                    if(!isset($user_data)){
                        //Setting Messages
                        $message    =   array( 
                                
                            'message'   => 'Inactive User!',
                            
                            'status'    => 'danger'
                            
                        );

                        $this->session->set_flashdata('msg', $message);

                        redirect('auth/login');
                        
                    }
                    //Setting Session Value for audit_trail
                    $this->session->set_userdata('loggedin', $user_data);
                    
                    //Audit Trail value
                    $data_array     =   array(

                        "login_dt"  =>   date('Y-m-d h:m:s'),

                        "user_id"   =>   $this->input->post('user_id'),

                        "terminal_name" => $_SERVER['REMOTE_ADDR']

                    );

                    $this->Auth->f_insert("td_audit_trail", $data_array);

                    //Getting max sl_no for audit trail
                    $select         =   array(

                        "MAX(sl_no) sl_no"

                    );

                    $where      =   array(

                        "user_id"   => $this->input->post('user_id')

                    );

                    $sl_no = $this->Auth->f_get_particulars("td_audit_trail", $select, $where, 1);

                    $this->session->set_userdata('tm_audit_sl_no', $sl_no->sl_no);

                    //Setting Application Date
                    $this->session->set_userdata('sysdate', date('d-m-Y'));

                    redirect('auth/home');

                }
                else{

                    //Setting Messages
                    $message    =   array( 
                            
                        'message'   => 'Ivalid Password!',
                        
                        'status'    => 'danger'
                        
                    );

                    $this->session->set_flashdata('msg', $message);
                    
                    redirect('auth/login');
                    
                }

			}
			else{

                //Setting Messages
                $message    =   array( 
                        
                    'message'   => 'Ivalid User!',
                    
                    'status'    => 'danger'
                    
                );

                $this->session->set_flashdata('msg', $message);

                redirect('auth/login');
                
			}
        }
         
		else{

            redirect('auth/login');
            
		}

    }
    

    //Login Function
    public function f_login(){

        if($this->session->userdata('loggedin')){

            redirect('auth/home');

        }
        else{

            $this->load->view('login/login');

        }    
        
    }

    //Login Function
    public function f_home(){

        if($this->session->userdata('loggedin')){

            $link['link']       =   array("/assets/plugins/css-chart/css-chart.css");

            $link['title']      =   'Mysore Home';

            $script['script']   =   [];

            //User Details
            $select = array("emp_code", "emp_name", "department",
                            "designation", "personal_email", 
                            "img_path");

            $link['user_dtls']   = $this->Auth->f_get_particulars("md_employee", $select, array("emp_code" => $this->session->userdata('loggedin')->user_id), 1);

            //var_dump($link['user_dtls']);die;
            
            $this->load->view('header', $link);

            //$this->load->view('dashboard');

            //$this->load->view('footer', $script);


        }
        else{

            redirect('auth/login');

        }
        
    }

    public function f_logout(){

        if($this->session->userdata('loggedin')){


            $where  =   array(

                "sl_no"    =>   $this->session->userdata('tm_audit_sl_no')
                
            );

            $this->Auth->f_edit("td_audit_trail", array("logout" => date('Y-m-d h:m:s')), $where);

            $this->session->unset_userdata('loggedin');

            $this->session->unset_userdata('tm_audit_sl_no');

            redirect('auth/login');

        }else{

            redirect('auth/login');

        }
           
    }

    //For Param Value
    public function f_param(){
    
        if($this->session->userdata('loggedin')){
            
            $data   =  $this->Auth->f_get_particulars("md_parameters", array("param_value"), array("sl_no" => $this->input->get('id')), 1);

            echo $data->param_value;

            exit;

        }

    }

}
