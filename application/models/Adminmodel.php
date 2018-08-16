<?php

class Adminmodel extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    function authmember() {
        $query = $this->db->query("select * from admin where username='" . $this->input->post('username') . "' AND password ='" . md5($this->input->post('password')) . "' LIMIT 1");
        if ($query->num_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


    function cek_nama($nama) {
      $this->db->where('username',$nama);
	    return $this->db->get('admin')->num_rows();
    }

    function cek_email($email) {
      $this->db->where('email',$email);
      return $this->db->get('admin')->num_rows();
    }

    function register($username, $email, $nama, $pass) {
        $data = array(
            'id_admin' => '',
            'username' => $username,
            'email' => $email,
            'nama' => $nama,
            'password' => md5($pass),
            'last_login'=> date("Y-m-d H:i:s"),
            'hak_akses' => "member"
        );
        $this->db->insert('admin', $data);
    }

    function get_member_by_uname($uname) {
        $this->db->where('username', $uname);
        return $this->db->get('admin')->row_array();
    }

    function get_member_by_email($email) {
        $this->db->where('email', $email);
        return $this->db->get('admin')->row_array();
    }

    function edit_profile($post) {
        if($post['password']==$this->session->userdata('password'))
        {
        $data = array(
            'nama' => $post['nama'],
            'username' =>  $post['username'],
            'email' =>  $post['email']
        );
        } else {
        $data = array(
            'nama' => $post['nama'],
            'username' =>  $post['username'],
            'password' =>  md5($post['password']),
            'email' =>  $post['email']
        );
        }
        $this->db->where('id_admin', $this->session->userdata('id_admin'));
        $this->db->update('admin', $data);

        $sesi = array(
            'username' => $post['username'],
            'password' => md5($post['password']),
            'nama' => $post['nama'],
            'email' => $post['email']
        );
        $this->session->set_userdata($sesi);
    }

     function edit_display($gambar) {
        $data = array(
            'gambar' => $gambar
        );
        $this->db->where('id_admin', $this->session->userdata('id_admin'));
        $this->db->update('admin', $data);

        $sesi = array(
            'gambar' => $gambar
        );
        $this->session->set_userdata($sesi);
    }

    function update_lastlog($email) {
        date_default_timezone_set("Asia/Jakarta");
        $waktu = date("Y-m-d H:i:s");
        $data_log = array(
                'last_login'		=> $waktu
                );
        $this->db->where('email', $email);
        $this->db->update('admin',$data_log);
    }

    function get_vid() {
        return $this->db->get('video')->result();
    }

    function get_admin() {
        return $this->db->get('admin')->result();
    }

    function simpan($username, $pass) {
        $data = array(
            'id_admin' => '',
            'username' => $username,
            'password' => md5($pass),
            'last_login'=> date("Y-m-d H:i:s"),
            'hak_akses' => "admin"
        );
        $this->db->insert('admin', $data);
    }

}
