<?php

class Search extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // ======== Helper ======== //
        $this->load->helper('url');
        $this->load->helper('html');
        
    }

    public function index() {
        $data['title'] = 'Search';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/footer', $data);
    }

}
