<?php
// File: app/Views/buku/index.php
?>
<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container py-5">
  <h2 class="mb-4">Daftar Buku</h2>

  <form method="get" class="mb-4">
    <div class="input-group">
      <input type="text" name="search" value="<?= esc($keyword) ?>" class="form-control" placeholder="Cari judul atau penulis">
      <button class="btn btn-primary" type="submit">Cari</button>
    </div>
  </form>

  <div class="row g-4">
    <?php foreach ($buku as $item): ?>
      <div class="col-md-4">
        <div class="card h-100">
          <?php if (!empty($item['cover'])): ?>
            <img src="<?= base_url('uploads/covers/' . $item['cover']) ?>" class="card-img-top" alt="<?= esc($item['judul']) ?>">
          <?php endif; ?>
          <div class="card-body">
            <h5 class="card-title"><?= esc($item['judul']) ?></h5>
            <p class="card-text text-muted">Penulis: <?= esc($item['penulis']) ?></p>
            <a href="<?= site_url('/buku/detail/' . $item['id']) ?>" class="btn btn-outline-primary">Detail</a>
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