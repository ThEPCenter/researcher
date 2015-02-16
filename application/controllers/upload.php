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
        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');

        $this->load->model('table_model');
        $this->load->model('upload_model');

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
        $user_id = $this->session->userdata('user_id');
        $this->db->where('user_id', $user_id);
        $q_profile = $this->db->get('res_profile');
        foreach ($q_profile->result() as $profile):
            $data['researcher_id'] = $profile->researcher_id;
            $data['pic_url'] = $profile->pic_url;
        endforeach;

        if ($this->check_upload_quantity($user_id)):
            $data['error'] = '<p><strong>ขออภัย คุณ upload ไฟล์ เกินข้อจำกัดจำนวน 10 ไฟล์แล้ว</strong></p>';
            $this->load->view('upload_view', $data);
            $this->load->view('templates/footer');
        else:
            $config['upload_path'] = './picture_upload';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '400';
            $config['max_width'] = '600';
            $config['max_height'] = '800';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload()) {
                $data['error'] = '<strong>' . $this->upload->display_errors() . '</strong><br>';
                $this->load->view('upload_view', $data);
                $this->load->view('templates/footer');
            } else {
                $data['upload_data'] = $this->upload->data();
                $file_name = $data['upload_data']['file_name'];
                $file_size = $data['upload_data']['file_size'];
                $upload_folder = 'picture_upload';

                $this->upload_model->add_upload_data($file_name, $file_size, $upload_folder);

                $this->load->view('upload_success', $data);
                $this->load->view('templates/footer');
            }
        endif;
    }

    public function check_upload_quantity($user_id) {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('res_upload');
        $upload_quantity = $query->num_rows;
        if ($upload_quantity >= 10):
            return TRUE;
        else:
            return FALSE;
        endif;
    }

}
