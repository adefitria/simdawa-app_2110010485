<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_jenis extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // Memuat database
        $this->load->database();
    }

    // Fungsi untuk mengambil semua data pengguna
    public function get_all_jenis_beasiswa()
    {
        $query = $this->db->get('jenis_beasiswa');  // Mengambil data dari tabel 'users'
        return $query->result();  // Mengembalikan hasil sebagai array objek
    }

    // Fungsi untuk mengambil data pengguna berdasarkan ID
    public function get_jenis_beasiswa_by_id($jenis_id)
    {
        $query = $this->db->get_where('jenis_beasiswa', array('id' => $jenis_id));
        return $query->row();  // Mengembalikan satu baris data
    }

    // Fungsi untuk menambah pengguna baru
    public function insert_jenis_beasiswa($data)
    {
        return $this->db->insert('jenis_beasiswa', $data);
    }

    // Fungsi untuk memperbarui data pengguna
    public function update_jenis_beasiswa($jenis_id, $data)
    {
        $this->db->where('id', $jenis_id);
        return $this->db->update('jenis_beasiswa', $data);
    }

    // Fungsi untuk menghapus pengguna
    public function delete_jenis_beasiswa($jenis_id)
    {
        return $this->db->delete('jenis_beasiswa', array('id' => $jenis_id));
    }
}