<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->helper('html');
        $this->load->helper('security');
        $this->load->helper('cookie');
        date_default_timezone_set("Asia/Kolkata");
        //$this->load->library('session_setting');
        //$this->load->helper('url');
    }

    function index() { //Loading home view
        $show_data = array();
        $show_data['error'] = '';
        $show_data['success'] = $this->session->userdata('success');
        $this->clearmessage();


        $show_data['name'] = $this->session->userdata('user_name');
        $show_data['propic'] = $this->session->userdata('profile_pic');

        if ($this->session->userdata('user_logged') == "yes:tracking_user") {
            redirect(base_url() . 'index.php/Guest/search_guest_enquiry');
        } else {
            $show_data = array();
            $show_data['error'] = '';
            $show_data['success'] = $this->session->userdata('success');
            
            $this->clearmessage();

            $show_data['url_category_id'] = '';
            $show_data['url_category_name'] = '';
            $show_data['url_category'] = '';
        
            if ($this->uri->segment(3) != '') {
                $this->load->model('Manage_ticket_model');

                $condition = " WHERE url='" . base_url() . 'index.php/Home/index/' . $this->uri->segment(3) . "'";
                $get_category_by_url = $this->Manage_ticket_model->category_by_url($condition);
                $show_data['url_category_id'] = $get_category_by_url['id'];
                $show_data['url_category_name'] = $get_category_by_url['category'];
                $show_data['url_category'] = $this->uri->segment(3);
            }

            if (isset($_POST['adminlogin'])) {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('ls_username', 'User Name', 'required');
                $this->form_validation->set_rules('ls_password', 'Password', 'required');
                if ($this->form_validation->run() != false) {
                    $result = $this->Home_model->loginValidate();

                    if ($result == 0) {
                        $show_data['error'] = 'Invalid Username or Password';
                    } else {
                        $result['url_category_id'] = $show_data['url_category_id'];
                        $result['url_category_name'] = $show_data['url_category_name'];
                        $result['url_category'] = $show_data['url_category'];
                        if ($result['user_role_type'] == 1 OR $result['user_role_type'] == 2) {
                            $result['category_id'] = $show_data['url_category_id'];
                        }
                        if ($result['category_id'] == $result['url_category_id'] || $result['url_category_id'] == '') {
                            $this->setLoginSession($result);
                            if($this->session->userdata('user_type')==1)
                            {
                                redirect(base_url() . 'index.php/Dashboard');
                            }
                            else{
                                redirect(base_url() . 'index.php/Dashboard');
                            }
                            
                        } else {
                            $this->error('<p class="error">You are not registred.</p>');
                            redirect(base_url() . 'index.php/Home/' . $this->uri->segment(3));
                        }
                    }
                } else {
                    redirect(base_url() . 'index.php/Home');
                }
            }           
            $this->load->view('login_view', $show_data);
        }

        //$this->load->view('home_view', $show_data);
    }

    function forgetpassword() {  //loading login page

        $show_data = array();
        $show_data['error'] = $this->session->userdata('error');
        $show_data['success'] = $this->session->userdata('success'); 
        $this->clearmessage();
        //----------------------------------- forget password -----------------------//
        if (isset($_POST['forgetpassword'])) {
            $email = $this->input->post('email');

            $condition = "WHERE username='" . $email . "'";
            $result=$this->Home_model->check_mail($condition);

            if ($result > 0) {
                $info = array();
                $password = $this->randomPassword();
                //echo $password;exit;
                $info['password'] = md5($password);
                $this->Home_model->passwordupdate('user', $info, $email);

                $mail_subject = 'Password Reset';

                $mail_content = "Your password has been reset successfully!<br>
                PASSWORD: ".$password."<br>
                ";

                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                // More headers
                $headers .= 'From: <paulmindpopz@gmail.com>' . "\r\n";

                if($mail_res = mail( $email, $mail_subject, $mail_content,$headers)){
                    //echo "Password reset successfully. Please Check your email and get credentials.";exit;
                    $this->success('<p class="success">Password reset successfully. Please Check your email and get credentials.</p>');
                    redirect($_SERVER['HTTP_REFERER']);
                }else{
                    //echo "Could not send mail";exit;
                    $this->error('<p class="error">Could not send mail.</p>');
                    redirect($_SERVER['HTTP_REFERER']);
                }
            } else {
                $this->error('<p class="error">This email id does not exist.</p>');
                redirect($_SERVER['HTTP_REFERER']);
            }
        }else{
          $this->load->view('forgot_password', $show_data);   
        }

        
    }

    function setLoginSession($result) {
        $userdata = array(
            'user_id' => $result['user_id'],
            'userdetails_id' => $result['employee_id'],
            'user_logged' => 'yes:tracking_user',
            'user_name' => $result['f_name'] . ' ' . $result['l_name'],
            'profile_pic' => $result['profile_pic'],
            'role' => 'superadmin',
            'role_id' => 1,
            'user_code' => $result['username'],
            
            'user_type' => $result['user_role_type']
        );
        $this->session->set_userdata($userdata);
    }

    function reset_password() {
        $show_data = array();
        $show_data['error'] = '';
        $show_data['success'] = $this->session->userdata('success');
        $this->clearmessage();

        $show_data['name'] = $this->session->userdata('user_name');
        $show_data['propic'] = $this->session->userdata('profile_pic');

        $this->load->view('reset_password_view', $show_data);
    }

    private function clearmessage() {
        $userdata = array(
            'success' => '',
            'error' => ''
        );
        $this->session->set_userdata($userdata);
    }

    private function success($message) {
        $userdata = array(
            'success' => $message
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

    function randomPassword() {
        $alphabet = "0123456789";
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }

}

?>