<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
    }

    // Halaman Login
    public function login() {
        if ($this->input->post()) {
            $username = $this->input->post('username', TRUE);
            $password = md5($this->input->post('password', TRUE));

            $user = $this->User_model->check_login($username, $password);
            if ($user) {
                // Set session
                $this->session->set_userdata([
                    'user_id' => $user->id,
                    'username' => $user->username,
                    'role' => $user->role,
                    'logged_in' => TRUE
                ]);

                // Redirect berdasarkan role
                if ($user->role === 'admin') {
                    redirect('admin/dashboard');
                } elseif ($user->role === 'kasir') {
                    redirect('kasir/dashboard');
                } else {
                    $this->session->set_flashdata('error', 'Role tidak dikenal.');
                    redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata('error', 'Username atau Password salah!');
                redirect('auth/login');
            }
        } else {
            $this->load->view('auth/login');
        }
    }

    // Halaman Register
    public function register() {
        if ($this->input->post()) {
            $username = $this->input->post('username', TRUE);
            $password = $this->input->post('password', TRUE);
            $password2 = $this->input->post('password2', TRUE);
            $role = $this->input->post('role', TRUE);

            // Validasi password cocok
            if ($password !== $password2) {
                $this->session->set_flashdata('error', 'Password tidak cocok.');
                redirect('auth/register');
            }

            // Simpan user baru
            $data = [
                'username' => $username,
                'password' => md5($password),
                'role' => $role
            ];

            $this->User_model->insert($data);
            $this->session->set_flashdata('success', 'Registrasi berhasil. Silakan login.');
            redirect('auth/login');
        } else {
            $this->load->view('auth/register');
        }
    }

    // Logout
    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
