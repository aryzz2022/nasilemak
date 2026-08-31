<?php
require_once 'db_connect.php';

try {
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );";

    $conn->exec($sql);
    echo "<h2 style='color: green;'>✅ Jadual 'users' berjaya dicipta dalam pangkalan data Railway!</h2>";
    echo "<p><a href='login.php'>Klik di sini untuk ke laman Login</a></p>";
} catch (PDOException $e) {
    echo "<h2 style='color: red;'>❌ Ralat: " . $e->getMessage() . "</h2>";
}
?>
