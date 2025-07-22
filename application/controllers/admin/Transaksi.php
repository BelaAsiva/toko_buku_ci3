<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

  public function __construct() {
    parent::__construct();

    // Cek apakah user adalah admin
    if ($this->session->userdata('role') !== 'admin') {
      redirect('auth/login');
    }

    $this->load->model('Laporan_model');
  }

  // Menampilkan halaman utama laporan transaksi dengan filter
  public function index() {
    // Ambil parameter filter dari input GET
    $tanggal = $this->input->get('tanggal', true);
    $kasir   = $this->input->get('kasir', true);

    // Data untuk ditampilkan di view
    $data = [
      'title'      => 'Laporan Transaksi',
      'kasir'      => $this->Laporan_model->get_all_kasir(),
      'penjualan'  => $this->Laporan_model->get_filtered_penjualan($tanggal, $kasir),
    ];

    // Tampilkan halaman
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar_admin');
    $this->load->view('admin/transaksi/index', $data);
    $this->load->view('templates/footer');
  }

  // Halaman untuk mencetak atau melihat laporan
  public function laporan() {
    $data['kasir'] = $this->db->get_where('users', ['role' => 'kasir'])->result();
    $data['transaksi'] = $this->Laporan_model->getFilteredData();

    $this->load->view('admin/laporan_transaksi', $data);
  }

  // Menampilkan detail transaksi berdasarkan ID penjualan
  public function detail($id_penjualan) {
    $data['title'] = 'Detail Transaksi';

    // Ambil data detail transaksi dari model
    $detail = $this->Laporan_model->get_penjualan_detail($id_penjualan);

    // Jika tidak ditemukan, tampilkan halaman 404
    if (empty($detail)) {
      show_404();
    }

    // Hitung total harga dari semua item
    $total_harga = array_sum(array_column($detail, 'subtotal'));

    // Siapkan data transaksi utama
    $data['transaksi'] = [
      'tanggal'      => $detail[0]->tanggal,
      'username'     => $detail[0]->username,
      'total_harga'  => $total_harga,
      'total_bayar'  => $total_harga, // Asumsinya dibayar pas
      'kembalian'    => 0,
    ];

    // Siapkan data detail item yang dijual
    $data['detail'] = array_map(function($item) {
      return [
        'nama_barang' => $item->judul,
        'harga'       => $item->subtotal / max($item->jumlah, 1),
        'jumlah'      => $item->jumlah,
        'subtotal'    => $item->subtotal,
      ];
    }, $detail);

    // Tampilkan halaman detail transaksi
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar_admin');
    $this->load->view('admin/transaksi/detail', $data);
    $this->load->view('templates/footer');
  }
}
