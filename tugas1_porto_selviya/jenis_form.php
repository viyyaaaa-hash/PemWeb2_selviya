<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php?page=login");
    exit();
}

require_once 'koneksi.php';
require_once 'models/M_input.php';

$id = intval($_GET['id'] ?? 0);
$data = ($id > 0) ? getStudiesById($conn, $id) : null;
$levels = getSemuaLevel($conn);
$isEdit = ($data !== null);
?>

<div class="container mt-4">
    <h3><?= $isEdit ? 'Edit Studies' : 'Tambah Studies' ?></h3>

    <form action="controller/Input.php" method="POST" enctype="multipart/form-data">

        <!-- ID -->
        <input type="hidden" name="id" value="<?= $data['id_input'] ?? '' ?>">

        <!-- Nama Sekolah -->
        <div class="mb-3">
            <label>Nama Sekolah</label>
            <input type="text" name="nama_sekolah" class="form-control"
                   value="<?= $data['nama_sekolah'] ?? '' ?>" required>
        </div>

        <!-- Level -->
        <div class="mb-3">
            <label>Level</label>
            <select name="id_level" class="form-control" required>
                <option value="">-- Pilih --</option>
                <?php while($lv = mysqli_fetch_assoc($levels)): ?>
                    <option value="<?= $lv['id_sekolah'] ?>"
                        <?= (isset($data['id_level']) && $data['id_level'] == $lv['id_sekolah']) ? 'selected' : '' ?>>
                        <?= $lv['nama_sekolah'] ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <!-- Tahun -->
        <div class="mb-3">
            <label>Tahun Lulus</label>
            <input type="text" name="tahun_lulus" class="form-control"
                   value="<?= $data['tahun_lulus'] ?? '' ?>">
        </div>

        <!-- Keterangan -->
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control"><?= $data['keterangan'] ?? '' ?></textarea>
        </div>

        <!-- Foto Sekolah -->
        <div class="mb-3">
            <label>Foto Sekolah</label>
            <input type="file" name="foto_sekolah" class="form-control" accept="image/*">
            <?php if (isset($data['foto_sekolah']) && !empty($data['foto_sekolah'])): ?>
                <small class="text-muted">Current: <?= htmlspecialchars($data['foto_sekolah']) ?></small>
            <?php endif; ?>
        </div>

        <!-- Button -->
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="index.php?page=jenis_list" class="btn btn-secondary">Kembali</a>

    </form>
</div>