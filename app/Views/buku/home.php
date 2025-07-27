<?php
// File: app/Views/buku/home.php
?>
<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container py-5">
  <h2 class="mb-4">Selamat Datang di Perpustakaan Digital</h2>

  <div class="row g-4">
    <?php foreach ($buku as $item): ?>
      <div class="col-md-3">
        <div class="card h-100 shadow-sm">
          <?php if (!empty($item['cover'])): ?>
            <img src="<?= base_url('uploads/covers/' . $item['cover']) ?>" class="card-img-top" alt="<?= esc($item['judul']) ?>">
          <?php endif; ?>
          <div class="card-body">
            <h5 class="card-title text-truncate"><?= esc($item['judul']) ?></h5>
            <p class="card-text small text-muted">Penulis: <?= esc($item['penulis']) ?></p>
            <a href="<?= site_url('/buku/detail/' . $item['id']) ?>" class="btn btn-sm btn-outline-primary">Lihat Detail</a>
          </div>
        </div>
      </div>
    <?php endforeach ?>
  </div>

  <div class="mt-4">
    <?= $pager->links('buku', 'bootstrap') ?>
  </div>
</div>

<?= $this->endSection() ?>