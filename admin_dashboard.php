<?php
// Start session to access session variables
session_start();

// Check if user is logged in and is an admin, redirect to login page if not
if (!isset($_SESSION['username']) || $_SESSION['user_type'] !== 'admin') {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <?php include 'header.php'; ?>

    <div class="container narrow">
        <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
        <p>This is your admin dashboard.</p>
        <p>Manage users, settings, and more from here.</p>
        <p><a href="view.php">View Users</a></p>
        <p><a href="logout.php">Logout</a></p>
    </div>

    <?php include 'footer.php'; ?>

</body>
</html>
