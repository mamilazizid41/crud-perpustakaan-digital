<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow">
        <div class="card-header bg-primary text-white">
          <h5 class="mb-0"><?= $mode === 'edit' ? 'Edit Buku' : 'Tambah Buku' ?></h5>
        </div>
        <div class="card-body">
          <form action="<?= $mode === 'edit' ? site_url('/buku/update/' . $buku['id']) : site_url('/buku/store') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="form-floating mb-3">
              <input type="text" name="judul" class="form-control" id="judul" placeholder="Judul Buku" value="<?= esc($buku['judul'] ?? '') ?>" required>
              <label for="judul">Judul Buku</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" name="penulis" class="form-control" id="penulis" placeholder="Penulis" value="<?= esc($buku['penulis'] ?? '') ?>" required>
              <label for="penulis">Penulis</label>
            </div>

            <div class="form-floating mb-3">
              <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Buku" id="deskripsi" style="height: 150px"><?= esc($buku['deskripsi'] ?? '') ?></textarea>
              <label for="deskripsi">Deskripsi</label>
            </div>
            <div class="mb-3">
              <label for="cover" class="form-label">Sampul Buku (Gambar)</label>
              <input type="file" class="form-control" name="cover" id="cover" accept="image/*">
              <?php if (!empty($buku['cover'])): ?>
                <small>File saat ini: <?= esc($buku['cover']) ?></small>
              <?php endif ?>
            </div>

            <div class="mb-3">
              <label for="file_pdf" class="form-label">File Buku (PDF)</label>
              <input type="file" class="form-control" name="file_pdf" id="file_pdf" accept="application/pdf">
              <?php if (!empty($buku['file_pdf'])): ?>
                <small>File saat ini: <?= esc($buku['file_pdf']) ?></small>
              <?php endif ?>
            </div>
            <div class="d-flex justify-content-between">
              <a href="<?= site_url('/buku/dashboard') ?>" class="btn btn-secondary">← Kembali</a>
              <button type="submit" class="btn btn-success"><?= $mode === 'edit' ? 'Perbarui' : 'Simpan' ?></button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>