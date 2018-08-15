<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation', 'email', 'session'));
        $this->load->helper(array('text', 'form', 'url'));
        $this->load->library('grocery_CRUD');
        $this->load->model('adminmodel');
    }

    public function index() {
        if ($this->session->userdata('username') == '') {
            redirect(base_url());
        } else {
            $data['link']='user';
            $this->load->view('backend/User',$data);
        }
    }

    public function profile() {
        if ($this->session->userdata('username') == '') {
            redirect(base_url());
        } else {
            $data['link']='user';
            $this->load->view('backend/Profile',$data);
        }
    }

       public function edit_profile() {
        if ($this->session->userdata('username') == '') {
            redirect(base_url());
        } else {
            $data['link']='user';
            $this->adminmodel->edit_profile($this->input->post());
            $config = array(
                'upload_path' => "./assets/backend/profile/",
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite' => TRUE,
                'max_size' => "2048000"
                );
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('profile'))
            {
                $this->adminmodel->edit_display($_FILES['profile']['name']);
            }
            $this->load->view('backend/Profile',$data);
        }
    }

    function grid() {
        $crud = new grocery_CRUD();
//               $crud->set_theme('datatables');
        $crud->set_table('admin');
        $crud->set_subject('User');
        $crud->columns('username','nama','last_login');
        $crud->unset_add_fields('last_login');
        $crud->unset_edit();
        $crud->unset_edit_fields('last_login');
        $crud->required_fields('username', 'password');
        $crud->callback_edit_field('password', array($this, 'set_password_input_to_empty'));
        $crud->callback_before_insert(array($this, 'callback_md5'));
        $crud->callback_before_update(array($this, 'callback_update_pass'));
        $output = $crud->render();
        $this->load->view('backend/Grid', $output);
    }

    function callback_md5($post_array, $primary_key = null) {
        $post_array['password'] = md5($post_array['password']);
        return $post_array;
    }

    function callback_update_pass($post_array, $primary_key) {
        $pass = $post_array['password'];
        $q = $this->db->query("SELECT * FROM admin WHERE id_admin = '$primary_key'");
        if ($q->num_rows() == 1) {
            $passAwal = $q->row()->pass;
        }
        $pass = preg_replace('/\s+/', '', $pass);
        $passAwal = preg_replace('/\s+/', '', $passAwal);
        $post_array['password'] = md5($post_array['password']);
        return $post_array;
    }

    function set_password_input_to_empty() {
        return "<input type='password' name='password' value='' />";
    }

}

?>