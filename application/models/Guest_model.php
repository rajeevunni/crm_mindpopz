<?php
class Guest_model extends CI_Model
{
	
	function getall_Guest_details($condition)
	{
		$query = $this->db->query("SELECT ge.*,(select CONCAT(f_name,' ',COALESCE(l_name,'')) FROM employee e where ge.enquiry_crm=e.id ) AS crm_name, gem.*, gem.id as guest_enquiry_master_id, ge.id as guest_enq_id
										FROM guest_enquiry as ge
										LEFT JOIN guest_enquiry_master as gem
										ON gem.guest_enquiry_id = ge.id
										".$condition
								);
		$return_array = $query->result_array();
		return $return_array;	
	}
	function getall_Pending_Guest_details()
	{
		$query = $this->db->query("SELECT ge.*,(select CONCAT(f_name,' ',COALESCE(l_name,'')) FROM employee e where ge.enquiry_crm=e.id ) AS crm_name, gem.*, gem.id as guest_enquiry_master_id, ge.id as guest_enq_id
										FROM guest_enquiry as ge
										LEFT JOIN guest_enquiry_master as gem
										ON gem.guest_enquiry_id = ge.id
										WHERE enquiry_status NOT IN ('BOOKED','CANCELLED','WRONG LEAD')"
								);
		$return_array = $query->result_array();
		return $return_array;	
	}


	// to insert the guest details.
	function create_guest($data)
	{
		$this->db->insert('guest_enquiry', $data);
		$return_value = $this->db->insert_id();
		return 	$return_value;
	}	
	
	function create_guest_enquiry_master($data)
	{
		$this->db->insert('guest_enquiry_master', $data);
		$return_value = $this->db->insert_id();
		return 	$return_value;
	} 
	
	function create_guest_enquiries($data)
	{
		$this->db->insert('guest_enquiries_table', $data);
		$return_value = $this->db->insert_id();
		return 	$return_value;
	} 
	function update_guest_enquiry_master($info,$id)
	{
		$this->db->where('id', $id);
		$this->db->update('guest_enquiry_master', $info);
		$result=$this->db->affected_rows();
		return $result;
	}
	
	// to update the guest.
	function update_guest_enquiry($info,$id)
	{
		$this->db->where('id', $id);
		$this->db->update('guest_enquiry', $info);
		$result=$this->db->affected_rows();
		return $result;
	}
	function delete_guest($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->delete('guest_enquiry');
		return $query;
	}

	/* This function lists the guest details on the Search Guest Enquiry 
		@params: condition - SQL querry for custom db querying
	*/
	function fetch_guest_details($condition=""){
		$query = $this->db->query("SELECT ge.*,CONCAT(e.f_name,' ',COALESCE (l_name,'')) as crm_name
										FROM guest_enquiry ge left join employee e on e.id=ge.enquiry_crm
											".$condition."
											ORDER BY id DESC"
									);
		$return_array = $query->result_array();
		return $return_array;
	}
	function fetch_guest_enquiries_details($condition)
	{
		$query = $this->db->query("SELECT *
											FROM guest_enquiries_table
											".$condition
									);
		$return_array = $query->result_array();
		return $return_array;
	}

	function getall_guest_enquiry($condition)
	{
		$query = $this->db->query("SELECT *
											FROM guest_enquiries_table
											".$condition
									);
		$return_array = $query->row_array();
		return $return_array;
	}
	
	function update_guest_enquiries($info,$id)
	{
		$this->db->where('id', $id);
		$this->db->update('guest_enquiries_table', $info);
		$result=$this->db->affected_rows();
		return $result;
	}

	/*thi function list the name of crm*/
	function getall_crm($condition)
	{
		$query = $this->db->query("SELECT *
										FROM employee
										".$condition."
										ORDER BY f_name ASC"
								);
		$return_array = $query->result_array();
		return $return_array;	
	}
	function select_crm($condition)
	{
		$query = $this->db->query("SELECT *
										FROM  guest_enquiry
										".$condition
		);
		$return_array = $query->row_array();
		return $return_array;
	}
	function get_result_enquiry($condition)
	{
		$query = $this->db->query("SELECT * 
										FROM guest_enquiry_master
										".$condition
								);
		$return_array = $query->row_array();
		return $return_array;
	}
	function getall_references($condition)
	{
		$query = $this->db->query("SELECT *
										FROM reference
										".$condition."
										ORDER BY reference_name ASC"
								);
		$return_array = $query->result_array();
		return $return_array;	
	}
	function getall_enquiry_status($condition)
	{
		$query = $this->db->query("SELECT *
										FROM enquiry_status
										".$condition."
										ORDER BY enquiry_status ASC"
								);
		$return_array = $query->result_array();
		return $return_array;	
	}
	function getall_status($condition)
	{
		$query = $this->db->query("SELECT *
										FROM reference
										".$condition
								);
		$return_array = $query->result_array();
		return $return_array;	
	}
	function check_user_mail($email){
		$query = $this->db->query("SELECT *
								FROM guest_enquiry
								WHERE guest_email ='".$email."' AND enquiry_status!='BOOKED' "
								);
		$return_array = $query->row_array();
		return $return_array;
	}
	function check_user_mobile($mob){
		$query = $this->db->query("SELECT *
								FROM guest_enquiry
								WHERE guest_mobile ='".$mob."' AND enquiry_status!='BOOKED' "
								);
		$return_array = $query->row_array();
		return $return_array;
	}
	function filter_guest_details($condition_array="")
	{
		if(sizeof($condition_array)>0)
		{
			$condition = ' WHERE'.implode(" AND", $condition_array);
		}
		else
		{
			$condition = '';
		}
		$query = $this->db->query("SELECT ge.*,CONCAT(e.f_name,' ',COALESCE (l_name,'')) as crm_name
										FROM guest_enquiry ge left join employee e on e.id=ge.enquiry_crm 
											".$condition."
											ORDER BY id DESC"
									);
		$return_array = $query->result_array();
		 //echo $this->db->last_query();
		return $return_array;
	}
	function bulkupload_temp_guest($data)
	{
		$this->db->insert('guest_bulkupload_temp', $data);
		$return_value = $this->db->insert_id();
		return 	$return_value;
	}
	function getall_temp_guests($condition)
	{
		$query = $this->db->query("SELECT *
										FROM guest_bulkupload_temp
										".$condition
								);
		$return_array = $query->result_array();		
		return $return_array;
	}
	function empty_temp_upload_guests()
	{
		$this->db->truncate('guest_bulkupload_temp');
	}

	function getall_vehicle_type($condition)
	{
		$query = $this->db->query("SELECT *
										FROM vehicle_type
										".$condition."
										ORDER BY vehicle_type ASC"
								);
		$return_array = $query->result_array();
		return $return_array;	
	}
	function getall_location($condition)
	{
		$query = $this->db->query("SELECT *
										FROM locations
										".$condition."
										ORDER BY location ASC"
								);
		$return_array = $query->result_array();
		return $return_array;	
	}
	function getall_vendor_type($condition)
	{
		$query = $this->db->query("SELECT *
										FROM vendor_type
										".$condition."
										ORDER BY type_name ASC"
								);
		$return_array = $query->result_array();
		return $return_array;	
	}
}
?>