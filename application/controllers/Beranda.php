<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

    function __construct()
	{
		parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Responden_model');
        $this->load->model('Soal_model');
        $this->load->model('Jawaban_model');
		/*if ($_SESSION['login'] != TRUE) {
			$this->session->set_flashdata('error','Harus Login Terlebih Dahulu');
			redirect(site_url('auth/index'));
		} */
	}
	public function index()
	{
        $data = array(
        'kategori' => $this->Admin_model->tampil_data_aktif()
        );
        $this->load->view('front/header');
        $this->load->view('front/navbar');
        $this->load->view('front/content',$data);
        $this->load->view('front/footer');
        
    }
    public function penjelasan($id)
    {
        $row = $this->Admin_model->cek_kategori($id)->row();
        if($row)
        {
            $data = array(
                'id_kategori' => set_value('id_kategori', $row->id_kategori),
                'persyaratan' => set_value('persyaratan', $row->persyaratan)
            );
        }
        $this->load->view('front/header');
        $this->load->view('front/navbar');
        $this->load->view('front/penjelasan',$data);
        $this->load->view('front/footer');
    }
    public function responden($id)
    {
        $row = $this->Admin_model->cek_kategori($id)->row();
        if($row)
        {
            $data = array(
                'id_kategori' => set_value('id_kategori', $row->id_kategori),
                'auto_kode' => $this->Responden_model->kode_otomatis()
            );
        }
        $this->load->view('front/header');
        $this->load->view('front/navbar');
        $this->load->view('front/responden',$data);
        $this->load->view('front/footer');
    }
    public function question()
    {
        $id= $this->uri->segment(3);
        $data = array(
            'soal' => $this->Soal_model->tampil_data($id),
            'start' => 1,
            'start_soal' => 1
        );
        $this->load->view('front/header');
        $this->load->view('front/navbar');
        $this->load->view('front/question', $data);
        $this->load->view('front/footer');
    }
    public function finish()
    {
        $this->load->view('front/header');
        $this->load->view('front/navbar');
        $this->load->view('front/finish');
        $this->load->view('front/footer');
    }
    public function simpan_responden()
    {
        $data = array (
            'id_responden' => $this->input->post('id_responden'),
            'tanggal' => $this->input->post('tanggal'),
            'nama' => $this->input->post('nama'),
            'nip' => $this->input->post('nip'),
            'umur' => $this->input->post('umur'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'jenis_pendidikan' => $this->input->post('jenis_pendidikan'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'id_kategori' => $this->input->post('id_kategori')
        );
        $this->Responden_model->simpan_data($data);
        redirect(site_url('beranda/question/'.$data['id_kategori']).'/'.$data['id_responden']);
    }
    public function simpan_jawaban()
    {
        
        $data = array (
            'id_jawaban_user' => $this->input->post('id_jawaban_user'),
            'jawaban1' => $this->input->post('jawaban1'),
            'jawaban2' => $this->input->post('jawaban2'),
            'jawaban3' => $this->input->post('jawaban3'),
            'jawaban4' => $this->input->post('jawaban4'),
            'jawaban5' => $this->input->post('jawaban5'),
            'jawaban6' => $this->input->post('jawaban6'),
            'jawaban7' => $this->input->post('jawaban7'),
            'jawaban8' => $this->input->post('jawaban8'),
            // 'jawaban9' => $this->input->post('jawaban9'),
            // 'jawaban10' => $this->input->post('jawaban10'),
            'komentar' => $this->input->post('komentar'),
            'id_responden' => $this->input->post('id_responden')
        );
        $this->Jawaban_model->simpan_data($data);
        redirect(site_url('beranda/finish'));
    }

    public function hasil($id)
    {
        $data = array(
            'jawaban' => $this->Jawaban_model->tampil_data($id)
        );
        $this->load->view('front/header');
        $this->load->view('front/navbar');
        $this->load->view('front/hasil', $data);
        $this->load->view('front/footer');
    }
}