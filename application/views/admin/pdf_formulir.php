<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; padding: 0 20px; }
        h3 { text-align: center; margin-bottom: 10px; }
        hr { margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 15px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; vertical-align: top; }
        th { background-color: #f2f2f2; }
        .full-page { page-break-before: always; width: 100%; text-align: center; margin-bottom: 20px; }
        .full-page img { width: 14cm; height: 20cm; object-fit: contain; }
    </style>
</head>
<body>
    <h3>Formulir Pendaftaran Siswa Baru<br>SMP Negeri 100 Maluku Tengah</h3>
    <br><hr/>

    <table>
        <tr><th colspan="3">Data Pribadi</th></tr>
        <tr>
            <td rowspan="8" style="width:150px; text-align:center;">
                <?php if (!empty($siswa['foto'])): ?>
                    <img src="<?= base_url('user/' . $siswa['foto']) ?>" style="width:100%; height:auto;">
                <?php else: ?>
                    <span>Tidak ada foto</span>
                <?php endif; ?>
            </td>
            <td><strong>NIK</strong></td>
            <td><?= $siswa['nik'] ?? '-' ?></td>
        </tr>
        <tr><td><strong>Nama Lengkap</strong></td><td><?= htmlspecialchars($siswa['nama'] ?? '-') ?></td></tr>
        <tr><td><strong>Jenis Kelamin</strong></td><td><?= $siswa['jeniskelamin'] ?? '-' ?></td></tr>
        <tr><td><strong>Tempat Lahir</strong></td><td><?= $siswa['tempatlahir'] ?? '-' ?></td></tr>
        <tr><td><strong>Tanggal Lahir</strong></td><td><?= $siswa['tanggallahir'] ?? '-' ?></td></tr>
        <tr><td><strong>Alamat Lengkap</strong></td><td><?= htmlspecialchars($siswa['alamat'] ?? '-') ?></td></tr>
        <tr><td><strong>Agama</strong></td><td><?= $siswa['agama'] ?? '-' ?></td></tr>
        <tr><td><strong>No Telepon</strong></td><td><?= $siswa['telepon'] ?? '-' ?></td></tr>
        <tr><td><strong>Provinsi</strong></td><td colspan="2"><?= $prov ?? '-' ?></td></tr>
        <tr><td><strong>Kota/Kabupaten</strong></td><td colspan="2"><?= $kab ?? '-' ?></td></tr>
        <tr><td><strong>Kecamatan</strong></td><td colspan="2"><?= $kec ?? '-' ?></td></tr>
        <tr><td><strong>Kelurahan</strong></td><td colspan="2"><?= $kel ?? '-' ?></td></tr>
    </table>

    <?php if ($showWali): ?>
    <table>
        <tr><th colspan="2">Data Wali</th></tr>
        <tr><td><strong>NIK Wali</strong></td><td><?= $siswa['walinik'] ?? '-' ?></td></tr>
        <tr><td><strong>Nama Wali</strong></td><td><?= htmlspecialchars($siswa['walinama'] ?? '-') ?></td></tr>
        <tr><td><strong>Pekerjaan Wali</strong></td><td><?= $siswa['walipekerjaan'] ?? '-' ?></td></tr>
        <tr><td><strong>No Telepon Wali</strong></td><td><?= $siswa['walitelepon'] ?? '-' ?></td></tr>
    </table>
    <?php else: ?>
    <table>
        <tr><th colspan="2">Data Orang Tua</th></tr>
        <tr><td><strong>NIK Ayah</strong></td><td><?= $siswa['ayahnik'] ?? '-' ?></td></tr>
        <tr><td><strong>Nama Ayah</strong></td><td><?= htmlspecialchars($siswa['ayahnama'] ?? '-') ?></td></tr>
        <tr><td><strong>Pendidikan Ayah</strong></td><td><?= $siswa['ayahpendidikan'] ?? '-' ?></td></tr>
        <tr><td><strong>Pekerjaan Ayah</strong></td><td><?= $siswa['ayahpekerjaan'] ?? '-' ?></td></tr>
        <tr><td><strong>Penghasilan Ayah</strong></td><td><?= $siswa['ayahpenghasilan'] ?? '-' ?></td></tr>
        <tr><td><strong>No Telepon Ayah</strong></td><td><?= $siswa['ayahtelepon'] ?? '-' ?></td></tr>
        <tr><td><strong>NIK Ibu</strong></td><td><?= $siswa['ibunik'] ?? '-' ?></td></tr>
        <tr><td><strong>Nama Ibu</strong></td><td><?= htmlspecialchars($siswa['ibunama'] ?? '-') ?></td></tr>
        <tr><td><strong>Pendidikan Ibu</strong></td><td><?= $siswa['ibupendidikan'] ?? '-' ?></td></tr>
        <tr><td><strong>Pekerjaan Ibu</strong></td><td><?= $siswa['ibupekerjaan'] ?? '-' ?></td></tr>
        <tr><td><strong>Penghasilan Ibu</strong></td><td><?= $siswa['ibupenghasilan'] ?? '-' ?></td></tr>
        <tr><td><strong>No Telepon Ibu</strong></td><td><?= $siswa['ibutelepon'] ?? '-' ?></td></tr>
    </table>
    <?php endif; ?>

    <?php if (!empty($siswa['scanijazahdepan'])): ?>
    <div class="full-page">
        <img src="<?= base_url('user/' . $siswa['scanijazahdepan']) ?>">
    </div>
    <?php endif; ?>

    <?php if (!empty($siswa['scanijazahbelakang'])): ?>
    <div class="full-page">
        <img src="<?= base_url('user/' . $siswa['scanijazahbelakang']) ?>">
    </div>
    <?php endif; ?>
</body>
</html>