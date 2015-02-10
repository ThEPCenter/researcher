<?php

class Help extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        
    }

    public function add_publication() {
        $this->load->view('help/add_publication_view');
    }

    public function edit_publication() {
        $this->load->view('help/edit_publication_view');
    }

}
