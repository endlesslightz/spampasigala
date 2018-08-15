<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation','email','session'));
        $this->load->helper(array('text','url'));
        $this->load->model('datamodel');
    }

    public function index() {
        if ($this->session->userdata('username') == '') {
            redirect(base_url());
        } else {
            $data['link']='dashboard';
            $data['data']= $this->datamodel->get_jum_ta();
            $data['tanggal']=  $this->datamodel->get_latest_post();
            $this->load->view('backend/Dashboard',$data);
        }
    
    }

    public function map() {
        $this->load->view('backend/Map');
    }

}
