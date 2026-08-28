<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking · Nasi Lemak Bob</title>
  <!-- Bootstrap 5 + Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <!-- Google Font (clean & warm) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      font-family: 'Inter', sans-serif;
      min-height: 100vh;
      background: url('bg.JPG') no-repeat center center fixed;
      background-size: cover;
      display: flex;
      flex-direction: column;
      color: #2d1f14;
    }
    /* semi-transparent overlay for readability */
    .page-overlay {
      flex: 1;
      background: rgba(30, 20, 14, 0.55); /* warm dark overlay */
      backdrop-filter: blur(2px);
      padding: 1.5rem 1rem 2rem 1rem;
      display: flex;
      flex-direction: column;
    }

    /* ----- NAVIGATION (elegant dark) ----- */
    .navbar-custom {
      background: #1a110b !important; 
      box-shadow: 0 6px 24px rgba(0,0,0,0.5);
      border-bottom: 2px solid #d9a25f;
      padding: 0.7rem 0;
    }
    .navbar-custom .navbar-brand {
      font-weight: 700;
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
      font-weight: 500;
      padding: 0.5rem 1.2rem;
      border-radius: 30px;
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

    /* ----- MAIN CARD (glassmorphism) ----- */
    .booking-card {
      background: rgba(255, 248, 240, 0.92);
      backdrop-filter: blur(6px);
      border-radius: 48px 48px 40px 40px;
      padding: 2.8rem 2.5rem;
      max-width: 720px;
      margin: 2rem auto;
      box-shadow: 0 24px 56px -12px rgba(0,0,0,0.6), 0 0 0 1px rgba(255,215,175,0.2);
      border: 1px solid rgba(255, 235, 215, 0.5);
      transition: all 0.25s;
    }
    .booking-card:hover {
      transform: scale(1.005);
      box-shadow: 0 32px 64px -12px rgba(0,0,0,0.7);
    }
    .booking-card h2 {
      font-weight: 700;
      color: #281b12;
      letter-spacing: -0.5px;
      border-bottom: 3px solid #d9a25f;
      display: inline-block;
      padding-bottom: 0.4rem;
      margin-bottom: 1.8rem;
    }
    .booking-card h2 i {
      color: #b87c4b;
      margin-right: 12px;
    }

    /* form elements */
    .form-label {
      font-weight: 600;
      color: #352418;
      margin-bottom: 0.3rem;
      font-size: 0.95rem;
    }
    .form-control {
      background: #fffcf7;
      border: 1px solid #ddd0c0;
      border-radius: 16px;
      padding: 0.7rem 1.2rem;
      transition: 0.2s;
      font-weight: 500;
    }
    .form-control:focus {
      border-color: #b87c4b;
      box-shadow: 0 0 0 4px rgba(184, 124, 75, 0.25);
    }
    .btn-submit {
      background: #1f140e;
      border: none;
      padding: 0.8rem 2.8rem;
      border-radius: 60px;
      font-weight: 700;
      font-size: 1.1rem;
      letter-spacing: 0.3px;
      background: linear-gradient(145deg, #2f1d13, #1a100b);
      color: #f5e8db;
      transition: 0.25s;
      box-shadow: 0 6px 14px rgba(0,0,0,0.2);
    }
    .btn-submit:hover {
      background: #3d281c;
      transform: translateY(-3px);
      box-shadow: 0 12px 24px rgba(0,0,0,0.35);
      color: #fff5e3;
    }
    .btn-submit i {
      margin-right: 10px;
    }

    /* alert custom */
    .alert-custom {
      border-radius: 30px;
      border-left: 6px solid #d9a25f;
      background: #f5ede4;
      color: #1f140e;
      padding: 1rem 1.8rem;
      font-weight: 500;
    }

    /* footer */
    .footer-note {
      color: #f0e2d4;
      text-shadow: 0 2px 6px rgba(0,0,0,0.5);
      font-weight: 400;
      padding: 1.2rem 0;
      margin-top: 0.5rem;
      text-align: center;
      border-top: 1px solid rgba(255,215,175,0.15);
    }

    /* responsive */
    @media (max-width: 576px) {
      .booking-card { padding: 1.8rem 1.2rem; margin: 1rem; border-radius: 32px; }
      .navbar-custom .navbar-brand { font-size: 1.3rem; }
    }
  </style>
</head>
<body>
  <div class="page-overlay">

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
            <li class="nav-item"><a class="nav-link" href="menu.php"><i class="bi bi-menu-button-wide me-1"></i>Menu</a></li>
            <li class="nav-item"><a class="nav-link" href="about.php"><i class="bi bi-info-circle me-1"></i>About Us</a></li>
            <li class="nav-item"><a class="nav-link active" href="logout.php"><i class="bi bi-box-arrow-right me-1"></i>Log Out</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- ===== BOOKING CARD ===== -->
    <div class="booking-card">
      <h2><i class="bi bi-calendar2-check"></i> Book a Table</h2>

      <form class="row g-4" method="post" action="booking.php">
        <div class="col-md-6">
          <label class="form-label"><i class="bi bi-person-fill me-1" style="color:#a76f42;"></i>Name</label>
          <input type="text" class="form-control" name="name" placeholder="Your full name" required>
        </div>
        <div class="col-md-6">
          <label class="form-label"><i class="bi bi-envelope-fill me-1" style="color:#a76f42;"></i>Email</label>
          <input type="email" class="form-control" name="email" placeholder="you@example.com" required>
        </div>
        <div class="col-md-6">
          <label class="form-label"><i class="bi bi-calendar-date me-1" style="color:#a76f42;"></i>Date</label>
          <input type="date" class="form-control" name="date" required>
        </div>
        <div class="col-md-6">
          <label class="form-label"><i class="bi bi-clock me-1" style="color:#a76f42;"></i>Time</label>
          <input type="time" class="form-control" name="time" required>
        </div>
        <div class="col-md-12">
          <label class="form-label"><i class="bi bi-people-fill me-1" style="color:#a76f42;"></i>Number of Guests</label>
          <input type="number" class="form-control" name="guests" min="1" max="20" placeholder="e.g. 4" required>
        </div>
        <div class="col-12 text-center mt-3">
          <button type="submit" class="btn-submit"><i class="bi bi-send-fill"></i>Submit Booking</button>
        </div>
      </form>

      <!-- ===== PHP RESULT ===== -->
      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          // basic sanitization (optional but good practice)
          $name   = htmlspecialchars(trim($_POST['name']));
          $email  = htmlspecialchars(trim($_POST['email']));
          $date   = htmlspecialchars(trim($_POST['date']));
          $time   = htmlspecialchars(trim($_POST['time']));
          $guests = intval($_POST['guests']);

          // prevent empty fields just in case
          if (!empty($name) && !empty($email) && !empty($date) && !empty($time) && $guests > 0) {
              $sql = "INSERT INTO bookings (name, email, date, time, guests) 
                      VALUES ('$name', '$email', '$date', '$time', '$guests')";

              if ($conn->query($sql) === TRUE) {
                  echo '<div class="alert alert-custom mt-4 d-flex align-items-center gap-2">
                          <i class="bi bi-check-circle-fill" style="font-size:1.8rem; color:#2b7a4b;"></i>
                          <span><strong>Booking saved!</strong> Thank you, ' . $name . '. We\'ll see you soon.</span>
                        </div>';
              } else {
                  echo '<div class="alert alert-danger mt-4 d-flex align-items-center gap-2">
                          <i class="bi bi-exclamation-triangle-fill" style="font-size:1.6rem;"></i>
                          <span><strong>Error:</strong> ' . $conn->error . '</span>
                        </div>';
              }
          } else {
              echo '<div class="alert alert-warning mt-4 d-flex align-items-center gap-2">
                      <i class="bi bi-info-circle-fill" style="font-size:1.6rem;"></i>
                      <span>Please fill in all fields correctly.</span>
                    </div>';
          }
      }
      ?>
    </div>

    <!-- ===== FOOTER ===== -->
    <div class="footer-note">
      <span><i class="bi bi-brightness-high-fill me-1" style="color: #e3b27c;"></i> 2026 Nasi Lemak Bob · Ampang, Selangor</span>
      <span class="mx-2">|</span>
      <span><i class="bi bi-instagram me-1"></i> @nasilemakbob</span>
      <span class="mx-2">|</span>
      <span><i class="bi bi-telephone-fill me-1"></i> +603-4251 8890</span>
    </div>

  </div> <!-- /.page-overlay -->

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>