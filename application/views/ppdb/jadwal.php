<?php // views/ppdb/jadwal.php ?>

<div class="section-title"><h2>📅 Jadwal & Timeline PPDB</h2></div>

<div class="panel" style="margin-bottom:20px;">
  <div class="panel-head">
    <h3>📅 Timeline Tahapan PPDB <?= $setting->tahun_ajaran ?></h3>
    <span style="background:#edf0ff;color:var(--biru);font-size:11px;padding:3px 10px;border-radius:12px;font-weight:700;font-family:'Poppins',sans-serif;">TA <?= $setting->tahun_ajaran ?></span>
  </div>
  <div class="panel-body">
    <div class="timeline">
      <?php
      $today = date('Y-m-d');
      $steps = [
        ['📢 Sosialisasi & Pengumuman PPDB', '2025-06-01', '2025-06-10'],
        ['📝 Pendaftaran Online',             $setting->tgl_buka, $setting->tgl_tutup],
        ['📋 Verifikasi Berkas',              '2025-06-26', '2025-06-28'],
        ['⚙️ Proses Seleksi Otomatis',        '2025-06-29', '2025-06-29'],
        ['📣 Pengumuman Hasil Seleksi',       $setting->tgl_pengumuman, $setting->tgl_pengumuman],
        ['📌 Daftar Ulang Siswa Diterima',    '2025-07-01', '2025-07-05'],
        ['🏫 Hari Pertama Masuk Sekolah',     '2025-07-14', '2025-07-14'],
      ];
      foreach ($steps as [$label, $mulai, $selesai]):
        $done   = $today > $selesai;
        $active = ($today >= $mulai && $today <= $selesai);
        $dotClass = $done ? 'done' : ($active ? 'active' : '');
        $tagClass = $done ? 'tag-green' : ($active ? 'tag-blue' : 'tag-gold');
        $tagText  = $done ? '✓ Selesai' : ($active ? '● Berlangsung' : '⏳ Menunggu');
        $tglText  = $mulai === $selesai
          ? date('d M Y', strtotime($mulai))
          : date('d M Y', strtotime($mulai)).' – '.date('d M Y', strtotime($selesai));
      ?>
      <div class="tl-item">
        <div class="tl-dot <?= $dotClass ?>"></div>
        <div class="tl-title"><?= $label ?></div>
        <div class="tl-date"><?= $tglText ?></div>
        <div class="tl-status"><span class="tag <?= $tagClass ?>"><?= $tagText ?></span></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<div class="panel">
  <div class="panel-head"><h3>📞 Kontak & Informasi</h3></div>
  <div class="panel-body">
    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:16px;">
      <div style="background:var(--surface2);border-radius:var(--radius-sm);padding:16px;text-align:center;border-top:4px solid var(--biru)">
        <div style="font-size:28px;margin-bottom:8px;">🏫</div>
        <div style="font-weight:700;font-size:14px;font-family:'Poppins',sans-serif;color:var(--biru-tua);">SMP Negeri 100</div>
        <div style="font-size:12px;color:var(--teks-muted);margin-top:4px;">Jl. Mutiara No.01 Pelauw<br>Kec. Pulau Haruku, Maluku Tengah</div>
      </div>
      <div style="background:var(--surface2);border-radius:var(--radius-sm);padding:16px;text-align:center;border-top:4px solid var(--kuning)">
        <div style="font-size:28px;margin-bottom:8px;">📞</div>
        <div style="font-weight:700;font-size:14px;font-family:'Poppins',sans-serif;color:var(--biru-tua);">Telepon</div>
        <div style="font-size:12px;color:var(--teks-muted);margin-top:4px;">(0914) 123-4567<br>WhatsApp: 0821-9843-4259</div>
      </div>
      <div style="background:var(--surface2);border-radius:var(--radius-sm);padding:16px;text-align:center;border-top:4px solid var(--green)">
        <div style="font-size:28px;margin-bottom:8px;">🕐</div>
        <div style="font-weight:700;font-size:14px;font-family:'Poppins',sans-serif;color:var(--biru-tua);">Jam Pelayanan</div>
        <div style="font-size:12px;color:var(--teks-muted);margin-top:4px;">Senin – Sabtu<br>07.00 – 15.00 WIT</div>
      </div>
    </div>
  </div>
</div>
