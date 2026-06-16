<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Ambil semua data user
    public function get_all_user() {
        return $this->db->order_by('id', 'ASC')->get('user')->result_array();
    }

    // Hapus user
    public function hapus_user($id) {
        return $this->db->delete('user', ['id' => $id]);
    }
}
