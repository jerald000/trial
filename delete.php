<?php
// Include the database connection file
include 'connect.php';

// Check if user ID is provided in the URL
if(isset($_GET['id'])) {
    // Sanitize the user ID to prevent SQL injection
    $userId = mysqli_real_escape_string($con, $_GET['id']);

    // Query to delete the user from the database
    $query = "DELETE FROM users WHERE id = '$userId'";
    
    // Execute the query
    if(mysqli_query($con, $query)) {
        // Redirect back to view.php
        header("Location: view.php");
        exit();
    }
}

// Redirect back to view.php if user ID is not provided or deletion fails
header("Location: view.php");
exit();

// Close the database connection
mysqli_close($con);
?>
