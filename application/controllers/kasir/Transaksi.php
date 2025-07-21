<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model(['Buku_model', 'Transaksi_model']);
    if ($this->session->userdata('role') != 'kasir') {
      redirect('auth/login');
    }
  }

  public function index() {
    $data['buku'] = $this->Buku_model->get_all();
    $data['keranjang'] = $this->session->userdata('keranjang') ?? [];
    $this->load->view('templates/header');
    $this->load->view('kasir/transaksi_index', $data);
    $this->load->view('templates/footer');
  }

  public function tambah_keranjang() {
    $buku_id = $this->input->post('buku_id');
    $jumlah = $this->input->post('jumlah');
    $buku = $this->Buku_model->get_by_id($buku_id);

    $item = [
      'buku_id' => $buku_id,
      'judul' => $buku->judul,
      'harga' => $buku->harga,
      'jumlah' => $jumlah,
      'subtotal' => $buku->harga * $jumlah
    ];

    $keranjang = $this->session->userdata('keranjang') ?? [];
    $keranjang[] = $item;
    $this->session->set_userdata('keranjang', $keranjang);

    redirect('kasir/transaksi');
  }

  public function simpan_transaksi() {
    $keranjang = $this->session->userdata('keranjang');

    if (!$keranjang) redirect('kasir/transaksi');

    $penjualan_id = $this->Transaksi_model->simpan_penjualan($this->session->userdata('user_id'), $keranjang);
    $this->session->unset_userdata('keranjang');
    $this->session->set_flashdata('success', 'Transaksi berhasil disimpan');
    redirect('kasir/transaksi');
  }

  public function reset_keranjang() {
    $this->session->unset_userdata('keranjang');
    redirect('kasir/transaksi');
  }
}
