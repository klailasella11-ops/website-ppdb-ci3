<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    private $table = 'user';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function login($email, $password)
    {
        // Cek di tabel admin dulu
        $this->db->where('email', $email);
        $query = $this->db->get('user');

        if ($query->num_rows() === 1) {
            $admin = $query->row();
            if (md5($password) === $admin->password) {
                $admin->role = 'Admin';
                $admin->id   = $admin->id;
                return $admin;
            }
        }

        // Kalau tidak ketemu, cek di tabel user
        $this->db->where('email', $email);
        $query = $this->db->get($this->table);

        if ($query->num_rows() === 1) {
            $user = $query->row();
            if (password_verify($password, $user->password)) {
                return $user;
            }
        }

        return FALSE;
    }

    public function register($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function get_user($id)
    {
        return $this->db->where('id', $id)
                        ->get($this->table)
                        ->row();
    }
}