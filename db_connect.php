<?php
// db_connect.php - Database connection settings for Railway

$db_host = getenv("MYSQLHOST") ?: "localhost";
$db_user = getenv("MYSQLUSER") ?: "root";
$db_pass = getenv("MYSQLPASSWORD") ?: "kptm123";
$db_name = getenv("MYSQL_DATABASE") ?: "nasi_lemak_bob";
$db_port = getenv("MYSQLPORT") ?: 3306;

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

