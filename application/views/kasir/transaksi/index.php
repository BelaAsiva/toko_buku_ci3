<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="mb-0">Daftar Transaksi</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="<?= site_url('kasir/dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Transaksi</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="app-content">
    <div class="container-fluid">
      <div class="card mb-4">
        <div class="card-header">
          <a href="<?= site_url('kasir/transaksi/tambah') ?>" class="btn btn-primary btn-sm">+ Transaksi Baru</a>
        </div>

        <div class="card-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Kasir</th>
                <th>Total</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($transaksi)): ?>
                <?php $no = 1; foreach ($transaksi as $row): ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= date('d-m-Y H:i', strtotime($row->tanggal)) ?></td>
                    <td><?= $row->username ?></td>
                    <td>Rp <?= number_format($row->total_harga, 0, ',', '.') ?></td>
                    <td>
                      <a href="<?= site_url('kasir/transaksi/detail/'.$row->id) ?>" class="btn btn-sm btn-info">
                        <i class="fas fa-eye"></i> Detail
                      </a>
                    </td>
                  </tr>
                <?php endforeach ?>
              <?php else: ?>
                <tr>
                  <td colspan="5" class="text-center">Belum ada transaksi.</td>
                </tr>
              <?php endif ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>
