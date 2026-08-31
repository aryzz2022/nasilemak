<?php
// Panggil sambungan pangkalan data
require_once 'db_connect.php';

try {
    // Arahan SQL untuk membina jadual users
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );";

    // Jalankan arahan SQL menggunakan PDO
    $conn->exec($sql);
    echo "<h1> Berjaya! Jadual 'users' telah dicipta.</h1>";
    echo "<p><a href='login.php'>Klik sini untuk pergi ke Login</a></p>";

} catch (PDOException $e) {
    echo "<h1> Ralat: " . $e->getMessage() . "</h1>";
}
?>
