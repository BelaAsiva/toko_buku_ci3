<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Cek jika user bukan kasir
        if ($this->session->userdata('role') !== 'kasir') {
            redirect('auth/login');
        }

        $this->load->model('Transaksi_model');
        $this->load->model('Buku_model');
        $this->load->model('User_model');
    }

    // Halaman daftar transaksi
    public function index() {
        $data['title'] = 'Data Transaksi';
        $data['transaksi'] = $this->Transaksi_model->getAllPenjualan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_kasir');
        $this->load->view('kasir/transaksi/index', $data);
        $this->load->view('templates/footer');
    }

    // Halaman tambah transaksi
    public function tambah() {
        $data['title'] = 'Transaksi Baru';
        $data['buku'] = $this->Buku_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_kasir');
        $this->load->view('kasir/transaksi/tambah', $data);
        $this->load->view('templates/footer');
    }

    // Simpan transaksi ke database
    public function simpan() {
        $user_id = $this->session->userdata('id');
        $waktu = date('Y-m-d H:i:s');

        $data = [
            'user_id' => $user_id,
            'tanggal' => $waktu,
            'created_at' => $waktu,
        ];

        $detail = [];
        $buku_id = $this->input->post('buku_id');
        $jumlah = $this->input->post('jumlah');
        $harga  = $this->input->post('harga');

        for ($i = 0; $i < count($buku_id); $i++) {
            if ($jumlah[$i] > 0) {
                $detail[] = [
                    'buku_id' => $buku_id[$i],
                    'jumlah' => $jumlah[$i],
                    'subtotal' => $jumlah[$i] * $harga[$i],
                ];
            }
        }

        if (!empty($detail)) {
            $this->Transaksi_model->simpan($data, $detail);
        }

        redirect('kasir/transaksi');
    }

    // Detail transaksi
    public function detail($id_penjualan) {
        $data['title'] = 'Detail Transaksi';

        $data_transaksi = $this->Transaksi_model->getPenjualanWithDetail($id_penjualan);

        if (!$data_transaksi || empty($data_transaksi['detail'])) {
            show_404();
        }

        $data['transaksi'] = $data_transaksi['transaksi'];
        $data['detail'] = $data_transaksi['detail'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_kasir');
        $this->load->view('kasir/transaksi/detail', $data);
        $this->load->view('templates/footer');
    }
}
