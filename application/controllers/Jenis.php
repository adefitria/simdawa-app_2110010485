<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Memuat model Jenis_beasiswa_model
        $this->load->model('M_jenis');
        $this->load->library('form_validation'); // Memuat form validation library
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

    // Fungsi untuk menampilkan form tambah
    public function tambah()
    {
        // Data untuk judul halaman
        $data['title'] = "Tambah Jenis Beasiswa | SIMDAWA-APP";

        // Memuat view form tambah
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('jenis_beasiswa/jenis_tambah');
        $this->load->view('template/footer');
    }

    // Fungsi untuk memproses tambah data
    // Memproses penambahan jenis beasiswa
    public function proses_tambah()
    {
        // Validasi input dari form
        $this->form_validation->set_rules('nama_jenis', 'Nama Jenis', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembali ke form tambah
            $this->tambah();
        } else {
            // Ambil data dari form
            $data = array(
                'nama_jenis' => $this->input->post('nama_jenis'),
                'keterangan' => $this->input->post('keterangan')
            );

            // Menyimpan data ke database menggunakan model
            if ($this->M_jenis->insert_jenis_beasiswa($data)) {
                // Jika sukses, tampilkan pesan sukses dan redirect ke halaman utama
                $this->session->set_flashdata('success', 'Data jenis beasiswa berhasil ditambahkan!');
                redirect('jenis');
            } else {
                // Jika gagal, beri pesan error dan redirect ke halaman tambah
                $this->session->set_flashdata('error', 'Gagal menambahkan data jenis beasiswa.');
                redirect('jenis/tambah');
            }
        }
    }

    // Menampilkan form edit jenis beasiswa
    public function edit($jenis_id)
    {
        // Mengambil data jenis beasiswa berdasarkan ID
        $data['jenis_beasiswa'] = $this->M_jenis->get_jenis_beasiswa_by_id($jenis_id);

        if (!$data['jenis_beasiswa']) {
            // Jika data tidak ditemukan, redirect ke halaman utama dengan pesan error
            $this->session->set_flashdata('error', 'Jenis beasiswa tidak ditemukan.');
            redirect('jenis');
        }

        $data['title'] = "Edit Jenis Beasiswa | SIMDAWA-APP";

        // Memuat view form edit
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('jenis_beasiswa/jenis_edit', $data);
        $this->load->view('template/footer');
    }

    // Memproses pembaruan data jenis beasiswa
    public function proses_edit($jenis_id)
    {
        // Validasi input dari form
        $this->form_validation->set_rules('nama_jenis', 'Nama Jenis', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembali ke form edit
            $this->edit($jenis_id);
        } else {
            // Ambil data dari form
            $data = array(
                'nama_jenis' => $this->input->post('nama_jenis')
            );

            // Memperbarui data menggunakan model
            if ($this->M_jenis->update_jenis_beasiswa($jenis_id, $data)) {
                // Jika sukses, tampilkan pesan sukses dan redirect ke halaman utama
                $this->session->set_flashdata('success', 'Data jenis beasiswa berhasil diperbarui!');
                redirect('jenis');
            } else {
                // Jika gagal, beri pesan error dan redirect ke halaman edit
                $this->session->set_flashdata('error', 'Gagal memperbarui data jenis beasiswa.');
                redirect('jenis/edit/' . $jenis_id);
            }
        }
    }

    // Menghapus jenis beasiswa
    public function delete($jenis_id)
    {
        // Menghapus data jenis beasiswa menggunakan model
        if ($this->M_jenis->delete_jenis_beasiswa($jenis_id)) {
            // Jika sukses, tampilkan pesan sukses dan redirect ke halaman utama
            $this->session->set_flashdata('success', 'Data jenis beasiswa berhasil dihapus!');
            redirect('jenis');
        } else {
            // Jika gagal, tampilkan pesan error dan redirect ke halaman utama
            $this->session->set_flashdata('error', 'Gagal menghapus data jenis beasiswa.');
            redirect('jenis');
        }
    }
}