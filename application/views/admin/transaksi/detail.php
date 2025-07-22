<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4 shadow">
          <div class="card-header bg-white d-flex align-items-center border-bottom py-3 px-4">
            <h5 class="mb-0"><i class="bi bi-receipt-cutoff me-2"></i>Detail Transaksi</h5>
            <a href="<?= base_url('admin/transaksi') ?>" class="btn btn-sm btn-outline-secondary ms-auto">
              <i class="bi bi-arrow-left"></i> Kembali
            </a>
          </div>

          <div class="card-body px-4 py-4">
            <!-- Informasi Transaksi -->
            <div class="row mb-4">
              <div class="col-md-6">
                <h6 class="text-muted fw-semibold mb-3">🗂️ Informasi Transaksi</h6>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item px-0 py-1">🗓️ Tanggal: <strong><?= $transaksi['tanggal'] ?></strong></li>
                  <li class="list-group-item px-0 py-1">👤 Kasir: <strong><?= $transaksi['username'] ?></strong></li>
                  <li class="list-group-item px-0 py-1">💰 Total Harga: 
                    <strong class="text-success">Rp<?= number_format($transaksi['total_harga'], 0, ',', '.') ?></strong>
                  </li>
                  <li class="list-group-item px-0 py-1">🪙 Total Bayar: 
                    <strong>Rp<?= number_format($transaksi['total_bayar'], 0, ',', '.') ?></strong>
                  </li>
                  <li class="list-group-item px-0 py-1">🎁 Kembalian: 
                    <strong>Rp<?= number_format($transaksi['kembalian'], 0, ',', '.') ?></strong>
                  </li>
                </ul>
              </div>
            </div>

            <!-- Tabel Detail Barang -->
            <h6 class="text-muted fw-semibold mb-3">📦 Detail Barang</h6>
            <div class="table-responsive">
              <table class="table table-bordered table-hover align-middle">
                <thead class="table-light text-center">
                  <tr>
                    <th style="width: 5%;">No</th>
                    <th>Nama Barang</th>
                    <th style="width: 10%;">Jumlah</th>
                    <th style="width: 20%;">Harga</th>
                    <th style="width: 20%;">Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; foreach ($detail as $item): ?>
                    <tr>
                      <td class="text-center"><?= $no++ ?></td>
                      <td><?= $item['nama_barang'] ?></td>
                      <td class="text-center"><?= $item['jumlah'] ?></td>
                      <td class="text-end">Rp<?= number_format($item['harga'], 0, ',', '.') ?></td>
                      <td class="text-end">Rp<?= number_format($item['subtotal'], 0, ',', '.') ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="4" class="text-end">Total</th>
                    <th class="text-end text-success">Rp<?= number_format($transaksi['total_harga'], 0, ',', '.') ?></th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div> <!-- /.card-body -->
        </div>
      </div>
    </div>
  </div>
</section>
