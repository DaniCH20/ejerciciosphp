<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - TaskZone</title>
</head>

<body>
    <header>
        <h1>TaskZone</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="login.php">Login</a>
            <a href="register.php" class="active">Register</a>
        </nav>
    </header>

    <main>
        <section class="register-section">
            <h2>Create an Account</h2>
            <form action="register.php" method="POST" class="register-form">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Register</button>
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
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $pdo->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
    try {
        $stmt->execute(['username' => $username, 'password' => $password]);
        echo "<p>Registration successful! You can now <a href='login.php'>login</a>.</p>";
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            echo "<p>Error: Username already exists. Please choose another.</p>";
        } else {
            error_log('Registration error: ' . $e->getMessage());
            echo "<p>An error occurred during registration. Please try again later.</p>";
        }
    }
}

?>