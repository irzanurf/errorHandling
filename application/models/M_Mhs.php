<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Mhs extends CI_Model
{
    public function get_mhs()
    {
        $query = $this->db->select('tb_mhs.*,tb_prodi.prodi as prod')
        ->from('tb_mhs')
        ->join('tb_prodi','tb_mhs.prodi=tb_prodi.id','inner')
        ->get();
        return $query;
    }

    public function getwhere_mhs(array $data)
    {
        $query = $this->db->select('tb_mhs.*,tb_prodi.prodi as prod')
        ->from('tb_mhs')
        ->join('tb_prodi','tb_mhs.prodi=tb_prodi.id','inner')
        ->where($data)
        ->get();
        return $query;
    }

    public function insert_mahasiswa($nim,$data)
    {
        $query = $this->db->query("SELECT * FROM tb_mhs WHERE username = '$nim'");
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            $this->db->insert('tb_mhs',$data);
        }
        else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-block" align="center"><strong>NIM sudah pernah terdaftar</strong></div>');
            redirect("Welcome"); 
        }   
    }

    public function del_mhs(array $data){
        $query = $this->db->delete('tb_mhs',$data);
        return $query;
    }

    public function del_akun(array $data){
        $query = $this->db->delete('tb_users',$data);
        return $query;
    }
}