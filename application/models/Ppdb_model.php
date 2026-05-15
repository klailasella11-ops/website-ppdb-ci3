<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ppdb_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_setting() {
        $row = $this->db->get('ppdb_setting')->row();
        if (!$row) {
            // Default setting jika tabel kosong
            return (object)[
                'tahun_ajaran'    => '2025/2026',
                'kuota_total'     => 160,
                'kuota_zonasi'    => 80,
                'kuota_prestasi'  => 48,
                'kuota_afirmasi'  => 24,
                'kuota_mutasi'    => 8,
            ];
        }
        return $row;
    }

    public function count_all() {
        return $this->db->count_all('ppdb_pendaftar');
    }

    public function count_by_status($status) {
        return $this->db->where('status', $status)
                        ->count_all_results('ppdb_pendaftar');
    }

    public function count_berkas_lengkap() {
        return $this->db->where('berkas_akta IS NOT NULL', null, false)
                        ->where('berkas_kk IS NOT NULL', null, false)
                        ->where('berkas_rapor IS NOT NULL', null, false)
                        ->where('berkas_ijazah IS NOT NULL', null, false)
                        ->where('berkas_foto IS NOT NULL', null, false)
                        ->count_all_results('ppdb_pendaftar');
    }

    public function get_aktivitas($limit = 5) {
        return $this->db->order_by('created_at', 'DESC')
                        ->limit($limit)
                        ->get('ppdb_pendaftar')
                        ->result();
    }

    public function is_seleksi_done() {
        return $this->db->where('status', 'lulus')
                        ->count_all_results('ppdb_pendaftar') > 0;
    }

    public function simpan_pendaftar($data) {
        return $this->db->insert('ppdb_pendaftar', $data);
    }

    public function get_lulus() {
        return $this->db->where('status', 'lulus')
                        ->order_by('skor_total', 'DESC')
                        ->get('ppdb_pendaftar')
                        ->result();
    }

    public function jalankan_seleksi() {
        $setting = $this->get_setting();
        $jalur_kuota = [
            'zonasi'   => $setting->kuota_zonasi,
            'prestasi' => $setting->kuota_prestasi,
            'afirmasi' => $setting->kuota_afirmasi,
            'mutasi'   => $setting->kuota_mutasi,
        ];

        // Reset semua status ke tunggu
        $this->db->update('ppdb_pendaftar', ['status' => 'tunggu']);

        foreach ($jalur_kuota as $jalur => $kuota) {
            $peserta = $this->db->where('jalur', $jalur)
                                ->order_by('skor_total', 'DESC')
                                ->get('ppdb_pendaftar')
                                ->result();

            $count = 0;
            foreach ($peserta as $p) {
                $status = ($count < $kuota) ? 'lulus' : 'gagal';
                $this->db->where('id', $p->id)
                         ->update('ppdb_pendaftar', ['status' => $status]);
                $count++;
            }
        }
    }
}