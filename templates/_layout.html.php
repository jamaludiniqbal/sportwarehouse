<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? 'NO TITLE' ?> - Sport Warehouse</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/modern-normalize@3.0.1/modern-normalize.min.css">
  <link rel="stylesheet" href="styles/style.css">
</head>
<body>
  <div class="site-wrapper">
    <header class="site-header">
      <h1 class="site-title">Northwind Website</h1>
      <div class="main-nav-container">
        <nav class="main-nav">
          <!-- Links go here... -->
          <?php include "_navigation.html.php"; ?>
        </nav>
      </div>
    </header>
    <main class="main-content">

      <?= $content ?? 'NO CONTENT: $content is not defined' ?>

    </main>
    <footer class="site-footer">
      <p class="copyright">Copyright &copy;<?= date('Y') ?> Northwind</p>
    </footer>
  </div>
</body>
</html>