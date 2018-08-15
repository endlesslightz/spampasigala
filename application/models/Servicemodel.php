<?php

class Servicemodel extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
      
    function get_ch() {
        $query = $this->db->query("SELECT * FROM curah_hujan a INNER JOIN ( SELECT id_pos, MAX(waktu) max_date FROM curah_hujan INNER JOIN pos USING (id_pos) GROUP BY id_pos ) b ON a.id_pos = b.id_pos AND a.waktu = b.max_date GROUP BY a.id_pos ORDER BY a.id_pos asc");
        return $query;
    }
    
    function get_tma() {
        $query = $this->db->query("SELECT * FROM tma a INNER JOIN ( SELECT id_pos, MAX(waktu) max_date FROM tma INNER JOIN pos USING (id_pos) GROUP BY id_pos ) b ON a.id_pos = b.id_pos AND a.waktu = b.max_date GROUP BY a.id_pos ORDER BY a.id_pos asc");
        return $query;
    }
    
    function get_citra() {
        $query = $this->db->query("SELECT * FROM citra a INNER JOIN ( SELECT id_pos, tipe, MAX(waktu) max_date FROM citra INNER JOIN pos USING (id_pos) GROUP BY id_pos ) b ON a.id_pos = b.id_pos AND a.waktu = b.max_date GROUP BY a.id_pos ORDER BY a.id_pos asc ");
        return $query;
    }
    
    function insert_ch($a,$b,$c){
    $data = array(
            'id_curah'=>'',
            'id_pos' => $a,
            'curah_hujan' => $b,
            'waktu' => $c
        );
        $this->db->insert('curah_hujan', $data);
    }
    
    function insert_tma($a,$b,$c){
    $data = array(
            'id_tma'=>'',
            'id_pos' => $a,
            'TMA' => $b,
            'waktu' => $c
        );
        $this->db->insert('tma', $data);
    }
    
    function insert_citra($a,$b,$c){
    $data = array(
            'id_citra'=>'',
            'id_pos' => $a,
            'nama_citra' => $b,
            'waktu' => $c
        );
        $this->db->insert('citra', $data);
    }
}
