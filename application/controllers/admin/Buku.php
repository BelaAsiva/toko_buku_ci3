<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('role') !== 'admin') {
            redirect('auth/login');
        }
        $this->load->model('Buku_model');
        $this->load->model('Kategori_model');
    }

    public function index() {
        $data['title'] = 'Data Buku';
        $data['buku'] = $this->Buku_model->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('admin/buku/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah() {
        $data['title'] = 'Tambah Buku';
        $data['kategori'] = $this->Kategori_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('admin/buku/form', $data);
        $this->load->view('templates/footer');
    }

    public function simpan() {
        $this->Buku_model->insert($this->input->post());
        redirect('admin/buku');
    }

    public function edit($id) {
        $data['title'] = 'Edit Buku';
        $data['buku'] = $this->Buku_model->getById($id);
        $data['kategori'] = $this->Kategori_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('admin/buku/form', $data);
        $this->load->view('templates/footer');
    }

    public function update($id) {
        $this->Buku_model->update($id, $this->input->post());
        redirect('admin/buku');
    }

    public function hapus($id) {
        $this->Buku_model->delete($id);
        redirect('admin/buku');
    }
}
