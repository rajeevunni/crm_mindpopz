<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('Home_model');
        $this->load->model('Generalsettings_model');
        $this->load->model('Guest_model');
        if ($this->session->userdata('user_logged') != "yes:tracking_user") {
            redirect(base_url() . 'index.php/Logout');
            exit;
        }
        if ($this->session->userdata('user_logged') == "") {
            redirect(base_url() . 'index.php/Home');
            exit;
        }
        date_default_timezone_set("Asia/Kolkata");
    }

    function index()
    {
        $show_data = array();
        $show_data['error'] = '';
        $show_data['success'] = $this->session->userdata('success');
        $this->clearmessage();

        $condition = " WHERE enquiry_status='INPUTTED'";
        $show_data['all_guest_details'] = $this->Guest_model->fetch_guest_details( $condition);
        $show_data['all_pending_guest_details'] = $this->Guest_model->getall_Pending_Guest_details();
        $condition = " WHERE enquiry_status='CALL BACK'";
        $show_data['pending_call_back'] = $this->Guest_model->fetch_guest_details( $condition);
        // company wise graph
        $chartData = '';
        $data = $this->Generalsettings_model->get_company_wise_barchart();
        foreach($data as $key => $res) {
            if($res!=0)
            {
                $chartData .= '{month_sum: "'.$res['sum'].'", month_total: "'.$res['total'].'", month:"'.date('M Y', strtotime($res['y'].'-'.$res['m'])).'", month_sum: "'.$res['sum'].'"},';
            }  
        } 
        $show_data['chartData'] = $chartData;
        // echo "<pre>"; print_r($show_data['chartData']); die;

        // crm wise graph
        $CrmData = array();
        // $CrmName = array();
        // $CrmSum = array();
        $data = $this->Generalsettings_model->get_crm_wise_barchart_date();
        //echo "<pre>"; print_r($data);die;
        $json_array = array();
        foreach($data as $key => $res) {
            $i=0;
            $date = $res['y'].'-'.$res['m'];
            $crm_data = $this->Generalsettings_model->get_crm_wise_barchart($res['y'], $res['m']);
            $json_array[$i]['xparameter'] = date('M Y', strtotime($res['y'].'-'.$res['m']));
            // echo "<pre>"; print_r($crm_data);
            foreach($crm_data as $crm) { 
                $json_array[$i]['crm']= $crm['sum'];
                // $json_array[$i]['closedticket'] = $department_count['total_closed'];
                // $json_array[$i]['esclatedticket'] = $department_count['total_esclation'];
                
                // $show_data['bar_chart'] = json_encode($json_array);
                // $json_array[$i]['month'] = date('M Y', strtotime($crm['y'].'-'.$crm['m']));
                // $json_array[$i]['name'] = $crm['enquiry_crm'];
                // $json_array[$i]['amount'] = $crm['sum'];
                /*
                $CrmData = '{enquiry_crm: "'.$crm['enquiry_crm'].'", month_sum: "'.$crm['sum'].'", month:"'.$crm['y'].'-'.$crm['m'].'", month_sum: "'.$crm['sum'].'"},';
                //echo "<pre>"; print_r($CrmData); die;
                $CrmName[] = '{enquiry_crm: "'.$crm['enquiry_crm'].'"},';
                $CrmName[] = "'".$crm['enquiry_crm']."'";
                $CrmSum[] = "'".$crm['sum']."'";
                $json[$i]['CrmName'] = $crm['enquiry_crm'];
                $json[$i]['CrmSum'] = $crm['sum'];
                $json[$i]['month'] = date('M Y', strtotime($crm['y'].'-'.$crm['m']));
                */
                $i++;
            } 
        } 
        // echo "<pre>"; print_r(json_encode($json_array)); die;
        $show_data['CrmData'] = json_encode($json_array);
        // echo json_encode($json_array);
        //echo "<br/>";

        //echo json_encode($json_array);
        //die;
        // $show_data['CrmData'] = json_encode($json_array);
        // $show_data['CrmName'] = isset($CrmName) ? '['.implode(',', $CrmName).']' : '';
        // $show_data['CrmSum'] = isset($CrmSum) ? '['.implode(',', $CrmSum).']' : '';

        $show_data['name'] = $this->session->userdata('user_name');
        $show_data['propic'] = $this->session->userdata('profile_pic');
        $this->load->view('dashboard_view', $show_data);
    }

    private function success($message)
    {
        $userdata = array(
            'success' => $message
        );
        $this->session->set_userdata($userdata);
    }

    private function clearmessage()
    {
        $userdata = array(
            'success' => ''
        );
        $this->session->set_userdata($userdata);
    }

}

?>