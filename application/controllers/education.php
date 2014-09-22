<?php

class Education extends CI_Controller {

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
        
    }

    public function index() {
        $data['title'] = 'Education';
        $data['username'] = $this->session->userdata('username');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('education_view', $data);
        $this->load->view('templates/footer', $data);
    }

}
