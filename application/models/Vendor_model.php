<?php
class Vendor_model extends CI_Model
{
	function getall_vendor_categories($condition)
	{
		$query = $this->db->query("SELECT *
										FROM vendor_category
										".$condition
								);
		$return_array = $query->result_array();
		return $return_array;	
	}
	function getall_vendor_type($condition)
	{
		$query = $this->db->query("SELECT *
										FROM vendor_type
										".$condition
								);
		$return_array = $query->result_array();
		return $return_array;	
	}
	function getall_vendor_details($condition)
	{
		$query = $this->db->query("SELECT vd.*,vc.category_name, vt.type_name
										FROM vendor_details as vd
										INNER JOIN vendor_category as vc
										ON vc.id = vd.category
										INNER JOIN vendor_type as vt
										ON vt.id = vd.type
										".$condition." 
										ORDER BY id DESC"
								);
		$return_array = $query->result_array();
		return $return_array;	
	}
	function getinduvidal_vendor_details($condition)
	{
		$query = $this->db->query("SELECT vd.*,vc.category_name, vt.type_name
										FROM vendor_details as vd
										INNER JOIN vendor_category as vc
										ON vc.id = vd.category
										INNER JOIN vendor_type as vt
										ON vt.id = vd.type
										".$condition
								);
		$return_array = $query->row_array();
		return $return_array;	
	}
	function getinduvidal_accommodation($condition)
	{
		$query = $this->db->query("SELECT *
										FROM accommodation
										".$condition
								);
		$return_array = $query->row_array();
		return $return_array;
	}
	function getall_accommodations($condition){
		$query = $this->db->query("SELECT *
									FROM accommodation
									".$condition."
									ORDER BY id DESC"
								);
		$return_array = $query->result_array();
		return $return_array;
	}
	// to insert the vendor details.
	function create_vendor($data)
	{
		$this->db->insert('vendor', $data);
		$return_value = $this->db->insert_id();
		return 	$return_value;
	}	 
	function create_vendor_details($data)
	{
		$this->db->insert('vendor_details', $data);
		$return_value = $this->db->insert_id();
		return 	$return_value;
	}
	// to update the vendor.
	function update_vendor_details($data,$id)
	{
		$this->db->where('id', $id);
		$this->db->update('vendor_details', $data);
		$result=$this->db->affected_rows();	
		return $result;
	}
	function update_vendor_information($data,$id)
	{
		$this->db->where('id', $id);
		$this->db->update('vendor_details', $data);
		$result=$this->db->affected_rows();	
		return $result;
	}
	function delete_vendor($id)
	{
		$this->db->where('id', $id);
		   $query = $this->db->delete('vendor_details');
		   return $query;
	}
	function delete_crm($id)
	{
		$this->db->where('id', $id);
		   $query = $this->db->delete('employee');
		   return $query;
	}
	function create_accomodation_details($data)
	{
		$this->db->insert('accommodation', $data);
		$return_value = $this->db->insert_id();
		return 	$return_value;
	}
	function update_accomodation($data,$id)
	{
		$this->db->where('id', $id);
		$this->db->update('accommodation', $data);
		$result=$this->db->affected_rows();	
		return $result;
	}
	
	function create_internal_user($data)
	{
		$this->db->insert('employee', $data);
		$return_value = $this->db->insert_id();
		return 	$return_value;
	}
	function create_internal_userlogin($data)
	{
		$this->db->insert('user', $data);
		$return_value = $this->db->insert_id();
		return 	$return_value;
	}	
	function getall_crm($condition)
	{
		$query = $this->db->query("SELECT ud.id,u.id as emp_id, ud.f_name, ud.l_name, ud.email, ud.primary_contact_no,ud.secondary_contact_no, u.status, u.employee_code, u.created_date
										FROM employee as ud
										LEFT JOIN 
										user as u
										ON ud.user_id=u.id
										".$condition."
										ORDER BY u.id DESC"
								);
		$return_array = $query->result_array();
		return $return_array;	
	}
	function getinduidual_crm($condition)
	{
		$query = $this->db->query("SELECT ud.id,u.id as emp_id, ud.f_name, ud.l_name, ud.email, ud.primary_contact_no,ud.secondary_contact_no, u.status, u.employee_code, u.created_date, u.status as emp_status
										FROM employee as ud
										LEFT JOIN 
										user as u
										ON ud.user_id=u.id
										".$condition."
										ORDER BY u.id DESC"
								);
		$return_array = $query->row_array();

		return $return_array;	
	}
	function update_internal_user($data,$user_id)
	{
		$this->db->where('id', $user_id);
		$this->db->update('employee', $data);
		$result=$this->db->affected_rows();	
		
		return $result;
	}
	function update_emp_role_type($data,$user_id)
	{
		$this->db->where('id', $user_id);
		$this->db->update('user', $data);
		$result=$this->db->affected_rows();	
		
		return $result;
	}
	function create_reference($data)
	{
		$query = $this->db->query("SELECT count(1) as cnt 
										FROM reference
										WHERE reference_name='".$data['reference_name']."'"
								);
		$check_array = $query->row_array();
		if($check_array['cnt']>0){
			return 0;
		}else{
			$this->db->insert('reference',$data);
			$return_value=$this->db->insert_id();
			return $return_value;
		}	
	}
	function getall_reference($condition)
	{
		$query = $this->db->query("SELECT * 
										FROM reference
										".$condition."
										ORDER BY id DESC"
								);
		$return_array = $query->result_array();
		return $return_array;	
	}
	function getall_status($condition)
	{
		$query = $this->db->query("SELECT * 
										FROM enquiry_status
										".$condition."
										ORDER BY id DESC"
								);
		$return_array = $query->result_array();
		return $return_array;	
	}
	function getinduidual_reference($condition)
	{
		$query = $this->db->query("SELECT * 
										FROM reference
										".$condition
								);
		$return_array = $query->row_array();
		return $return_array;	
	}
	function update_reference($data,$id)
	{
		$this->db->where('id', $id);
		$this->db->update('reference', $data);
		$result=$this->db->affected_rows();	
		
		return $result;
	}

