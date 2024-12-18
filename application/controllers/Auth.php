<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->helper(array('url', 'form'));
    }

    // Halaman login & registrasi
    public function index() {
        $this->load->view('login');
    }

    // Fungsi login
    public function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->db->from('user')->where('username', $username);
        $user = $this->db->get()->row();

        if ($user == NULL) {
            $this->session->set_flashdata('alert', 'Username tidak ditemukan!');
            redirect('auth');
        } else if (password_verify($password, $user->password)) {
            $data = array(
                'username' => $user->username,
                'nama'     => $user->nama,
                'level'    => $user->level,
                'id_user'  => $user->id_user
            );
            $this->session->set_userdata($data);
            redirect('admin/home');
        } else {
            $this->session->set_flashdata('alert', 'Password salah!');
            redirect('auth');
        }
    }

    public function view_register() {
        $this->load->view("register");
    }
    // Fungsi pendaftaran
    public function register() {
        // Ambil data input dari form
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $nama     = $this->input->post('nama');
    
        // Periksa apakah username sudah ada
        $this->db->from('user')->where('username', $username);
        $existing_user = $this->db->get()->row();
    
        if ($existing_user != NULL) {
            // Jika username sudah digunakan
            $this->session->set_flashdata('register_alert', 'Username sudah digunakan!');
            redirect('auth/register_view'); // Kembali ke halaman register
        } else {
            // Jika username belum digunakan, simpan data ke database
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $data = array(
                'username' => $username,
                'password' => $hashed_password,
                'nama'     => $nama,
                'level'    => 'user' // Default level user
            );
            $this->db->insert('user', $data);
    
            // Flash message untuk registrasi berhasil
            $this->session->set_flashdata('register_alert', 'Pendaftaran berhasil! Silakan login.');
            redirect('auth'); // Pindahkan ke halaman login
        }
    }
    // Fungsi logout
    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }
}