<?php

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // ======== Driver ======== //
        $this->load->database();

        // ======== Helper ======== //
        $this->load->helper('url');
        $this->load->helper('html');
    }

    public function index() {
        $data['title'] = "Login";
        $this->load->view('templates/header', $data);
        $this->load->view('login_view', $data);
        $this->load->view('templates/footer');
    }

}
