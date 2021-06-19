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
        $this->load->model('M_Pengumuman');
        $this->load->model('M_Pengaduan');
        $this->load->model('M_Dosen');
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

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}