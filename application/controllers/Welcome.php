<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Hitung_model'); // Load model di constructor
		$this->load->library(['ion_auth', 'form_validation']);
	}

	public function index()
	{
		// Panggil method dari model untuk menghitung jumlah suara
		$data['jumlah_suara'] = $this->Hitung_model->hitungJumlahSuara();
		date_default_timezone_set('Asia/Jakarta'); // Set zona waktu Indonesia Barat (WIB)
		date_default_timezone_set('Asia/Jayapura'); // Set zona waktu Indonesia Bagian Timur (WIT)

		$data['tanggal_indonesia'] = date('d F Y');
		$data['waktu_sekarang_wit'] = date('H:i:s');
		$data['data_suara'] = $this->Hitung_model->getDataSuara();
		$data['data_tps'] = $this->Hitung_model->getDataTPS();

		$data['data_desa'] = $this->Hitung_model->getDataDesa();

		// Load view dengan data jumlah suara
		$judul['title'] = 'Aplikasi Hitung Cepat';
		$this->load->view('header', $judul);
		$this->load->view('welcome_message', $data);
		$this->load->view('footer');
	}


	public function inputdata()
	{
		$this->load->library(['ion_auth', 'form_validation']);

		// Periksa apakah pengguna sudah login
		if (!$this->ion_auth->logged_in()) {
			// Jika belum, arahkan ke halaman login
			redirect('auth/login', 'refresh');
		}

		// Ambil data TPS untuk dropdown
		$data['data_wilayah'] = $this->Hitung_model->get_data_wilayah();
		$judul['title'] = 'Aplikasi Hitung Cepat';
		// Load view form input data
		$this->load->view('header', $judul);
		$this->load->view('inputdata', $data);
		$this->load->view('footer');
	}

	public function process_input()
	{
		$config['upload_path']   = './assets/uploads/bukti/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size']      = 2048; // Ukuran maksimum file (dalam kilobita)
		$config['file_name']     = $this->generateFileName(); // Generate nama file baru

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('bukti')) {
			$data = array(
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'nomor_hp' => $this->input->post('nomor_hp'),
				'tps' => $this->input->post('tps'),
				'wilayah' => $this->input->post('wilayah'),
				'jumlah_suara' => $this->input->post('jumlah_suara'),
				'bukti' => $config['file_name'] // Gunakan nama file baru
			);

			$this->Hitung_model->inputDataMasuk($data);

			$this->session->set_flashdata('success_message', 'Data berhasil disimpan!');

			redirect('welcome/inputdata');
		} else {
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		}
	}

	private function generateFileName()
	{
		$namaWilayah = $this->input->post('wilayah');
		$namaTPS = $this->input->post('tps');
		$namaFile = strtolower(str_replace(' ', '_', "{$namaWilayah}_tps_{$namaTPS}_"));

		$ext = pathinfo($_FILES['bukti']['name'], PATHINFO_EXTENSION);
		$namaFile .= "bukti.{$ext}";

		return $namaFile;
	}

	public function tabel_tps($wilayah)
	{
		// Dekode kembali nama wilayah yang dienkripsi
		$namaWilayah = urldecode($wilayah);

		// Panggil model untuk mendapatkan data TPS berdasarkan wilayah
		$data['data_tps_wilayah'] = $this->Hitung_model->getDataTPSByWilayah($namaWilayah);

		$judul['title'] = 'Data TPS';

		// Load view tabel_tps.php dengan data TPS yang sesuai
		$this->load->view('header', $judul);
		$this->load->view('tabel_tps', $data);
		$this->load->view('footer');
	}
}
