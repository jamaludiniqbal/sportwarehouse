<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Title for the website -->
  <title><?= $title ?? 'NO TITLE' ?> - Sportwarehouse</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/style.css" />

</head>

<body>
  <main class="wrapper">
    <!-- Adding content from variable -->
    <?= $content ?? 'NO CONTENT: $content is not defined' ?>

    <footer class="site-footer">

    </footer>

  </main>
</body>

</html>