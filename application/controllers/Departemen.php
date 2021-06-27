<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departemen extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('M_Login');
        $current_user=$this->M_Login->is_role();
        //cek session dan level user
        if($this->M_Login->is_role() != "4"){
            redirect("welcome/");
        }
        $this->load->model('M_Pengumuman');
        $this->load->model('M_Dosen');
        $this->load->model('M_Pengaduan');
        $this->load->model('M_Kategori');
    }

    public function index()
    {
        $username = $this->session->userdata('username');
        $data['berita'] = $this->M_Pengumuman->get_berita(array('id'=>1))->row();
        $nama['kategori'] = $this->M_Kategori->get_kategori()->result();
        $nama['nama'] = $this->M_Pengumuman->get_departemen(array('username'=>$username))->row();
        $this->load->view('layout/header_dep', $nama);
        $this->load->view('departemen/dashboard', $data);
        $this->load->view("layout/footer");
    }

    public function daftar_pengaduan()
    {
        $username = $this->session->userdata('username');
        $prodi = $this->M_Pengumuman->getwhere_prodi(array('username'=>$username))->row()->id;
        $data['view'] = $this->M_Pengaduan->get_pengaduan_prodi(array('id_prodi'=>$prodi))->result();
        $nama['kategori'] = $this->M_Kategori->get_kategori()->result();
        $nama['nama'] = $this->M_Pengumuman->get_departemen(array('username'=>$username))->row();
        $this->load->view('layout/header_dep', $nama);
        $this->load->view('departemen/daftar_pengaduan', $data);
        // $this->load->view("layout/footer");
    }

    public function kategori_pengaduan($id)
    {
        $username = $this->session->userdata('username');
        $prodi = $this->M_Pengumuman->getwhere_prodi(array('username'=>$username))->row()->id;
        $nama['kategori'] = $this->M_Kategori->get_kategori()->result();
        $nama['nama'] = $this->M_Pengumuman->get_departemen(array('username'=>$username))->row();
        $data['view'] = $this->M_Pengaduan->get_pengaduan_prodi_kategori(array('id_prodi'=>$prodi),$id)->result();
        $this->load->view('layout/header_dep', $nama);
        $this->load->view('departemen/daftar_pengaduan', $data);
        // $this->load->view("layout/footer");
    }

    public function detail_pengaduan()
    {
        $id = $this->input->post('id');
        if($id==NULL){
            redirect("Departemen/daftar_pengaduan");
        }
        $username = $this->session->userdata('username');
        $data['view'] = $this->M_Pengaduan->getwhere_pengaduan_admin($id)->row();
        $nama['kategori'] = $this->M_Kategori->get_kategori()->result();
        $nama['nama'] = $this->M_Pengumuman->get_departemen(array('username'=>$username))->row();
        $this->load->view('layout/header_dep', $nama);
        $this->load->view('departemen/detail_pengaduan', $data);
        $this->load->view("layout/footer");
    }

}