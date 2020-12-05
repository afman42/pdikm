<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		if ($_SESSION['login'] != TRUE) {
			$this->session->set_flashdata('error','Harus Login Terlebih Dahulu');
			redirect(site_url('auth/index'));
		}
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
		$status = $this->input->post('status',TRUE);
		$data = [
			'nama_kategori' => $nama,
			'persyaratan' => $penjelasan,
			'status' => $status
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
		$data['soal_kategori'] = $this->Admin_model->soal_kategori($id)->result();
		$data['kategori'] = $this->Admin_model->cek_kategori($id)->row();
		$this->load->view('template/header');
		$this->load->view('admin/soal_kategori',$data);
		$this->load->view('template/footer');
	}

	public function tambah_soal_kategori($id)
	{
		$data['kategori'] = $this->Admin_model->cek_kategori($id)->row();
		$this->load->view('template/header');
		$this->load->view('admin/tambah_soal_kategori',$data);
		$this->load->view('template/footer');
	}

	public function cek_tambah_soal_kategori($id)
	{
		$soal = $this->input->post('soal',TRUE);
		$jawaban1 = $this->input->post('jawaban1',TRUE);
		$jawaban2 = $this->input->post('jawaban2',TRUE);
		$jawaban3 = $this->input->post('jawaban3',TRUE);
		$jawaban4 = $this->input->post('jawaban4',TRUE);
		$data_soal = [
			'soal' => $soal,
			'id_kategori' => $id,
		];
		$tambah_soal = $this->Admin_model->tambah_soal($data_soal);
		$cek_soal = $this->Admin_model->cek_soal_kategori($id,$soal)->row();
		$data_jawaban = [
			'jawaban1' => $jawaban1,
			'jawaban2' => $jawaban2,
			'jawaban4' => $jawaban4,
			'jawaban3' => $jawaban3,
			'id_soal'  => $cek_soal->id_soal,
		];
		$tambah_jawaban = $this->Admin_model->tambah_jawaban($data_jawaban);
		if ($tambah_jawaban == true && $tambah_soal == true) {
			echo '<script>alert("Berhasil Ditambah"); window.location.href="'.site_url('admin/soal_kategori/'.$id).'"</script>';
		}else{
			echo '<script>alert("Gagal Ditambah"); window.location.href="'.site_url('admin/soal_kategori/'.$id).'"</script>';
		}
	}

	public function edit_soal_kategori($id)
	{
		$data['soal_kategori'] = $this->Admin_model->cek_join_soal_kategori($id)->row();
		$this->load->view('template/header');
		$this->load->view('admin/edit_soal_kategori',$data);
		$this->load->view('template/footer');
	}

	public function update_soal_kategori($id)
	{
		$soal = $this->input->post('soal',TRUE);
		$jawaban1 = $this->input->post('jawaban1',TRUE);
		$jawaban2 = $this->input->post('jawaban2',TRUE);
		$jawaban3 = $this->input->post('jawaban3',TRUE);
		$jawaban4 = $this->input->post('jawaban4',TRUE);
		$data_jawaban = [
			'jawaban1' => $jawaban1,
			'jawaban2' => $jawaban2,
			'jawaban4' => $jawaban4,
			'jawaban3' => $jawaban3,
			'id_soal'  => $id,
		];
		$data_soal = [
			'soal' => $soal,
			'id_soal' => $id,
		];
		$this->Admin_model->update_jawaban($id,$data_jawaban);
		$this->Admin_model->update_soal($id,$data_soal);
		$kategori = $this->db->get_where('soal',['id_soal' => $id])->row();
		echo '<script>alert("Berhasil Di Update"); window.location.href="'.site_url('admin/soal_kategori/'.$kategori->id_kategori).'"</script>';
	}

	public function hapus_soal_kategori($id)
	{
		$model = $this->db->get_where('soal',['id_soal' => $id])->row();
		$jawaban = $this->Admin_model->cek_jawaban($id)->result();
		if ($model != null) {
			$this->Admin_model->hapus_soal($id);
			foreach ($jawaban as $k) {
				$this->Admin_model->hapus_jawaban($k->id_soal);
			}
			echo '<script>alert("Berhasil Di Hapus"); window.location.href="'.site_url('admin/soal_kategori/'.$model->id_kategori).'"</script>';
		}else{
			echo '<script>alert("Gagal Di Hapus"); window.location.href="'.site_url('admin/soal_kategori/'.$model->id_kategori).'"</script>';
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
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $cek = $this->db->update('users');
        if ($cek) {        
            $this->session->set_flashdata('message', '<div class="alert alert-success">Password Telah Diperbaharui</div>');
            redirect(site_url('admin/ubah_password'));
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-alert">Password Gagal Telah Diperbaharui</div>');
            redirect(site_url('admin/ubah_password'));
        }
	}

	public function laporan()
	{
		$data['kategori'] = $this->Admin_model->kategori()->result();
		$this->load->view('template/header');
		$this->load->view('admin/laporan',$data);
		$this->load->view('template/footer');
	}

	public function cek_laporan($id)
	{
		$data['kategori'] = $this->Admin_model->cek_kategori($id)->row();
		$data['responden'] = $this->Admin_model->cek_hitung_responden($id);
		$data['join_responden'] = $this->Admin_model->join_responden_jawaban_user($id)->result();
		$this->load->view('template/header');
		$this->load->view('admin/cek_laporan',$data);
		$this->load->view('template/footer');
	}

	public function export_laporan($id){
		$this->load->library('pdfgenerator');
		$data['join_responden'] = $this->Admin_model->join_responden_jawaban_user($id)->result_array();
		$data['jumlah'] = $this->Admin_model->join_responden_jawaban_user_hitung($id)->row_array();
		$html = $this->load->view('admin/export_pdf',$data,true);
		$this->pdfgenerator->generate($html,'laporan');
	}
}