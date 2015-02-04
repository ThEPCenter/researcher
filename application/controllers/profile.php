<?php

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();

// ======== Library ========//
        $this->load->library('session');

// ======== Driver ======== //
        $this->load->database();

// ======== Helper ======== //
        $this->load->helper('url');
        $this->load->helper('html');

        $this->load->helper(array('form', 'url'));

// ======== Models ======== //
        $this->load->model('profile_model');

        if (!($this->session->userdata('validated'))) {
            redirect('login');
        }
    }

    public function index() {
        $username = $this->session->userdata('username');
        $data['q_profile'] = $this->profile_model->get_user_profile($username);
        foreach ($data['q_profile'] as $profile):
            $data['researcher_id'] = $profile->researcher_id;
        endforeach;
        $data['q_education'] = $this->profile_model->get_education($data['researcher_id']);
        $data['q_employment'] = $this->profile_model->get_employment($data['researcher_id']);
        $data['q_training'] = $this->profile_model->get_training($data['researcher_id']);
        $data['q_expertise'] = $this->profile_model->get_expertise($data['researcher_id']);
        $data['q_publication'] = $this->profile_model->get_publication($data['researcher_id']);
        $data['title'] = $username . "'s profile";
        $data['username'] = $username;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('basic_view');
        $this->load->view('education_view');
        $this->load->view('employment_view');
        $this->load->view('training_view');
        $this->load->view('expertise_view');
        $this->load->view('publication_view');
        $this->load->view('templates/footer');
    }

    public function check_name() {
        $data['msg'] = $this->profile_model->get_fullname();
        $this->load->view('check_name', $data);
    }

    public function add_basic_process() {
        $this->profile_model->update_profile();
        redirect(site_url() . "profile#basic");
    }

    public function edit_profile_process() {
        $this->profile_model->update_profile();
        redirect(site_url() . "profile#basic");
    }

    public function add_education_process() {
        $this->profile_model->add_new_education();
        redirect(site_url() . "profile#education");
    }

    public function edit_education_process() {
        $this->profile_model->update_education();
        redirect(site_url() . "profile#education");
    }

    public function delete_education() {
        $this->profile_model->remove_education();
    }

    public function add_employment_process() {
        $this->profile_model->add_new_employment();
        redirect(site_url() . "profile#employment");
    }

    public function edit_employment_process() {
        $this->profile_model->update_employment();
        redirect(site_url() . "profile#employment");
    }

    public function add_training_process() {
        $this->profile_model->add_new_training();
        redirect(site_url() . "profile#training");
    }

    public function edit_training_process() {
        $this->profile_model->update_training();
        redirect(site_url() . "profile#training");
    }

    public function delete_training() {
        $this->profile_model->remove_training();
    }

    public function add_expertise_process() {
        $this->profile_model->add_new_expertise();
        redirect(site_url() . "profile#expertise");
    }

    public function edit_expertise_process() {
        $this->profile_model->update_expertise();
        redirect(site_url() . "profile#expertise");
    }

    public function add_publication_process() {
        $this->profile_model->add_new_publication();
        redirect(site_url() . "profile#publication");
    }

    public function edit_publication_process() {
        $this->profile_model->update_publication();
        redirect(site_url() . "profile#publication");
    }

    // ========================================================================
    // ============= Upload picture ========================= //
}
