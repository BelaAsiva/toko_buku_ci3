<!-- <?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar_kasir'); ?> -->

<main class="app-main">
  <div class="app-content-header py-3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6"><h3 class="mb-0">Dashboard Kasir</h3></div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Kasir</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="app-content">
    <div class="container-fluid">
    <div class="row">
      <!-- Total Transaksi -->
      <div class="col-lg-3 col-6">
        <div class="small-box text-bg-primary">
          <div class="inner">
            <h3><?= $total_penjualan ?></h3>
            <p>Total Transaksi</p>
          </div>
          <i class="bi bi-cart-check-fill small-box-icon fs-1"></i>
        </div>
      </div>

      <!-- Transaksi Hari Ini -->
      <div class="col-lg-3 col-6">
        <div class="small-box text-bg-info">
          <div class="inner">
            <h3><?= $penjualan_hari_ini ?></h3>
            <p>Transaksi Hari Ini</p>
          </div>
          <i class="bi bi-calendar-check small-box-icon fs-1"></i>
        </div>
      </div>

      <!-- Total Pendapatan -->
      <div class="col-lg-3 col-6">
        <div class="small-box text-bg-success">
          <div class="inner">
            <h3>Rp <?= number_format($total_pendapatan, 0, ',', '.') ?></h3>
            <p>Pendapatan Hari Ini</p>
          </div>
          <i class="bi bi-cash-coin small-box-icon fs-1"></i>
        </div>
      </div>

      <!-- Stok Buku -->
      <div class="col-lg-3 col-6">
        <div class="small-box text-bg-warning">
          <div class="inner">
            <h3><?= $stok_buku ?></h3>
            <p>Total Stok Buku</p>
          </div>
          <i class="bi bi-book-half small-box-icon fs-1"></i>
        </div>
      </div>
    </div>


      <!-- Transaksi Terakhir -->
      <div class="row mt-4">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><h5>Transaksi Terakhir</h5></div>
            <div class="card-body table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($transaksi_terakhir as $i => $row): ?>
                  <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= date('d-m-Y H:i', strtotime($row->tanggal)) ?></td>
                    <td>Rp <?= number_format($row->total, 0, ',', '.') ?></td>
                  </tr>
                  <?php endforeach ?>
                  <?php if (empty($transaksi_terakhir)): ?>
                  <tr><td colspan="3" class="text-center">Belum ada transaksi</td></tr>
                  <?php endif ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</main>
<!-- <?php $this->load->view('templates/footer'); ?> -->