	function filter_vendor_details($condition_array)
	{
		if(sizeof($condition_array)>0)
		{
			$condition = ' WHERE'.implode(" AND", $condition_array);
		}
		else
		{
			$condition = '';
		}
		$query = $this->db->query("SELECT vd.*,vc.category_name, vt.type_name, lo.location as location_name
										FROM vendor_details as vd
										INNER JOIN vendor_category as vc
										ON vc.id = vd.category
										INNER JOIN vendor_type as vt
										ON vt.id = vd.type
										INNER JOIN locations as lo
										ON lo.id = vd.location
											".$condition."
											ORDER BY id DESC"
									);
		$return_array = $query->result_array();
		// echo $this->db->last_query();
		return $return_array;
	}
	function filter_accomodation_details($condition_array)
	{
		if(sizeof($condition_array)>0)
		{
			$condition = ' WHERE'.implode(" AND", $condition_array);
		}
		else
		{
			$condition = '';
		}
		$query = $this->db->query("SELECT vd.*,ac.*, vc.category_name, vt.type_name, lo.location as location_name
										FROM vendor_details as vd
										INNER JOIN accommodation as ac
										ON vd.id = ac.vendor_id
										INNER JOIN vendor_category as vc
										ON vc.id = vd.category
										INNER JOIN vendor_type as vt
										ON vt.id = vd.type
										INNER JOIN locations as lo
										ON lo.id = vd.location
											".$condition."
											ORDER BY vd.id DESC"
									);
		$return_array = $query->result_array();
		// echo $this->db->last_query();
		return $return_array;
	}
	function bulkupload_temp_accommodation($data)
	{
		$this->db->insert('accommodation_bulkupload_temp', $data);
		$return_value = $this->db->insert_id();
		return 	$return_value;
	}
	function getall_temp_accommodation($condition)
	{
		$query = $this->db->query("SELECT *
										FROM accommodation_bulkupload_temp
										".$condition
								);
		$return_array = $query->result_array();		
		return $return_array;
	}
	function empty_temp_upload_accommodation()
	{
		$this->db->truncate('accommodation_bulkupload_temp');
	}

	//New table created for add location
	function create_location($data)
	{
		$query = $this->db->query("SELECT count(1) as cnt 
										FROM locations
										WHERE location='".$data['location']."'"
								);
		$check_array = $query->row_array();
		if($check_array['cnt']>0){
			return 0;
		}else{
			$this->db->insert('locations',$data);
			$return_value=$this->db->insert_id();
			return $return_value;	
		}
	}
	
	//fetching the location details
	function getall_location($condition)
	{
		$query = $this->db->query("SELECT * 
										FROM locations
										".$condition."
										ORDER BY location DESC"
								);
		$return_array = $query->result_array();
		return $return_array;	
	}
	//adding vendor_type
	function create_vendor_type($data)
	{
		$query = $this->db->query("SELECT count(1) as cnt 
										FROM vendor_type
										WHERE type_name='".$data['type_name']."'"
								);
		$check_array = $query->row_array();
		if($check_array['cnt']>0){
			return 0;
		}else{
			$this->db->insert('vendor_type',$data);
			$return_value=$this->db->insert_id();
			return $return_value;	
		}
	}
	//adding vehicle type
	function create_vehicle_type($data)
	{
		$query = $this->db->query("SELECT count(1) as cnt 
										FROM vehicle_type
										WHERE vehicle_type='".$data['vehicle_type']."'"
								);
		$check_array = $query->row_array();
		if($check_array['cnt']>0){
			return 0;
		}else{
			$this->db->insert('vehicle_type',$data);
			$return_value=$this->db->insert_id();
			return $return_value;	
		}
	}
	//fetching vehicle_type
	function getall_vehicle_type($condition)
	{
		$query = $this->db->query("SELECT * 
										FROM vehicle_type
										".$condition."
										ORDER BY id DESC"
								);
		$return_array = $query->result_array();
		return $return_array;	
	}
	//adding vendor category
	function create_vendor_category($data)
	{
		$query = $this->db->query("SELECT count(1) as cnt 
										FROM vendor_category
										WHERE category_name='".$data['category_name']."'"
								);
		$check_array = $query->row_array();
		if($check_array['cnt']>0){
			return 0;
		}else{
			$this->db->insert('vendor_category',$data);
			$return_value=$this->db->insert_id();
			return $return_value;	
		}
	}

