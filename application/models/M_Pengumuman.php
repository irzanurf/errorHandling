<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pengumuman extends CI_Model
{
    public function get_berita($data){
        $query = $this->db->select('pengumuman')
                        ->from('tb_pengumuman')
                        ->where($data)
                        ->get();
        return $query;
    }

    public function get_dosen(array $data){
        $query = $this->db->select('nama')
                        ->from('tb_dosen')
                        ->where($data)
                        ->get();
        return $query;
    }

    public function get_departemen(array $data){
        $query = $this->db->select('prodi')
                        ->from('tb_prodi')
                        ->where($data)
                        ->get();
        return $query;
    }

    public function get_mhs(array $data){
        $query = $this->db->select('nama')
                        ->from('tb_mhs')
                        ->where($data)
                        ->get();
        return $query;
    }

    public function get_prodi(array $data){
        $query = $this->db->select('prodi')
                        ->from('tb_mhs')
                        ->where($data)
                        ->get();
        return $query;
    }

    public function getwhere_prodi(array $data){
        $query = $this->db->select('id')
                        ->from('tb_prodi')
                        ->where($data)
                        ->get();
        return $query;
    }

    public function update_berita($data,$berita){
        $this->db->where($data);
        $this->db->update('tb_pengumuman', $berita); 
    }
    
}