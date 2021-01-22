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
    public function penjelasan($id = NULL)
    { 
        if (empty($id)) {
            redirect(site_url('beranda/index'));
        }
        $row = $this->Admin_model->cek_kategori($id)->row();
        $this->session->set_userdata('id_penjelasan',$id);
        if($row != null){
            $data = array(
                'id_kategori' => set_value('id_kategori', $row->id_kategori),
                'persyaratan' => set_value('persyaratan', $row->persyaratan)
            );
            $this->load->view('front/header');
            $this->load->view('front/navbar');
            $this->load->view('front/penjelasan',$data);
            $this->load->view('front/footer');
        }
    }

    public function login_masyarakat()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|htmlspecialchars',
            ['required' => "Username Harus Diisi"]
        );
        $this->form_validation->set_rules('password', 'Password', 'required|trim|htmlspecialchars',
            ['required' => "Password Harus Diisi"]
        );
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('front/login_masyarakat');
        }else{   
        
            if($this->cek_login() == TRUE){
                
                $this->home();
            }
            else{
              $this->session->set_flashdata('error','Harap diisi Email dan password dengan benar');
              redirect(site_url('beranda/login_masyarakat'));
            }
        }
    }

    protected function cek_login()
    {
        $this->load->model('Auth_model','model');
        $username    = $this->input->post('username',TRUE);
        $password = $this->input->post('password',TRUE);
        // $password_encrypt = md5($password);
        
        $query = $this->model->login($username,$password);

        if( $query->num_rows() > 0 )
        {
            $row = $query->row(1);
            if($row->level == 'masyarakat' ){
                $data = array(
                    'username'   => $row->username,
                    'level'   => $row->level,
                    'login'   => TRUE,
                    'id_masyarakat' => $row->id_masyarakat
                );
            }
            
            $this->session->set_userdata($data);
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    public function home()
    {
        $data['level'] = $this->session->userdata('level');
        $data['email'] = $this->session->userdata('email');
        if($data['level'] == 'masyarakat'){
            redirect(site_url('beranda/penjelasan/'.$this->session->id_penjelasan
        ));
        }
    }
    // public function responden($id)
    // {
    //     $row = $this->Admin_model->cek_kategori($id)->row();
    //     if($row)
    //     {
    //         $data = array(
    //             'id_kategori' => set_value('id_kategori', $row->id_kategori),
    //             'auto_kode' => $this->Responden_model->kode_otomatis()
    //         );
    //     }
    //     $this->load->view('front/header');
    //     $this->load->view('front/navbar');
    //     $this->load->view('front/responden');
    //     $this->load->view('front/responden',$data);
    //     $this->load->view('front/footer');
    // }

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