<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lurah_model extends CI_Model {

	public function kategori_offline()
	{
		$this->db->select('COUNT(*) AS hitung');
		$this->db->where('status',1);
		$this->db->from('kategori');
		return $this->db->get();
	}

	public function kategori_online()
	{
		$this->db->select('COUNT(*) AS hitung');
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
        $this->db->from('responden');
        $this->db->where('responden.id_kategori',$kategori);
        $this->db->where('MONTH(responden.tanggal)',$bulan);
        $this->db->join('jawaban_user', 'responden.id_responden = jawaban_user.id_responden');
        $this->db->order_by('jawaban_user.id_responden', 'DESC');
        return $this->db->get();
    }

    public function join_responden_jawaban_user_hitung($id,$bulan)
    {
        $this->db->select('COUNT(*) AS jumlah');
        $this->db->from('responden');
        $this->db->where('responden.id_kategori',$id);
        $this->db->where('MONTH(responden.tanggal)',$bulan);
        $this->db->join('jawaban_user', 'responden.id_responden = jawaban_user.id_responden');
        $this->db->order_by('jawaban_user.id_responden', 'DESC');
        return $this->db->get();
    }

    public function cek_hitung_responden($id,$bulan)
    {
        $this->db->where('id_kategori',$id);
        $this->db->where('MONTH(responden.tanggal)',$bulan);
        return $this->db->get('responden');
    }

    public function join_responden_jawaban_user_tahun($kategori,$tahun)
    {
        $this->db->select('*');
        $this->db->from('responden');
        $this->db->where('responden.id_kategori',$kategori);
        $this->db->where('YEAR(responden.tanggal)',$tahun);
        $this->db->join('jawaban_user', 'responden.id_responden = jawaban_user.id_responden');
        $this->db->order_by('jawaban_user.id_responden', 'DESC');
        return $this->db->get();
    }

    public function join_responden_jawaban_user_hitung_tahun($id,$tahun)
    {
        $this->db->select('COUNT(*) AS jumlah');
        $this->db->from('responden');
        $this->db->where('responden.id_kategori',$id);
        $this->db->where('YEAR(responden.tanggal)',$tahun);
        $this->db->join('jawaban_user', 'responden.id_responden = jawaban_user.id_responden');
        $this->db->order_by('jawaban_user.id_responden', 'DESC');
        return $this->db->get();
    }

    public function cek_hitung_responden_tahun($id,$tahun)
    {
        $this->db->where('id_kategori',$id);
        $this->db->where('YEAR(responden.tanggal)',$tahun);
        return $this->db->get('responden');
    }
}