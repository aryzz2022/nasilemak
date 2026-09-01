<?php
// ============================================================
// FILE: index.php (Homepage)
// ============================================================

// Panggil fail sambungan pangkalan data (session_start sudah ada di dalam db_connect.php)
require_once 'db_connect.php';

// Semak sama ada user telah log masuk
$logged_in = isset($_SESSION["user_id"]);
$username = "";

// Jika pengguna telah log masuk, dapatkan nama pengguna
if ($logged_in) {
    if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
    } else {
        try {
            // Ambil dari pangkalan data guna PDO jika tiada dalam session
            $stmt = $conn->prepare("SELECT username FROM users WHERE id = :id");
            $stmt->execute(['id' => $_SESSION["user_id"]]);
            $user = $stmt->fetch();
            
            if ($user) {
                $username = $user['username'];
                $_SESSION["username"] = $username;
            }
        } catch (PDOException $e) {
            $username = "Pengguna";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nasi Lemak Bob - Home</title>
  <!-- Google Fonts & Bootstrap Icons -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  
  <style>
    /* ===== RESET & BASE ===== */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: #fcf6ef;
      color: #2d1f14;
      line-height: 1.6;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    /* ===== NAVIGATION ===== */
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: #1a110b;
      padding: 0.9rem 4rem;
      box-shadow: 0 6px 24px rgba(0,0,0,0.35);
      border-bottom: 3px solid #d9a25f;
      flex-wrap: wrap;
      gap: 1rem;
    }

    .nav-brand {
      font-size: 1.7rem;
      font-weight: 800;
      color: #f5e3c4;
      letter-spacing: -0.3px;
    }
    .nav-brand i {
      color: #e3b27c;
      margin-right: 8px;
    }

    .nav-links {
      display: flex;
      align-items: center;
      gap: 1.2rem;
      flex-wrap: wrap;
    }

    .nav-links a {
      color: #ece3d5;
      text-decoration: none;
      font-weight: 600;
      font-size: 0.95rem;
      padding: 0.4rem 1.2rem;
      border-radius: 40px;
      transition: 0.2s;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }

    .nav-links a:hover {
      background: #d9a25f33;
      color: #fae1b6;
    }

    .nav-greeting {
      color: #dccfc2;
      font-weight: 500;
      font-size: 0.95rem;
      background: #d9a25f20;
      padding: 0.3rem 1.2rem;
      border-radius: 40px;
      border: 1px solid #d9a25f40;
    }

    .nav-btn {
      background: #d9480f;
      color: #fff !important;
      padding: 0.4rem 1.6rem;
      border-radius: 40px;
      font-weight: 700;
    }
    .nav-btn:hover {
      background: #b8380a;
      color: #fff !important;
    }

    /* ===== HERO ===== */
    .hero {
      background: linear-gradient(145deg, #2d1f14, #4d3222);
      color: #f5ede4;
      text-align: center;
      padding: 5rem 2rem 4.5rem 2rem;
      border-radius: 0 0 60px 60px;
      margin-bottom: 3rem;
      position: relative;
      overflow: hidden;
    }

    .hero::after {
      content: "🍚";
      position: absolute;
      right: 6%;
      bottom: 0;
      font-size: 10rem;
      opacity: 0.06;
      transform: rotate(-6deg);
      pointer-events: none;
    }

    .hero h1 {
      font-size: 3.6rem;
      font-weight: 800;
      letter-spacing: -1.5px;
      margin-bottom: 0.3rem;
    }

    .hero .tagline {
      font-size: 1.5rem;
      font-weight: 600;
      color: #d9a25f;
      margin-bottom: 0.8rem;
    }

    .hero .hero-text {
      font-size: 1.15rem;
      color: #dccfc2;
      max-width: 580px;
      margin: 0 auto 1.8rem auto;
    }

    .hero-btn {
      display: inline-block;
      background: #d9a25f;
      color: #1a110b;
      font-weight: 700;
      font-size: 1.1rem;
      padding: 0.8rem 3rem;
      border-radius: 60px;
      text-decoration: none;
      transition: 0.25s;
      box-shadow: 0 8px 20px rgba(0,0,0,0.3);
      border: 1px solid #e8b87a;
    }

    .hero-btn:hover {
      background: #e8b87a;
      transform: translateY(-3px);
      box-shadow: 0 14px 28px rgba(0,0,0,0.35);
      color: #0f0a07;
    }

    /* ===== MENU PREVIEW ===== */
    .menu-preview {
      max-width: 1100px;
      margin: 0 auto;
      padding: 0 2rem 2rem 2rem;
      width: 100%;
    }

    .menu-preview h2 {
      text-align: center;
      font-size: 2.2rem;
      font-weight: 700;
      color: #281b12;
      margin-bottom: 2.2rem;
      position: relative;
    }
    .menu-preview h2::after {
      content: "";
      display: block;
      width: 70px;
      height: 4px;
      background: #d9a25f;
      margin: 0.5rem auto 0 auto;
      border-radius: 4px;
    }

    .menu-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 2rem;
    }

    .menu-card {
      background: white;
      padding: 2rem 1.5rem;
      border-radius: 32px;
      text-align: center;
      box-shadow: 0 8px 24px -6px rgba(0,0,0,0.06);
      border: 1px solid #efe5db;
      transition: 0.25s;
    }

    .menu-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 18px 40px -12px rgba(0,0,0,0.15);
      border-color: #d9a25f70;
    }

    .menu-icon {
      font-size: 3.2rem;
      display: block;
      margin-bottom: 0.5rem;
    }

    .menu-card h3 {
      font-weight: 700;
      font-size: 1.25rem;
      color: #281b12;
      margin-bottom: 0.3rem;
    }

    .menu-card p {
      color: #5f4a39;
      font-size: 0.95rem;
      margin-bottom: 0;
    }

    /* ===== FOOTER ===== */
    .site-footer {
      text-align: center;
      padding: 1.8rem 2rem;
      margin-top: 3rem;
      border-top: 1px solid #e2d3c4;
      color: #5f4a39;
      font-weight: 400;
      background: #fcf6ef;
    }

    .site-footer i {
      color: #b87c4b;
      margin: 0 4px;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
      .navbar {
        padding: 0.9rem 1.5rem;
        flex-direction: column;
        align-items: stretch;
        gap: 0.8rem;
      }
      .nav-links {
        justify-content: center;
        gap: 0.6rem;
      }
      .nav-links a {
        padding: 0.3rem 0.9rem;
        font-size: 0.85rem;
      }
      .hero h1 {
        font-size: 2.6rem;
      }
      .hero .tagline {
        font-size: 1.2rem;
      }
      .hero {
        padding: 3.5rem 1.5rem 3rem 1.5rem;
      }
      .menu-grid {
        grid-template-columns: 1fr 1fr;
      }
    }

    @media (max-width: 480px) {
      .menu-grid {
        grid-template-columns: 1fr;
      }
      .nav-links {
        flex-wrap: wrap;
      }
      .hero h1 {
        font-size: 2.2rem;
      }
    }
  </style>
