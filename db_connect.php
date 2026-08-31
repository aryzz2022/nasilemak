<?php
// db_connect.php - Sambungan pangkalan data MySQLi untuk Railway

// Paparkan ralat secara jelas jika ada isu pada skrip
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db_host = getenv("MYSQLHOST") ?: "mysql.railway.internal";
$db_user = getenv("MYSQLUSER") ?: "root";
$db_pass = getenv("MYSQLPASSWORD") ?: "";
$db_name = getenv("MYSQL_DATABASE") ?: "railway";
$db_port = getenv("MYSQLPORT") ?: 3306;

// Sambungan menggunakan mysqli
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name, (int)$db_port);

// Semak jika sambungan gagal
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mulakan sesi jika belum dimulakan
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