	function getinduidual_location($condition)
	{
		$query = $this->db->query("SELECT * 
										FROM locations
										".$condition
								);
		$return_array = $query->row_array();
		return $return_array;	
	}

	function update_location($data,$id)
	{
		$query = $this->db->query("SELECT count(1) as cnt 
										FROM locations
										WHERE location='".$data['location']."' AND id!=$id"
								);
		$check_array = $query->row_array();
		print_r($check_array);exit;
		if($check_array['cnt']>0){
			return 0;
		}else{
			$this->db->where('id', $id);
			$this->db->update('locations', $data);
			$result=$this->db->affected_rows();	
			return $result;
		}
	}
	
	function getinduidual_vendor_type($condition)
	{
		$query = $this->db->query("SELECT * 
										FROM vendor_type
										".$condition
								);
		$return_array = $query->row_array();
		return $return_array;	
	}

	function update_vendor_type($data,$vendor_type_id)
	{
		$this->db->where('id', $vendor_type_id);
		$this->db->update('vendor_type', $data);
		$result=$this->db->affected_rows();	
		
		return $result;
	}
	function getinduidual_vehicle($condition)
	{
		$query = $this->db->query("SELECT * 
										FROM vehicle_type
										".$condition
								);
		$return_array = $query->row_array();
		return $return_array;	
	}
	function update_vehicle($data,$vehicle_id)
	{
		$this->db->where('id', $vehicle_id);
		$this->db->update('vehicle_type', $data);
		$result=$this->db->affected_rows();	
		
		return $result;
	}
	function getinduidual_category($condition)
	{
		$query = $this->db->query("SELECT * 
										FROM vendor_category
										".$condition
								);
		$return_array = $query->row_array();
		return $return_array;	
	}
	function update_category($data,$category_idid)
	{
		$this->db->where('id', $category_idid);
		$this->db->update('vendor_category', $data);
		$result=$this->db->affected_rows();	
		
		return $result;
	}

	function create_enquiry($data)
	{
		$query = $this->db->query("SELECT count(1) as cnt 
										FROM enquiry_status
										WHERE enquiry_status='".$data['enquiry_status']."'"
								);
		$check_array = $query->row_array();
		if($check_array['cnt']>0){
			return 0;
		}else{
			$this->db->insert('enquiry_status',$data);
			$return_value=$this->db->insert_id();
			return $return_value;	
		}
	}

	function getinduidual_enquiry_status($condition)
	{
		$query = $this->db->query("SELECT * 
										FROM enquiry_status
										".$condition
								);
		$return_array = $query->row_array();
		return $return_array;	
	}
	function update_enquiry_status($data,$category_idid)
	{
		$this->db->where('id', $category_idid);
		$this->db->update('enquiry_status', $data);
		$result=$this->db->affected_rows();	
		
		return $result;
	}
	// query for fetching location
	// function getall_location($condition)
	// {
	// 	$query = $this->db->query("SELECT *
	// 									FROM locations
	// 									".$condition."
	// 									ORDER BY location ASC"
	// 							);
	// 	$return_array = $query->result_array();
	// 	return $return_array;	
	// }

	//query for delete location
	function delete_location($id)
	{
		$this->db->where('id', $id);
		   $query = $this->db->delete('locations');
		   return $query;
	}
	  
	//query for delete vendor type
	function delete_vendor_type($id)
	{
		$this->db->where('id', $id);
		   $query = $this->db->delete('vendor_type');
		   return $query;
	}
	//query for delete vehicle
	function delete_vehicle($id)
	{
		$this->db->where('id', $id);
		   $query = $this->db->delete('vehicle_type');
		   return $query;
	}
	//query for delete category
	function delete_category_type($id)
	{
		$this->db->where('id', $id);
		   $query = $this->db->delete('vendor_category');
		   return $query;
	}
	//query for delete reference
	function delete_reference($id)
	{
		$this->db->where('id', $id);
		   $query = $this->db->delete('reference');
		   return $query;
	}
	
	//query for delete enquiry_status
	function delete_enquiry_status($id)
	{
		$this->db->where('id', $id);
		   $query = $this->db->delete('enquiry_status');
		   return $query;
	}

	//query for delete accomodation
	function delete_accommodation($id)
	{
		$this->db->where('id', $id);
		   $query = $this->db->delete('accommodation');
		   return $query;
	}
	

}
?>