<?php

class profile_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_profile($researcher_id) {
        $this->db->where('researcher_id', $researcher_id);
        $query = $this->db->get('res_profile');
        return $query->result();
    }

    public function get_user_profile($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('tb_new_user');

        if ($query->num_rows == 1) {
            $row = $query->row();
            $this->db->where('user_id', $row->id);
            $query = $this->db->get('res_profile');
            return $query->result();
        }
    }

    public function get_education($researcher_id) {
        $q_pro = $this->get_profile($researcher_id);
        if (!$q_pro) {
            redirect('home');
        }
        $this->db->where('researcher_id', $researcher_id);
        $this->db->order_by("grad_year", "asc");
        $query = $this->db->get('res_education');
        return $query->result();
    }

    public function get_employment($researcher_id) {
        $q_pro = $this->get_profile($researcher_id);
        if (!$q_pro) {
            redirect('home');
        }
        $this->db->where('researcher_id', $researcher_id);
        $query = $this->db->get('res_employment');
        return $query->result();
    }

    public function get_training($researcher_id) {
        $this->db->where('researcher_id', $researcher_id);
        $query = $this->db->get('res_training');
        return $query->result();
    }

    public function get_expertise($researcher_id) {
        $this->db->where('researcher_id', $researcher_id);
        $query = $this->db->get('res_expertise');
        return $query->result();
    }

    public function get_publication($researcher_id) {
        $this->db->where('researcher_id', $researcher_id);
        $query = $this->db->get('res_publication');
        return $query->result();
    }

}
