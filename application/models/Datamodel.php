<?php

class Datamodel extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_pos($ksens) {
      $this->db->where('id_sensor',$ksens);
	    return $this->db->get('sensor')->row()->id_pos;
    }

    function get_detail_pos($id) {
      $this->db->where('id_pos',$id);
      return $this->db->get('pos');
    }

    function get_tekanan($id) {
      $this->db->where('id_pos',$id);
      return $this->db->get('tekanan')->result_array();
    }

    function get_tekanan_tabel($id) {
      $this->db->where('id_pos',$id);
      $this->db->order_by('waktu', 'DESC');
      $this->db->limit(6);
      return $this->db->get('tekanan')->result_array();
    }

    function get_tegangan_tabel($id) {
      $this->db->where('id_sensor',$id);
      $this->db->order_by('waktu', 'DESC');
      $this->db->limit(6);
      return $this->db->get('logsensor')->result_array();
    }

    function get_baterai($id) {
        $query = $this->db->query("select * from (select * from logsensor where id_sensor = '".$id."'  order by waktu desc) a order by a.waktu desc limit 1000 ");
        return $query->result_array();
    }

     function get_bat_graf($id) {
      $query = $this->db->query("select * from (select * from (select * from logsensor where id_sensor = '".$id."'  order by waktu desc) a order by a.waktu desc limit 1000) x order by x.waktu asc");
        return $query;
    }

    function edit_detail_pos($post) {
        // print_r($post);
        $data = array(
            'nama_pos' => $post['nama'],
            'alamat' =>  $post['alamat'],
            'long' =>  $post['long'],
            'lat' =>  $post['lat']
        );
        $this->db->where('id_pos', '1');
        $this->db->update('pos', $data);
    }


    function get_durasi($id) {
        $this->db->where('id_pos',$id);
    return $this->db->get('kamera')->row()->durasi;
    }

    function get_latest_post(){
        $query=$this->db->query("SELECT * FROM `tekanan` WHERE id_pos=1 ORDER BY waktu DESC LIMIT 1");
        return $query;
    }

    function get_jum_ta() {
        $query = $this->db->query("SELECT count(id_sensor) jum FROM `logsensor` INNER JOIN pos WHERE logsensor.id_sensor=pos.id_pos AND pos.tipe='TA'");
        return $query->row()->jum;
    }

    function get_latest_tegangan() {
        $query = $this->db->query("SELECT tegangan FROM `logsensor` INNER JOIN pos WHERE id_pos=1 ORDER BY waktu DESC LIMIT 1");
        return $query->row()->tegangan;
    }

    function get_TA($id) {
        $query = $this->db->query("select * from (select * from tekanan where id_pos = '".$id."'  order by waktu desc) a order by a.waktu asc");
        return $query;
    }

    function get_TA_harian($id){
        $query = $this->db->query("SELECT * FROM (SELECT COUNT( id_ta ) AS total, SUM( tekanan ) AS nilai, DATE( waktu ) as waktu FROM tekanan WHERE id_pos =  '".$id."' GROUP BY DATE( waktu ) order by waktu desc) x order by x.waktu asc");
        return $query;
    }

    function get_TA_bulanan($id){
        $query = $this->db->query("SELECT * FROM (SELECT COUNT( id_ta ) AS total, SUM( tekanan ) AS nilai, DATE( waktu ) as waktu FROM tekanan WHERE id_pos =  '".$id."' GROUP BY MONTH( waktu ) order by waktu desc) x order by x.waktu asc");
        return $query;
    }

    function get_TA_jam($id){
        $query = $this->db->query("SELECT * FROM (SELECT COUNT( id_ta) AS total, SUM( tekanan ) AS nilai, waktu FROM tekanan WHERE id_pos =  '".$id."' GROUP BY HOUR( waktu ),date(waktu) order by waktu desc) x order by x.waktu asc");
        return $query;
    }


    function update_kamera($id){
        $data = array(
            'id_pos' => $id,
            'durasi' => 0
        );
        $this->db->where('id_pos', $id);
        $this->db->update('kamera', $data);
    }
 function get_citra_cetak($id, $tanggal) {
      $query = $this->db->query("select * from citra inner join pos using (id_pos) where citra.id_pos = '".$id."' and date(waktu) = '".$tanggal."'  ");
       return $query->result();
    }

    function get_detailpos($id) {
        $this->db->where('id_pos',$id);
	return $this->db->get('pos')->row();
    }

    function insert_sensor($ksens, $waktu) {
        $data = array(
            'id_log_sensor' => '',
            'id_sensor' => $ksens,
            'waktu' => $waktu
        );
        $this->db->insert('logsensor', $data);
    }

    function insert_sensor2($ksens, $waktu, $teg) {
        $data = array(
            'id_log_sensor' => '',
            'id_sensor' => $ksens,
            'waktu' => $waktu,
            'tegangan' => $teg
        );
        $this->db->insert('logsensor', $data);
    }

    function insert_sensor3($ksens, $waktu, $teg, $kode) {
        $data = array(
            'id_log_sensor' => '',
            'id_sensor' => $ksens,
            'waktu' => $waktu,
            'tegangan' => $teg,
            'kode' => $kode
        );
        $this->db->insert('logsensor', $data);
    }

    function insert_tekanan($id, $ta, $waktu) {
        $data = array(
            'id_ta'=>'',
            'id_pos' => $id,
            'tekanan' => $ta,
            'waktu' => $waktu
        );
        $this->db->insert('tekanan', $data);
    }

    function insert_file($id, $nilai, $waktu) {
        $data = array(
            'id_file'=>'',
            'id_pos' => $id,
            'nama_file' => $nilai,
            'waktu' => $waktu
        );
        $this->db->insert('file', $data);
    }

    function get_all_pos() {
        return $this->db->get('pos')->result();
    }

    function get_all_file() {
        return $this->db->get('file')->result();
    }

    function get_rf_pos() {
        $this->db->where('tipe','RF');
        return $this->db->get('pos')->result();
    }

    function get_wl_pos() {
        $this->db->where('tipe','WL');
        return $this->db->get('pos')->result();
    }

    function download($awal,$akhir,$email){
         $query = $this->db->query("SELECT * FROM `tekanan` WHERE waktu > '".$awal."' and waktu < '".$akhir."' ");
        if(sizeof($query->result()) > 0){
            $delimiter = ",";
            $filename = "tekanan_" . date('d-m-Y') . ".csv";

            //create a file pointer
            $f = fopen('php://memory', 'w');

            //set column headers
            $judul = 'Data Tekanan Air';
            $fields = array($judul);
            fputcsv($f, $fields, $delimiter);

            $judulawal = 'dari : '.$awal;
            $fields = array($judulawal);
            fputcsv($f, $fields, $delimiter);

            $judulakhir = 'hingga : '.$akhir;
            $fields = array($judulakhir);
            fputcsv($f, $fields, $delimiter);

            $fields = array('ID', 'Tekanan', 'Waktu');
            fputcsv($f, $fields, $delimiter);

            //output each row of the data, format line as csv and write to file pointer
            foreach($query->result() as $row){
                $lineData = array($row->id_ta, $row->tekanan, $row->waktu);
                fputcsv($f, $lineData, $delimiter);
            }

            //move back to beginning of file
            fseek($f, 0);

            //set headers to download file rather than displayed
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="' . $filename . '";');

            //output all remaining data on a file pointer
            fpassthru($f);
        }
    }

     function buat_file($awal,$akhir,$email){
        $query = $this->db->query("SELECT * FROM `tekanan` WHERE waktu > '".$awal."' and waktu < '".$akhir."' ");
        if(sizeof($query->result()) > 0){
            $delimiter = ",";
            $filename = "tekanan_" . date('d-m-Y') . ".csv";

            //create a file pointer
            $f = fopen('./assets/upload/email/'.$filename,'w');

            //set column headers
            $judul = 'Data Tekanan Air';
            $fields = array($judul);
            fputcsv($f, $fields, $delimiter);

            $judulawal = 'dari : '.$awal;
            $fields = array($judulawal);
            fputcsv($f, $fields, $delimiter);

            $judulakhir = 'hingga : '.$akhir;
            $fields = array($judulakhir);
            fputcsv($f, $fields, $delimiter);

            $fields = array('ID', 'Tekanan', 'Waktu');
            fputcsv($f, $fields, $delimiter);

            //output each row of the data, format line as csv and write to file pointer
            foreach($query->result() as $row){
                $lineData = array($row->id_ta, $row->tekanan, $row->waktu);
                fputcsv($f, $lineData, $delimiter);
            }

            //move back to beginning of file
            fseek($f, 0);
            fpassthru($f);
            fclose ($f);
            return($filename);
        }
    }

}
