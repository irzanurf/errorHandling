<?php

class M_Dosen extends CI_Model
{
    public function getwhere_dosen(array $data)
    {
        return $this->db->get_where('tb_dosen', $data);
    }
    
    public function get_dosen()
    {
        return $this->db->get('tb_dosen');
        
    }

    public function insert_dosen($dosen,$username)
    {
        $query = $this->db->query("SELECT * FROM tb_dosen WHERE username = '$username'");
        $result = $query->result_array();
        $count = count($result);
    
        if (empty($count)){
            $this->db->insert('tb_dosen',$dosen);
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

    public function del_dosen(array $data){
        $query = $this->db->delete('tb_dosen',$data);
        return $query;
    }

    public function del_akun(array $data){
        $query = $this->db->delete('tb_users',$data);
        return $query;
    }

    public function changePass($username,$pass)
    {
        $this->db->where('username',"$username");
        $this->db->update('tb_users', $pass);
        
    }

    public function update_dosen($dosen,$username)
    {
        $this->db->where('username',"$username");
        $this->db->update('tb_dosen', $dosen);
        
    }

    
}