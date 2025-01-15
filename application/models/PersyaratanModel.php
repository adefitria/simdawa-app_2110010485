<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PersyaratanModel extends CI_Model {
    
    private $tabel = "persyaratan";
    public function get_persyaratan(){
        return $this->db->get($this->tabel)->result();
        //baris 9 bertujuan untuk mengambil data dari tabel persyaratan. selain dengan fungsi get,
        //kita juga bisa menggunakan $this->db->query('select * from persyaratan')->result();
    }

    public function insert_persyaratan(){
        $data = [
            'nama_persyaratan' => $this->input->post('nama_persyaratan'),
            'keterangan' => $this->input->post('keterangan'),
        ];
        //nama_persyaratan sebelah kiri, sesuaikan dengan nama kolom di tabel
        //nama_persyaratan sebelah kanan, sesuaikan dengan name di form yaitu (persyaratan_create.php baris 29)
        $this->db->insert($this->tabel, $data);
        
    }

    public function get_persyaratan_byid($id){
        return $this->db->get_where($this->tabel, ['id'=>$id])->row();
    }

    public function update_persyaratan(){
        $data = [
            'nama_persyaratan' => $this->input->post('nama_persyaratan'),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update($this->tabel, $data);
    }
    
    public function delete_persyaratan($id){
        $this->db->where('id', $id);
        $this->db->delete($this->$tabel);
    }
}