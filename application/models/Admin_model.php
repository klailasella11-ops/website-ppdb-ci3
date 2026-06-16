<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Ambil semua data admin
    public function get_all_admin() {
        return $this->db->order_by('id', 'ASC')->get('admin')->result_array();
    }

    // Tambah admin baru
    public function tambah_admin($username, $email, $password) {
        $data = [
            'username' => $username,                                        // ✅ Sesuai kolom DB
            'email'    => $email,                                           // ✅ Sesuai kolom DB
            'password' => password_hash($password, PASSWORD_BCRYPT),       // ✅ Sesuai kolom DB
            'role'     => 'admin',                                          // ✅ Default role
        ];
        return $this->db->insert('admin', $data);
    }

    // Hapus admin
    public function hapus_admin($id) {
        if (!is_numeric($id) || $id <= 0) return false;                    // ✅ Validasi ID
        return $this->db->delete('admin', ['id' => $id]);
    }

    // Update password admin
    public function update_password($id, $password) {
        if (!is_numeric($id) || $id <= 0) return false;                    // ✅ Validasi ID
        $this->db->where('id', $id);                                       // ✅ Fix bug $id
        return $this->db->update('admin', [
            'password' => password_hash($password, PASSWORD_BCRYPT)        // ✅ Sesuai kolom DB
        ]);
    }
}