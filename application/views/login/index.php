<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title><?= $title ?? 'Login - SMP Negeri 1 Pulau Haruku' ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="<?= base_url('assets/css/login.css') ?>">
</head>
<body>

<!-- Dekorasi background -->
<div class="bg-circle"></div>
<div class="bg-circle"></div>
<div class="bg-circle"></div>

<div class="login-card">

    <!-- Header -->
    <div class="card-header">
        <div class="logo-wrap">
            <img src="<?= base_url('assets/images/logo.JPG') ?>" alt="Logo SMP">
        </div>
        <h1>SMP NEGERI 1<br>PULAU HARUKU</h1>
        <p>Sistem Informasi PPDB 2025/2026</p>
        <div class="divider"></div>
    </div>

    <!-- Flash / Error alert -->
    <?php if (!empty($error)) : ?>
        <div class="alert-error">
            <span>⚠</span>
            <span><?= htmlspecialchars($error) ?></span>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')) : ?>
        <div class="alert-error">
            <span>⚠</span>
            <span><?= htmlspecialchars($this->session->flashdata('error')) ?></span>
        </div>
    <?php endif; ?>

    <!-- Form Login -->
    <form action="<?= base_url('login/proses') ?>" method="post">
        <?= form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()) ?>

        <div class="form-group">
            <label for="email">Email</label>
            <div class="input-wrap">
                <span class="icon">✉</span>
                <input type="email" id="email" name="email"
                       placeholder="Masukkan email anda"
                       value="<?= set_value('email') ?>"
                       required autocomplete="email"/>
            </div>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <div class="input-wrap">
                <span class="icon">🔒</span>
                <input type="password" id="password" name="password"
                       placeholder="Masukkan password anda"
                       required autocomplete="current-password"/>
                <span class="toggle-pw" id="eyeIcon">👁</span>
            </div>
        </div>

        <button type="submit" class="btn-login">
            <span>MASUK →</span>
        </button>
    </form>

    <!-- Footer -->
    <div class="card-footer">
        <!-- ✅ Langsung ke tab Daftar tanpa mampir ke halaman ppdb -->
        <a href="<?= site_url('auth?tab=daftar') ?>">Belum terdaftar? Daftar PPDB di sini</a><br>
        <a href="<?= base_url() ?>" class="back-home">← Kembali ke Beranda</a>
    </div>

</div>

<script src="<?= base_url('assets/js/login.js') ?>"></script>
</body>
</html>