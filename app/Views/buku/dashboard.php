<?php
// File: app/Views/buku/dashboard.php
?>
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container">
  <h2 class="mb-4">Dashboard Buku</h2>

  <div class="row mb-4">
    <div class="col-md-4">
      <div class="card text-bg-primary">
        <div class="card-body">
          <h5 class="card-title">Total Buku</h5>
          <p class="card-text display-6"><?= esc($total_buku) ?></p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card text-bg-success">
        <div class="card-body">
          <h5 class="card-title">Penulis Unik</h5>
          <p class="card-text display-6"><?= esc($penulis_unik) ?></p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card text-bg-warning">
        <div class="card-body">
          <h5 class="card-title">Jumlah Karakter Deskripsi</h5>
          <p class="card-text display-6"><?= esc($jumlah_karakter) ?></p>
        </div>
      </div>
    </div>
  </div>

  <div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
      <span>Daftar Buku Terbaru</span>
      <a href="<?= site_url('/buku/create') ?>" class="btn btn-sm btn-primary">➕ Tambah Buku</a>
    </div>
    <table class="table table-striped mb-0">
      <thead>
        <tr>
          <th>Sampul</th>
          <th>Judul</th>
          <th>Penulis</th>
          <th class="text-end">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($recent_buku as $buku): ?>
          <tr>
            <td>
              <?php if (!empty($buku['cover'])): ?>
                <img src="<?= base_url('uploads/covers/' . $buku['cover']) ?>" alt="Cover" width="60">
              <?php endif; ?>
            </td>
            <td><?= esc($buku['judul']) ?></td>
            <td><?= esc($buku['penulis']) ?></td>
            <td class="text-end">
              <a href="<?= site_url('/buku/edit/' . $buku['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
              <form action="<?= site_url('/buku/delete/' . $buku['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                <?= csrf_field() ?>
                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
              </form>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>
<?= $this->endSection() ?>