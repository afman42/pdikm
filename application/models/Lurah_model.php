<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lurah_model extends CI_Model {

	public function kategori_offline()
	{
		$uri = $this->uri->segment(2);
        if ($uri == 'non_aktif_kategori') {
		    $this->db->select('*');
        } else {
		    $this->db->select('COUNT(*) AS hitung');
        }
		$this->db->where('status',1);
		$this->db->from('kategori');
		return $this->db->get();
	}

	public function kategori_online()
	{
        $uri = $this->uri->segment(2);
        if ($uri == 'aktif_kategori') {
		    $this->db->select('*');
        } else {
		    $this->db->select('COUNT(*) AS hitung');
        }
		$this->db->where('status',0);
		$this->db->from('kategori');
		return $this->db->get();
	}

	public function kategori()
    {
        return $this->db->get('kategori');
    }

    public function cek_kategori($id)
    {
        return $this->db->get_where('kategori',['id_kategori' => $id]);
    }

    public function join_responden_jawaban_user($kategori,$bulan)
    {
        $this->db->select('*');
        $this->db->from('masyarakat');
        $this->db->where('jawaban_user.id_kategori',$kategori);
        $this->db->where('MONTH(masyarakat.tanggal)',$bulan);
        $this->db->join('jawaban_user', 'masyarakat.id_masyarakat = jawaban_user.id_masyarakat');
        $this->db->order_by('jawaban_user.id_masyarakat', 'DESC');
        return $this->db->get();
    }

    public function join_responden_jawaban_user_hitung($id,$bulan)
    {
        $this->db->select('COUNT(*) AS jumlah');
        $this->db->from('masyarakat');
        $this->db->where('jawaban_user.id_kategori',$id);
        $this->db->where('MONTH(masyarakat.tanggal)',$bulan);
        $this->db->join('jawaban_user', 'masyarakat.id_masyarakat = jawaban_user.id_masyarakat');
        $this->db->order_by('jawaban_user.id_masyarakat', 'DESC');
        return $this->db->get();
    }

    public function cek_hitung_responden($id,$bulan)
    {
        $this->db->where('id_kategori',$id);
        $this->db->where('MONTH(masyarakat.tanggal)',$bulan);
        return $this->db->get('masyarakat');
    }

    public function join_responden_jawaban_user_tahun($kategori,$tahun)
    {
        $this->db->select('*');
        $this->db->from('masyarakat');
        $this->db->where('jawaban_user.id_kategori',$kategori);
        $this->db->where('YEAR(masyarakat.tanggal)',$tahun);
        $this->db->join('jawaban_user', 'masyarakat.id_masyarakat = jawaban_user.id_masyarakat');
        $this->db->order_by('jawaban_user.id_masyarakat', 'DESC');
        return $this->db->get();
    }

    public function join_responden_jawaban_user_hitung_tahun($id,$tahun)
    {
        $this->db->select('COUNT(*) AS jumlah');
        $this->db->from('masyarakat');
        $this->db->where('jawaban_user.id_kategori',$id);
        $this->db->where('YEAR(masyarakat.tanggal)',$tahun);
        $this->db->join('jawaban_user', 'masyarakat.id_masyarakat = jawaban_user.id_masyarakat');
        $this->db->order_by('jawaban_user.id_masyarakat', 'DESC');
        return $this->db->get();
    }

    public function cek_hitung_responden_tahun($id,$tahun)
    {
        $this->db->where('jawaban_user.id_kategori',$id);
        $this->db->where('YEAR(masyarakat.tanggal)',$tahun);
        $this->db->join('jawaban_user', 'masyarakat.id_masyarakat = jawaban_user.id_masyarakat');
        return $this->db->get('masyarakat');
    }
}