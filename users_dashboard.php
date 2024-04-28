<?php
// Start session to access session variables
session_start();

// Check if user is logged in, redirect to login page if not
if (!isset($_SESSION['username']) || $_SESSION['user_type'] !== 'ordinary') {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <?php include 'header.php'; ?>

    <div class="container narrow">
        <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
        <p>This is your user dashboard.</p>
        <p>Feel free to explore and use the features available to you.</p>
        <p><a href="logout.php">Logout</a></p>
    </div>

    <?php include 'footer.php'; ?>

</body>
</html>
