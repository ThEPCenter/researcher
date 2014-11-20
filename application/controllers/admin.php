<?php

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // ======== Library ========//
        $this->load->library('session');

        // ======== Driver ======== //
        $this->load->database();

        // ======== Helper ======== //
        $this->load->helper('url');
        $this->load->helper('html');

        // ======== Class ========//
        $this->load->library('pagination');

        if (!($this->session->userdata('validated'))) {
            redirect('login');
        }

        if ($this->session->userdata('level') != 10) {
            redirect('home');
        }

        // ========= Commom Models ========= //
        $this->load->model('admin_model');
    }

    public function index() {
        $data['title'] = 'Admin Home';
        $data['username'] = $this->session->userdata('username');
        $data['recent_login'] = date("F j, Y. g:i:s a.", strtotime($this->session->userdata('recent_login')));
        $data['last_login'] = date("F j, Y. g:i:s a.", strtotime($this->session->userdata('last_login')));
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/home');
        $this->load->view('templates/footer', $data);
    }

    public function search() {
        $data['title'] = 'Search researcher';
        $data['username'] = $this->session->userdata('username');
        $data['recent_login'] = date("F j, Y. g:i:s a.", strtotime($this->session->userdata('recent_login')));
        $data['last_login'] = date("F j, Y. g:i:s a.", strtotime($this->session->userdata('last_login')));
        $keyword = $this->input->post('keyword');
        if (!empty($keyword)):
            $data['query'] = $this->admin_model->search_researcher($keyword);
        $data['search_num_rows'] = $this->admin_model->get_search_numrow($keyword);
        endif;

        $data['keyword'] = $keyword;
        

        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/search');
        $this->load->view('templates/footer', $data);
    }

    public function add_researcher() {
        $data['title'] = 'Add Researcher';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/add_researcher');
        $this->load->view('templates/footer', $data);
    }

    public function check_name() {
        $data['msg'] = $this->admin_model->get_fullname();
        $this->load->view('admin/check_name', $data);
    }

    public function add_researcher_process() {
        $insert_id = $this->admin_model->add_new_researcher();
        if (!empty($insert_id)):
            header("Location: profile/$insert_id");
        else:
            header("Location: index");
        endif;
    }

    public function researcher_list($page_num = "") {
        // ========== Pagination ===================== //
        $data['num'] = $this->db->count_all_results('res_profile');
        $config['base_url'] = site_url() . '/admin/researcher_list/';
        $config['total_rows'] = $data['num'];
        $config['per_page'] = 20;       // rows per page
        $data['per_page'] = $config['per_page'];
        $config['use_page_numbers'] = TRUE;     // If you prefer to show the the actual page number, set this to TRUE.
        // Customizing the "Digit" Link
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        // Customizing the "Current Page" Link
        $config['cur_tag_open'] = '<li><a style="background-color:#eee;" href="#"><b>';
        $config['cur_tag_close'] = '</b></a></li>';

        // Customizing the First Link
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        // Customizing the Last Link
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        // Customizing the "Next" Link
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        // Customizing the "Previous" Link
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';


        $this->pagination->initialize($config);
        $data['pagination_data'] = $this->pagination->create_links();
        // =========================================== //

        if (!isset($page_num) || $page_num < 1 || $page_num == "") :
            $page_num = 1;
        endif;
        $data['query_list'] = $this->admin_model->get_researcher_list($page_num, $config['per_page']);

        $data['title'] = 'Researcher List.';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/researcher_list', $data);
        $this->load->view('templates/footer');
    }

    // ---------------------------------------------------------------------
    // ========================= Profile ===================================

    public function profile($research_id) {
        $data['query'] = $this->admin_model->get_profile($research_id);
        $data['title'] = 'Profile';
        foreach ($data['query'] as $pro) {
            $dob = $pro->dob;
        }
        if (!empty($dob)):
            $data['age'] = $this->cal_age($dob);
        endif;
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/profile', $data);
        $this->load->view('templates/footer', $data);
    }

    public function edit_profile() {
        $researcher_id = $this->input->post('researcher_id');
        $data['query'] = $this->admin_model->get_profile($researcher_id);
        $data['title'] = 'Edit Profile';

        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/edit_profile', $data);
        $this->load->view('templates/footer', $data);
    }

    public function edit_profile_process() {
        $researcher_id = $this->input->post('researcher_id');
        $this->admin_model->update_profile();
        redirect(site_url() . "/admin/profile/$researcher_id");
    }

    // ---------------------------------------------------------------------
    // ======================= Education ===================================
    public function education($researcher_id = '') {
        $data['researcher_id'] = $researcher_id;
        $data['query'] = $this->admin_model->get_education($researcher_id);
        $profile = $this->admin_model->get_profile($researcher_id);
        foreach ($profile as $pro) {
            $data['title'] = "$pro->firstname_en $pro->lastname_en's Education";
        }
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/education', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add_education() {
        $data['researcher_id'] = $this->input->post('researcher_id');
        $profile = $this->admin_model->get_profile($data['researcher_id']);
        foreach ($profile as $pro) {
            $data['title'] = "Add $pro->firstname_en $pro->lastname_en's education";
        }
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/add_education', $data);
        $this->load->view('templates/footer');
    }

    public function add_education_process() {
        $researcher_id = $this->input->post('researcher_id');
        $this->admin_model->add_new_education();
        redirect(site_url() . "/admin/education/$researcher_id");
    }

    public function edit_education($education_id) {
        $data['title'] = 'Edit education.';
        $data['query'] = $this->admin_model->get_edit_education($education_id);
        foreach ($data['query'] as $q_ed) {
            $data['profile'] = $this->admin_model->get_profile($q_ed->researcher_id);
        }
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/edit_education', $data);
        $this->load->view('templates/footer');
    }

    public function edit_education_process() {
        $researcher_id = $this->input->post('researcher_id');
        $this->admin_model->update_education();
        redirect(site_url() . "/admin/education/$researcher_id");
    }

    public function delete_education($education_id) {
        $researcher_id = $this->admin_model->remove_education($education_id);
        if (!empty($researcher_id)) {
            redirect(site_url() . "/admin/education/$researcher_id");
        } else {
            redirect(site_url() . "/admin");
        }
    }

    // ---------------------------------------------------------------------
    // ========================= Employment ================================

    public function employment($researcher_id) {
        $data['researcher_id'] = $researcher_id;
        $data['query'] = $this->admin_model->get_employment($researcher_id);
        $profile = $this->admin_model->get_profile($researcher_id);
        foreach ($profile as $pro) {
            $data['title'] = "$pro->firstname_en $pro->lastname_en's Employment";
        }
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/employment', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add_employment() {
        $data['researcher_id'] = $this->input->post('researcher_id');
        $profile = $this->admin_model->get_profile($data['researcher_id']);
        foreach ($profile as $pro) {
            $data['title'] = "Add $pro->firstname_en $pro->lastname_en's Employment";
        }
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/add_employment', $data);
        $this->load->view('templates/footer');
    }

    public function add_employment_process() {
        $researcher_id = $this->input->post('researcher_id');
        $this->admin_model->add_new_employment();
        redirect(site_url() . "/admin/employment/$researcher_id");
    }

    public function edit_employment() {
        $researcher_id = $this->input->post('researcher_id');
        $profile = $this->admin_model->get_profile($researcher_id);
        foreach ($profile as $pro) {
            $data['title'] = "Edit $pro->firstname_en $pro->lastname_en's Employment";
        }
        $data['query'] = $this->admin_model->get_edit_employment();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/edit_employment', $data);
        $this->load->view('templates/footer');
    }

    public function edit_employment_process() {
        $researcher_id = $this->input->post('researcher_id');
        $this->admin_model->update_employment();
        redirect(site_url() . "/admin/employment/$researcher_id");
    }

    // ---------------------------------------------------------------------
    // ========================== Training =================================

    public function training($researcher_id) {
        $data['researcher_id'] = $researcher_id;
        $data['query'] = $this->admin_model->get_training($researcher_id);
        $profile = $this->admin_model->get_profile($researcher_id);
        foreach ($profile as $pro) {
            $data['title'] = "$pro->firstname_en $pro->lastname_en's Training";
        }
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/training', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add_training() {
        $data['researcher_id'] = $this->input->post('researcher_id');
        $profile = $this->admin_model->get_profile($data['researcher_id']);
        foreach ($profile as $pro) {
            $data['title'] = "Add $pro->firstname_en $pro->lastname_en's training";
        }
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/add_training', $data);
        $this->load->view('templates/footer');
    }

    public function add_training_process() {
        $researcher_id = $this->input->post('researcher_id');
        $this->admin_model->add_new_training();
        redirect(site_url() . "/admin/training/$researcher_id");
    }

    public function edit_training($training_id) {
        $data['query'] = $this->admin_model->get_edit_training($training_id);
        foreach ($data['query'] as $q_train) {
            $profile = $this->admin_model->get_profile($q_train->researcher_id);
            foreach ($profile as $pro) {
                $data['title'] = "Edit $pro->firstname_en $pro->lastname_en's training";
            }
        }
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/edit_training', $data);
        $this->load->view('templates/footer');
    }

    public function edit_training_process() {
        $researcher_id = $this->input->post('researcher_id');
        $this->admin_model->update_training();
        redirect(site_url() . "/admin/training/$researcher_id");
    }

    public function delete_training($training_id) {
        $researcher_id = $this->admin_model->remove_training($training_id);
        if (!empty($researcher_id)) {
            redirect(site_url() . "/admin/training/$researcher_id");
        } else {
            redirect(site_url() . "/admin");
        }
    }

    // ---------------------------------------------------------------------
    // ========================== Expertise ================================

    public function expertise($researcher_id) {
        $data['researcher_id'] = $researcher_id;
        $data['query'] = $this->admin_model->get_expertise($researcher_id);
        $profile = $this->admin_model->get_profile($researcher_id);
        foreach ($profile as $pro) {
            $data['title'] = "$pro->firstname_en $pro->lastname_en's Expertise";
        }
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/expertise', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add_expertise() {
        $data['researcher_id'] = $this->input->post('researcher_id');
        $profile = $this->admin_model->get_profile($data['researcher_id']);
        foreach ($profile as $pro) {
            $data['title'] = "Add $pro->firstname_en $pro->lastname_en's Field of Expertise";
        }
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/add_expertise', $data);
        $this->load->view('templates/footer');
    }

    public function add_expertise_process() {
        $researcher_id = $this->input->post('researcher_id');
        $this->admin_model->add_new_expertise();
        redirect(site_url() . "/admin/expertise/$researcher_id");
    }

    public function edit_expertise() {
        $data['researcher_id'] = $this->input->post('researcher_id');
        $data['query'] = $this->admin_model->get_edit_expertise();
        $profile = $this->admin_model->get_profile($data['researcher_id']);
        foreach ($profile as $pro) {
            $data['title'] = "Edit $pro->firstname_en $pro->lastname_en's Field of Expertise";
        }
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/edit_expertise', $data);
        $this->load->view('templates/footer');
    }

    public function edit_expertise_process() {
        $researcher_id = $this->input->post('researcher_id');
        $this->admin_model->update_expertise();
        redirect(site_url() . "/admin/expertise/$researcher_id");
    }

    // ---------------------------------------------------------------------
    // ========================= Publication ===============================

    public function publication($researcher_id) {
        $data['query'] = $this->admin_model->get_publication($researcher_id);
        $data['profile'] = $this->admin_model->get_profile($researcher_id);
        $data['title'] = 'Publication';
        $data['researcher_id'] = $researcher_id;
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/publication', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add_publication() {
        $data['researcher_id'] = $this->input->post('researcher_id');
        $profile = $this->admin_model->get_profile($data['researcher_id']);
        foreach ($profile as $pro) {
            $data['title'] = "Add $pro->firstname_en $pro->lastname_en's Publication";
        }
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/add_publication', $data);
        $this->load->view('templates/footer');
    }

    public function add_publication_process() {
        $researcher_id = $this->input->post('researcher_id');
        $this->admin_model->add_new_publication();
        redirect(site_url() . "/admin/publication/$researcher_id");
    }

    public function edit_publication() {
        $data['query'] = $this->admin_model->get_edit_publication();
        foreach ($data['query'] as $q_pub) {
            $profile = $this->admin_model->get_profile($q_pub->researcher_id);
            foreach ($profile as $pro) {
                $data['title'] = "Edit $pro->firstname_en $pro->lastname_en's publication";
            }
        }
        $this->load->view('templates/header', $data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/edit_publication', $data);
        $this->load->view('templates/footer');
    }

    public function edit_publication_process() {
        $researcher_id = $this->input->post('researcher_id');
        $this->admin_model->update_publication();
        redirect(site_url() . "/admin/publication/$researcher_id");
    }

    // ---------------------------------------------------------------------

    public function cal_age($dob_timestamp) {
        if (version_compare(PHP_VERSION, '5.3.0') >= 0):
            $birth_time = date("Y-m-d", $dob_timestamp);
            $from = new DateTime($birth_time);
            $to = new DateTime('today');
            return $from->diff($to)->y;
        else:
            //date in mm/dd/yyyy format; or it can be in other formats as well
            $birth_time = date("m/d/Y", $dob_timestamp);
            //explode the date to get month, day and year
            $birthDate = explode("/", $birth_time);
            //get age from date or birthdate
            return (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y") - $birthDate[2]) - 1) : (date("Y") - $birthDate[2]));
        endif;
    }

}
