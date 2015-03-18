<?php

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // ======== Library ========//
        $this->load->library('session');

        // ======== Driver ======== //
        $this->load->database();

        // ======== Helper ======== //
        $this->load->helper('url');
        $this->load->helper('html');

        if (!($this->session->userdata('validated'))) {
            redirect('login');
        }

        if ($this->session->userdata('level') == 10) {
            redirect('admin');
        }

        $this->load->model('profile_model');
    }

    public function index() {
        $data['title'] = 'Home - ThEP Researcher Database Management System';
        $data['username'] = $this->session->userdata('username');
        $data['recent_login'] = date("F j, Y. g:i:s a.", strtotime($this->session->userdata('recent_login')));
        $data['last_login'] = date("F j, Y. g:i:s a.", strtotime($this->session->userdata('last_login')));
        $user_id = $this->session->userdata('user_id');
        $this->db->where('user_id', $user_id);
        $q_profile = $this->db->get('res_profile');
        foreach ($q_profile->result() as $profile):
            $data['firstname_en'] = $profile->firstname_en;
            $data['lastname_en'] = $profile->lastname_en;
        endforeach;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('home_view');
        $this->load->view('templates/footer', $data);
    }

}
