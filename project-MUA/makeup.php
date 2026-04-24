<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Makeup — Yayuk Makeover</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
:root { --gold: #C9A96E; --gold-light: #E8D5B0; --dark: #0F0D0B; --dark-mid: #1A1714; --cream: #F5EFE6; --text-muted: #8A7F74; }
body { background: var(--dark); color: var(--cream); font-family: 'DM Sans', sans-serif; font-weight: 300; }

/* NAVBAR */
.navbar { position: fixed; top: 0; left: 0; right: 0; z-index: 100; display: flex; align-items: center; justify-content: space-between; padding: 1.2rem 2rem; background: rgba(15,13,11,0.95); border-bottom: 1px solid rgba(201,169,110,0.1); }
.nav-logo { font-family: 'Cormorant Garamond', serif; font-size: 1.2rem; color: var(--cream); letter-spacing: 0.1em; }
.nav-logo span { color: var(--gold); font-style: italic; }
.btn-back { display: flex; align-items: center; gap: 0.5rem; color: var(--gold); text-decoration: none; font-size: 0.8rem; letter-spacing: 0.1em; text-transform: uppercase; border: 1px solid rgba(201,169,110,0.3); padding: 0.5rem 1rem; transition: all 0.2s; }
.btn-back:hover { background: rgba(201,169,110,0.1); }

/* HERO */
.page-hero { padding: 8rem 4rem 4rem; text-align: center; background: var(--dark-mid); border-bottom: 1px solid rgba(201,169,110,0.1); }
.page-hero h1 { font-family: 'Cormorant Garamond', serif; font-size: clamp(3rem, 8vw, 6rem); font-weight: 300; color: var(--gold); font-style: italic; margin-bottom: 0.5rem; }
.page-hero p { color: var(--text-muted); font-size: 0.95rem; }
.gold-line { width: 60px; height: 1px; background: var(--gold); margin: 1rem auto; }

/* GRID */
.layanan-wrap { padding: 4rem 3rem; }
.layanan-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 1.5rem; }

/* CARD */
.card { background: var(--dark-mid); border: 1px solid rgba(201,169,110,0.1); padding: 2rem; position: relative; transition: border-color 0.3s, transform 0.2s; }
.card:hover { border-color: rgba(201,169,110,0.4); transform: translateY(-3px); }
.card-tag { font-size: 0.65rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--gold); margin-bottom: 1rem; }
.card-name { font-family: 'Cormorant Garamond', serif; font-size: 1.5rem; font-weight: 400; margin-bottom: 0.5rem; }
.card-price { font-size: 0.85rem; color: var(--gold); font-weight: 500; margin-bottom: 1.25rem; }
.card-divider { height: 1px; background: rgba(201,169,110,0.15); margin-bottom: 1.25rem; }
.include-label { font-size: 0.7rem; letter-spacing: 0.15em; text-transform: uppercase; color: var(--text-muted); margin-bottom: 0.75rem; }
.include-list { list-style: none; margin-bottom: 1.75rem; }
.include-list li { font-size: 0.82rem; color: var(--cream); padding: 0.3rem 0; display: flex; align-items: center; gap: 0.5rem; }
.include-list li::before { content: '✓'; color: var(--gold); font-size: 0.75rem; flex-shrink: 0; }
.btn-booking { display: block; width: 100%; padding: 0.85rem; background: var(--dark); color: var(--gold); text-align: center; text-decoration: none; font-size: 0.75rem; letter-spacing: 0.15em; text-transform: uppercase; border: 1px solid rgba(201,169,110,0.3); transition: all 0.2s; cursor: pointer; }
.btn-booking:hover { background: var(--gold); color: var(--dark); }

@media (max-width: 768px) { .layanan-wrap { padding: 3rem 1.5rem; } .page-hero { padding: 7rem 1.5rem 3rem; } }
</style>
</head>
<body>

<nav class="navbar">
  <div class="nav-logo">Yayuk <span>Makeover</span></div>
  <a href="halaman.php" class="btn-back">← Kembali</a>
</nav>

<div class="page-hero">
  <h1>Makeup</h1>
  <div class="gold-line"></div>
  <p>Pilih paket makeup yang sesuai dengan kebutuhanmu</p>
</div>

