/**
 * login.js  –  Halaman Login
 * SMP Negeri 1 Pulau Haruku  |  2025/2026
 * Path : assets/js/login.js
 */

/* ── TOGGLE SHOW / HIDE PASSWORD ───────────────────────── */
(function () {
    const input   = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');

    if (!input || !eyeIcon) return;

    eyeIcon.addEventListener('click', function () {
        const isHidden  = input.type === 'password';
        input.type      = isHidden ? 'text' : 'password';
        eyeIcon.textContent = isHidden ? '🙈' : '👁';
    });
})();