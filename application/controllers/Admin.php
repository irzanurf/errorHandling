<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';

function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

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
    }

    
    public function index()
    {
        $username = $this->session->userdata('username');
        $data['berita'] = $this->M_Pengumuman->get_berita(array('id'=>1))->row();
        $this->load->view('layout/header_admin', $username);
        $this->load->view('admin/dashboard', $data);
        $this->load->view("layout/footer");
    }

    public function daftar_pengaduan()
    {
        $username = $this->session->userdata('username');
        $data['view'] = $this->M_Pengaduan->get_pengaduan_admin()->result();
        $this->load->view('layout/header_admin', $username);
        $this->load->view('admin/daftar_pengaduan', $data);
        // $this->load->view("layout/footer");
    }

    public function detail_pengaduan()
    {
        $id = $this->input->post('id');
        $username = $this->session->userdata('username');
        $data['view'] = $this->M_Pengaduan->getwhere_pengaduan_admin($id)->row();
        $this->load->view('layout/header_admin', $username);
        $this->load->view('admin/detail_pengaduan', $data);
        $this->load->view("layout/footer");
    }

    public function dosen()
    {
        $username = $this->session->userdata('username');
        $data['dosen']= $this->M_Dosen->get_dosen()->result();
        $this->load->view('layout/header_admin', $username);
        $this->load->view('admin/dosen', $data);
        // $this->load->view("layout/footer");
    }

    public function mhs()
    {
        $username = $this->session->userdata('username');
        $data['mhs']= $this->M_Mhs->get_mhs()->result();
        $this->load->view('layout/header_admin', $username);
        $this->load->view('admin/mhs', $data);
        // $this->load->view("layout/footer");
    }

    public function tambah_dosen()
    {
        $username = $this->session->userdata('username');
        $data['dosen']= $this->M_Dosen->get_dosen()->result();
        $data['prodi']= $this->M_Prodi->get_prodi()->result();
        $this->load->view('layout/header_admin', $username);
        $this->load->view('admin/tambah_dosen', $data);
        $this->load->view("layout/footer");
    }

    public function edit_dosen()
    {
        $username = $this->input->post('username');
        if($username==NULL){
            redirect("Admin/dosen");
        }
        $data['dosen']= $this->M_Dosen->getwhere_dosen(array('username'=>"$username"))->row();
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
        $prodi=$this->input->post('prodi',true);
        $dosen = [
            "username"=>$username,
            "nama"=>$nama,
            "jabatan"=>$jabatan,
            "prodi"=>$prodi,
            "status_pegawai"=>$status,
        ];
        $akun = [
            "username"=>$username,
            "password"=>MD5($username),
            "role"=>2,
        ];
        $this->M_Dosen->insert_dosen($dosen,$username);
        $this->M_Dosen->insert_akun($akun,$username);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Data berhasil direkam</strong></div>');
        redirect("admin/dosen"); 
    }

    public function updateDosen()
    {
        $username = $this->input->post('nip',true);
        $nama = $this->input->post('nama',true);
        $jabatan=$this->input->post('jabatan',true);
        $status=$this->input->post('status',true);
        $prodi=$this->input->post('prodi',true);
        $dosen = [
            "nama"=>$nama,
            "jabatan"=>$jabatan,
            "prodi"=>$prodi,
            "status_pegawai"=>$status,
        ];
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

    public function delete_mhs()
    {
        $username = $this->input->post('username');
        $this->M_Mhs->del_mhs(array('username'=>"$username"));
        $this->M_Mhs->del_mhs(array('username'=>"$username"));
        redirect("admin/mhs"); 
    }

    public function akun()
    {
        $username = $this->input->post('username');
        if($username==NULL){
            redirect("Admin/dosen");
        }
        $data['dosen']= $this->M_Dosen->getwhere_dosen(array('username'=>"$username"))->row();
        $this->load->view('layout/header_admin', $username);
        $this->load->view('admin/akun_dosen', $data);
        $this->load->view("layout/footer");
    }

    public function akun_mhs()
    {
        $username = $this->input->post('username');
        if($username==NULL){
            redirect("Admin/mhs");
        }
        $data['mhs']= $this->M_Mhs->getwhere_mhs(array('username'=>"$username"))->row();
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

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}