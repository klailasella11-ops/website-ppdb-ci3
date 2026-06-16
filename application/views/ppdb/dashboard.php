<?php // views/ppdb/dashboard.php ?>

<!-- FLASH MESSAGE -->
<?php if ($this->session->flashdata('success')): ?>
  <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
<?php endif; ?>

<!-- DASH HERO -->
<div class="dash-hero">
  <div class="dash-hero-text">
    <h2>Dashboard Real-Time PPDB <?= $setting->tahun_ajaran ?></h2>
    <p>Pantau perkembangan pendaftaran, seleksi, dan hasil secara langsung</p>
    <div class="tags">
      <span class="tag-live">● Live Update</span>
      <span class="tag-active"><?= $seleksi_done ? 'Seleksi Selesai' : 'Seleksi Otomatis Aktif' ?></span>
    </div>
  </div>
  <div class="ppdb-hero-stats">
    <div class="dhstat"><div class="num"><?= $total ?></div><div class="lbl">Total Pendaftar</div></div>
    <div class="dhstat"><div class="num"><?= $setting->kuota_total ?></div><div class="lbl">Kuota</div></div>
    <div class="dhstat"><div class="num"><?= $setting->kuota_total - $lulus ?></div><div class="lbl">Sisa Kuota</div></div>
  </div>
</div>

<!-- STAT CARDS -->
<div class="stats-grid">
  <div class="stat-card blue">
    <div class="icon">📋</div>
    <div class="val"><?= $total ?></div>
    <div class="lbl">Total Pendaftar</div>
  </div>
  <div class="stat-card green">
    <div class="icon">✅</div>
    <div class="val"><?= $lulus ?></div>
    <div class="lbl">Dinyatakan Lulus</div>
    <div class="delta <?= $seleksi_done ? 'up' : '' ?>">
      <?= $seleksi_done ? "✓ $lulus siswa diterima" : 'Menunggu seleksi' ?>
    </div>
  </div>
  <div class="stat-card gold">
    <div class="icon">⏳</div>
    <div class="val"><?= $tunggu ?></div>
    <div class="lbl">Dalam Antrian</div>
  </div>
  <div class="stat-card red">
    <div class="icon">❌</div>
    <div class="val"><?= $gagal ?></div>
    <div class="lbl">Tidak Lulus</div>
  </div>
</div>

<!-- MAIN ROW -->
<div class="dash-row">
  <div class="panel">
    <div class="panel-head">
      <h3>⚡ Aktivitas Pendaftaran Terbaru</h3>
      <span class="badge-live">● Live</span>
    </div>
    <div class="panel-body" style="padding:10px 16px;">
      <div class="activity-list">
        <?php if ($aktivitas): foreach ($aktivitas as $a): ?>
        <div class="activity-item">
          <div class="a-dot green">📝</div>
          <div class="a-text">
            <div class="name"><?= htmlspecialchars($a->namalengkap) ?></div>
            <div class="desc">Mendaftar jalur <?= ucfirst($a->jalur) ?></div>
          </div>
          <div class="a-time"><?= date('d M Y H:i', strtotime($a->created_at)) ?></div>
        </div>
        <?php endforeach; else: ?>
        <p style="text-align:center;padding:24px;color:var(--teks-muted);">Belum ada pendaftar</p>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <div style="display:flex;flex-direction:column;gap:20px;">
    <div class="panel">
      <div class="panel-head"><h3>📊 Status Berkas</h3></div>
      <div class="panel-body">
        <div style="display:flex;flex-direction:column;gap:8px;">
          <div class="berkas-row" style="border-left:4px solid var(--green)">
            <span>Berkas Lengkap</span><strong style="color:var(--green)"><?= $berkas_lengkap ?> siswa</strong>
          </div>
          <div class="berkas-row" style="border-left:4px solid var(--kuning-dark)">
            <span>Berkas Kurang</span><strong style="color:var(--kuning-dark)"><?= $total - $berkas_lengkap ?> siswa</strong>
          </div>
        </div>
      </div>
    </div>

    <div class="panel">
      <div class="panel-head"><h3>📋 Kuota per Jalur</h3></div>
      <div class="panel-body">
        <div style="display:flex;flex-direction:column;gap:10px;">
          <?php
          $jalur_info = [
            ['Zonasi',   $setting->kuota_zonasi,   'var(--biru)'],
            ['Prestasi', $setting->kuota_prestasi, 'var(--green)'],
            ['Afirmasi', $setting->kuota_afirmasi, 'var(--kuning-dark)'],
            ['Mutasi',   $setting->kuota_mutasi,   'var(--red)'],
          ];
          foreach ($jalur_info as [$nama, $kuota, $warna]): ?>
          <div class="sp-item">
            <div class="sp-lbl" style="color:<?= $warna ?>"><?= $nama ?></div>
            <div class="sp-bar"><div class="sp-fill" style="width:100%;background:<?= $warna ?>"></div></div>
            <div class="sp-val" style="color:<?= $warna ?>"><?= $kuota ?></div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <div class="panel">
  <div class="panel-head"><h3>🚀 Aksi Cepat</h3></div>

  <div class="panel-body" style="display:flex;flex-direction:column;gap:8px;">

    <a href="<?= base_url('ppdb/daftar') ?>"
       class="btn btn-primary"
       style="justify-content:center;">

       📝 Daftar Sekarang

    </a>

    <?php if (!$seleksi_done): ?>

        <?php if($this->session->userdata('role') == 'admin'): ?>

            <a href="<?= base_url('ppdb/jalankan_seleksi') ?>"
               class="btn btn-gold"
               style="justify-content:center;"
               onclick="return confirm('Jalankan seleksi sekarang?')">

               ⚙️ Jalankan Seleksi

            </a>

        <?php endif; ?>

    <?php else: ?>

        <a href="<?= base_url('ppdb/pengumuman') ?>"
           class="btn btn-green"
           style="justify-content:center;">

           📣 Lihat Pengumuman

        </a>

    <?php endif; ?>

  </div>
</div>
      </div>
    </div>
  </div>
</div>

<?php
// Helper: time ago
if (!function_exists('_time_ago')): ?>
<?php endif; ?>
<?php
// Tambahkan method ke controller sebagai alternatif, atau pakai helper inline
?>
<script>
// Tidak ada JS khusus di dashboard; semua dari ppdb.js
</script>
