<?php

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // ======== Library ========//
        $this->load->library('session');

        // ======== Driver ======== //
        $this->load->database();

        // ======== Helper ======== //
        $this->load->helper('url');
        $this->load->helper('html');

        if ($this->session->userdata('validated')) {
            redirect('home');
        }
    }

    public function index() {
        $data['title'] = "Login";
        $this->load->view('templates/header', $data);
        $this->load->view('login_view', $data);
        $this->load->view('templates/footer');
    }

    public function process() {
        $this->load->model('login_model');
        $result = $this->login_model->validate();
        if (!$result) {
            // If user did not validate, then show them login page again
            redirect(site_url() . 'login');
        } else {
            redirect(site_url() . 'home');
        }
    }

}
