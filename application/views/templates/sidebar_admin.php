<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
  <!--begin::Sidebar Brand-->
  <div class="sidebar-brand">
    <a href="<?= base_url('admin/dashboard') ?>" class="brand-link">
      <span class="brand-text fw-light">Toko Buku</span>
    </a>
  </div>
  <!--end::Sidebar Brand-->

  <!--begin::Sidebar Wrapper-->
  <div class="sidebar-wrapper flex-grow-1 overflow-auto" style="height: 100vh;">
    <nav class="mt-2">
      <ul class="nav sidebar-menu flex-column d-flex" style="height: 90vh;" data-lte-toggle="treeview" role="menu" data-accordion="false">

        <!-- Dashboard -->
        <li class="nav-item menu-open">
          <a href="<?= base_url('admin/dashboard') ?>" class="nav-link active">
            <i class="nav-icon bi bi-speedometer"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <!-- Manajemen Buku -->
        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-book"></i>
            <p>
              Manajemen Buku
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('admin/buku') ?>" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>Data Buku</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/kategori') ?>" class="nav-link">
                <i class="nav-icon fas fa-tags"></i>
                <p>Kategori</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Transaksi -->
        <li class="nav-item">
          <a href="<?= base_url('admin/transaksi') ?>" class="nav-link">
            <i class="nav-icon bi bi-cash-coin"></i>
            <p>Transaksi</p>
          </a>
        </li>

        <!-- Logout -->
        <li class="nav-item mt-auto">
          <a href="<?= base_url('auth/logout') ?>" class="btn btn-danger w-100">
            <i class="bi bi-box-arrow-right me-1"></i> Logout
          </a>
        </li>

      </ul>
    </nav>
  </div>
  <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->
