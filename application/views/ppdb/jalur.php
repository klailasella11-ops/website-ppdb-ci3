<?php // views/ppdb/jalur.php ?>

<div class="section-title"><h2>🛤️ Jalur Penerimaan</h2></div>

<div class="jalur-grid">
  <?php
  $jalur_list = [
    ['📍','Jalur Zonasi',   'Siswa berdomisili dekat sekolah berdasarkan KK yang diterbitkan min. 1 tahun sebelum pendaftaran.',
      'var(--biru)',  '#edf0ff', $setting->kuota_zonasi,   '50%'],
    ['🏆','Jalur Prestasi', 'Siswa berprestasi akademik (nilai rapor) atau non-akademik (juara kejuaraan) tingkat kabupaten ke atas.',
      'var(--green)', '#e8f5ee', $setting->kuota_prestasi, '30%'],
    ['❤️','Jalur Afirmasi', 'Anak dari keluarga tidak mampu (KIP/KKS/PKH), anak berkebutuhan khusus, dan anak yatim piatu.',
      'var(--kuning-dark)', '#fffbe8', $setting->kuota_afirmasi, '15%'],
    ['🔄','Jalur Mutasi',   'Siswa pindah domisili karena tugas orang tua (PNS, TNI, Polri, BUMN) dilengkapi surat tugas.',
      'var(--red)',   '#fde8e8', $setting->kuota_mutasi,   '5%'],
  ];
  foreach ($jalur_list as [$icon, $nama, $desc, $warna, $bg, $kuota, $pct]): ?>
  <div class="jalur-card">
    <div class="jalur-top">
      <div class="jalur-icon" style="background:<?= $bg ?>"><?= $icon ?></div>
      <h4><?= $nama ?></h4>
      <p><?= $desc ?></p>
    </div>
    <div class="jalur-footer">
      <span class="jalur-quota">Kuota: <?= $pct ?> (<?= $kuota ?> kursi)</span>
      <span class="jalur-pct" style="color:<?= $warna ?>"><?= $pct ?></span>
    </div>
  </div>
  <?php endforeach; ?>
</div>

<div class="panel" style="margin-bottom:20px;">
  <div class="panel-head"><h3>🧮 Cara Perhitungan Skor Seleksi</h3></div>
  <div class="panel-body">
    <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:20px;">
      <div>
        <p style="font-size:14px;font-weight:700;margin-bottom:12px;color:var(--biru-tua);font-family:'Poppins',sans-serif;">Formula Skor Total:</p>
        <div style="background:var(--biru-tua);color:#fff;border-radius:var(--radius-sm);padding:16px;font-family:monospace;font-size:13px;line-height:1.8;">
          Skor = (Nilai_Raport × 0.40)<br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+ (Skor_Jarak × 0.30)<br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+ (Poin_Prestasi × 0.20)<br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+ (Skor_Waktu × 0.10)<br><br>
          <span style="color:var(--kuning)">Range: 0 – 100 poin</span>
        </div>
      </div>
      <div>
        <p style="font-size:14px;font-weight:700;margin-bottom:12px;color:var(--biru-tua);font-family:'Poppins',sans-serif;">Keterangan Komponen:</p>
        <div style="display:flex;flex-direction:column;gap:8px;">
          <?php $komp = [
            ['var(--biru)',       '📊 Nilai Raport (40%)',   'Rata-rata 6 mapel utama kelas 6 (0–100)'],
            ['var(--green)',      '📍 Jarak Zonasi (30%)',   'Semakin dekat = skor lebih tinggi (≤1km = 100)'],
            ['var(--kuning-dark)','🏆 Prestasi (20%)',       'Nasional=100, Provinsi=80, Kab=60'],
            ['var(--biru-light)', '📅 Waktu Daftar (10%)',   'Daftar lebih awal = skor lebih tinggi'],
          ];
          foreach ($komp as [$c, $t, $d]): ?>
          <div style="background:var(--surface2);border-radius:8px;padding:10px 12px;border-left:4px solid <?= $c ?>">
            <strong style="font-size:13px;font-family:'Poppins',sans-serif;"><?= $t ?></strong>
            <p style="font-size:12px;color:var(--teks-muted);margin-top:4px;"><?= $d ?></p>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="panel">
  <div class="panel-head"><h3>📋 Persyaratan Umum</h3></div>
  <div class="panel-body">
    <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:20px;">
      <div>
        <p style="font-weight:700;font-size:14px;margin-bottom:10px;font-family:'Poppins',sans-serif;color:var(--biru-tua);">✅ Dokumen Wajib:</p>
        <ul style="font-size:13px;line-height:2;color:var(--teks-muted);list-style:none;">
          <li>📄 Akta Kelahiran</li>
          <li>🏠 Kartu Keluarga (KK)</li>
          <li>📓 Rapor SD/MI kelas 4, 5, 6</li>
          <li>🎓 SKHU / Ijazah SD</li>
          <li>🖼️ Pas foto 3×4 (background merah)</li>
        </ul>
      </div>
      <div>
        <p style="font-weight:700;font-size:14px;margin-bottom:10px;font-family:'Poppins',sans-serif;color:var(--biru-tua);">📌 Persyaratan Usia:</p>
        <ul style="font-size:13px;line-height:2;color:var(--teks-muted);list-style:none;">
          <li>🎂 Maks. 15 tahun pada 1 Juli 2025</li>
          <li>🏫 Lulusan SD/MI tahun 2025 atau 2024</li>
          <li>📍 Memiliki KK Kab. Maluku Tengah</li>
          <li>🔖 Memiliki NISN aktif di Dapodik</li>
        </ul>
      </div>
    </div>
  </div>
</div>
