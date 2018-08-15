<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class About extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation', 'email', 'session'));
        $this->load->helper(array('text', 'url'));
    }

    public function index() {
        if ($this->session->userdata('username') == '') {
            redirect(base_url());
        } else {
            $data['link']='about';
            $this->load->view('backend/About',$data);
        }
    }

    public function kirim()
    {
      $this->load->library('email');
      $config['protocol'] = "smtp";
      $config['smtp_host'] = "ssl://smtp.googlemail.com";
      $config['smtp_port'] = "465";
      $config['smtp_user'] = 'nurcahya.pradana@gmail.com';
      $config['smtp_pass'] = "njxeevtvznoriltc";
      $config['charset'] = "iso-8859-1";
      $config['mailtype'] = "html";
      $config['newline'] = "\r\n";
      $this->email->initialize($config);
      $this->email->from($this->input->post('email'),$this->input->post('nama'));
      $list = array('endlesslightz@gmail.com');
      $this->email->to($list);
      $this->email->subject($this->input->post('subjek'));
      $this->email->message($this->input->post('pesan'));
      if ($this->email->send()) {
          $this->session->set_flashdata('sukses','isinya');
          redirect(base_url()."backend/about");
      } else {
          show_error($this->email->print_debugger());
      }
    }
}
?>
