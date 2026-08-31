<?php
// Panggil sambungan pangkalan data PDO
require_once "db_connect.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    if ($username === "" || $password === "") {
        $error = "Please enter both username and password.";
    } else {
        try {
            // Menggunakan Prepared Statement versi PDO
            $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = :username");
            $stmt->execute(['username' => $username]);
            $user = $stmt->fetch();

            if ($user) {
                // Semak kata laluan (password)
                if (password_verify($password, $user["password"])) {
                    // Kata laluan betul - simpan maklumat ke dalam SESSION
                    $_SESSION["user_id"] = $user["id"];
                    $_SESSION["username"] = $user["username"];

                    // Direct pengguna ke laman index.php
                    header("Location: index.php");
                    exit;
                } else {
                    $error = "Incorrect username or password.";
                }
            } else {
                $error = "Incorrect username or password.";
            }
        } catch (PDOException $e) {
            $error = "Database error: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Nasi Lemak Bob</title>
  <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="form-box">
        <h1>Nasi Lemak Bob</h1>
        <h2>Login</h2>

        <?php if ($error): ?>
            <p class="msg error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <form method="POST" action="login.php">
            <label>Username</label>
            <input type="text" name="username" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit">Login</button>
        </form>

        <p class="link">Don't have an account? <a href="register.php">Register here</a></p>
    </div>
</body>
</html>
