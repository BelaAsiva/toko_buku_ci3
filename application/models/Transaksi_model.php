<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

    // Ambil semua penjualan + total_harga
    public function getAllPenjualan() {
        return $this->db->select('p.*, u.username, SUM(pd.subtotal) as total_harga')
                        ->from('penjualan p')
                        ->join('users u', 'u.id = p.user_id')
                        ->join('penjualan_detail pd', 'pd.penjualan_id = p.id')
                        ->group_by('p.id')
                        ->order_by('p.id', 'DESC')
                        ->get()->result();
    }

    // Ambil detail buku per penjualan
    public function getDetailByPenjualanId($penjualan_id) {
        return $this->db->select('pd.*, b.judul, b.harga')
                        ->from('penjualan_detail pd')
                        ->join('buku b', 'b.id = pd.buku_id')
                        ->where('pd.penjualan_id', $penjualan_id)
                        ->get()->result();
    }

    // Simpan transaksi baru
    public function simpan($data, $detail) {
        $this->db->insert('penjualan', $data);
        $penjualan_id = $this->db->insert_id();

        foreach ($detail as $item) {
            $item['penjualan_id'] = $penjualan_id;
            $this->db->insert('penjualan_detail', $item);

            // Kurangi stok buku
            $this->db->set('stok', 'stok - '.$item['jumlah'], FALSE)
                     ->where('id', $item['buku_id'])
                     ->update('buku');
        }

        return $penjualan_id;
    }

    // Ambil satu transaksi + detail
    public function getPenjualanWithDetail($id) {
        // Ambil transaksi utama
        $penjualan = $this->db->select('p.*, u.username')
                              ->from('penjualan p')
                              ->join('users u', 'u.id = p.user_id')
                              ->where('p.id', $id)
                              ->get()->row();

        if (!$penjualan) {
            return null;
        }

        // Ambil detail barang
        $detail = $this->getDetailByPenjualanId($id);

        // Hitung total
        $total_harga = 0;
        foreach ($detail as $item) {
            $total_harga += $item->subtotal;
        }

        return [
            'transaksi' => [
                'tanggal' => $penjualan->tanggal,
                'username' => $penjualan->username,
                'total_harga' => $total_harga,
                'total_bayar' => 0, // jika ingin ditambahkan dari input nantinya
                'kembalian' => 0    // jika ingin ditambahkan dari input nantinya
            ],
            'detail' => $detail
        ];
    }
}
