<div class="row mt-5 mb-5">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h2>Kelola Admin</h2>
                    <button data-toggle="modal" data-target="#modalTambahAdmin" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Tambah Admin Baru
                    </button>
                </div>

                <table id="dataTable3" class="table table-hover" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($admins as $b): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($b['email']) ?></td>
                            <td>
                                <!-- Hapus Admin -->
                                <form method="post" action="<?= site_url('admin/hapus_admin') ?>" style="display:inline;">
                                    <input type="hidden" name="idadmin" value="<?= $b['id'] ?>">
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        name="hapus"
                                        onclick="return confirm('Yakin ingin menghapus admin ini?')">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button>
                                </form>
                                <!-- Reset Password -->
                                <a href="<?= site_url('admin/reset_password/' . $b['id']) ?>"
                                   class="btn btn-warning btn-sm"
                                   onclick="return confirm('Reset password admin ini?')">
                                    <i class="fa fa-key"></i> Reset Password
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Admin -->
<div id="modalTambahAdmin" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Admin Baru</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="<?= site_url('admin/tambah_admin') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Email</label>
                        <input name="adminemail" type="email" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="adminpassword" type="password" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <input name="adminbaru" type="submit" class="btn btn-primary" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
    $('#dataTable3').DataTable();
});
</script>