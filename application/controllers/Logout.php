<?php 
class Logout extends CI_Controller{
	function __construct()
	{	
		parent::__construct();
		if($this->session->userdata('user_logged')!="yes:tracking_user")
		{
			redirect(base_url().'index.php/Home');
			exit;
		}
	}
	function index()
	{
		if($this->session->userdata('url_category_id')!='' || $this->session->userdata('url_category')!='' )
		{
			$logout_url = base_url().'index.php/Home/index/'.$this->session->userdata('url_category');
		}
		else
		{
			$logout_url = base_url().'index.php/Home';
		}

		$this->session->sess_destroy();
		redirect($logout_url);
	}
}
?>