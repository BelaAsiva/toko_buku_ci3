<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="mb-0">Laporan Transaksi</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="<?= site_url('admin/dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Laporan Transaksi</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="app-content">
    <div class="container-fluid">
      <div class="card mb-4">
        <div class="card-header">
          <form class="row g-3" method="get" action="<?= site_url('admin/transaksi') ?>">
            <div class="col-md-4">
              <input type="date" name="tanggal" class="form-control" value="<?= set_value('tanggal', $this->input->get('tanggal')) ?>">
            </div>
            <div class="col-md-4">
              <select name="kasir" class="form-control">
                <option value="">-- Pilih Kasir --</option>
                <?php foreach ($kasir as $user): ?>
                  <option value="<?= $user->username ?>" <?= $this->input->get('kasir') == $user->username ? 'selected' : '' ?>>
                    <?= $user->username ?>
                  </option>
                <?php endforeach ?>
              </select>
            </div>

            <div class="col-md-4">
              <button class="btn btn-primary" type="submit">Filter</button>
              <a href="<?= site_url('admin/transaksi') ?>" class="btn btn-secondary">Reset</a>
            </div>
          </form>
        </div>

        <div class="card-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Kasir</th>
                <th>Total</th>
                <th style="width: 120px;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($penjualan)): ?>
                <?php $no = 1; foreach ($penjualan as $row): ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= date('d-m-Y', strtotime($row->tanggal_penjualan)) ?></td>
                    <td><?= $row->nama_kasir ?></td>
                    <td>Rp <?= number_format($row->total_harga, 0, ',', '.') ?></td>
                    <td>
                      <a href="<?= site_url('admin/transaksi/detail/'.$row->id_penjualan) ?>" class="btn btn-sm btn-info">
                        <i class="fas fa-eye"></i> Detail
                      </a>
                    </td>
                  </tr>
                <?php endforeach ?>
              <?php else: ?>
                <tr>
                  <td colspan="5" class="text-center">Tidak ada transaksi ditemukan.</td>
                </tr>
              <?php endif ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>
