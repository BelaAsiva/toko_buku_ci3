<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6"><h3 class="mb-0">Transaksi Baru</h3></div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="<?= site_url('kasir/dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Tambah Transaksi</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="app-content">
    <div class="container-fluid">
      <div class="card card-primary">
        <div class="card-header">
          <h5 class="card-title">Form Transaksi</h5>
        </div>
        <form action="<?= site_url('kasir/transaksi/simpan') ?>" method="post">
          <div class="card-body">
            <div class="form-group">
              <label for="buku">Pilih Buku</label>
              <select name="buku_id" class="form-control" required>
                <option value="">-- Pilih Buku --</option>
                <?php foreach ($buku as $b): ?>
                  <option value="<?= $b->id ?>"><?= $b->judul ?> - Rp <?= number_format($b->harga, 0, ',', '.') ?></option>
                <?php endforeach ?>
              </select>
            </div>

            <div class="form-group">
              <label>Jumlah</label>
              <input type="number" name="jumlah" class="form-control" required min="1">
            </div>

            <div class="form-group">
              <label>Total Bayar</label>
              <input type="number" name="total_bayar" class="form-control" required min="0">
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= site_url('kasir/transaksi') ?>" class="btn btn-secondary">Batal</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>
