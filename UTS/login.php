<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Assignment Tracker</title>
    <style>
        body { font-family: Arial, sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f4f4f4; }
        .login-container { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        h2 { text-align: center; color: #007bff; }
        input[type="text"], input[type="password"] { width: 100%; padding: 10px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; width: 100%; }
        button:hover { background-color: #0056b3; }
        .error { color: red; text-align: center; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Assignment Tracker Login</h2>
        <?php
        if (isset($_GET['pesan']) && $_GET['pesan'] == 'gagal') {
            echo '<p class="error">Username atau Password salah!</p>';
        }
        if (isset($_GET['pesan']) && $_GET['pesan'] == 'logout') {
            echo '<p style="color: green; text-align: center; margin-bottom: 10px;">Anda berhasil logout.</p>';
        }
        if (isset($_GET['pesan']) && $_GET['pesan'] == 'belum_login') {
            echo '<p class="error">Anda harus login terlebih dahulu.</p>';
        }
        ?>
        <form method="POST" action="proses_login.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>