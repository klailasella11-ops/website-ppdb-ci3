/* ============================================================
   main.js — SMP Negeri 100 Maluku Tengah
   ============================================================ */

/* ---- HERO SLIDER ---- */
let current = 0;
const slides = document.querySelectorAll('.hero-slide');
const dots   = document.querySelectorAll('.dot');

function goSlide(n) {
  slides[current].classList.remove('active');
  dots[current].classList.remove('active');
  current = (n + slides.length) % slides.length;
  slides[current].classList.add('active');
  dots[current].classList.add('active');
}
function changeSlide(dir) { goSlide(current + dir); }
setInterval(() => changeSlide(1), 5000);

/* ---- HAMBURGER MENU ---- */
function toggleNav() {
  const nav = document.getElementById('navLinks');
  const btn = document.getElementById('hamburger');
  nav.classList.toggle('open');
  btn.classList.toggle('open');
}

/* ---- DROPDOWN MOBILE ---- */
document.querySelectorAll('.nav-dropdown > a').forEach(link => {
  link.addEventListener('click', function(e) {
    if (window.innerWidth <= 768) {
      e.preventDefault();
      this.closest('.nav-dropdown').classList.toggle('open');
    }
  });
});

/* ---- REVEAL ON SCROLL ---- */
const revealObs = new IntersectionObserver(entries => {
  entries.forEach(e => {
    if (e.isIntersecting) e.target.classList.add('visible');
  });
}, { threshold: 0.12 });
document.querySelectorAll('.reveal').forEach(el => revealObs.observe(el));

/* ---- COUNTER ANIMASI STATS ---- */
function animateCounter(el) {
  const target = +el.getAttribute('data-target');
  let count = 0;
  const step = Math.ceil(target / 60);
  const t = setInterval(() => {
    count = Math.min(count + step, target);
    el.textContent = count + (target >= 100 ? '+' : '');
    if (count >= target) clearInterval(t);
  }, 28);
}
const statBar = document.querySelector('.stats-bar');
const statObs = new IntersectionObserver(entries => {
  entries.forEach(e => {
    if (e.isIntersecting) {
      e.target.querySelectorAll('.stat-num').forEach(animateCounter);
      statObs.unobserve(e.target);
    }
  });
}, { threshold: 0.3 });
if (statBar) statObs.observe(statBar);

/* ---- SCROLL: BACK TO TOP & NAVBAR SHRINK ---- */
window.addEventListener('scroll', () => {
  document.getElementById('backTop').classList.toggle('show', window.scrollY > 400);
  document.getElementById('navbar').classList.toggle('scrolled', window.scrollY > 60);
});
