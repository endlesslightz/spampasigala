<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation','email','session'));
        $this->load->helper(array('text','url'));
        $this->load->model('datamodel');
    }

    public function index() {
        $data['jumlah']= $this->datamodel->get_jum_ta();
        $data['tegangan']=  $this->datamodel->get_latest_tegangan();
        $data['tanggal']=  $this->datamodel->get_latest_post();
        $this->load->view('frontend/Home',$data);
    }

    public function map() {
        $this->load->view('backend/Map');
    }

}
