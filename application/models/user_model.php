<?php

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // ======================= User management ========================= //
    public function get_user() {
        $user_id = $this->session->userdata('user_id');
        $this->db->where('id', $user_id);
        $q_user = $this->db->get('res_user');
        if ($q_user->num_rows):
            return $q_user->result();
        else:
            return FALSE;
        endif;

        return FALSE;
    }

    public function check_password() {
        $old_password = $this->security->xss_clean($this->input->post('old_password'));
        $username = $this->session->userdata('username');
        $password = sha1($old_password);
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('res_user');
        if ($query->num_rows == 1):
            return TRUE;
        else:
            return FALSE;
        endif;
    }

    public function update_password() {
        $id = $this->input->post('user_id');
        $password = $this->security->xss_clean($this->input->post('newPassword'));
        $data = array(
            'password' => sha1($password),
            'modified' => date("Y-m-d H:i:s")
        );
        $this->db->where('id', $id);
        $this->db->update('res_user', $data);
    }

}
