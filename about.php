<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us · Nasi Lemak Bob</title>
  <!-- Bootstrap 5 + Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- Google Font (clean, warm) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: 'Inter', sans-serif;
      background: #fcf8f3;
      color: #2d1f14;
      line-height: 1.6;
    }
    /* navbar – warm dark with subtle brand accent */
    .navbar-custom {
      background: #1e130c !important; /* deep brown-black */
      box-shadow: 0 6px 18px rgba(0,0,0,0.2);
      border-bottom: 2px solid #d9a25f;
    }
    .navbar-custom .navbar-brand {
      font-weight: 700;
      font-size: 1.6rem;
      letter-spacing: -0.3px;
      color: #f5e3c4 !important;
    }
    .navbar-custom .navbar-brand i {
      color: #e3b27c;
      margin-right: 8px;
    }
    .navbar-custom .nav-link {
      color: #ece3d5 !important;
      font-weight: 500;
      padding: 0.6rem 1.2rem;
      border-radius: 30px;
      transition: 0.2s;
      margin: 0 4px;
    }
    .navbar-custom .nav-link:hover {
      background: #d9a25f33;
      color: #fae1b6 !important;
    }
    .navbar-custom .nav-link.active {
      background: #d9a25f55;
      color: #fff5e3 !important;
    }

    /* hero section */
    .about-hero {
      background: linear-gradient(135deg, #2d1f14 0%, #4d3222 100%);
      color: #f5ede4;
      padding: 4rem 1rem 4.5rem 1rem;
      border-radius: 0 0 50px 50px;
      margin-bottom: 3rem;
      box-shadow: inset 0 -6px 12px rgba(0,0,0,0.1);
      position: relative;
      overflow: hidden;
    }
    .about-hero::after {
      content: "🍚";
      position: absolute;
      right: 5%;
      bottom: 0;
      font-size: 10rem;
      opacity: 0.08;
      transform: rotate(-8deg);
      pointer-events: none;
    }
    .about-hero h1 {
      font-weight: 700;
      font-size: 3.2rem;
      letter-spacing: -1px;
    }
    .about-hero .lead {
      font-weight: 400;
      color: #dccfc2;
      max-width: 720px;
      margin: 0 auto;
      font-size: 1.25rem;
    }
    .about-hero .badge-loc {
      background: #d9a25f30;
      backdrop-filter: blur(4px);
      padding: 0.5rem 1.4rem;
      border-radius: 60px;
      border: 1px solid #d9a25f70;
      display: inline-flex;
      align-items: center;
      gap: 10px;
      color: #f3e1c9;
      font-weight: 500;
      margin-top: 1.2rem;
    }

    /* story card */
    .story-card {
      background: white;
      border-radius: 32px;
      box-shadow: 0 16px 40px -12px rgba(0,0,0,0.15);
      padding: 2.8rem 2.5rem;
      border: 1px solid #eee6db;
      transition: all 0.25s;
    }
    .story-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 24px 48px -16px rgba(0,0,0,0.18);
    }
    .story-card i {
      color: #b87c4b;
      font-size: 2.6rem;
    }
    .story-card h3 {
      font-weight: 700;
      color: #281b12;
      margin-top: 0.5rem;
    }

    /* features / values */
    .value-icon {
      background: #eadac8;
      width: 70px;
      height: 70px;
      border-radius: 30px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 2.2rem;
      color: #3f2a1b;
      transition: 0.2s;
      margin: 0 auto 1rem auto;
    }
    .value-card {
      background: white;
      border-radius: 28px;
      padding: 2rem 1.2rem;
      height: 100%;
      transition: 0.2s;
      border: 1px solid #eee3d7;
      box-shadow: 0 6px 14px rgba(0,0,0,0.02);
    }
    .value-card:hover .value-icon {
      background: #d9a25f;
      color: #1f140e;
    }
    .value-card h5 {
      font-weight: 700;
      color: #2f1d10;
    }

    /* team / location card */
    .info-card {
      background: #ffffffde;
      backdrop-filter: blur(4px);
      border-radius: 40px;
      padding: 2.2rem 2rem;
      border: 1px solid #e7dccc;
      box-shadow: 0 12px 30px -10px rgba(0,0,0,0.05);
    }
    .info-card .bi-geo-alt {
      color: #a76f42;
      font-size: 2.2rem;
    }
    .info-card .hours {
      background: #f2ebe2;
      border-radius: 60px;
      padding: 0.4rem 1.4rem;
      font-weight: 500;
      color: #2b1d13;
    }

    /* footer */
    .footer-note {
      color: #4f392b;
      font-weight: 400;
      border-top: 1px solid #e2d3c4;
      padding: 1.8rem 0;
      margin-top: 4rem;
    }

    /* responsive */
    @media (max-width: 576px) {
      .about-hero h1 { font-size: 2.4rem; }
      .story-card { padding: 1.8rem; }
      .value-card { padding: 1.5rem 0.8rem; }
    }
  </style>
