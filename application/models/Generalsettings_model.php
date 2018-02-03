<?php

class Generalsettings_model extends CI_Model
{
	function create_department($data)
	{
		$this->db->insert('department', $data);
		$return_value = $this->db->insert_id();
		return 	$return_value;
	}

	// function create_department_role_mapping($data)
	// {
	// 	$this->db->insert('department_role_mapping', $data);
	// 	$return_value = $this->db->insert_id();
	// 	return 	$return_value;
	// }

	function update_department($data,$department_id)
	{
		$this->db->where('id', $department_id);
		$this->db->update('department', $data);
		$result=$this->db->affected_rows();	
		
		return $result;
	}

	function getall_departments($condition)
	{
		$query = $this->db->query("SELECT dept.*, cat.category, dept.category as category_id, dept.category, cat.category, CONCAT(ifnull(emp.f_name,''),' ',ifnull(emp.m_name,''),' ',ifnull(emp.l_name,'')) as employee_name
										FROM department as dept
										INNER JOIN category as cat
										ON dept.category=cat.id
										LEFT JOIN employee as emp
										ON dept.department_head = emp.id
										".$condition."
										ORDER BY dept.department_name DESC "
								);
		$return_array = $query->result_array();
		return $return_array;	
	}

	function getall_departments_head($condition)
	{
		$query = $this->db->query("SELECT dept.*, cat.category, CONCAT(ifnull(emp.f_name,''),' ',ifnull(emp.m_name,''),' ',ifnull(emp.l_name,'')) as employee_name, dept.category as category_id, dept.category, cat.category
										FROM department as dept
										INNER JOIN category as cat
										ON dept.category=cat.id
										INNER JOIN employee as emp
										ON dept.department_head = emp.id
										".$condition."
										ORDER BY dept.department_name DESC "
								);
		$return_array = $query->result_array();
		return $return_array;	
	}

	function getall_normal_user($condition,$type='')
	{
		$query = $this->db->query("SELECT nu.*, CONCAT(ifnull(nu.f_name,''),' ',ifnull(nu.m_name,''),' ',ifnull(nu.l_name,'')) as user_name, cat.category, us.status as user_status
							FROM normal_user as nu
							LEFT JOIN category as cat
							ON nu.category_id=cat.id
							LEFT JOIN user as us
							ON nu.user_id = us.id
							".$condition." ORDER BY nu.id DESC"
								);
		if($type==1)
		{
			$return_array = $query->row_array();
			return $return_array;
		}
		else
		{
			$return_array = $query->result_array();
			return $return_array;
		}
			
	}

	function get_department_category($condition)
	{
		$query = $this->db->query("SELECT cat.*, dept.*, cat.category, dept.category as category_id
										FROM department as dept
										INNER JOIN category as cat
										ON dept.category=cat.id
										".$condition."
										"
								);

		$return_array = $query->result_array();
		return $return_array;	
	}


	function get_departmentdetails($department_id)
	{
		$query = $this->db->query("SELECT dept.*,cat.category as cat,dept.category,dept.department_head,cat.id as category_id
										FROM department as dept
										INNER JOIN category as cat
										ON dept.category= cat.id
										WHERE dept.id=".$department_id."
										ORDER BY department_name DESC"
								);
		$return_array = $query->row_array();
		return $return_array;	
	}

	function getall_employees($condition)
	{
		$query = $this->db->query("SELECT ed.*, emp.f_name, emp.m_name, emp.l_name, emp.id as employee_id, emp.user_id, ed.department_id 
										FROM employee  as emp
										INNER JOIN user as u 
										ON emp.user_id=u.id
										INNER JOIN employee_department as ed 
										ON emp.id=ed.employee_id
										".$condition."
										"
								);
		$return_array = $query->result_array();
		return $return_array;	
	}

	function update_userid($data,$user_id)
	{
		$this->db->where('id', $user_id);
		$this->db->update('user', $data);
		$result=$this->db->affected_rows();	
		
		return $result;
	}

	/*--- Function role Mapping ---*/
	function create_function_role_mapping($data)
	{
		$this->db->insert('function_role_mapping', $data);
		$return_value = $this->db->insert_id();
		return 	$return_value;
	}

