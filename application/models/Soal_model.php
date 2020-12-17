<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Soal_model extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select('*');
        $this->db->from('jawaban');
        $this->db->join('soal', 'soal.id_soal=jawaban.id_soal');
        $query = $this->db->get();
        return $query->result();
    }
    
}
