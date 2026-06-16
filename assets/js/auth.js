// ── Tab switching ──
function switchTab(tab) {
    document.querySelectorAll('.tab-btn').forEach(function(b) {
        b.classList.remove('active');
    });
    document.querySelectorAll('.form-panel').forEach(function(p) {
        p.classList.remove('active');
    });
    document.querySelector('.tab-btn[data-tab="' + tab + '"]').classList.add('active');
    document.getElementById('panel-' + tab).classList.add('active');
}

document.querySelectorAll('.tab-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
        switchTab(this.dataset.tab);
    });
});

// ── Toggle password visibility ──
document.querySelectorAll('.toggle-pw').forEach(function(btn) {
    btn.addEventListener('click', function() {
        var input = this.previousElementSibling;
        var isText = input.type === 'text';
        input.type = isText ? 'password' : 'text';
        this.querySelector('i').className = isText
            ? 'fas fa-eye-slash'
            : 'fas fa-eye';
    });
});

// ── Password strength meter ──
var pwInput      = document.getElementById('reg-password');
var strengthWrap = document.querySelector('.pw-strength');
var strengthFill = document.querySelector('.strength-fill');
var strengthLbl  = document.querySelector('.pw-strength span');

if (pwInput) {
    pwInput.addEventListener('input', function() {
        var val = this.value;
        if (!val) {
            strengthWrap.classList.remove('show');
            return;
        }
        strengthWrap.classList.add('show');

        var score = 0;
        if (val.length >= 8)             score++;
        if (/[A-Z]/.test(val))           score++;
        if (/[0-9]/.test(val))           score++;
        if (/[^A-Za-z0-9]/.test(val))    score++;

        var levels = [
            { w: '25%',  bg: '#ef5350', label: 'Lemah' },
            { w: '50%',  bg: '#ff9800', label: 'Cukup' },
            { w: '75%',  bg: '#42a5f5', label: 'Kuat' },
            { w: '100%', bg: '#1a2f7a', label: 'Sangat Kuat' },
        ];
        var lvl = levels[score - 1] || levels[0];
        strengthFill.style.width      = lvl.w;
        strengthFill.style.background = lvl.bg;
        strengthLbl.textContent       = lvl.label;
        strengthLbl.style.color       = lvl.bg;
    });
}

// ── Confirm password match ──
var confirmInput = document.getElementById('reg-confirm');
if (confirmInput) {
    confirmInput.addEventListener('input', function() {
        var pw = document.getElementById('reg-password').value;
        this.style.borderColor = (this.value && this.value !== pw)
            ? '#ef5350'
            : '';
    });
}

// ── Auto-switch tab dari URL hash ──
(function() {
    if (window.location.hash === '#register') {
        switchTab('register');
    }
})();