<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lurah extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Lurah_model');
		$this->load->model('Admin_model');
		$this->load->model('Soal_model');
		if ($_SESSION['login'] != TRUE) {
			$this->session->set_flashdata('error','Harus Login Terlebih Dahulu');
			redirect(site_url('auth/index'));
		}
	}

	public function index()
	{
		$data['kategori_aktif'] = $this->Lurah_model->kategori_online()->result();
		$data['kategori_non'] = $this->Lurah_model->kategori_offline()->result();
		$this->load->view('template/header');
		$this->load->view('lurah/index',$data);
		$this->load->view('template/footer');
	}

	public function cek_kategori($id)
	{
		$data = array(
            'soal' => $this->Soal_model->tampil_data(),
            'start' => 1,
			'start_soal' => 1,
			'kategori' => $this->Lurah_model->cek_kategori($id)->row()
        );
		$this->load->view('template/header');
		$this->load->view('lurah/cek_kategori',$data);
		$this->load->view('template/footer');
	}

	public function aktif_kategori()
	{
		$data['kategori'] = $this->Lurah_model->kategori_online()->result();
		$this->load->view('template/header');
		$this->load->view('lurah/pilih_kategori',$data);
		$this->load->view('template/footer');
	}

	public function non_aktif_kategori()
	{
		$data['kategori'] = $this->Lurah_model->kategori_offline()->result();
		$this->load->view('template/header');
		$this->load->view('lurah/pilih_kategori',$data);
		$this->load->view('template/footer');
	}

	public function laporan_bulan()
	{
		$data['kategori'] = $this->Lurah_model->kategori()->result();
		$this->load->view('template/header');
		$this->load->view('lurah/laporan_bulan',$data);
		$this->load->view('template/footer');
	}

	public function laporan_tahun()
	{
		$data['kategori'] = $this->Lurah_model->kategori()->result();
		$this->load->view('template/header');
		$this->load->view('lurah/laporan_tahun',$data);
		$this->load->view('template/footer');
	}

	public function cek_laporan()
	{
		$kategori = $_GET['kategori'];
		$bulan = $_GET['bulan'];
		if (isset($kategori) && isset($bulan)) {
			$data['kategori'] = $this->Lurah_model->cek_kategori($kategori)->row();
			$data['kategori_result'] = $this->Lurah_model->kategori()->result();
			$data['responden'] = $this->Lurah_model->cek_hitung_responden($kategori,$bulan);
			$data['join_responden'] = $this->Lurah_model->join_responden_jawaban_user($kategori,$bulan)->result();
			$this->load->view('template/header');
			$this->load->view('lurah/cek_laporan',$data);
			$this->load->view('template/footer');
		}
	}

	public function export_laporan_perbulan()
	{
		$this->load->library('pdfgenerator');
		$kategori = $_GET['kategori'];
		$bulan = $_GET['bulan'];
		if (isset($kategori) && isset($bulan)) {
			$data['join_responden'] = $this->Lurah_model->join_responden_jawaban_user($kategori,$bulan)->result_array();
			$data['jumlah'] = $this->Lurah_model->join_responden_jawaban_user_hitung($kategori,$bulan)->row_array();
			$html = $this->load->view('lurah/export_pdf',$data,true);
			$this->pdfgenerator->generate($html,'laporan');
		}
	}


	public function cek_laporan_tahun()
	{
		$kategori = $_GET['kategori'];
		$tahun = $_GET['tahun'];
		if (isset($kategori) && isset($tahun)) {
			$data['kategori'] = $this->Lurah_model->cek_kategori($kategori)->row();
			$data['kategori_result'] = $this->Lurah_model->kategori()->result();
			$data['responden'] = $this->Lurah_model->cek_hitung_responden_tahun($kategori,$tahun);
			$data['join_responden'] = $this->Lurah_model->join_responden_jawaban_user_tahun($kategori,$tahun)->result();
			$this->load->view('template/header');
			$this->load->view('lurah/cek_laporan_tahun',$data);
			$this->load->view('template/footer');
		}
	}

	public function export_laporan_pertahun()
	{
		$this->load->library('pdfgenerator');
		$kategori = $_GET['kategori'];
		$tahun = $_GET['tahun'];
		if (isset($kategori) && isset($tahun)) {
			$data['join_responden'] = $this->Lurah_model->join_responden_jawaban_user_tahun($kategori,$tahun)->result_array();
			$data['jumlah'] = $this->Lurah_model->join_responden_jawaban_user_hitung_tahun($kategori,$tahun)->row_array();
			$html = $this->load->view('lurah/export_pdf',$data,true);
			$this->pdfgenerator->generate($html,'laporan');
		}
	}

	public function ubah_password()
	{		
		$this->form_validation->set_rules('new_password', 'Password', 'required|trim|min_length[3]|matches[repeat_password]', [
            'matches' => 'Password tidak Sama!',
			'min_length' => 'Password terlalu pendek!',
			'required' => "Password kosong, Silakan Diisi"
        ]);
        $this->form_validation->set_rules('repeat_password', 'Password Ulang', 'required|trim|min_length[3]|matches[new_password]',[
            'matches' => 'Password Ulang tidak Sama!',
			'min_length' => 'Password Ulang terlalu pendek!',
			'required' => "Password Ulang kosong, Silakan Diisi"
        ]);
        if ($this->form_validation->run() == false){
			$data['header'] = 'Admin | Profil';
			$this->load->view('template/header',$data);
			$this->load->view('admin/ubah_password');
			$this->load->view('template/footer');
        }else{
            $this->update_profil();
        }
	}

	protected function update_profil()
	{
		$password = $this->input->post('new_password');
        $this->db->set('password',$password);
        $this->db->where('id_user',	 $this->session->userdata('id_user'));
        $cek = $this->db->update('users');
        if ($cek) {        
            $this->session->set_flashdata('message', '<div class="alert alert-success">Password Telah Diperbaharui</div>');
            redirect(site_url('lurah/ubah_password'));
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-alert">Password Gagal Telah Diperbaharui</div>');
            redirect(site_url('lurah/ubah_password'));
        }
	}

}