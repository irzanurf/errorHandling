<?php

class M_Dosen extends CI_Model
{
    public function getwhere_dosen(array $data)
    {
        $query = $this->db->select('tb_dosen.*')
        ->from('tb_dosen')
        ->where($data)
        ->get();
        return $query;
    }
    
    public function get_dosen()
    {
        $query = $this->db->select('*')
        ->from('tb_dosen')
        ->get();
        return $query;
    }

    public function getprodi_dosen(array $data)
    {
        $query = $this->db->select('tb_dosen.*,tb_prodi.prodi as prod')
        ->from('tb_dosen')
        ->join('tb_prodi','tb_dosen.prodi=tb_prodi.id','inner')
        ->where($data)
        ->get();
        return $query;
    }

    public function getview_dosen(array $data)
    {
        $query = $this->db->select('tb_dosprod.*,tb_dosen.nama,tb_dosen.username')
        ->from('tb_dosprod')
        ->join('tb_dosen','tb_dosprod.dosen=tb_dosen.username','inner')
        ->where($data)
        ->get();
        return $query;
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

    public function prodi($data_prodi)
    {
        $this->db->insert_batch('tb_dosprod', $data_prodi);
    }

    public function nilai_prodi($username)
    {
        $query = $this->db->select('tb_dosprod.*, tb_prodi.prodi as prod')
                        ->from('tb_dosprod')
                        ->join('tb_prodi','tb_dosprod.prodi=tb_prodi.id','inner')
                        ->where('tb_dosprod.dosen',"$username")
                        ->get();
        return $query;
    }

    public function delete_dosen_prodi($data)
    {
        $query = $this->db->delete('tb_dosprod',$data);
        return $query;
    }


    
}