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

    public function user($username) {
        
    }

    public function add() {
        
    }

}
