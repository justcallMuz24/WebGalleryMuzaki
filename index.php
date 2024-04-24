<?php include 'koneksi.php';
session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery Muzaki</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="?url=home" >Gallery Foto</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link" href="?url=home">Home</a>
          <?php if (isset($_SESSION['user_id'])): ?>
            <a class="nav-link" href="?url=upload">Upload</a>
            <a class="nav-link" href="?url="><?= ucwords($_SESSION['username']) ?></a>
            <a href="?url=logout" class="nav-link" style="margin-left:1000px;">Logout</a>
          <?php else: ?>
            <a class="nav-link" href="daftar.php">Daftar</a>
            <a class="nav-link" href="login.php" style="margin-left: 1080px;">Login</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </nav>
  <?php
  $url = @$_GET["url"];
  if ($url == 'home') {
    include 'page/home.php';
  } elseif ($url == "profile") {
    include 'page/profil.php';
  } elseif ($url == "edit") {
    include 'page/edit.php';
  } elseif ($url == "hapus") {
    include 'page/hapus.php';
  } else if ($url == 'upload') {
    include 'page/upload.php';
  } else if ($url == 'album') {
    include 'page/album.php';
  } else if ($url == 'detail') {
    include 'page/detail.php';
  } else if ($url == 'logout') {
    session_destroy();
    header("Location: ?url=home");
  } else {
    include 'page/home.php';
  }
  ?>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
