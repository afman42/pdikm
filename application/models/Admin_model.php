<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function akun_admin()
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->join('users', 'users.id_admin = admin.id_admin');
        return $this->db->get();
    }

    public function cek_akun_admin($id)
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->join('users', 'users.id_admin = admin.id_admin');
        $this->db->where('users.id_admin',$id);
        return $this->db->get();
    }

    public function hapus_akun_admin($id)
    {
        $this->db->where('id_admin',$id);
        $this->db->delete('users');

        $this->db->where('id_admin',$id);
        $this->db->delete('admin');
    }

    public function tambah_akun_admin($data_user,$data_admin)
    {   
        $this->db->insert('users', $data_user);
        $this->db->insert('admin', $data_admin);
    }

    public function akun_masyarakat()
    {
        $this->db->select('*');
        $this->db->from('masyarakat');
        $this->db->join('users', 'users.id_masyarakat = masyarakat.id_masyarakat');
        return $this->db->get();
    }

    public function cek_akun_masyarakat($id_masyarakat)
    {
        $this->db->select('*');
        $this->db->from('masyarakat');
        $this->db->join('users', 'users.id_masyarakat = masyarakat.id_masyarakat');
        $this->db->where('users.id_masyarakat', $id_masyarakat);
        return $this->db->get();
    }

    public function hapus_masyarakat($id_masyarakat)
    {
        $this->db->where('id_masyarakat',$id_masyarakat);
        $this->db->delete('masyarakat');

        $this->db->where('id_masyarakat',$id_masyarakat);
        $this->db->delete('users');

        // $this->db->where('id_masyarakat',$id_masyarakat);
        // $this->db->delete('jawaban_user');
    }

    public function kategori($id_admin)
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->join('users', 'users.id_admin = kategori.id_admin');
        $this->db->where('users.id_admin', $id_admin);
        return $this->db->get();
    }

    public function tampil_data_aktif()
    {
        $query = $this->db->query("SELECT * FROM kategori WHERE status=0");
        return $query->result();
    }

    public function tambah_kategori($data)
    {
        return $this->db->insert('kategori', $data);
    }

    public function cek_kategori($id)
    {
        return $this->db->get_where('kategori', ['id_kategori' => $id]);
    }

    public function update_kategori($id, $data)
    {
        $this->db->where('id_kategori', $id);
        $this->db->update('kategori', $data);
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
        $this->db->where('kategori.id_kategori', $id);
        $this->db->join('kategori', 'soal.id_kategori = kategori.id_kategori');
        return $this->db->get();
    }

    public function cek_soal_kategori($id_kategori, $soal)
    {
        return $this->db->get_where('soal', ['id_kategori' => $id_kategori, 'soal' => $soal]);
    }

    public function tambah_soal($data)
    {
        return $this->db->insert('soal', $data);
    }

    public function tambah_jawaban($data)
    {
        return $this->db->insert('jawaban', $data);
    }

    public function cek_jawaban($id)
    {
        $this->db->where('id_soal', $id);
        return $this->db->get('jawaban');
    }

    public function update_jawaban($id, $data)
    {
        $this->db->where('id_soal', $id);
        $this->db->update('jawaban', $data);
    }

    public function update_soal($id, $data)
    {
        $this->db->where('id_soal', $id);
        $this->db->update('soal', $data);
    }

    public function cek_join_soal_kategori($id)
    {
        $this->db->select('*, soal.id_soal AS soal_id');
        $this->db->from('soal');
        $this->db->where('kategori.id_kategori', $id);
        $this->db->join('kategori', 'soal.id_kategori = kategori.id_kategori');
        $this->db->join('jawaban', 'soal.id_soal = jawaban.id_soal');
        return $this->db->get();
    }

    public function cek_soal($id)
    {
        return $this->db->get_where('soal', ['id_soal' => $id]);
    }

    public function cek_jawaban_soal($id)
    {
        return $this->db->get_where('jawaban', ['id_soal' => $id]);
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
        $this->db->where('id_kategori', $id);
        return $this->db->get('jawaban_user');
    }

    public function join_responden_jawaban_user($id)
    {
        $this->db->select('*');
        $this->db->from('masyarakat');
        $this->db->join('jawaban_user', 'masyarakat.id_masyarakat = jawaban_user.id_masyarakat');
        $this->db->join('users', 'masyarakat.id_masyarakat = users.id_masyarakat');
        $this->db->order_by('jawaban_user.id_masyarakat', 'DESC');
        $this->db->where('jawaban_user.id_kategori', $id);
        return $this->db->get();
    }

    public function join_responden_jawaban_user_hitung($id)
    {
        $this->db->select('COUNT(*) AS jumlah');
        $this->db->from('masyarakat');
        $this->db->where('jawaban_user.id_kategori', $id);
        $this->db->join('jawaban_user', 'masyarakat.id_masyarakat = jawaban_user.id_masyarakat');
        $this->db->order_by('jawaban_user.id_masyarakat', 'DESC');
        return $this->db->get();
    }

    public function get_admin_by_id($id)
    {
        return $this->db->get_where('users',['id_user' => $id]);
    }
}