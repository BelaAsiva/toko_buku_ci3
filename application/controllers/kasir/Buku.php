<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

  public function __construct() {
    parent::__construct();
    if ($this->session->userdata('role') !== 'kasir') {
      redirect('auth/login');
    }
    $this->load->model('Buku_model');
  }

  public function index() {
    $data['title'] = 'Stok Buku';
    $data['buku'] = $this->Buku_model->getAll();

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar_kasir');
    $this->load->view('kasir/buku/index', $data);
    $this->load->view('templates/footer');
  }
}
