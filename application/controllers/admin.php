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
        $data['title'] = 'Search researcher';
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

    public function profile($research_id) {
        $this->load->model('admin_model');
        $data['query'] = $this->admin_model->get_profile($research_id);
        $data['title'] = 'Profile';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/profile', $data);
        $this->load->view('templates/footer', $data);
    }

    public function edit_profile() {
        $researcher_id = $this->security->xss_clean($this->input->post('researcher_id'));
        $this->load->model('admin_model');
        $data['query'] = $this->admin_model->get_profile($researcher_id);
        $data['title'] = 'Edit Profile';

        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/edit_profile', $data);
        $this->load->view('templates/footer', $data);
    }

    public function edit_profile_process() {
        $this->load->model('admin_model');
        $this->admin_model->update_profile();
        $data['title'] = 'Edit researcher profile success.';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/result', $data);
        $this->load->view('templates/footer');
    }

    public function researcher_list() {
        $this->load->model('admin_model');
        $data['query'] = $this->admin_model->get_researcher_list();
        $data['title'] = 'Researcher List.';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/researcher_list', $data);
        $this->load->view('templates/footer');
    }

    public function education($research_id) {
        $this->load->model('admin_model');
        $data['query'] = $this->admin_model->get_education($research_id);
        $data['title'] = 'Education';
        $data['researcher_id'] = $research_id;
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/education', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add_education() {
        $data['title'] = "Add education";
        $data['researcher_id'] = $this->input->post('researcher_id');
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/add_education', $data);
        $this->load->view('templates/footer');
    }

    public function add_education_process() {
        $this->load->model('admin_model');
        $this->admin_model->add_new_education();
        $data['title'] = 'Add education success.';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/result', $data);
        $this->load->view('templates/footer');
    }
    
    public function edit_education() {
        $data['title'] = 'Edit education.';
        $this->load->model('admin_model');
        $data['query'] = $this->admin_model->get_edit_education();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/edit_education', $data);
        $this->load->view('templates/footer');
    }
    
    public function edit_education_process() {
        $this->load->model('admin_model');
        $this->admin_model->update_education();
        $data['title'] = 'Edit education success.';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/result', $data);
        $this->load->view('templates/footer');
    }

}
