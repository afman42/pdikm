<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim|htmlspecialchars');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|htmlspecialchars');
		$this->form_validation->set_message('required', '%s harus diisi');
		if ($this->form_validation->run() == FALSE)
	    {
			$this->load->view('auth/index');
	    }else{   
			$this->cek_login();
        }
	}

	public function cek_login()
	{
		$this->load->model('Auth_model');
		$username = $this->input->post('username',TRUE);
		$password = $this->input->post('password',TRUE);
		$model = $this->Auth_model->cek_login($username,$password);
		if ($model->num_rows() > 0) {
			$tampil = $model->row();
			if ($tampil->level == 'admin' || $tampil->level == 'admin_root') {
				$data = [
					'id_user' => $tampil->id_user,
					'level' => $tampil->level,
					'id_admin' => $tampil->id_admin,
					'login' => TRUE
				];
				$this->session->set_userdata($data);
				redirect(site_url('admin/index'));
			}else {
				$data = [
					'id_user' => $tampil->id_user,
					'level' => $tampil->level,
					'login' => TRUE
				];
				$this->session->set_userdata($data);
				redirect(site_url('lurah/index'));
			}
		}else{
			$this->session->set_flashdata('error','Username dan Password Salah');
			redirect(site_url('auth/index'));
		}
	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('auth'));
    }
}