<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Daftar – PPDB SMP NEGERI 100 MALUKU TENGAH</title>
    <link rel="shortcut icon" href="<?= base_url('assets/images/LOGO_MI.png') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/auth.css') ?>">
</head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="0">
<body>

<div class="auth-wrapper">
    <div class="auth-card">

        <!-- ── Header ── -->
        <div class="auth-header">
            <div class="logo-wrap">
                <img src="<?= base_url('assets/images/logo.JPG') ?>" alt="logo.JPG'">
            </div>
            <h1>SMP NEGERI 100<br>MALUKU TENGAH</h1>
            <p>Sistem Informasi PPDB 2026/2027</p>
            <div class="gold-line"></div>
        </div>

        <!-- ── Tab Bar ── -->
        <div class="tab-bar">
            <button class="tab-btn active" data-tab="login">
                <i class="fas fa-sign-in-alt"></i> Masuk
            </button>
            <button class="tab-btn" data-tab="register">
                <i class="fas fa-user-plus"></i> Daftar Akun
            </button>
        </div>

        <!-- ── Body ── -->
        <div class="auth-body">

            <!-- ════ PANEL LOGIN ════ -->
            <div class="form-panel active" id="panel-login">

                <div class="gold-divider">Masuk ke Akun Anda</div>

                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle"></i>
                        <?= $this->session->flashdata('error') ?>
                    </div>
                <?php endif; ?>

                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle"></i>
                        <?= $this->session->flashdata('success') ?>
                    </div>
                <?php endif; ?>

                <form action="<?= site_url('auth/login_process') ?>" method="POST">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">

                    <div class="form-group">
                        <label for="login-email">Email</label>
                        <div class="input-wrap">
                            <i class="fas fa-envelope input-icon"></i>
                            <input type="email" id="login-email" name="email"
                                   placeholder="Masukkan email anda"
                                   value="<?= set_value('email') ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="login-password">Password</label>
                        <div class="input-wrap">
                            <i class="fas fa-lock input-icon"></i>
                            <input type="password" id="login-password" name="password"
                                   placeholder="Masukkan password anda" required>
                            <button type="button" class="toggle-pw" tabindex="-1">
                                <i class="fas fa-eye-slash"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="btn-submit">MASUK &nbsp;→</button>
                </form>

                <p class="auth-footer">
                    Belum terdaftar?
                    <a href="javascript:void(0)" onclick="switchTab('register')">Daftar PPDB di sini</a>
                </p>
                <p class="back-link">
                    <a href="<?= site_url('/') ?>">← Kembali ke Beranda</a>
                </p>
            </div>
            <!-- ════ END PANEL LOGIN ════ -->


            <!-- ════ PANEL REGISTER ════ -->
            <div class="form-panel" id="panel-register">

                <div class="gold-divider">Buat Akun Baru</div>

                <?php if ($this->session->flashdata('reg_error')): ?>
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle"></i>
                        <?= $this->session->flashdata('reg_error') ?>
                    </div>
                <?php endif; ?>

                <form action="<?= site_url('auth/register_process') ?>" method="POST">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">

                    <div class="form-group">
                        <label for="reg-username">Username</label>
                        <div class="input-wrap">
                            <i class="fas fa-user input-icon"></i>
                            <input type="text" id="reg-username" name="username"
                                   placeholder="Buat username unik"
                                   value="<?= set_value('username') ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="reg-email">Email</label>
                        <div class="input-wrap">
                            <i class="fas fa-envelope input-icon"></i>
                            <input type="email" id="reg-email" name="email"
                                   placeholder="Masukkan email aktif"
                                   value="<?= set_value('email') ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="reg-password">Password</label>
                        <div class="input-wrap">
                            <i class="fas fa-lock input-icon"></i>
                            <input type="password" id="reg-password" name="password"
                                   placeholder="Minimal 8 karakter" required>
                            <button type="button" class="toggle-pw" tabindex="-1">
                                <i class="fas fa-eye-slash"></i>
                            </button>
                        </div>
                        <div class="pw-strength">
                            <div class="strength-bar">
                                <div class="strength-fill"></div>
                            </div>
                            <span></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="reg-confirm">Konfirmasi Password</label>
                        <div class="input-wrap">
                            <i class="fas fa-lock input-icon"></i>
                            <input type="password" id="reg-confirm" name="confirm_password"
                                   placeholder="Ulangi password" required>
                            <button type="button" class="toggle-pw" tabindex="-1">
                                <i class="fas fa-eye-slash"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="btn-submit">DAFTAR SEKARANG &nbsp;→</button>
                </form>

                <p class="auth-footer">
                    Sudah punya akun?
                    <a href="javascript:void(0)" onclick="switchTab('login')">Masuk di sini</a>
                </p>
                <p class="back-link">
                    <a href="<?= site_url('/') ?>">← Kembali ke Beranda</a>
                </p>
            </div>
            <!-- ════ END PANEL REGISTER ════ -->

        </div><!-- /auth-body -->
    </div><!-- /auth-card -->

    <p class="auth-copyright">© 2026 SMP NEGERI 100 MALUKU TENGAH</p>
</div>

<script src="<?= base_url('assets/js/auth.js') ?>"></script>
<script>
window.onload = function () {
    window.history.forward();
};
</script>
</body>
</html>