	function update_function_role_mapping($data,$id)
	{
		$this->db->where('id', $id);
		$this->db->update('function_role_mapping', $data);
		$result=$this->db->affected_rows();	
		
		return $result;
	}
	function getall_mapped_function_role($condition)
	{
		$query = $this->db->query("SELECT DISTINCT(ur.id) as role_id, ur.role, f.id as function_id, f.function_name, frm.id, frm.status, frm.category_id, c.category, r.role
										FROM function_role_mapping as frm
										INNER JOIN user_role as ur
										ON frm.role_id=ur.id
										INNER JOIN functions as f
										ON frm.function_id=f.id
										INNER JOIN category as c
										ON frm.category_id=c.id
										INNER JOIN user_role as r
										ON frm.role_id=r.id
										-- INNER JOIN department as d
										-- ON frm.department_id=d.id

										".$condition."
										GROUP BY frm.category_id, frm.role_id ORDER BY frm.id DESC"
								);
		$return_array = $query->result_array();
		return $return_array;	
	}

	function get_function_role_mapping_details($condition)
	{
		$query = $this->db->query("SELECT *
										FROM function_role_mapping
										".$condition."
										ORDER BY id ASC"
								);
		$return_array = $query->row_array();
		return $return_array;	
	}

	function get_selected_functions($condition)
	{
		$query = $this->db->query("SELECT function_id, category_id, role_id
										FROM function_role_mapping
										".$condition."
										ORDER BY id ASC"
								);
		$return_array = $query->result_array();
		return $return_array;	
	}
	function get_all_role($role_condition)
	{
		$query = $this->db->query("SELECT *
										FROM user_role
										".$role_condition."
										ORDER BY id DESC"
								);
		$return_array = $query->result_array();
		return $return_array;	
	}
	function get_all_functions()
	{
		$query = $this->db->query("SELECT *
										FROM functions 
										ORDER BY id ASC"
								);
		$return_array = $query->result_array();
		return $return_array;	
	}

	function get_function_id($role_id)
	{
		$condition= 'role_id='.$role_id;
		$query = $this->db->query("SELECT function_id
										FROM function_role_mapping
										WHERE ".$condition."
										ORDER BY id ASC"
								);
		$return_array = $query->result_array();
		return $return_array;	
	}

	function get_previous_data($role_id,$category_id) {
        $query = $this->db->query("SELECT *
										FROM function_role_mapping
										WHERE role_id=".$role_id." AND category_id=".$category_id
        );
        $return_array = $query->result_array();


        if (sizeof($return_array) > 0) {

        	$where = '(category_id='.$category_id.' AND role_id='.$role_id.')';
        	$this->db->where($where);
			$this->db->delete('function_role_mapping');
			
	        return true;
        }
    }

   function getall_categories($condition)
	{
		$query = $this->db->query("SELECT *
										FROM category
										".$condition."
										ORDER BY id DESC"
								);
		$return_array = $query->result_array();
		// echo $this->db->last_query();die;
		return $return_array;	
	}

	function get_category_roles($condition)
	{
		$query = $this->db->query("SELECT id as role_id, role
										FROM user_role as r
										".$condition
								);
		$return_array = $query->result_array();		
		return $return_array;
	}

	function get_category_departments($condition)
	{
		$query = $this->db->query("SELECT id as department_id, department_name
										FROM department
										".$condition
								);
		$return_array = $query->result_array();		
		return $return_array;
	}

	// function clear_category_department($department_id)
 //    {
 //        $where = '(department_id=' . $department_id.')';
 //        $this->db->where($where);
 //        $this->db->delete('department_role_mapping');
 //    }

    function getall_user_categories($condition)
	{
		$query = $this->db->query("SELECT DISTINCT cat.category, cat.id as category_id
										FROM category as cat

										INNER JOIN employee_category_role as ecr
										ON cat.id=ecr.category_id

										INNER JOIN employee_department as ed
										ON ecr.employee_id=ed.employee_id

										
										".$condition."
										ORDER BY cat.category ASC "
								);
		$return_array = $query->result_array();
		return $return_array;	
	}

	// department escalation
	function getall_severity_level($condition="")
	{
		$query = $this->db->query("SELECT *
									FROM ticket_severity_level
									".$condition
								);
		$return_array = $query->result_array();
		return $return_array;
	}

