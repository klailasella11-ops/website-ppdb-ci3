<?php // views/ppdb/detail.php ?>

<div class="section-title">
  <h2>👤 Detail Pendaftar</h2>
  <a href="<?= base_url('ppdb/seleksi') ?>" class="btn btn-outline btn-sm">← Kembali</a>
</div>

<?php
  $sp = $siswa->status === 'lulus' ? 'pill-lulus' : ($siswa->status === 'gagal' ? 'pill-gagal' : 'pill-tunggu');
  $st = $siswa->status === 'lulus' ? '✅ Lulus' : ($siswa->status === 'gagal' ? '❌ Tidak Lulus' : '⏳ Antrian');
?>

<div class="form-card" style="margin-bottom:20px;">
  <div class="form-header" style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;">
    <div>
      <h2 style="font-size:18px;"><?= htmlspecialchars($siswa->nama) ?></h2>
      <p>No. Pendaftaran: <strong><?= $siswa->no_pendaftaran ?></strong> &nbsp;|&nbsp; NISN: <strong><?= $siswa->nisn ?></strong></p>
    </div>
    <span class="status-pill <?= $sp ?>" style="font-size:14px;padding:6px 18px;"><?= $st ?></span>
  </div>

  <div class="form-body">
    <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:20px;">

      <!-- DATA PRIBADI -->
      <div>
        <div class="form-section-title">👤 Data Pribadi</div>
        <?php $pribadi = [
          'NIK'            => $siswa->nik,
          'Jenis Kelamin'  => $siswa->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan',
          'Tempat, Tgl Lahir' => $siswa->tempat_lahir.', '.date('d M Y', strtotime($siswa->tanggal_lahir)),
          'Agama'          => $siswa->agama,
          'Asal Sekolah'   => $siswa->asal_sekolah,
          'No. HP'         => $siswa->no_hp,
          'Nama Ayah'      => $siswa->nama_ayah ?: '-',
          'Nama Ibu'       => $siswa->nama_ibu ?: '-',
        ];
        foreach ($pribadi as $k => $v): ?>
        <div class="mdet"><span class="k"><?= $k ?></span><span class="v"><?= htmlspecialchars($v) ?></span></div>
        <?php endforeach; ?>
      </div>

      <!-- DATA PENDAFTARAN -->
      <div>
        <div class="form-section-title">📋 Data Pendaftaran</div>
        <?php $daftar = [
          'Jalur'          => ucfirst($siswa->jalur),
          'Kecamatan'      => $siswa->kecamatan,
          'Jarak ke Sekolah' => $siswa->jarak_km.' km',
          'Rank Jalur'     => $siswa->rank_jalur ? '#'.$siswa->rank_jalur : '-',
          'Skor Total'     => $siswa->skor_total > 0 ? number_format($siswa->skor_total, 2) : '-',
          'Tgl. Daftar'    => date('d M Y H:i', strtotime($siswa->created_at)),
        ];
        foreach ($daftar as $k => $v): ?>
        <div class="mdet"><span class="k"><?= $k ?></span><span class="v"><?= htmlspecialchars($v) ?></span></div>
        <?php endforeach; ?>

        <?php if ($siswa->nama_prestasi): ?>
        <div class="form-section-title" style="margin-top:16px;">🏆 Prestasi</div>
        <div class="mdet"><span class="k">Kejuaraan</span><span class="v"><?= htmlspecialchars($siswa->nama_prestasi) ?></span></div>
        <div class="mdet"><span class="k">Tahun</span><span class="v"><?= $siswa->tahun_prestasi ?></span></div>
        <?php endif; ?>
      </div>
    </div>

    <!-- NILAI RAPORT -->
    <div style="margin-top:20px;">
      <div class="form-section-title">📊 Nilai Raport</div>
      <table class="nilai-table">
        <thead><tr><th>#</th><th>Mata Pelajaran</th><th>Sem. 1</th><th>Sem. 2</th><th>Rata-rata</th></tr></thead>
        <tbody>
          <?php
          $mapel_list = [
            ['matematika', 'Matematika'],
            ['bind',       'Bahasa Indonesia'],
            ['ipa',        'IPA'],
            ['ips',        'IPS'],
            ['pkn',        'PKn'],
            ['agama',      'Agama'],
          ];
          foreach ($mapel_list as $i => [$key, $label]):
            $s1 = $siswa->{'nilai_'.$key.'_s1'};
            $s2 = $siswa->{'nilai_'.$key.'_s2'};
            $avg = ($s1 + $s2) / 2;
          ?>
          <tr>
            <td><?= $i+1 ?></td>
            <td><?= $label ?></td>
            <td><?= number_format($s1, 1) ?></td>
            <td><?= number_format($s2, 1) ?></td>
            <td><strong style="color:var(--biru)"><?= number_format($avg, 1) ?></strong></td>
          </tr>
          <?php endforeach; ?>
          <tr style="background:var(--biru-tua)!important;">
            <td colspan="4" style="color:#fff;font-weight:700;text-align:right;">Rata-rata Keseluruhan</td>
            <td style="color:var(--kuning);font-weight:900;font-size:15px;"><?= number_format($siswa->rata_rata_nilai, 2) ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="form-footer">
    <a href="<?= base_url('ppdb/seleksi') ?>" class="btn btn-outline">← Kembali ke Seleksi</a>
    <button onclick="window.print()" class="btn btn-primary">🖨️ Cetak Detail</button>
  </div>
</div>
