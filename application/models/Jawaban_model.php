<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jawaban_model extends CI_Model
{
    public function simpan_data($data)
    {
        return $this->db->insert('jawaban_user', $data);
    }
    function tampil_data($id)
	{
        
        $this->db->order_by('id_jawaban_user', 'DESCENDING');
        $this->db->where('id_kategori', $id);
		return $this->db->get('v_graph')->result();
	}
}