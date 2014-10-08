<?php

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_fullname() {
        $firstname_en = $this->security->xss_clean($this->input->get('firstname_en'));
        $lastname_en = $this->security->xss_clean($this->input->get('lastname_en'));
        $this->db->where('firstname_en', $firstname_en);
        $this->db->where('lastname_en', $lastname_en);
        $query = $this->db->get('res_profile');

        if (empty($firstname_en) || empty($lastname_en)) {
            return '<span style="color: red" class="glyphicon glyphicon-remove"></span> <b style="color: red">กรุณากรอกชื่อและนามสกุล</b>';
        } else {
            if ($query->num_rows == 1) {
                return '<span style="color: red" class="glyphicon glyphicon-remove"></span> <b style="color: red">' . ucfirst($firstname_en) . ' ' . $lastname_en . ' ชื่อและนามสกุลนี้ซ้ำ.</b>';
            } else {
                return '<span style="color: green" class="glyphicon glyphicon-ok"></span> <b style="color: green">ชื่อและนามสกุลนี้สามารถใช้ได้</b>';
            }
        }
    }

    public function add_new_researcher() {
        $firstname_en = $this->security->xss_clean($this->input->post('firstname_en'));
        $lastname_en = $this->security->xss_clean($this->input->post('lastname_en'));

        $this->db->where('firstname_en', $firstname_en);
        $this->db->where('lastname_en', $lastname_en);
        $query = $this->db->get('res_profile');

        if ($query->num_rows == 1) {
            return FALSE;
        } else {
            if (empty($firstname_en) && empty($lastname_en)) {
                return FALSE;
            } else {
                $data = array(
                    "firstname_en" => $firstname_en,
                    "lastname_en" => $lastname_en
                );
                $this->db->insert('res_profile', $data);
                return TRUE;
            }
        }
    }

    public function get_researcher_list() {
        $query = $this->db->get('res_profile');
        return $query->result();
    }

    public function get_profile($researcher_id) {
        $this->db->where('researcher_id', $researcher_id);
        $query = $this->db->get('res_profile');
        return $query->result();
    }

    public function update_profile() {
        $researcher_id = $this->security->xss_clean($this->input->post('researcher_id'));
        $firstname_en = $this->security->xss_clean($this->input->post('firstname_en'));
        $firstname_th = $this->security->xss_clean($this->input->post('firstname_th'));
        $lastname_en = $this->security->xss_clean($this->input->post('lastname_en'));
        $lastname_th = $this->security->xss_clean($this->input->post('lastname_th'));
        $title_en = $this->security->xss_clean($this->input->post('title_en'));
        $title_th = $this->security->xss_clean($this->input->post('title_th'));
        $gender = $this->security->xss_clean($this->input->post('gender'));
        $street_th = $this->security->xss_clean($this->input->post('street_th'));
        $sub_district_th = $this->security->xss_clean($this->input->post('sub_district_th'));
        $district_th = $this->security->xss_clean($this->input->post('district_th'));
        $province_th = $this->security->xss_clean($this->input->post('province_th'));
        $postal_code = $this->security->xss_clean($this->input->post('postal_code'));
        $phone = $this->security->xss_clean($this->input->post('phone'));
        $mobile_phone = $this->security->xss_clean($this->input->post('mobile_phone'));
        $email = $this->security->xss_clean($this->input->post('email'));
        $website = $this->security->xss_clean($this->input->post('website'));
        $pic_url = $this->security->xss_clean($this->input->post('pic_url'));

        $data = array(
            'firstname_en' => $firstname_en,
            'firstname_th' => $firstname_th,
            'lastname_en' => $lastname_en,
            'lastname_th' => $lastname_th,
            'title_en' => $title_en,
            'title_th' => $title_th,
            'gender' => $gender,
            'street_th' => $street_th,
            'sub_district_th' => $sub_district_th,
            'district_th' => $district_th,
            'province_th' => $province_th,
            'postal_code' => $postal_code,
            'phone' => $phone,
            'mobile_phone' => $mobile_phone,
            'email' => $email,
            'website' => $website,
            'pic_url' => $pic_url
        );

        $this->db->where('researcher_id', $researcher_id);
        $this->db->update('res_profile', $data);
    }

    public function get_education($researcher_id) {
        $q_pro = $this->get_profile($researcher_id);
        if (!$q_pro) {
            redirect('admin');
        }
        $this->db->where('researcher_id', $researcher_id);
        $this->db->order_by("grad_year", "asc");
        $query = $this->db->get('res_education');
        return $query->result();
    }

    public function add_new_education() {
        $researcher_id = $this->input->post('researcher_id');
        $grad_year = $this->security->xss_clean($this->input->post('grad_year'));
        $degree = $this->security->xss_clean($this->input->post('degree'));
        $institute = $this->security->xss_clean($this->input->post('institute'));
        $major = $this->security->xss_clean($this->input->post('major'));
        $country = $this->security->xss_clean($this->input->post('country'));
        $thesis_title = $this->security->xss_clean($this->input->post('thesis_title'));
        $keyword = $this->security->xss_clean($this->input->post('keyword'));

        $data = array(
            'researcher_id' => $researcher_id,
            'grad_year' => $grad_year,
            'degree' => $degree,
            'institute' => $institute,
            'major' => $major,
            'country' => $country,
            'thesis_title' => $thesis_title,
            'keyword' => $keyword
        );

        $this->db->insert('res_education', $data);
    }

    public function get_edit_education($education_id) {
        $education_id = $this->security->xss_clean($education_id);
        $this->db->where('education_id', $education_id);
        $query = $this->db->get('res_education');
        return $query->result();
    }

    public function update_education() {
        $education_id = $this->input->post('education_id');
        $researcher_id = $this->input->post('researcher_id');
        $grad_year = $this->security->xss_clean($this->input->post('grad_year'));
        $degree = $this->security->xss_clean($this->input->post('degree'));
        $institute = $this->security->xss_clean($this->input->post('institute'));
        $major = $this->security->xss_clean($this->input->post('major'));
        $country = $this->security->xss_clean($this->input->post('country'));
        $thesis_title = $this->security->xss_clean($this->input->post('thesis_title'));
        $keyword = $this->security->xss_clean($this->input->post('keyword'));

        $data = array(
            'researcher_id' => $researcher_id,
            'grad_year' => $grad_year,
            'degree' => $degree,
            'institute' => $institute,
            'major' => $major,
            'country' => $country,
            'thesis_title' => $thesis_title,
            'keyword' => $keyword
        );

        $this->db->where('education_id', $education_id);
        $this->db->update('res_education', $data);
    }

    public function remove_education($education_id) {
        $this->db->where('education_id', $education_id);
        $query = $this->db->get('res_education');

        if ($query->num_rows == 1) {
            $row = $query->row();
            $researcher_id = $row->researcher_id;
            $this->db->delete('res_education', array('education_id' => $education_id));

            return $researcher_id;
        }
    }

    public function get_employment($researcher_id) {
        $q_pro = $this->get_profile($researcher_id);
        if (!$q_pro) {
            redirect('admin');
        }
        $this->db->where('researcher_id', $researcher_id);
        $query = $this->db->get('res_employment');
        return $query->result();
    }

    public function add_new_employment() {
        $researcher_id = $this->input->post('researcher_id');
        $academic = $this->security->xss_clean($this->input->post('academic'));
        $administrative = $this->security->xss_clean($this->input->post('administrative'));
        $research = $this->security->xss_clean($this->input->post('research'));
        $institute = $this->security->xss_clean($this->input->post('institute'));
        $faculty = $this->security->xss_clean($this->input->post('faculty'));
        $department = $this->security->xss_clean($this->input->post('department'));
        $street_en = $this->security->xss_clean($this->input->post('street_en'));
        $street_th = $this->security->xss_clean($this->input->post('street_th'));
        $sub_district_en = $this->input->post('sub_district_en');
        $sub_district_th = $this->input->post('sub_district_th');
        $district_en = $this->security->xss_clean($this->input->post('district_en'));
        $district_th = $this->security->xss_clean($this->input->post('district_th'));
        $province_en = $this->security->xss_clean($this->input->post('province_en'));
        $province_th = $this->security->xss_clean($this->input->post('province_th'));
        $postal_code = $this->security->xss_clean($this->input->post('postal_code'));
        $phone = $this->security->xss_clean($this->input->post('phone'));
        $mobile_phone = $this->security->xss_clean($this->input->post('mobile_phone'));
        $email = $this->security->xss_clean($this->input->post('email'));
        $website = $this->security->xss_clean($this->input->post('website'));
        $thep_lab_code = $this->security->xss_clean($this->input->post('thep_lab_code'));

        $data = array(
            'researcher_id' => $researcher_id,
            'academic' => $academic,
            'administrative' => $administrative,
            'research' => $research,
            'institute' => $institute,
            'faculty' => $faculty,
            'department' => $department,
            'street_en' => $street_en,
            'street_th' => $street_th,
            'sub_district_en' => $sub_district_en,
            'sub_district_th' => $sub_district_th,
            'district_en' => $district_en,
            'district_th' => $district_th,
            'province_en' => $province_en,
            'province_th' => $province_th,
            'postal_code' => $postal_code,
            'phone' => $phone,
            'mobile_phone' => $mobile_phone,
            'email' => $email,
            'website' => $website,
            'thep_lab_code' => $thep_lab_code
        );

        $this->db->insert('res_employment', $data);
    }

    public function get_edit_employment() {
        $employment_id = $this->input->post('employment_id');
        $this->db->where('employment_id', $employment_id);
        $query = $this->db->get('res_employment');
        return $query->result();
    }

    public function update_employment() {
        $employment_id = $this->input->post('employment_id');
        $researcher_id = $this->input->post('researcher_id');
        $academic = $this->security->xss_clean($this->input->post('academic'));
        $administrative = $this->security->xss_clean($this->input->post('administrative'));
        $research = $this->security->xss_clean($this->input->post('research'));
        $institute = $this->security->xss_clean($this->input->post('institute'));
        $faculty = $this->security->xss_clean($this->input->post('faculty'));
        $department = $this->security->xss_clean($this->input->post('department'));
        $street_en = $this->security->xss_clean($this->input->post('street_en'));
        $street_th = $this->security->xss_clean($this->input->post('street_th'));
        $sub_district_en = $this->security->xss_clean($this->input->post('sub_district_en'));
        $sub_district_th = $this->security->xss_clean($this->input->post('sub_district_th'));
        $district_en = $this->security->xss_clean($this->input->post('district_en'));
        $district_th = $this->security->xss_clean($this->input->post('district_th'));
        $province_en = $this->security->xss_clean($this->input->post('province_en'));
        $province_th = $this->security->xss_clean($this->input->post('province_th'));
        $postal_code = $this->security->xss_clean($this->input->post('postal_code'));
        $phone = $this->security->xss_clean($this->input->post('phone'));
        $mobile_phone = $this->security->xss_clean($this->input->post('mobile_phone'));
        $email = $this->security->xss_clean($this->input->post('email'));
        $website = $this->security->xss_clean($this->input->post('website'));
        $thep_lab_code = $this->security->xss_clean($this->input->post('thep_lab_code'));

        $data = array(
            'researcher_id' => $researcher_id,
            'academic' => $academic,
            'administrative' => $administrative,
            'research' => $research,
            'institute' => $institute,
            'faculty' => $faculty,
            'department' => $department,
            'street_en' => $street_en,
            'street_th' => $street_th,
            'sub_district_en' => $sub_district_en,
            'sub_district_th' => $sub_district_th,
            'district_en' => $district_en,
            'district_th' => $district_th,
            'province_en' => $province_en,
            'province_th' => $province_th,
            'postal_code' => $postal_code,
            'phone' => $phone,
            'mobile_phone' => $mobile_phone,
            'email' => $email,
            'website' => $website,
            'thep_lab_code' => $thep_lab_code
        );

        $this->db->where('employment_id', $employment_id);
        $this->db->update('res_employment', $data);
    }

    public function get_training($researcher_id) {
        $this->db->where('researcher_id', $researcher_id);
        $query = $this->db->get('res_training');
        return $query->result();
    }

    public function add_new_training() {
        $researcher_id = $this->input->post('researcher_id');
        $training_type = $this->security->xss_clean($this->input->post('training_type'));
        $institute = $this->security->xss_clean($this->input->post('institute'));
        $training_start = $this->security->xss_clean($this->input->post('training_start'));
        $training_end = $this->security->xss_clean($this->input->post('training_end'));
        $supervisor = $this->security->xss_clean($this->input->post('supervisor'));

        $data = array(
            'researcher_id' => $researcher_id,
            'training_type' => $training_type,
            'institute' => $institute,
            'training_start' => $training_start,
            'training_end' => $training_end,
            'supervisor' => $supervisor
        );

        $this->db->insert('res_training', $data);
    }

    public function get_edit_training($training_id) {
        $this->db->where('training_id', $training_id);
        $query = $this->db->get('res_training');
        return $query->result();
    }

    public function update_training() {
        $training_id = $this->input->post('training_id');
        $researcher_id = $this->input->post('researcher_id');
        $training_type = $this->security->xss_clean($this->input->post('training_type'));
        $institute = $this->security->xss_clean($this->input->post('institute'));
        $training_start = $this->security->xss_clean($this->input->post('training_start'));
        $training_end = $this->security->xss_clean($this->input->post('training_end'));
        $supervisor = $this->security->xss_clean($this->input->post('supervisor'));

        $data = array(
            'researcher_id' => $researcher_id,
            'training_type' => $training_type,
            'institute' => $institute,
            'training_start' => $training_start,
            'training_end' => $training_end,
            'supervisor' => $supervisor
        );

        $this->db->where('training_id', $training_id);
        $this->db->update('res_training', $data);
    }

    public function remove_training($training_id) {
        $this->db->where('training_id', $training_id);
        $query = $this->db->get('res_training');

        if ($query->num_rows == 1) {
            $row = $query->row();
            $researcher_id = $row->researcher_id;
            $this->db->delete('res_training', array('training_id' => $training_id));

            return $researcher_id;
        }
    }

    public function get_expertise($researcher_id) {
        $this->db->where('researcher_id', $researcher_id);
        $query = $this->db->get('res_expertise');
        return $query->result();
    }

    public function add_new_expertise() {
        $researcher_id = $this->input->post('researcher_id');
        $topic = $this->security->xss_clean($this->input->post('topic'));
        $specific_topic = $this->security->xss_clean($this->input->post('specific_topic'));

        $data = array(
            'researcher_id' => $researcher_id,
            'topic' => $topic,
            'specific_topic' => $specific_topic
        );

        $this->db->insert('res_expertise', $data);
    }

    public function get_edit_expertise() {
        $expertise_id = $this->input->post('expertise_id');
        $this->db->where('expertise_id', $expertise_id);
        $query = $this->db->get('res_expertise');
        return $query->result();
    }

    public function update_expertise() {
        $expertise_id = $this->input->post('expertise_id');
        $researcher_id = $this->input->post('researcher_id');
        $topic = $this->security->xss_clean($this->input->post('topic'));
        $specific_topic = $this->security->xss_clean($this->input->post('specific_topic'));

        $data = array(
            'researcher_id' => $researcher_id,
            'topic' => $topic,
            'specific_topic' => $specific_topic
        );

        $this->db->where('expertise_id', $expertise_id);
        $this->db->update('res_expertise', $data);
    }

    public function get_publication($researcher_id) {
        $this->db->where('researcher_id', $researcher_id);
        $query = $this->db->get('res_publication');
        return $query->result();
    }

    public function add_new_publication() {
        $researcher_id = $this->input->post('researcher_id');
        $content = htmlspecialchars($this->input->post('content'), ENT_QUOTES);

        $data = array(
            'researcher_id' => $researcher_id,
            'content' => $content
        );

        $this->db->insert('res_publication', $data);
    }

    public function get_edit_publication() {
        $publication_id = $this->input->post('publication_id');
        $this->db->where('publication_id', $publication_id);
        $query = $this->db->get('res_publication');
        return $query->result();
    }

    public function update_publication() {
        $publication_id = $this->input->post('publication_id');
        $researcher_id = $this->input->post('researcher_id');
        $content = htmlspecialchars($this->input->post('content'), ENT_QUOTES);

        $data = array(
            'researcher_id' => $researcher_id,
            'content' => $content
        );

        $this->db->where('publication_id', $publication_id);
        $this->db->update('res_publication', $data);
    }

}
