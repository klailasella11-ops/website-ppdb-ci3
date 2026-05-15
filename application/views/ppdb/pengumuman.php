<?php // views/ppdb/pengumuman.php ?>

<div class="announce-hero">
  <div>
    <h2>📣 Pengumuman Hasil Seleksi PPDB</h2>
    <p>Cek status kelulusan menggunakan NISN atau nama siswa</p>
  </div>
  <div style="text-align:right;">
    <div style="font-size:13px;opacity:.8;">Pengumuman Resmi</div>
    <div style="font-size:20px;font-weight:900;font-family:'Poppins',sans-serif;">
      <?= date('d M Y', strtotime($setting->tgl_pengumuman)) ?>
    </div>
  </div>
</div>

<!-- FORM CARI -->
<form method="GET" action="<?= base_url('ppdb/pengumuman') ?>" class="search-nisn">
  <input type="text" name="cari" value="<?= htmlspecialchars($keyword) ?>"
         placeholder="Masukkan NISN (10 digit) atau Nama Siswa...">
  <button type="submit" class="btn btn-green">🔍 Cari Sekarang</button>
</form>

<!-- HASIL PENCARIAN -->
<?php if ($keyword): ?>
  <?php if (!$seleksi_done): ?>
  <div class="info-box" style="margin-bottom:18px;">
    <div class="ico">⚠️</div>
    <div>Seleksi belum dijalankan. Silakan jalankan seleksi otomatis terlebih dahulu.</div>
  </div>
  <?php elseif (!$found): ?>
  <div class="result-card pending">
    <div class="result-header pending">
      <div class="result-icon">❓</div>
      <div>
        <div class="result-name">Data Tidak Ditemukan</div>
        <div class="result-status">NISN atau nama "<?= htmlspecialchars($keyword) ?>" tidak terdaftar</div>
      </div>
    </div>
  </div>
  <?php else:
    $sc = $found->status === 'lulus' ? 'lulus' : ($found->status === 'gagal' ? 'gagal' : 'pending');
    $st = $found->status === 'lulus' ? '✅ DINYATAKAN DITERIMA' : ($found->status === 'gagal' ? '❌ TIDAK DITERIMA' : '⏳ DALAM PROSES');
    $ico = $found->status === 'lulus' ? '🎉' : ($found->status === 'gagal' ? '😔' : '⏳');
  ?>
  <div class="result-card <?= $sc ?>">
    <div class="result-header <?= $sc ?>">
      <div class="result-icon"><?= $ico ?></div>
      <div>
        <div class="result-name"><?= htmlspecialchars($found->nama) ?></div>
        <div class="result-status"><?= $st ?></div>
      </div>
    </div>
    <div class="result-body">
      <div class="result-detail-grid">
        <div class="rd-item"><div class="key">NISN</div><div class="val"><?= $found->nisn ?></div></div>
        <div class="rd-item"><div class="key">Jalur</div><div class="val" style="text-transform:capitalize"><?= $found->jalur ?></div></div>
        <div class="rd-item"><div class="key">Peringkat Jalur</div><div class="val">#<?= $found->rank_jalur ?? '-' ?></div></div>
        <div class="rd-item"><div class="key">Nilai Rata-rata</div><div class="val"><?= number_format($found->rata_rata_nilai, 1) ?></div></div>
        <div class="rd-item"><div class="key">Skor Total</div><div class="val"><?= $found->skor_total > 0 ? number_format($found->skor_total, 1) : '-' ?></div></div>
        <div class="rd-item"><div class="key">Asal Sekolah</div><div class="val" style="font-size:13px"><?= htmlspecialchars($found->asal_sekolah) ?></div></div>
      </div>
      <?php if ($found->status === 'lulus'): ?>
      <div style="margin-top:14px;padding:12px 16px;background:#e8f5ee;border-radius:8px;font-size:13px;color:var(--green);font-weight:700;">
        🎊 Selamat! Silakan lakukan daftar ulang pada tanggal 1 – 5 Juli 2025 di SMP Negeri 100 Maluku Tengah.
      </div>
      <?php endif; ?>
    </div>
  </div>
  <?php endif; ?>
<?php endif; ?>

<!-- DAFTAR LULUS -->
<div class="seleksi-section" style="margin-top:20px;">
  <div class="seleksi-header">
    <h3>📋 Daftar Peserta Diterima</h3>
    <span class="auto-badge"><?= count($daftar_lulus) ?> Siswa Diterima</span>
  </div>
  <div class="table-wrap">
    <table class="main-table">
      <thead>
        <tr><th>No</th><th>Nama Siswa</th><th>NISN</th><th>Jalur</th><th>Skor Total</th><th>Status</th></tr>
      </thead>
      <tbody>
        <?php if ($daftar_lulus): foreach ($daftar_lulus as $i => $s): ?>
        <tr>
          <td><?= $i + 1 ?></td>
          <td><strong><?= htmlspecialchars($s->nama) ?></strong></td>
          <td style="font-family:monospace;font-size:12px"><?= $s->nisn ?></td>
          <td><span class="tag tag-blue" style="text-transform:capitalize"><?= $s->jalur ?></span></td>
          <td><strong><?= number_format($s->skor_total, 1) ?></strong></td>
          <td><span class="status-pill pill-lulus">✅ Diterima</span></td>
        </tr>
        <?php endforeach; else: ?>
        <tr><td colspan="6" style="text-align:center;padding:32px;color:var(--teks-muted);">
          <?= $seleksi_done ? 'Belum ada siswa yang dinyatakan lulus.' : 'Jalankan seleksi otomatis terlebih dahulu.' ?>
        </td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
