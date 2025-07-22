<?php
class Laporan_model extends CI_Model {

  // Ambil semua user dengan role kasir
  public function get_all_kasir() {
    $this->db->select('id, username');
    return $this->db->get_where('users', ['role' => 'kasir'])->result();
  }

  // Ambil data penjualan yang difilter berdasarkan tanggal dan kasir (opsional)
  public function get_filtered_penjualan($tanggal = null, $kasir = null) {
    $this->db->select('
      p.id AS id_penjualan,
      p.tanggal AS tanggal_penjualan,
      u.username AS nama_kasir,
      SUM(pd.subtotal) AS total_harga
    ');
    $this->db->from('penjualan p');
    $this->db->join('users u', 'u.id = p.user_id');
    $this->db->join('penjualan_detail pd', 'pd.penjualan_id = p.id');

    if (!empty($tanggal)) {
      $this->db->like('DATE(p.tanggal)', $tanggal); // fleksibel cari tanggal
    }

    if (!empty($kasir)) {
      $this->db->where('u.id', $kasir); // filter berdasarkan kasir
    }

    $this->db->group_by('p.id, p.tanggal, u.username');
    $this->db->order_by('p.tanggal', 'DESC');

    return $this->db->get()->result();
  }

  // Ambil detail penjualan berdasarkan ID penjualan
  public function get_penjualan_detail($penjualan_id) {
      $this->db->select('
          penjualan_detail.jumlah,
          penjualan_detail.subtotal,
          buku.judul,
          penjualan.tanggal,
          users.username
      ');
      $this->db->from('penjualan_detail');
      $this->db->join('buku', 'buku.id = penjualan_detail.buku_id');
      $this->db->join('penjualan', 'penjualan.id = penjualan_detail.penjualan_id');
      $this->db->join('users', 'users.id = penjualan.user_id');
      $this->db->where('penjualan_detail.penjualan_id', $penjualan_id);
      return $this->db->get()->result();
  }

}
