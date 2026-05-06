<?php
// produk_detail.php - Detail Studies
session_start();
require_once 'koneksi.php';
require_once 'models/M_input.php';

$id   = intval($_GET['id'] ?? 0);
$data = getStudiesById($conn, $id);

if (!$data) {
    echo '<div class="alert alert-danger"><i class="fas fa-exclamation-circle me-2"></i>Data tidak ditemukan.</div>';
    exit();
}
?>

<div class="page-content">
    <div class="d-flex align-items-center mb-4">
        <a href="index.php?page=jenis_list" class="btn btn-outline-secondary me-3">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h2 class="section-title mb-0">
            <i class="fas fa-info-circle me-2 text-primary"></i>Detail Studies
        </h2>
    </div>

    <div class="card border-0 shadow">
        <div class="row g-0">
            <!-- Foto Sekolah -->
            <div class="col-md-4 bg-primary d-flex align-items-center justify-content-center"
                 style="min-height:250px">
                <?php if (!empty($data['foto_sekolah']) && file_exists('img/' . $data['foto_sekolah'])): ?>
                    <img src="img/<?= htmlspecialchars($data['foto_sekolah']) ?>"
                         class="img-fluid rounded-start" style="max-height:300px; object-fit:cover; width:100%"
                         alt="<?= htmlspecialchars($data['nama']) ?>">
                <?php else: ?>
                    <div class="text-center p-4">
                        <i class="fas fa-school text-white" style="font-size:5rem; opacity:0.6"></i>
                        <p class="text-white-50 mt-2 mb-0">Tidak ada foto</p>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Info -->
            <div class="col-md-8">
                <div class="card-body p-4">
                    <div class="mb-2">
                        <span class="badge bg-primary fs-6 mb-2">
                            <?= htmlspecialchars($data['level_nama'] ?? 'Level Tidak Diketahui') ?>
                        </span>
                    </div>
                    <h3 class="card-title fw-bold"><?= htmlspecialchars($data['nama']) ?></h3>
                    <hr>

                    <table class="table table-borderless mb-3">
                        <tr>
                            <td width="35%" class="fw-semibold text-muted">
                                <i class="fas fa-layer-group me-2 text-primary"></i>Level
                            </td>
                            <td><?= htmlspecialchars($data['level_nama'] ?? '-') ?></td>
                        </tr>
                        <tr>
                            <td class="fw-semibold text-muted">
                                <i class="fas fa-calendar me-2 text-success"></i>Tahun Lulus
                            </td>
                            <td><?= htmlspecialchars($data['tahun_lulus'] ?? '-') ?></td>
                        </tr>
                        <tr>
                            <td class="fw-semibold text-muted align-top">
                                <i class="fas fa-align-left me-2 text-info"></i>Keterangan
                            </td>
                            <td><?= nl2br(htmlspecialchars($data['keterangan'] ?? '-')) ?></td>
                        </tr>
                    </table>

                    <div class="d-flex gap-2">
                        <?php if (isset($_SESSION['admin_id'])): ?>
                        <a href="index.php?page=jenis_form&id=<?= $data['id'] ?>"
                           class="btn btn-warning">
                            <i class="fas fa-edit me-1"></i>Edit
                        </a>
                        <a href="controller/Input.php?action=hapus_produk&id=<?= $data['id'] ?>"
                           class="btn btn-danger"
                           onclick="return confirm('Hapus data ini?')">
                            <i class="fas fa-trash me-1"></i>Hapus
                        </a>
                        <?php endif; ?>
                        <a href="index.php?page=jenis_list" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-1"></i>Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
