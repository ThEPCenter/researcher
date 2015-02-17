<?php

class Check_name extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // ======== Library ========//
        $this->load->library('session');
        // ======== Driver ======== //
        $this->load->database();
        // ======== Helper ======== //
        $this->load->helper('url');
        $this->load->helper('html');
        // ======== Models ======== //
        $this->load->model('profile_model');

        if (!($this->session->userdata('validated'))) {
            redirect('login');
        }
    }

    public function index() {
        $data['msg'] = $this->profile_model->get_fullname();
        $this->load->view('check_name', $data);
    }

}
