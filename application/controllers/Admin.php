<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
	}

	public function index()
	{
		redirect(site_url('admin/kategori'));
	}

	//Kategori
	public function kategori()
	{
		$data['kategori'] = $this->Admin_model->kategori()->result();
		$this->load->view('template/header');
		$this->load->view('admin/index',$data);
		$this->load->view('template/footer');
	}

	public function tambah_kategori()
	{
		$this->load->view('template/header');
		$this->load->view('admin/tambah_kategori');
		$this->load->view('template/footer');
	}

	public function cek_tambah_kategori()
	{
		$nama = $this->input->post('nama',TRUE);
		$penjelasan = $this->input->post('penjelasan',TRUE);
		$data = [
			'nama_kategori' => $nama,
			'persyaratan' => $penjelasan
		];
		$model = $this->Admin_model->tambah_kategori($data);
		if ($model) {
			echo '<script>alert("Berhasil Ditambah"); window.location.href="'.site_url('admin/kategori').'"</script>';
		}else{
			echo '<script>alert("Gagal Ditambah"); window.location.href="'.site_url('admin/kategori').'"</script>';
		}
	}

	public function edit_kategori($id)
	{
		$data['kategori'] = $this->Admin_model->cek_kategori($id)->row();
		$this->load->view('template/header');
		$this->load->view('admin/edit_kategori',$data);
		$this->load->view('template/footer');
	}

	public function update_kategori($id)
	{
		$nama = $this->input->post('nama',TRUE);
		$penjelasan = $this->input->post('penjelasan',TRUE);
		$data = [
			'nama_kategori' => $nama,
			'persyaratan' => $penjelasan
		];
		$this->Admin_model->update_kategori($id,$data);
		echo '<script>alert("Berhasil Di Update"); window.location.href="'.site_url('admin/kategori').'"</script>';
	}

	public function hapus_kategori($id)
	{
		$model = $this->Admin_model->cek_kategori($id)->row();
		if ($model != null) {
			$this->Admin_model->hapus_kategori($id);
			echo '<script>alert("Berhasil Di Hapus"); window.location.href="'.site_url('admin/kategori').'"</script>';
		}else{
			echo '<script>alert("Gagal Di Hapus"); window.location.href="'.site_url('admin/kategori').'"</script>';
		}
	}

	public function soal_kategori($id)
	{
		$data['kategori'] = $this->Admin_model->cek_kategori($id)->row();
		$this->load->view('template/header');
		$this->load->view('admin/edit_kategori',$data);
		$this->load->view('template/footer');
	}
}