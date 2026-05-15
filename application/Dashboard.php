<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dashboard_model');
        $this->load->library('session');
        // Cek login admin
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
    }

    // Halaman utama dashboard
    public function index() {
        $data['title'] = 'Dashboard PPDB';
        $this->load->view('admin/dashboard_view', $data);
    }

    // API endpoint - dipanggil AJAX setiap 10 detik
    public function get_realtime_data() {
        header('Content-Type: application/json');

        $result = [
            'stats'     => $this->Dashboard_model->get_stats(),
            'per_jalur' => $this->Dashboard_model->get_per_jalur(),
            'tren'      => $this->Dashboard_model->get_tren_7hari(),
            'terbaru'   => $this->Dashboard_model->get_pendaftar_terbaru(5),
        ];

        echo json_encode($result);
    }
}
