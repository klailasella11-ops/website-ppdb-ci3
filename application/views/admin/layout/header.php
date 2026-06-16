<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= isset($title) ? $title : 'Admin' ?> | SMP Negeri 100</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
    <!-- Admin Theme -->
    <link rel="stylesheet" href="<?= base_url('assets/css/admin.css') ?>">
</head>
<body>

<!-- Preloader -->
<div id="preloader"><div class="loader"></div></div>

<!-- Page Container -->
<div class="page-container">

    <!-- Sidebar -->
    <div class="sidebar-menu" id="sidebar">
        <div class="sidebar-header">
            <a href="<?= site_url('admin') ?>">
                <img src="<?= base_url('assets/images/logo.JPG') ?>" alt="logo" width="100%">
            </a>
        </div>
        <div class="main-menu">
            <div class="menu-inner">
                <nav>
                    <ul class="metismenu" id="menu">
                        <li class="<?= (isset($active) && $active == 'dashboard') ? 'active' : '' ?>">
                            <a href="<?= site_url('admin') ?>">
                                <i class="fas fa-tachometer-alt"></i><span>Dashboard</span>
                            </a>
                        </li>
                        <li class="<?= (isset($active) && $active == 'admin') ? 'active' : '' ?>">
                            <a href="<?= site_url('admin/kelola_admin') ?>">
                                <i class="fas fa-user"></i><span>Kelola Admin</span>
                            </a>
                        </li>
                        <li class="<?= (isset($active) && $active == 'user') ? 'active' : '' ?>">
                            <a href="<?= site_url('admin/kelola_user') ?>">
                                <i class="fas fa-users"></i><span>User Terdaftar</span>
                            </a>
                        </li>
                        <li class="<?= (isset($active) && $active == 'formulir') ? 'active' : '' ?>">
                            <a href="<?= site_url('admin/formulir') ?>">
                                <i class="fas fa-file-alt"></i><span>Formulir</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= site_url('home') ?>">
                                <i class="fas fa-home"></i><span>Halaman Utama</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= site_url('auth/logout') ?>">
                                <i class="fas fa-sign-out-alt"></i><span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- End Sidebar -->

    <!-- Header -->
    <div class="header-area">
        <div class="row align-items-center">
            <div class="col-md-6 col-sm-8 clearfix">
                <button id="toggleSidebar" class="toggle-btn">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="col-md-6 col-sm-4 clearfix">
                <ul class="notification-area pull-right">
                    <li>
                        <h3 style="white-space: nowrap; margin: 0; text-align: right;">
                            <div class="date">
                                <script>
                                var months = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
                                var myDays = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
                                var date = new Date();
                                var day = date.getDate(), month = date.getMonth();
                                var thisDay = myDays[date.getDay()];
                                var yy = date.getYear();
                                var year = (yy < 1000) ? yy + 1900 : yy;
                                document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                                </script>
                            </div>
                        </h3>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Header -->

    <!-- Flash Messages -->
    <div class="container-fluid px-4 pt-3">
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-warning"><?= $this->session->flashdata('error') ?></div>
        <?php endif; ?>
    </div>

    <!-- Main Content -->
    <div class="main-content-inner">