	function getall_department_escalation($condition)
	{
		$query = $this->db->query("SELECT dept.department_name, cat.category
										FROM department_escalation as esc
										INNER JOIN department as dept
										ON esc.department_id=dept.id
										INNER JOIN category as cat
										ON dept.category=cat.id
										".$condition."
										ORDER BY esc.id DESC "
								);
		$return_array = $query->result_array();
		return $return_array;	
	}

	// department employees
	function get_department_employees($condition)
	{
		$query = $this->db->query("SELECT emp.id, CONCAT(ifnull(emp.f_name,''),' ',ifnull(emp.m_name,''),' ',ifnull(emp.l_name,'')) as employee_name
										FROM employee as emp
										INNER JOIN employee_department as ed
										ON emp.id=ed.employee_id
										".$condition."
										ORDER BY emp.id ASC "
								);
		$return_array = $query->result_array();
		return $return_array;	
	}

	function get_employee_details($condition)
	{
		$query = $this->db->query("SELECT *
										FROM employee
										".$condition
								);
		$return_array = $query->row_array();
		return $return_array;	
	}

	function get_employee($dept_head)
	{
		$query = $this->db->query("SELECT user_id 
											FROM employee 
											WHERE user_id = ".$dept_head);
		$return_array = $query->row_array();
		return $return_array;
	}

	function getall_category($condition="")
	{
		$query = $this->db->query("SELECT *
										FROM category ".$condition
								);
		$return_array = $query->result_array();
		return $return_array;	
	}

	function get_severity_level()
	{
		$query = $this->db->query("SELECT *
										FROM ticket_severity_level "
								);
		$return_array = $query->result_array();
		return $return_array;	
	}

	function get_ticket_status()
	{
		$query = $this->db->query("SELECT *
										FROM ticket_status "
								);
		$return_array = $query->result_array();
		return $return_array;	
	}

	function getall_category_type($condition)
	{
		$query = $this->db->query("SELECT *
										FROM category_type
										".$condition."
										ORDER BY id DESC"
								);
		$return_array = $query->result_array();
		return $return_array;	
	}

	// condition array to get department and its head

	function getall_departments_array($condition_array)
	{
		if(sizeof($condition_array)>0)
	  	{
	   		$condition = ' WHERE'.implode(" AND ", $condition_array);
	  	}
	  	else
	  	{
	   		$condition = '';
	  	}

		$query = $this->db->query("SELECT dept.*, cat.category, dept.category as category_id, dept.category, cat.category, CONCAT(ifnull(emp.f_name,''),' ',ifnull(emp.m_name,''),' ',ifnull(emp.l_name,'')) as employee_name
										FROM department as dept
										INNER JOIN category as cat
										ON dept.category=cat.id
										LEFT JOIN employee as emp
										ON dept.department_head = emp.id
										".$condition."
										ORDER BY dept.department_name DESC "
								);
		$return_array = $query->result_array();
		return $return_array;	
	}

	function getall_departments_head_array($condition_array)
	{
		if(sizeof($condition_array)>0)
	  	{
	   		$condition = ' WHERE'.implode(" AND ", $condition_array);
	  	}
	  	else
	  	{
	   		$condition = '';
	  	}
	  	
		$query = $this->db->query("SELECT dept.*, cat.category, CONCAT(ifnull(emp.f_name,''),' ',ifnull(emp.m_name,''),' ',ifnull(emp.l_name,'')) as employee_name, dept.category as category_id, dept.category, cat.category
										FROM department as dept
										INNER JOIN category as cat
										ON dept.category=cat.id
										INNER JOIN employee as emp
										ON dept.department_head = emp.id
										".$condition."
										ORDER BY dept.department_name DESC "
								);
		$return_array = $query->result_array();
		return $return_array;	
	}

	// unread emails
	function unread_email_count($condition)
	{ 
		$query = $this->db->query("SELECT mb.*, t.ticket_no
										FROM mail_box as mb
										LEFT JOIN ticket as t
										ON mb.ticket_id=t.id
										".$condition."
										ORDER BY t.id DESC "
								);
		$return_array = $query->result_array();
		return $return_array;	
	}

	// unread emails
	function unread_notification_count1($user_id)
	{
		$query = $this->db->query("SELECT *
										FROM  notifiction 
										 WHERE user_id =".$user_id." AND read_status=0
										ORDER BY id DESC "
								);
		$return_array = $query->result_array();
		return $return_array;	
	}

	function getall_category_employees($condition)
	{
		$query = $this->db->query("SELECT emp.f_name, emp.m_name, emp.l_name, emp.id as employee_id, emp.user_id
										FROM employee  as emp
										INNER JOIN employee_category_role as ecr 
										ON emp.id=ecr.employee_id
										".$condition
								);
		$return_array = $query->result_array();
		return $return_array;	
	}
	function get_existing_employee($condition='')
	{
		$query = $this->db->query("SELECT emp.*
										FROM employee  as emp
										INNER JOIN user as u 
										ON emp.user_id=u.id
										".$condition
								);
		$return_array = $query->result_array();
		return $return_array;	
	}
	function getall_external_user($condition,$type='')
	{
		$query = $this->db->query("SELECT ee.*, cat.category
										FROM external_employee as ee
										LEFT JOIN category as cat
										ON ee.category_id=cat.id
										".$condition.""
											);
		if($type==1)
		{
			$return_array = $query->row_array();
			return $return_array;
		}
		else
		{
			$return_array = $query->result_array();
			return $return_array;
		}
			
	}
	function update_external_user($data,$department_id)
	{
		$this->db->where('id', $department_id);
		$this->db->update('external_employee', $data);
		$result=$this->db->affected_rows();	
		
		return $result;
	}

	function get_reg_institute_name($condition)
	{
		$query = $this->db->query("SELECT *
										FROM  category
										".$condition
								);
		$return_array = $query->row_array();
		return $return_array;	
	}

	function get_dept_head_count($condition)
	{
		$query = $this->db->query("SELECT cat.id, dept.department_head, dept.status
												FROM category as cat
                                    INNER JOIN department as dept
                                    ON cat.id = dept.category
												".$condition
										);
		$return_array = $query->result_array();
		return $return_array;	
	}

	function get_poc_manger_count($condition)
	{
		$query = $this->db->query("SELECT category_poc, employee_id
									FROM category as cat 
									INNER JOIN manager as m
									ON cat.id= m.category_id 
									".$condition
		);
		$return_array = $query->row_array();
		return $return_array;
	}  
	function get_ticket_count($condition_array, $conditions='')
	{
		
		if(sizeof($condition_array)>0)
		{
			 $condition = ' WHERE'.implode(" AND", $condition_array);
		}
		else
		{
			 $condition = $conditions;
		}

		$query = $this->db->query("SELECT COUNT(ticket_status), cat.category
										FROM ticket as t
										INNER JOIN category as cat
										ON t.category_id = cat.id
										".$condition
								);
		$return_array = $query->row_array();
		return $return_array;	
	}
	function get_individual_institute_ticket_count($condition_array, $conditions='')
	{
		if(sizeof($condition_array)>0)
		{
			 $condition = ' WHERE'.implode(" AND", $condition_array);
		}
		else
		{
			 $condition = $conditions;
		}
		$query = $this->db->query("SELECT 
										SUM(CASE WHEN t.id THEN 1 ELSE 0 END ) as total_open, 
										SUM(CASE WHEN t.escalation_date!='0000-00-00 00:00:00' THEN 1 ELSE 0 END ) as total_esclation, 
										th.total_closed_tickets as total_closed,cat.category, cat.category_code 
										FROM ticket as t INNER JOIN category as cat ON t.category_id = cat.id 
										LEFT JOIN (SELECT COUNT(id) as total_closed_tickets, Month(date) as month_date FROM ticket_history WHERE history_ticket_status=14 GROUP BY Month(date))as th 
										ON Month(t.created_date) = th.month_date 
										".$condition."
										GROUP BY t.category_id"
								);
		$return_array = $query->result_array();
		return $return_array;	
	}
	function get_individual_institute_ticket_count_month($condition_array, $conditions='')
	{
		if(sizeof($condition_array)>0)
		{
			 $condition = ' WHERE'.implode(" AND", $condition_array);
		}
		else
		{
			 $condition = $conditions;
		}
		$query = $this->db->query("SELECT 
										SUM(CASE WHEN t.id THEN 1 ELSE 0 END ) as total_open, th.total_closed_tickets as total_closed, Month(t.created_date) 
										FROM ticket as t 
										INNER JOIN category as cat 
										ON t.category_id = cat.id 
										LEFT JOIN (SELECT COUNT(id) as total_closed_tickets, Month(date) as month_date FROM ticket_history WHERE history_ticket_status=14 GROUP BY Month(date))as th 
										ON Month(t.created_date) = th.month_date 
										".$condition."
										GROUP BY Month(t.created_date)"
								);
		$return_array = $query->result_array();
		return $return_array;	
	}

	function get_ticket_counts($condition_array, $conditions='')
	{
		if(sizeof($condition_array)>0)
		{
			 $condition = ' WHERE'.implode(" AND", $condition_array);
		}
		else
		{
			 $condition = $conditions;
		}
		$query = $this->db->query("SELECT 
										SUM(CASE  WHEN t.ticket_status IN (1) THEN 1 ELSE 0 END ) as ticket_created ,
										SUM(CASE  WHEN t.ticket_status IN (2,3,4,5,6,7,10,11,13,12,16,17,18,19) THEN 1 ELSE 0 END ) as ticket_inprogress ,
										SUM(CASE  WHEN t.ticket_status IN (8,9) THEN 1 ELSE 0 END ) as ticket_rejected ,
										SUM(CASE  WHEN t.ticket_status IN (14) THEN 1 ELSE 0 END ) as ticket_closed ,
										SUM(CASE  WHEN t.ticket_status IN (15) THEN 1 ELSE 0 END ) as ticket_reopened
											FROM ticket as t
											".$condition
								);
		$return_array = $query->row_array();
		return $return_array;	
	}

	function get_individual_institute_dept_ticket_count($condition_array, $conditions='')
	{
		if(sizeof($condition_array)>0)
		{
			 $condition = ' WHERE'.implode(" AND", $condition_array);
		}
		else
		{
			 $condition = $conditions;
		}
		$query = $this->db->query("SELECT 
										SUM(CASE WHEN t.id THEN 1 ELSE 0 END ) as total_open, 
										SUM(CASE WHEN t.escalation_date!='0000-00-00 00:00:00' THEN 1 ELSE 0 END ) as total_esclation, 
										th.total_closed_tickets as total_closed,dept.department_name as department
										FROM ticket as t 
										INNER JOIN department as dept
										ON t.department_id = dept.id
										LEFT JOIN (SELECT COUNT(id) as total_closed_tickets, Month(date) as month_date FROM ticket_history WHERE history_ticket_status=14 GROUP BY Month(date))as th 
										ON Month(t.created_date) = th.month_date 
										".$condition."
										GROUP BY t.department_id"
								);
		$return_array = $query->result_array();
		return $return_array;	
	}

	function get_company_wise_barchart()
	{
		$query = $this->db->query("SELECT SUM(booking_amount) as sum, YEAR(`booking_date`) as y, MONTH(`booking_date`) as m, COUNT(booking_amount) as total
									FROM `guest_enquiry`
									GROUP BY YEAR(`booking_date`), MONTH(`booking_date`) 
									HAVING SUM(`booking_date`)>0 AND SUM(`booking_amount`)>0
									ORDER BY `booking_date` DESC"
								);
		$return_array = $query->result_array();
		// print_r($this->db->last_query()) ; die;
		return $return_array;	
	}

	function get_crm_wise_barchart_date()
	{
		$query = $this->db->query("SELECT YEAR(`booking_date`) as y, MONTH(`booking_date`) as m 
									FROM `guest_enquiry`
									GROUP BY YEAR(`booking_date`), MONTH(`booking_date`) 
									HAVING SUM(`booking_date`)>0 AND SUM(`booking_amount`)>0
									ORDER BY `booking_date` DESC"
								);
		$return_array = $query->result_array();
		return $return_array;	
	}

	function get_crm_wise_barchart($year, $month)
	{
		$query = $this->db->query("SELECT enquiry_crm, SUM(booking_amount) as sum, YEAR(`booking_date`) as y, MONTH(`booking_date`) as m 
									FROM `guest_enquiry`
									WHERE YEAR(booking_date) = '".$year."' AND MONTH(booking_date) = '".$month."'
									
									GROUP BY YEAR(`booking_date`), MONTH(`booking_date`), enquiry_crm
									HAVING SUM(`booking_date`)>0 AND SUM(`booking_amount`)>0
									ORDER BY `booking_date` DESC"
								);
		$return_array = $query->result_array();
		return $return_array;	
	}
}

?>