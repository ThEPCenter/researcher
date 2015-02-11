<?php

class Help extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('html');
    }

    public function index() {
        $data['title'] = 'Help';
        $this->load->view('templates/header', $data);
        $this->load->view('help/help_view');
        $this->load->view('templates/footer');
    }

    public function add_publication() {
        $this->load->view('help/add_publication_view');
    }

    public function edit_publication() {
        $data['title'] = 'วิธีการแก้ไขข้อมูล Publication';
        $this->load->view('templates/header', $data);
        $this->load->view('help/edit_publication_view');
        $this->load->view('templates/footer');
    }

}
