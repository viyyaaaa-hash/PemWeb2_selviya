<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'koneksi.php';
require_once 'models/M_sekolah.php';

$result = getSemuaSekolah($conn);

// Cek edit
$editData = null;
if (isset($_GET['edit']) && isset($_SESSION['admin_id'])) {
    $editData = getSekolahById($conn, $_GET['edit']);
}
?>

<div class="page-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="section-title mb-0">
            <i class="fas fa-graduation-cap me-2 text-primary"></i>Riwayat Pendidikan
        </h2>

        <?php if (isset($_SESSION['admin_id'])): ?>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="fas fa-plus me-1"></i>Tambah Sekolah
        </button>
        <?php endif; ?>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Data Pendidikan</h5>
        </div>

        <div class="table-responsive">
            <table class="table table-striped mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama Level</th>
                        <?php if (isset($_SESSION['admin_id'])): ?>
                        <th class="text-center">Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1; ?>
                    <?php if ($result && mysqli_num_rows($result) > 0): ?>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $no++ ?></td>

                            <td>
                                <i class="fas fa-tag me-2 text-primary"></i>
                                <?= htmlspecialchars($row['nama_sekolah']) ?>
                            </td>

                            <?php if (isset($_SESSION['admin_id'])): ?>
                            <td class="text-center">
                                <a href="index.php?page=sekolah_list&edit=<?= $row['id_sekolah'] ?>"
                                   class="btn btn-sm btn-warning">
                                   <i class="fas fa-edit"></i>
                                </a>

                                <a href="controller/Sekolah.php?action=hapus&id=<?= $row['id_sekolah'] ?>"
                                   class="btn btn-sm btn-danger"
                                   onclick="return confirm('Hapus data ini?')">
                                   <i class="fas fa-trash"></i>
                                </a>
                            </td>
                            <?php endif; ?>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="text-center text-muted py-4">
                                Belum ada data
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php if (isset($_SESSION['admin_id'])): ?>

<!-- ================= TAMBAH ================= -->
<div class="modal fade" id="modalTambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="controller/Sekolah.php" method="POST">

                <div class="modal-header bg-primary text-white">
                    <h5>Tambah Level</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="action" value="simpan">
                    <input type="hidden" name="id" value="0">

                    <div class="mb-3">
                        <label>Nama Level</label>
                        <input type="text" name="nama_sekolah" class="form-control" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-primary">Simpan</button>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- ================= EDIT ================= -->
<?php if ($editData): ?>
<div class="modal fade show d-block" style="background:rgba(0,0,0,0.5)">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="controller/Sekolah.php" method="POST">

                <div class="modal-header bg-warning">
                    <h5>Edit Level</h5>
                    <a href="index.php?page=sekolah_list" class="btn-close"></a>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="action" value="simpan">
                    <input type="hidden" name="id" value="<?= $editData['id_sekolah'] ?>">

                    <div class="mb-3">
                        <label>Nama Level</label>
                        <input type="text" name="nama_sekolah" class="form-control"
                               value="<?= htmlspecialchars($editData['nama_sekolah']) ?>" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <a href="index.php?page=sekolah_list" class="btn btn-secondary">Batal</a>
                    <button class="btn btn-warning">Update</button>
                </div>

            </form>

        </div>
    </div>
</div>
<?php endif; ?>

<?php endif; ?>