<?php
session_start();

include 'connect.php'; // Include your database connection script

if (isset($_SESSION['username'])) {
    // Redirect logged-in users to their dashboards
    if ($_SESSION['user_type'] === 'admin') {
        header("Location: admin_dashboard.php");
        exit;
    } else {
        header("Location: users_dashboard.php");
        exit;
    }
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the user exists in the users table
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $stored_password = $row['password'];

        if (password_verify($password, $stored_password)) {
            $_SESSION['username'] = $username;
            $_SESSION['user_type'] = 'ordinary';
            header("Location: users_dashboard.php");
            exit;
        } else {
            $error = "Invalid username or password.";
        }
    } else {
        // Check if the user exists in the admin_users table
        $query = "SELECT * FROM admin_users WHERE username = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $stored_password = $row['password'];

            if (password_verify($password, $stored_password)) {
                $_SESSION['username'] = $username;
                $_SESSION['user_type'] = 'admin';
                header("Location: admin_dashboard.php");
                exit;
            } else {
                $error = "Invalid username or password.";
            }
        } else {
            $error = "Invalid username or password.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php include 'header.php'; ?>
<div class="container narrow">
    <h2>Login</h2>
    <?php if (!empty($error)): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

    <form action="login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <div class="button-group">
            <input type="submit" value="Login">
        </div>
    </form>
    <div>
        <p>Don't have an account yet?<a href="create.php">Sign up</a></p>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
