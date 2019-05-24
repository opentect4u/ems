<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Claim extends CI_Model {

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

        return;

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

        return;

    }

    //For Deliting row

    public function f_delete($table_name, $where) {

        $this->db->delete($table_name, $where);

        return;

    }

    public function f_get_closings(){

        $sql = "SELECT t1.* FROM (
                (SELECT `t`.`emp_code`, `e`.`emp_name`, MAX(t.balance_dt) balance_dt, `t`.`balance_amt` FROM `td_balance_amt` `t`, `md_employee` `e` 
                
                WHERE `t`.`org_id` = '0' 
                AND `t`.`emp_code` = `e`.`emp_code` 
                AND `t`.`balance_dt` 
                BETWEEN '".$this->input->post('from_dt')."' AND '".$this->input->post('to_dt')."' 
                GROUP BY e.emp_name, t.emp_code, t.balance_amt) t1, (SELECT `t`.`emp_code`, MAX(t.balance_dt) balance_dt FROM `td_balance_amt` `t`
                WHERE `t`.`org_id` = '0'
                AND `t`.`balance_dt` 
                BETWEEN '".$this->input->post('from_dt')."' AND '".$this->input->post('to_dt')."' 
                GROUP BY t.emp_code) t2)
                    
                WHERE t2.emp_code = t1.emp_code  
                AND t1.balance_dt = t2.balance_dt";

        return $this->db->query($sql)->result();
    }

}