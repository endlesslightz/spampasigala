<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manual extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation', 'email', 'session'));
        $this->load->helper(array('text', 'url'));
    }

    public function index() {
        if ($this->session->userdata('username') == '') {
            redirect(base_url());
        } else {
            $data['link']='manual';
            $this->load->view('backend/Manual',$data);
        }
    }
    
    public function tutorial(){
        if ($this->session->userdata('username') == '') {
            redirect(base_url());
        } else {
            redirect('backend/Manual','refresh');
        }
    }
}
?>