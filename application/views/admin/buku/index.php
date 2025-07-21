<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6"><h3 class="mb-0">Data Buku</h3></div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active">Data Buku</li>
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
              <a href="<?= site_url('admin/buku/tambah') ?>" class="btn btn-success btn-sm">+ Tambah Buku</a>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th style="width: 150px;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; foreach ($buku as $row): ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $row->judul ?></td>
                      <td><?= $row->nama_kategori ?></td>
                      <td><?= $row->stok ?></td>
                      <td><?= number_format($row->harga, 0, ',', '.') ?></td>
                      <td>
                        <a href="<?= site_url('admin/buku/edit/'.$row->id) ?>" 
                            class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="<?= site_url('admin/buku/hapus/'.$row->id) ?>"
                            onclick="return confirm('Hapus data ini?')" 
                            class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>Hapus
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
