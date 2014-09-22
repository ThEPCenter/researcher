<?php

class Logout extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // ======== Library ========//
        $this->load->library('session');
        
        // ======== Helper ======== //
        $this->load->helper('url');
    }

    public function index() {
        $this->session->sess_destroy();
        redirect('login');
    }

}
