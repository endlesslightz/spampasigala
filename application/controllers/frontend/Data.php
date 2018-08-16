<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation','email','session'));
        $this->load->helper(array('text','url'));
        $this->load->library('grocery_CRUD');
        $this->load->model('datamodel');
        $this->load->model('adminmodel');
    }

    public function index() {
            $data['data']=$this->datamodel->get_tekanan_tabel(1);
            $this->load->view('frontend/Data',$data);
    }

    public function tekanan() {
            $data['data']=$this->datamodel->get_tekanan_tabel(1);
            $this->load->view('frontend/Data',$data);
    }

    public function tegangan() {
            $data['data']=$this->datamodel->get_tegangan_tabel(1);
            $this->load->view('frontend/Tegangan',$data);
    }

    public function register() {
            $data['data']=$this->adminmodel->register($this->input->post('username'),$this->input->post('useremail'),$this->input->post('usernama'),$this->input->post('userpass'));
            redirect('https://admin.spampasigala.com');
    }

    public function cekdata() {
      if(isset($_POST['user_name'])) {
          $name=$_POST['user_name'];
          $checkdata=$this->adminmodel->cek_nama($name);
          if($checkdata>0) {
            echo "Username sudah digunakan oleh user lain";
          } else {
            echo "Username tersedia";
          }
          exit();
      }
      if(isset($_POST['user_email']))  {
          $email=$_POST['user_email'];
          $checkdata=$this->adminmodel->cek_email($email);
          if($checkdata>0)   {
          echo "Email sudah digunakan oleh user lain";
          } else {
            echo "Email tersedia";
          }
          exit();
        }
    }

}
