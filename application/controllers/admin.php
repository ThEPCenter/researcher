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
        $researcher_id = $this->input->post('researcher_id');
        $this->load->model('admin_model');
        $this->admin_model->update_profile();
        redirect(site_url() . "/admin/profile/$researcher_id");
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

    public function education($researcher_id) {
        $this->load->model('admin_model');
        $data['query'] = $this->admin_model->get_education($researcher_id);
        $data['profile'] = $this->admin_model->get_profile($researcher_id);
        $data['title'] = 'Education';
        $data['researcher_id'] = $researcher_id;
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
        $researcher_id = $this->input->post('researcher_id');
        $this->load->model('admin_model');
        $this->admin_model->add_new_education();
        redirect(site_url() . "/admin/education/$researcher_id");
    }

    public function edit_education($education_id) {
        $data['title'] = 'Edit education.';
        $this->load->model('admin_model');
        $data['query'] = $this->admin_model->get_edit_education($education_id);
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/edit_education', $data);
        $this->load->view('templates/footer');
    }

    public function edit_education_process() {
        $researcher_id = $this->input->post('researcher_id');
        $this->load->model('admin_model');
        $this->admin_model->update_education();
        redirect(site_url() . "/admin/education/$researcher_id");
    }

    public function delete_education($education_id) {
        $this->load->model('admin_model');
        $researcher_id = $this->admin_model->remove_education($education_id);
        if (!empty($researcher_id)) {
            redirect(site_url() . "/admin/education/$researcher_id");
        } else {
            redirect(site_url() . "/admin");
        }
    }

    public function employment($researcher_id) {
        $this->load->model('admin_model');
        $data['query'] = $this->admin_model->get_employment($researcher_id);
        $data['profile'] = $this->admin_model->get_profile($researcher_id);
        $data['title'] = 'Employment Position';
        $data['researcher_id'] = $researcher_id;
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/employment', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add_employment() {
        $data['title'] = "Add Employment";
        $data['researcher_id'] = $this->input->post('researcher_id');
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/add_employment', $data);
        $this->load->view('templates/footer');
    }

    public function add_employment_process() {
        $researcher_id = $this->input->post('researcher_id');
        $this->load->model('admin_model');
        $this->admin_model->add_new_employment();
        redirect(site_url() . "/admin/education/$researcher_id");
    }

    public function edit_employment() {
        $data['title'] = 'Edit employment.';
        $this->load->model('admin_model');
        $data['query'] = $this->admin_model->get_edit_employment();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/edit_employment', $data);
        $this->load->view('templates/footer');
    }

    public function edit_employment_process() {
        $researcher_id = $this->input->post('researcher_id');
        $this->load->model('admin_model');
        $this->admin_model->update_employment();
        redirect(site_url() . "/admin/employment/$researcher_id");
    }

    public function training($researcher_id) {
        $this->load->model('admin_model');
        $data['query'] = $this->admin_model->get_training($researcher_id);
        $data['profile'] = $this->admin_model->get_profile($researcher_id);
        $data['title'] = 'Training';
        $data['researcher_id'] = $researcher_id;
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/training', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add_training() {
        $data['title'] = "Add training";
        $data['researcher_id'] = $this->input->post('researcher_id');
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/add_training', $data);
        $this->load->view('templates/footer');
    }

    public function add_training_process() {
        $researcher_id = $this->input->post('researcher_id');
        $this->load->model('admin_model');
        $this->admin_model->add_new_training();
        redirect(site_url() . "/admin/training/$researcher_id");
    }

    public function edit_training($training_id) {
        $data['title'] = 'Edit Training';
        $this->load->model('admin_model');
        $data['query'] = $this->admin_model->get_edit_training($training_id);
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/edit_training', $data);
        $this->load->view('templates/footer');
    }

    public function edit_training_process() {
        $researcher_id = $this->input->post('researcher_id');
        $this->load->model('admin_model');
        $this->admin_model->update_training();
        redirect(site_url() . "/admin/training/$researcher_id");
    }

    public function delete_training($training_id) {
        $this->load->model('admin_model');
        $researcher_id = $this->admin_model->remove_training($training_id);
        if (!empty($researcher_id)) {
            redirect(site_url() . "/admin/training/$researcher_id");
        } else {
            redirect(site_url() . "/admin");
        }
    }

    public function expertise($researcher_id) {
        $this->load->model('admin_model');
        $data['query'] = $this->admin_model->get_expertise($researcher_id);
        $data['profile'] = $this->admin_model->get_profile($researcher_id);
        $data['title'] = 'Expertise';
        $data['researcher_id'] = $researcher_id;
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/expertise', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add_expertise() {
        $data['title'] = "Add Expertise";
        $data['researcher_id'] = $this->input->post('researcher_id');
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/add_expertise', $data);
        $this->load->view('templates/footer');
    }

    public function add_expertise_process() {
        $researcher_id = $this->input->post('researcher_id');
        $this->load->model('admin_model');
        $this->admin_model->add_new_expertise();
        redirect(site_url() . "/admin/expertise/$researcher_id");
    }
    
    public function edit_expertise() {
        $data['title'] = 'Edit expertise';
        $this->load->model('admin_model');
        $data['query'] = $this->admin_model->get_edit_expertise();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/edit_expertise', $data);
        $this->load->view('templates/footer');
    }
    
    public function edit_expertise_process() {
        $researcher_id = $this->input->post('researcher_id');
        $this->load->model('admin_model');
        $this->admin_model->update_expertise();
        redirect(site_url() . "/admin/expertise/$researcher_id");
    }

}
