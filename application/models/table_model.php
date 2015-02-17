<?php

class Table_model extends CI_Model {

    public function __construct() {
        parent::__construct();

        $this->table_initialization();
    }

    public function table_initialization() {
        $this->check_table_exists('res_upload', $this->res_upload_fields, 'upload_id');
    }

    public function check_table_exists($table_name, $fields, $primary_key) {
        if (!$this->db->table_exists($table_name)):
            $this->create_new_table($table_name, $fields, $primary_key);
        endif;
    }

    public function create_new_table($table_name, $fields, $primary_key) {
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key($primary_key, TRUE);
        $this->dbforge->create_table($table_name, TRUE);
    }

    private $res_upload_fields = array(
        'upload_id' => array('type' => 'INT', 'constraint' => 11, 'null' => FALSE, 'auto_increment' => TRUE),
        'file_name' => array('type' => 'VARCHAR', 'constraint' => 255, 'null' => FALSE),
        'file_size' => array('type' => 'FLOAT', 'null' => FALSE),
        'upload_folder' => array('type' => 'VARCHAR', 'constraint' => 255, 'null' => FALSE),
        'user_id' => array('type' => 'INT', 'constraint' => 11, 'null' => FALSE),
        'created' => array('type' => 'VARCHAR', 'constraint' => 255, 'null' => FALSE),
        'updated' => array('type' => 'VARCHAR', 'constraint' => 255, 'null' => FALSE)
    );

}
