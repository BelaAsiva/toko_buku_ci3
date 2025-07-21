<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  public function __construct() {
    parent::__construct();
    if ($this->session->userdata('role') !== 'kasir') {
      redirect('auth/login');
    }
    $this->load->model('Dashboard_model');
  }

  public function index() {
    $user_id = $this->session->userdata('id');
    
    $data['title'] = 'Dashboard Kasir';
    $data['total_penjualan'] = $this->Dashboard_model->count_penjualan_by_user($user_id);
    $data['total_pendapatan'] = $this->Dashboard_model->total_pendapatan_hari_ini($user_id);
    $data['stok_buku'] = $this->Dashboard_model->count_stok_buku();
    $data['transaksi_terakhir'] = $this->Dashboard_model->transaksi_terakhir($user_id);

    $this->load->view('kasir/dashboard', $data);
  }
}
