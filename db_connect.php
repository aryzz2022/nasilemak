<?php
// db_connect.php - Sambungan pangkalan data untuk Railway

// Mengambil tetapan daripada Environment Variables Railway
$db_host = getenv("MYSQLHOST") ?: "mysql.railway.internal";
$db_user = getenv("MYSQLUSER") ?: "root";
$db_pass = getenv("MYSQLPASSWORD") ?: "";
$db_name = getenv("MYSQL_DATABASE") ?: "railway";
$db_port = getenv("MYSQLPORT") ?: 3306;

try {
    // Membina DSN untuk sambungan PDO MySQL
    $dsn = "mysql:host={$db_host};port={$db_port};dbname={$db_name};charset=utf8mb4";
    
    $conn = new PDO($dsn, $db_user, $db_pass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Memaparkan ralat secara tepat
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       # Mengembalikan hasil query sebagai array berasosiasi
        PDO::ATTR_EMULATE_PREPARES   => false,                  # Meningkatkan keselamatan terhadap SQL Injection
    ]);
} catch (PDOException $e) {
    // Paparkan mesej ralat jika sambungan gagal
    die("Connection failed: " . $e->getMessage());
}

// Mulakan sesi jika belum dimulakan
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
