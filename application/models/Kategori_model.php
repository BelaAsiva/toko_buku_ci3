<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

    // Ambil semua data kategori
    public function getAll() {
        return $this->db->get('kategori')->result();
    }

    // Ambil data kategori berdasarkan ID
    public function getById($id) {
        return $this->db->get_where('kategori', ['id' => $id])->row();
    }

    // Tambah data kategori
    public function insert($data) {
        return $this->db->insert('kategori', $data);
    }

    // Update data kategori berdasarkan ID
    public function update($id, $data) {
        return $this->db->where('id', $id)->update('kategori', $data);
    }

    // Hapus data kategori berdasarkan ID
    public function delete($id) {
        return $this->db->delete('kategori', ['id' => $id]);
    }
}
