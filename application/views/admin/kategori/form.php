<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6"><h1><?= isset($kategori) ? 'Edit Kategori' : 'Tambah Kategori' ?></h1></div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Form Kategori</h3>
            </div>
            <form action="<?= isset($kategori) ? site_url('admin/kategori/edit/'.$kategori->id) : site_url('admin/kategori/tambah') ?>" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label>Nama Kategori</label>
                  <input type="text" name="nama_kategori" class="form-control" value="<?= isset($kategori) ? $kategori->nama_kategori : '' ?>" required>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary"><?= isset($kategori) ? 'Update' : 'Simpan' ?></button>
                <a href="<?= site_url('admin/kategori') ?>" class="btn btn-secondary">Batal</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
