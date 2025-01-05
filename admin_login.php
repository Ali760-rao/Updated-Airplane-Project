<?php
session_start();

// If admin is already logged in, redirect to view_tickets.php
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: view_tickets.php");
    exit();
}

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Replace with actual admin credentials
    $admin_username = 'admin'; // Change this to your preferred username
    $admin_password = 'password123'; // Change this to your preferred password

    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION['admin_logged_in'] = true; // Set session variable
        header("Location: view_tickets.php"); // Redirect to the admin page
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Admin Login</h1>
    <form method="POST" action="admin_login.php" class="booking-form">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" class="btn">Login</button>
        <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
    </form>
</body>
</html>
