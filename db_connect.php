<?php
// db_connect.php - Database connection settings for Railway

$db_host = getenv("MYSQLHOST") ?: "mysql.railway.internal";
$db_user = getenv("MYSQLUSER") ?: "root";
$db_pass = getenv("MYSQLPASSWORD") ?: "njoYcoGfOcgaJRikRgtwAAaDFtVrlwWO";
$db_name = getenv("MYSQL_DATABASE") ?: "railway";
$db_port = getenv("MYSQLPORT") ?: 3306;

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

