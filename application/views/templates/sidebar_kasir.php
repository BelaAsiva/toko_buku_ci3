<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
  <div class="sidebar-brand">
    <a href="<?= base_url('kasir/dashboard') ?>" class="brand-link">
      <span class="brand-text fw-light">Toko Buku</span>
    </a>
  </div>

  <div class="sidebar-wrapper flex-grow-1 overflow-auto" style="height: 100vh;">
    <nav class="mt-2">
      <ul class="nav sidebar-menu flex-column d-flex" style="height: 90vh;" data-lte-toggle="treeview">

        <li class="nav-item">
          <a href="<?= base_url('kasir/dashboard') ?>" class="nav-link active">
            <i class="nav-icon bi bi-speedometer"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('kasir/transaksi') ?>" class="nav-link">
            <i class="nav-icon bi bi-cart-plus"></i>
            <p>Transaksi</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('kasir/buku') ?>" class="nav-link">
            <i class="nav-icon bi bi-book"></i>
            <p>Stok Buku</p>
          </a>
        </li>

        <li class="nav-item mt-auto">
          <a href="<?= base_url('auth/logout') ?>" class="btn btn-danger w-100">
            <i class="bi bi-box-arrow-right me-1"></i> Logout
          </a>
        </li>

      </ul>
    </nav>
  </div>
</aside>
