<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guest extends CI_Controller 
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
		$this->load->model('Guest_model');
		$this->load->model('Generalsettings_model');
		date_default_timezone_set("Asia/Kolkata");		// set the default time zone.
    }

    function index()
	{	
		
		/*	 If POST is set add guest else load the page	*/
		if(isset($_POST['add_guest_enquiry']))			// add vendors 
		{			
			$info = array();			
			$info['guest_name']= $this->input->post('guest_name');
			$info['guest_email']= $this->input->post('guest_email');
			$info['guest_address1']= $this->input->post('guest_address1');
			$info['guest_city']= $this->input->post('guest_city');
			$info['guest_mobile']= $this->input->post('guest_mobile');
			$info['guest_alt_email']= $this->input->post('guest_alt_email');
			$info['guest_address2']= $this->input->post('guest_address2');
			$info['state']= $this->input->post('state');
			$info['guest_alt_mobile']= $this->input->post('guest_alt_mobile');
			$info['input_user']= $this->input->post('input_user');
			$info['guest_country']= $this->input->post('guest_country');
			// $info['guest_details_ref'] = uniqid();
			// $info['guest_enquiry_ref'] = uniqid();
			$info['enquiry_date'] = date('Y-m-d');


			$info['enquiry_reference'] = $this->input->post('enquiry_reference');
			$info['enquiry_ext_rfn_no'] = $this->input->post('enquiry_ext_rfn_no');
			$info['enquiry_status'] = $this->input->post('enquiry_status');
			$info['booking_amount'] = $this->input->post('booking_amount');
			$info['booking_date'] = date('Y-m-d');
			$info['call_back_date'] = $this->input->post('call_back_date');
			$info['call_back_time'] = $this->input->post('call_back_time');
			$info['enquiry_crm'] = $this->input->post('enquiry_crm');
			$info['enquiry_input_by'] = $this->input->post('enquiry_input_by');
			$info['enquiry_remarks'] = $this->input->post('enquiry_remarks');
			$result = $this->Guest_model->create_guest($info);			// to insert vendor.

			if($result>0)
			{
				$guest_uniq = 10000;
				$enq_uniq = 200000000;
				$info_data = array();
				$info_data['guest_details_ref'] = $guest_uniq.$result;
				$info_data['guest_enquiry_ref'] = $enq_uniq.$result;
				$this->Guest_model->update_guest_enquiry($info_data, $result);
				$this->success('<p class="success">Guest enquiry has been added successfully</p>');			// successfull mesage. 
				redirect('index.php/Guest');
				exit;					
			}
		}		

		$show_data = array();	
		$show_data['error']='';
		$show_data['success']=$this->session->userdata('success');
        $this->clearmessage();
        $condition=" WHERE id!=1";
		$show_data['getall_crm'] = $this->Guest_model->getall_crm($condition);
		$conditionr="";
		$show_data['getall_references'] = $this->Guest_model->getall_references($conditionr);
		$show_data['getall_enquiry_status'] = $this->Guest_model->getall_enquiry_status($conditionr);
		
		
		$show_data['name'] = $this->session->userdata('user_name');
		$show_data['propic'] = $this->session->userdata('profile_pic');

		// loading category view page 
		$this->load->view('add_guest_enquiry',$show_data);	
	}

	function edit_guest_enquiries()
	{
		if(isset($_POST['edit_enquiries']))
		{
			$id = $this->input->post('id');
			$enquieries_id = $this->input->post('enquieries_id');
			$info = array();
			$info['call_back_date'] = $this->input->post('call_back_date');
			$info['location'] = $this->input->post('location');
			$info['vendor_type'] = $this->input->post('vendor_type');
			$info['hotel_name'] = $this->input->post('hotel_name');
			$info['no_of_rooms'] = $this->input->post('no_of_rooms');
			$info['extra_bed'] = $this->input->post('extra_bed');
			$info['extra_children'] = $this->input->post('extra_children');

			$result = $this->Guest_model->update_guest_enquiries($info, $id);
			if($result>0)
			{
				$this->success('<p class="success">Guest enquiries has been updated successfully</p>');
				redirect('index.php/Guest/add_guest_enquiry_view/'.$enquieries_id.'#enquiries');
			}
		}
	}

	function add_guest_enquiry_view($id=null)
	{
		
		if(isset($_POST['update_guest_enquiry']))
		{
			$guest_enquiry_id= $this->input->post('enquiry_id');
			$info = array();
			$info['guest_name']= $this->input->post('guest_name');
			// $info['guest_email']= $this->input->post('guest_email');
			$info['guest_address1']= $this->input->post('guest_address1');
			$info['guest_city']= $this->input->post('guest_city');
			// $info['guest_mobile']= $this->input->post('guest_mobile');
			$info['guest_alt_email']= $this->input->post('guest_alt_email');
			$info['guest_address2']= $this->input->post('guest_address2');
			$info['state']= $this->input->post('state');
			$info['guest_alt_mobile']= $this->input->post('guest_alt_mobile');
			$info['input_user']= $this->input->post('input_user');
			$info['guest_country']= $this->input->post('guest_country');
			$result = $this->Guest_model->update_guest_enquiry($info,$guest_enquiry_id);
			if($result>0)
			{
				$this->success('<p class="success">Guest enquiry has been updated successfully</p>');			// successfull mesage. 
				redirect($_SERVER['HTTP_REFERER']);
			}

		}
		if(isset($_POST['update_enquiry']))
		{
			$guest_enquiry_id= $this->input->post('enquiry_id');
			$info = array();
			if($this->input->post('preSts')!='BOOKED' || $this->session->userdata('user_type')==1) {
                //$info['enquiry_date'] = $this->input->post('enquiry_date');
                $info['enquiry_reference'] = $this->input->post('enquiry_reference');
                $info['enquiry_ext_rfn_no'] = $this->input->post('enquiry_ext_rfn_no');
                $info['enquiry_status'] = $this->input->post('enquiry_status');
                $info['booking_amount'] = $this->input->post('booking_amount');
                $info['call_back_date'] = $this->input->post('call_back_date');
                $info['call_back_time'] = $this->input->post('call_back_time');
                $info['enquiry_crm'] = $this->input->post('enquiry_crm');
                $info['enquiry_input_by'] = $this->input->post('enquiry_input_by');
            }
			$info['enquiry_remarks'] =  $this->input->post('enquiry_remarks');
			$result = $this->Guest_model->update_guest_enquiry($info,$guest_enquiry_id);
			if($result>0)
			{
				$this->success('<p class="success">Guest enquiry has been updated successfully</p>');
				redirect($_SERVER['HTTP_REFERER'].'#enquiry2');
			}

		}		
		if(isset($_POST['add_guest_enquery']))
		{
			$info = array();
			$info['guest_enquiry_id'] = $this->input->post('enquiry_id');
			$info['adults'] = $this->input->post('adults');
			$info['rooms'] = $this->input->post('rooms');
			$info['add_extra_bed'] = $this->input->post('add_extra_bed');
			$info['children'] = $this->input->post('children');
			$info['extra_bed'] = $this->input->post('extra_bed');
			$info['transport'] = $this->input->post('transport');
			$info['vehicle_type'] = $this->input->post('vehicle_type'); 
			$info['small_children'] =  $this->input->post('small_children'); 
			$info['extra_children'] =  $this->input->post('extra_children');
			if($this->input->post('number_of_days') < $this->input->post('number_of_nights'))
			{
				$this->error('<p class="error">No of days should be greater than nights</p>');
				redirect($_SERVER['HTTP_REFERER'].'#number_of_nights');
			}


			$info['number_of_days'] =  $this->input->post('number_of_days'); 
			$info['number_of_nights'] =  $this->input->post('number_of_nights');
			$result = $this->Guest_model->create_guest_enquiry_master($info);
			if($result>0)
			{
				$this->success('<p class="success">Guest enquiry has been added successfully</p>');
				redirect($_SERVER['HTTP_REFERER'].'#enquiry_ref');
			}
		}
		if(isset($_POST['update_guest_enquery']))
		{
			$guest_enquiry_id= $this->input->post('guest_enquiry_master_id');
			$info = array();
			//$info['guest_enquiry_id'] = $this->input->post('enquiry_id');
			$info['adults'] = $this->input->post('adults');
			$info['rooms'] = $this->input->post('rooms');
			$info['add_extra_bed'] = $this->input->post('add_extra_bed');
			$info['children'] = $this->input->post('children');
			$info['extra_bed'] = $this->input->post('extra_bed');
			$info['transport'] = $this->input->post('transport');
			$info['vehicle_type'] = $this->input->post('vehicle_type'); 
			$info['small_children'] =  $this->input->post('small_children'); 
			$info['extra_children'] =  $this->input->post('extra_children');
			if($this->input->post('number_of_days') < $this->input->post('number_of_nights'))
			{
				$this->error('<p class="error">No of days should be greater than nights</p>');
				redirect($_SERVER['HTTP_REFERER'].'#number_of_nights');
			}
			$info['number_of_days'] =  $this->input->post('number_of_days'); 
			$info['number_of_nights'] =  $this->input->post('number_of_nights');
			$result = $this->Guest_model->update_guest_enquiry_master($info,$guest_enquiry_id);
			if($result>0)
			{
				$this->success('<p class="success">Guest enquiry has been updated successfully</p>');
				redirect($_SERVER['HTTP_REFERER'].'#enquiry_ref');
			}
		}

		if(isset($_POST['add_enquiries']))
		{
			$info = array();
			$info['guest_enquiry_id'] = $this->input->post('enquiry_id');
			$info['call_back_date'] = $this->input->post('call_back_date');
			$info['location'] = $this->input->post('location');
			$info['vendor_type'] = $this->input->post('vendor_type');
			$info['no_of_rooms'] = $this->input->post('no_of_rooms');
			$info['extra_bed'] = $this->input->post('extra_bed');
			$info['extra_children'] = $this->input->post('extra_children');

			$result = $this->Guest_model->create_guest_enquiries($info);
			if($result>0)
			{
				$this->success('<p class="success">Guest enquiries has been added successfully</p>');
				redirect($_SERVER['HTTP_REFERER'].'#enquiries');
			}
		}

		

		$show_data = array();	
		$show_data['error']='';
		$show_data['success']=$this->session->userdata('success');
		$show_data['error']=$this->session->userdata('error');
        $this->clearmessage();        
		$user_id = $this->session->userdata('userdetails_id');
		$condition=" WHERE id!=1";
		$show_data['getall_crm'] = $this->Guest_model->getall_crm($condition);
		$conditionr="";
		$show_data['getall_references'] = $this->Guest_model->getall_references($conditionr);
		$show_data['getall_enquiry_status'] = $this->Guest_model->getall_enquiry_status($conditionr);
		$show_data['getall_vehicle'] = $this->Guest_model->getall_vehicle_type($conditionr);
		$show_data['select_crm'] = $this->Guest_model->select_crm("WHERE id='".$id."'");
		$show_data['all_guest_details'] = $this->Guest_model->fetch_guest_details();
		$show_data['all_pending_guest_details'] = $this->Guest_model->getall_Pending_Guest_details();
		$show_data['all_guest_enquiries_details'] = $this->Guest_model->fetch_guest_enquiries_details("WHERE guest_enquiry_id ='".$id."'");
		$show_data['name'] = $this->session->userdata('user_name');
		$show_data['propic'] = $this->session->userdata('profile_pic');
		$fill_data = $this->Guest_model->getall_Guest_details("WHERE ge.id='".$id."'  order by call_back_date DESC, ge.id DESC");
		$show_data['filled_data'] = $fill_data[0];
		$show_data['get_result_enquiry']= $this->Guest_model->get_result_enquiry("WHERE guest_enquiry_id='".$id."'");

		$this->load->view('add_guest_enquiry_view',$show_data);	
	}


	function search_guest_enquiry()
	{	
		$show_data = array();	
		$show_data['error']='';
		$show_data['success']=$this->session->userdata('success');
        $this->clearmessage();        
		$show_data['all_guest_details'] = $this->Guest_model->fetch_guest_details();
		$show_data['name'] = $this->session->userdata('user_name');
		$show_data['propic'] = $this->session->userdata('profile_pic');
		
		// loading category view page 
		$this->load->view('search_guest_view',$show_data);	
	}

	function add_enquiry_details()
	{			
		$show_data = array();	
		$show_data['error']='';
		$show_data['success']=$this->session->userdata('success');
        $this->clearmessage();

		$show_data['name'] = $this->session->userdata('user_name');
		$show_data['propic'] = $this->session->userdata('profile_pic');

		// loading category view page 
		$this->load->view('add_enquery_details_view',$show_data);	
	}

	function filter_guest_enquiry()
	{	
		$show_data = array();	
		$show_data['error']='';
		$show_data['success']=$this->session->userdata('success');
		$this->clearmessage();  

		// Download Guest Section
		$condition_array_download = array();
		if(isset($_GET['download_excel']))
        { 
            if($this->input->get('guest_id'))
            {
                array_push($condition_array_download," guest_details_ref LIKE '%".$this->input->get('guest_id')."%'");
            }
            if($this->input->get('guest_name'))
            {
                array_push($condition_array_download," guest_name LIKE '%".$this->input->get('guest_name')."%'");
			}
			if($this->input->get('enquiry_dates'))
            {
                array_push($condition_array_download," enquiry_date ='".date('d-m-Y',strtotime($this->input->get('enquiry_dates')))."'");
			}
			if($this->input->get('enquiry_reference_no'))
            {
                array_push($condition_array_download," guest_enquiry_ref LIKE '%".$this->input->get('enquiry_reference_no')."%'");
			}
			if($this->input->get('crm_user'))
            {
                array_push($condition_array_download," enquiry_crm LIKE '%".$this->input->get('crm_user')."%'");
			}
			if($this->input->get('enquiry_status'))
            {
                array_push($condition_array_download," enquiry_status LIKE '%".$this->input->get('enquiry_status')."%'");
			}
			if($this->input->get('reference'))
            {
                array_push($condition_array_download," enquiry_reference LIKE '%".$this->input->get('reference')."%'");
			}
			if($this->input->get('callback_dates'))
            {
                array_push($condition_array_download," call_back_date ='".$this->input->get('callback_dates')."'");
			}
			if($this->input->get('guest_start_date') && $this->input->get('guest_end_date'))
            {
				array_push($condition_array_download," enquiry_date BETWEEN '".date('Y-m-d',strtotime($this->input->get('guest_start_date')))."' AND '".date('Y-m-d',strtotime($this->input->get('guest_end_date')))."'");
            }
			$filter_result = $this->Guest_model->filter_guest_details($condition_array_download);

			if (!file_exists('timesheet/employee_registration_details/download_sheet'))
			{
				mkdir('timesheet/employee_registration_details/download_sheet', 0777, true);
			}

			$folder = 'timesheet/employee_registration_details/download_sheet';

			$this->load->helper('amountinwords');
			$this->load->helper(array('timesheet', 'file'));

			$name = 'guest_details';

			$result = download_guest_details($folder, $name, $filter_result);

			if ($result != '')
			{
				redirect(base_url() . 'timesheet/employee_registration_details/download_sheet/' . $result . '.xlsx');
				exit();
			}
		}
		// Filter Guest Section
		$condition_array = array();
        if(isset($_GET['filter_guest']))
        {
            if($this->input->get('guest_id'))
            {
                array_push($condition_array," guest_details_ref LIKE '%".$this->input->get('guest_id')."%'");
            }
            if($this->input->get('guest_name'))
            {
                array_push($condition_array," guest_name LIKE '%".$this->input->get('guest_name')."%'");
			}
			if($this->input->get('enquiry_dates'))
            {
                array_push($condition_array," enquiry_date ='".date('d-m-Y',strtotime($this->input->get('enquiry_dates')))."'");
			}
			if($this->input->get('enquiry_reference_no'))
            {
                array_push($condition_array," guest_enquiry_ref LIKE '%".$this->input->get('enquiry_reference_no')."%'");
			}
			if($this->input->get('crm_user'))
            {
                array_push($condition_array," enquiry_crm LIKE '%".$this->input->get('crm_user')."%'");
			}
			if($this->input->get('enquiry_status'))
            {
                array_push($condition_array," enquiry_status LIKE '%".$this->input->get('enquiry_status')."%'");
			}
			if($this->input->get('reference'))
            {
                array_push($condition_array," enquiry_reference LIKE '%".$this->input->get('reference')."%'");
			}
			if($this->input->get('callback_dates'))
            {
                array_push($condition_array," call_back_date ='".$this->input->get('callback_dates')."'");
			}
			if($this->input->get('guest_start_date') || $this->input->get('guest_end_date'))
            {
				array_push($condition_array," enquiry_date BETWEEN '".date('Y-m-d',strtotime($this->input->get('guest_start_date')))."' AND '".date('Y-m-d',strtotime($this->input->get('guest_end_date')))."'");
            }
		} 
		$filter_result = $this->Guest_model->filter_guest_details($condition_array);

		$show_data['all_guest_details'] = $filter_result;
		$condition=" WHERE id!=1";
		$show_data['getall_crm'] = $this->Guest_model->getall_crm($condition);
		$conditionr="";
		$show_data['getall_references'] = $this->Guest_model->getall_references($conditionr);
		$show_data['getall_enquiry_status'] = $this->Guest_model->getall_enquiry_status($conditionr);
		$show_data['name'] = $this->session->userdata('user_name');
		$show_data['propic'] = $this->session->userdata('profile_pic');
		
		// loading category view page 
		$this->load->view('filter_guest_enquiry_view',$show_data);	
	}
	
	function delete_guest()
	{
		if(isset($_POST['guest_enquiry_id']))
		{
			$guest_enquiry_id= $_POST['guest_enquiry_id'];
			$this->Guest_model->delete_guest($guest_enquiry_id);
			// print_r($this->db->last_query());
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

        $name = 'guest_details_uploadsheet';
        $result = create_guest_details($folder, $name);

        if ($result != '') {
            redirect(base_url() . 'timesheet/employee_registration_details/download_sheet/' . $result . '.xlsx');
            exit();
        }
    }
	function add_enquires_popup()
	{
		if(isset($_POST['enquiry_id']))
		{
			$show_data['enquiry_id'] = $_POST['enquiry_id'];
		}
		$this->load->view('popup_add_enquiries', $show_data);
	}
	function edit_enquires_popup()
	{
		if(isset($_POST['id']))
		{
			$enquiry_id = $_POST['id'];
			$condition = " WHERE id=".$enquiry_id;
			$show_data['getall_guest_enquiry'] = $this->Guest_model->getall_guest_enquiry($condition);
		}
		$condition="";
		$show_data['getall_location'] = $this->Guest_model->getall_location($condition);
		$show_data['getall_vendor_type'] = $this->Guest_model->getall_vendor_type($condition);
		$this->load->view('popup_edit_enquiries', $show_data);
	}
	
	function upload_guest_details()
    {
        $this->load->view('popup_guest_bulkupload');
	}
	
	function guest_bulkupload()
    {
        $show_data = array();
        $show_data['error'] = '';
        $show_data['success'] = $this->session->userdata('success');
        $this->clearmessage();

        if(isset($_FILES['file_upload']['name']) && $_FILES['file_upload']['name']!='') {
			$this->Guest_model->empty_temp_upload_guests();
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
                        'sl_no' => $upload_array[$index]['A']!=''?$upload_array[$index]['A']:'',
                        'date' => $upload_array[$index]['B']!=''?$upload_array[$index]['B']:'',
                        'guest_id' => $upload_array[$index]['C']!=''?$upload_array[$index]['C']:'',
                        'enq_ref_id' => $upload_array[$index]['D']!=''?$upload_array[$index]['D']:'',
                        'guest_name' => $upload_array[$index]['E']!=''?$upload_array[$index]['E']:'',
                        'mobile_number' => $upload_array[$index]['F']!=''?$upload_array[$index]['F']:'',
						'email' => $upload_array[$index]['G']!=''?$upload_array[$index]['G']:'',
						'city' => $upload_array[$index]['H']!=''?$upload_array[$index]['H']:'',
                        'reference' => $upload_array[$index]['I']!=''?$upload_array[$index]['I']:'',
                        'ext_ref_no' => $upload_array[$index]['J']!=''?$upload_array[$index]['J']:'',
                        'crm' => $upload_array[$index]['K']!=''?$upload_array[$index]['K']:'',
                        'remark' => $upload_array[$index]['L']!=''?$upload_array[$index]['L']:'NA',
						'status' => $upload_array[$index]['M']!=''?$upload_array[$index]['M']:'',
						'booking_date' => $upload_array[$index]['N']!=''?$upload_array[$index]['N']:'',
                        'booking_amount' => $upload_array[$index]['O']!=''?$upload_array[$index]['O']:'',
						'call_back_date' => $upload_array[$index]['P']!=''?$upload_array[$index]['P']:'',
						'call_back_time' => $upload_array[$index]['Q']!=''?$upload_array[$index]['Q']:''
                    );
                    array_push($upload_info, $data);
                }

                if (sizeof($upload_info) > 0 && $index > 2) {
                    foreach ($upload_info as $upload_details) {
                        $user_info = array(
                            'enquiry_date' => $this->convertounix($upload_details['date']), 
                            'guest_details_ref' => $upload_details['guest_id'], 
                            'guest_enquiry_ref' => $upload_details['enq_ref_id'], 
                            'guest_name' => $upload_details['guest_name'],
                            'guest_mobile' => $upload_details['mobile_number'], 
							'guest_email' => $upload_details['email'], 
							'guest_city' => $upload_details['city'], 
                            'enquiry_reference' => $upload_details['reference'], 
                            'enquiry_ext_rfn_no' => $upload_details['ext_ref_no'], 
                            'enquiry_crm' => $upload_details['crm'],
                            'enquiry_remarks' => $upload_details['remark'], 
							'enquiry_status' => $upload_details['status'],
                            'booking_date' => $this->convertounix($upload_details['booking_date']), 
                            'booking_amount' => $upload_details['booking_amount'],
                            'call_back_date' => $this->convertounix($upload_details['call_back_date']), 
                            'call_back_time' => $upload_details['call_back_time'],
                        );
                        $temp_result = $this->Guest_model->bulkupload_temp_guest($user_info);
                    }
                }
            }
		}
		$condition = "";
        $show_data['temp_guest_details'] = $this->Guest_model->getall_temp_guests($condition);
        $show_data['name'] = $this->session->userdata('user_name');
        $show_data['propic'] = $this->session->userdata('profile_pic');
        $this->load->view('bulk_upload_guest_final_step_view', $show_data);
		// $this->success('<p class="success">All Guest are added successfully</p>');
		// redirect($_SERVER['HTTP_REFERER']);
		// exit;
	}

	private function convertounix($time_stamp)
	{
		$excel_date = $time_stamp; //here is that value 41621 or 41631
		$unix_date = ($excel_date - 25569) * 86400;
		$excel_date = 25569 + ($unix_date / 86400);
		$unix_date = ($excel_date - 25569) * 86400;
		return gmdate("Y-m-d", $unix_date);
	}

	function create_guest_bulkupload()
    {
        if(isset($_POST['bulk_upload']))
        { //echo "<pre>"; print_r($_POST); die;
            $employee = $_POST['employee'];
            $guest_info = array();

            foreach ($employee as $emp) 
            {
                $guest_info['enquiry_date'] = $emp['enquiry_date'];
                $guest_info['guest_details_ref'] = $emp['guest_details_ref'];
                $guest_info['guest_enquiry_ref'] = $emp['guest_enquiry_ref'];
                $guest_info['guest_name'] = $emp['guest_name'];
                $guest_info['guest_mobile'] = $emp['guest_mobile'];
                $guest_info['guest_email'] = $emp['guest_email'];
                $guest_info['guest_city'] = $emp['guest_city'];
                $guest_info['enquiry_reference'] = $emp['enquiry_reference'];
                $guest_info['enquiry_ext_rfn_no'] = $emp['enquiry_ext_rfn_no'];
                $guest_info['enquiry_crm'] = $emp['enquiry_crm'];
                $guest_info['enquiry_remarks'] = $emp['enquiry_remarks'];
                $guest_info['enquiry_status'] = $emp['enquiry_status'];
                $guest_info['booking_date'] = $emp['booking_date'];
                $guest_info['booking_amount'] = $emp['booking_amount'];
                $guest_info['call_back_date'] = $emp['call_back_date'];
				$guest_info['call_back_time'] = $emp['call_back_time'];
				
                $result = $this->Guest_model->create_guest($guest_info);  
                
            }
            $this->Guest_model->empty_temp_upload_guests(); 
            $this->success('<p class="success">Guest Details are added successfully</p>');
            redirect(base_url().'index.php/Guest/search_guest_enquiry');
            exit;
        }
    }
	
	function check_guest_email()
    {
      if (isset($_POST['email']) && ($_POST['email']) != '') 
      { 
        $email = $this->input->post('email'); 
		$user = $this->Guest_model->check_user_mail($email);
        if(sizeof($user)!=0)
        {
          print_r("1");
          die;
        }
        else
        {
          print_r("0");
          die;
        }
      }
      
	}
	
	function check_mobile()
    {
      if (isset($_POST['mobile']) && ($_POST['mobile']) != '') 
      { 
        $mobile = $this->input->post('mobile'); 
		$user = $this->Guest_model->check_user_mobile($mobile);
        if(sizeof($user)!=0)
        {
          print_r("1");
          die;
        }
        else
        {
          print_r("0");
          die;
        }
      }
      
    }

    // private function to load the success message in the view page.
	private function success($message)
	{
		$userdata = array(
			'success'    => $message
		);
		$this->session->set_userdata($userdata);		
	}
    // private function to load the error message in the view page.
	private function error($message)
	{
		$userdata = array(
			'error'    => $message
		);
		$this->session->set_userdata($userdata);		
	}
	// private function to load the clear message in the view page.
	private function clearmessage()
	{
		$userdata = array(
			'success'    => '',
			'error'    => '',
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

    
}