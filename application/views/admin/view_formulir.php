<!-- Foto Siswa -->
<div class="text-center mb-4">
    <img src="<?= base_url('user/' . ($siswa['berkas_foto'] ?? 'default.png')) ?>"
         alt="Foto Siswa" style="width:150px; height:auto; border:1px solid #ccc; border-radius:5px;">
    <h5 class="mt-2"><?= htmlspecialchars($siswa['namalengkap'] ?? '-') ?></h5>
    <span class="badge badge-<?= ($siswa['status'] == 'Verified') ? 'success' : 'warning' ?>">
        <?= $siswa['status'] ?? 'Pending' ?>
    </span>
</div>

<!-- Data Pribadi -->
<h5 class="border-bottom pb-2 mb-3">Data Pribadi</h5>
<table class="table table-bordered table-sm mb-4">
    <tr><th width="30%">NIK</th><td><?= $siswa['nik'] ?? '-' ?></td></tr>
    <tr><th>NISN</th><td><?= $siswa['nisn'] ?? '-' ?></td></tr>
    <tr><th>Nama Lengkap</th><td><?= htmlspecialchars($siswa['namalengkap'] ?? '-') ?></td></tr>
    <tr><th>Jenis Kelamin</th><td><?= $siswa['jeniskelamin'] ?? '-' ?></td></tr>
    <tr><th>Tempat Lahir</th><td><?= $siswa['tempatlahir'] ?? '-' ?></td></tr>
    <tr><th>Tanggal Lahir</th><td><?= $siswa['tanggallahir'] ?? '-' ?></td></tr>
    <tr><th>Alamat</th><td><?= htmlspecialchars($siswa['alamat'] ?? '-') ?></td></tr>
    <tr><th>No. Telepon</th><td><?= $siswa['notelepon'] ?? '-' ?></td></tr>
    <tr><th>Email</th><td><?= $siswa['email'] ?? '-' ?></td></tr>
    <tr><th>Sekolah Asal</th><td><?= $siswa['sekolahasal'] ?? '-' ?></td></tr>
    <tr><th>Jalur</th><td><?= $siswa['jalur'] ?? '-' ?></td></tr>
    <tr><th>Skor Total</th><td><?= $siswa['skor_total'] ?? '-' ?></td></tr>
</table>

<!-- Dokumen -->
<h5 class="border-bottom pb-2 mb-3">Dokumen</h5>
<div class="row">
    <div class="col-md-6 text-center mb-3">
        <p><strong>Akta Kelahiran</strong></p>
        <img src="<?= base_url('user/' . ($siswa['berkas_akta'] ?? '')) ?>"
             class="img-fluid border" style="max-height:300px;">
    </div>
    <div class="col-md-6 text-center mb-3">
        <p><strong>Kartu Keluarga</strong></p>
        <img src="<?= base_url('user/' . ($siswa['berkas_kk'] ?? '')) ?>"
             class="img-fluid border" style="max-height:300px;">
    </div>
    <div class="col-md-6 text-center mb-3">
        <p><strong>Rapor</strong></p>
        <img src="<?= base_url('user/' . ($siswa['berkas_rapor'] ?? '')) ?>"
             class="img-fluid border" style="max-height:300px;">
    </div>
    <div class="col-md-6 text-center mb-3">
        <p><strong>Ijazah</strong></p>
        <img src="<?= base_url('user/' . ($siswa['berkas_ijazah'] ?? '')) ?>"
             class="img-fluid border" style="max-height:300px;">
    </div>
</div>