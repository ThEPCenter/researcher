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
        $query = $this->profile_model->get_user_profile($username);
        if ($query) {
            foreach ($query as $profile):
                $data['researcher_id'] = $profile->researcher_id;
                $data['firstname_en'] = $profile->firstname_en;
                $data['lastname_en'] = $profile->lastname_en;
            endforeach;
        } else {
            $data['no_user'] = "ขออภัยไม่พบผู้ใช้ $username";
        }
        $data['title'] = $username . "'s profile";
        $data['username'] = $this->session->userdata('username');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('profile_view', $data);
        $this->load->view('templates/footer', $data);
    }

    public function user($username) {
        if (empty($username)) {
            redirect('home');
        } else {
            $this->load->model('profile_model');
            $query = $this->profile_model->get_user_profile($username);

            if ($query) {
                $row = $query->row();
                $data['researcher_id'] = $row->researcher_id;
                $data['firstname_en'] = $row->firstname_en;
            } else {
                $data['no_user'] = "ขออภัยไม่พบผู้ใช้ $username";
            }
        }

        $data['title'] = $username . "'s profile";
        $data['username'] = $username;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('profile_view');
        $this->load->view('templates/footer');
    }

    public function add() {
        $data['title'] = 'Add Profile';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('add_profile', $data);
        $this->load->view('templates/footer', $data);
    }

}
