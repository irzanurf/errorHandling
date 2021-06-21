<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Prodi extends CI_Model
{
    public function get_prodi()
    {
        return $this->db->get('tb_prodi');
        
    }
}