</head>
<body>

  <!-- ===== NAVIGATION ===== -->
  <nav class="navbar navbar-expand-lg navbar-custom py-2">
    <div class="container-fluid px-4">
      <a class="navbar-brand" href="index.php">
        <i class="bi bi-bowl-rice"></i> Nasi Lemak Bob
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" 
              aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav ms-auto align-items-lg-center">
          <li class="nav-item"><a class="nav-link" href="menu.php"><i class="bi bi-menu-button-wide me-1"></i>Menu</a></li>
          <li class="nav-item"><a class="nav-link" href="booking.php"><i class="bi bi-calendar2-week me-1"></i>Booking</a></li>
          <li class="nav-item"><a class="nav-link active" href="about.php"><i class="bi bi-info-circle me-1"></i>About Us</a></li>
           <li class="nav-item"><a class="nav-link active" href="login.php"><i class="bi bi-info-circle me-1"></i>Log Out</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- ===== HERO ===== -->
  <section class="about-hero text-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <h1><i class="bi bi-heart-fill" style="color: #d9a25f; font-size: 2.4rem;"></i> Kisah Nasi Lemak Bob</h1>
          <p class="lead mx-auto">
            Dari dapur kecil ke restoran keluarga — kami membawa cita rasa tradisional 
            dengan sentuhan moden, setiap hari.
          </p>
          <div class="badge-loc mt-3">
            <i class="bi bi-geo-alt-fill"></i> Ampang, Selangor 
            <span class="mx-2">•</span> 
            <i class="bi bi-clock"></i> 10 pagi – 10 malam
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== MAIN CONTENT ===== -->
  <div class="container px-4">

    <!-- row: story + opening hours -->
    <div class="row g-5 align-items-stretch mb-5">
      <div class="col-lg-7">
        <div class="story-card h-100">
          <div class="d-flex align-items-center gap-3 mb-3">
            <i class="bi bi-quote"></i>
            <span class="badge bg-warning bg-opacity-25 text-dark px-4 py-2 rounded-pill fw-semibold">Sejak 2018</span>
          </div>
          <h3 class="mb-3">Nasi Lemak yang menghangatkan jiwa</h3>
          <p style="font-size: 1.08rem; color: #3d2c1e;">
            <strong>Nasi Lemak Bob</strong> lahir dari kecintaan terhadap warisan kuliner Malaysia. 
            Setiap hidangan kami disediakan dengan <span style="color:#a76f42; font-weight:600;">resepi turun-temurun</span>, 
            menggunakan santan segar, sambal homemade, dan rempah pilihan. 
          </p>
          <p style="color: #4f392b;">
            Kami percaya bahawa makanan yang baik membawa orang bersama. 
            Lokasi kami di Ampang menjadi tempat berkumpul untuk keluarga, 
            rakan, dan sesiapa yang ingin menikmati <strong>nasi lemak premium</strong> 
            dengan harga rakyat. Setiap pinggan dihiasi dengan kasih sayang — 
            itulah janji Bob.
          </p>
          <div class="mt-3 d-flex flex-wrap gap-3">
            <span class="badge bg-dark bg-opacity-10 text-dark px-4 py-2 rounded-pill"><i class="bi bi-tag me-1"></i> Halal</span>
            <span class="badge bg-dark bg-opacity-10 text-dark px-4 py-2 rounded-pill"><i class="bi bi-tree me-1"></i> Outdoor seating</span>

          </div>
        </div>
      </div>

      <div class="col-lg-5">
        <div class="info-card h-100 d-flex flex-column justify-content-between">
          <div>
            <div class="d-flex align-items-center gap-3 mb-3">
              <i class="bi bi-geo-alt-fill" style="font-size: 2rem; color:#a76f42;"></i>
              <h5 class="mb-0 fw-bold">Kunjungi kami</h5>
            </div>
            <p class="mb-2" style="font-size: 1.1rem;">
              <i class="bi bi-pin-map-fill me-2" style="color:#b87c4b;"></i> 
              No. 13, Jalan Ampang Utama, <br> 68000 Ampang, Selangor.
            </p>
            <p class="mb-3"><i class="bi bi-telephone-fill me-2" style="color:#b87c4b;"></i> +603-4251 8890</p>
            <hr class="my-3 opacity-25">
          </div>
          <div>
            <div class="d-flex align-items-center gap-3 flex-wrap">
              <span class="hours"><i class="bi bi-clock-history me-1"></i> 10:00 – 22:00 (setiap hari)</span>
              <span class="hours" style="background: #d9a25f30;"><i class="bi bi-calendar-check me-1"></i> Buka cuti umum</span>
            </div>
            <div class="mt-3 text-muted small">
              <i class="bi bi-wifi me-1"></i> WiFi percuma · 
              <i class="bi bi-car-front ms-2 me-1"></i> Tempat letak kereta
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ===== VALUES / FEATURES ===== -->
    <h3 class="text-center fw-bold mt-5 mb-2" style="color: #2d1f14;">Apa yang membuatkan kami istimewa</h3>
    <p class="text-center text-muted mb-5" style="font-size: 1.1rem;">Tiga perkara yang kami pegang teguh</p>

    <div class="row g-4 mb-5">
      <div class="col-md-4">
        <div class="value-card text-center">
          <div class="value-icon"><i class="bi bi-flower1"></i></div>
          <h5>Bahan segar, tempatan</h5>
          <p class="text-muted small">Santan kelapa asli, ikan bilis rangup, dan sayur-sayuran dari pasar Ampang setiap pagi.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="value-card text-center">
          <div class="value-icon"><i class="bi bi-heart-hand"></i></div>
          <h5>Resepi keluarga</h5>
          <p class="text-muted small">Sambal istimewa warisan nenek Bob — pedas manis seimbang, tanpa bahan pengawet.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="value-card text-center">
          <div class="value-icon"><i class="bi bi-people"></i></div>
          <h5>Harga mesra rakyat</h5>
          <p class="text-muted small">Kami percaya semua orang layak menikmati nasi lemak berkualiti tanpa kos yang tinggi.</p>
        </div>
      </div>
    </div>

    <!-- ===== TEASER / TEAM ===== -->
    <div class="row g-4 align-items-center mt-4 mb-3">
      <div class="col-md-8">
        <div class="p-4 p-md-5" style="background: #e3d3c1; border-radius: 40px;">
          <h4 class="fw-bold"><i class="bi bi-egg-fried me-2"></i> "Sedap macam masak sendiri"</h4>
          <p class="mb-0" style="font-size: 1.1rem; color: #281b12;">
            — itu yang sering pelanggan kami katakan. Datang dan rasai sendiri 
            kemesraan <strong>Nasi Lemak Bob</strong>. Kami sedia melayan anda dengan senyuman.
          </p>
          <div class="mt-3 d-flex gap-3">
            <span class="badge bg-dark bg-opacity-25 px-4 py-2 rounded-pill"><i class="bi bi-star-fill me-1" style="color: #b87c4b;"></i> 4.9 ⭐ (1.2k ulasan)</span>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="bg-white p-4 rounded-4 shadow-sm text-center">
          <i class="bi bi-person-circle" style="font-size: 3.8rem; color: #4d3222;"></i>
          <h6 class="fw-bold mt-2 mb-0">Chef Bob</h6>
          <small class="text-muted">Pengasas & Ketua Dapur</small>
          <p class="small mt-2" style="color:#3d2c1e;">"Setiap hari saya bangun untuk bau sambal dan senyuman pelanggan."</p>
        </div>
      </div>
    </div>

    <!-- ===== CLOSING QUOTE ===== -->
    <div class="text-center py-4">
      <p class="fst-italic text-muted" style="font-size: 1.2rem;">
        “Bukan sekadar nasi lemak, ini warisan di atas pinggan.”
      </p>
    </div>

  </div> <!-- end container -->

  <!-- ===== FOOTER ===== -->
  <div class="container-fluid px-4 footer-note text-center">
    <div class="row">
      <div class="col">
        <span class="text-secondary small">© 2026 Nasi Lemak Bob · Ampang, Selangor</span>
        <span class="mx-2 text-secondary">|</span>
        <span class="text-secondary small"><i class="bi bi-instagram me-1"></i> @nasilemakbob</span>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>