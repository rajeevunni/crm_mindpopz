<?php

class Home_model extends CI_Model {

    function function_array() {
        $query = $this->db->query("SELECT frm.function_id, ecr.category_id, ecr.role_id, ed.department_id, c.category, ur.role, d.department_name, f.function_name
									FROM user as u
									INNER JOIN employee as emp
									ON u.id=emp.user_id
									INNER JOIN employee_department as ed
									ON emp.id=ed.employee_id
									INNER JOIN employee_category_role as ecr
									ON emp.id=ecr.employee_id
									LEFT JOIN function_role_mapping as frm
									ON ecr.role_id=frm.role_id AND ecr.category_id=frm.category_id
									LEFT JOIN functions as f
									ON f.id=frm.function_id
									INNER JOIN department as d
									ON ed.department_id=d.id AND ecr.category_id=d.category
									INNER JOIN category as c
									ON ecr.category_id=c.id
									INNER JOIN user_role as ur
									ON ecr.role_id=ur.id
									where u.username='" . $this->input->post('ls_username') . "' and u.password='" . md5($this->input->post('ls_password')) . "' and u.status=1");
        $return_array = $query->result_array();
        return $return_array;
    }

    function loginValidate($condition = '') {

        $query = $this->db->query("SELECT id as user_id, user_role_type, username,password
									FROM user
									where username='" . $this->input->post('ls_username') . "' and password='" . md5($this->input->post('ls_password')) . "' and status=1 " . $condition);
        $return_array = $query->row_array();

        if (sizeof($return_array) > 0) {
            if ($return_array['user_role_type'] == 4) { 
                $table_name = "normal_user";
                $tb_col = "";
                $inner_join_tb = "";
                $category_status = "";
            }
            else {
                if ($return_array['user_role_type'] == 1) {
                    $table_name = "employee";
                    $tb_col = "";
                    $inner_join_tb = "";
                    $category_status = "";
                }else {
                    $table_name = "employee";
                    $tb_col = "";
                    $inner_join_tb = " ";
                    $category_status = "";
                }
            }

            $query = $this->db->query("SELECT u.id as user_id, u.user_role_type, u.username, ud.*, ud.id as employee_id " . $tb_col . "
									FROM user as u
									INNER JOIN " . $table_name . " as ud
									ON u.id=ud.user_id
									" . $inner_join_tb . "
									where u.username='" . $this->input->post('ls_username') . "' and u.password='" . md5($this->input->post('ls_password')) . "' " . $category_status . " and u.status=1 " . $condition);
            $return_array = $query->row_array();
           
            if (sizeof($return_array) != 0) {
                return $return_array;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    function check_mail($condition) {
        $query = $this->db->query("SELECT *
								FROM user as u
								" . $condition
        );
        $return_array = $query->row_array();
        return $return_array;
    }

    function passwordupdate($table_name, $data, $username) {
        $this->db->where('username', $username);
        $this->db->update($table_name, $data);
        $result = $this->db->affected_rows();
        return $result;
    }

}

?>