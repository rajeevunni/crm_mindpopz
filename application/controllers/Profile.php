<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('user_logged')!="yes:tracking_user")
		{
			redirect(base_url().'index.php/Home');
			exit;
		}
		if($this->session->userdata('user_logged')=="")
		{
			redirect(base_url().'index.php/Home');
			exit;
		}
		$this->load->model('Profile_model');
		$this->load->model('Generalsettings_model');
		date_default_timezone_set("Asia/Kolkata");
	}
	
	function index()
	{ 
		$show_data = array();
		$show_data['error']='';
		$show_data['success']=$this->session->userdata('success');
		$this->clearmessage();


		if(isset($_POST['editprofile_employee']))
		{
			// echo "<pre>";
			// print_r($_POST);die;
			$this->load->library('form_validation');

			$config = array(
               array(
                     'field'   => 'f_name', 
                     'label'   => 'First Name', 
                     'rules'   => 'required'
                  ),
			   array(
                     'field'   => 'l_name', 
                     'label'   => 'Last Name',
                     'rules'   => 'required'
                  ),
			   array(
                     'field'   => 'primary_contact_no', 
                     'label'   => 'Contact No',
                     'rules'   => 'required'
                  )
			);
			$this->form_validation->set_rules($config);
			if($this->form_validation->run() != false)
			{

				$user_info = array();			
				
				if(isset($_FILES['profile_pic'])&&$_FILES['profile_pic']['name']!='')
				{
					if (!file_exists('images/profile_pic'))
                    {
                        mkdir('images/profile_pic', 0777, true);
                    }
					$uploaddir = 'images/profile_pic/';
					
					$test = explode('.',$_FILES['profile_pic']['name']);
		
					$ext = strtolower($test[sizeof($test)-1]);
					
					if($ext=='png'||$ext=='jpg'||$ext=='jpeg')
					{
						$length = strlen($_FILES['profile_pic']['name'])-strlen($ext)-1;
						
						$config['file_name'] = preg_replace('/[^A-Za-z0-9]/', '', substr($_FILES['profile_pic']['name'], 0, $length)).strtotime("now").'.'.$ext;
						
						$file = $uploaddir .$config['file_name']; 
						$file_name= $config['file_name'];
						
						if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $file)){				
							$this->makeThumbnails($uploaddir, $file_name);
							$user_info['profile_pic'] = $file_name;
						}
					}
				}
				
				$user_id=$this->session->userdata('user_id');
				$user_info['f_name'] = $this->input->post('f_name');
				$user_info['m_name'] = $this->input->post('m_name');
				$user_info['l_name'] = $this->input->post('l_name');

				if($this->session->userdata('user_type') == 4)
				{
					$user_info['concat_number'] = $this->input->post('primary_contact_no');
					$result = $this->Profile_model->update_normal_user_employee($user_info,$user_id);
					if($result>0)
					{

						$this->change_employeeSession($this->Profile_model->get_normal_user_profile($this->session->userdata('user_id')));
						// print_r($this->db->last_query());die();
						$this->success('<p class="success">Profile has been successfully updated</p>');
						redirect('index.php/Profile');
					}
					// print_r($this->db->last_query());die();
				}
				else
				{
					$user_info['primary_contact_no'] = $this->input->post('primary_contact_no');
					$result = $this->Profile_model->update_user_employee($user_info,$user_id);
					// print_r($this->db->last_query());die();
					if($result>0)
					{

						$this->change_employeeSession($this->Profile_model->get_user_profile($this->session->userdata('userdetails_id')));
						// print_r($this->db->last_query());die();
						$this->success('<p class="success">Profile has been successfully updated</p>');
						redirect('index.php/Profile');
					}
				}	
				
				if($result>0)
				{

					$this->change_employeeSession($this->Profile_model->get_user_profile($this->session->userdata('user_id')));
					// print_r($this->db->last_query());die();
					$this->success('<p class="success">Profile has been successfully updated</p>');
					redirect('index.php/Profile');
				}
			}
		}
		
		if(isset($_POST['changepassword']))
		{
			if($this->input->post('n_password') == $this->input->post('re_password'))
			{
				$user_info = array();				
				
				$user_info['password'] = md5($this->input->post('n_password'));	
				$user_id=$this->session->userdata('user_id');
				$result = $this->Profile_model->update_userpassword($user_info,$user_id);
				
				if($result>0)
				{
					$this->success('<p class="success">Password has been changed successfully</p>');
					// print_r($this->db->last_query());die();
					redirect('index.php/Profile');
				}
                else
                {
                    $this->success('<p class="success">Password update failed</p>');
                    redirect('index.php/Profile');
                }
			}
            else
			{
				$this->success('<p class="success">The New Password field does not match.</p>');
				redirect('index.php/profile');
			}
		}

		if($this->session->userdata('user_type')==4)
		{
			$show_data['profile_array'] = $this->Profile_model->get_normal_user_profile($this->session->userdata('user_id'));
		}
		else{
			$show_data['profile_array'] = $this->Profile_model->get_user_profile($this->session->userdata('userdetails_id'));
		}
		
		$show_data['name'] = $this->session->userdata('user_name');
		$show_data['propic'] = $this->session->userdata('profile_pic');

		$this->load->view('profile_view',$show_data);		
	}
	
	private function success($message)
	{
		$userdata = array(
							'success'    => $message
						);
		$this->session->set_userdata($userdata);		
	}
	
	private function clearmessage()
	{
		$userdata = array(
							'success'    => ''
						);
		$this->session->set_userdata($userdata);
	}
	
	private function makeThumbnails($updir, $img)
	{
		if (!file_exists('images/profile_pic/thumb'))
        {
            mkdir('images/profile_pic/thumb', 0777, true);
        }
		$thumbnail_width = 240;
		$thumbnail_height = 240;
		$thumb_beforeword = "thumb/";		
		$arr_image_details = getimagesize("$updir".''."$img"); // pass id to thumb name
		$original_width = $arr_image_details[0];
		$original_height = $arr_image_details[1];
		if ($original_width > $original_height) {
			$new_width = $thumbnail_width;
			$new_height = intval($original_height * $new_width / $original_width);
		} else {
			$new_height = $thumbnail_height;
			$new_width = intval($original_width * $new_height / $original_height);
		}
		$dest_x = intval(($thumbnail_width - $new_width) / 2);
		$dest_y = intval(($thumbnail_height - $new_height) / 2);
		if ($arr_image_details[2] == 1) {
			$imgt = "ImageGIF";
			$imgcreatefrom = "ImageCreateFromGIF";
		}
		if ($arr_image_details[2] == 2) {
			$imgt = "ImageJPEG";
			$imgcreatefrom = "ImageCreateFromJPEG";
		}
		if ($arr_image_details[2] == 3) {
			$imgt = "ImagePNG";
			$imgcreatefrom = "ImageCreateFromPNG";
		}		
		if ($imgt) {
			$old_image = $imgcreatefrom("$updir".''."$img");
			$new_image = imagecreatetruecolor($thumbnail_width, $thumbnail_height);
			ImageCopyResampled($new_image, $old_image, $dest_x, $dest_y, 0, 0, $new_width, $new_height, $original_width, $original_height);
			$imgt($new_image, "$updir" . "$thumb_beforeword" . "$img");
		}
	}
	
	private function change_clientSession($result)
	{
		$userdata = array(
							'user_name' => $result['company_name'],
							'profile_pic' => $result['company_logo']
						);
		$this->session->set_userdata($userdata);		
	}
	private function change_jobseekerSession($result)
	{
		$userdata = array(
							'user_name' => $result['f_name'].' '.$result['l_name'],
							'profile_pic' => $result['profile_pic']
						);
		$this->session->set_userdata($userdata);		
	}
	private function change_employeeSession($result)
	{
		$userdata = array(
							'user_name' => $result['f_name'].' '.$result['l_name'],
							'profile_pic' => $result['profile_pic']
						);
		$this->session->set_userdata($userdata);		
	}
}

?>