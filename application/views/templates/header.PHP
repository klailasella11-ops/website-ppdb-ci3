<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title><?= $title ?? 'SMP Negeri 100 Maluku Tengah' ?></title>

  <!-- FONT -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"/>

  <!-- CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/informasi.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/ppdb.css') ?>">

  <style>

    /* =========================
       USER DROPDOWN
    ========================= */

    .user-menu{
        position: relative;
        list-style: none;
    }

    .user-btn{
        display: inline-block;
        background: linear-gradient(135deg,#0b3d91,#1565c0);
        color: #fff !important;
        padding: 10px 18px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        transition: .3s;
        cursor: pointer;
    }

    .user-btn:hover{
        transform: translateY(-2px);
    }

    .dropdown-menu{
        display: none;
        position: absolute;
        top: 55px;
        right: 0;
        background: #fff;
        min-width: 200px;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 12px 25px rgba(0,0,0,.15);
        z-index: 99999;
    }

    .dropdown-menu.show{
        display: block;
    }

    .dropdown-menu a{
        display: block;
        padding: 14px 18px;
        text-decoration: none;
        color: #333;
        font-weight: 500;
        transition: .3s;
    }

    .dropdown-menu a:hover{
        background: #f4f7fb;
        color: #0b3d91;
    }

    /* Biar dropdown tidak ketutup navbar */
    #navbar,
    .nav-links,
    .user-menu{
        overflow: visible !important;
    }

  </style>

</head>
<body>

<!-- =========================
     NAVBAR
========================= -->
<nav id="navbar">

  <!-- LOGO -->
  <a href="<?= site_url('home') ?>" class="nav-logo">

    <img src="<?= base_url('assets/images/logo.JPG') ?>"
         alt="Logo SMP Negeri 1 Pulau Haruku"
         style="width:80px; height:75px; border-radius:50%; object-fit:cover; border:2px solid white;">

    <div class="nav-logo-text">
      SMP NEGERI 1<br>PULAU HARUKU
    </div>

  </a>

  <!-- MENU -->
  <ul class="nav-links" id="navLinks">

    <!-- BERANDA -->
    <li>
      <a href="<?= site_url('home') ?>"
         class="<?= (isset($active) && $active == 'beranda') ? 'active-link' : '' ?>">
         BERANDA
      </a>
    </li>

    <!-- PROFIL -->
    <li>
      <a href="<?= site_url('informasi') ?>"
         class="<?= (isset($active) && $active == 'informasi') ? 'active-link' : '' ?>">
         PROFIL SEKOLAH
      </a>
    </li>

    <!-- PPDB -->
    <li>
      <a href="<?= site_url('ppdb') ?>"
         class="<?= (isset($active) && $active == 'ppdb') ? 'active-link' : '' ?>">
         PPDB
      </a>
    </li>

    <!-- LOGIN / USER -->
    <?php if($this->session->userdata('logged_in')) { ?>

      <li class="user-menu">

        <a href="javascript:void(0);" 
           class="user-btn"
           id="userDropdownBtn">

           👤 <?= $this->session->userdata('username'); ?>

        </a>

        <div class="dropdown-menu" id="dropdownMenu">

          <?php if($this->session->userdata('role') == 'admin') { ?>

            <a href="<?= base_url('admin'); ?>">
              Dashboard Admin
            </a>

          <?php } else { ?>

            <a href="<?= base_url('home'); ?>">
              Dashboard
            </a>

          <?php } ?>

          <a href="<?= base_url('auth/logout'); ?>">
            Logout
          </a>

        </div>

      </li>

    <?php } else { ?>

      <li>

        <a href="<?= site_url('auth'); ?>"
           class="<?= (isset($active) && $active == 'login') ? 'active-link' : '' ?>">

           LOGIN

        </a>

      </li>

    <?php } ?>

  </ul>

  <!-- HAMBURGER -->
  <div class="hamburger" id="hamburger" onclick="toggleNav()">
    <span></span>
    <span></span>
    <span></span>
  </div>

</nav>

<!-- =========================
     DROPDOWN SCRIPT
========================= -->
<script>

document.addEventListener("DOMContentLoaded", function(){

    const btn  = document.getElementById("userDropdownBtn");
    const menu = document.getElementById("dropdownMenu");

    if(btn){

        btn.addEventListener("click", function(e){

            e.preventDefault();
            e.stopPropagation();

            menu.classList.toggle("show");

        });

        document.addEventListener("click", function(){

            menu.classList.remove("show");

        });

    }

});

</script>