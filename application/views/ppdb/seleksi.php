<?php // views/ppdb/seleksi.php ?>

<div class="section-title"><h2>⚙️ Seleksi Otomatis</h2></div>

<?php if ($success): ?>
<div class="alert alert-success"><?= $success ?></div>
<?php endif; ?>
<?php if ($error): ?>
<div class="alert alert-danger"><?= $error ?></div>
<?php endif; ?>

<!-- PANEL SELEKSI -->
<div class="auto-seleksi-panel">
  <div class="asp-title">🤖 Mesin Seleksi Otomatis PPDB <span class="asp-badge">⚡ <?= $seleksi_done ? 'SELESAI' : 'SIAP' ?></span></div>
  <div class="asp-grid">
    <div class="asp-stat"><div class="num"><?= $total ?></div><div class="lbl">Peserta Diproses</div></div>
    <div class="asp-stat"><div class="num"><?= $setting->kuota_total ?></div><div class="lbl">Total Kuota</div></div>
    <div class="asp-stat"><div class="num"><?= $lulus ?></div><div class="lbl">Dinyatakan Lulus</div></div>
  </div>

  <div style="background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.13);border-radius:var(--radius-sm);padding:14px 16px;margin-bottom:18px;position:relative;z-index:1;">
    <p style="font-size:13px;font-weight:700;margin-bottom:8px;font-family:'Poppins',sans-serif;">🧮 Komponen Penilaian:</p>
    <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:8px;font-size:12.5px;opacity:.85;">
      <span>📊 Nilai Raport: <strong style="color:var(--kuning)">40%</strong></span>
      <span>📍 Jarak Zonasi: <strong style="color:var(--kuning)">30%</strong></span>
      <span>🏆 Prestasi: <strong style="color:var(--kuning)">20%</strong></span>
      <span>📅 Waktu Daftar: <strong style="color:var(--kuning)">10%</strong></span>
    </div>
  </div>

  <div style="display:flex;align-items:center;gap:12px;position:relative;z-index:1;flex-wrap:wrap;">
    <?php if (!$seleksi_done): ?>
    <a href="<?= base_url('ppdb/jalankan_seleksi') ?>"
       class="btn-run"
       onclick="return confirm('Jalankan seleksi otomatis sekarang? Proses ini akan menghitung skor semua peserta.')">
      ⚙️ Jalankan Seleksi Otomatis
    </a>
    <?php else: ?>
    <span class="btn-run" style="background:var(--green);cursor:default;">✅ Seleksi Telah Dijalankan</span>
    <?php endif; ?>
    <a href="<?= base_url('ppdb/reset_seleksi') ?>"
       class="btn"
       style="background:rgba(255,255,255,0.13);color:#fff;border:1px solid rgba(255,255,255,0.25);"
       onclick="return confirm('Reset semua data seleksi? Status semua peserta akan kembali ke Antrian.')">
      🔄 Reset Seleksi
    </a>
  </div>
</div>

<!-- FILTER -->
<form method="GET" action="<?= base_url('ppdb/seleksi') ?>" class="filter-bar">
  <input type="text" name="search" value="<?= htmlspecialchars($search) ?>" placeholder="🔍 Cari nama atau NISN...">
  <select name="jalur">
    <option value="">Semua Jalur</option>
    <?php foreach(['zonasi','prestasi','afirmasi','mutasi'] as $j): ?>
    <option value="<?= $j ?>" <?= ($f_jalur===$j)?'selected':'' ?>><?= ucfirst($j) ?></option>
    <?php endforeach; ?>
  </select>
  <select name="status">
    <option value="">Semua Status</option>
    <option value="lulus"  <?= ($f_status==='lulus') ?'selected':'' ?>>Lulus</option>
    <option value="tunggu" <?= ($f_status==='tunggu')?'selected':'' ?>>Antrian</option>
    <option value="gagal"  <?= ($f_status==='gagal') ?'selected':'' ?>>Tidak Lulus</option>
  </select>
  <button type="submit" class="btn btn-primary btn-sm">🔍 Cari</button>
  <a href="<?= base_url('ppdb/seleksi') ?>" class="btn btn-outline btn-sm">Reset Filter</a>
</form>

<!-- TABEL -->
<div class="seleksi-section">
  <div class="seleksi-header">
    <h3>📋 Daftar Peserta & Hasil Seleksi</h3>
    <span class="auto-badge">🤖 Seleksi Otomatis</span>
  </div>
  <div class="table-wrap">
    <table class="main-table">
      <thead>
        <tr>
          <th width="50">Rank</th>
          <th>Nama Siswa</th>
          <th>NISN</th>
          <th>Jalur</th>
          <th>Rata-rata Nilai</th>
          <th>Jarak (km)</th>
          <th>Skor Total</th>
          <th>Status</th>
          <th width="80">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($pendaftar): foreach ($pendaftar as $s): ?>
        <?php
          $rank = $s->rank_jalur ?? '-';
          $rc = $rank === 1 ? 'rank-1' : ($rank === 2 ? 'rank-2' : ($rank === 3 ? 'rank-3' : 'rank-n'));
          $sp = $s->status === 'lulus' ? 'pill-lulus' : ($s->status === 'gagal' ? 'pill-gagal' : 'pill-tunggu');
          $st = $s->status === 'lulus' ? '✅ Lulus' : ($s->status === 'gagal' ? '❌ Tidak Lulus' : '⏳ Antrian');
          $jb = ['zonasi'=>'tag-blue','prestasi'=>'tag-green','afirmasi'=>'tag-gold','mutasi'=>'tag-red'][$s->jalur] ?? 'tag-blue';
          $pct = $s->skor_total > 0 ? min(100, $s->skor_total) : 0;
          $sc = $s->skor_total >= 85 ? 'score-good' : ($s->skor_total >= 70 ? 'score-mid' : 'score-low');
        ?>
        <tr>
          <td><span class="rank-badge <?= $rc ?>"><?= $rank ?></span></td>
          <td>
            <strong><?= htmlspecialchars($s->nama) ?></strong><br>
            <small style="color:var(--teks-muted)"><?= htmlspecialchars($s->asal_sekolah) ?></small>
          </td>
          <td style="font-family:monospace;font-size:12px"><?= $s->nisn ?></td>
          <td><span class="tag <?= $jb ?>" style="text-transform:capitalize"><?= $s->jalur ?></span></td>
          <td><strong><?= number_format($s->rata_rata_nilai, 1) ?></strong></td>
          <td><?= $s->jarak_km ?> km</td>
          <td>
            <div class="score-bar-wrap">
              <div class="score-bar"><div class="score-fill <?= $sc ?>" style="width:<?= $pct ?>%"></div></div>
              <strong><?= $s->skor_total > 0 ? number_format($s->skor_total, 1) : '-' ?></strong>
            </div>
          </td>
          <td><span class="status-pill <?= $sp ?>"><?= $st ?></span></td>
          <td><a href="<?= base_url('ppdb/detail/'.$s->id) ?>" class="btn btn-primary btn-sm">Detail</a></td>
        </tr>
        <?php endforeach; else: ?>
        <tr><td colspan="9">
          <div class="empty-state">
            <div class="eico">📋</div>
            <h3>Belum ada data pendaftar</h3>
            <p><a href="<?= base_url('ppdb/daftar') ?>" class="btn btn-primary btn-sm" style="margin-top:12px;">+ Tambah Pendaftar</a></p>
          </div>
        </td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
