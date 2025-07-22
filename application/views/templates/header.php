<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />

    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="Toko Buku | Dashboard" />
    <meta name="author" content="TokoBuku DevTeam" />
    <meta name="description" content="Dashboard Admin Toko Buku menggunakan AdminLTE Bootstrap 5" />
    <meta name="keywords" content="admin dashboard, toko buku, codeigniter 3, adminlte" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" crossorigin="anonymous" />

    <!-- OverlayScrollbars -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css" crossorigin="anonymous" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" crossorigin="anonymous" />

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/dist/css/adminlte.css'); ?>" />

    <!-- ApexCharts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" crossorigin="anonymous" />

    <!-- JSVectorMap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css" crossorigin="anonymous" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/favicon.ico'); ?>" type="image/x-icon" />
  </head>

  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
      <!-- Navbar Start -->
      <nav class="app-header navbar navbar-expand bg-body">
        <div class="container-fluid">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                <i class="bi bi-list"></i>
              </a>
            </li>
            <li class="nav-item d-none d-md-block">
              <a href="<?= base_url(); ?>" class="nav-link">Home</a>
            </li>
          </ul>

          <!-- Right navbar links -->
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="bi bi-search"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
              </a>
            </li>

            <li class="nav-item dropdown user-menu">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img src="<?= base_url('assets/adminlte/dist/assets/img/user.jpg') ?>" class="user-image rounded-circle shadow" alt="User Image" />
                <span class="d-none d-md-inline">
                  <?= $this->session->userdata('username'); ?>
                </span>
              </a>
              <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <li class="user-header text-bg-primary">
                  <img src="<?= base_url('assets/adminlte/dist/assets/img/user.jpg') ?>" class="rounded-circle shadow" alt="User Image" />
                  <p>
                    <?= $this->session->userdata('username'); ?><br />
                    <small><?= ucfirst($this->session->userdata('role')); ?> Toko Buku</small>
                  </p>
                </li>
                <li class="user-footer">
                  <a href="<?= base_url('profile'); ?>" class="btn btn-default btn-flat">Profile</a>
                  <a href="<?= base_url('auth/logout'); ?>" class="btn btn-danger btn-flat float-end">Sign out</a>
                </li>
              </ul>
            </li>

          </ul>
        </div>
      </nav>
      <!-- Navbar End -->

      <!-- JS Dependencies -->
      <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
      <script src="<?= base_url('assets/adminlte/dist/js/adminlte.js'); ?>"></script>

      <!-- OverlayScrollbars Config -->
      <script>
        document.addEventListener('DOMContentLoaded', function () {
          const sidebarWrapper = document.querySelector('.sidebar-wrapper');
          if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
            OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
              scrollbars: {
                theme: 'os-theme-light',
                autoHide: 'leave',
                clickScroll: true,
              },
            });
          }

          // Sidebar toggle
          const toggleBtn = document.querySelector('[data-lte-toggle="sidebar"]');
          const sidebar = document.querySelector('.main-sidebar');
          if (toggleBtn && sidebar) {
            toggleBtn.addEventListener('click', function (e) {
              e.preventDefault();
              sidebar.classList.toggle('d-none');
            });
          }
        });
      </script>

      <style>
        .main-sidebar {
          transition: all 0.3s ease-in-out;
        }
      </style>
