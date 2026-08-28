<?php
include 'db_connect.php';
$error = "";
$success = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $password = $_POST["password"];
    if ($username === "" || $password === "") {
        $error = "Please fill in both fields.";
    } else {
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $error = "That username is already taken.";
        } else {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $insert = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $insert->bind_param("ss", $username, $hashed);
            $insert->execute();
            $success = "Account created! You can now log in.";
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - Nasi Lemak Bob</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="page">
    <div class="form-box">
      <div class="brand">
        <span class="brand-icon">🍚</span>
        <h1>Nasi Lemak Bob</h1>
        <p class="tagline">Sedap tak boleh tahan</p>
      </div>

      <h2>Create an Account</h2>

      <?php if ($error): ?>
        <p class="msg error"><?php echo htmlspecialchars($error); ?></p>
      <?php endif; ?>
      <?php if ($success): ?>
        <p class="msg success"><?php echo htmlspecialchars($success); ?></p>
      <?php endif; ?>

      <form method="POST" action="register.php">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter a username" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter a password" required>

        <button type="submit">Create Account</button>
      </form>

      <p class="link">Already have an account? <a href="login.php">Log in here</a></p>
    </div>
  </div>
</body>
</html>