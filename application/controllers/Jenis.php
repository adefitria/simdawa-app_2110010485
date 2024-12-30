<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Memuat model Jenis_beasiswa_model
        $this->load->model('M_jenis');
    }

    public function index()
    {
        // Mengambil semua data jenis beasiswa dari model
        $data['jenis_beasiswa'] = $this->M_jenis->get_all_jenis_beasiswa();
        
        // Data untuk judul halaman
        $data['title'] = "Jenis | SIMDAWA-APP";
        
        // Memuat view
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('jenis_beasiswa/jenis_read');
        $this->load->view('template/footer');
    }
}