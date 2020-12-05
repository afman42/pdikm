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

    public function soal_kategori($id)
    {
        $this->db->select('*');
        $this->db->from('soal');
        $this->db->where('kategori.id_kategori',$id);
        $this->db->join('kategori', 'soal.id_kategori = kategori.id_kategori');
        return $this->db->get();
    }

    public function cek_soal_kategori($id_kategori,$soal)
    {
        return $this->db->get_where('soal',['id_kategori' => $id_kategori, 'soal' => $soal]);
    }

    public function tambah_soal($data)
    {
        return $this->db->insert('soal',$data);
    }

    public function tambah_jawaban($data)
    {
        return $this->db->insert('jawaban',$data);
    }

    public function cek_jawaban($id)
    {
        $this->db->where('id_soal',$id);
        return $this->db->get('jawaban');
    }

    public function update_jawaban($id,$data)
    {
        $this->db->where('id_soal',$id);
        $this->db->update('jawaban',$data);
    }

    public function update_soal($id,$data)
    {
        $this->db->where('id_soal',$id);
        $this->db->update('soal',$data);
    }

    public function cek_join_soal_kategori($id)
    {
        $this->db->select('*, soal.id_soal AS soal_id');
        $this->db->from('soal');
        $this->db->where('kategori.id_kategori',$id);
        $this->db->join('kategori', 'soal.id_kategori = kategori.id_kategori');
        $this->db->join('jawaban', 'soal.id_soal = jawaban.id_soal');
        return $this->db->get();
    }

    public function hapus_soal($id)
    {
        $this->db->where('id_soal', $id);
        $this->db->delete('soal');
    }

    public function hapus_jawaban($id)
    {
        $this->db->where('id_soal', $id);
        $this->db->delete('jawaban');
    }

    public function cek_hitung_responden($id)
    {
        $this->db->where('id_kategori',$id);
        return $this->db->get('responden');
    }

    public function join_responden_jawaban_user($id)
    {
        $this->db->select('*');
        $this->db->from('responden');
        $this->db->where('responden.id_kategori',$id);
        $this->db->join('jawaban_user', 'responden.id_responden = jawaban_user.id_responden');
        $this->db->order_by('jawaban_user.id_responden', 'DESC');
        return $this->db->get();
    }

    public function join_responden_jawaban_user_hitung($id)
    {
        $this->db->select('COUNT(*) AS jumlah');
        $this->db->from('responden');
        $this->db->where('responden.id_kategori',$id);
        $this->db->join('jawaban_user', 'responden.id_responden = jawaban_user.id_responden');
        $this->db->order_by('jawaban_user.id_responden', 'DESC');
        return $this->db->get();
    }

}