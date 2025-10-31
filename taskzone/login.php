<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - TaskZone</title>
</head>
<body>
    <header>
        <h1>TaskZone</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="login.php" class="active">Login</a>
            <a href="register.php">Register</a>
        </nav>
    </header>

    <main>
        <section class="login-section">
            <h2>User Login</h2>
            <form action="login.php" method="POST" class="login-form">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Login</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 TaskZone. All rights reserved.</p>
    </footer>
</body>
</html>
<?php
require_once 'connection.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        $_COOKIE['lastLogin'] = date('Y-m-d H:i:s');
        setcookie('lastLogin', date('Y-m-d H:i:s'), time() + (86400 * 30), "/");

        echo "<p>Login successful! Welcome, " . htmlspecialchars($user['username']) . ".</p>";
        header('Location: dashboard.php');
        exit();
    } else {
        echo "<p>Invalid username or password. Please try again.</p>";
    }
}