<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        // Cek jika bukan admin, redirect ke login
        if ($this->session->userdata('role') !== 'admin') {
            redirect('auth/login');
        }

        // Load model Kategori
        $this->load->model('Kategori_model');
        // Load helper form dan library form_validation jika belum
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = 'Data Kategori';
        $data['kategori'] = $this->Kategori_model->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('admin/kategori/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah() {
        $data['title'] = 'Tambah Kategori';

        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin');
            $this->load->view('admin/kategori/form', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Kategori_model->insert([
                'nama_kategori' => $this->input->post('nama_kategori', true)
            ]);
            redirect('admin/kategori');
        }
    }

    public function edit($id) {
        $data['title'] = 'Edit Kategori';
        $data['kategori'] = $this->Kategori_model->getById($id);

        if (!$data['kategori']) {
            show_404();
        }

        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin');
            $this->load->view('admin/kategori/form', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Kategori_model->update($id, [
                'nama_kategori' => $this->input->post('nama_kategori', true)
            ]);
            redirect('admin/kategori');
        }
    }


    public function hapus($id) {
        $this->Kategori_model->delete($id);
        redirect('admin/kategori');
    }
}
