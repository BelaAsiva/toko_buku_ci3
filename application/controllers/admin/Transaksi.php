<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

  public function __construct() {
    parent::__construct();

    // Cek role hanya admin
    if ($this->session->userdata('role') !== 'admin') {
      redirect('auth/login');
    }

    $this->load->model('Laporan_model');
  }

  public function index() {
    $tanggal = $this->input->get('tanggal', true); // Input aman
    $kasir = $this->input->get('kasir', true);

    $data = [
      'title' => 'Laporan Transaksi',
      'kasir' => $this->Laporan_model->get_all_kasir(),
      'penjualan' => $this->Laporan_model->get_filtered_penjualan($tanggal, $kasir),
    ];

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar_admin');
    $this->load->view('admin/transaksi/index', $data); 
    $this->load->view('templates/footer');
  }

  public function laporan()
  {
      // Ambil kasir dari tabel users yang role-nya 'kasir'
      $data['kasir'] = $this->db->get_where('users', ['role' => 'kasir'])->result();

      // Data lain...
      $data['transaksi'] = $this->model_transaksi->getFilteredData();

      $this->load->view('admin/laporan_transaksi', $data);
  }

  public function detail($id_penjualan) {
    $data['title'] = 'Detail Transaksi';

    $detail = $this->Laporan_model->get_penjualan_detail($id_penjualan);

    if (empty($detail)) {
      show_404();
    }

    // Asumsikan semua baris punya data yang sama untuk transaksi utama
    $total_harga = array_sum(array_column($detail, 'subtotal'));

    $data['transaksi'] = [
      'tanggal' => $detail[0]->tanggal,
      'username' => $detail[0]->username,
      'total_harga' => $total_harga,
      'total_bayar' => $total_harga, // Bisa diganti jika ada data bayar terpisah
      'kembalian' => 0, // Sesuaikan jika ada data
    ];

    $data['detail'] = array_map(function($item) {
      return [
        'nama_barang' => $item->judul,
        'harga' => $item->subtotal / max($item->jumlah, 1),
        'jumlah' => $item->jumlah,
        'subtotal' => $item->subtotal
      ];
    }, $detail);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar_admin');
    $this->load->view('admin/transaksi/detail', $data); 
    $this->load->view('templates/footer');
  }
}
