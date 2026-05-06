<?php
// about.php - Hobby, Favorite Menu, Pengalaman Organisasi dengan Bootstrap Accordion
?>

<div class="page-content">
    <h2 class="section-title mb-4">
        <i class="fas fa-user me-2 text-primary"></i>About Me
    </h2>

    <p class="lead text-muted mb-4">
        Kenali saya lebih dekat! Berikut adalah beberapa hal tentang diri saya, 
        mulai dari hobi, makanan favorit, hingga pengalaman organisasi.
    </p>

    <!-- Bootstrap Accordion -->
    <div class="accordion accordion-flush shadow-sm rounded-3 overflow-hidden" id="aboutAccordion">

        <!-- HOBI -->
        <div class="accordion-item border-0">
            <h2 class="accordion-header" id="hobbyHeading">
                <button class="accordion-button fw-bold bg-primary text-white" type="button"
                        data-bs-toggle="collapse" data-bs-target="#hobbyCollapse">
                    <i class="fas fa-heart me-2"></i>Hobi Saya
                </button>
            </h2>
            <div id="hobbyCollapse" class="accordion-collapse collapse show" data-bs-parent="#aboutAccordion">
                <div class="accordion-body bg-light">
                    <div class="row">
                        <div class="col-md-3 col-6 mb-3 text-center">
                            <div class="hobby-icon mx-auto mb-2">
                                <i class="fas fa-book text-success fa-2x"></i>
                            </div>
                            <p class="fw-semibold mb-0">Olahraga</p>
                            <small class="text-muted">Volly & badmintoon</small>
                        </div>
                        <div class="col-md-3 col-6 mb-3 text-center">
                            <div class="hobby-icon mx-auto mb-2">
                                <i class="fas fa-music text-warning fa-2x"></i>
                            </div>
                            <p class="fw-semibold mb-0">Musik</p>
                            <small class="text-muted">Mendengarkan Lagu</small>
                        </div>
                        <div class="col-md-3 col-6 mb-3 text-center">
                            <div class="hobby-icon mx-auto mb-2">
                                <i class="fas fa-camera text-danger fa-2x"></i>
                            </div>
                            <p class="fw-semibold mb-0">Fotografi</p>
                            <small class="text-muted">Landscape & Portrait</small>
                        </div>

                        <div class="col-md-3 col-6 mb-3 text-center">
                            <div class="hobby-icon mx-auto mb-2">
                                <i class="fas fa-film text-primary fa-2x"></i>
                            </div>
                            <p class="fw-semibold mb-0">Nonton</p>
                            <small class="text-muted">Film & Series</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MAKANAN FAVORIT -->
        <div class="accordion-item border-0 border-top">
            <h2 class="accordion-header" id="foodHeading">
                <button class="accordion-button collapsed fw-bold" type="button"
                        data-bs-toggle="collapse" data-bs-target="#foodCollapse">
                    <i class="fas fa-utensils me-2 text-warning"></i>Makanan Favorit
                </button>
            </h2>
            <div id="foodCollapse" class="accordion-collapse collapse" data-bs-parent="#aboutAccordion">
                <div class="accordion-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="card border-warning border-2 h-100 text-center p-3">
                                <i class="fas fa-drumstick-bite text-warning fa-2x mb-2"></i>
                                <h6 class="fw-bold">Ayam Geprek</h6>
                                <small class="text-muted">Rasa khas dengan sambel matah!</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-success border-2 h-100 text-center p-3">
                                <i class="fas fa-bowl-food text-success fa-2x mb-2"></i>
                                <h6 class="fw-bold">Mie Ayam</h6>
                                <small class="text-muted">Mie ayam dengan kuah kaldu yang gurih dan topping yang lezat.</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-danger border-2 h-100 text-center p-3">
                                <i class="fas fa-pizza-slice text-danger fa-2x mb-2"></i>
                                <h6 class="fw-bold">Pizza</h6>
                                <small class="text-muted">Pizza dengan topping keju banyak adalah surga!</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-info border-2 h-100 text-center p-3">
                                <i class="fas fa-fish text-info fa-2x mb-2"></i>
                                <h6 class="fw-bold">Sushi</h6>
                                <small class="text-muted">Japanese food lover, terutama salmon roll.</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-primary border-2 h-100 text-center p-3">
                                <i class="fas fa-ice-cream text-primary fa-2x mb-2"></i>
                                <h6 class="fw-bold">Es Krim</h6>
                                <small class="text-muted">Dessert favorit, rasa matcha dan Keju.</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-secondary border-2 h-100 text-center p-3">
                                <i class="fas fa-mug-hot text-secondary fa-2x mb-2"></i>
                                <h6 class="fw-bold">Kopi Susu</h6>
                                <small class="text-muted">Minuman andalan.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       <!-- PENGALAMAN ORGANISASI -->
<div class="accordion-item border-0 border-top">
    <h2 class="accordion-header" id="orgHeading">
        <button class="accordion-button collapsed fw-bold" type="button"
                data-bs-toggle="collapse" data-bs-target="#orgCollapse">
            <i class="fas fa-users me-2 text-success"></i>Pengalaman Organisasi
        </button>
    </h2>

    <div id="orgCollapse" class="accordion-collapse collapse" data-bs-parent="#aboutAccordion">
        <div class="accordion-body">
            <div class="timeline">

                <!-- Karang Taruna -->
                <div class="timeline-item mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                
                                <div class="timeline-icon bg-primary text-white rounded-circle me-3 d-flex align-items-center justify-content-center"
                                     style="width:45px;height:45px;">
                                    <i class="fas fa-users"></i>
                                </div>

                                <div>
                                    <h6 class="fw-bold mb-1">Anggota Karang Taruna</h6>
                                    <span class="badge bg-primary mb-2">Lingkungan Rt06/06 | 2022–Sekarang</span>
                                    <p class="text-muted mb-0 small">
                                        Aktif dalam kegiatan sosial seperti kerja bakti, kegiatan pemuda, 
                                        dan program kemasyarakatan lainnya.
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Urban Nexus -->
                <div class="timeline-item mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-start">

                                <div class="timeline-icon bg-success text-white rounded-circle me-3 d-flex align-items-center justify-content-center"
                                     style="width:45px;height:45px;">
                                    <i class="fas fa-city"></i>
                                </div>

                                <div>
                                    <h6 class="fw-bold mb-1">Anggota Urban Nexus</h6>
                                    <span class="badge bg-success mb-2">Pergabungan Remaja Kota Depok | 2024–2025</span>
                                    <p class="text-muted mb-0 small">
                                        Berpartisipasi dalam kegiatan komunitas kreatif dan pengembagan kota serta terjun langsung untuk sosialisasi ke masyarakat
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Himpunan Mahasiswa -->
                <div class="timeline-item">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-start">

                                <div class="timeline-icon bg-warning text-white rounded-circle me-3 d-flex align-items-center justify-content-center"
                                     style="width:45px;height:45px;">
                                    <i class="fas fa-laptop"></i>
                                </div>

                                <div>
                                    <h6 class="fw-bold mb-1">Himpunan Mahasiswa Sistem Informasi</h6>
                                    <span class="badge bg-warning text-dark mb-2">Kampus | 2026–Sekarang</span>
                                    <p class="text-muted mb-0 small">
                                        Aktif dalam kegiatan organisasi kampus, membantu pelaksanaan acara, 
                                        serta berkontribusi dalam pengembangan mahasiswa.
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
