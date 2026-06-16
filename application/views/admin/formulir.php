<div class="row mt-5 mb-5">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h2>Data Formulir Pendaftaran</h2>
                    <select id="yearFilter" class="form-control" style="width: auto;">
                        <option value="">Pilih Tahun Ajaran</option>
                        <option value="2024">2025-2026</option>
                        <option value="2025">2026-2027</option>
                        <option value="2026">2027-2028</option>
                    </select>
                </div>

                <table id="dataTable3" class="table table-hover" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>NIK</th>
                            <th>Status</th>
                            <th>Tgl Konfirmasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

<?php $no = 1; ?>

<?php foreach($formulir as $f): ?>

<tr>

    <td><?= $no++; ?></td>

    <td>
        <?= $f['namalengkap']; ?>
    </td>

    <td>
        <?= $f['nik']; ?>
    </td>

    <td>

        <?php if($f['status'] == 'pending'): ?>

            <span class="badge bg-warning text-dark">
                Pending
            </span>

        <?php elseif($f['status'] == 'diterima'): ?>

            <span class="badge bg-success">
                Diterima
            </span>

        <?php else: ?>

            <span class="badge bg-danger">
                Ditolak
            </span>

        <?php endif; ?>

    </td>

    <td>
        <?= date('d M Y', strtotime($f['created_at'])); ?>
    </td>

    <td>

        <a href="<?= base_url('admin/view_formulir/'.$f['id']); ?>"
           class="btn btn-primary btn-sm">
           Detail
        </a>

        <a href="<?= base_url('admin/unduh/'.$f['nik']); ?>"
           class="btn btn-success btn-sm">
           PDF
        </a>

        <a href="<?= base_url('admin/hapus_formulir/'.$f['id']); ?>"
           class="btn btn-danger btn-sm"
           onclick="return confirm('Hapus data ini?')">
           Hapus
        </a>

    </td>

</tr>

<?php endforeach; ?>

</tbody>

<script>
$(document).ready(function () {
    if ($.fn.DataTable.isDataTable('#dataTable3')) {
        $('#dataTable3').DataTable().destroy();
    }

    var table = $('#dataTable3').DataTable({
        dom: 'Bfrtip',
        buttons: ['print', 'excel'],
        columnDefs: [{ targets: [4], searchable: true }]
    });

    $('#yearFilter').on('change', function () {
        var selectedYear = $(this).val();
        table.column(4).search(selectedYear ? '^' + selectedYear : '', true, false).draw();
    });
});
</script>