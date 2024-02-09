<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pdfview extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Hitung_model'); // Load model di constructor
        // $this->load->library('pdfgenerator');
        $this->load->library(['pdfgenerator', 'ion_auth', 'form_validation']);
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
    }


    public function index()
    {
        // title dari pdf
        $this->data['title_pdf'] = 'Rekapitulasi Suara Masuk Semua TPS';

        $this->data['data_tps_wilayah'] = $this->Hitung_model->getDataMasuk();
        // filename dari pdf ketika didownload
        $file_pdf = 'rekapitulasi_suara_masuk_semua_tps';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";

        $html = $this->load->view('laporan_pdf', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    public function data_masuk()
    {
        // Panggil model untuk mendapatkan data TPS berdasarkan wilayah
        $data['data_tps_wilayah'] = $this->Hitung_model->getDataMasuk();

        $judul['title'] = 'Data TPS';

        // Load view tabel_tps.php dengan data TPS yang sesuai
        $this->load->view('header', $judul);
        $this->load->view('laporan', $data);
        $this->load->view('footer');
    }
}
