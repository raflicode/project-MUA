<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Yayuk Makeover</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
  --gold: #C9A96E;
  --gold-light: #E8D5B0;
  --dark: #0F0D0B;
  --dark-mid: #1A1714;
  --cream: #F5EFE6;
  --text-muted: #8A7F74;
}

html { scroll-behavior: smooth; }
body { background: var(--dark); color: var(--cream); font-family: 'DM Sans', sans-serif; font-weight: 300; overflow-x: hidden; }

/* ── NAVBAR ── */
.navbar {
  position: fixed; top: 0; left: 0; right: 0; z-index: 100;
  display: flex; align-items: center; justify-content: space-between;
  padding: 1.2rem 2rem;
  background: linear-gradient(to bottom, rgba(15,13,11,0.9), transparent);
}
.nav-logo { font-family: 'Cormorant Garamond', serif; font-size: 1.2rem; color: var(--cream); letter-spacing: 0.1em; }
.nav-logo span { color: var(--gold); font-style: italic; }
.hamburger { background: none; border: none; cursor: pointer; display: flex; flex-direction: column; gap: 5px; padding: 4px; }
.hamburger span { display: block; width: 24px; height: 1.5px; background: var(--cream); }

/* ── SIDE MENU ── */
.side-menu {
  position: fixed; top: 0; right: -300px; width: 280px; height: 100vh;
  background: var(--dark-mid); border-left: 1px solid rgba(201,169,110,0.15);
  z-index: 200; transition: right 0.35s ease;
  display: flex; flex-direction: column; padding: 2rem;
}
.side-menu.open { right: 0; }
.side-menu-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; }
.side-menu-header .logo { font-family: 'Cormorant Garamond', serif; font-size: 1rem; color: var(--gold); font-style: italic; }
.close-btn { background: none; border: none; color: var(--cream); font-size: 1.5rem; cursor: pointer; }

.menu-user {
  display: flex; align-items: center; gap: 0.75rem;
  padding: 1rem; background: rgba(201,169,110,0.08); border-radius: 8px; margin-bottom: 1.5rem;
}
.menu-user-avatar {
  width: 40px; height: 40px; border-radius: 50%; background: var(--gold);
  display: flex; align-items: center; justify-content: center;
  font-size: 1rem; color: var(--dark); font-weight: 500; flex-shrink: 0;
}
.menu-user-name { font-size: 0.85rem; color: var(--cream); }
.menu-user-role { font-size: 0.7rem; color: var(--gold); margin-top: 2px; }

.menu-nav { list-style: none; flex: 1; }
.menu-nav li { border-bottom: 1px solid rgba(201,169,110,0.08); }
.menu-nav a { display: block; padding: 1rem 0.5rem; color: var(--cream); text-decoration: none; font-size: 0.9rem; transition: color 0.2s; }
.menu-nav a:hover { color: var(--gold); }

.menu-footer { margin-top: auto; padding-top: 1.5rem; border-top: 1px solid rgba(201,169,110,0.1); }
.btn-menu-login { display: block; width: 100%; padding: 0.8rem; background: var(--gold); color: var(--dark); text-align: center; text-decoration: none; font-size: 0.8rem; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 0.75rem; }
.btn-menu-signup { display: block; width: 100%; padding: 0.8rem; background: transparent; color: var(--cream); text-align: center; text-decoration: none; font-size: 0.8rem; letter-spacing: 0.1em; text-transform: uppercase; border: 1px solid rgba(255,255,255,0.2); }
.btn-menu-logout { display: block; width: 100%; padding: 0.8rem; background: transparent; color: #e05555; text-align: center; text-decoration: none; font-size: 0.8rem; letter-spacing: 0.1em; text-transform: uppercase; border: 1px solid rgba(224,85,85,0.3); }

.overlay { position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 150; opacity: 0; pointer-events: none; transition: opacity 0.3s; }
.overlay.show { opacity: 1; pointer-events: all; }

/* ── HERO ── */
.hero { position: relative; height: 100vh; overflow: hidden; }
.hero-img { width: 100%; height: 100%; object-fit: cover; object-position: center top; filter: brightness(0.55); }
.hero-overlay { position: absolute; inset: 0; background: linear-gradient(to top, var(--dark) 0%, rgba(15,13,11,0.2) 60%, transparent 100%); }
.hero-content { position: absolute; bottom: 10%; left: 50%; transform: translateX(-50%); text-align: center; width: 90%; max-width: 700px; }
.hero-eyebrow { font-size: 0.7rem; letter-spacing: 0.3em; text-transform: uppercase; color: var(--gold); margin-bottom: 1rem; }
.hero-title { font-family: 'Cormorant Garamond', serif; font-size: clamp(2.5rem, 6vw, 5rem); font-weight: 300; line-height: 1.1; margin-bottom: 1rem; }
.hero-title em { font-style: italic; color: var(--gold); }
.hero-sub { font-size: 0.95rem; color: var(--text-muted); margin-bottom: 2rem; line-height: 1.7; }
.btn-booking { display: inline-block; background: var(--gold); color: var(--dark); padding: 1rem 3rem; font-size: 0.8rem; letter-spacing: 0.2em; text-transform: uppercase; text-decoration: none; border-radius: 50px; transition: background 0.3s, transform 0.2s; }
.btn-booking:hover { background: var(--gold-light); transform: translateY(-2px); }

/* ── STATS ── */
.stats { background: var(--dark-mid); border-top: 1px solid rgba(201,169,110,0.15); border-bottom: 1px solid rgba(201,169,110,0.15); display: grid; grid-template-columns: repeat(4, 1fr); text-align: center; padding: 2.5rem 4rem; }
.stat-num { font-family: 'Cormorant Garamond', serif; font-size: 2.8rem; font-weight: 300; color: var(--gold); display: block; }
.stat-label { font-size: 0.7rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--text-muted); margin-top: 0.25rem; }

