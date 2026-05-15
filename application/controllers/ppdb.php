<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ppdb extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Ppdb_model');
        $this->load->helper(['url', 'form']);
        $this->load->library(['session', 'upload']);
    }

    public function index() {
        $this->dashboard();
    }

    public function dashboard() {
        $setting = $this->Ppdb_model->get_setting();
        $data = [
            'setting'        => $setting,
            'total'          => $this->Ppdb_model->count_all(),
            'lulus'          => $this->Ppdb_model->count_by_status('lulus'),
            'tunggu'         => $this->Ppdb_model->count_by_status('tunggu'),
            'gagal'          => $this->Ppdb_model->count_by_status('gagal'),
            'berkas_lengkap' => $this->Ppdb_model->count_berkas_lengkap(),
            'aktivitas'      => $this->Ppdb_model->get_aktivitas(5),
            'seleksi_done'   => $this->Ppdb_model->is_seleksi_done(),
        ];
        $this->load->view('template/header', $data);
        $this->load->view('ppdb/dashboard', $data);
        $this->load->view('template/footer');   
    }

    public function daftar() {
        $setting = $this->Ppdb_model->get_setting();
        $data = [
            'setting' => $setting,
            'error'   => $this->session->flashdata('error'),
            'success' => $this->session->flashdata('success'),
        ];
        $this->load->view('ppdb/header');
        $this->load->view('ppdb/daftar', $data);
        $this->load->view('ppdb/footer');
    }

    public function simpan() {
        // Konfigurasi upload file
        $nisn = $this->input->post('nisn');
        $upload_path = FCPATH . 'uploads/ppdb/' . $nisn . '/';

        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, TRUE);
        }

        // Upload setiap file
        $files = ['berkas_akta', 'berkas_kk', 'berkas_rapor', 'berkas_ijazah', 'berkas_foto', 'berkas_piagam'];
        $uploaded = [];

        foreach ($files as $field) {
            if (!empty($_FILES[$field]['name'])) {
                $config = [
                    'upload_path'   => $upload_path,
                    'allowed_types' => 'jpg|jpeg|png|pdf',
                    'max_size'      => 5120,
                    'file_name'     => $field . '_' . $nisn,
                ];
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload($field)) {
                    $uploaded[$field] = $this->upload->data('file_name');
                }
            }
        }

        // Simpan data ke database
        $data = [
            'nama'           => $this->input->post('nama'),
            'nisn'           => $nisn,
            'nik'            => $this->input->post('nik'),
            'jenis_kelamin'  => $this->input->post('jenis_kelamin'),
            'tempat_lahir'   => $this->input->post('tempat_lahir'),
            'tanggal_lahir'  => $this->input->post('tanggal_lahir'),
            'agama'          => $this->input->post('agama'),
            'asal_sekolah'   => $this->input->post('asal_sekolah'),
            'alamat'         => $this->input->post('alamat'),
            'kecamatan'      => $this->input->post('kecamatan'),
            'jarak_km'       => $this->input->post('jarak_km'),
            'jalur'          => $this->input->post('jalur'),
            'nama_ayah'      => $this->input->post('nama_ayah'),
            'nama_ibu'       => $this->input->post('nama_ibu'),
            'no_hp'          => $this->input->post('no_hp'),
            'penghasilan'    => $this->input->post('penghasilan'),
            'berkas_akta'    => $uploaded['berkas_akta']   ?? null,
            'berkas_kk'      => $uploaded['berkas_kk']     ?? null,
            'berkas_rapor'   => $uploaded['berkas_rapor']  ?? null,
            'berkas_ijazah'  => $uploaded['berkas_ijazah'] ?? null,
            'berkas_foto'    => $uploaded['berkas_foto']   ?? null,
            'berkas_piagam'  => $uploaded['berkas_piagam'] ?? null,
            'status'         => 'tunggu',
            'created_at'     => date('Y-m-d H:i:s'),
        ];

        $this->Ppdb_model->simpan_pendaftar($data);
        $this->session->set_flashdata('success', 'Pendaftaran berhasil! Nomor NISN: ' . $nisn);
        redirect('ppdb/daftar');
    }

    public function pengumuman() {
        $data = ['hasil' => $this->Ppdb_model->get_lulus()];
        $this->load->view('ppdb/header');
        $this->load->view('ppdb/pengumuman', $data);
        $this->load->view('ppdb/footer');
    }

    public function jalur() {
        $this->load->view('ppdb/header');
        $this->load->view('ppdb/jalur');
        $this->load->view('ppdb/footer');
    }

    public function jadwal() {
        $this->load->view('ppdb/header');
        $this->load->view('ppdb/jadwal');
        $this->load->view('ppdb/footer');
    }

    public function jalankan_seleksi() {
        $this->Ppdb_model->jalankan_seleksi();
        $this->session->set_flashdata('success', 'Seleksi otomatis berhasil dijalankan!');
        redirect('ppdb/dashboard');
    }

    // Helper: waktu relatif
    public function _time_ago($datetime) {
        $time = strtotime($datetime);
        $diff = time() - $time;
        if ($diff < 60)     return $diff . ' dtk lalu';
        if ($diff < 3600)   return floor($diff/60) . ' mnt lalu';
        if ($diff < 86400)  return floor($diff/3600) . ' jam lalu';
        return floor($diff/86400) . ' hari lalu';
    }
}