<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title><?= $title ?? 'SMP Negeri 100 Maluku Tengah' ?></title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/informasi.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/ppdb.css') ?>">

</head>
<body>

<!-- NAVBAR -->
</a>
<nav id="navbar">
  <a href="<?= base_url() ?>" class="nav-logo">
    <img src="<?= base_url('assets/images/logo.JPG') ?>"
         alt="Logo SMP Negeri 100"
         style="width:80px; height:75px; border-radius:50%; object-fit:cover; border: 2px solid white;">
    <div class="nav-logo-text">SMP NEGERI 100<br>MALUKU TENGAH</div>
</a>

  <ul class="nav-links" id="navLinks">
    <li><a href="<?= base_url() ?>" class="<?= ($active == 'beranda') ? 'active-link' : '' ?>">BERANDA</a></li>
    <li class="nav-dropdown">
      <a href="<?= base_url('informasi') ?>">PROFIL SEKOLAH</a>
    </li>
    <li><a href="<?= base_url('ppdb') ?>" class="<?= ($active == 'ppdb') ? 'active-link' : '' ?>">PPDB</a></li>
    <li><a href="<?= base_url('login') ?>" class="<?= ($active == 'login') ? 'active-link' : '' ?>">LOGIN</a></li>
  </ul>

  <div class="hamburger" id="hamburger" onclick="toggleNav()">
    <span></span><span></span><span></span>
  </div>
</nav>