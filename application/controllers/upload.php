<?php

class Upload extends CI_Controller {

    function __construct() {
        parent::__construct();

        // ======== Library ========//
        $this->load->library('session');

        // ======== Driver ======== //
        $this->load->database();

        // ======== Helper ======== //
        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');

        if (!($this->session->userdata('validated'))) {
            redirect('login');
        }
    }

    function index() {

        $user_id = $this->session->userdata('user_id');
        $this->db->where('user_id', $user_id);
        $q_profile = $this->db->get('res_profile');
        foreach ($q_profile->result() as $profile):
            $data['researcher_id'] = $profile->researcher_id;
            $data['pic_url'] = $profile->pic_url;
        endforeach;
        $data['error'] = ' ';
        $this->load->view('upload_view', $data);
        $this->load->view('templates/footer');
    }

    function do_upload() {
        $config['upload_path'] = './picture_upload';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1024';
        $config['max_width'] = '1200';
        $config['max_height'] = '1250';

        $config['encrypt_name'] = TRUE;

        $user_id = $this->session->userdata('user_id');
        $this->db->where('user_id', $user_id);
        $q_profile = $this->db->get('res_profile');
        foreach ($q_profile->result() as $profile):
            $data['researcher_id'] = $profile->researcher_id;
            $data['pic_url'] = $profile->pic_url;
        endforeach;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            $data['error'] = $this->upload->display_errors();

            $this->load->view('upload_view', $data);
            $this->load->view('templates/footer');
        } else {
            $data['upload_data'] = $this->upload->data();

            $this->load->view('upload_success', $data);
            $this->load->view('templates/footer');
        }
    }

}
