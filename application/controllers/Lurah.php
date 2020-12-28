<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lurah extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Lurah_model');
		$this->load->model('Admin_model');
		$this->load->model('Soal_model');
		if ($this->session->userdata('login') != TRUE) {
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
		$kategori = $_GET['kategori'];
		$bulan = $_GET['bulan'];
		if (isset($kategori) && isset($bulan)) {
			$join_responden = $this->Lurah_model->join_responden_jawaban_user($kategori,$bulan)->result();
			$hitung = $this->Lurah_model->join_responden_jawaban_user_hitung($kategori,$bulan)->row();
			$this->load->library('Pdf'); // MEMANGGIL LIBRARY YANG KITA BUAT TADI
			$kategori = $this->Admin_model->cek_kategori($kategori)->row();

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
			$pdf->Cell(40,6,'Nama',1,0,'C');
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
			// $resultse = $this->Admin_model->join_responden_jawaban_user($id);
			// $hitung = $this->Admin_model->join_responden_jawaban_user_hitung($id)->row();
			$no=0;
			foreach ($join_responden as $data){
				$no++;
				$pdf->Cell(10,6,$no,1,0, 'C');
				$pdf->Cell(40,6,$data->nama,1,0, 'C');
				$pdf->Cell(40,6,$data->jenis_pendidikan,1,0, 'C');
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
			foreach ($join_responden as $datav) {
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
				
			$pdf->Output('D','Laporan.pdf');
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
		$kategori = $_GET['kategori'];
		$tahun = $_GET['tahun'];
		if (isset($kategori) && isset($tahun)) {
			$join_responden = $this->Lurah_model->join_responden_jawaban_user_tahun($kategori,$tahun)->result();
			$hitung = $this->Lurah_model->join_responden_jawaban_user_hitung_tahun($kategori,$tahun)->row();
			$this->load->library('Pdf'); // MEMANGGIL LIBRARY YANG KITA BUAT TADI
			$kategori = $this->Admin_model->cek_kategori($kategori)->row();

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
			$pdf->Cell(40,6,'Nama',1,0,'C');
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
			// $resultse = $this->Admin_model->join_responden_jawaban_user($id);
			// $hitung = $this->Admin_model->join_responden_jawaban_user_hitung($id)->row();
			$no=0;
			foreach ($join_responden as $data){
				$no++;
				$pdf->Cell(10,6,$no,1,0, 'C');
				$pdf->Cell(40,6,$data->nama,1,0, 'C');
				$pdf->Cell(40,6,$data->jenis_pendidikan,1,0, 'C');
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
			foreach ($join_responden as $datav) {
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
				
			$pdf->Output('D','Laporan.pdf');
		}
	}

	public function ubah_biodata()
	{	
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
        $this->form_validation->set_rules('repeat_password', 'Password Ulang', 'required|trim|min_length[3]|matches[new_password]',[
            'matches' => 'Password Ulang tidak Sama!',
			'min_length' => 'Password Ulang terlalu pendek!',
			'required' => "Password Ulang kosong, Silakan Diisi"
        ]);
        if ($this->form_validation->run() == false){
			$data['header'] = 'Admin | Profil';
			$data['user'] = $this->db->get_where('users', ['level' => $_SESSION['level']])->row();
			$this->load->view('template/header', $data);
			$this->load->view('lurah/ubah_password',$data);
			$this->load->view('template/footer');
        }else{
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
				redirect(site_url('lurah/ubah_biodata'));
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-alert">Biodata Gagal Telah Diperbaharui</div>');
				redirect(site_url('lurah/ubah_biodata'));
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
				redirect(site_url('lurah/ubah_biodata'));
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-alert">Biodata Gagal Telah Diperbaharui</div>');
				redirect(site_url('lurah/ubah_biodata'));
			}
		}else{
			$error = array('error' => $this->upload->display_errors());
			$data['header'] = 'Lurah | Profil';
			$this->load->view('template/header', $data);
			$this->load->view('lurah/ubah_password',$error);
			$this->load->view('template/footer');
		}
	}

}