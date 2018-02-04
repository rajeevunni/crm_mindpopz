<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vendor extends CI_Controller 
{
	function __construct()
	{	
		parent::__construct();
		if($this->session->userdata('user_logged')=="yes:tracking_user" && $this->session->userdata('user_type')!=1 && $this->session->userdata('user_type')!=2)			// to prevent from unauthorised url access.
		{
			redirect(base_url().'index.php/Logout');
			exit;
		}		
		if($this->session->userdata('user_logged')=="")
		{
			redirect(base_url().'index.php/Home');
			exit;
		}
		$this->load->model('Vendor_model');
        $this->load->model('Generalsettings_model');
		date_default_timezone_set("Asia/Kolkata");		// set the default time zone.
    }

    function index()
	{	
		$show_data = array();	
		$show_data['error']=$this->session->userdata('error');
		$show_data['success']=$this->session->userdata('success');
		$this->clearmessage();		
		if(isset($_POST['add_vendor']))			// add vendors 
		{
			// echo "<pre>";
			// print_r($_POST); die;
			$info = array();
			$info['vendor_name']= $this->input->post('vendor_name');
			$info['location']= $this->input->post('location');
			$info['sub_location']= $this->input->post('sub_location');
			$info['type']= $this->input->post('type');
			$info['category']= $this->input->post('category');
			$info['priority']= $this->input->post('priority');
			$info['resort_contact']= $this->input->post('resort_contact');
			$info['primary_email']= $this->input->post('primary_email');
			$info['reservation_contact']= $this->input->post('reservation_contact');
			$info['reservation_email']= $this->input->post('reservation_email');
			$info['website']= $this->input->post('website');
			$info['number_rooms']= $this->input->post('number_rooms');
			$info['input_user']= $this->input->post('input_user');
			$info['resort_phone']= $this->input->post('resort_phone');
			$info['secondary_email']= $this->input->post('secondary_email');
			$info['reservation_phone']= $this->input->post('reservation_phone');
			$info['visited']= $this->input->post('visited');
			$info['trip_link']= $this->input->post('trip_link');
			$info['rating']= $this->input->post('rating');
			$info['remarks']= $this->input->post('remarks');
			$result = $this->Vendor_model->create_vendor_details($info);			// to insert vendor. 
			if($result>0)
			{
				$this->success('<p class="success">Vendor has been added successfully</p>');			// successfull mesage. 
				redirect('index.php/Vendor');			// redierction
				exit;					
			}
		}
		// if(isset($_POST['vendor_details']))			// add vendors 
		// {
		// 	$info = array();
		// 	$info['vendor_name']= $this->input->post('vendor_name');
		// 	$info['location']= $this->input->post('location');
		// 	$info['sub_location']= $this->input->post('sub_location');
		// 	$info['type']= $this->input->post('type');
		// 	$info['category']= $this->input->post('category');
		// 	$info['priority']= $this->input->post('priority');
		// 	$result = $this->Vendor_model->create_vendor_details($info);			// to insert vendor. 
		// 	if($result>0)
		// 	{
		// 		$this->success('<p class="success">Vendor details has been added successfully</p>');			// successfull mesage. 
		// 		redirect('index.php/Vendor');			// redierction
		// 		exit;					
		// 	}
		// }
		

		$condition = '';
		$show_data['all_vendor_category'] = $this->Vendor_model->getall_vendor_categories($condition);
		$show_data['all_vendor_type'] = $this->Vendor_model->getall_vendor_type($condition);
		$show_data['all_location'] = $this->Vendor_model->getall_location($condition);

		$show_data['name'] = $this->session->userdata('user_name');
		$show_data['propic'] = $this->session->userdata('profile_pic');

		// loading category view page 
		$this->load->view('add_vendor_view',$show_data);	
	}
	function edit_vendor_details($id=null)
	{
		if(isset($_POST['update_vendor_details']))
		{
			$info = array();
			$info['vendor_name']= $this->input->post('vendor_name');
			$info['location']= $this->input->post('location');
			$info['sub_location']= $this->input->post('sub_location');
			$info['type']= $this->input->post('type');
			$info['category']= $this->input->post('category');
			$info['priority']= $this->input->post('priority');
			$result = $this->Vendor_model->update_vendor_details($info, $id);
			if($result>0)
			{
				$this->success('<p class="success">Vendor details has been updated successfully</p>'); 
				redirect($_SERVER['HTTP_REFERER']);
				exit;					
			}
		}
		if(isset($_POST['update_vendor_information']))
		{
			$info = array();
			$info['resort_contact']= $this->input->post('resort_contact');
			$info['primary_email']= $this->input->post('primary_email');
			$info['reservation_contact']= $this->input->post('reservation_contact');
			$info['reservation_email']= $this->input->post('reservation_email');
			$info['website']= $this->input->post('website');
			$info['number_rooms']= $this->input->post('number_rooms');
			$info['input_user']= $this->input->post('input_user');
			$info['resort_phone']= $this->input->post('resort_phone');
			$info['secondary_email']= $this->input->post('secondary_email');
			$info['reservation_phone']= $this->input->post('reservation_phone');
			$info['visited']= $this->input->post('visited');
			$info['trip_link']= $this->input->post('trip_link');
			$info['rating']= $this->input->post('rating');	
			$info['remarks']= $this->input->post('remarks');
			$result = $this->Vendor_model->update_vendor_information($info, $id);
			if($result>0)
			{
				$this->success('<p class="success">Vendor information has been updated successfully</p>'); 
				redirect($_SERVER['HTTP_REFERER']);
				exit;					
			}
		}
		if(isset($_POST['add_accomodation']))			// add vendors 
		{
			$info = array();
			$info['vendor_id']= $id;
			$DateObj1 = new DateTime($this->input->post('start_date'));
			$start_date = $DateObj1->format('Y-m-d');
			$DateObj2 = new DateTime($this->input->post('end_date'));
			$end_date = $DateObj2->format('Y-m-d');
			$info['start_date']= $start_date;
			$info['occupents']= $this->input->post('occupents');
			$info['special_rate']= $this->input->post('special_rate');
			//$info['comm']= $this->input->post('comm');
			// $info['fridge']= $this->input->post('fridge');
			$info['end_date']= $end_date;
			$info['food_plan']= $this->input->post('food_plan');
			$info['extra_bed']= $this->input->post('extra_bed');
			$info['currency']= $this->input->post('currency');
			// $info['tv']= $this->input->post('tv');
			$info['room_type']= $this->input->post('room_type');
			$info['rack_rate']= $this->input->post('rack_rate');
			$info['extra_child']= $this->input->post('extra_child');
			$info['ac']= $this->input->post('ac');
			$result = $this->Vendor_model->create_accomodation_details($info);
			if($result>0)
			{
				$this->success('<p class="success">Accomodation details has been added successfully</p>');			// successfull mesage. 
				redirect($_SERVER['HTTP_REFERER'].'#acomadation');
				exit;
			}
		}
		if(isset($_POST['edit_accommodation']))			// add vendors 
		{
			$info = array();
			$vendor_id= $this->input->post('vendor_id');
			// $DateObj1 = new DateTime($this->input->post('start_date'));
			// $start_date = $DateObj1->format('Y-m-d');
			// $DateObj2 = new DateTime($this->input->post('end_date'));
			// $end_date = $DateObj2->format('Y-m-d');
			// $info['start_date']= $start_date;
			$info['occupents']= $this->input->post('occupents');
			$info['special_rate']= $this->input->post('special_rate');
			//$info['comm']= $this->input->post('comm');
			// $info['fridge']= $this->input->post('fridge');
			// $info['end_date']= $end_date;
			$info['food_plan']= $this->input->post('food_plan');
			$info['extra_bed']= $this->input->post('extra_bed');
			$info['currency']= $this->input->post('currency');
			// $info['tv']= $this->input->post('tv');
			$info['room_type']= $this->input->post('room_type');
			$info['rack_rate']= $this->input->post('rack_rate');
			$info['extra_child']= $this->input->post('extra_child');
			$info['ac']= $this->input->post('ac');
			$result = $this->Vendor_model->update_accomodation($info, $vendor_id);
			if($result>0)
			{
				$this->success('<p class="success">Accomodation details has been updated successfully</p>');			// successfull mesage. 
				redirect($_SERVER['HTTP_REFERER'].'#acomadation');
				exit;
			}
		}
		$show_data = array();	
		$show_data['error']='';
		$show_data['success']=$this->session->userdata('success');
        $this->clearmessage();
		$show_data['all_accommodation_details'] = $this->Vendor_model->getall_accommodations("WHERE vendor_id='".$id."'");
		$fill_data = $this->Vendor_model->getinduvidal_vendor_details("WHERE vd.id='".$id."'");
		$show_data['filled_data'] = $fill_data;
		$condition = '';
		$show_data['all_location'] = $this->Vendor_model->getall_location($condition);
		$show_data['all_vendor_category'] = $this->Vendor_model->getall_vendor_categories($condition);
		$show_data['all_vendor_type'] = $this->Vendor_model->getall_vendor_type($condition);
		$show_data['name'] = $this->session->userdata('user_name');
		$show_data['propic'] = $this->session->userdata('profile_pic');

		// loading category view page 
		$this->load->view('edit_vendor_details',$show_data);	
	}
	function search_vendor()
	{	
		$condition = '';
		$show_data = array();	
		$show_data['error']='';
		$show_data['success']=$this->session->userdata('success');
		$this->clearmessage();
		
			  
	   $condition_array = array();
	   if(isset($_GET['filter_vendor']))
	   {
		   
		   if($this->input->get('vendor_name'))
		   {
			   array_push($condition_array," vendor_name LIKE '%".$this->input->get('vendor_name')."%'");
		   }
		   if($this->input->get('location'))
		   {
			   array_push($condition_array," vd.location =".$this->input->get('location'));
		   }
	   		if($this->input->get('sub_location'))
		   {                array_push($condition_array," sub_location LIKE '%".$this->input->get('sub_location')."%'");
		   }
		   if($this->input->get('type'))
		  {
			   array_push($condition_array," type LIKE '%".$this->input->get('type')."%'");
		   }
		   if($this->input->get('category'))
		   {
			   array_push($condition_array," category LIKE '%".$this->input->get('category')."%'");
		   }
		   
	   } 
	   $show_data['filter_vendor_details'] = $this->Vendor_model->filter_vendor_details($condition_array);
	   $condition="";
	   $show_data['all_vendor_details'] = $this->Vendor_model->getall_vendor_details($condition);
	   $show_data['all_vendor_category'] = $this->Vendor_model->getall_vendor_categories($condition);
	   $show_data['all_vendor_type'] = $this->Vendor_model->getall_vendor_type($condition);
	   $show_data['all_location'] = $this->Vendor_model->getall_location($condition);
	   $show_data['name'] = $this->session->userdata('user_name');
	   $show_data['propic'] = $this->session->userdata('profile_pic');
	   
	   // loading category view page 
	   $this->load->view('search_vendor_view',$show_data);	
    }
	function search_accomodation()
	{	
		$show_data['error']='';
		$show_data['success']=$this->session->userdata('success');
		$this->clearmessage();

		// Download Guest Section
		$condition_array_download = array();
		if(isset($_GET['download_excel']))
        { 
            if($this->input->get('vendor_name'))
			{
				array_push($condition_array_download," vd.vendor_name LIKE '%".$this->input->get('vendor_name')."%'");
			}
			if($this->input->get('location'))
			{
				array_push($condition_array_download," vd.location =".$this->input->get('location'));
			}
			if($this->input->get('sub_location'))
			{
				array_push($condition_array_download," sub_location LIKE '%".$this->input->get('sub_location')."%'");
			}
			if($this->input->get('special_rate_min') && $this->input->get('special_rate_max'))
			{
				array_push($condition_array_download," special_rate BETWEEN '".$this->input->get('special_rate_min')."' AND '".$this->input->get('special_rate_max')."'");
			}
			if($this->input->get('type'))
			{
				array_push($condition_array_download," type LIKE '%".$this->input->get('type')."%'");
			}
			if($this->input->get('category'))
			{
				array_push($condition_array_download," category LIKE '%".$this->input->get('category')."%'");
			}
			if($this->input->get('room_type'))
			{
				array_push($condition_array_download," room_type LIKE '%".$this->input->get('room_type')."%'");
			}
			if($this->input->get('accomodation_start_date') || $this->input->get('accomodation_end_date'))
			{
				$START_QUERY = date('Y-m-d',strtotime($this->input->get('accomodation_start_date')));
				$END_QUERY = date('Y-m-d',strtotime($this->input->get('accomodation_end_date')));
				array_push($condition_array_download,
				" ( (start_date BETWEEN '".$START_QUERY."' AND '".$END_QUERY."') OR 
				(end_date BETWEEN '".$START_QUERY."' AND '".$END_QUERY."') OR 
				(start_date <= '".$START_QUERY."' AND end_date >= '".$END_QUERY."') )");
			}

			$filter_result = $this->Vendor_model->filter_accomodation_details($condition_array_download);
			// echo "<pre>"; print_r($filter_result); 

			if (!file_exists('timesheet/employee_registration_details/download_sheet'))
			{
				mkdir('timesheet/employee_registration_details/download_sheet', 0777, true);
			}

			$folder = 'timesheet/employee_registration_details/download_sheet';

			$this->load->helper('amountinwords');
			$this->load->helper(array('timesheet', 'file'));

			$name = 'accomodation_details';

			$result = download_accomodation_details($folder, $name, $filter_result);

			if ($result != '')
			{
				redirect(base_url() . 'timesheet/employee_registration_details/download_sheet/' . $result . '.xlsx');
				exit();
			}
		}

	   $condition_array = array();
	   if(isset($_GET['filter_accomodation']))
	   {
			if($this->input->get('vendor_name'))
			{
				array_push($condition_array," vd.vendor_name LIKE '%".$this->input->get('vendor_name')."%'");
			}
			if($this->input->get('location'))
			{
				array_push($condition_array," vd.location =".$this->input->get('location'));
			}
			if($this->input->get('sub_location'))
			{
				array_push($condition_array," sub_location LIKE '%".$this->input->get('sub_location')."%'");
			}
			if($this->input->get('special_rate_min') && $this->input->get('special_rate_max'))
			{
				array_push($condition_array," special_rate BETWEEN '".$this->input->get('special_rate_min')."' AND '".$this->input->get('special_rate_max')."'");
			}
			if($this->input->get('type'))
			{
				array_push($condition_array," type LIKE '%".$this->input->get('type')."%'");
			}
			if($this->input->get('category'))
			{
				array_push($condition_array," category LIKE '%".$this->input->get('category')."%'");
			}
			if($this->input->get('room_type'))
			{
				array_push($condition_array," room_type LIKE '%".$this->input->get('room_type')."%'");
			}
			if($this->input->get('accomodation_start_date') || $this->input->get('accomodation_end_date'))
			{
				$START_QUERY = date('Y-m-d',strtotime($this->input->get('accomodation_start_date')));
				$END_QUERY = date('Y-m-d',strtotime($this->input->get('accomodation_end_date')));
				array_push($condition_array,
				"  ( (start_date BETWEEN '".$START_QUERY."' AND '".$END_QUERY."') OR 
				(end_date BETWEEN '".$START_QUERY."' AND '".$END_QUERY."') OR 
				(start_date <= '".$START_QUERY."' AND end_date >= '".$END_QUERY."') )");
			}
	   } 
	   $show_data['filter_accomodation_details'] = $this->Vendor_model->filter_accomodation_details($condition_array);
	   // echo "<pre>"; print_r($this->Vendor_model->filter_accomodation_details($condition_array)); die;
		$condition = "";
		$show_data['all_accommodation_details'] = $this->Vendor_model->getall_accommodations($condition);
		
		$show_data['name'] = $this->session->userdata('user_name');
		$show_data['propic'] = $this->session->userdata('profile_pic');
	   
	   $show_data['all_vendor_category'] = $this->Vendor_model->getall_vendor_categories($condition);
	   $show_data['all_vendor_type'] = $this->Vendor_model->getall_vendor_type($condition);
	   $show_data['all_location'] = $this->Vendor_model->getall_location($condition);

		// loading category view page 
		$this->load->view('search_accomodation_view',$show_data);	
	}
	function edit_accommodtion($id)
	{
		if(isset($_POST['update_accomodation']))
		{
			$info = array();
			$DateObj1 = new DateTime($this->input->post('start_date'));
			$start_date = $DateObj1->format('Y-m-d');
			$DateObj2 = new DateTime($this->input->post('end_date'));
			$end_date = $DateObj2->format('Y-m-d');
			$info['start_date']= $start_date;
			$info['occupents']= $this->input->post('occupents');
			$info['special_rate']= $this->input->post('special_rate');
			// $info['comm']= $this->input->post('comm');
			$info['fridge']= $this->input->post('fridge');
			$info['end_date']= $end_date;
			$info['food_plan']= $this->input->post('food_plan');
			$info['extra_bed']= $this->input->post('extra_bed');
			$info['currency']= $this->input->post('currency');
			$info['tv']= $this->input->post('tv');
			$info['room_type']= $this->input->post('room_type');
			$info['rack_rate']= $this->input->post('rack_rate');
			$info['extra_child']= $this->input->post('extra_child');
			$info['ac']= $this->input->post('ac');
			$result = $this->Vendor_model->update_accomodation($info, $id);
			if($result>0)
			{
				$this->success('<p class="success">Accomodation details has been updated successfully</p>');			// successfull mesage. 
				redirect($_SERVER['HTTP_REFERER']);
				exit;
			}
		}

		$show_data = array();	
		$show_data['error']='';
		$show_data['success']=$this->session->userdata('success');
        $this->clearmessage();
		
		$fill_data = $this->Vendor_model->getinduvidal_accommodation("WHERE id='".$id."'");
		$show_data['filled_data'] = $fill_data;
		$show_data['name'] = $this->session->userdata('user_name');
		$show_data['propic'] = $this->session->userdata('profile_pic');

		// loading category view page 
		$this->load->view('edit_accomodation_view',$show_data);	
	}
	function add_crm()
	{	
		if(isset($_POST['add_crm']))
		{
			$user_info = array();
			$user_info['f_name'] = $this->input->post('f_name');
			$user_info['l_name'] = $this->input->post('l_name');
			$user_info['email'] = $this->input->post('email');
			$user_info['primary_contact_no'] = $this->input->post('contact_no1');
			$user_info['secondary_contact_no'] = $this->input->post('contact_no2');
			$result = $this->Vendor_model->create_internal_user($user_info);
			if ($result > 0) {

				$user_credential['user_role_type'] = 2;
				$user_credential['employee_code'] = 'CRM-T-' . str_pad($result, 3, '0', STR_PAD_LEFT);
				$user_credential['username'] = $this->input->post('email');
				$password = 'abc123AB';
				$user_credential['password'] = md5($password);
				$user_credential['status'] = 1;
				$user_credential['created_date'] = date('Y-m-d h:i:s');
				$uresult = $this->Vendor_model->create_internal_userlogin($user_credential);
				if($uresult>0)
				{
					$userid = array();
					$userid['user_id'] = $uresult;
					$userid_update_result = $this->Vendor_model->update_internal_user($userid, $result);
					$this->success('<p class="success">CRM has been added successfully</p>');
					redirect($_SERVER['HTTP_REFERER']);
					exit;					
				}
			}
		}
		if(isset($_POST['edit_crm']))
		{
			$user_info = array();
			$employee_id = $this->input->post('employee_id');
			$user_info['f_name'] = $this->input->post('f_name');
			$user_info['l_name'] = $this->input->post('l_name');
			// $user_info['email'] = $this->input->post('email');
			$user_info['primary_contact_no'] = $this->input->post('contact_no1');
			$user_info['secondary_contact_no'] = $this->input->post('contact_no2');
			$result = $this->Vendor_model->update_internal_user($user_info, $employee_id);

			$user_id = $this->input->post('user_id');
			$info['status'] = $this->input->post('estatus');
			$result1 = $this->Vendor_model->update_emp_role_type($info, $user_id);
			if ($result > 0 || $result > 0) {
				$this->success('<p class="success">CRM has been updated successfully</p>');
				redirect($_SERVER['HTTP_REFERER']);
				exit;					
			}
		}
		
		$show_data = array();	
		$show_data['error']='';
		$show_data['success']=$this->session->userdata('success');
		$this->clearmessage();

		$condition="  WHERE u.id!=1";
		$show_data['crm_details'] = $this->Vendor_model->getall_crm($condition);
		
		$show_data['name'] = $this->session->userdata('user_name');
		$show_data['propic'] = $this->session->userdata('profile_pic');

		// loading category view page 
		$this->load->view('add_crm_view',$show_data);	
	}
	function edit_crm()
    {
		if (isset($_POST['user_id']) && $_POST['user_id'] != '')
		{
			$user_id = $this->input->post('user_id');
			
			$condition = ' WHERE u.id='.$user_id;
			$user_details= $this->Vendor_model->getinduidual_crm($condition);
			$show_data['user_details'] = $user_details;
			$disableselect = $user_details['emp_status'] == 0 ? 'selected' : '';
			$show_data['disableselect'] = $disableselect;
			$enableselect = $user_details['emp_status'] == 1 ? 'selected' : '';
			$show_data['enableselect'] = $enableselect;
			$CreatedDTObj = new DateTime($user_details['created_date']);
			$createddatetime = $CreatedDTObj->format('d-m-Y H:i:s');
			$show_data['createddatetime'] = $createddatetime;
			$this->load->view('popup_crm_edit_view', $show_data);
		}
       
    }
	
	function delete_vendor()
	{
		if(isset($_POST['vendor_id']))
		{
			$guest_id= $_POST['vendor_id'];
			$this->Vendor_model->delete_vendor($guest_id);
			redirect($_SERVER['HTTP_REFERER']);
		}	
	}

	function delete_crm()
	{
		if(isset($_POST['guest_id']))
		{
			$guest_id= $_POST['guest_id'];
			$this->Vendor_model->delete_crm($guest_id);
			redirect($_SERVER['HTTP_REFERER']);
		}	
	}
	

	function get_download_sheet()
    {
        $show_data = array();
        $show_data['error'] = '';
        $show_data['success'] = $this->session->userdata('success');
        $this->clearmessage();

        if (!file_exists('timesheet/employee_registration_details/download_sheet')) {
            mkdir('timesheet/employee_registration_details/download_sheet', 0777, true);
        }

        $folder = 'timesheet/employee_registration_details/download_sheet';

        $this->load->helper('amountinwords');
        $this->load->helper(array('timesheet', 'file'));

        $name = 'vendor_details_uploadsheet';
        $result = create_vendor_details($folder, $name);

        if ($result != '') {
            redirect(base_url() . 'timesheet/employee_registration_details/download_sheet/' . $result . '.xlsx', 0777, true);
            exit();
        }
	}
	
	function upload_vendor_details()
    {
		$show_data['vendor_id'] = $this->input->post('vendor_id');
        $this->load->view('popup_vendor_bulkupload', $show_data);
	}
	
	function vendor_bulkupload()
    {
        $show_data = array();
        $show_data['error'] = '';
        $show_data['success'] = $this->session->userdata('success');
		$this->clearmessage();
		$vendor_id = $this->input->post('vendor_id');

        if(isset($_FILES['file_upload']['name']) && $_FILES['file_upload']['name']!='') {
            if (!file_exists('timesheet/employee_registration_details/upload_sheet')) {
                mkdir('timesheet/employee_registration_details/upload_sheet', 0777, true);
            }
            $uploaddir = 'timesheet/employee_registration_details/upload_sheet';
            $file = $uploaddir . $_FILES['file_upload']['name'];
            $file_name = $_FILES['file_upload']['name'];

            if (move_uploaded_file($_FILES['file_upload']['tmp_name'], $file)) {
                $this->load->helper(array('timesheet', 'file'));
				$upload_array = read_sheet($file);
				// echo "<pre>"; print_r($upload_array); die;
                $upload_info = array();

                for ($index = 2; sizeof($upload_array) >= $index; $index++) {
                   if ($upload_array[$index]['A'] == '')
                   {
                    	break;
                   }
                   $data = array();
                   $data = array(
                        'sl_no' => $upload_array[$index]['A'],
                        'start_date' => $upload_array[$index]['B'],
                        'end_date' => $upload_array[$index]['C'],
                        'room_type' => $upload_array[$index]['D'],
                        'occupants' => $upload_array[$index]['E'],
                        'food_plan' => $upload_array[$index]['F'],
						'rack_rate' => $upload_array[$index]['G'],
						'special_rate' => $upload_array[$index]['H'],
                        'extra_bed' => $upload_array[$index]['I']
                    );
                    array_push($upload_info, $data);
                }

                if (sizeof($upload_info) > 0 && $index > 2) {
                    foreach ($upload_info as $upload_details) {
                        $user_info = array(
							'vendor_id' => $vendor_id, 
                            'start_date' => $this->convertounix($upload_details['start_date']), 
                            'end_date' => $this->convertounix($upload_details['end_date']),
                            'room_type' => $upload_details['room_type'], 
                            'occupents' => $upload_details['occupants'],
                            'food_plan' => $upload_details['food_plan'], 
							'rack_rate' => $upload_details['rack_rate'], 
							'special_rate' => $upload_details['special_rate'], 
                            'extra_bed' => $upload_details['extra_bed'],
						);
						// echo "<pre>"; print_r($user_info); die;
                        $temp_result = $this->Vendor_model->create_accomodation_details($user_info);
                    }
                }
            }
        }
		$this->success('<p class="success">Accommodation deatils are uploaded successfully</p>');
		redirect($_SERVER['HTTP_REFERER']);
		exit;
	}

	private function convertounix($time_stamp)
	{
		$excel_date = $time_stamp; //here is that value 41621 or 41631
		$unix_date = ($excel_date - 25569) * 86400;
		$excel_date = 25569 + ($unix_date / 86400);
		$unix_date = ($excel_date - 25569) * 86400;
		return gmdate("Y-m-d", $unix_date);
	}
	
	function edit_accommodation(){
		$accom_id = $this->input->post('trid');
		$condition = " WHERE id=".$accom_id;
		$show_data['accom_details'] = $this->Vendor_model->getinduvidal_accommodation($condition);
        $this->load->view('popup_edit_accommodation', $show_data);

	}
	
    // private function to load the success message in the view page.
	private function success($message)
	{
		$userdata = array(
			'success'    => $message
		);
		$this->session->set_userdata($userdata);		
	}
	// private function to load the clear message in the view page.
	private function clearmessage()
	{
		$userdata = array(
			'success'    => '',
            'error'    => ''
		);
		$this->session->set_userdata($userdata);
	}
	// setting registered category in session
	private function creating_registeredCategorySession($registered_category)
	{
		$userdata = array(
							'registered_category' => $registered_category
						);
		$this->session->set_userdata($userdata);		
	}

	function add_location()
	{	
		if(isset($_POST['add_location']))
		{
			$user_info = array();
			if(empty($this->input->post('location')) || trim($this->input->post('location')=='')){
                $this->error('<p class="error">Please enter location name</p>');
                redirect($_SERVER['HTTP_REFERER'].'#location');
                exit;
            }
			$user_info['location'] = $this->input->post('location');
			$result = $this->Vendor_model->create_location($user_info);
			if ($result > 0) {
				$this->success('<p class="success">Location has been added successfully</p>');
				redirect($_SERVER['HTTP_REFERER'].'#location');
				exit;					
			}else{
				$this->error('<p class="error">Duplicate value is not allowed</p>');
				redirect($_SERVER['HTTP_REFERER'].'#location');
				exit;
			}
		}
		if(isset($_POST['edit_location']))
		{
			$user_info = array();
            if(empty($this->input->post('location')) || trim($this->input->post('location')=='')){
                $this->error('<p class="error">Please enter location name</p>');
                redirect($_SERVER['HTTP_REFERER'].'#location');
                exit;
            }
			$id = $this->input->post('location_id');
			$user_info['location'] = $this->input->post('location');
			$result = $this->Vendor_model->update_location($user_info, $id); 
			if ($result > 0) {
				$this->success('<p class="success">Location has been updated successfully</p>');
				redirect($_SERVER['HTTP_REFERER'].'#location');
				exit;					
			}else{
				$this->error('<p class="error">This entry already exists</p>');
				redirect($_SERVER['HTTP_REFERER'].'#location');
				exit;
			}
		}

		if(isset($_POST['add_vendor_type']))
		{
			$user_info = array();
            if(empty($this->input->post('vendor_type')) || trim($this->input->post('vendor_type')=='')){
                $this->error('<p class="error">Please enter vendor type</p>');
                redirect($_SERVER['HTTP_REFERER'].'#type');
                exit;
            }
			$user_info['type_name'] = $this->input->post('vendor_type');
			$result = $this->Vendor_model->create_vendor_type($user_info);
			if ($result > 0) {
				$this->success('<p class="success">Vendor Type has been added successfully</p>');
				redirect($_SERVER['HTTP_REFERER'].'#type');
				exit;					
			}else{
				$this->error('<p class="error">Duplicate entry is not allowed</p>');
				redirect($_SERVER['HTTP_REFERER'].'#type');
				exit;
			}
		}
		if(isset($_POST['add_reference']))
		{
			$user_info = array();
            if(empty($this->input->post('reference')) || trim($this->input->post('reference')=='')){
                $this->error('<p class="error">Please enter reference</p>');
                redirect($_SERVER['HTTP_REFERER'].'#reference');
                exit;
            }
			$user_info['reference_name'] = $this->input->post('reference');
			$result = $this->Vendor_model->create_reference($user_info);
			if ($result > 0) {
				$this->success('<p class="success">Reference has been added successfully</p>');
				redirect($_SERVER['HTTP_REFERER'].'#reference');
				exit;					
			}else{
				$this->error('<p class="error">Duplicate entry is not allowed</p>');
				redirect($_SERVER['HTTP_REFERER'].'#reference');
				exit;
			}
		}
		if(isset($_POST['edit_reference']))
		{
			$user_info = array();
            if(empty($this->input->post('reference')) || trim($this->input->post('reference')=='')){
                $this->error('<p class="error">Please enter reference</p>');
                redirect($_SERVER['HTTP_REFERER'].'#reference');
                exit;
            }
			$id = $this->input->post('reference_id');
			$user_info['reference_name'] = $this->input->post('reference');
			$result = $this->Vendor_model->update_reference($user_info, $id);
			if ($result > 0) {
				$this->success('<p class="success">Reference has been updated successfully</p>');
				redirect($_SERVER['HTTP_REFERER'].'#reference');
				exit;					
			}
		}
		//vehicle type
		if(isset($_POST['add_vehicle_type']))
		{
			$user_info = array();
            if(empty($this->input->post('vehicle_type')) || trim($this->input->post('vehicle_type')=='')){
                $this->error('<p class="error">Please enter vehicle type</p>');
                redirect($_SERVER['HTTP_REFERER'].'#vehicle');
                exit;
            }
			$user_info['vehicle_type'] = $this->input->post('vehicle_type');
			$result = $this->Vendor_model->create_vehicle_type($user_info);
			if ($result > 0) {
				$this->success('<p class="success">Vehicle Type has been added successfully</p>');
				redirect($_SERVER['HTTP_REFERER'].'#vehicle');
				exit;					
			}else{
				$this->error('<p class="error">Duplicate entry not allowed</p>');
				redirect($_SERVER['HTTP_REFERER'].'#vehicle');
				exit;
			}
		}
		// adding vendor category
		if(isset($_POST['add_vendor_category']))
		{
			$user_info = array();
            if(empty($this->input->post('vendor_category')) || trim($this->input->post('vendor_category')=='')){
                $this->error('<p class="error">Please enter vendor category</p>');
                redirect($_SERVER['HTTP_REFERER'].'#category');
                exit;
            }
			$user_info['category_name'] = $this->input->post('vendor_category');
			$result = $this->Vendor_model->create_vendor_category($user_info);
			if ($result > 0) {
				$this->success('<p class="success">Vendor Category has been added successfully</p>');
				redirect($_SERVER['HTTP_REFERER'].'#category');
				exit;					
			}else{
				$this->error('<p class="error">Duplicate entry not allowed</p>');
				redirect($_SERVER['HTTP_REFERER'].'#category');
				exit;
			}
		}
		
		if(isset($_POST['add_status']))
		{
			$user_info = array();
            if(empty($this->input->post('enquiry_status')) || trim($this->input->post('enquiry_status')=='')){
                $this->error('<p class="error">Please enter enquiry status</p>');
                redirect($_SERVER['HTTP_REFERER'].'#status');
                exit;
            }
			$user_info['enquiry_status'] = $this->input->post('enquiry_status');
			$result = $this->Vendor_model->create_enquiry($user_info);
			if ($result > 0) {
				$this->success('<p class="success">Enquiry status has been added successfully</p>');
				redirect($_SERVER['HTTP_REFERER'].'#status');
				exit;					
			}else{
				$this->error('<p class="error">Duplicate entry not allowed</p>');
				redirect($_SERVER['HTTP_REFERER'].'#status');
				exit;
			}
		}

		if(isset($_POST['edit_vendor_type']))
		{
			$user_info = array();
            if(empty($this->input->post('vendor_type')) || trim($this->input->post('vendor_type')=='')){
                $this->error('<p class="error">Please enter vendor type</p>');
                redirect($_SERVER['HTTP_REFERER'].'#type');
                exit;
            }
			$vendor_type_id = $this->input->post('vendor_type_id');
			$user_info['type_name'] = $this->input->post('vendor_type');

			$result = $this->Vendor_model->update_vendor_type($user_info, $vendor_type_id);
			if ($result > 0) {
				$this->success('<p class="success">Vendor Type has been updated successfully</p>');
				redirect($_SERVER['HTTP_REFERER'].'#type');
				exit;					
			}
		}
		if(isset($_POST['edit_vehicle']))
		{
			$user_info = array();
            if(empty($this->input->post('vehicle_type')) || trim($this->input->post('vehicle_type')=='')){
                $this->error('<p class="error">Please enter vehicle type</p>');
                redirect($_SERVER['HTTP_REFERER'].'#vehicle');
                exit;
            }
			$vehicle_id = $this->input->post('vehicle_id');
			$user_info['vehicle_type'] = $this->input->post('vehicle_type');
			$result = $this->Vendor_model->update_vehicle($user_info, $vehicle_id);
			if ($result > 0) {
				$this->success('<p class="success">	Vehicle has been updated successfully</p>');
				redirect($_SERVER['HTTP_REFERER'].'#vehicle');
				exit;					
			}
		}
		if(isset($_POST['edit_category']))
		{
			$user_info = array();
            if(empty($this->input->post('category_name')) || trim($this->input->post('category_name')=='')){
                $this->error('<p class="error">Please enter Category</p>');
                redirect($_SERVER['HTTP_REFERER'].'#category');
                exit;
            }
			$category_id = $this->input->post('category_id');
			$user_info['category_name'] = $this->input->post('category_name');
			$result = $this->Vendor_model->update_category($user_info, $category_id);
			if ($result > 0) {
				$this->success('<p class="success">	Category has been updated successfully</p>');
				redirect($_SERVER['HTTP_REFERER'].'#category');
				exit;					
			}
		}

		if(isset($_POST['edit_status']))
		{
			$user_info = array();
            if(empty($this->input->post('status_name')) || trim($this->input->post('status_name')=='')){
                $this->error('<p class="error">Please enter Status</p>');
                redirect($_SERVER['HTTP_REFERER'].'#status');
                exit;
            }
			// print_r($_POST);
			// die();
			$id = $this->input->post('status_id');
			$user_info['enquiry_status'] = $this->input->post('status_name');
			$result = $this->Vendor_model->update_enquiry_status($user_info, $id);
			if ($result > 0) {
				$this->success('<p class="success">	Enquiry has been updated successfully</p>');
				redirect($_SERVER['HTTP_REFERER'].'#status');
				exit;					
			}
		}

		$show_data = array();	
		$show_data['error']=$this->session->userdata('error');
		$show_data['success']=$this->session->userdata('success');
		$this->clearmessage();

		$condition="";
		$show_data['location_details'] = $this->Vendor_model->getall_location($condition);
		$show_data['vendor_type_details'] = $this->Vendor_model->getall_vendor_type($condition);
		$show_data['vehicle_type_details'] = $this->Vendor_model->getall_vehicle_type($condition);
		$show_data['all_vendor_category'] = $this->Vendor_model->getall_vendor_categories($condition);
		$show_data['reference_details'] = $this->Vendor_model->getall_reference($condition);
		$show_data['enquiry_status'] = $this->Vendor_model->getall_status($condition);
		
		
		$show_data['name'] = $this->session->userdata('user_name');
		$show_data['propic'] = $this->session->userdata('profile_pic');

		// loading category view page 
		$this->load->view('add_location_view',$show_data);	
	}

	function edit_location()
    {
		if (isset($_POST['id']) && $_POST['id'] != '')
		{
			$id = $this->input->post('id');
			$condition = ' WHERE id='.$id;
			$user_details= $this->Vendor_model->getinduidual_location($condition);
			$show_data['user_details'] = $user_details;
			// echo "<pre>";
			// print_r($show_data);
			// die();
			$this->load->view('popup_location_edit_view', $show_data);
		}
       
	}

	function edit_vehicle()
    {
		if (isset($_POST['id']) && $_POST['id'] != '')
		{
			$id = $this->input->post('id');
			$condition = ' WHERE id='.$id;
			$user_details= $this->Vendor_model->getinduidual_vehicle($condition);
			$show_data['user_details'] = $user_details;
			// echo "<pre>";
			// print_r($show_data);
			// die();
			$this->load->view('popup_vehicle_view', $show_data);
		}
       
    }
	function edit_vendor_type()
    {
		if (isset($_POST['id']) && $_POST['id'] != '')
		{
			$id = $this->input->post('id');
			$condition = ' WHERE id='.$id;
			$user_details= $this->Vendor_model->getinduidual_vendor_type($condition);
			$show_data['user_details'] = $user_details;
			// echo "<pre>";
			// print_r($show_data);
			// die();
			$this->load->view('popup_vendor_type', $show_data);
		}
       
    }
	function edit_category_type()
    {
		if (isset($_POST['id']) && $_POST['id'] != '')
		{
			$id = $this->input->post('id');
			$condition = ' WHERE id='.$id;
			$user_details= $this->Vendor_model->getinduidual_category($condition);
			$show_data['user_details'] = $user_details;
			// echo "<pre>";
			// print_r($show_data);
			// die();
			$this->load->view('popup_category_view', $show_data);
		}
       
	}
	function edit_reference()
    {
		if (isset($_POST['id']) && $_POST['id'] != '')
		{
			$id = $this->input->post('id');
			$condition = ' WHERE id='.$id;
			$user_details= $this->Vendor_model->getinduidual_reference($condition);
			$show_data['user_details'] = $user_details;
			$this->load->view('popup_reference_edit_view', $show_data);
		}
       
	}
	function edit_status()
    {
		if (isset($_POST['id']) && $_POST['id'] != '')
		{
			$id = $this->input->post('id');
			$condition = ' WHERE id='.$id;
			$user_details= $this->Vendor_model->getinduidual_enquiry_status($condition);
			$show_data['user_details'] = $user_details;
			$this->load->view('popup_status_edit_view', $show_data);
		}
       
	}
	//delete the location
	function delete_location()
	{
		if(isset($_POST['location_id']))
		{
			$location_id= $_POST['location_id'];
			$this->Vendor_model->delete_location($location_id);
			redirect($_SERVER['HTTP_REFERER']);
		}	
	}
	//delete the vendor type
	function delete_vendor_type()
	{
		if(isset($_POST['vendor_type_id']))
		{
			$guest_id= $_POST['vendor_type_id'];
			$this->Vendor_model->delete_vendor_type($guest_id);
			redirect($_SERVER['HTTP_REFERER']);
		}	
	}
	//delete the vehicle type
	function delete_vehicle()
	{
		if(isset($_POST['vehicle_id']))
		{
			$vehicle_id= $_POST['vehicle_id'];
			// print_r($vehicle_id);
			// die();	
			$this->Vendor_model->delete_vehicle($vehicle_id);
			redirect($_SERVER['HTTP_REFERER']);
		}	
	}
	//delete the category
	function delete_category_type()
	{
		if(isset($_POST['vendor_category_id']))
		{
			$vendor_category_id= $_POST['vendor_category_id'];
			$this->Vendor_model->delete_category_type($vendor_category_id);
			redirect($_SERVER['HTTP_REFERER']);
		}	
	}
	//delete the reference
	function delete_reference()
	{
		if(isset($_POST['reference_id']))
		{
			$reference_id= $_POST['reference_id'];
			$this->Vendor_model->delete_reference($reference_id);
			redirect($_SERVER['HTTP_REFERER']);
		}	
	}
	//delete the enquiry status
	function delete_enquiry_status()
	{
		if(isset($_POST['status_id']))
		{
			$status_id= $_POST['status_id'];
			$this->Vendor_model->delete_enquiry_status($status_id);
			redirect($_SERVER['HTTP_REFERER']);
		}	
	}
    // private function to load the error message in the view page.
    private function error($message)
    {
        $userdata = array(
            'error'    => $message
        );
        $this->session->set_userdata($userdata);
    }
	//delete the accomodation
	function delete_accommodation()
	{
		if(isset($_POST['accommodation_id']))
		{
			$accommodation_id= $_POST['accommodation_id'];
			$this->Vendor_model->delete_accommodation($accommodation_id);
			redirect($_SERVER['HTTP_REFERER']);
		}	
	}
}