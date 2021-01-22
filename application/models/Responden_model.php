<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Responden_model extends CI_Model
{
    public function simpan_data($data)
    {
        return $this->db->insert('masyarakat', $data);
    }
    function kode_otomatis()
	   {
		   $query = $this->db->query("SELECT MAX(RIGHT(id_masyarakat,2)) AS responden FROM responden");
		   if($query->num_rows()>0)
		   {
			   foreach($query->result() as $num)
			   {
				   $no = ((int)$num->responden)+1;
				   if($no<10)
				   {
					   $no_auto = "R-0".$no;
				   }else if($no<100)
				   {
					   $no_auto = "R-".$no;
				   }else{
					   $no_auto = "R-MAX";
				   }
			   }
		   }else{
			   $no_auto = "R-01";
		   }
		   return $no_auto;
	   }
}
