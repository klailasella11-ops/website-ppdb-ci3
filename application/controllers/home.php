<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $data = [
            'title'  => 'Beranda - SMP Negeri 100 Maluku Tengah',
            'active' => 'beranda'
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }

    public function berita()
    {
        $data = [
            'title'  => 'Berita Sekolah',
            'active' => 'berita'
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('home/berita', $data);
        $this->load->view('templates/footer');
    }
}