<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // =========================
    // AMBIL SEMUA FORMULIR
    // =========================
    public function get_all_formulir() {

        return $this->db
            ->order_by('id', 'DESC')
            ->get('ppdb_pendaftar')
            ->result_array();
    }

    // =========================
    // FILTER BERDASARKAN TAHUN
    // =========================
    public function get_by_year($year) {

        $this->db->where('YEAR(created_at)', $year);

        return $this->db
            ->order_by('id', 'DESC')
            ->get('ppdb_pendaftar')
            ->result_array();
    }

    // =========================
    // DETAIL FORMULIR
    // =========================
    public function get_detail($id) {

        return $this->db
            ->get_where('ppdb_pendaftar', ['id' => $id])
            ->row_array();
    }

    // =========================
    // CARI BERDASARKAN NIK
    // =========================
    public function get_by_nik($nik) {

        return $this->db
            ->get_where('ppdb_pendaftar', ['nik' => $nik])
            ->row_array();
    }

    // =========================
    // EDIT NAMA
    // =========================
    public function edit_nama($id, $nama) {

        $this->db->where('id', $id);

        return $this->db->update('ppdb_pendaftar', [
            'namalengkap' => $nama
        ]);
    }

    // =========================
    // HAPUS FORMULIR
    // =========================
    public function hapus_formulir($id) {

        return $this->db->delete('ppdb_pendaftar', [
            'id' => $id
        ]);
    }

    // =========================
    // KONFIRMASI
    // =========================
    public function konfirmasi($id, $tanggal) {

        $this->db->where('id', $id);

        return $this->db->update('ppdb_pendaftar', [

            'status' => 'diterima'

        ]);
    }

    // =========================
    // WILAYAH
    // =========================
    public function get_wilayah($table, $id) {

        $row = $this->db
            ->get_where($table, ['id' => $id])
            ->row_array();

        return $row ? $row['name'] : '-';
    }

    // =========================
    // SUBMIT FORMULIR
    // =========================
    public function submit($data) {

        return $this->db->insert('ppdb_pendaftar', $data);
    }

    // =========================
    // UPDATE FORMULIR
    // =========================
    public function update_formulir($id, $data) {

        $this->db->where('id', $id);

        return $this->db->update('ppdb_pendaftar', $data);
    }

}