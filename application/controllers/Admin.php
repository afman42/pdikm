<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		if ($this->session->userdata('login') != TRUE) {
			$this->session->set_flashdata('error', 'Harus Login Terlebih Dahulu');
			redirect(site_url('auth/index'));
		}
	}

	public function index()
	{
		redirect(site_url('admin/kategori'));
	}

	//Akun Admin
	public function akun_admin()
	{
		$data['judul'] = 'IKM - Akun Admin';
		$data['admin'] = $this->Admin_model->akun_admin()->result();
		$this->load->view('template/header',$data);
		$this->load->view('admin/akun_admin', $data);
		$this->load->view('template/footer');
	}

	public function cek_akun_admin($id = NULL)
	{
		if (empty($id)) {
			redirect(site_url('admin/akun_admin'));
		}
		$data['judul'] = 'IKM - Cek Akun Admin';
		$data['admin'] = $this->Admin_model->cek_akun_admin($id)->row();
		$this->load->view('template/header',$data);
		$this->load->view('admin/cek_akun_admin');
		$this->load->view('template/footer');
	}

	public function hapus_akun_admin($id)
	{
		$cek_user = $this->db->get_where('users',['id_admin' => $id])->row();
		$cek_admin = $this->db->get_where('admin',['id_admin' => $id])->row();
		if ($cek_user && $cek_admin) {
			unlink($cek_user->foto);
			$this->Admin_model->hapus_akun_admin($id);
			echo "<script>alert('Berhasil di hapus');window.location.href='".site_url('admin/akun_admin')."'</script>";
		}else{
			echo "<script>alert('Tidak Berhasil di hapus');window.location.href='".site_url('admin/akun_admin')."'</script>";
		}
	}

	public function tambah_akun_admin()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|is_unique[users.nama]', [
			'required' => "Nama kosong, Silakan Diisi",
			'is_unique' => "Nama nya sudah ada Silakan Cari Lain"
		]);
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]', [
			'required' => "Username kosong, Silakan Diisi",
			'is_unique' => "Username nya sudah ada Silakan Cari Lain"
		]);
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required', [
			'required' => "Pekerjaan kosong, Silakan Diisi"
		]);
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', [
			'required' => "Jenis Kelamin kosong, Silakan Diisi"
		]);
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required', [
			'required' => "Tempat Lahir kosong, Silakan Diisi"
		]);
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required', [
			'required' => "Tanggal Lahir kosong, Silakan Diisi"
		]);
		$this->form_validation->set_rules('jenis_pendidikan', 'Jenis Pendidikan', 'required', [
			'required' => "Jenis Pendidikan kosong, Silakan Diisi"
		]);
		$this->form_validation->set_rules('umur', 'Umur', 'required', [
			'required' => "Umur kosong, Silakan Diisi"
		]);
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required', [
			'required' => "Tempat Lahir kosong, Silakan Diisi"
		]);
		if ($this->form_validation->run() == false) {
			$data['judul'] = 'IKM - Tambah Akun Admin';
			// $data['admin'] = $this->Admin_model->akun_admin()->result();
			$this->load->view('template/header',$data);
			$this->load->view('admin/tambah_akun_admin');
			$this->load->view('template/footer');
		} else {
			$this->insert_tambah_akun_admin();
		}
	}

	public function insert_tambah_akun_admin()
	{
		$max = $this->db->query('SELECT MAX(id_admin) as idd_admin FROM admin')->row();
		$this->load->library('upload');
		$post = $this->input->post();
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = 1024;
		
		$this->upload->initialize($config);
			if ($this->upload->do_upload('foto')){
				$upload_data = $this->upload->data();
				$featured_image = $upload_data['file_name'];
				$data_user = [
					'username' => $post['username'],
					'nama' => $post['nama'],
					'password' => 'admin123',
					'level' => 'admin',
					'foto' => 'uploads/'.$featured_image,
					'id_admin' => $max->idd_admin + 1
				];
				$data_admin = [
					'id_admin' => $max->idd_admin + 1,
					'tgl_lahir' => $post['tgl_lahir'],
					'tempat_lahir' => $post['tempat_lahir'],
					'jenis_kelamin' => $post['jenis_kelamin'],
					'pekerjaan' => $post['pekerjaan'],
					'umur' => $post['umur'],
					'jenis_pendidikan' => $post['jenis_pendidikan'],
				];
			$this->Admin_model->tambah_akun_admin($data_user,$data_admin);
			echo "<script>alert('Berhasil Ditambahkan');window.location.href='".site_url('admin/akun_admin')."'</script>";
		}else{
			$error = array('error' => $this->upload->display_errors());
			$data['judul'] = 'IKM - Tambah Akun Admin';
			$this->load->view('template/header', $data);
			$this->load->view('admin/tambah_akun_admin',$error);
			$this->load->view('template/footer');
		}
	}

	//Akun Masyarakat
	public function akun_masyarakat()
	{
		$data['judul'] = 'IKM - Akun Masyarakat';
		$data['masyarakat'] = $this->Admin_model->akun_masyarakat()->result();
		$this->load->view('template/header',$data);
		$this->load->view('admin/akun_masyarakat', $data);
		$this->load->view('template/footer');
	}

	public function cek_akun_masyarakat($id = NULL)
	{
		if (empty($id)) {
            redirect(site_url('admin/akun_masyarakat'));
        }
		$data['judul'] = 'IKM - Cek Akun Masyarakat';
		$data['masyarakat'] = $this->Admin_model->cek_akun_masyarakat($id)->row(1);
		$this->load->view('template/header',$data);
		$this->load->view('admin/cek_akun_masyarakat', $data);
		$this->load->view('template/footer',$data);
	}

	public function hapus_akun_masyarakat($id = NULL)
	{
		$cek_masyarakat = $this->db->get_where('masyarakat',['id_masyarakat' => $id])->row();
		// $cek_user = $this->db->get_where('users',['id_masyarakat' => $id])->row();
		if ($cek_masyarakat) {
			unlink($cek_masyarakat->foto_ktp);
			// unlink($cek_user->foto);
			$this->Admin_model->hapus_masyarakat($id);
			echo "<script>alert('Akun Berhasil Dihapus');window.location.href='".site_url('admin/akun_masyarakat')."'</script>";
		}
	}

	//Kategori
	public function kategori()
	{
		$data['judul'] = 'IKM - Kategori';
		$data['kategori'] = $this->Admin_model->kategori($this->session->id_admin)->result();
		$this->load->view('template/header',$data);
		$this->load->view('admin/index', $data);
		$this->load->view('template/footer');
	}

	public function tambah_kategori()
	{
		$data['judul'] = 'IKM - Tambah Kategori';
		$this->load->view('template/header',$data);
		$this->load->view('admin/tambah_kategori');
		$this->load->view('template/footer');
	}

	public function cek_tambah_kategori()
	{
		$this->load->model('Admin_model');
		$nama = $this->input->post('nama', TRUE);
		$penjelasan = $this->input->post('penjelasan', TRUE);
		$cek_admin = $this->Admin_model->get_admin_by_id($this->session->id_user)->row();
		$data = [
			'nama_kategori' => $nama,
			'persyaratan' => $penjelasan,
			'id_admin' => $cek_admin->id_admin
		];
		$model = $this->Admin_model->tambah_kategori($data);
		if ($model) {
			echo '<script>alert("Berhasil Ditambah"); window.location.href="' . site_url('admin/kategori') . '"</script>';
		} else {
			echo '<script>alert("Gagal Ditambah"); window.location.href="' . site_url('admin/kategori') . '"</script>';
		}
	}

	public function edit_kategori($id)
	{
		$data['judul'] = 'IKM - Edit Kategori';		
		$data['kategori'] = $this->Admin_model->cek_kategori($id)->row();
		$this->load->view('template/header',$data);
		$this->load->view('admin/edit_kategori', $data);
		$this->load->view('template/footer');
	}

	public function update_kategori($id)
	{
		$nama = $this->input->post('nama', TRUE);
		$penjelasan = $this->input->post('penjelasan', TRUE);
		$status = $this->input->post('status', TRUE);
		$data = [
			'nama_kategori' => $nama,
			'persyaratan' => $penjelasan,
			'status' => $status
		];
		$this->Admin_model->update_kategori($id, $data);
		echo '<script>alert("Berhasil Di Update"); window.location.href="' . site_url('admin/kategori') . '"</script>';
	}

	public function hapus_kategori($id)
	{
		$model = $this->Admin_model->cek_kategori($id)->row();
		if ($model != null) {
			$this->Admin_model->hapus_kategori($id);
			echo '<script>alert("Berhasil Di Hapus"); window.location.href="' . site_url('admin/kategori') . '"</script>';
		} else {
			echo '<script>alert("Gagal Di Hapus"); window.location.href="' . site_url('admin/kategori') . '"</script>';
		}
	}

	public function soal_kategori($id)
	{
		$data['judul'] = 'IKM - Soal Kategori';
		$data['soal_kategori'] = $this->Admin_model->soal_kategori($id)->result();
		$data['kategori'] = $this->Admin_model->cek_kategori($id)->row();
		$this->load->view('template/header',$data);
		$this->load->view('admin/soal_kategori', $data);
		$this->load->view('template/footer');
	}

	public function tambah_soal_kategori($id)
	{
		$data['judul'] = 'IKM - Tambah Soal Kategori';
		$data['kategori'] = $this->Admin_model->cek_kategori($id)->row();
		$this->load->view('template/header',$data);
		$this->load->view('admin/tambah_soal_kategori', $data);
		$this->load->view('template/footer');
	}

	public function cek_tambah_soal_kategori($id)
	{
		$soal = $this->input->post('soal', TRUE);
		$jawaban1 = $this->input->post('jawaban1', TRUE);
		$jawaban2 = $this->input->post('jawaban2', TRUE);
		$jawaban3 = $this->input->post('jawaban3', TRUE);
		$jawaban4 = $this->input->post('jawaban4', TRUE);
		$data_soal = [
			'soal' => $soal,
			'id_kategori' => $id,
		];
		$tambah_soal = $this->Admin_model->tambah_soal($data_soal);
		$cek_soal = $this->Admin_model->cek_soal_kategori($id, $soal)->row();
		$data_jawaban = [
			'jawaban1' => $jawaban1,
			'jawaban2' => $jawaban2,
			'jawaban4' => $jawaban4,
			'jawaban3' => $jawaban3,
			'id_soal'  => $cek_soal->id_soal,
		];
		$tambah_jawaban = $this->Admin_model->tambah_jawaban($data_jawaban);
		if ($tambah_jawaban == true && $tambah_soal == true) {
			echo '<script>alert("Berhasil Ditambah"); window.location.href="' . site_url('admin/soal_kategori/' . $id) . '"</script>';
		} else {
			echo '<script>alert("Gagal Ditambah"); window.location.href="' . site_url('admin/soal_kategori/' . $id) . '"</script>';
		}
	}

	public function edit_soal_kategori($id)
	{
		$data['judul'] = 'IKM - Edit Soal Kategori';
		$data['soal'] = $this->Admin_model->cek_soal($id)->row(1);
		$data['jawaban'] = $this->Admin_model->cek_jawaban_soal($id)->row(1);
		$this->load->view('template/header',$data);
		$this->load->view('admin/edit_soal_kategori', $data);
		$this->load->view('template/footer');
	}

	public function update_soal_kategori($id)
	{
		$soal = $this->input->post('soal', TRUE);
		$jawaban1 = $this->input->post('jawaban1', TRUE);
		$jawaban2 = $this->input->post('jawaban2', TRUE);
		$jawaban3 = $this->input->post('jawaban3', TRUE);
		$jawaban4 = $this->input->post('jawaban4', TRUE);
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
		$this->Admin_model->update_jawaban($id, $data_jawaban);
		$this->Admin_model->update_soal($id, $data_soal);
		$kategori = $this->db->get_where('soal', ['id_soal' => $id])->row();
		echo '<script>alert("Berhasil Di Update"); window.location.href="' . site_url('admin/soal_kategori/' . $kategori->id_kategori) . '"</script>';
	}

	public function hapus_soal_kategori($id)
	{
		$model = $this->db->get_where('soal', ['id_soal' => $id])->row();
		$jawaban = $this->Admin_model->cek_jawaban($id)->result();
		if ($model != null) {
			$this->Admin_model->hapus_soal($id);
			foreach ($jawaban as $k) {
				$this->Admin_model->hapus_jawaban($k->id_soal);
			}
			echo '<script>alert("Berhasil Di Hapus"); window.location.href="' . site_url('admin/soal_kategori/' . $model->id_kategori) . '"</script>';
		} else {
			echo '<script>alert("Gagal Di Hapus"); window.location.href="' . site_url('admin/soal_kategori/' . $model->id_kategori) . '"</script>';
		}
	}

	public function ubah_biodata()
	{
		$data['judul'] = 'IKM - Ubah Biodata';
		$this->form_validation->set_rules('nama', 'Nama', 'required', [
			'required' => "Nama kosong, Silakan Diisi"
		]);
		$this->form_validation->set_rules('username', 'Username', 'required', [
			'required' => "Username kosong, Silakan Diisi"
		]);
		$this->form_validation->set_rules('new_password', 'Password', 'required|trim|min_length[3]|matches[repeat_password]', [
			'matches' => 'Password tidak Sama!',
			'min_length' => 'Password terlalu pendek!',
			'required' => "Password kosong, Silakan Diisi"
		]);
		$this->form_validation->set_rules('repeat_password', 'Password Ulang', 'required|trim|min_length[3]|matches[new_password]', [
			'matches' => 'Password Ulang tidak Sama!',
			'min_length' => 'Password Ulang terlalu pendek!',
			'required' => "Password Ulang kosong, Silakan Diisi"
		]);
		if ($this->form_validation->run() == false) {
			$data['header'] = 'Admin | Profil';
			$data['user'] = $this->db->get_where('users', ['level' => $_SESSION['level']])->row();
			$this->load->view('template/header', $data);
			$this->load->view('admin/ubah_password',$data);
			$this->load->view('template/footer');
		} else {
			$this->update_profil();
		}
	}

	protected function update_profil()
	{
		$this->load->library('upload');
		$post = $this->input->post();
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = 1024;
		
		$this->upload->initialize($config);
			if ($this->upload->do_upload('foto')){
				$upload_data = $this->upload->data();
				$featured_image = $upload_data['file_name'];
				$data = [
					'username' => $post['username'],
					'nama' => $post['nama'],
					'password' => $post['new_password'],
					'foto' => 'uploads/'.$featured_image,
				];
			$this->db->where('level',$_SESSION['level']);
			$cek = $this->db->update('users',$data);
			if ($cek) {
				$this->session->set_flashdata('message', '<div class="alert alert-success">Biodata Telah Diperbaharui</div>');
				redirect(site_url('admin/ubah_password'));
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-alert">Biodata Gagal Telah Diperbaharui</div>');
				redirect(site_url('admin/ubah_password'));
			}
		}elseif (!$this->upload->do_upload('foto')) {
			$data = [
				'username' => $post['username'],
				'nama' => $post['nama'],
				'password' => $post['new_password'],
			];
			$this->db->where('level',$_SESSION['level']);
			$cek = $this->db->update('users',$data);
			if ($cek) {
				$this->session->set_flashdata('message', '<div class="alert alert-success">Biodata Telah Diperbaharui</div>');
				redirect(site_url('admin/ubah_password'));
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-alert">Biodata Gagal Telah Diperbaharui</div>');
				redirect(site_url('admin/ubah_password'));
			}
		}else{
			$error = array('error' => $this->upload->display_errors());
			$data['header'] = 'Admin | Profil';
			$this->load->view('template/header', $data);
			$this->load->view('admin/ubah_password',$error);
			$this->load->view('template/footer');
		}
	}

	public function laporan()
	{
		$data['judul'] = 'IKM - Laporan';
		$data['kategori'] = $this->Admin_model->kategori($this->session->id_admin)->result();
		$this->load->view('template/header',$data);
		$this->load->view('admin/laporan', $data);
		$this->load->view('template/footer');
	}

	public function cek_laporan($id)
	{
		$data['judul'] = 'IKM - Cek Laporan';
		$data['kategori'] = $this->Admin_model->cek_kategori($id)->row();
		$data['responden'] = $this->Admin_model->cek_hitung_responden($id);
		$data['join_responden'] = $this->Admin_model->join_responden_jawaban_user($id)->result();
		$this->load->view('template/header',$data);
		$this->load->view('admin/cek_laporan', $data);
		$this->load->view('template/footer');
	}

	public function export_laporan($id)
	{
        $this->load->library('Pdf'); // MEMANGGIL LIBRARY YANG KITA BUAT TADI
		$kategori = $this->Admin_model->cek_kategori($id)->row();

		error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
 
        $pdf = new FPDF('L', 'mm','A4');
 
        $pdf->AddPage();
        $pdf->Image('./assets/images/kabupaten_hulu.png',20,6,30);
        $pdf->SetFont('Arial','B',16);
		$pdf->Cell(10);
        $pdf->Cell(0,7,'',0,1,'C');
        $pdf->Cell(0,7,'PEMERINTAH KABUPATEN KAPUAS HULU',0,1,'C');
		$pdf->Cell(280,7,'KECAMATAN PUTUSSIBAU SELATAN',0,1,'C');
        $pdf->SetFont('Arial','B',20);
		$pdf->Cell(0,7,'KANTOR KELURAHAN KEDAMIN HILIR',0,1,'C');
        $pdf->SetFont('Arial','B',12);
		$pdf->Cell(0,7,'Jalan Budaya No. 01 Kode Pos 78714',0,1,'C');
		$pdf->Cell(0,7,'KEDAMIN HILIR',0,1,'C');
		$pdf->Line(10, 55, 290, 55);
        $pdf->Ln(15);
        
        $pdf->Cell(0,7,'Survei',0,1,'C');
        $pdf->Cell(0,7,$kategori->nama_kategori,0,1,'C');
        $pdf->Cell(10,7,'',0,1);
 

        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(40,6,'Nama',1,0,'L');
        $pdf->Cell(40,6,'Pendidikan',1,0,'C');
        $pdf->Cell(30,6,'Pekerjaan',1,0,'C');
        $pdf->Cell(30,6,'Jenis Kelamin',1,0,'C');
        $pdf->Cell(10,6,'Umur',1,0,'C');
        $pdf->Cell(25,6,'Waktu',1,0,'C');
        $pdf->Cell(10,6,'RL-1',1,0,'C');
        $pdf->Cell(10,6,'RL-2',1,0,'C');
        $pdf->Cell(10,6,'RL-3',1,0,'C');
        $pdf->Cell(10,6,'RL-4',1,0,'C');
        $pdf->Cell(10,6,'RL-5',1,0,'C');
        $pdf->Cell(10,6,'RL-6',1,0,'C');
        $pdf->Cell(10,6,'RL-7',1,0,'C');
        $pdf->Cell(10,6,'RL-8',1,1,'C');

        $pdf->SetFont('Arial','',10);
        $resultse = $this->Admin_model->join_responden_jawaban_user($id);
        $hitung = $this->Admin_model->join_responden_jawaban_user_hitung($id)->row();
        $no=0;
        foreach ($resultse->result() as $data){
            
            $no++;
            $pdf->Cell(10,6,$no,1,0, 'C');
            $pdf->Cell(40,6,word_limiter($data->nama, 2),1,0, 'L');
            $pdf->Cell(40,6,$data->pendidikan,1,0, 'C');
            $pdf->Cell(30,6,$data->pekerjaan,1,0, 'C');
            $pdf->Cell(30,6,$data->jenis_kelamin,1,0, 'C');
            $pdf->Cell(10,6,$data->umur,1,0, 'C');
            $pdf->Cell(25,6,$data->tanggal,1,0,'C');
            $pdf->Cell(10,6,$data->jawaban1,1,0,'C');
            $pdf->Cell(10,6,$data->jawaban2,1,0,'C');
            $pdf->Cell(10,6,$data->jawaban3,1,0,'C');
            $pdf->Cell(10,6,$data->jawaban4,1,0,'C');
            $pdf->Cell(10,6,$data->jawaban5,1,0,'C');
            $pdf->Cell(10,6,$data->jawaban6,1,0,'C');
            $pdf->Cell(10,6,$data->jawaban7,1,0,'C');
            $pdf->Cell(10,6,$data->jawaban8,1,1,'C');
        }
        $count=$hitung->jumlah;

        $jawaban1=0;$jawaban2=0;$jawaban3=0;$jawaban4=0;$jawaban5=0;$jawaban6=0;$jawaban7=0;$jawaban8=0;
        foreach ($resultse->result() as $datav) {
            $jawaban1=$jawaban1+$datav->jawaban1;
            $jawaban2=$jawaban2+$datav->jawaban2;
            $jawaban3=$jawaban3+$datav->jawaban3;
            $jawaban4=$jawaban4+$datav->jawaban4;
            $jawaban5=$jawaban5+$datav->jawaban5;
            $jawaban6=$jawaban6+$datav->jawaban6;
            $jawaban7=$jawaban7+$datav->jawaban7;
            $jawaban8=$jawaban8+$datav->jawaban8;
        }
            $average1=$jawaban1/$count;
            $average2=$jawaban2/$count;
            $average3=$jawaban3/$count;
            $average4=$jawaban4/$count;
            $average5=$jawaban5/$count;
            $average6=$jawaban6/$count;
            $average7=$jawaban7/$count;
            $average8=$jawaban8/$count;
 
            $pdf->Cell(185,6,'NRR',1,0, 'C');
            // $pdf->Cell(40,6,"",1,0, 'C');
            // $pdf->Cell(40,6,$data->jenis_pendidikan,1,0, 'C');
            // $pdf->Cell(30,6,$data->pekerjaan,1,0, 'C');
            // $pdf->Cell(30,6,$jkl,1,0, 'C');
            // $pdf->Cell(10,6,$data->umur,1,0, 'C');
            // $pdf->Cell(25,6,$data->tanggal,1,0,'C');
            $pdf->Cell(10,6,number_format( $average1,2),1,0,'C');
            $pdf->Cell(10,6,number_format( $average2,2),1,0,'C');
            $pdf->Cell(10,6,number_format( $average3,2),1,0,'C');
            $pdf->Cell(10,6,number_format( $average4,2),1,0,'C');
            $pdf->Cell(10,6,number_format( $average5,2),1,0,'C');
            $pdf->Cell(10,6,number_format( $average6,2),1,0,'C');
            $pdf->Cell(10,6,number_format( $average7,2),1,0,'C');
            $pdf->Cell(10,6,number_format( $average8,2),1,1,'C');
        
            $pdf->Cell(185,6,'NRR Tertimbang',1,0, 'C');
            // $pdf->Cell(40,6,"",1,0, 'C');
            // $pdf->Cell(40,6,$data->jenis_pendidikan,1,0, 'C');
            // $pdf->Cell(30,6,$data->pekerjaan,1,0, 'C');
            // $pdf->Cell(30,6,$jkl,1,0, 'C');
            // $pdf->Cell(10,6,$data->umur,1,0, 'C');
            // $pdf->Cell(25,6,$data->tanggal,1,0,'C');
            $pdf->Cell(10,6,number_format( ($average1=$average1*0.125),2),1,0,'C');
            $pdf->Cell(10,6,number_format( ($average2=$average2*0.125),2),1,0,'C');
            $pdf->Cell(10,6,number_format( ($average3=$average3*0.125),2),1,0,'C');
            $pdf->Cell(10,6,number_format( ($average4=$average4*0.125),2),1,0,'C');
            $pdf->Cell(10,6,number_format( ($average5=$average5*0.125),2),1,0,'C');
            $pdf->Cell(10,6,number_format( ($average6=$average6*0.125),2),1,0,'C');
            $pdf->Cell(10,6,number_format( ($average7=$average7*0.125),2),1,0,'C');
            $pdf->Cell(10,6,number_format( ($average8=$average8*0.125),2),1,1,'C');

          
            $nrr=$average1+$average2+$average3+$average4+$average5+$average6+$average7+$average8;
            
            $pdf->Cell(185,6,'Jumlah NRR IKM tertimbang',1,0, 'C');
            // $pdf->Cell(40,6,"",1,0, 'C');
            // $pdf->Cell(40,6,$data->jenis_pendidikan,1,0, 'C');
            // $pdf->Cell(30,6,$data->pekerjaan,1,0, 'C');
            // $pdf->Cell(30,6,$jkl,1,0, 'C');
            // $pdf->Cell(10,6,$data->umur,1,0, 'C');
            // $pdf->Cell(25,6,$data->tanggal,1,0,'C');
            // $pdf->Cell(10,6,number_format( ($average1=$average1*0.125),2),1,0,'C');
            // $pdf->Cell(10,6,number_format( ($average2=$average2*0.125),2),1,0,'C');
            // $pdf->Cell(10,6,number_format( ($average3=$average3*0.125),2),1,0,'C');
            // $pdf->Cell(10,6,number_format( ($average4=$average4*0.125),2),1,0,'C');
            // $pdf->Cell(10,6,number_format( ($average5=$average5*0.125),2),1,0,'C');
            // $pdf->Cell(10,6,number_format( ($average6=$average6*0.125),2),1,0,'C');
            // $pdf->Cell(10,6,number_format( ($average7=$average7*0.125),2),1,0,'C');
            $pdf->Cell(80,6,number_format($nrr,2),1,1,'C');
            
            $pdf->Cell(185,6,'Nilai IKM (JML NRR IKM tertimbang *25)',1,0, 'C');
            // $pdf->Cell(40,6,"",1,0, 'C');
            // $pdf->Cell(40,6,$data->jenis_pendidikan,1,0, 'C');
            // $pdf->Cell(30,6,$data->pekerjaan,1,0, 'C');
            // $pdf->Cell(30,6,$jkl,1,0, 'C');
            // $pdf->Cell(10,6,$data->umur,1,0, 'C');
            // $pdf->Cell(25,6,$data->tanggal,1,0,'C');
            // $pdf->Cell(10,6,number_format( ($average1=$average1*0.125),2),1,0,'C');
            // $pdf->Cell(10,6,number_format( ($average2=$average2*0.125),2),1,0,'C');
            // $pdf->Cell(10,6,number_format( ($average3=$average3*0.125),2),1,0,'C');
            // $pdf->Cell(10,6,number_format( ($average4=$average4*0.125),2),1,0,'C');
            // $pdf->Cell(10,6,number_format( ($average5=$average5*0.125),2),1,0,'C');
            // $pdf->Cell(10,6,number_format( ($average6=$average6*0.125),2),1,0,'C');
            // $pdf->Cell(10,6,number_format( ($average7=$average7*0.125),2),1,0,'C');
            $pdf->Cell(80,6,number_format( ($nrr*25),2),1,1,'C');
            
        $pdf->Output('D','Laporan-'.date('Y-m-d').'-'.time().'.pdf');
	}
}
