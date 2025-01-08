<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_beasiswa extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
        // Memuat database
        $this->load->database();
    }

    public function get_all_beasiswa()
    {
        $query = $this->db->get('beasiswa');  // Mengambil data dari tabel 'users'
        return $query->result();  // Mengembalikan hasil sebagai array objek
    }

    // Fungsi untuk mengambil data pengguna berdasarkan ID
    public function get_beasiswa_by_id($beasiswa_id)
    {
        $query = $this->db->get_where('beasiswa', array('id' => $beasiswa_id));
        return $query->row();  // Mengembalikan satu baris data
    }

    // Fungsi untuk menambah pengguna baru
    public function insert_beasiswa($data)
    {
        return $this->db->insert('beasiswa', $data);
    }

    // Fungsi untuk memperbarui data pengguna
    public function update_beasiswa($beasiswa_id, $data)
    {
        $this->db->where('id', $beasiswa_id);
        return $this->db->update('beasiswa', $data);
    }

    // Fungsi untuk menghapus pengguna
    public function delete_beasiswa($beasiswa_id)
    {
        return $this->db->delete('beasiswa', array('id' => $beasiswa_id));
    }
}