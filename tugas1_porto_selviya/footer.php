<?php
// footer.php - 12 grid dengan Bootstrap Alerts
?>

<!-- FOOTER: 12 grid dengan Bootstrap Alerts -->
<div class="container-fluid bg-dark text-white mt-5 p-0">
    <div class="row g-0">
        <div class="col-12">
            <footer class="footer-section py-4">
                <div class="container">
                    <!-- Bootstrap Alerts sebagai info section -->
                    <div class="row mb-3">
                        <div class="col-md-4 mb-2">
                            <div class="alert alert-primary mb-0 py-2">
                                <i class="fas fa-map-marker-alt me-2"></i>
                                <strong>Lokasi:</strong> Depok, Jawa Barat
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="alert alert-success mb-0 py-2">
                                <i class="fas fa-envelope me-2"></i>
                                <strong>Email:</strong> selviyanurhuda@email.com
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="alert alert-warning mb-0 py-2">
                                <i class="fas fa-phone me-2"></i>
                                <strong>Phone:</strong> +62 85780250272
                            </div>
                        </div>
                    </div>

                    <!-- Footer Bottom -->
                    <hr class="border-secondary">
                    <div class="row align-items-center">
                        <div class="col-md-6 text-center text-md-start">
                            <p class="mb-0 small text-white">
                                &copy; <?= date('Y') ?> <strong class="text-white">Selviya</strong> — Portofolio Pribadi.
                                Dibuat dengan <i class="fas fa-heart text-danger"></i> menggunakan Bootstrap.
                            </p>
                        </div>
                        <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
                            <a href="https://github.com/viyyaaaa-hash" class="text-white me-3 fs-5" target="_blank" title="GitHub">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="https://instagram.com/selviyaluvr?igsh=MTl2YmYwNXIxNG00dg==" class="text-white me-3 fs-5" target="_blank" title="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="https://www.linkedin.com/in/selviya-nurhuda-660bbb39b?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" class="text-white me-3 fs-5" target="_blank" title="LinkedIn">
                                <i class="fab fa-linkedin"></i>
                            </a>
                            <a href="https://wa.me/qr/BU5SJMXZ43HQP1" class="text-white fs-5" target="_blank" title="WhatsApp">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</div>

<!-- Bootstrap JS Bundle (hanya di sini, 1 kali) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Custom JS -->
<script src="js/script.js"></script>
</body>
</html>
