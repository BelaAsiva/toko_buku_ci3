<!-- Load Header dan Sidebar -->
<!-- <?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar_admin'); ?> -->

<!--begin::App Main-->
<main class="app-main">
  <!--begin::App Content Header-->
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6"><h3 class="mb-0">Dashboard</h3></div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!--end::App Content Header-->

  <!--begin::App Content-->
  <div class="app-content">
    <div class="container-fluid">
      <div class="row">
        <!-- Total Buku -->
        <div class="col-lg-3 col-6">
          <div class="small-box text-bg-primary">
            <div class="inner">
              <h3><?= $total_buku ?></h3>
              <p>Total Buku</p>
            </div>
            <i class="bi bi-book-half small-box-icon fs-1"></i>
            <a href="<?= base_url('admin/buku') ?>" class="small-box-footer text-light">More info <i class="bi bi-link-45deg"></i></a>
          </div>
        </div>

        <!-- Total Kategori -->
        <div class="col-lg-3 col-6">
          <div class="small-box text-bg-success">
            <div class="inner">
              <h3><?= $total_kategori ?></h3>
              <p>Kategori Buku</p>
            </div>
            <i class="bi bi-tags small-box-icon fs-1"></i>
            <a href="<?= base_url('admin/kategori') ?>" class="small-box-footer text-light">More info <i class="bi bi-link-45deg"></i></a>
          </div>
        </div>

        <!-- Total Transaksi -->
        <div class="col-lg-3 col-6">
          <div class="small-box text-bg-warning">
            <div class="inner">
              <h3><?= $total_transaksi ?></h3>
              <p>Transaksi</p>
            </div>
            <i class="bi bi-cash-coin small-box-icon fs-1"></i>
            <a href="<?= base_url('admin/transaksi') ?>" class="small-box-footer text-dark">More info <i class="bi bi-link-45deg"></i></a>
          </div>
        </div>

        <!-- Total User -->
        <div class="col-lg-3 col-6">
          <div class="small-box text-bg-danger">
            <div class="inner">
              <h3><?= $total_user ?></h3>
              <p>User Terdaftar</p>
            </div>
            <i class="bi bi-person-check-fill small-box-icon fs-1"></i>
            <a href="<?= base_url('admin/user') ?>" class="small-box-footer text-light">More info <i class="bi bi-link-45deg"></i></a>
          </div>
        </div>
      </div>

      <!-- Grafik & Statistik -->
      <div class="row">
        <div class="col-lg-7 connectedSortable">
          <div class="card mb-4">
            <div class="card-header"><h3 class="card-title">Statistik Penjualan</h3></div>
            <div class="card-body">
              <div id="revenue-chart"></div>
            </div>
          </div>
        </div>

        <div class="col-lg-5 connectedSortable">
          <div class="card text-white bg-primary bg-gradient border-primary mb-4">
            <div class="card-header border-0">
              <h3 class="card-title">Kategori Populer</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-primary btn-sm" data-lte-toggle="card-collapse">
                  <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                  <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div id="world-map" style="height: 220px"></div>
            </div>
            <div class="card-footer border-0">
              <div class="row text-center">
                <div class="col-4">
                  <div id="sparkline-1" class="text-dark"></div>
                  <div class="text-white">Novel</div>
                </div>
                <div class="col-4">
                  <div id="sparkline-2" class="text-dark"></div>
                  <div class="text-white">Komik</div>
                </div>
                <div class="col-4">
                  <div id="sparkline-3" class="text-dark"></div>
                  <div class="text-white">Pelajaran</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!--end::App Content-->
</main>

<!-- <?php $this->load->view('templates/footer'); ?> -->
