<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('role') !== 'admin') {
            redirect('auth/login');
        }
    }

    public function index() {
        // Cek login admin tetap
        if ($this->session->userdata('role') !== 'admin') {
            redirect('auth/login');
        }

        // Query ke database
        $data['title'] = 'Dashboard Admin';
        $data['total_buku'] = $this->db->count_all('buku');
        $data['total_kategori'] = $this->db->count_all('kategori');
        $data['total_transaksi'] = $this->db->count_all('penjualan');
        $data['total_user'] = $this->db->count_all('users');

        // Load layout dengan konten
        $data['content'] = 'admin/dashboard';
        $this->load->view('admin/dashboard', $data);

    }

}
