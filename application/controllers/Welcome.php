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
		$data['data_wilayah'] = $this->Hitung_model->get_data_wilayah();
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
		$data = array(
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'nomor_hp' => $this->input->post('nomor_hp'),
			'tps' => $this->input->post('tps'),
			'wilayah' => $this->input->post('wilayah'),
			'jumlah_suara' => $this->input->post('jumlah_suara')
		);

		$this->Hitung_model->inputDataMasuk($data);

		$this->session->set_flashdata('success_message', 'Data berhasil disimpan!');

		redirect('welcome/inputdata');
	}


	public function tabel_tps($wilayah)
	{
		$data['data_wilayah'] = $this->Hitung_model->get_data_wilayah();
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

	public function hapus_data($id)
	{
		$this->db->where(['id' => $id]);
		$this->db->delete('datamasuk');
		$this->session->set_flashdata('success', 'Berhasil Dihapus!');
		redirect(base_url('welcome'));
	}

	public function get_datamasuk($id)
	{
		$data = $this->Hitung_model->get_datamasuk_by_id($id);
		echo json_encode($data);
	}


	public function update_datamasuk()
	{
		// Validasi form

		$this->form_validation->set_rules('edit_nama_lengkap', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('edit_nomor_hp', 'Nomor HP', 'required');
		$this->form_validation->set_rules('edit_wilayah', 'Wilayah', 'required');
		$this->form_validation->set_rules('edit_tps', 'Nomor TPS', 'required');
		$this->form_validation->set_rules('edit_jumlah_suara', 'Jumlah Suara', 'required');

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'nama_lengkap' => $this->input->post('edit_nama_lengkap'),
				'nomor_hp' => $this->input->post('edit_nomor_hp'),
				'wilayah' => $this->input->post('edit_wilayah'),
				'tps' => $this->input->post('edit_tps'),
				'jumlah_suara' => $this->input->post('edit_jumlah_suara'),
			);

			$this->Hitung_model->update_datamasuk($this->input->post('edit_id'), $data);

			echo "Data berhasil diupdate";
		} else {
			echo validation_errors();
		}
	}

	// Method untuk mengosongkan tabel datamasuk
	public function clear_data_masuk()
	{
		// Panggil method clearDataMasuk dari model
		$this->Hitung_model->clearDataMasuk();

		// Set pesan sukses jika diperlukan
		$this->session->set_flashdata('success_message', 'Tabel datamasuk berhasil dikosongkan.');

		// Redirect ke halaman yang sesuai
		redirect('welcome'); // Atau redirect ke halaman lain jika diperlukan
	}
}
