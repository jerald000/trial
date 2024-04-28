<?php
include 'connect.php'; // Include your database connection script

// Retrieve user input from POST request
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Validate user input (example: check if email is valid)
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
    exit;
}

// Check if username or email already exists
$query = "SELECT * FROM users WHERE username = ? OR email = ?";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "ss", $username, $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    // User with the same username or email already exists, redirect back to the account creation page
    header("Location: index.php?error=exists");
    exit;
}

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert data into the users table using prepared statements
// Insert data into the users table using prepared statements
$query = "INSERT INTO users (username, email, password, original_password) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $hashed_password, $password); // Insert both hashed and original passwords
$result = mysqli_stmt_execute($stmt);


if ($result) {
    // Redirect to success.php
    header("Location: success.php");
    exit;
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
}

?>
