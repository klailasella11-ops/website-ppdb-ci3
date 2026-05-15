/* ============================================================
   informasi.js — Halaman Informasi SMP Negeri 100 Maluku Tengah
   ============================================================ */

/* SCROLL REVEAL */
const revealObs = new IntersectionObserver(entries => {
  entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
}, { threshold: 0.12 });
document.querySelectorAll('.reveal').forEach(el => revealObs.observe(el));

/* BACK TO TOP & NAVBAR SHRINK + SIDEBAR HIGHLIGHT */
window.addEventListener('scroll', () => {
  document.getElementById('backTop').classList.toggle('show', window.scrollY > 400);
  document.getElementById('navbar').classList.toggle('scrolled', window.scrollY > 60);

  const navH = document.getElementById('navbar').offsetHeight;
  let cur = '';
  document.querySelectorAll('section[id]').forEach(s => {
    if (window.scrollY >= s.offsetTop - navH - 40) cur = s.id;
  });
  document.querySelectorAll('.sidebar-nav a').forEach(a => {
    a.classList.remove('active');
    if (a.getAttribute('href') === '#' + cur) a.classList.add('active');
  });
});

/* ORG TAB SWITCH */
function switchOrg(tab, e) {
  document.querySelectorAll('.org-panel').forEach(p => p.classList.remove('active'));
  document.getElementById('panel-' + tab).classList.add('active');
  document.querySelectorAll('.org-tab-btn').forEach(b => b.classList.remove('active'));
  if (e && e.currentTarget) e.currentTarget.classList.add('active');
  setTimeout(() => {
    document.querySelectorAll('#panel-' + tab + ' .reveal').forEach(el => {
      el.classList.remove('visible');
      setTimeout(() => el.classList.add('visible'), 50);
    });
  }, 10);
}

/* SCROLL KE ANCHOR SETELAH LOAD */
window.addEventListener('load', () => {
  if (location.hash) {
    const el = document.querySelector(location.hash);
    if (el) {
      const navH = document.getElementById('navbar').offsetHeight;
      setTimeout(() => {
        window.scrollTo({ top: el.offsetTop - navH - 8, behavior: 'smooth' });
      }, 100);
    }
  }
});
