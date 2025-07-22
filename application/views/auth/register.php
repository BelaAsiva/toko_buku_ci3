<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Register | AdminLTE 4</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/dist/css/adminlte.css') ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css" />
</head>
<body class="register-page bg-body-secondary">
  <div class="register-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="#" class="h1"><b>Admin</b>LTE</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Register a new membership</p>

        <?php if ($this->session->flashdata('error')): ?>
          <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('success')): ?>
          <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
        <?php endif; ?>

        <form action="<?= base_url('auth/register') ?>" method="post">
          <div class="input-group mb-3">
            <input type="text" name="username" class="form-control" placeholder="Username" required>
            <div class="input-group-append">
              <div class="input-group-text"><span class="bi bi-person"></span></div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="password" name="password2" class="form-control" placeholder="Retype Password" required>
            <div class="input-group-append">
              <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
            </div>
          </div>

          <div class="input-group mb-3">
            <select name="role" class="form-control" required>
              <option value="">-- Pilih Role --</option>
              <option value="admin">Admin</option>
              <option value="kasir">Kasir</option>
            </select>
            <div class="input-group-append">
              <div class="input-group-text"><span class="bi bi-person-badge"></span></div>
            </div>
          </div>

          <div class="row mb-2">
            <div class="col-8">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" required>
                <label class="form-check-label">I agree to the <a href="#">terms</a></label>
              </div>
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
          </div>
        </form>

        <p class="mb-0 text-center">
          <a href="<?= base_url('auth/login') ?>" class="text-center">I already have a membership</a>
        </p>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"></script>
  <script src="<?= base_url('assets/adminlte/dist/js/adminlte.js') ?>"></script>

  <script>
      setTimeout(function () {
        let alert = document.querySelector('.alert');
        if (alert) {
          let bsAlert = new bootstrap.Alert(alert);
          bsAlert.close();
        }
      }, 3000); // 3000ms = 3 detik
    </script>
</body>
</html>
