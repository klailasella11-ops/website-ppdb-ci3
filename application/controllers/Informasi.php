<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends CI_Controller {

    public function index()
    {
        $data['title']  = 'Profil Sekolah - SMP Negeri 100 Maluku Tengah';
        $data['active'] = 'informasi';

        $this->load->view('templates/header', $data);
        $this->load->view('informasi/index', $data);
        $this->load->view('templates/footer', $data);
    }

}
