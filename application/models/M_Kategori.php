<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kategori extends CI_Model
{
    public function get_kategori()
    {
        $query = $this->db->select('*')
        ->from('tb_kategori')
        ->get();
        return $query;
    }

    public function insert_kategori($data)
    {
        $this->db->insert('tb_kategori',$data);
    }

    public function del_kategori(array $data){
        $query = $this->db->delete('tb_kategori',$data);
        return $query;
    }

    public function update_kategori($data,$id)
    {
        $this->db->where('id',"$id");
        $this->db->update('tb_kategori', $data); 
    }
}