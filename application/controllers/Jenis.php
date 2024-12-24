<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Jenis | SIMDAWA-APP";
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('jenis_read');
        $this->load->view('template/footer');
    }
}