<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tegangan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation','email','session'));
        $this->load->helper(array('text','url'));
        $this->load->library('grocery_CRUD');
        $this->load->model('datamodel');
    }

    public function index() {
        if ($this->session->userdata('username') == '') {
            redirect(base_url());
        } else {
            $data['link']='tegangan';
            $this->load->view('backend/Tegangan',$data);
        }
    }

     function grid() {
        $crud = new grocery_CRUD();
//               $crud->set_theme('datatables');
        $id = $this->uri->segment(4);
        $crud->set_table('logsensor');
        $crud->set_subject('Tegangan Baterai');
        $crud->where('logsensor.id_sensor', $id);
        $crud->order_by('waktu','desc');
        $crud->columns('id_log_sensor', 'tegangan', 'waktu');
        $crud->display_as('id_log_sensor','ID Pengiriman');
        $crud->unset_add();
        $output = $crud->render();
        $this->load->view('backend/Grid', $output);
    }


        function createSess()
    {
        $sesi = array(
                'mulai'     => date('Y-m-d', strtotime($_POST['tglmulai'])),
                'akhir'     => date('Y-m-d', strtotime($_POST['tglakhir']. "+1 days"))
                        );
        $this->session->set_userdata($sesi);
        $id = $this->uri->segment(4);
        // print_r($sesi);
        redirect('backend/Tegangan/gridSearch/'.$id);
    }

    function gridSearch()
    {
        $crud = new grocery_CRUD();
        $id = $this->uri->segment(4);
        $crud->set_table('logsensor');
        $crud->set_subject('Tegangan Baterai');
        $crud->where('waktu >', $this->session->userdata('mulai'));
        $crud->where('waktu <', $this->session->userdata('akhir'));
        $crud->where('logsensor.id_sensor',$id);
        $crud->columns('id_log_sensor', 'tegangan', 'waktu');
        $crud->display_as('id_log_sensor','ID Pengiriman');
        $crud->unset_add();
        $output = $crud->render();
        $this->load->view('backend/Grid',$output);
    }

    function graflive() {
        $id = $this->uri->segment(4);
        $data['namapos'] = $this->datamodel->get_detailpos($id);
        $this->load->view('backend/grafik/Tegangan', $data);
    }

    function datalive() {
        $id = $this->uri->segment(4);
        $item = $this->datamodel->get_bat_graf($id);
        $arraydata = array();
        foreach ($item->result() as $itemnya) {
            $time = strtotime($itemnya->waktu . "+7hours") * 1000;
            $arraydata[] = [$time, floatval($itemnya->tegangan)];
        }
        echo(json_encode($arraydata));
    }

}
