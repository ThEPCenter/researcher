<?php

class Upload_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_upload_data($user_id) {
        $this->db->where('user_id', $user_id);
        return $this->db->get('res_upload');
    }

    public function add_upload_data($file_name, $file_size, $upload_folder) {
        $user_id = $this->session->userdata('user_id');
        $data = array(
            'file_name' => $file_name,
            'file_size' => $file_size,
            'upload_folder' => $upload_folder,
            'user_id' => $user_id,
            'created' => time(),
            'updated' => time()
        );
        $this->db->insert('res_upload', $data);
    }

    public function get_user_upload($user_id) {
        $this->db->where('user_id', $user_id);
        return $this->db->get('res_profile');
    }

}
