<?php
// Include the database connection file
include 'connect.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user ID from the form
    $userId = $_POST['id'];

    // Get the new username, email, and password from the form
    $newUsername = $_POST['new_username'];
    $newEmail = $_POST['new_email'];
    $newPassword = $_POST['new_password'];

    // Hash the new password
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Update the admin user information in the database
    $query = "UPDATE admin_users SET username=?, email=?, password=?, original_password=? WHERE id=?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "ssssi", $newUsername, $newEmail, $hashedPassword, $newPassword, $userId);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // If the update was successful, redirect to view users page
        header("Location: view.php");
        exit();
    } else {
        // If there was an error, display an error message
        echo "Error updating user: " . mysqli_error($con);
    }
}

// Close the database connection
mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Admin User</title>
</head>
<?php include 'header.php'; ?>

<body>

<div class="container narrow">
    <h2>Update Admin User</h2>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <div class="form-group">
            <label for="new_username">New Username:</label>
            <input type="text" id="new_username" name="new_username">
        </div>
        <div class="form-group">
            <label for="new_email">New Email:</label>
            <input type="email" id="new_email" name="new_email">
        </div>
        <div class="form-group">
            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password">
        </div>
        <div class="button-group">
            <input type="submit" value="Update" class="button">
        </div>
        <div class="button-group">
            <a href="view.php" class="button cancel">Cancel</a>
        </div>
    </form>
</div>

<?php include 'footer.php'; ?>

</body>
</html>
