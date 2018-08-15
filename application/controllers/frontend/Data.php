<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation','email','session'));
        $this->load->helper(array('text','url'));
        $this->load->library('grocery_CRUD');
        $this->load->model('datamodel');
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

    public function cekdata() {
      if(isset($_POST['user_name'])) {
          $name=$_POST['user_name'];
          $checkdata=$this->datamodel->cek_nama($name);
          $query=mysql_query($checkdata);
          if(mysql_num_rows($query)>0) {
            echo "User Name Already Exist";
          } else {
            echo "OK";
          }
          exit();
      }

      if(isset($_POST['user_email']))  {
          $email=$_POST['user_email'];
          $checkdata=$this->datamodel->cek_email($email);
          $query=mysql_query($checkdata);
          if(mysql_num_rows($query)>0)   {
          echo "Email Already Exist";
          } else {
            echo "OK";
          }
          exit();
        }
    }

}
