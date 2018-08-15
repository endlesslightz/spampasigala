<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Insert extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('email');
        $this->load->helper('text');
        $this->load->helper(array('form', 'url'));
        $this->load->model('datamodel');
        $this->output->set_header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
        $this->output->set_header('Cache-Control: no-cache, no-store, must-revalidate, max-age=0');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0', FALSE);
        $this->output->set_header('Pragma: no-cache');
    }

    public function index() {
        $this->load->view('Login');
    }


    public function file() {
    $nama = $_GET['nama'];
    $waktu = $_GET['waktu'];
    $ksens =  '1';
    $id=$this->datamodel->get_pos($ksens);
    $this->datamodel->insert_file($id,$nama,$waktu);
    $this->load->view('202file',$_GET);
    }

    public function tekanan() {
    $nilai = $_GET['nilai'];
    $waktu = $_GET['waktu'];
    $ksens =  '1';
    if(isset($_GET['teg'])&&isset($_GET['kode'])){
        $this->datamodel->insert_sensor3($ksens,$waktu,$_GET['teg'], $_GET['kode']);
    } else if(isset($_GET['teg'])){
        $this->datamodel->insert_sensor2($ksens,$waktu,$_GET['teg']);
    } else {
        $this->datamodel->insert_sensor($ksens,$waktu);
    }
    $id=$this->datamodel->get_pos($ksens);
    $this->datamodel->insert_tekanan($id,$nilai,$waktu);
//redirect('http://monitoringbendungan.com/grab/tma?ksens='.$ksens.'&tma='.$ta.'&time='.$time.'');
//$url[]=('http://monitoringbendungan.com/grab/tma?ksens='.$ksens.'&tma='.$ta.'&time='.$time.'');
//$this->multiRequest($url);
    $this->load->view('202',$_GET);
    }

    public function form(){
         $this->load->view('Upload', array('error' => ' ' ));
     }

    public function file_post() {
                $config['upload_path']          = './assets/upload/';
                $config['allowed_types']        = 'txt|xls|xlsx|csv';
                $config['max_size']             = 10000;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        $this->load->view('Upload', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                }
                $data['nama'] = $data['upload_data']['file_name'];
                $data['waktu']= date("Y-m-d H:i:s");
                $ksens =  '1';
                $id=$this->datamodel->get_pos($ksens);
                $this->datamodel->insert_file($id,$data['nama'],$data['waktu']);
                $this->load->view('202filepost',$data);
     }
}
