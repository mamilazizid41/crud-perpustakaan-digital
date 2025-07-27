<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perpustakaan Buku Digital</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= base_url('buku') ?>">Perpustakaan</a>
    <div class="d-flex">
      <?php if(session()->get('user')): ?>
        <a class="btn btn-outline-light me-2" href="<?= base_url('buku') ?>">Home</a>
        <a class="btn btn-danger" href="<?= base_url('auth/logout') ?>">Logout</a>
      <?php endif; ?>
    </div>
  </div>
</nav>
<div class="container mt-4">
<?php if(session()->getFlashdata('error')): ?>
  <div class="alert alert-danger"> <?= session()->getFlashdata('error') ?> </div>
<?php endif; ?>