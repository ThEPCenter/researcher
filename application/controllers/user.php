<?php

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // ======== Library ========//
        $this->load->library('session');

        // ======== Driver ======== //
        $this->load->database();

        // ======== Helper ======== //
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->helper('file');

        // ======== Models ======== //
        $this->load->model('user_model');

        if (!($this->session->userdata('validated'))) {
            redirect('login');
        }
    }

    public function index() {
        redirect(site_url() . 'user/setting');
    }

    public function setting() {
        $data['user_id'] = $this->session->userdata('user_id');
        $data['username'] = $this->session->userdata('username');
        $data['title'] = 'User Setting - ThEP Researcher Database Management System';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('user/setting_view');
        $this->load->view('templates/footer');
    }

    public function check_old_password() {
        $check_old = $this->user_model->check_password();
        if ($check_old):
            $data['message'] = '<span style="color: green;" class="glyphicon glyphicon-ok" aria-hidden="true"></span>';
        else :
            $data['message'] = '<span style="color: red;" class="glyphicon glyphicon-remove" aria-hidden="true"></span>';
        endif;
        $this->load->view('user/check_password', $data);
    }

    public function check_new_password() {
        $new_password = $this->input->post('new_password');
        $renew_password = $this->input->post('renew_password');
        if (!empty($new_password) && $new_password === $renew_password):
            $data['message'] = '<span style="color: green;" class="glyphicon glyphicon-ok" aria-hidden="true"></span>';
        else :
            $data['message'] = '<span style="color: red;" class="glyphicon glyphicon-remove" aria-hidden="true"></span>';
        endif;
        $this->load->view('user/check_password', $data);
    }

    public function check_enable_button() {
        $new_password = $this->input->post('new_password');
        $renew_password = $this->input->post('renew_password');
        $check_old = $this->user_model->check_password();
        if ($check_old && !empty($new_password) && $new_password === $renew_password):
            $data['message'] = 'enable';
        else:
            $data['message'] = 'disable';
        endif;
        $this->load->view('user/check_password', $data);
    }

    public function reset_password_process() {
        $this->user_model->update_password();
        redirect(site_url() . "user/setting");
    }

}
