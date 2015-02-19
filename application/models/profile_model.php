<?php

class Profile_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_profile($researcher_id) {
        $this->db->where('researcher_id', $researcher_id);
        $query = $this->db->get('res_profile');
        return $query->result();
    }

    public function get_user_profile($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('res_user');
        if ($query->num_rows == 1) {
            $row = $query->row();
            $this->db->where('user_id', $row->id);
            $query = $this->db->get('res_profile');
            return $query->result();
        }
    }

    public function get_fullname() {
        $firstname_en = $this->security->xss_clean($this->input->get('firstname_en'));
        $lastname_en = $this->security->xss_clean($this->input->get('lastname_en'));
        $this->db->where('firstname_en', $firstname_en);
        $this->db->where('lastname_en', $lastname_en);
        $query = $this->db->get('res_profile');

        if (empty($firstname_en) && empty($lastname_en)):
            return '<span style="color: red" class="glyphicon glyphicon-remove"></span> <b style="color: red">กรุณากรอกชื่อและนามสกุล</b>';
        elseif (empty($firstname_en) && !empty($lastname_en)):
            return '<span style="color: red" class="glyphicon glyphicon-remove"></span> <b style="color: red">กรุณากรอกชื่อ</b>';
        elseif (!empty($firstname_en) && empty($lastname_en)):
            return '<span style="color: red" class="glyphicon glyphicon-remove"></span> <b style="color: red">กรุณากรอกนามสกุล</b>';
        else:
            if ($query->num_rows == 1):
                return '<span style="color: red" class="glyphicon glyphicon-remove"></span> <b style="color: red">' . $firstname_en . ' ' . $lastname_en . ' ชื่อและนามสกุลนี้ซ้ำ.</b>';
            else:
                return '<span style="color: green" class="glyphicon glyphicon-ok"></span> <b style="color: green">ชื่อและนามสกุลนี้สามารถใช้ได้</b>';
            endif;
        endif;
    }

    public function update_profile() {
        $researcher_id = $this->input->post('researcher_id');
        $data = $this->profile_post_receiver();
        $this->db->where('researcher_id', $researcher_id);
        $this->db->update('res_profile', $data);
    }

    public function profile_post_receiver() {
        $data = array(
            'firstname_en' => $this->security->xss_clean($this->input->post('firstname_en')), 'firstname_th' => $this->security->xss_clean($this->input->post('firstname_th')),
            'lastname_en' => $this->security->xss_clean($this->input->post('lastname_en')), 'lastname_th' => $this->security->xss_clean($this->input->post('lastname_th')),
            'title_en' => $this->security->xss_clean($this->input->post('title_en')), 'title_th' => $this->security->xss_clean($this->input->post('title_th')),
            'gender' => $this->security->xss_clean($this->input->post('gender')),
            'dob' => strtotime($this->input->post('dob')),
            'street_en' => $this->security->xss_clean($this->input->post('street_en')), 'street_th' => $this->security->xss_clean($this->input->post('street_th')),
            'sub_district_en' => $this->security->xss_clean($this->input->post('sub_district_en')), 'sub_district_th' => $this->security->xss_clean($this->input->post('sub_district_th')),
            'district_en' => $this->security->xss_clean($this->input->post('district_en')), 'district_th' => $this->security->xss_clean($this->input->post('district_th')),
            'province_en' => $this->security->xss_clean($this->input->post('province_en')), 'province_th' => $this->security->xss_clean($this->input->post('province_th')),
            'postal_code' => $this->security->xss_clean($this->input->post('postal_code')),
            'phone' => $this->security->xss_clean($this->input->post('phone')),
            'mobile_phone' => $this->security->xss_clean($this->input->post('mobile_phone')),
            'email' => $this->security->xss_clean($this->input->post('email')),
            'website' => $this->security->xss_clean($this->input->post('website')),
            'updated' => time()
        );
        return $data;
    }

    public function get_education($researcher_id) {
        $q_pro = $this->get_profile($researcher_id);
        if (!$q_pro) {
            redirect('home');
        }
        $this->db->where('researcher_id', $researcher_id);
        $this->db->order_by("grad_year", "asc");
        $query = $this->db->get('res_education');
        return $query->result();
    }

    public function add_new_education() {
        $data = $this->education_post_reciever();
        $this->db->insert('res_education', $data);
    }

    public function update_education() {
        $education_id = $this->input->post('education_id');
        $data = $this->education_post_reciever();
        $this->db->where('education_id', $education_id);
        $this->db->update('res_education', $data);
    }

    public function education_post_reciever() {
        $data = array(
            'researcher_id' => $this->input->post('researcher_id'),
            'grad_year' => $this->security->xss_clean($this->input->post('grad_year')),
            'degree' => $this->security->xss_clean($this->input->post('degree')),
            'institute' => $this->security->xss_clean($this->input->post('institute')),
            'major' => $this->security->xss_clean($this->input->post('major')),
            'country' => $this->security->xss_clean($this->input->post('country')),
            'thesis_title' => $this->security->xss_clean($this->input->post('thesis_title')),
            'keyword' => $this->security->xss_clean($this->input->post('keyword'))
        );
        return $data;
    }

    public function remove_education() {
        $education_id = $this->input->post('education_id');
        $this->db->where('education_id', $education_id);
        $query = $this->db->get('res_education');
        if ($query->num_rows == 1) {
            $this->db->delete('res_education', array('education_id' => $education_id));
        }
        redirect(site_url() . "profile#education");
    }

    public function get_employment($researcher_id) {
        $q_pro = $this->get_profile($researcher_id);
        if (!$q_pro) {
            redirect('home');
        }
        $this->db->where('researcher_id', $researcher_id);
        $query = $this->db->get('res_employment');
        return $query->result();
    }

    public function add_new_employment() {
        $data = $this->employment_post_reciever();
        $this->db->where('researcher_id', $data['researcher_id']);
        $query = $this->db->get('res_employment');
        if ($query->num_rows > 0) {
            foreach ($query->result() as $em):
                $employment_id = $em->employment_id;
            endforeach;
            $this->db->where('employment_id', $employment_id);
            $this->db->update('res_employment', $data);
        } else {
            $this->db->insert('res_employment', $data);
        }
    }

    public function update_employment() {
        $employment_id = $this->input->post('employment_id');
        $data = $this->employment_post_reciever();
        $this->db->where('employment_id', $employment_id);
        $this->db->update('res_employment', $data);
    }

    public function employment_post_reciever() {
        $data = array(
            'employment_id' => $this->input->post('employment_id'),
            'researcher_id' => $this->input->post('researcher_id'),
            'academic' => $this->security->xss_clean($this->input->post('academic')),
            'administrative' => $this->security->xss_clean($this->input->post('administrative')),
            'research' => $this->security->xss_clean($this->input->post('research')),
            'institute' => $this->security->xss_clean($this->input->post('institute')),
            'faculty' => $this->security->xss_clean($this->input->post('faculty')),
            'department' => $this->security->xss_clean($this->input->post('department')),
            'street_en' => $this->security->xss_clean($this->input->post('street_en')), 'street_th' => $this->security->xss_clean($this->input->post('street_th')),
            'sub_district_en' => $this->security->xss_clean($this->input->post('sub_district_en')), 'sub_district_th' => $this->security->xss_clean($this->input->post('sub_district_th')),
            'district_en' => $this->security->xss_clean($this->input->post('district_en')), 'district_th' => $this->security->xss_clean($this->input->post('district_th')),
            'province_en' => $this->security->xss_clean($this->input->post('province_en')), 'province_th' => $this->security->xss_clean($this->input->post('province_eth')),
            'postal_code' => $this->security->xss_clean($this->input->post('postal_code')),
            'phone' => $this->security->xss_clean($this->input->post('phone')), 'mobile_phone' => $this->security->xss_clean($this->input->post('mobile_phone')),
            'email' => $this->security->xss_clean($this->input->post('email')),
            'website' => $this->security->xss_clean($this->input->post('website')),
            'thep_lab_code' => $this->security->xss_clean($this->input->post('thep_lab_code'))
        );
        return $data;
    }

    public function get_training($researcher_id) {
        $this->db->where('researcher_id', $researcher_id);
        $query = $this->db->get('res_training');
        return $query->result();
    }

    public function add_new_training() {
        $data = $this->training_post_reciever();
        $this->db->insert('res_training', $data);
    }

    public function update_training() {
        $training_id = $this->input->post('training_id');
        $data = $this->training_post_reciever();
        $this->db->where('training_id', $training_id);
        $this->db->update('res_training', $data);
    }

    public function training_post_reciever() {
        $data = array(
            'researcher_id' => $this->input->post('researcher_id'),
            'training_type' => $this->security->xss_clean($this->input->post('training_type')),
            'institute' => $this->security->xss_clean($this->input->post('institute')),
            'training_start' => $this->security->xss_clean($this->input->post('training_start')),
            'training_end' => $this->security->xss_clean($this->input->post('training_end')),
            'supervisor' => $this->security->xss_clean($this->input->post('supervisor'))
        );
        return $data;
    }

    public function remove_training() {
        $training_id = $this->input->post('training_id');
        $this->db->where('training_id', $training_id);
        $query = $this->db->get('res_training');
        if ($query->num_rows == 1) {
            $this->db->delete('res_training', array('training_id' => $training_id));
        }
        redirect(site_url() . "profile#training");
    }

    public function get_expertise($researcher_id) {
        $this->db->where('researcher_id', $researcher_id);
        $query = $this->db->get('res_expertise');
        return $query->result();
    }

    public function add_new_expertise() {
        $data = $this->expertise_post_reciever();
        $this->db->where('researcher_id', $data['researcher_id']);
        $query = $this->db->get('res_expertise');
        if ($query->num_rows > 0) {
            redirect(site_url() . "profile#expertise");
        } else {
            $this->db->insert('res_expertise', $data);
        }
    }

    public function update_expertise() {
        $expertise_id = $this->input->post('expertise_id');
        $data = $this->expertise_post_reciever();
        $this->db->where('expertise_id', $expertise_id);
        $this->db->update('res_expertise', $data);
    }

    public function expertise_post_reciever() {
        $data = array(
            'researcher_id' => $this->input->post('researcher_id'),
            'topic' => $this->security->xss_clean($this->input->post('topic')),
            'specific_topic' => $this->security->xss_clean($this->input->post('specific_topic'))
        );
        return $data;
    }

    public function get_publication($researcher_id) {
        $this->db->where('researcher_id', $researcher_id);
        $query = $this->db->get('res_publication');
        return $query->result();
    }

    public function add_new_publication() {
        $data = $this->publication_post_reciever();
        $this->db->where('researcher_id', $data['researcher_id']);
        $query = $this->db->get('res_publication');
        if ($query->num_rows > 0) {
            redirect(site_url() . "profile#publication");
        } else {
            $this->db->insert('res_publication', $data);
        }
    }

    public function update_publication() {
        $publication_id = $this->input->post('publication_id');
        $data = $this->publication_post_reciever();
        $this->db->where('publication_id', $publication_id);
        $this->db->update('res_publication', $data);
    }

    public function publication_post_reciever() {
        $data = array(
            'researcher_id' => $this->input->post('researcher_id'),
            'content' => htmlspecialchars($this->input->post('content'), ENT_QUOTES)
        );
        return $data;
    }

    public function update_pic_url() {
        $researcher_id = $this->input->post('researcher_id');
        $pic_url = $this->security->xss_clean($this->input->post('pic_url'));
        $data = array(
            'pic_url' => $pic_url,
            'updated' => time()
        );
        $this->db->where('researcher_id', $researcher_id);
        $this->db->update('res_profile', $data);
    }

    public function delete_old_pic() {
        $researcher_id = $this->input->post('researcher_id');
        $q_profile = $this->get_profile($researcher_id);
        foreach ($q_profile as $profile):
            $pic_url = $profile->pic_url;
        endforeach;
        $file_name = basename($pic_url);
        if (is_file('./upload_picture/' . $file_name)):
            delete_files('./upload_picture/' . $file_name);
        endif;
    }

}