/* ── SECTION COMMONS ── */
.section-label { font-size: 0.7rem; letter-spacing: 0.3em; text-transform: uppercase; color: var(--gold); display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem; }
.section-label::before { content: ''; width: 2rem; height: 1px; background: var(--gold); }
.section-title { font-family: 'Cormorant Garamond', serif; font-size: clamp(2rem, 3vw, 3rem); font-weight: 300; line-height: 1.15; }
.section-title em { font-style: italic; color: var(--gold); }

/* ── ABOUT ── */
.about { display: grid; grid-template-columns: 1fr 1fr; gap: 5rem; align-items: center; padding: 6rem; background: var(--dark); }
.about-img-wrap { position: relative; }
.about-img-wrap::before { content: ''; position: absolute; top: -1.5rem; left: -1.5rem; right: 1.5rem; bottom: 1.5rem; border: 1px solid rgba(201,169,110,0.25); }
.about-img-wrap img { width: 100%; aspect-ratio: 4/5; object-fit: cover; filter: brightness(0.85); position: relative; z-index: 1; }
.about-text p { margin-top: 1.25rem; color: var(--text-muted); line-height: 1.9; font-size: 0.95rem; }
.about-features { margin-top: 2rem; display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem; }
.feature-item { display: flex; align-items: flex-start; gap: 0.5rem; font-size: 0.85rem; color: var(--cream); }
.feature-item::before { content: '✦'; color: var(--gold); font-size: 0.6rem; margin-top: 0.2rem; flex-shrink: 0; }

/* ── WHY US ── */
.why-us { padding: 6rem; background: var(--dark-mid); }
.why-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 2rem; margin-top: 3rem; }
.why-card { padding: 2.5rem 2rem; border: 1px solid rgba(201,169,110,0.12); transition: border-color 0.3s; }
.why-card:hover { border-color: rgba(201,169,110,0.4); }
.why-icon { font-size: 2rem; margin-bottom: 1.25rem; display: block; }
.why-title { font-family: 'Cormorant Garamond', serif; font-size: 1.25rem; font-weight: 400; margin-bottom: 0.75rem; }
.why-desc { font-size: 0.85rem; color: var(--text-muted); line-height: 1.7; }

