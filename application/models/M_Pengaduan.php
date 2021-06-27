<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pengaduan extends CI_Model
{
    public function get_pengaduan()
    {
        $query = $this->db->select('*')
                        ->from('tb_pengaduan')
                        ->order_by("id", "desc")
                        ->get();
        return $query;
    }

    public function get_pengaduan_admin()
    {
        $query = $this->db->select('tb_pengaduan.*, tb_dosen.nama as dsn, tb_mhs.nama as mhs, tb_kategori.kategori')
                        ->from('tb_pengaduan')
                        ->join('tb_dosen','tb_pengaduan.tujuan=tb_dosen.username','inner')
                        ->join('tb_mhs','tb_pengaduan.pengadu=tb_mhs.username','inner')
                        ->join('tb_kategori','tb_pengaduan.id_kategori=tb_kategori.id','inner')
                        ->order_by("id", "desc")
                        ->get();
        return $query;
    }

    public function get_pengaduan_admin_kategori($id)
    {
        $query = $this->db->select('tb_pengaduan.*, tb_dosen.nama as dsn, tb_mhs.nama as mhs, tb_kategori.kategori')
                        ->from('tb_pengaduan')
                        ->join('tb_dosen','tb_pengaduan.tujuan=tb_dosen.username','inner')
                        ->join('tb_mhs','tb_pengaduan.pengadu=tb_mhs.username','inner')
                        ->join('tb_kategori','tb_pengaduan.id_kategori=tb_kategori.id','inner')
                        ->where('tb_pengaduan.id_kategori',$id)
                        ->order_by("id", "desc")
                        ->get();
        return $query;
    }

    public function get_pengaduan_prodi_kategori(array $data, $id)
    {
        $query = $this->db->select('tb_pengaduan.*, tb_dosen.nama as dsn, tb_mhs.nama as mhs, tb_kategori.kategori')
                        ->from('tb_pengaduan')
                        ->join('tb_dosen','tb_pengaduan.tujuan=tb_dosen.username','inner')
                        ->join('tb_mhs','tb_pengaduan.pengadu=tb_mhs.username','inner')
                        ->join('tb_kategori','tb_pengaduan.id_kategori=tb_kategori.id','inner')
                        ->where($data)
                        ->where('tb_pengaduan.id_kategori',$id)
                        ->order_by("id", "desc")
                        ->get();
        return $query;
    }


    public function get_pengaduan_prodi(array $data)
    {
        $query = $this->db->select('tb_pengaduan.*, tb_dosen.nama as dsn, tb_mhs.nama as mhs, tb_kategori.kategori')
                        ->from('tb_pengaduan')
                        ->join('tb_dosen','tb_pengaduan.tujuan=tb_dosen.username','inner')
                        ->join('tb_mhs','tb_pengaduan.pengadu=tb_mhs.username','inner')
                        ->join('tb_kategori','tb_pengaduan.id_kategori=tb_kategori.id','inner')
                        ->where($data)
                        ->order_by("id", "desc")
                        ->get();
        return $query;
    }

    public function get_pengaduan_mhs($username)
    {
        $query = $this->db->select('tb_pengaduan.*, tb_dosen.nama, tb_kategori.kategori')
                        ->from('tb_pengaduan')
                        ->join('tb_dosen','tb_pengaduan.tujuan=tb_dosen.username','inner')
                        ->join('tb_kategori','tb_pengaduan.id_kategori=tb_kategori.id','inner')
                        ->where('tb_pengaduan.pengadu',"$username")
                        ->order_by("id", "desc")
                        ->get();
        return $query;
    }

    public function get_pengaduan_dosen($username)
    {
        $query = $this->db->select('tb_pengaduan.*, tb_mhs.nama, tb_kategori.kategori')
                        ->from('tb_pengaduan')
                        ->join('tb_mhs','tb_pengaduan.pengadu=tb_mhs.username','inner')
                        ->join('tb_kategori','tb_pengaduan.id_kategori=tb_kategori.id','inner')
                        ->where('tb_pengaduan.tujuan',"$username")
                        ->order_by("id", "desc")
                        ->get();
        return $query;
    }

    public function getwhere_pengaduan_admin($id)
    {
        $query = $this->db->select('tb_pengaduan.*,tb_dosen.nama as dsn, tb_mhs.nama as mhs, tb_kategori.kategori')
        ->from('tb_pengaduan')
        ->join('tb_dosen','tb_pengaduan.tujuan=tb_dosen.username','inner')
        ->join('tb_mhs','tb_pengaduan.pengadu=tb_mhs.username','inner')
        ->join('tb_kategori','tb_pengaduan.id_kategori=tb_kategori.id','inner')
        ->where('tb_pengaduan.id',"$id")
        ->order_by("id", "desc")
        ->get();
        return $query;
    }

    public function getwhere_pengaduan($id)
    {
        $query = $this->db->select('tb_pengaduan.*,tb_dosen.nama, tb_kategori.kategori')
        ->from('tb_pengaduan')
        ->join('tb_dosen','tb_pengaduan.tujuan=tb_dosen.username','inner')
        ->join('tb_kategori','tb_pengaduan.id_kategori=tb_kategori.id','inner')
        ->where('tb_pengaduan.id',"$id")
        ->order_by("id", "desc")
        ->get();
        return $query;
    }

    public function getwhere_pengaduan_dosen($id)
    {
        $query = $this->db->select('tb_pengaduan.*,tb_mhs.nama, tb_kategori.kategori')
        ->from('tb_pengaduan')
        ->join('tb_mhs','tb_pengaduan.pengadu=tb_mhs.username','inner')
        ->join('tb_kategori','tb_pengaduan.id_kategori=tb_kategori.id','inner')
        ->where('tb_pengaduan.id',"$id")
        ->order_by("id", "desc")
        ->get();
        return $query;
    }

    public function insert_pengaduan($data)
    {
        $this->db->insert('tb_pengaduan',$data);
        return $this->db->insert_id();
    }

    public function update_pengaduan($data,$id)
    {
        $this->db->where('id',"$id");
        $this->db->update('tb_pengaduan',$data);
    }
}