<?php
// Establish connection to the database
$con = mysqli_connect('192.168.30.22', 'root', '', 'mydb');

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
