<?php
// header.php - 12 grid dengan Bootstrap Carousel (tanpa tag HTML duplikat)
?>
<!-- HEADER: 12 grid dengan Bootstrap Carousel -->
<div class="container-fluid p-0">
    <div class="row g-0">
        <div class="col-12">
            <!-- Bootstrap Carousel -->
            <div id="headerCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <!-- Indicators -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="2"></button>
                </div>

                <!-- Carousel Inner -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="carousel-bg carousel-bg-1 d-flex align-items-center justify-content-center">
                            <div class="carousel-caption-custom text-center text-white">
                                <h1 class="display-3 fw-bold">Halo, Saya Selviya Nurhuda!</h1>
                                <p class="lead fs-4">Mahasiswa Sistem Informasi yang Bersemangat</p>
                                <a href="index.php?page=home" class="btn btn-light btn-lg mt-2">
                                    <i class="fas fa-user me-2"></i>Kenali Saya
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-bg carousel-bg-2 d-flex align-items-center justify-content-center">
                            <div class="carousel-caption-custom text-center text-white">
                                <h1 class="display-3 fw-bold">Riwayat Pendidikan</h1>
                                <p class="lead fs-4">Perjalanan Akademik dari TK hingga Perguruan Tinggi</p>
                                <a href="index.php?page=jenis_list" class="btn btn-light btn-lg mt-2">
                                    <i class="fas fa-graduation-cap me-2"></i>Lihat Studi
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-bg carousel-bg-3 d-flex align-items-center justify-content-center">
                            <div class="carousel-caption-custom text-center text-white">
                                <h1 class="display-3 fw-bold">Hubungi Saya</h1>
                                <p class="lead fs-4">Mari Terhubung dan Berkolaborasi Bersama</p>
                                <a href="index.php?page=contact" class="btn btn-light btn-lg mt-2">
                                    <i class="fas fa-envelope me-2"></i>Kontak Saya
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#headerCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#headerCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </div>
</div>
