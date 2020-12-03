<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function kategori()
    {
        return $this->db->get('kategori');
    }

    public function tambah_kategori($data)
    {
        return $this->db->insert('kategori',$data);
    }

    public function cek_kategori($id)
    {
        return $this->db->get_where('kategori',['id_kategori' => $id]);
    }

    public function update_kategori($id,$data)
    {
        $this->db->where('id_kategori',$id);
        $this->db->update('kategori',$data);
    }

    public function hapus_kategori($id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->delete('kategori');
    }
}