<?php
class Buku_model extends CI_Model {
    public function getAll() {
        return $this->db->select('b.*, k.nama_kategori')
                        ->from('buku b')
                        ->join('kategori k', 'k.id = b.kategori_id')
                        ->get()->result();
    }

    public function getById($id) {
        return $this->db->get_where('buku', ['id' => $id])->row();
    }

    public function insert($data) {
        $this->db->insert('buku', [
            'judul' => $data['judul'],
            'kategori_id' => $data['kategori_id'],
            'stok' => $data['stok'],
            'harga' => $data['harga']
        ]);
    }

    public function update($id, $data) {
        $this->db->where('id', $id)->update('buku', [
            'judul' => $data['judul'],
            'kategori_id' => $data['kategori_id'],
            'stok' => $data['stok'],
            'harga' => $data['harga']
        ]);
    }

    public function delete($id) {
        $this->db->delete('buku', ['id' => $id]);
    }
}
