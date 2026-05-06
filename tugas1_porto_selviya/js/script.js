// script.js - Portofolio Selviya

// ===== Toggle Password Visibility =====
function togglePass(inputId, btn) {
    const input = document.getElementById(inputId);
    if (!input) return;
    const isPass = input.type === 'password';
    input.type = isPass ? 'text' : 'password';
    btn.innerHTML = isPass ? '<i class="fas fa-eye-slash"></i>' : '<i class="fas fa-eye"></i>';
}

// ===== Preview Foto Upload =====
function previewFoto(input) {
    const preview = document.getElementById('fotoPreview');
    if (!preview) return;
    preview.innerHTML = '';
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.className = 'rounded mt-2';
            img.style.maxHeight = '150px';
            preview.appendChild(img);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

// ===== Send Message (demo) =====
function sendMessage() {
    const form = document.getElementById('contactForm');
    if (!form) return;
    const inputs = form.querySelectorAll('input, textarea');
    let valid = true;
    inputs.forEach(i => { if (!i.value.trim()) valid = false; });

    if (!valid) {
        showAlert('Harap isi semua field sebelum mengirim!', 'warning');
        return;
    }

    showAlert('Pesan berhasil dikirim! Saya akan segera membalas.', 'success');
    inputs.forEach(i => i.value = '');
}

// ===== Show Alert Helper =====
function showAlert(msg, type = 'info') {
    const wrapper = document.createElement('div');
    wrapper.innerHTML = `
        <div class="alert alert-${type} alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>${msg}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    `;
    const content = document.querySelector('.page-content');
    if (content) content.prepend(wrapper);
    setTimeout(() => wrapper.remove(), 5000);
}

// ===== Navbar Active Link Highlight =====
document.addEventListener('DOMContentLoaded', function () {
    // Auto-close mobile navbar after click
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link:not(.dropdown-toggle)');
    const navCollapse = document.getElementById('navbarContent');
    navLinks.forEach(link => {
        link.addEventListener('click', function () {
            if (navCollapse && navCollapse.classList.contains('show')) {
                const toggle = document.querySelector('.navbar-toggler');
                if (toggle) toggle.click();
            }
        });
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });

    // Tooltip init
    const tooltipEls = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    tooltipEls.forEach(el => new bootstrap.Tooltip(el));
});
