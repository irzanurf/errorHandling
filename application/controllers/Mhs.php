<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mhs extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('M_Login');
        $current_user=$this->M_Login->is_role();
        //cek session dan level user
        if($this->M_Login->is_role() != "3"){
            redirect("welcome/");
        }
        $this->load->model('M_Pengumuman');
        $this->load->model('M_Dosen');
        $this->load->model('M_Kategori');
        $this->load->model('M_Pengaduan');
        
    }

    public function index()
    {
        $username = $this->session->userdata('username');
        $data['berita'] = $this->M_Pengumuman->get_berita(array('id'=>1))->row();
        $nama['nama'] = $this->M_Pengumuman->get_mhs(array('username'=>$username))->row();
        $this->load->view('layout/header_mhs', $nama);
        $this->load->view('mhs/dashboard', $data);
        $this->load->view("layout/footer");
    }

    public function form_pengaduan()
    {
        $username = $this->session->userdata('username');
        $prodi = $this->M_Pengumuman->get_prodi(array('username'=>$username))->row()->prodi;
        $cek = $data['dosen']= $this->M_Dosen->getview_dosen(array('tb_dosprod.prodi'=>$prodi))->result();
        $data['kategori']= $this->M_Kategori->get_kategori()->result();
        $nama['nama'] = $this->M_Pengumuman->get_mhs(array('username'=>$username))->row();
        $this->load->view('layout/header_mhs', $nama);
        $this->load->view('mhs/form_pengaduan', $data);
        $this->load->view("layout/footer");
    }

    public function add_pengaduan()
    {
        $username = $this->session->userdata('username');
        $prodi = $this->M_Pengumuman->get_prodi(array('username'=>$username))->row()->prodi;
        $username = $this->session->userdata('username');
        $date = date('Y-m-d');
        $kategori = $this->input->post('kategori',true);
        $tujuan = $this->input->post('dosen',true);
        $subjek = $this->input->post('subjek',true);
        $pengaduan = $this->input->post('pengaduan',true);
        $data = [
            "tujuan"=>$tujuan,
            "pengadu"=>$username,
            "pesan"=>$pengaduan,
            "subjek"=>$subjek,
            "id_kategori"=>$kategori,
            "tgl_kirim"=>$date,
            "id_prodi"=>$prodi,
            "status"=>0,
        ];
        $id = $this->M_Pengaduan->insert_pengaduan($data);
        $file = $_FILES['file'];
        if(empty($file['name'])){}
            else{
            $config['upload_path'] = './assets/kirim';
            $config['encrypt_name'] = TRUE;
            $config['allowed_types'] = '*';

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('file')){
                echo "Upload Gagal"; die();
            } else {
                $file=$this->upload->data('file_name');
            }
            $datafile = [
            "file_kirim"=>$file,];
            $this->M_Pengaduan->update_pengaduan($datafile,$id);
        }
        
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-block" align="center"><strong>Pengaduan Terkirim</strong></div>');
        redirect("Mhs/daftar_pengaduan"); 
    }

    public function daftar_pengaduan()
    {
        $username = $this->session->userdata('username');
        $data['view'] = $this->M_Pengaduan->get_pengaduan_mhs($username)->result();
        $nama['nama'] = $this->M_Pengumuman->get_mhs(array('username'=>$username))->row();
        $this->load->view('layout/header_mhs', $nama);
        $this->load->view('mhs/daftar_pengaduan', $data);
        // $this->load->view("layout/footer");
    }

    public function detail_pengaduan()
    {
        $id = $this->input->post('id');
        if($id==NULL){
            redirect("Mhs/daftar_pengaduan");
        }
        $username = $this->session->userdata('username');
        $nama['nama'] = $this->M_Pengumuman->get_mhs(array('username'=>$username))->row();
        $data['view'] = $this->M_Pengaduan->getwhere_pengaduan($id)->row();
        $this->load->view('layout/header_mhs', $nama);
        $this->load->view('mhs/detail_pengaduan', $data);
        $this->load->view("layout/footer");
    }

    public function balas_pengaduan()
    {
        $id = $this->input->post('id');
        if($id==NULL){
            redirect("Mhs/daftar_pengaduan");
        }
        $username = $this->session->userdata('username');
        $nama['nama'] = $this->M_Pengumuman->get_mhs(array('username'=>$username))->row();
        $data['view'] = $this->M_Pengaduan->getwhere_pengaduan($id)->row();
        $this->load->view('layout/header_mhs', $nama);
        $this->load->view('mhs/balas_pengaduan', $data);
        $this->load->view("layout/footer");
    }


}