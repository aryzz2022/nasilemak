<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu · Nasi Lemak Bob</title>
  <!-- Bootstrap 5 + Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <!-- Google Font (clean & warm) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      font-family: 'Inter', sans-serif;
      background: #fcf6ef;
      color: #2d1f14;
    }

    /* ===== NAVIGATION ===== */
    .navbar-custom {
      background: #1a110b !important;
      box-shadow: 0 6px 24px rgba(0,0,0,0.35);
      border-bottom: 3px solid #d9a25f;
      padding: 0.7rem 0;
    }
    .navbar-custom .navbar-brand {
      font-weight: 800;
      font-size: 1.7rem;
      letter-spacing: -0.3px;
      color: #f5e3c4 !important;
    }
    .navbar-custom .navbar-brand i {
      color: #e3b27c;
      margin-right: 10px;
    }
    .navbar-custom .nav-link {
      color: #ece3d5 !important;
      font-weight: 600;
      padding: 0.5rem 1.2rem;
      border-radius: 40px;
      transition: 0.2s;
      margin: 0 3px;
    }
    .navbar-custom .nav-link:hover {
      background: #d9a25f33;
      color: #fae1b6 !important;
    }
    .navbar-custom .nav-link.active {
      background: #d9a25f55;
      color: #fff5e3 !important;
    }
    .navbar-custom .nav-link i {
      margin-right: 6px;
    }

    /* ===== MENU HEADER ===== */
    .menu-header {
      background: linear-gradient(145deg, #2d1f14, #4d3222);
      color: #f5ede4;
      padding: 2.8rem 1rem 2.2rem 1rem;
      border-radius: 0 0 50px 50px;
      margin-bottom: 2.5rem;
      box-shadow: inset 0 -6px 12px rgba(0,0,0,0.1);
      position: relative;
      overflow: hidden;
    }
    .menu-header::after {
      content: "🍚";
      position: absolute;
      right: 6%;
      bottom: 0;
      font-size: 8rem;
      opacity: 0.07;
      transform: rotate(-6deg);
      pointer-events: none;
    }
    .menu-header h2 {
      font-weight: 800;
      font-size: 2.8rem;
      letter-spacing: -1px;
    }
    .menu-header h2 i {
      color: #d9a25f;
      margin-right: 12px;
    }
    .menu-header .sub-head {
      font-weight: 400;
      color: #dccfc2;
      max-width: 500px;
      margin: 0 auto;
    }

    /* ===== SECTION TITLE ===== */
    .section-title {
      font-weight: 700;
      font-size: 2rem;
      color: #281b12;
      border-left: 8px solid #d9a25f;
      padding-left: 1.2rem;
      margin-bottom: 1.8rem;
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .section-title i {
      color: #b87c4b;
      font-size: 2rem;
    }

    /* ===== CARDS ===== */
    .menu-card {
      background: white;
      border-radius: 28px;
      overflow: hidden;
      box-shadow: 0 8px 24px -6px rgba(0,0,0,0.08);
      transition: all 0.25s ease;
      border: 1px solid #efe5db;
      height: 100%;
      display: flex;
      flex-direction: column;
    }
    .menu-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 18px 40px -12px rgba(0,0,0,0.18);
      border-color: #d9a25f70;
    }
    .menu-card img {
      height: 200px;
      object-fit: cover;
      width: 100%;
      background: #e8ddd0;
      transition: 0.3s;
    }
    .menu-card:hover img {
      transform: scale(1.02);
    }
    .menu-card .card-body {
      padding: 1.4rem 1.2rem 1.2rem 1.2rem;
      flex: 1;
      display: flex;
      flex-direction: column;
    }
    .menu-card .card-title {
      font-weight: 700;
      font-size: 1.2rem;
      color: #281b12;
      margin-bottom: 0.2rem;
    }
    .menu-card .price {
      font-weight: 700;
      color: #b87c4b;
      font-size: 1.2rem;
      margin-bottom: 0.8rem;
    }
    .menu-card .price i {
      font-size: 0.9rem;
      color: #8f6b47;
      margin-right: 4px;
    }
    .menu-card .form-select {
      border-radius: 40px;
      border: 1px solid #ddd0c0;
      background: #fcf8f2;
      font-weight: 500;
      font-size: 0.9rem;
      padding: 0.4rem 1rem;
      margin-top: auto;
      transition: 0.2s;
    }
    .menu-card .form-select:focus {
      border-color: #b87c4b;
      box-shadow: 0 0 0 3px rgba(184, 124, 75, 0.2);
    }
    .menu-card .badge-tag {
      background: #d9a25f20;
      color: #4f3322;
      border-radius: 40px;
      padding: 0.2rem 0.9rem;
      font-size: 0.7rem;
      font-weight: 600;
      display: inline-block;
      margin-top: 0.3rem;
    }

    /* ===== FOOTER ===== */
    .footer-note {
      color: #4f392b;
      font-weight: 400;
      border-top: 1px solid #e2d3c4;
      padding: 1.8rem 0;
      margin-top: 3.5rem;
      background: #fcf6ef;
    }

    /* responsive */
    @media (max-width: 576px) {
      .menu-header h2 { font-size: 2rem; }
      .section-title { font-size: 1.5rem; }
      .menu-card img { height: 160px; }
    }
  </style>
</head>
<body>

  <!-- ===== NAVIGATION ===== -->
  <nav class="navbar navbar-expand-lg navbar-custom">
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
          <li class="nav-item"><a class="nav-link active" href="menu.php"><i class="bi bi-menu-button-wide"></i>Menu</a></li>
          <li class="nav-item"><a class="nav-link" href="booking.php"><i class="bi bi-calendar2-week"></i>Booking</a></li>
          <li class="nav-item"><a class="nav-link" href="about.php"><i class="bi bi-info-circle"></i>About Us</a></li>
          <li class="nav-item"><a class="nav-link" href="logout.php"><i class="bi bi-box-arrow-right"></i>Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- ===== MENU HEADER ===== -->
  <div class="menu-header text-center">
    <div class="container">
      <h2><i class="bi bi-book-fill"></i> Menu</h2>
      <p class="sub-head">Nikmati hidangan tradisional yang dimasak dengan penuh rasa dan kasih sayang.</p>
    </div>
  </div>

  <!-- ===== MENU CONTENT ===== -->
  <div class="container px-4">

    <!-- ========== NASI LEMAK ========== -->
    <div class="section-title">
      <i class="bi bi-bowl-rice-fill"></i> Nasi Lemak
    </div>

    <div class="row g-4 mb-5">

      <!-- Nasi Lemak Biasa -->
      <div class="col-md-4 col-sm-6">
        <div class="menu-card">
          <img src="nasi_lemak.jpeg" alt="Nasi Lemak Biasa">
          <div class="card-body">
            <h5 class="card-title">Nasi Lemak Biasa</h5>
            <div class="price"><i class="bi bi-tag-fill"></i> RM 5.00</div>
            <span class="badge-tag"><i class="bi bi-star-fill me-1" style="color:#b87c4b;"></i> classic</span>
          </div>
        </div>
      </div>

      <!-- Nasi Lemak Telur -->
      <div class="col-md-4 col-sm-6">
        <div class="menu-card">
          <img src="ns_telur.jpeg" alt="Nasi Lemak Telur">
          <div class="card-body">
            <h5 class="card-title">Nasi Lemak Telur</h5>
            <div class="price"><i class="bi bi-tag-fill"></i> RM 6.00</div>
            <span class="badge-tag"><i class="bi bi-egg-fried me-1"></i> telur goreng</span>
          </div>
        </div>
      </div>

      <!-- Nasi Lemak Ayam -->
      <div class="col-md-4 col-sm-6">
        <div class="menu-card">
          <img src="nasi_lemak_ayam.jpeg" alt="Nasi Lemak Ayam">
          <div class="card-body">
            <h5 class="card-title">Nasi Lemak Ayam</h5>
            <div class="price"><i class="bi bi-tag-fill"></i> RM 9.00</div>
            <span class="badge-tag"><i class="bi bi-droplet-fill me-1" style="color:#b87c4b;"></i> ayam goreng</span>
          </div>
        </div>
      </div>

      <!-- Nasi Lemak Daging -->
      <div class="col-md-4 col-sm-6">
        <div class="menu-card">
          <img src="nl_rendang.jpeg" alt="Nasi Lemak Daging">
          <div class="card-body">
            <h5 class="card-title">Nasi Lemak Daging</h5>
            <div class="price"><i class="bi bi-tag-fill"></i> RM 10.00</div>
            <span class="badge-tag"><i class="bi bi-flame-fill me-1" style="color:#b87c4b;"></i> rendang</span>
          </div>
        </div>
      </div>

      <!-- Nasi Lemak Paru -->
      <div class="col-md-4 col-sm-6">
        <div class="menu-card">
          <img src="nl_paru.jpeg" alt="Nasi Lemak Paru">
          <div class="card-body">
            <h5 class="card-title">Nasi Lemak Paru</h5>
            <div class="price"><i class="bi bi-tag-fill"></i> RM 10.00</div>
            <span class="badge-tag"><i class="bi bi-fire me-1"></i> paru goreng</span>
          </div>
        </div>
      </div>

    </div> <!-- /row nasi lemak -->


    <!-- ========== AIR / MINUMAN ========== -->
    <div class="section-title">
      <i class="bi bi-cup-straw"></i> Minuman
    </div>

    <div class="row g-4 mb-5">

      <!-- Teh O -->
      <div class="col-md-4 col-sm-6">
        <div class="menu-card">
          <img src="teh_o.jpeg" alt="Teh O">
          <div class="card-body">
            <h5 class="card-title">Teh O</h5>
            <div class="price"><i class="bi bi-tag-fill"></i> RM 2.00</div>
            <select class="form-select drink-option">
              <option value="">Pilih Suhu</option>
              <option value="Panas">☕ Panas</option>
              <option value="Sejuk">🧊 Sejuk</option>
            </select>
          </div>
        </div>
      </div>

      <!-- Teh O Limau -->
      <div class="col-md-4 col-sm-6">
        <div class="menu-card">
          <img src="teh_o_lemon.jpeg" alt="Teh O Limau">
          <div class="card-body">
            <h5 class="card-title">Teh O Limau</h5>
            <div class="price"><i class="bi bi-tag-fill"></i> RM 2.50</div>
            <select class="form-select drink-option">
              <option value="">Pilih Suhu</option>
              <option value="Panas">☕ Panas</option>
              <option value="Sejuk">🧊 Sejuk</option>
            </select>
          </div>
        </div>
      </div>

      <!-- Teh -->
      <div class="col-md-4 col-sm-6">
        <div class="menu-card">
          <img src="tehais.jpeg" alt="Teh">
          <div class="card-body">
            <h5 class="card-title">Teh</h5>
            <div class="price"><i class="bi bi-tag-fill"></i> RM 2.50</div>
            <select class="form-select drink-option">
              <option value="">Pilih Suhu</option>
              <option value="Panas">☕ Panas</option>
              <option value="Sejuk">🧊 Sejuk</option>
            </select>
          </div>
        </div>
      </div>

      <!-- Sirap -->
      <div class="col-md-4 col-sm-6">
        <div class="menu-card">
          <img src="sirap.jpeg" alt="Sirap">
          <div class="card-body">
            <h5 class="card-title">Sirap</h5>
            <div class="price"><i class="bi bi-tag-fill"></i> RM 2.00</div>
            <select class="form-select drink-option">
              <option value="">Pilih Suhu</option>
              <option value="Panas">☕ Panas</option>
              <option value="Sejuk">🧊 Sejuk</option>
            </select>
          </div>
        </div>
      </div>

      <!-- Sirap Limau -->
      <div class="col-md-4 col-sm-6">
        <div class="menu-card">
          <img src="sirap_lemen.jpeg" alt="Sirap Limau">
          <div class="card-body">
            <h5 class="card-title">Sirap Limau</h5>
            <div class="price"><i class="bi bi-tag-fill"></i> RM 2.50</div>
            <select class="form-select drink-option">
              <option value="">Pilih Suhu</option>
              <option value="Panas">☕ Panas</option>
              <option value="Sejuk">🧊 Sejuk</option>
            </select>
          </div>
        </div>
      </div>

      <!-- Kopi O -->
      <div class="col-md-4 col-sm-6">
        <div class="menu-card">
          <img src="kopi_o.jpeg" alt="Kopi O">
          <div class="card-body">
            <h5 class="card-title">Kopi O</h5>
            <div class="price"><i class="bi bi-tag-fill"></i> RM 2.00</div>
            <select class="form-select drink-option">
              <option value="">Pilih Suhu</option>
              <option value="Panas">☕ Panas</option>
              <option value="Sejuk">🧊 Sejuk</option>
            </select>
          </div>
        </div>
      </div>

      <!-- Kopi -->
      <div class="col-md-4 col-sm-6">
        <div class="menu-card">
          <img src="kopi.jpeg" alt="Kopi">
          <div class="card-body">
            <h5 class="card-title">Kopi</h5>
            <div class="price"><i class="bi bi-tag-fill"></i> RM 2.50</div>
            <select class="form-select drink-option">
              <option value="">Pilih Suhu</option>
              <option value="Panas">☕ Panas</option>
              <option value="Sejuk">🧊 Sejuk</option>
            </select>
          </div>
        </div>
      </div>

    </div> <!-- /row minuman -->

  </div> <!-- /container -->

  <!-- ===== FOOTER ===== -->
  <div class="footer-note text-center">
    <div class="container">
      <span class="text-secondary small"><i class="bi bi-brightness-high-fill me-1" style="color: #b87c4b;"></i> 2026 Nasi Lemak Bob · Ampang, Selangor</span>
      <span class="mx-2 text-secondary">|</span>
      <span class="text-secondary small"><i class="bi bi-instagram me-1"></i> @nasilemakbob</span>
      <span class="mx-2 text-secondary">|</span>
      <span class="text-secondary small"><i class="bi bi-telephone-fill me-1"></i> +603-4251 8890</span>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
