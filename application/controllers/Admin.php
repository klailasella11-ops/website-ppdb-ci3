<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;

class Admin extends MY_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Admin_model');
        $this->load->model('User_model');
        $this->load->model('Form_model');
        $this->load->library('session');

        if(!$this->session->userdata('logged_in')){
            redirect('auth');
        }

        if($this->session->userdata('role') !== 'admin'){
            redirect('auth');
        }

        $this->output
            ->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT')
            ->set_header('Cache-Control: no-store, no-cache, must-revalidate')
            ->set_header('Cache-Control: post-check=0, pre-check=0', false)
            ->set_header('Pragma: no-cache');
    }

    // =====================
    // DASHBOARD
    // =====================
    public function index() {
        $this->load->view('admin/layout/header', ['title' => 'Dashboard', 'active' => 'dashboard']);
        $this->load->view('admin/index');
        $this->load->view('admin/layout/footer');
    }

    public function dashboard() {
        $this->load->view('admin/layout/header', ['title' => 'Dashboard', 'active' => 'dashboard']);
        $this->load->view('admin/index');
        $this->load->view('admin/layout/footer');
    }

    // =====================
    // KELOLA ADMIN
    // =====================
    public function kelola_admin() {
        $data['admins'] = $this->Admin_model->get_all_admin();
        $this->load->view('admin/layout/header', ['title' => 'Kelola Admin', 'active' => 'admin']);
        $this->load->view('admin/kelola_admin', $data);
        $this->load->view('admin/layout/footer');
    }

    public function tambah_admin() {
        if ($this->input->post('adminbaru')) {
            $email    = $this->input->post('adminemail');
            $password = $this->input->post('adminpassword');
            $result = $this->Admin_model->tambah_admin($email, $password);
            if ($result) {
                $this->session->set_flashdata('success', 'Berhasil tambah admin baru.');
            } else {
                $this->session->set_flashdata('error', 'Gagal tambah admin baru.');
            }
        }
        redirect('admin/kelola_admin');
    }

    public function hapus_admin() {
        if ($this->input->post('hapus')) {
            $id = $this->input->post('id');
            $result  = $this->Admin_model->hapus_admin($id);
            if ($result) {
                $this->session->set_flashdata('success', 'Admin berhasil dihapus.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menghapus admin.');
            }
        }
        redirect('admin/kelola_admin');
    }

    public function reset_password($id = null) {
        if (!$id) {
            $this->session->set_flashdata('error', 'ID Admin tidak ditemukan.');
            redirect('admin/kelola_admin');
        }
        $newPassword    = bin2hex(random_bytes(4));
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $result = $this->Admin_model->update_password($id, $hashedPassword);
        if ($result) {
            $this->session->set_flashdata('success', 'Password berhasil direset. Password baru: ' . $newPassword);
        } else {
            $this->session->set_flashdata('error', 'Gagal mereset password.');
        }
        redirect('admin/kelola_admin');
    }

    // =====================
    // KELOLA USER
    // =====================
    public function kelola_user() {
        $data['users'] = $this->User_model->get_all_user();
        $this->load->view('admin/layout/header', ['title' => 'Kelola User', 'active' => 'user']);
        $this->load->view('admin/kelola_user', $data);
        $this->load->view('admin/layout/footer');
    }

    public function hapus_user() {
        if ($this->input->post('hapus')) {
            $id = $this->input->post('iduser');
            $result = $this->User_model->hapus_user($id);
            if ($result) {
                $this->session->set_flashdata('success', 'Berhasil hapus data user.');
            } else {
                $this->session->set_flashdata('error', 'Gagal hapus data user.');
            }
        }
        redirect('admin/kelola_user');
    }

    // =====================
    // FORMULIR PENDAFTARAN
    // =====================
    public function formulir() {
        $data['formulir'] = $this->db
            ->order_by('id', 'DESC')
            ->get('ppdb_pendaftar')
            ->result_array();

        $this->load->view('admin/layout/header', ['title' => 'Formulir', 'active' => 'formulir']);
        $this->load->view('admin/formulir', $data);
        $this->load->view('admin/layout/footer');
    }

    public function hapus_formulir($id = null) {
        if ($id) {
            $result = $this->Form_model->hapus_formulir($id);
            if ($result) {
                echo "<script>alert('Data berhasil dihapus.');window.location='" . site_url('admin/formulir') . "';</script>";
            } else {
                echo "<script>alert('Gagal menghapus data.');window.location='" . site_url('admin/formulir') . "';</script>";
            }
        } else {
            redirect('admin/formulir');
        }
    }

    public function edit_formulir() {
        if ($this->input->post()) {
            $id   = $this->input->post('id');
            $nama = $this->input->post('nama');
            $result = $this->Form_model->edit_nama($id, $nama);
            echo $result ? 'Berhasil diperbarui' : 'Error saat update';
        }
    }

    public function fetch_data() {
        if ($this->input->post('year')) {
            $year = $this->input->post('year');
            $data = $this->Form_model->get_by_year($year);
            echo json_encode($data);
        }
    }

    public function view_formulir($id = null) {
        if (!$id) redirect('admin/formulir');
        $data['siswa'] = $this->Form_model->get_detail($id);
        if (!$data['siswa']) redirect('admin/formulir');
        $this->load->view('admin/layout/header', ['title' => 'Detail Formulir', 'active' => 'formulir']);
        $this->load->view('admin/view_formulir', $data);
        $this->load->view('admin/layout/footer');
    }

    public function unduh($nik = null) {
        if (!$nik) redirect('admin/formulir');
        $siswa = $this->Form_model->get_by_nik($nik);
        if (!$siswa) redirect('admin/formulir');

        $prov = '-';
        $kab  = '-';
        $kec  = '-';
        $kel  = '-';

        $showWali = !empty($siswa['walinik']) && !empty($siswa['walinama'])
                 && !empty($siswa['walipekerjaan']) && !empty($siswa['walitelepon']);

        require_once APPPATH . '../vendor/autoload.php';
        $dompdf = new Dompdf();

        $data = [
            'siswa'    => $siswa,
            'prov'     => $prov,
            'kab'      => $kab,
            'kec'      => $kec,
            'kel'      => $kel,
            'showWali' => $showWali,
        ];

        $html = $this->load->view('admin/pdf_formulir', $data, TRUE);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream($siswa['namalengkap'] . '.pdf');
    }

    // =====================
    // KONFIRMASI PENDAFTARAN
    // =====================
    public function konfirmasi() {
        if ($this->input->post('ok')) {
            $id = $this->input->post('id');
            date_default_timezone_set('Asia/Bangkok');
            $today  = date('Y-m-d');
            $result = $this->Form_model->konfirmasi($id, $today);
            if ($result) {
                $this->session->set_flashdata('success', 'Berhasil konfirmasi data.');
            } else {
                $this->session->set_flashdata('error', 'Gagal konfirmasi data.');
            }
        }
        redirect('admin/formulir');
    }
}