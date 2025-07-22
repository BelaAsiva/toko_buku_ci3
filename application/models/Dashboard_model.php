<?php
class Dashboard_model extends CI_Model {

  // Jumlah transaksi penjualan oleh kasir tertentu
  public function count_penjualan_by_user($user_id) {
    return $this->db->where('user_id', $user_id)->count_all_results('penjualan');
  }

  // Jumlah transaksi hari ini oleh kasir tertentu
    public function count_penjualan_hari_ini_by_user($user_id) {
    $this->db->where('user_id', $user_id);
    $this->db->where('DATE(tanggal)', date('Y-m-d'));
    return $this->db->count_all_results('penjualan');
    } 

  // Total pendapatan hari ini oleh kasir tertentu
  public function total_pendapatan_hari_ini($user_id = null) {
    $this->db->select_sum('subtotal');
    $this->db->from('penjualan_detail');
    $this->db->join('penjualan', 'penjualan.id = penjualan_detail.penjualan_id');
    $this->db->where('DATE(penjualan.tanggal)', date('Y-m-d'));

    if ($user_id !== null) {
      $this->db->where('penjualan.user_id', $user_id);
    }

    $result = $this->db->get()->row();
    return $result->subtotal ?? 0;
  }

  // Jumlah total stok dari seluruh buku
  public function count_stok_buku() {
    $this->db->select_sum('stok');
    $query = $this->db->get('buku');
    $row = $query->row();
    return $row ? $row->stok : 0;
    }

  // Menampilkan transaksi terakhir oleh kasir
  public function transaksi_terakhir($user_id, $limit = 5) {
    $this->db->select('p.id, p.tanggal, SUM(pd.subtotal) as total');
    $this->db->from('penjualan p');
    $this->db->join('penjualan_detail pd', 'p.id = pd.penjualan_id');
    $this->db->where('p.user_id', $user_id);
    $this->db->group_by('p.id');
    $this->db->order_by('p.tanggal', 'DESC');
    $this->db->limit($limit);

    return $this->db->get()->result();
  }

  public function get_statistik_penjualan() {
      return $this->db->query("
          SELECT DATE(tanggal) AS tanggal, SUM(total_harga) AS total
          FROM penjualan
          GROUP BY DATE(tanggal)
          ORDER BY tanggal ASC
      ")->result();
  }

  public function get_kategori_terpopuler() {
      $this->db->select('kategori.nama_kategori, COUNT(*) as total_terjual');
      $this->db->from('penjualan_detail');
      $this->db->join('buku', 'buku.id = penjualan_detail.buku_id');
      $this->db->join('kategori', 'kategori.id = buku.kategori_id');
      $this->db->group_by('kategori.id');
      $this->db->order_by('total_terjual', 'DESC');
      $this->db->limit(5);

      return $this->db->get()->result_array();
  }

  public function get_penjualan_bulanan() {
      $this->db->select("DATE_FORMAT(tanggal, '%b %Y') AS bulan, SUM(total_harga) AS total");
      $this->db->from('penjualan');
      $this->db->group_by("DATE_FORMAT(tanggal, '%Y-%m')");
      $this->db->order_by("MIN(tanggal)", "ASC");

      return $this->db->get()->result_array();
  }

}
