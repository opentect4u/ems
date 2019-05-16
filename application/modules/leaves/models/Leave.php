<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leave extends CI_Model {

	public function f_get_particulars($table_name, $select=NULL, $where=NULL, $flag) {

        if(isset($select)) {

            $this->db->select($select);

        }

        if(isset($where)) {

            $this->db->where($where);

        }

        $result		=	$this->db->get($table_name);

        if($flag == 1) {

            return $result->row();
            
        }else {

            return $result->result();

        }

    }

    //For inserting row

    public function f_insert($table_name, $data_array) {

        $this->db->insert($table_name, $data_array);

        return true;

    }

    //For Inserting Multiple Row

    public function f_insert_multiple($table_name, $data_array){

        $this->db->insert_batch($table_name, $data_array);

        return;

    }
    
    //For Editing row

    public function f_edit($table_name, $data_array, $where) {

        $this->db->where($where);
        $this->db->update($table_name, $data_array);

        return true;

    }

    //For Deliting row

    public function f_delete($table_name, $where) {

        $this->db->delete($table_name, $where);

        return true;

    }

    //For Where in Clause for employees
    public function f_get_particulars_in($table_name, $select=NULL, $where_in='NO', $where=NULL) {

        if(isset($select)) {

            $this->db->select($select);

        }

        if(isset($where)){

            $this->db->where($where);

        }

        if(isset($where_in)){

            $this->db->where_in('m.emp_code', $where_in);

        }
        
        $result	=	$this->db->get($table_name);

        return $result->result();

    }

    public function f_get_closings(){
        
        return $this->db->query("SELECT `t1`.*, ifnull(`t2`.`ml_bal`, 0) `sl`, ifnull(`t2`.`el_bal`, 0) `el`, ifnull(`t2`.`comp_off_bal`, 0) `compoff` FROM

                (SELECT `m`.`emp_code`, `m`.`emp_name`, `d`.`dept_name` `department`, MAX(t.balance_dt) balance_dt 
                
                FROM `md_employee` `m`, `md_departments` `d`, `td_leave_balance` `t`
                
                WHERE `m`.`emp_code` = `t`.`emp_code` 
                AND `m`.`department` = `d`.`sl_no` 
                AND `m`.`emp_status` = 'A' GROUP BY t.emp_code) t1, (SELECT * FROM `td_leave_balance`) t2
                
                WHERE t1.emp_code = t2.emp_code
                AND t1.balance_dt = t2.balance_dt")->result();
                
    }

}