<?php
$page = $_GET['page'] ?? 'home';
?>

<div class="container-fluid p-0">
    <div class="row g-0">
        <div class="col-12">

            <nav class="navbar navbar-expand-lg navbar-dark shadow-sm" id="mainNav"
                 style="background: linear-gradient(90deg,#6b21a8,#9333ea);">

                <div class="container">

                    <!-- BRAND -->
                    <a class="navbar-brand fw-bold" href="index.php">
                        <i class="fas fa-star me-1 text-warning"></i> Selviya Nurhuda
                    </a>

                    <!-- TOGGLER -->
                    <button class="navbar-toggler" type="button"
                            data-bs-toggle="collapse" data-bs-target="#navbarContent">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarContent">

                        <!-- MENU KIRI -->
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                            <li class="nav-item">
                                <a class="nav-link <?= ($page == 'home') ? 'active fw-bold' : '' ?>"
                                   href="index.php?page=home">
                                    <i class="fas fa-home me-1"></i> Home
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link <?= ($page == 'about') ? 'active fw-bold' : '' ?>"
                                   href="index.php?page=about">
                                    <i class="fas fa-user me-1"></i> About Me
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link <?= ($page == 'contact') ? 'active fw-bold' : '' ?>"
                                   href="index.php?page=contact">
                                    <i class="fas fa-envelope me-1"></i> Contact
                                </a>
                            </li>

                            <!-- DROPDOWN -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle <?= (in_array($page, ['sekolah_list','jenis_list','jenis_form'])) ? 'active fw-bold' : '' ?>"
                                   href="#" data-bs-toggle="dropdown">
                                    <i class="fas fa-graduation-cap me-1"></i> My Studies
                                </a>

                                <ul class="dropdown-menu shadow">
                                    <li>
                                        <a class="dropdown-item"
                                           href="index.php?page=sekolah_list">
                                            Level
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                           href="index.php?page=jenis_list">
                                            Studies
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>

                        <!-- MENU KANAN -->
                        <ul class="navbar-nav ms-auto align-items-center">

                        <?php if (!isset($_SESSION['admin_id'])): ?>

                            <!-- LOGIN -->
                            <li class="nav-item">
                                <a class="nav-link"
                                   href="index.php?page=login"
                                   style="background: linear-gradient(135deg,#c084fc,#a855f7);
                                          color:white;border-radius:8px;padding:6px 14px;">
                                    <i class="fas fa-sign-in-alt me-1"></i> Login
                                </a>
                            </li>

                        <?php else: ?>

                            <!-- LOGOUT -->
                            <li class="nav-item">
                                <a class="nav-link"
                                   href="logout.php"
                                   onclick="return confirm('Yakin mau logout?')"
                                   style="background: linear-gradient(135deg,#ef4444,#dc2626);
                                          color:white;border-radius:8px;padding:6px 14px;">
                                    <i class="fas fa-sign-out-alt me-1"></i> Logout
                                </a>
                            </li>

                        <?php endif; ?>

                        </ul>

                    </div>
                </div>
            </nav>

        </div>
    </div>
</div>