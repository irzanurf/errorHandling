<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Prodi extends CI_Model
{
    public function get_prodi()
    {
        return $this->db->get('tb_prodi');
        
    }

    public function getwhere_prodi(array $data)
    {
        $query = $this->db->select('*')
                        ->from('tb_prodi')
                        ->where($data)
                        ->get();
        return $query;
    }

    public function del_prodi(array $data){
        $query = $this->db->delete('tb_prodi',$data);
        return $query;
    }

    public function del_akun(array $data){
        $query = $this->db->delete('tb_users',$data);
        return $query;
    }

    public function insert_prodi($data,$username)
    {
        $query = $this->db->query("SELECT * FROM tb_prodi WHERE username = '$username'");
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            $this->db->insert('tb_prodi',$data);
        }
        else{

        }   
    }

    public function insert_akun($akun,$username)
    {
        $query = $this->db->query("SELECT * FROM tb_users WHERE username = '$username'");
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            $this->db->insert('tb_users',$akun);
        }
        else{

        }   
    }

    public function update_prodi($data,$id)
    {
        $this->db->where('username',"$id");
        $this->db->update('tb_prodi', $data);
    }

    public function update_akun($akun,$id)
    {
        $this->db->where('username',"$id");
        $this->db->update('tb_users', $akun);
    }
}