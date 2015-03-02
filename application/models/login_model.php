<?php

class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function validate() {
        // grab user input
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));

        // Prep the query
        $this->db->where('username', $username);
        $this->db->where('password', sha1($password));
        // Run the query
        $query = $this->db->get('res_user');

        // Let's check if there are any results        
        if ($query->num_rows == 1) {
            $row = $query->row();
            date_default_timezone_set("Asia/Bangkok");
            $recent_login = date("Y-m-d H:i:s");
            $last_login = $row->recent_login;
            $data_update = array(
                'recent_login' => $recent_login,
                'last_login' => $last_login
            );
            $where = "id = $row->id";
            $str = $this->db->update_string('res_user', $data_update, $where);
            $this->db->query($str);

            // If there is a user, then create session data
            $this->db->where('username', $username);
            $this->db->where('password', sha1($password));
            $query = $this->db->get('res_user');
            $row = $query->row();
            $data = array(
                'user_id' => $row->id,
                'username' => $row->username,
                'recent_login' => $row->recent_login,
                'last_login' => $row->last_login,
                // 'researcher_key' => $row->researcher_key,
                'level' => $row->level,
                'validated' => true
            );

            $this->session->set_userdata($data);

            return true;
        }
    }

}
