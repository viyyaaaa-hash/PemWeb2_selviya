<?php
// sidebar.php - 3 grid dengan Bootstrap List Group
// CATATAN: session sudah di-start di index.php
$page = $_GET['page'] ?? 'home';
?>

<!-- SIDEBAR: 3 grid dengan Bootstrap List Group -->
<div class="card shadow-sm border-0 mb-4 sidebar-card">
    <div class="card-header bg-primary text-white">
        <h6 class="mb-0"><i class="fas fa-bars me-2"></i>Navigasi Cepat</h6>
    </div>
    <div class="list-group list-group-flush">
        <a href="index.php?page=home"
           class="list-group-item list-group-item-action <?= ($page=='home')?'active':'' ?>">
            <i class="fas fa-home me-2"></i>Home
        </a>
        <a href="index.php?page=about"
           class="list-group-item list-group-item-action <?= ($page=='about')?'active':'' ?>">
            <i class="fas fa-user me-2"></i>About Me
        </a>
        <a href="index.php?page=contact"
           class="list-group-item list-group-item-action <?= ($page=='contact')?'active':'' ?>">
            <i class="fas fa-envelope me-2"></i>Contact Me
        </a>
        <a href="index.php?page=sekolah_list"
           class="list-group-item list-group-item-action <?= ($page=='sekolah_list')?'active':'' ?>">
            <i class="fas fa-layer-group me-2"></i>Level Pendidikan
        </a>
        <a href="index.php?page=jenis_list"
           class="list-group-item list-group-item-action <?= ($page=='jenis_list')?'active':'' ?>">
            <i class="fas fa-book-open me-2"></i>Studies
        </a>
    </div>
</div>

<!-- Sidebar Info Card -->
<div class="card shadow-sm border-0 mb-4 sidebar-card">
    <div class="card-header bg-success text-white">
        <h6 class="mb-0"><i class="fas fa-info-circle me-2"></i>Info</h6>
    </div>
    <div class="card-body p-0">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <small class="text-muted d-block">Nama</small>
                <strong>Selviya Nurhuda</strong>
            </li>
            <li class="list-group-item">
                <small class="text-muted d-block">Program Studi</small>
                <strong>Sistem Informasi</strong>
            </li>
            <li class="list-group-item">
                <small class="text-muted d-block">Universitas</small>
                <strong>STT Nurul Fikri</strong>
            </li>
            <li class="list-group-item">
                <small class="text-muted d-block">Semester</small>
                <strong>II</strong>
            </li>
        </ul>
    </div>
</div>

<!-- Login status widget -->
<div class="card shadow-sm border-0 sidebar-card">
    <div class="card-header <?= isset($_SESSION['admin_id']) ? 'bg-warning' : 'bg-secondary' ?> text-white">
        <h6 class="mb-0">
            <i class="fas <?= isset($_SESSION['admin_id']) ? 'fa-user-check' : 'fa-lock' ?> me-2"></i>
            <?= isset($_SESSION['admin_id']) ? 'Status Login' : 'Area Admin' ?>
        </h6>
    </div>
    <div class="card-body text-center">
        <?php if (isset($_SESSION['admin_id'])): ?>
            <p class="mb-1 text-success fw-bold">
                <i class="fas fa-check-circle me-1"></i>Sudah Login
            </p>
            <small class="text-muted d-block mb-2"><?= htmlspecialchars($_SESSION['admin_nama']) ?></small>
            <a href="logout.php" class="btn btn-sm btn-outline-danger w-100">
                <i class="fas fa-sign-out-alt me-1"></i>Logout
            </a>
        <?php else: ?>
            <p class="mb-2 text-muted small">Login untuk mengakses fitur CRUD</p>
            <a href="index.php?page=login" class="btn btn-sm btn-primary w-100">
                <i class="fas fa-sign-in-alt me-1"></i>Login
            </a>
        <?php endif; ?>
    </div>
</div>
