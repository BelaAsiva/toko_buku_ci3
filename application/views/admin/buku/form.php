<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6"><h1><?= isset($buku) ? 'Edit Buku' : 'Tambah Buku' ?></h1></div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Form Buku</h3>
            </div>
            <form action="<?= isset($buku) ? site_url('admin/buku/update/'.$buku->id) : site_url('admin/buku/simpan') ?>" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label>Judul</label>
                  <input type="text" name="judul" class="form-control" value="<?= isset($buku) ? $buku->judul : '' ?>" required>
                </div>
                <div class="form-group">
                  <label>Kategori</label>
                  <select name="kategori_id" class="form-control" required>
                    <option value="">-- Pilih --</option>
                    <?php foreach($kategori as $k): ?>
                      <option value="<?= $k->id ?>" <?= isset($buku) && $buku->kategori_id == $k->id ? 'selected' : '' ?>>
                        <?= $k->nama_kategori ?>
                      </option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Stok</label>
                  <input type="number" name="stok" class="form-control" value="<?= isset($buku) ? $buku->stok : '' ?>" required>
                </div>
                <div class="form-group">
                  <label>Harga</label>
                  <input type="number" name="harga" class="form-control" value="<?= isset($buku) ? $buku->harga : '' ?>" required>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary"><?= isset($buku) ? 'Update' : 'Simpan' ?></button>
                <a href="<?= site_url('admin/buku') ?>" class="btn btn-secondary">Batal</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
