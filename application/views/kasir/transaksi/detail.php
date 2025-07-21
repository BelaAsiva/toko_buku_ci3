<main class="app-main mt-3"">
  <div class="app-content-header mt-3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6"><h3 class="mb-0">Detail Transaksi</h3></div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="<?= site_url('admin/transaksi/laporan') ?>">Laporan</a></li>
            <li class="breadcrumb-item active">Detail</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="app-content">
    <div class="container-fluid">
      <div class="card mb-4">
        <div class="card-header">
          <strong>Invoice:</strong> <?= $transaksi->invoice ?><br>
          <strong>Nama:</strong> <?= $transaksi->nama_pelanggan ?><br>
          <strong>Tanggal:</strong> <?= date('d-m-Y', strtotime($transaksi->tanggal)) ?><br>
          <strong>Status:</strong> <?= ucfirst($transaksi->status) ?>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Subtotal</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; $total = 0; foreach ($detail as $row): 
                $subtotal = $row->jumlah * $row->harga;
                $total += $subtotal;
              ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $row->judul_buku ?></td>
                  <td><?= $row->jumlah ?></td>
                  <td>Rp <?= number_format($row->harga, 0, ',', '.') ?></td>
                  <td>Rp <?= number_format($subtotal, 0, ',', '.') ?></td>
                </tr>
              <?php endforeach ?>
              <tr>
                <th colspan="4" class="text-end">Total</th>
                <th>Rp <?= number_format($total, 0, ',', '.') ?></th>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>
