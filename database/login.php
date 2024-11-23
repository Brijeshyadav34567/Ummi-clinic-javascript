<?php
session_start();

// Simulated user data (for demonstration purposes only; use a database in production)
$users = [
    'user1' => password_hash('password1', PASSWORD_DEFAULT),
    'user2' => password_hash('password2', PASSWORD_DEFAULT)
];

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Input validation
    if (empty($username) || empty($password)) {
        $error = "Both fields are required.";
    } elseif (isset($users[$username]) && password_verify($password, $users[$username])) {
        $_SESSION['user'] = $username;
        header('Location: dashboard.php'); // Redirect to a protected page
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php if ($error) : ?>
            <p class="error-message"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form id="loginForm" action="login.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
            <p class="message">Don't have an account? <a href="register.html">Sign up</a></p>
        </form>
    </div>

    <!-- Optional JavaScript for client-side validation -->
    <script src="Doctor.js"></script>
</body>
</html>
