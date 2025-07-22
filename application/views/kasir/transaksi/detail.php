<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6"><h3 class="mb-0">Detail Transaksi</h3></div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="<?= site_url('kasir/dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Detail Transaksi</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="app-content">
    <div class="container-fluid">
      <div class="card mb-4 shadow">
        <div class="card-body">
          <ul class="list-group mb-4">
            <li class="list-group-item">🗓️ Tanggal: <strong><?= $transaksi['tanggal'] ?></strong></li>
            <li class="list-group-item">👤 Kasir: <strong><?= $transaksi['username'] ?></strong></li>
            <li class="list-group-item">💰 Total Harga: <strong class="text-success">Rp<?= number_format($transaksi['total_harga'], 0, ',', '.') ?></strong></li>
            <li class="list-group-item">🪙 Bayar: <strong>Rp<?= number_format($transaksi['total_bayar'], 0, ',', '.') ?></strong></li>
            <li class="list-group-item">🎁 Kembalian: <strong>Rp<?= number_format($transaksi['kembalian'], 0, ',', '.') ?></strong></li>
          </ul>

          <h6 class="text-muted mb-3">📦 Rincian Barang</h6>
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead class="table-light text-center">
                <tr>
                  <th>No</th>
                  <th>Judul Buku</th>
                  <th>Jumlah</th>
                  <th>Harga</th>
                  <th>Subtotal</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach ($detail as $d): ?>
                  <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td><?= $d->judul ?></td>
                    <td class="text-center"><?= $d->jumlah ?></td>
                    <td class="text-end">Rp<?= number_format($d->harga, 0, ',', '.') ?></td>
                    <td class="text-end">Rp<?= number_format($d->subtotal, 0, ',', '.') ?></td>
                  </tr>
                <?php endforeach ?>
              </tbody>
              <tfoot>
                <tr>
                  <th colspan="4" class="text-end">Total</th>
                  <th class="text-end text-success">Rp<?= number_format($transaksi['total_harga'], 0, ',', '.') ?></th>
                </tr>
              </tfoot>
            </table>
          </div>

          <a href="<?= site_url('kasir/transaksi') ?>" class="btn btn-sm btn-outline-secondary mt-3">← Kembali</a>
        </div>
      </div>
    </div>
  </div>
</main>
