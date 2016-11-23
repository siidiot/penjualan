<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mgeneral extends CI_Model {

	function getkodeunik($table) { 
        $q = $this->db->query("SELECT MAX(RIGHT(cust_id,3)) AS idmax FROM ".$table);
        $kd = ""; //kode awal
        if($q->num_rows()>0){ //jika data ada
            foreach($q->result() as $k){
                $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
                $kd = sprintf("%03s", $tmp); //kode ambil 4 karakter terakhir
            }
        }else{ //jika data kosong diset ke kode awal
            $kd = "0001";
        }
        $kar = "PEL."; //karakter depan kodenya
        //gabungkan string dengan kode yang telah dibuat tadi
        return $kar.$kd;
   }

}

/* End of file Mgeneral.php */
/* Location: ./application/models/Mgeneral.php */