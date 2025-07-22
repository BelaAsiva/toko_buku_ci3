<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6"><h3 class="mb-0">User Terdaftar</h3></div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active">User</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="app-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header">
              <a href="<?= site_url('admin/user/tambah') ?>" class="btn btn-success btn-sm">+ Tambah User</a>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th style="width: 150px;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; foreach ($users as $user): ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $user->username ?></td>
                      <td><?= ucfirst($user->role) ?></td>
                      <td>
                        <a href="<?= site_url('admin/user/edit/'.$user->id) ?>" class="btn btn-sm btn-warning">
                          <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="<?= site_url('admin/user/hapus/'.$user->id) ?>" onclick="return confirm('Hapus user ini?')" class="btn btn-sm btn-danger">
                          <i class="fas fa-trash"></i> Hapus
                        </a>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
