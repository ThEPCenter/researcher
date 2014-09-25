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
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/home');
        $this->load->view('templates/footer', $data);
    }

    public function search() {
        $data['title'] = 'Admin Home ค้นหา';
        $data['username'] = $this->session->userdata('username');
        $data['recent_login'] = date("F j, Y. g:i:s a.", strtotime($this->session->userdata('recent_login')));
        $data['last_login'] = date("F j, Y. g:i:s a.", strtotime($this->session->userdata('last_login')));
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/search');
        $this->load->view('templates/footer', $data);
    }

    public function add_researcher() {
        $data['title'] = 'Add Researcher';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/add_researcher');
        $this->load->view('templates/footer', $data);
    }

    public function check_name() {
        $this->load->model('admin_model');
        $data['msg'] = $this->admin_model->get_fullname();
        $this->load->view('admin/check_name', $data);
    }

    public function add_researcher_process() {
        $this->load->model('admin_model');
        $result = $this->admin_model->add_new_researcher();
        if ($result) {
            $data['title'] = 'Add new research success.';
        } else {
            $data['title'] = 'Add new research Fail!';
        }
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/result', $data);
        $this->load->view('templates/footer');
    }

}