/* ── GALLERY LAYANAN ── */
.gallery-section { padding: 6rem; background: var(--dark); }
.gallery-tabs { display: flex; gap: 0.5rem; margin-top: 2rem; margin-bottom: 3rem; flex-wrap: wrap; }
.tab-btn { padding: 0.5rem 1.5rem; background: transparent; border: 1px solid rgba(201,169,110,0.25); color: var(--text-muted); font-size: 0.75rem; letter-spacing: 0.1em; text-transform: uppercase; cursor: pointer; transition: all 0.2s; border-radius: 50px; }
.tab-btn:hover, .tab-btn.active { background: var(--gold); border-color: var(--gold); color: var(--dark); }
.layanan-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1px; background: rgba(201,169,110,0.1); }
.layanan-card { background: var(--dark-mid); padding: 2.5rem 2rem; position: relative; overflow: hidden; transition: background 0.3s; display: none; }
.layanan-card.show { display: block; }
.layanan-card::after { content: ''; position: absolute; bottom: 0; left: 0; width: 0; height: 2px; background: var(--gold); transition: width 0.4s; }
.layanan-card:hover { background: #1E1A16; }
.layanan-card:hover::after { width: 100%; }
.layanan-img-placeholder { width: 100%; aspect-ratio: 4/3; background: linear-gradient(135deg, #2a1f14, #1a1410); display: flex; align-items: center; justify-content: center; margin-bottom: 1.25rem; font-size: 2.5rem; }
.layanan-name { font-family: 'Cormorant Garamond', serif; font-size: 1.35rem; font-weight: 400; margin-bottom: 0.5rem; }
.layanan-desc { font-size: 0.82rem; color: var(--text-muted); line-height: 1.7; margin-bottom: 1rem; }
.layanan-price { font-size: 0.8rem; color: var(--gold); letter-spacing: 0.05em; font-weight: 500; }

/* ── CTA ── */
.cta-banner { background: var(--gold); padding: 5rem 6rem; display: grid; grid-template-columns: 1fr auto; align-items: center; gap: 4rem; }
.cta-banner h2 { font-family: 'Cormorant Garamond', serif; font-size: clamp(2rem, 3vw, 3rem); font-weight: 300; color: var(--dark); line-height: 1.2; }
.cta-banner h2 em { font-style: italic; }
.btn-dark { background: var(--dark); color: var(--gold); padding: 1rem 2.5rem; font-size: 0.8rem; letter-spacing: 0.15em; text-transform: uppercase; border: none; cursor: pointer; text-decoration: none; white-space: nowrap; transition: background 0.3s; }
.btn-dark:hover { background: #1A1714; }

/* ── RESPONSIVE ── */
@media (max-width: 900px) {
  .about { grid-template-columns: 1fr; padding: 3rem 1.5rem; gap: 2.5rem; }
  .why-us { padding: 3rem 1.5rem; }
  .why-grid { grid-template-columns: 1fr; gap: 1rem; }
  .gallery-section { padding: 3rem 1.5rem; }
  .layanan-grid { grid-template-columns: 1fr; }
  .stats { grid-template-columns: repeat(2, 1fr); padding: 2rem 1.5rem; }
  .cta-banner { grid-template-columns: 1fr; text-align: center; padding: 3rem 1.5rem; gap: 2rem; }
}
</style>
</head>
<body>

<div class="overlay" id="overlay" onclick="closeMenu()"></div>

<!-- NAVBAR -->
<nav class="navbar">
  <div class="nav-logo">Yayuk <span>Makeover</span></div>
  <button class="hamburger" onclick="openMenu()">
    <span></span><span></span><span></span>
  </button>
</nav>

<!-- SIDE MENU -->
<div class="side-menu" id="sideMenu">
  <div class="side-menu-header">
    <div class="logo">Yayuk Makeover</div>
    <button class="close-btn" onclick="closeMenu()">✕</button>
  </div>

  <?php if (isset($_SESSION['login']) && $_SESSION['login'] === true): ?>
    <div class="menu-user">
      <div class="menu-user-avatar"><?= strtoupper(substr($_SESSION['username'] ?? $_SESSION['email'], 0, 1)) ?></div>
      <div>
        <div class="menu-user-name"><?= htmlspecialchars($_SESSION['username'] ?? $_SESSION['email']) ?></div>
        <div class="menu-user-role"><?= ucfirst(htmlspecialchars($_SESSION['role'] ?? 'client')) ?></div>
      </div>
    </div>
  <?php endif; ?>

  <ul class="menu-nav">
    <li><a href="halaman.php" onclick="closeMenu()">🏠 Home</a></li>
    <li><a href="#about" onclick="closeMenu()">📖 Tentang Kami</a></li>
    <li><a href="#layanan" onclick="closeMenu()">💄 Layanan</a></li>
    <li><a href="#gallery" onclick="closeMenu()">🖼 Gallery</a></li>
  </ul>

   <div class="menu-footer">
    <?php if (isset($_SESSION['login']) && $_SESSION['login'] === true): ?>
      <a href="logout.php" class="btn-menu-logout">Logout</a>
    <?php else: ?>
      <a href="login.php" class="btn-menu-login">Login</a>
      <a href="register.php" class="btn-menu-signup">Sign Up</a>
    <?php endif; ?>
  </div>
</div>

<!-- HERO -->
<section class="hero">
  <img src="assets/foto_mua.jpeg" alt="Yayuk Makeover" class="hero-img">
  <div class="hero-overlay"></div>
  <div class="hero-content">
    <div class="hero-eyebrow">Makeup Artist Profesional</div>
    <h1 class="hero-title">Keanggunan Abadi<br>untuk <em>Hari Istimewa</em> Anda</h1>
    <p class="hero-sub">Sentuhan profesional untuk momen yang tak terlupakan</p>
    <a href="login.php" class="btn-booking">Booking Sekarang</a>
  </div>
</section>

<!-- STATS -->
<div class="stats">
  <div><span class="stat-num">500+</span><div class="stat-label">Klien Puas</div></div>
  <div><span class="stat-num">8+</span><div class="stat-label">Tahun Pengalaman</div></div>
  <div><span class="stat-num">200+</span><div class="stat-label">Pernikahan</div></div>
  <div><span class="stat-num">4.9★</span><div class="stat-label">Rating Rata-rata</div></div>
</div>

<!-- ABOUT -->
<section class="about" id="about">
  <div class="about-img-wrap">
    <img src="assets/foto_mua.jpeg" alt="Yayuk Makeover">
  </div>
  <div class="about-text">
    <div class="section-label">Tentang Kami</div>
    <h2 class="section-title">Merajut Kenangan<br>dalam Setiap <em>Sentuhan</em></h2>
    <p>Perjalanan Yayuk Makeover tumbuh bersama ribuan senyum dan cerita bahagia dari para pasangan yang telah menjadi bagian dari keluarga kami.</p>
    <p>Kami memahami bahwa setiap momen adalah kisah yang akan selalu dikenang. Itulah mengapa kami menganggap setiap klien sebagai keluarga dan memberikan yang terbaik.</p>
    <div class="about-features">
      <div class="feature-item">Produk premium & aman</div>
      <div class="feature-item">Tahan lama 12+ jam</div>
      <div class="feature-item">Konsultasi gratis</div>
      <div class="feature-item">On-site & home service</div>
      <div class="feature-item">Trial makeup tersedia</div>
      <div class="feature-item">Berpengalaman 8+ tahun</div>
    </div>
  </div>
</section>

<!-- WHY US -->
<section class="why-us" id="layanan">
  <div class="section-label">Mengapa Pilih Kami</div>
  <h2 class="section-title">Keunggulan yang Kami <em>Tawarkan</em></h2>
  <div class="why-grid">
    <div class="why-card">
      <span class="why-icon">👩‍🎨</span>
      <div class="why-title">Tim Ahli & Berpengalaman</div>
      <p class="why-desc">Lebih dari 8 tahun pengalaman di industri kecantikan dengan ratusan klien yang puas dari berbagai kalangan.</p>
    </div>
    <div class="why-card">
      <span class="why-icon">💎</span>
      <div class="why-title">Produk Premium Berkualitas</div>
      <p class="why-desc">Kami hanya menggunakan produk makeup terbaik yang aman untuk kulit dan tahan lama sepanjang hari.</p>
    </div>
    <div class="why-card">
      <span class="why-icon">✨</span>
      <div class="why-title">Riasan Personalisasi</div>
      <p class="why-desc">Setiap riasan disesuaikan dengan bentuk wajah, warna kulit, dan konsep acara untuk hasil yang sempurna.</p>
    </div>
  </div>
</section>

<!-- GALLERY LAYANAN -->
<section class="gallery-section" id="gallery">
  <div class="section-label">Gallery Layanan</div>
  <h2 class="section-title">Pilih Layanan <em>Terbaik</em> untuk Anda</h2>
  <div class="layanan-grid">

  <a href="makeup.php" style="text-decoration:none;color:inherit;">
  <div class="layanan-card show">
    <img src="assets/makeup.jpg" class="layanan-img">
    <div class="layanan-name">Paket Make Up</div>
    <p class="layanan-desc">Layanan make up lengkap untuk pengantin, wisuda, dan acara spesial lainnya.</p>
    <div class="layanan-price">Mulai Rp 350.000</div>
  </div>
  </a>

  <a href="kostum.php" style="text-decoration:none;color:inherit;">
  <div class="layanan-card show">
    <img src="assets/kostum.jpg" class="layanan-img">
    <div class="layanan-name">Kostum</div>
    <p class="layanan-desc">Penyewaan kostum pengantin dan adat lengkap dengan aksesoris.</p>
    <div class="layanan-price">Mulai Rp 800.000</div>
  </div>
  </a>

  <a href="dekor.php" style="text-decoration:none;color:inherit;">
  <div class="layanan-card show">
    <img src="assets/dekor.jpg" class="layanan-img">
    <div class="layanan-name">Dekor</div>
    <p class="layanan-desc">Dekorasi pelaminan dan acara dengan konsep elegan dan modern.</p>
    <div class="layanan-price">Mulai Rp 2.000.000</div>
  </div>
  </a>

</div>
</section>

<!-- CTA -->
<div class="cta-banner" id="booking">
  <h2>Jangan Ragu <em>BERTANYA</em> Untuk Hari Spesialmu?</h2>
  <a href="https://wa.me/6282332207877" class="btn-dark">Hubungi Sekarang</a>
</div>

<script>
function openMenu() {
  document.getElementById('sideMenu').classList.add('open');
  document.getElementById('overlay').classList.add('show');
}
function closeMenu() {
  document.getElementById('sideMenu').classList.remove('open');
  document.getElementById('overlay').classList.remove('show');
}
function filterTab(cat, btn) {
  document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  document.querySelectorAll('.layanan-card').forEach(card => {
    card.classList.toggle('show', cat === 'semua' || card.dataset.cat === cat);
  });
}
</script>
</body>
</html>