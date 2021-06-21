<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Akun extends CI_Model
{
    public function insert_akun($username,$akun)
    {
        $query = $this->db->query("SELECT * FROM tb_users WHERE username = '$username'");
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            $this->db->insert('tb_users',$akun);
        }
        else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-block" align="center"><strong>NIM sudah pernah terdaftar</strong></div>');
            redirect("Welcome");
        }   
    }
}