</head>
<body>

  <!-- ===== NAVIGATION ===== -->
  <nav class="navbar">
    <div class="nav-brand">
      <i class="bi bi-bowl-rice"></i> Nasi Lemak Bob
    </div>
    <div class="nav-links">
      <?php if ($logged_in): ?>
        <span class="nav-greeting">
          <i class="bi bi-person-circle"></i> Hi, <?php echo htmlspecialchars($username); ?>
        </span>
        <a href="menu.php"><i class="bi bi-menu-button-wide"></i> Menu</a>
        <a href="booking.php"><i class="bi bi-calendar2-week"></i> Booking</a>
        <a href="about.php"><i class="bi bi-info-circle"></i> About Us</a>
        <a href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
      <?php else: ?>
        <a href="login.php"><i class="bi bi-box-arrow-in-right"></i> Login</a>
        <a href="register.php" class="nav-btn"><i class="bi bi-person-plus"></i> Register</a>
      <?php endif; ?>
    </div>
  </nav>

  <!-- ===== HERO ===== -->
  <header class="hero">
    <h1>Nasi Lemak Bob</h1>
    <p class="tagline">Sedap tak boleh tahan</p>
    <p class="hero-text">
      Freshly made nasi lemak, delivered hot and fragrant right to your door.
    </p>
    <?php if (!$logged_in): ?>
      <a href="register.php" class="hero-btn"><i class="bi bi-cart-plus"></i> Booking Now</a>
    <?php else: ?>
      <a href="menu.php" class="hero-btn"><i class="bi bi-egg-fried"></i> Go to Menu</a>
    <?php endif; ?>
  </header>

  <!-- ===== MENU PREVIEW ===== -->
  <section class="menu-preview">
    <h2>Our Favorites</h2>
    <div class="menu-grid">
      <div class="menu-card">
        <span class="menu-icon">🍛</span>
        <h3>Classic Nasi Lemak</h3>
        <p>Fragrant coconut rice, sambal, egg, anchovies &amp; peanuts.</p>
      </div>
      <div class="menu-card">
        <span class="menu-icon">🍗</span>
        <h3>Ayam Goreng Set</h3>
        <p>Crispy fried chicken paired with our signature sambal.</p>
      </div>
      <div class="menu-card">
        <span class="menu-icon">🐟</span>
        <h3>Rendang Special</h3>
        <p>Slow-cooked beef rendang with all the classic sides.</p>
      </div>
    </div>
  </section>

  <!-- ===== FOOTER ===== -->
  <footer class="site-footer">
    <p>
      <i class="bi bi-brightness-high-fill"></i> &copy; <?php echo date("Y"); ?> Nasi Lemak Bob · Ampang, Selangor
      <span style="margin: 0 0.8rem;">|</span>
      <i class="bi bi-instagram"></i> @nasilemakbob
      <span style="margin: 0 0.8rem;">|</span>
      <i class="bi bi-telephone-fill"></i> +603-4251 8890
    </p>
  </footer>

</body>
</html>
