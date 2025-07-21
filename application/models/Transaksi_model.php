<?php
class Transaksi_model extends CI_Model {
  public function simpan_penjualan($user_id, $keranjang) {
    $this->db->trans_start();

    $this->db->insert('penjualan', ['user_id' => $user_id]);
    $penjualan_id = $this->db->insert_id();

    foreach ($keranjang as $item) {
      $data = [
        'penjualan_id' => $penjualan_id,
        'buku_id' => $item['buku_id'],
        'jumlah' => $item['jumlah'],
        'subtotal' => $item['subtotal']
      ];
      $this->db->insert('penjualan_detail', $data);

      // kurangi stok buku
      $this->db->set('stok', 'stok - '.$item['jumlah'], FALSE);
      $this->db->where('id', $item['buku_id']);
      $this->db->update('buku');
    }

    $this->db->trans_complete();
    return $penjualan_id;
  }
}
