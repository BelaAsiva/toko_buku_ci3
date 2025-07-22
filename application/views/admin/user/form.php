<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6"><h1><?= isset($user) ? 'Edit User' : 'Tambah User' ?></h1></div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Form User</h3>
            </div>
            <form action="<?= isset($user) ? site_url('user/update/'.$user->id) : site_url('user/simpan') ?>" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control" value="<?= isset($user) ? $user->username : '' ?>" required>
                </div>
                <div class="form-group">
                  <label>Password <?= isset($user) ? '(Kosongkan jika tidak diubah)' : '' ?></label>
                  <input type="password" name="password" class="form-control" <?= isset($user) ? '' : 'required' ?>>
                </div>
                <div class="form-group">
                  <label>Role</label>
                  <select name="role" class="form-control" required>
                    <option value="">-- Pilih --</option>
                    <option value="admin" <?= isset($user) && $user->role == 'admin' ? 'selected' : '' ?>>Admin</option>
                    <option value="kasir" <?= isset($user) && $user->role == 'kasir' ? 'selected' : '' ?>>Kasir</option>
                  </select>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary"><?= isset($user) ? 'Update' : 'Simpan' ?></button>
                <a href="<?= site_url('user') ?>" class="btn btn-secondary">Batal</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
