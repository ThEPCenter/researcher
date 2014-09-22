<?php

class Admin extends CI_Controller {

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

        if ($this->session->userdata('level') != 10) {
            redirect('home');
        }
    }

    public function index() {
        $data['title'] = 'Admin Home';
        $data['username'] = $this->session->userdata('username');
        $data['recent_login'] = date("F j, Y. g:i:s a.", strtotime($this->session->userdata('recent_login')));
        $data['last_login'] = date("F j, Y. g:i:s a.", strtotime($this->session->userdata('last_login')));
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin_view');
        $this->load->view('templates/footer', $data);
    }

    public function search() {
        $data['title'] = 'Admin Home ค้นหา';
        $data['username'] = $this->session->userdata('username');
        $data['recent_login'] = date("F j, Y. g:i:s a.", strtotime($this->session->userdata('recent_login')));
        $data['last_login'] = date("F j, Y. g:i:s a.", strtotime($this->session->userdata('last_login')));
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin_view');
        $this->load->view('templates/footer', $data);
    }

}
