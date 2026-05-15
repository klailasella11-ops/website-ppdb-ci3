<!-- HERO -->
<section class="hero" id="beranda">
  <div class="hero-slide slide-1 active"></div>
  <div class="hero-slide slide-2"></div>
  <div class="hero-slide slide-3"></div>
  <div class="hero-content">
    <div class="hero-badge">🏫 SEKOLAH NEGERI TERBAIK</div>
    <p class="welcome">Welcome to</p>
    <h1>SMP NEGERI 100<br>MALUKU TENGAH</h1>
    <div class="hero-divider"></div>
    <p class="tagline">Tempat tumbuh Generasi &mdash; Cerdas, Berkarakter dan Berprestasi</p>
    <div class="hero-btns">
      <a href="<?= base_url('ppdb') ?>" class="btn-hero btn-hero-primary">🎓 Daftar PPDB 2026</a>
      <a href="<?= base_url('informasi') ?>" class="btn-hero btn-hero-secondary">Profil Sekolah</a>
    </div>
  </div>
  <div class="arrow arrow-left" onclick="changeSlide(-1)">&#8249;</div>
  <div class="arrow arrow-right" onclick="changeSlide(1)">&#8250;</div>
  <div class="dots">
    <div class="dot active" onclick="goSlide(0)"></div>
    <div class="dot" onclick="goSlide(1)"></div>
    <div class="dot" onclick="goSlide(2)"></div>
  </div>
</section>

<!-- STATS BAR -->
<div class="stats-bar">
  <div class="stat-item reveal"><div class="stat-num" data-target="211">0</div><div class="stat-label">Siswa Aktif</div></div>
  <div class="stat-item reveal"><div class="stat-num" data-target="23">0</div><div class="stat-label">Tenaga Pengajar</div></div>
  <div class="stat-item reveal"><div class="stat-num" data-target="8">0</div><div class="stat-label">Rombel</div></div>
  <div class="stat-item reveal"><div class="stat-num" data-target="85">0</div><div class="stat-label">Prestasi Diraih</div></div>
</div>

<!-- VISI MISI -->
<section class="section section-alt" id="visi-misi">
  <div class="section-header reveal">
    <h2>VISI &amp; MISI</h2>
    <p>Landasan dan Arah Pendidikan SMP Negeri 100 Maluku Tengah</p>
    <div class="underline"></div>
  </div>
  <div class="visi-misi-grid">
    <div class="vm-card reveal">
      <span class="vm-icon">🎯</span>
      <h3>VISI</h3>
      <p>Terwujudnya sekolah yang unggul dalam berprestasi, berkarakter, berakar pada budaya bangsa, dan berwawasan lingkungan yang dilandasi IMTAQ dan IPTEK, serta melaksanakan program pembelajaran yang berpusat pada peserta didik.</p>
    </div>
    <div class="vm-card misi reveal">
      <span class="vm-icon">📋</span>
      <h3>MISI</h3>
      <ul>
        <li>Melaksanakan pembelajaran dan bimbingan secara efektif dan kompetitif;</li>
        <li>Mendorong dan membantu peserta didik mengenali potensi dirinya sehingga dapat dikembangkan secara optimal;</li>
        <li>Menumbuhkan semangat berprestasi secara intensif kepada seluruh warga sekolah;</li>
        <li>Membudayakan kegiatan 7S (senyum, sapa, sopan, santun, semangat dan sportif);</li>
        <li>Menumbuhkan dan melestarikan budaya lokal (daerah);</li>
        <li>Melaksanakan pembiasaan religius (ibadah, zikir, taat kepada ajaran agama);</li>
        <li>Mengembangkan minat dan bakat peserta didik sesuai dengan hobinya;</li>
        <li>Melaksanakan kurikulum terintegrasi dengan model dan strategi yang bersifat efektif dan menyenangkan;</li>
        <li>Memiliki sarana dan prasarana pendidikan memadai sesuai standar pelayanan minimal;</li>
        <li>Menumbuhkan kecintaan terhadap prestasi sekolah yang dapat menumbuhkan suasana partisipasi.</li>
      </ul>
    </div>
  </div>
</section>

<!-- BERITA -->
<section class="section" id="berita">
  <div class="section-header reveal">
    <h2>BERITA SEKOLAH</h2>
    <p>Informasi Seputar Kegiatan Sekolah</p>
    <div class="underline"></div>
  </div>
  <div class="berita-grid">
    <div class="berita-card reveal">
      <div class="berita-img">📰</div>
      <div class="berita-body">
        <span class="berita-tag">Kolaborasi</span>
        <p class="berita-date">20 April 2026</p>
        <h3>Kolaborasi Alumni dan Mahasiswa dalam Membangun Website Sekolah</h3>
        <p>Website ini merupakan hasil karya seorang alumni SMP Negeri 100 Maluku Tengah bersama rekan satu kampus sebagai bentuk kontribusi dalam mendukung digitalisasi informasi sekolah.</p>
      </div>
    </div>
    <div class="berita-card reveal">
      <div class="berita-img">🏆</div>
      <div class="berita-body">
        <span class="berita-tag">Prestasi</span>
        <p class="berita-date">15 April 2026</p>
        <h3>SEJARAH BARU! 3 siswa siswi pertama yang berhasil masuk ke salah satu Sekolah Menengah Atas Unggulan se-Maluku</h3>
        <p>Pada tahun 2021, sekolah menorehkan tonggak bersejarah melalui keberhasilan angkatan pertama yang berhasil menembus sekolah unggulan, yaitu SMA Negeri Siwalima Ambon.</p>
      </div>
    </div>
    <div class="berita-card reveal">
      <div class="berita-img">🎓</div>
      <div class="berita-body">
        <span class="berita-tag">Kegiatan</span>
        <p class="berita-date">10 April 2026</p>
        <h3>Kegiatan Penguatan Profil Pelajar Pancasila Semester Genap</h3>
        <p>Seluruh siswa mengikuti kegiatan projek Penguatan Profil Pelajar Pancasila semester ini...</p>
      </div>
    </div>
  </div>
  <a href="<?= base_url('berita') ?>" class="btn-more">Lihat Berita Lainnya</a>
</section>