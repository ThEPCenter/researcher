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

        if (empty($firstname_en) || empty($lastname_en)) {
            return '<span style="color: red" class="glyphicon glyphicon-remove"></span> <b style="color: red">กรุณากรอกชื่อและนามสกุล</b>';
        } else {
            if ($query->num_rows == 1) {
                return '<span style="color: red" class="glyphicon glyphicon-remove"></span> <b style="color: red">' . ucfirst($firstname_en) . ' ' . $lastname_en . ' ชื่อและนามสกุลนี้ซ้ำ.</b>';
            } else {
                return '<span style="color: green" class="glyphicon glyphicon-ok"></span> <b style="color: green">ชื่อและนามสกุลนี้สามารถใช้ได้</b>';
            }
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
            if (empty($firstname_en) && empty($lastname_en)) {
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

    public function get_researcher_list() {
        $query = $this->db->get('res_profile');
        return $query->result();
    }

    public function get_profile($researcher_id) {
        $this->db->where('researcher_id', $researcher_id);
        $query = $this->db->get('res_profile');
        return $query->result();
    }

    public function update_profile() {
        $researcher_id = $this->security->xss_clean($this->input->post('researcher_id'));
        $firstname_en = $this->security->xss_clean($this->input->post('firstname_en'));
        $firstname_th = $this->security->xss_clean($this->input->post('firstname_th'));
        $lastname_en = $this->security->xss_clean($this->input->post('lastname_en'));
        $lastname_th = $this->security->xss_clean($this->input->post('lastname_th'));
        $title_en = $this->security->xss_clean($this->input->post('title_en'));
        $title_th = $this->security->xss_clean($this->input->post('title_th'));
        $gender = $this->security->xss_clean($this->input->post('gender'));
        $street_th = $this->security->xss_clean($this->input->post('street_th'));
        $sub_district_th = $this->security->xss_clean($this->input->post('sub_district_th'));
        $district_th = $this->security->xss_clean($this->input->post('district_th'));
        $province_th = $this->security->xss_clean($this->input->post('province_th'));
        $postal_code = $this->security->xss_clean($this->input->post('postal_code'));
        $phone = $this->security->xss_clean($this->input->post('phone'));
        $mobile_phone = $this->security->xss_clean($this->input->post('mobile_phone'));
        $email = $this->security->xss_clean($this->input->post('email'));
        $website = $this->security->xss_clean($this->input->post('website'));

        $data = array(
            'firstname_en' => $firstname_en,
            'firstname_th' => $firstname_th,
            'lastname_en' => $lastname_en,
            'lastname_th' => $lastname_th,
            'title_en' => $title_en,
            'title_th' => $title_th,
            'gender' => $gender,
            'street_th' => $street_th,
            'sub_district_th' => $sub_district_th,
            'district_th' => $district_th,
            'province_th' => $province_th,
            'postal_code' => $postal_code,
            'phone' => $phone,
            'mobile_phone' => $mobile_phone,
            'email' => $email,
            'website' => $website
        );

        $this->db->where('researcher_id', $researcher_id);
        $this->db->update('res_profile', $data);
    }

}