<div class="layanan-wrap">
  <div class="layanan-grid">

    <div class="card">
      <div class="card-tag">Pernikahan</div>
      <div class="card-name">Makeup Wedding</div>
      <div class="card-price">Mulai Rp 1.500.000</div>
      <div class="card-divider"></div>
      <div class="include-label">Include :</div>
      <ul class="include-list">
        <li>Makeup full coverage tahan lama</li>
        <li>Softlens & bulu mata</li>
        <li>Hairdo / sanggul</li>
        <li>Touch up sepanjang acara</li>
        <li>Konsultasi sebelum hari H</li>
      </ul>
      <a href="<?= isset($_SESSION['login.php']) ? 'booking.php?layanan=Makeup+Wedding&harga=1500000' : 'login.php' ?>" class="btn-booking">Booking</a>
    </div>

    <div class="card">
      <div class="card-tag">Natural</div>
      <div class="card-name">Makeup Natural</div>
      <div class="card-price">Mulai Rp 350.000</div>
      <div class="card-divider"></div>
      <div class="include-label">Include :</div>
      <ul class="include-list">
        <li>Makeup natural ringan</li>
        <li>Skincare prep</li>
        <li>Setting spray tahan lama</li>
        <li>1x touch up</li>
      </ul>
      <a href="<?= isset($_SESSION['login.php']) ? 'booking.php?layanan=Makeup+Natural&harga=350000' : 'login.php' ?>" class="btn-booking">Booking</a>
    </div>

    <div class="card">
      <div class="card-tag">Wisuda</div>
      <div class="card-name">Makeup Graduation</div>
      <div class="card-price">Mulai Rp 400.000</div>
      <div class="card-divider"></div>
      <div class="include-label">Include :</div>
      <ul class="include-list">
        <li>Makeup fresh & glowing</li>
        <li>Bulu mata natural</li>
        <li>Penataan rambut simpel</li>
        <li>Tahan 8+ jam</li>
      </ul>
      <a href="<?= isset($_SESSION['login.php']) ? 'booking.php?layanan=Makeup+Graduation&harga=400000' : 'login.php' ?>" class="btn-booking">Booking</a>
    </div>

    <div class="card">
      <div class="card-tag">Pesta</div>
      <div class="card-name">Makeup Party & Event</div>
      <div class="card-price">Mulai Rp 450.000</div>
      <div class="card-divider"></div>
      <div class="include-label">Include :</div>
      <ul class="include-list">
        <li>Makeup glam & bold</li>
        <li>Glitter / shimmer opsional</li>
        <li>Bulu mata dramatic</li>
        <li>Setting tahan malam</li>
      </ul>
      <a href="<?= isset($_SESSION['login.php']) ? 'booking.php?layanan=Makeup+Party&harga=450000' : 'login.php' ?>" class="btn-booking">Booking</a>
    </div>

    <div class="card">
      <div class="card-tag">Pre-Wedding</div>
      <div class="card-name">Makeup Pre-Wedding</div>
      <div class="card-price">Mulai Rp 800.000</div>
      <div class="card-divider"></div>
      <div class="include-label">Include :</div>
      <ul class="include-list">
        <li>Makeup fotogenik HD</li>
        <li>2 look berbeda</li>
        <li>Hairdo sesuai konsep</li>
        <li>Koordinasi dengan fotografer</li>
      </ul>
      <a href="<?= isset($_SESSION['login.php']) ? 'booking.php?layanan=Makeup+Pre-Wedding&harga=800000' : 'login.php' ?>" class="btn-booking">Booking</a>
    </div>

    <div class="card">
      <div class="card-tag">Akad & Siraman</div>
      <div class="card-name">Makeup Akad & Siraman</div>
      <div class="card-price">Mulai Rp 600.000</div>
      <div class="card-divider"></div>
      <div class="include-label">Include :</div>
      <ul class="include-list">
        <li>Makeup adat/modern sesuai pilihan</li>
        <li>Hairdo tradisional</li>
        <li>Aksesori rambut</li>
        <li>Touch up saat prosesi</li>
      </ul>
      <a href="<?= isset($_SESSION['login.php']) ? 'booking.php?layanan=Makeup+Akad&harga=600000' : 'login.php' ?>" class="btn-booking">Booking</a>
    </div>

    <div class="card">
      <div class="card-tag">Grup</div>
      <div class="card-name">Paket Bridesmaid</div>
      <div class="card-price">Rp 250.000 / orang</div>
      <div class="card-divider"></div>
      <div class="include-label">Include :</div>
      <ul class="include-list">
        <li>Makeup seragam sesuai konsep</li>
        <li>Hairdo simpel</li>
        <li>Min. 3 orang</li>
        <li>Diskon untuk 5+ orang</li>
      </ul>
      <a href="<?= isset($_SESSION['login.php']) ? 'booking.php?layanan=Bridesmaid&harga=250000' : 'login.php' ?>" class="btn-booking">Booking</a>
    </div>

  </div>
</div>

</body>
</html>