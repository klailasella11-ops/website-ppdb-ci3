<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB Online – SMP Negeri 1 Pulau Haruku 2025/2026</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/auth.css') ?>">
</head>
<body>

<div class="card">

    <!-- ── HEADER ── -->
    <div class="header">
        <div class="logo-wrap">
            <img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo SMP Negeri 1 Pulau Haruku"
                 onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
            <div class="logo-placeholder">SMP N 1<br>P. HARUKU</div>
        </div>
        <h1>SMP NEGERI 1<br>PULAU HARUKU</h1>
        <p>Sistem Informasi PPDB 2025/2026</p>
    </div>

    <!-- ── FLASH MESSAGE dari CI3 ── -->
    <?php if ($this->session->flashdata('error')) : ?>
        <div class="alert alert-danger show">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span><?= htmlspecialchars($this->session->flashdata('error')) ?></span>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success show">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span><?= htmlspecialchars($this->session->flashdata('success')) ?></span>
        </div>
    <?php endif; ?>

    <!-- Alert JS (client-side) -->
    <div class="alert alert-danger" id="jsAlert">
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        <span id="jsAlertMsg"></span>
    </div>

    <!-- ── TABS ── -->
    <div class="tabs">
        <button class="tab-btn active" id="tabLogin"  onclick="switchTab('login')">Login</button>
        <button class="tab-btn"        id="tabDaftar" onclick="switchTab('daftar')">Daftar</button>
    </div>

    <!-- ════════════════════════════════
         PANEL LOGIN
    ════════════════════════════════ -->
    <div class="panel active" id="panelLogin">

        <div class="form-group">
            <label for="loginEmail">Email</label>
            <div class="input-wrap">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                <input type="email" id="loginEmail" name="email"
                       placeholder="Masukkan email anda" autocomplete="email">
            </div>
            <span class="error-msg" id="errLoginEmail">Email tidak valid.</span>
        </div>

        <div class="form-group">
            <label for="loginPw">Password</label>
            <div class="input-wrap">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                <input type="password" id="loginPw" name="password"
                       placeholder="Masukkan password anda">
                <button type="button" class="toggle-pw" onclick="togglePw('loginPw', this)" title="Tampilkan password">
                    <?= icon_eye() ?>
                </button>
            </div>
            <span class="error-msg" id="errLoginPw">Password wajib diisi.</span>
        </div>

        <div class="forgot">
            <a href="<?= site_url('auth/forgot') ?>">Lupa password?</a>
        </div>

        <button class="btn-primary" id="btnLogin" onclick="submitLogin()">
            <span class="btn-label">Login</span>
            <div class="spinner"></div>
        </button>

        <div class="divider">
            Belum punya akun?
            <a href="#" onclick="switchTab('daftar'); return false;">Daftar sekarang</a>
        </div>

    </div><!-- /panelLogin -->


    <!-- ════════════════════════════════
         PANEL DAFTAR
    ════════════════════════════════ -->
    <div class="panel" id="panelDaftar">

        <div class="form-group">
            <label for="regNama">Nama Lengkap</label>
            <div class="input-wrap">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                <input type="text" id="regNama" name="nama_lengkap"
                       placeholder="Nama lengkap" autocomplete="name">
            </div>
            <span class="error-msg" id="errNama">Nama lengkap wajib diisi.</span>
        </div>

        <div class="form-group">
            <label for="regEmail">Email</label>
            <div class="input-wrap">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                <input type="email" id="regEmail" name="email"
                       placeholder="Masukkan email" autocomplete="email">
            </div>
            <span class="error-msg" id="errRegEmail">Email tidak valid.</span>
        </div>

        <div class="form-group">
            <label for="regPw">Password</label>
            <div class="input-wrap">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                <input type="password" id="regPw" name="password"
                       placeholder="Masukkan password" oninput="checkStrength(this.value)">
                <button type="button" class="toggle-pw" onclick="togglePw('regPw', this)" title="Tampilkan password">
                    <?= icon_eye() ?>
                </button>
            </div>
            <span class="error-msg" id="errRegPw">Password minimal 6 karakter.</span>
            <!-- Password strength meter -->
            <div class="pw-strength" id="pwStrength" style="display:none">
                <div class="pw-bars">
                    <div class="pw-bar" id="bar1"></div>
                    <div class="pw-bar" id="bar2"></div>
                    <div class="pw-bar" id="bar3"></div>
                    <div class="pw-bar" id="bar4"></div>
                </div>
                <span class="pw-label" id="pwLabel"></span>
            </div>
        </div>

        <div class="form-group">
            <label for="regPwKonfirm">Ulangi Password</label>
            <div class="input-wrap">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                <input type="password" id="regPwKonfirm" name="password_confirm"
                       placeholder="Ulangi password">
                <button type="button" class="toggle-pw" onclick="togglePw('regPwKonfirm', this)" title="Tampilkan password">
                    <?= icon_eye() ?>
                </button>
            </div>
            <span class="error-msg" id="errKonfirm">Password tidak cocok.</span>
        </div>

        <button class="btn-primary" id="btnDaftar" onclick="submitDaftar()">
            <span class="btn-label">Daftar</span>
            <div class="spinner"></div>
        </button>

        <div class="divider">
            Sudah punya akun?
            <a href="#" onclick="switchTab('login'); return false;">Login sekarang</a>
        </div>

    </div><!-- /panelDaftar -->

</div><!-- /card -->

<!-- BACK LINK -->
<div class="back-link">
    <a href="<?= site_url('/') ?>">
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" width="14" height="14"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Kembali ke Beranda
    </a>
</div>

<!-- Kirim base URL ke JS via data attribute (aman, tanpa inline JS) -->
<div id="appConfig"
     data-login-url="<?= site_url('auth/login') ?>"
     data-register-url="<?= site_url('auth/register') ?>"
     data-dashboard-url="<?= site_url('dashboard') ?>"
     style="display:none">
</div>

<script src="<?= base_url('assets/js/auth.js') ?>"></script>
</body>
</html>

<?php
/**
 * Helper kecil – ikon mata (dipakai berulang kali di view ini).
 * Bisa juga dipindah ke application/helpers/icon_helper.php
 */
function icon_eye() {
    return '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" width="18" height="18">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943
                 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477
                 0-8.268-2.943-9.542-7z"/>
    </svg>';
}
?>