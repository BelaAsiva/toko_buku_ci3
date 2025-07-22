<main class="app-main">
  <div class="app-content-header py-3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6"><h3 class="mb-0">Stok Buku</h3></div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="<?= base_url('kasir/dashboard') ?>">Kasir</a></li>
            <li class="breadcrumb-item active">Stok Buku</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="app-content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body table-responsive">
          <table class="table table-bordered table-striped">
            <thead class="table-dark">
              <tr>
                <th>ID</th>
                <th>Judul Buku</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Harga</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($buku as $i => $row): ?>
              <tr>
                <td><?= $i + 1 ?></td>
                <td><?= $row->judul ?></td>
                <td><?= $row->nama_kategori ?></td>
                <td><?= $row->stok ?></td>
                <td>Rp <?= number_format($row->harga, 0, ',', '.') ?></td>
              </tr>
              <?php endforeach ?>
              <?php if (empty($buku)): ?>
              <tr><td colspan="5" class="text-center">Tidak ada data buku</td></tr>
              <?php endif ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>
