<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function cek_login($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('user');
        return $query->row(); // return 1 row atau NULL
    }
}