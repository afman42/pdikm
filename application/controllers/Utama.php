<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utama extends CI_Controller {

	public function index()
	{
		$data['header'] = 'Pilihan Kategori';
		$this->load->view('utama/index',$data);
	}

	public function kategori()
	{
		$data['header'] = 'Kategori Survei';
		$this->load->view('utama/kategori',$data);
	}

	public function form()
	{
		$data['header'] = 'Form Responden';
		$this->load->view('utama/form',$data);
	}

	public function soal()
	{
		$data['header'] = 'Soal';
		$this->load->view('utama/soal',$data);
	}
}