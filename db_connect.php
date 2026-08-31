<?php
// db_connect.php - Sambungan pangkalan data PDO untuk Railway

// Paparkan ralat secara jelas jika ada isu pada skrip
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Mengambil tetapan daripada Environment Variables Railway
$db_host = getenv("MYSQLHOST") ?: "mysql.railway.internal";
$db_user = getenv("MYSQLUSER") ?: "root";
$db_pass = getenv("MYSQLPASSWORD") ?: "";
$db_name = getenv("MYSQL_DATABASE") ?: "railway";
$db_port = getenv("MYSQLPORT") ?: 3306;

try {
    // Membina DSN (Data Source Name)
    $dsn = "mysql:host={$db_host};port={$db_port};dbname={$db_name};charset=utf8mb4";
    
    // Membuka sambungan pangkalan data
    $conn = new PDO($dsn, $db_user, $db_pass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Memaparkan ralat secara tepat jika query bermasalah
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Mengembalikan data sebagai Array Berasosiasi
        PDO::ATTR_EMULATE_PREPARES   => false,                  // Meningkatkan keselamatan terhadap SQL Injection
    ]);
} catch (PDOException $e) {
    // Paparkan mesej ralat jika sambungan gagal
    die("Sambungan pangkalan data gagal: " . $e->getMessage());
}

// Mulakan sesi pengguna jika belum dimulakan
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
