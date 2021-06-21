<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('M_Login');
        $current_user=$this->M_Login->is_role();
        //cek session dan level user
        if($this->M_Login->is_role() != "2"){
            redirect("welcome/");
        }
        $this->load->model('M_Pengumuman');
        $this->load->model('M_Dosen');
        $this->load->model('M_Pengaduan');
    }

    public function index()
    {
        $username = $this->session->userdata('username');
        $data['berita'] = $this->M_Pengumuman->get_berita(array('id'=>1))->row();
        $nama['nama'] = $this->M_Pengumuman->get_dosen(array('username'=>$username))->row();
        $this->load->view('layout/header_dosen', $nama);
        $this->load->view('dosen/dashboard', $data);
        $this->load->view("layout/footer");
    }

    public function daftar_pengaduan()
    {
        $username = $this->session->userdata('username');
        $data['view'] = $this->M_Pengaduan->get_pengaduan_dosen($username)->result();
        $nama['nama'] = $this->M_Pengumuman->get_dosen(array('username'=>$username))->row();
        $this->load->view('layout/header_dosen', $nama);
        $this->load->view('dosen/daftar_pengaduan', $data);
        // $this->load->view("layout/footer");
    }

    public function balas_pengaduan()
    {
        $id = $this->input->post('id');
        $username = $this->session->userdata('username');
        $nama['nama'] = $this->M_Pengumuman->get_dosen(array('username'=>$username))->row();
        $data = [
            "status"=>1,
        ];
        $this->M_Pengaduan->update_pengaduan($data,$id);
        $data['view'] = $this->M_Pengaduan->getwhere_pengaduan_dosen($id)->row();
        $this->load->view('layout/header_dosen', $nama);
        $this->load->view('dosen/balas_pengaduan', $data);
        $this->load->view("layout/footer");
    }

    public function balas()
    {
        $username = $this->session->userdata('username');
        $id = $this->input->post('id',true);
        $date = date('Y-m-d');
        $balas = $this->input->post('balas',true);
        $data = [
            "balasan"=>$balas,
            "tgl_balas"=>$date,
            "status"=>2,
        ];
        $this->M_Pengaduan->update_pengaduan($data,$id);
        $file = $_FILES['file'];
        if(empty($file['name'])){}
            else{
            $config['upload_path'] = './assets/balas';
            $config['encrypt_name'] = TRUE;
            $config['allowed_types'] = '*';

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('file')){
                echo "Upload Gagal"; die();
            } else {
                $file=$this->upload->data('file_name');
            }
            $datafile = [
            "file_balas"=>$file,];
            $this->M_Pengaduan->update_pengaduan($datafile,$id);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Pesan Balasan Terkirim</strong></div>');
        redirect("Dosen/daftar_pengaduan"); 
    }

    public function detail_pengaduan()
    {
        $id = $this->input->post('id');
        $username = $this->session->userdata('username');
        $nama['nama'] = $this->M_Pengumuman->get_dosen(array('username'=>$username))->row();
        $data['view'] = $this->M_Pengaduan->getwhere_pengaduan_dosen($id)->row();
        $this->load->view('layout/header_dosen', $nama);
        $this->load->view('dosen/detail_pengaduan', $data);
        $this->load->view("layout/footer");
    }


}