<?php
// login.php

// Kalau sudah login → redirect sesuai role
if (isset($_SESSION['admin_id'])) {

    if ($_SESSION['admin_role'] == 'admin') {
        header("Location: index.php?page=jenis_list");
    } else {
        header("Location: index.php?page=home");
    }
    exit();
}
?>

<div class="page-content">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-5">

            <div class="card border-0 shadow-lg">

                <!-- HEADER -->
                <div class="card-header text-white text-center py-4"
                     style="background: linear-gradient(135deg,#a855f7,#c084fc);">
                    <i class="fas fa-user-lock fa-2x mb-2"></i>
                    <h4 class="fw-bold mb-0">Login</h4>
                    <small>Silakan masuk ke akun Anda</small>
                </div>

                <!-- BODY -->
                <div class="card-body p-4">

                    <!-- ERROR -->
                    <?php if (isset($_GET['error'])): ?>
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            <?php
                            if ($_GET['error'] == 'invalid') echo 'Username atau password salah!';
                            elseif ($_GET['error'] == 'empty') echo 'Harap isi semua field!';
                            ?>
                        </div>
                    <?php endif; ?>

                    <!-- FORM -->
                    <form action="controller/Input.php" method="POST">
                        <input type="hidden" name="action" value="login">

                        <!-- USERNAME -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                <i class="fas fa-user me-1 text-primary"></i> Username
                            </label>
                            <input type="text" name="username"
                                   class="form-control form-control-lg"
                                   placeholder="Masukkan username"
                                   required>
                        </div>

                        <!-- PASSWORD -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                <i class="fas fa-lock me-1 text-primary"></i> Password
                            </label>

                            <div class="input-group">
                                <input type="password"
                                       name="password"
                                       id="loginPass"
                                       class="form-control form-control-lg"
                                       placeholder="Masukkan password"
                                       required>

                                <button class="btn btn-outline-secondary"
                                        type="button"
                                        onclick="togglePass('loginPass', this)">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- BUTTON -->
                        <button type="submit"
                                class="btn w-100 text-white"
                                style="background: linear-gradient(135deg,#c084fc,#a855f7);">
                            <i class="fas fa-sign-in-alt me-2"></i> Login
                        </button>

                    </form>

                    <!-- INFO -->
                    <div class="mt-3 text-center">
                        <small class="text-muted">
                            Demo: <b>admin / admin123</b>
                        </small>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- SCRIPT SHOW PASSWORD -->
<script>
function togglePass(id, btn) {
    const input = document.getElementById(id);
    const icon = btn.querySelector("i");

    if (input.type === "password") {
        input.type = "text";
        icon.classList.replace("fa-eye", "fa-eye-slash");
    } else {
        input.type = "password";
        icon.classList.replace("fa-eye-slash", "fa-eye");
    }
}
</script>