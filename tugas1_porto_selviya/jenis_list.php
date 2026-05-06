<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once 'koneksi.php';
require_once 'models/M_input.php';

$result = getSemuaStudies($conn);
?>

<div class="page-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="section-title mb-0">
            <i class="fas fa-book-open me-2 text-primary"></i>My Studies
        </h2>

        <?php if (isset($_SESSION['admin_id'])): ?>
            <a href="index.php?page=jenis_form" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i>Tambah Studies
            </a>
        <?php endif; ?>
    </div>

    <div class="row g-4">
        <?php
        $no = 0;
        $colors = ['primary','success','warning','danger','info','secondary'];

        if ($result && mysqli_num_rows($result) > 0):
            while ($row = mysqli_fetch_assoc($result)):
                $color = $colors[$no % count($colors)];
                $no++;
        ?>
        <div class="col-md-6">
            <div class="card shadow-sm h-100">

                <!-- ICON -->
                <div class="bg-<?= $color ?> bg-opacity-10 d-flex align-items-center justify-content-center"
                     style="height:150px">
                    <i class="fas fa-school text-<?= $color ?>" style="font-size:4rem;"></i>
                </div>

                <!-- BODY -->
                <div class="card-body">
                    <h5 class="fw-bold">
                        <?= htmlspecialchars($row['nama_sekolah']) ?>
                    </h5>

                    <p class="text-muted small">
                        <?= htmlspecialchars($row['keterangan'] ?? '-') ?>
                    </p>

                    <span class="badge bg-<?= $color ?>">
                        <?= htmlspecialchars($row['level_nama'] ?? '-') ?>
                    </span>

                    <span class="badge bg-light text-dark border">
                        Lulus: <?= htmlspecialchars($row['tahun_lulus'] ?? '-') ?>
                    </span>
                </div>

                <!-- ACTION -->
                <?php if (isset($_SESSION['admin_id'])): ?>
                <div class="card-footer d-flex gap-2">

                    <a href="index.php?page=jenis_form&id=<?= $row['id_input'] ?>"
                       class="btn btn-warning btn-sm flex-fill">
                        Edit
                    </a>

                    <a href="controller/Input.php?action=hapus&id=<?= $row['id_input'] ?>"
                       class="btn btn-danger btn-sm flex-fill"
                       onclick="return confirm('Yakin hapus data?')">
                        Hapus
                    </a>

                </div>
                <?php endif; ?>

            </div>
        </div>

        <?php endwhile; else: ?>
            <div class="col-12 text-center">
                <p>Belum ada data</p>
            </div>
        <?php endif; ?>
    </div>
</div>