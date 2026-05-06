<?php
// index.php - File utama routing / dispatcher
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$page = $_GET['page'] ?? 'home';

// Whitelist halaman yang diizinkan
$allowed_pages = [
    'home', 'about', 'contact', 'login',
    'sekolah_list', 'jenis_list', 'jenis_form',
    'produk_detail'
];

if (!in_array($page, $allowed_pages)) {
    $page = 'home';
}

// Halaman yang butuh autentikasi
$protected_pages = ['jenis_form'];

if (in_array($page, $protected_pages)) {
    if (!isset($_SESSION['admin_id'])) {
        header("Location: index.php?page=login");
        exit();
    }

    // 🔥 hanya admin
    if ($_SESSION['admin_role'] != 'admin') {
        echo "<div class='alert alert-danger'>Akses hanya untuk ADMIN!</div>";
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio Selviya</title>
    <!-- Bootstrap CSS (Bootswatch - Lux Theme) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.2/dist/lux/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/tugas1_porto_selviya/css/style.css">
</head>
<body>

<?php
// Include header (carousel) - 12 grid
include 'header.php';
// Include menu (navbar) - 12 grid
include 'menu.php';
?>

<!-- MAIN CONTENT AREA -->
<div class="container my-4">
    <div class="row">

        <!-- SIDEBAR: 3 grid -->
        <div class="col-lg-3 col-md-4 mb-4">
            <?php include 'sidebar.php'; ?>
        </div>

        <!-- MAIN: 9 grid (halaman dinamis) -->
        <div class="col-lg-9 col-md-8">
            <?php
            // Tampil flash message jika ada
            if (isset($_SESSION['flash_message'])): ?>
                <div class="alert alert-<?= $_SESSION['flash_type'] ?? 'info' ?> alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    <?= htmlspecialchars($_SESSION['flash_message']) ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php
            unset($_SESSION['flash_message'], $_SESSION['flash_type']);
            endif;

            // Load halaman sesuai $page
            $file = $page . '.php';
            if (file_exists($file)) {
                include $file;
            } else {
                echo '<div class="alert alert-danger">Halaman <strong>' . htmlspecialchars($page) . '</strong> tidak ditemukan.</div>';
            }
            ?>
        </div>

    </div>
</div>

<?php include 'footer.php'; ?>
