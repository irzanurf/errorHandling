<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('M_Login');
        $current_user=$this->M_Login->is_role();
        //cek session dan level user
        if($this->M_Login->is_role() != "1"){
            redirect("welcome/");
        }
        $this->load->model('M_Admin');
        $this->load->model('M_Prodi');
        $this->load->model('M_Pengumuman');
        $this->load->model('M_Pengaduan');
        $this->load->model('M_Dosen');
        $this->load->model('M_Mhs');
        $this->load->model('M_Kategori');
    }

    public function index()
    {
        $username = $this->session->userdata('username');
        $header['nama'] = $username;
        $header['kategori'] = $this->M_Kategori->get_kategori()->result();
        $data['berita'] = $this->M_Pengumuman->get_berita(array('id'=>1))->row();
        $this->load->view('layout/header_admin', $header);
        $this->load->view('admin/dashboard', $data);
        $this->load->view("layout/footer");
    }

    public function berita()
    {
        $username = $this->session->userdata('username');
        $header['nama'] = $username;
        $header['kategori'] = $this->M_Kategori->get_kategori()->result();
        $data['berita'] = $this->M_Pengumuman->get_berita(array('id'=>1))->row();
        $this->load->view('layout/header_admin', $header);
        $this->load->view('admin/berita', $data);
        $this->load->view("layout/footer");
    }

    public function updateBerita()
    {
        $username = $this->session->userdata('username');
        $header['nama'] = $username;
        $header['kategori'] = $this->M_Kategori->get_kategori()->result();
        $content=$this->input->post('content',true);
        $berita = [
            'pengumuman'=>$content,
        ];
        $this->M_Pengumuman->update_berita(array('id'=>1),$berita);
        redirect("admin"); 
    }

    public function daftar_pengaduan()
    {
        $username = $this->session->userdata('username');
        $header['nama'] = $username;
        $header['kategori'] = $this->M_Kategori->get_kategori()->result();
        $data['view'] = $this->M_Pengaduan->get_pengaduan_admin()->result();
        $this->load->view('layout/header_admin', $header);
        $this->load->view('admin/daftar_pengaduan', $data);
        // $this->load->view("layout/footer");
    }

    public function kategori_pengaduan($id)
    {
        $username = $this->session->userdata('username');
        $header['nama'] = $username;
        $header['kategori'] = $this->M_Kategori->get_kategori()->result();
        $data['view'] = $this->M_Pengaduan->get_pengaduan_admin_kategori($id)->result();
        $this->load->view('layout/header_admin', $header);
        $this->load->view('admin/daftar_pengaduan', $data);
        // $this->load->view("layout/footer");
    }

    public function detail_pengaduan()
    {
        $id = $this->input->post('id');
        if($id==NULL){
            redirect("Admin/daftar_pengaduan");
        }
        $username = $this->session->userdata('username');
        $header['nama'] = $username;
        $header['kategori'] = $this->M_Kategori->get_kategori()->result();
        $data['view'] = $this->M_Pengaduan->getwhere_pengaduan_admin($id)->row();
        $this->load->view('layout/header_admin', $header);
        $this->load->view('admin/detail_pengaduan', $data);
        $this->load->view("layout/footer");
    }

    public function dosen()
    {
        $username = $this->session->userdata('username');
        $header['nama'] = $username;
        $header['kategori'] = $this->M_Kategori->get_kategori()->result();
        $data['dosen']= $this->M_Dosen->get_dosen()->result();
        $this->load->view('layout/header_admin', $header);
        $this->load->view('admin/dosen', $data);
        // $this->load->view("layout/footer");
    }

    public function mhs()
    {
        $username = $this->session->userdata('username');
        $header['nama'] = $username;
        $header['kategori'] = $this->M_Kategori->get_kategori()->result();
        $data['mhs']= $this->M_Mhs->get_mhs()->result();
        $this->load->view('layout/header_admin', $header);
        $this->load->view('admin/mhs', $data);
        // $this->load->view("layout/footer");
    }

    public function prodi()
    {
        $username = $this->session->userdata('username');
        $header['nama'] = $username;
        $header['kategori'] = $this->M_Kategori->get_kategori()->result();
        $data['dep']= $this->M_Prodi->get_prodi()->result();
        $this->load->view('layout/header_admin', $header);
        $this->load->view('admin/prodi', $data);
        // $this->load->view("layout/footer");
    }

    public function tambah_dosen()
    {
        $username = $this->session->userdata('username');
        $header['nama'] = $username;
        $header['kategori'] = $this->M_Kategori->get_kategori()->result();
        $data['dosen']= $this->M_Dosen->get_dosen()->result();
        $data['prodi']= $this->M_Prodi->get_prodi()->result();
        $this->load->view('layout/header_admin', $header);
        $this->load->view('admin/tambah_dosen', $data);
        $this->load->view("layout/footer");
    }

    // public function tambah_prodi()
    // {
    //     $username = $this->session->userdata('username');
    //     $header['nama'] = $username;
    //     $header['kategori'] = $this->M_Kategori->get_kategori()->result();
    //     $this->load->view('layout/header_admin', $header);
    //     $this->load->view('admin/tambah_prodi');
    //     $this->load->view("layout/footer");
    // }

    public function edit_dosen()
    {
        $username = $this->input->post('username');
        if($username==NULL){
            redirect("Admin/dosen");
        }
        $data['dosen']= $this->M_Dosen->getwhere_dosen(array('tb_dosen.username'=>"$username"))->row();
        $data['nilai_prodi'] = $this->M_Dosen->nilai_prodi($username)->result();
        $data['prodi']= $this->M_Prodi->get_prodi()->result();
        $this->load->view('layout/header_admin', $username);
        $this->load->view('admin/edit_dosen', $data);
        $this->load->view("layout/footer");
    }

    public function addDosen()
    {
        $username = $this->input->post('nip',true);
        $nama = $this->input->post('nama',true);
        $jabatan=$this->input->post('jabatan',true);
        $status=$this->input->post('status',true);
        $prodi= $this->input->post('prodi[]');
        $dosen = [
            "username"=>$username,
            "nama"=>$nama,
            "jabatan"=>$jabatan,
            "status_pegawai"=>$status,
        ];
        $akun = [
            "username"=>$username,
            "password"=>MD5($username),
            "role"=>2,
        ];
        $data_prodi = array();
        for($i=0; $i<count($prodi)-1; $i++)
        {
            if($prodi[$i]==""||$prodi[$i]==null||$prodi[$i]==0){

            }
            else{
            $data_prodi[$i] = array(
                'prodi' =>  $prodi[$i],
                "dosen" =>  $username,
            );
        }
        }
        $this->M_Dosen->prodi($data_prodi);
        $this->M_Dosen->insert_dosen($dosen,$username);
        $this->M_Dosen->insert_akun($akun,$username);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Data berhasil direkam</strong></div>');
        redirect("admin/dosen"); 
    }

    public function addProdi()
    {
        $username = $this->input->post('username',true);
        $prodi = $this->input->post('prodi',true);
        $password = $this->input->post('password',true);
        $data = [
            "username"=>$username,
            "prodi"=>$prodi,
        ];
        $akun = [
            "username"=>$username,
            "password"=>MD5($password),
            "role"=>4,
        ];
        $this->M_Prodi->insert_prodi($data,$username);
        $this->M_Prodi->insert_akun($akun,$username);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Data berhasil direkam</strong></div>');
        redirect("admin/prodi"); 
    }

    public function updateProdi()
    {
        $id = $this->input->post('id');
        $prodi = $this->input->post('prodi',true);
        $username = $this->input->post('username',true);
        $data = [
            "prodi"=>$prodi,
            "username"=>$username,
        ];
        $akun = [
            "username"=>$username,
        ];
        $this->M_Prodi->update_prodi($data,$id);
        $this->M_Prodi->update_akun($akun,$id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Data berhasil direkam</strong></div>');
        redirect("admin/prodi"); 
    }

    public function updateDosen()
    {
        $username = $this->input->post('nip',true);
        $nama = $this->input->post('nama',true);
        $jabatan=$this->input->post('jabatan',true);
        $status=$this->input->post('status',true);
        $prodi = $this->input->post('prodi[]');
        $dosen = [
            "nama"=>$nama,
            "jabatan"=>$jabatan,
            "status_pegawai"=>$status,
        ];
        
        $data_prodi = array();
        for($i=0; $i<count($prodi)-1; $i++)
        {
            if($prodi[$i]==""||$prodi[$i]==null||$prodi[$i]==0){

            }
            else{
            $data_prodi[$i] = array(
                'prodi' =>  $prodi[$i],
                "dosen" =>  $username,
            );
        }
        }
        $this->M_Dosen->delete_dosen_prodi(array('dosen'=>"$username"));
        $this->M_Dosen->prodi($data_prodi);
        $this->M_Dosen->update_dosen($dosen,$username);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Data berhasil direkam</strong></div>');
        redirect("admin/dosen"); 
    }

    public function delete_dosen()
    {
        $username = $this->input->post('username');
        $this->M_Dosen->del_dosen(array('username'=>"$username"));
        $this->M_Dosen->del_akun(array('username'=>"$username"));
        redirect("admin/dosen"); 
    }

    public function delete_prodi()
    {
        $username = $this->input->post('username');
        $this->M_Prodi->del_prodi(array('username'=>"$username"));
        $this->M_Prodi->del_akun(array('username'=>"$username"));
        redirect("admin/prodi"); 
    }

    public function delete_mhs()
    {
        $username = $this->input->post('username');
        $this->M_Mhs->del_mhs(array('username'=>"$username"));
        $this->M_Mhs->del_akun(array('username'=>"$username"));
        redirect("admin/mhs"); 
    }

    public function akun()
    {
        $username = $this->input->post('username');
        if($username==NULL){
            redirect("Admin/dosen");
        }
        $data['dosen']= $this->M_Dosen->getwhere_dosen(array('tb_dosen.username'=>"$username"))->row();
        $this->load->view('layout/header_admin', $username);
        $this->load->view('admin/akun_dosen', $data);
        $this->load->view("layout/footer");
    }

    public function akun_prodi()
    {
        $username = $this->input->post('username');
        if($username==NULL){
            redirect("Admin/prodi");
        }
        $data['prodi'] = $this->M_Prodi->getwhere_prodi(array('username'=>"$username"))->row();
        $this->load->view('layout/header_admin', $username);
        $this->load->view('admin/akun_prodi', $data);
        $this->load->view("layout/footer");
    }

    public function akun_mhs()
    {
        $username = $this->input->post('username');
        if($username==NULL){
            redirect("Admin/mhs");
        }
        $data['mhs']= $this->M_Mhs->getwhere_mhs(array('tb_mhs.username'=>"$username"))->row();
        $this->load->view('layout/header_admin', $username);
        $this->load->view('admin/akun_mhs', $data);
        $this->load->view("layout/footer");
    }

    public function changePass()
    {
        $username = $this->input->post('username',true);
        $pass = $this->input->post('pass',true);
        $password = [
            'password'=>MD5($pass),
        ];
        echo "$pass";
        echo "$username";
        $this->M_Dosen->changePass($username, $password);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Data berhasil direkam</strong></div>');
        redirect("admin/dosen"); 
    }

    public function kategori()
    {
        $username = $this->session->userdata('username');
        $header['nama'] = $username;
        $header['kategori'] = $this->M_Kategori->get_kategori()->result();
        $data['kategori']= $this->M_Kategori->get_kategori()->result();
        $this->load->view('layout/header_admin', $header);
        $this->load->view('admin/kategori', $data);
        // $this->load->view("layout/footer");
    }

    public function addKategori()
    {
        $kategori = $this->input->post('kategori',true);
        $data = [
            "kategori"=>$kategori,
        ];
        $this->M_Kategori->insert_kategori($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Data berhasil direkam</strong></div>');
        redirect("admin/kategori"); 
    }

    public function delete_kategori()
    {
        $id = $this->input->post('id');
        $this->M_Kategori->del_kategori(array('id'=>"$id"));
        redirect("admin/kategori"); 
    }

    public function updateKategori()
    {
        $id = $this->input->post('id');
        $kategori = $this->input->post('kategori',true);
        $data = [
            "kategori"=>$kategori,
        ];
        $this->M_Kategori->update_kategori($data,$id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Data berhasil direkam</strong></div>');
        redirect("admin/kategori"); 
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}