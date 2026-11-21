/**
 * Helper JS minimal untuk template KosManage.
 * Sidebar drawer mobile sudah ditangani langsung oleh Bootstrap 5 Offcanvas.
 */
document.addEventListener('DOMContentLoaded', function () {
    // Toggle lihat/sembunyikan password pada form auth
    document.querySelectorAll('[data-toggle-password]').forEach(function (button) {
        button.addEventListener('click', function () {
            const targetSelector = button.getAttribute('data-toggle-password');
            const input = document.querySelector(targetSelector);
            const icon = button.querySelector('i');

            if (!input) {
                return;
            }

            const isPassword = input.getAttribute('type') === 'password';
            input.setAttribute('type', isPassword ? 'text' : 'password');

            if (icon) {
                icon.classList.toggle('bi-eye', !isPassword);
                icon.classList.toggle('bi-eye-slash', isPassword);
            }
        });
    });
});

