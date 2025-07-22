<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Cek apakah user login dan role-nya admin
        if (!$this->session->userdata('role') || $this->session->userdata('role') !== 'admin') {
            redirect('auth/login');
        }

        // Load model Dashboard_model
        $this->load->model('Dashboard_model');
    }

    public function index() {
        // Set judul halaman
        $data['title'] = 'Dashboard Admin';

        // Ambil data statistik dari database
        $data['total_buku'] = $this->db->count_all('buku');
        $data['total_kategori'] = $this->db->count_all('kategori');
        $data['total_transaksi'] = $this->db->count_all('penjualan');
        $data['total_user'] = $this->db->count_all('users');

        // Ambil data statistik penjualan dan kategori terpopuler dari model
        $data['statistik_penjualan'] = $this->Dashboard_model->get_statistik_penjualan();
        $data['kategori_populer'] = $this->Dashboard_model->get_kategori_terpopuler();

        // Tampilkan halaman dashboard
        $this->load->view('admin/dashboard', $data);
    }
}
