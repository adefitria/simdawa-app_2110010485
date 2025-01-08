<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beasiswa extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        // Memuat database
        $this->load->database();
    }

    public function index()
    {
        $data['title'] = "Beasiswa | SIMDAWA-APP";
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('beasiswa/beasiswa_read.php');
        $this->load->view('template/footer');
    }
}