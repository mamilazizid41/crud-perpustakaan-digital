<?php
// File: app/Views/buku/detail.php
?>
<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card shadow-lg border-0">
        <div class="row g-0">
          <?php if (!empty($buku['cover'])): ?>
            <div class="col-md-4">
              <img src="<?= base_url('uploads/covers/' . $buku['cover']) ?>" class="img-fluid rounded-start" alt="<?= esc($buku['judul']) ?>">
            </div>
          <?php endif; ?>
          <div class="col-md-8">
            <div class="card-body">
              <h4 class="card-title"><?= esc($buku['judul']) ?></h4>
              <p class="text-muted mb-2">Penulis: <strong><?= esc($buku['penulis']) ?></strong></p>
              <p class="card-text"><?= nl2br(esc($buku['deskripsi'])) ?></p>

              <?php if (!empty($buku['file_pdf'])): ?>
                <a href="<?= base_url('uploads/pdfs/' . $buku['file_pdf']) ?>" target="_blank" class="btn btn-outline-primary mt-3">
                  📄 Unduh Buku PDF
                </a>
              <?php endif; ?>
              <a href="<?= site_url('/') ?>" class="btn btn-secondary mt-3">← Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>