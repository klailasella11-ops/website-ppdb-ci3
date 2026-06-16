<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->helper(['url', 'form']);
        $this->load->library('session');
    }

    public function index() {

        // Jika sudah login langsung ke dashboard utama
        if ($this->session->userdata('logged_in')) {

            redirect('ppdb/dashboard');

        }

        $data = [
            'title' => 'Login - SMP Negeri 100 Maluku Tengah',
            'error' => $this->session->flashdata('error'),
        ];

        $this->load->view('login/index', $data);
    }

    public function proses() {

        $email    = $this->input->post('email', TRUE);
        $password = $this->input->post('password', TRUE);

        // Validasi input
        if (empty($email) || empty($password)) {

            $this->session->set_flashdata(
                'error',
                'Email dan password wajib diisi.'
            );

            redirect('auth');
        }

        // Cek login
        $user = $this->Login_model->cek_login(
            $email,
            md5($password)
        );

        // Jika user ditemukan
        if ($user) {

            $this->session->set_userdata([

                'logged_in' => TRUE,
                'id'        => $user->id,
                'nama'      => $user->nama,
                'email'     => $user->email,
                'role'      => $user->role,

            ]);

            // Semua user masuk dashboard utama
            redirect('ppdb/dashboard');

        } else {

            $this->session->set_flashdata(
                'error',
                'Email atau password salah.'
            );

            redirect('auth');

        }
    }

    public function logout() {

        $this->session->sess_destroy();

        redirect('auth');
    }
}