<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('role') !== 'admin') {
            redirect('auth/login');
        }
        $this->load->model('User_model'); // pastikan model ini ada
    }

    public function index() {
        $data['title'] = 'Data User';
        $data['users'] = $this->User_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('admin/user/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah() {
        $data['title'] = 'Tambah User';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('admin/user/form', $data);
        $this->load->view('templates/footer');
    }

    public function simpan()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role' => $this->input->post('role')
        ];

        $this->User_model->simpan($data); // Sesuaikan dengan nama model kamu
        redirect('admin/user');
    }


    public function edit($id) {
        $data['title'] = 'Edit User';
        $data['user'] = $this->User_model->getById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('admin/user/form', $data);
        $this->load->view('templates/footer');
    }

    public function update($id) {
        $this->User_model->update($id, $this->input->post());
        redirect('admin/user');
    }

    public function hapus($id) {
        $this->User_model->delete($id);
        redirect('admin/user');
    }
}
