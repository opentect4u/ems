<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Payroll extends CI_Model{

		
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

		//For All Employee's Net Salary
		
		public function f_get_netsal(){

			$sql = "SELECT e.emp_name, e.img_path, d.dept_name, t3.* FROM md_employee e, md_departments d,
					(SELECT t1.emp_code, t1.amount earning, t2.amount deduction, (t1.amount - t2.amount) net_amount FROM
						(SELECT `s`.`emp_code`, sum(s.amount) amount, `t`.`flag` 
							FROM `td_pay_statement` `s`, `md_heads` `t` 
							WHERE `s`.`org_id` = '".$this->session->userdata('loggedin')->org_id."'
							AND `t`.flag = 'E'
							AND `s`.`head_cd` = `t`.`sl_no` GROUP BY `s`.`emp_code`, `t`.`flag`) t1, 
						(SELECT `s`.`emp_code`, sum(s.amount) amount, `t`.`flag` 
							FROM `td_pay_statement` `s`, `md_heads` `t` 
							WHERE `s`.`org_id` = '".$this->session->userdata('loggedin')->org_id."'
							AND `t`.flag = 'D'
							AND `s`.`head_cd` = `t`.`sl_no` GROUP BY `s`.`emp_code`, `t`.`flag`) t2
					WHERE t1.emp_code = t2.emp_code) t3
					WHERE e.org_id = '".$this->session->userdata('loggedin')->org_id."'
					AND e.emp_code = t3.emp_code AND e.department = d.sl_no";

			return $this->db->query($sql)->result();

		}
		
		public function f_generation(){
			
			$sql = "INSERT INTO td_pay_slip (org_id, trans_dt, month, year, emp_code, emp_name, created_dt, created_by) 
					SELECT ".$this->session->userdata('loggedin')->org_id.",
						   '".date('Y-m-d')."',
						   '".date('F', mktime(0, 0, 0, $this->input->post('month'), 10))."',
						   ".date('Y').",
						   emp_code,
						   emp_name,
						   '".date('Y-m-d h:i:s')."',
						   '".$this->session->userdata('loggedin')->user_name."'
					FROM md_employee
					WHERE org_id = ".$this->session->userdata('loggedin')->org_id."";

			$this->db->query($sql);		

			$sql = "INSERT INTO td_pay_trans (trans_dt, org_id,  month, year, emp_code, head_cd, amount)
					SELECT '".date('Y-m-d')."',
						   '".$this->session->userdata('loggedin')->org_id."', 
						   '".date('F', mktime(0, 0, 0, $this->input->post('month'), 10))."',
						   ".date('Y').",
						   emp_code,
						   head_cd,
						   amount
					FROM td_pay_statement
					WHERE org_id = ".$this->session->userdata('loggedin')->org_id."";

			$this->db->query($sql);		

		}

		public function f_get_netsal_emp_wise(){

			$sql = "SELECT t1.trans_dt, t1.emp_code, t1.month, t1.year, t1.amount earning, t2.amount deduction, (t1.amount - t2.amount) net_amount FROM
						(SELECT `s`.`emp_code`, s.month, s.year, s.trans_dt, sum(s.amount) amount
						 FROM `td_pay_trans` `s`, `md_heads` `t`  
							WHERE `s`.`org_id` = '".$this->session->userdata('loggedin')->org_id."'
							AND `s`.emp_code = '".$this->session->userdata('loggedin')->user_id."'
							AND `t`.flag = 'E' 
							AND `s`.`head_cd` = `t`.`sl_no` 
							GROUP BY s.trans_dt, `s`.`emp_code`, s.month, s.year) t1, 
						(SELECT `s`.`emp_code`, s.month, s.year, sum(s.amount) amount
						 FROM `td_pay_trans` `s`, `md_heads` `t`  
							WHERE `s`.`org_id` = '".$this->session->userdata('loggedin')->org_id."'
							AND `s`.emp_code = '".$this->session->userdata('loggedin')->user_id."'
							AND `t`.flag = 'D' 
							AND `s`.`head_cd` = `t`.`sl_no` 
							GROUP BY `s`.`emp_code`, s.month, s.year) t2
					WHERE t1.emp_code = t2.emp_code
					AND t1.month = t2.month
					AND t1.year = t2.year GROUP BY t1.trans_dt, t1.emp_code, t1.month, t1.year ORDER BY t1.trans_dt";

			return $this->db->query($sql)->result();

		}

	}
	

?>
