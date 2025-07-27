<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Perpustakaan Digital</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      overflow-x: hidden;
    }

    .sidebar {
      min-height: 100vh;
      background-color: #343a40;
    }

    .sidebar a {
      color: #ffffff;
      text-decoration: none;
    }

    .sidebar a:hover {
      background-color: #495057;
    }
  </style>
</head>

<body>

  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <nav class="col-md-3 col-lg-2 d-md-block sidebar px-3 py-4">
        <h4 class="text-white mb-4">📚 Perpustakaan</h4>
        <ul class="nav flex-column">
          <?php if (session()->get('user')): ?>
            <li class="nav-item mb-2">
              <a class="nav-link" href="<?= site_url('/buku/dashboard') ?>">📊 Dashboard</a>
            </li>
          <?php endif; ?>

          <li class="nav-item mb-2">
            <a class="nav-link" href="<?= site_url('/buku') ?>">📖 Daftar Buku</a>
          </li>

          <?php if (session()->get('user')): ?>
            <li class="nav-item mb-2">
              <a class="nav-link" href="<?= site_url('/buku/create') ?>">➕ Tambah Buku</a>
            </li>
            <li class="nav-item mb-2">
              <a class="nav-link" href="<?= site_url('/auth/logout') ?>">🚪 Logout</a>
            </li>
          <?php else: ?>
            <li class="nav-item mb-2">
              <a class="nav-link" href="<?= site_url('/auth/login') ?>">🔑 Login</a>
            </li>
          <?php endif; ?>
        </ul>
      </nav>

      <!-- Main Content -->
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
        <?= $this->renderSection('content') ?>
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>