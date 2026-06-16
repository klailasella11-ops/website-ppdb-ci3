<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['url', 'form']);
    }

    public function index()
{
    // kalau sudah login
if($this->session->userdata('logged_in') == true){
        redirect('admin');
    }

    $this->load->view('auth/login');
}

    public function login_process()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', 'Email dan password wajib diisi.');
            redirect('auth');
        }

        $email    = $this->input->post('email', TRUE);
        $password = $this->input->post('password', TRUE);
        $user     = $this->Auth_model->login($email, $password);

        if ($user) {
            $this->session->set_userdata([
    'logged_in' => TRUE,
    'id'    => $user->id,
    'username'  => $user->username,
    'email'     => $user->email,
    'role'      => strtolower($user->role),
]);

if (strtolower($user->role) === 'admin') {
    redirect('admin');
} else {
    redirect('home');
}
        } else {
            $this->session->set_flashdata('error', 'Email atau password salah.');
            redirect('auth');
        }
    }

    public function register_process()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[4]|is_unique[user.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[password]');

        if ($this->form_validation->run() === FALSE) {
            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('reg_error', reset($errors));
            redirect('auth');
        }

        $data = [
            'username' => $this->input->post('username', TRUE),
            'email'    => $this->input->post('email', TRUE),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'role'     => 'user',
        ];

        if ($this->Auth_model->register($data)) {
            $this->session->set_flashdata('success', 'Akun berhasil dibuat! Silakan masuk.');
            redirect('auth');
        } else {
            $this->session->set_flashdata('reg_error', 'Gagal membuat akun.');
            redirect('auth');
        }
    }

 public function logout()
{
    $this->session->sess_destroy();

    // hapus cache browser
    $this->output
        ->set_header("Cache-Control: no-store, no-cache, must-revalidate")
        ->set_header("Cache-Control: post-check=0, pre-check=0", false)
        ->set_header("Pragma: no-cache");

    redirect('auth');
}

}