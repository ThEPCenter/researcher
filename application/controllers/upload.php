<?php

class Upload extends CI_Controller {

    function __construct() {
        parent::__construct();
        // ======== Library ========//
        $this->load->library('session');
        // ======== Driver ======== //
        $this->load->database();
        $this->load->dbforge();
        // ======== Helper ======== //
        $this->load->helper('url');
        $this->load->helper('html');
        // ======== Model ========= //
        $this->load->model('table_model');
        $this->load->model('upload_model');
        // ======== Login ========= //
        if (!($this->session->userdata('validated'))) {
            redirect('login');
        }
    }

    function index() {
        $user_id = $this->session->userdata('user_id');
        $data = $this->get_profile_data($user_id);
        if ($this->check_upload_quantity($user_id)):
            $data['error'] = $this->error_message['limit'];
        else:
            $data['error'] = $this->error_message['no_error'];
        endif;
        $this->load->view('upload_view', $data);
        $this->load->view('templates/footer');
    }

    function do_upload() {
        $user_id = $this->session->userdata('user_id');
        $data = $this->get_profile_data($user_id);
        if ($this->check_upload_quantity($user_id)):
            $data['error'] = $this->error_message['limit'];
            $this->load->view('upload_view', $data);
        else:
            $this->upload_config();
            if (!$this->upload->do_upload()) {
                $data['error'] = '<strong>' . $this->upload->display_errors() . '</strong><br>';
                $this->load->view('upload_view', $data);
            } else {
                $data['upload_data'] = $this->upload->data();
                $file_name = $data['upload_data']['file_name'];
                $file_size = $data['upload_data']['file_size'];
                $this->upload_model->add_upload_data($file_name, $file_size, 'picture_upload');
                $this->load->view('upload_success', $data);
            }
        endif;
        $this->load->view('templates/footer');
    }

    private $error_message = array(
        'limit' => '<p><strong>ขออภัย คุณ upload ไฟล์ครบจำนวน 5 ไฟล์แล้ว</strong></p>',
        'no_error' => ' '
    );

    public function get_profile_data($user_id) {
        $q_profile = $this->upload_model->get_user_upload($user_id);
        foreach ($q_profile->result() as $profile):
            $data['researcher_id'] = $profile->researcher_id;
            $data['pic_url'] = $profile->pic_url;
        endforeach;
        return $data;
    }

    function upload_config() {
        $config['upload_path'] = './picture_upload';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '400';
        $config['max_width'] = '600';
        $config['max_height'] = '800';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
    }

    public function check_upload_quantity($user_id) {
        $query = $this->upload_model->get_upload_data($user_id);
        if ($query->num_rows >= 5):
            return TRUE;
        else:
            return FALSE;
        endif;
    }

}
