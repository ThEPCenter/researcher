<?php

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_fullname() {
        $firstname_en = $this->security->xss_clean($this->input->get('firstname_en'));
        $lastname_en = $this->security->xss_clean($this->input->get('lastname_en'));
        $this->db->where('firstname_en', $firstname_en);
        $this->db->where('lastname_en', $lastname_en);
        $query = $this->db->get('res_profile');

        if ($query->num_rows == 1) {
            return '<span style="color: red" class="glyphicon glyphicon-remove"></span> <b style="color: red">' . ucfirst($firstname_en) . ' ' . $lastname_en . ' ชื่อและนามสกุลนี้ซ้ำ.</b>';
        } else {
            return '<span style="color: green" class="glyphicon glyphicon-ok"></span> <b style="color: green">ชื่อและนามสกุลนี้สามารถใช้ได้</b>';
        }
    }

    public function add_new_researcher() {
        $title_en = $this->security->xss_clean($this->input->post('title_en'));
        $firstname_en = $this->security->xss_clean($this->input->post('firstname_en'));
        $lastname_en = $this->security->xss_clean($this->input->post('lastname_en'));
        $email = $this->security->xss_clean($this->input->post('email'));

        $this->db->where('firstname_en', $firstname_en);
        $this->db->where('lastname_en', $lastname_en);
        $query = $this->db->get('res_profile');

        if ($query->num_rows == 1) {
            return FALSE;
        } else {
            $data = array(
                "title_en" => $title_en,
                "firstname_en" => $firstname_en,
                "lastname_en" => $lastname_en,
                "email" => $email
            );
            $this->db->insert('res_profile', $data);
            return TRUE;
        }
    }

}
