<?php
// db_connect.php - Database connection settings for Nasi Lemak Bob website

$db_host = "localhost";
$db_user = "root";       // change to your MySQL username
$db_pass = "kptm123";           // change to your MySQL password
$db_name = "nasi_lemak_bob.";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>