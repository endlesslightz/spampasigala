<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Email extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation', 'email', 'session'));
        $this->load->helper(array('text', 'url'));
        $this->load->helper('url');
        $this->load->model('datamodel');
    }

    public function index() {
        if ($this->session->userdata('username') == '') {
            redirect(base_url());
        } else {
            $data['link']='email';
            $data['pos']=$this->datamodel->get_detail_pos(1);
            $this->load->view('backend/Email',$data);
        }
    }


    public function edit() {
        if ($this->session->userdata('username') == '') {
            redirect(base_url());
        } else {
            $data['link']='pos';
            $this->datamodel->edit_detail_pos($this->input->post());
            $data['pos']=$this->datamodel->get_detail_pos(1);
            redirect('backend/pos');
        }
    }

      public function kirim() {
        $namafile = $this->datamodel->buat_file($this->input->post('awal'),$this->input->post('akhir'),$this->input->post('email'));
        if(isset($_POST['tombol_email'])) {
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

        $this->email->from('nurcahya.pradana@yahoo.com', 'SPAM PASIGALA');
        $list = array($this->session->userdata('email'));
        $this->email->to($list);
        $this->email->subject('Data Tekanan Air dan Baterai');
        $this->email->message('Impor file CSV Data Tekanan Air dan Baterai');
        $this->email->attach(base_url().'assets/upload/email/'.$namafile);
        if ($this->email->send()) {
            $this->session->set_flashdata('sukses','isinya');           
            redirect(base_url()."backend/email");
        } else {
            show_error($this->email->print_debugger());
        }
     } else if (isset($_POST['tombol_download'])) {
        $this->datamodel->download($this->input->post('awal'),$this->input->post('akhir'),$this->input->post('email'));
     }
    }
}

?>