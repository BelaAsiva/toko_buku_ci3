<?php
class Laporan_model extends CI_Model {

  // Ambil semua data user yang berperan sebagai kasir
  public function get_all_kasir() {
    $this->db->select('id, username');
    return $this->db->get_where('users', ['role' => 'kasir'])->result();
  }

  // Ambil data penjualan dengan filter opsional berdasarkan tanggal dan kasir
  public function get_filtered_penjualan($tanggal = null, $kasir = null) {
      $this->db->select('
          penjualan.id as id_penjualan,
          penjualan.tanggal as tanggal_penjualan,
          users.username as nama_kasir,
          SUM(penjualan_detail.subtotal) as total_harga
      ');
      $this->db->from('penjualan');
      $this->db->join('users', 'users.id = penjualan.user_id');
      $this->db->join('penjualan_detail', 'penjualan_detail.penjualan_id = penjualan.id');
      if ($tanggal) {
          $this->db->like('DATE(penjualan.tanggal)', $tanggal);
      }
      if ($kasir) {
          $this->db->where('users.id', $kasir);
      }
      $this->db->group_by('penjualan.id');
      return $this->db->get()->result();
  }


  // Ambil detail penjualan berdasarkan ID penjualan
  public function get_penjualan_detail($penjualan_id) {
    $this->db->select('pd.*, b.judul, p.tanggal, u.username');
    $this->db->from('penjualan_detail pd');
    $this->db->join('buku b', 'b.id = pd.buku_id');
    $this->db->join('penjualan p', 'p.id = pd.penjualan_id');
    $this->db->join('users u', 'u.id = p.user_id');
    $this->db->where('pd.penjualan_id', $penjualan_id);
    return $this->db->get()->result();
  }
}
