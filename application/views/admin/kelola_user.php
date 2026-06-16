<div class="row mt-5 mb-5">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h2>Kelola User</h2>
                    <select id="yearFilter" class="form-control" style="width: auto;">
                        <option value="">Pilih Tahun Ajaran</option>
                        <option value="2024">2024-2025</option>
                        <option value="2025">2025-2026</option>
                        <option value="2026">2026-2027</option>
                    </select>
                </div>

                <table id="dataTable3" class="table table-hover" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Email</th>
                            <th>Tanggal Daftar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($users as $b): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($b['email']) ?></td>
                            <td>-</td>
                            <td>
                                <form method="post" action="<?= site_url('admin/hapus_user') ?>" style="display:inline;">
                                    <input type="hidden" name="iduser" value="<?= $b['id'] ?>">
                                    <button type="submit" class="btn btn-danger btn-sm" name="hapus"
                                        onclick="return confirm('Yakin ingin menghapus user ini?')">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
    // Hapus instance lama jika ada
    if ($.fn.DataTable.isDataTable('#dataTable3')) {
        $('#dataTable3').DataTable().destroy();
    }

    var table = $('#dataTable3').DataTable({
        dom: 'Bfrtip',
        buttons: ['print'],
        columnDefs: [{
            targets: [2],
            visible: true,
            searchable: true
        }]
    });

    // Filter berdasarkan tahun
    $('#yearFilter').on('change', function () {
        var selectedYear = $(this).val();
        if (selectedYear) {
            table.column(2).search('^' + selectedYear, true, false).draw();
        } else {
            table.column(2).search('').draw();
        }
    });
});
</script>