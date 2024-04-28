<?php include 'header.php'; ?>

<body>

<div class="container narrow">
    <div class="action-links">
    </div>
    <h2>Create Account</h2>
    <?php
    // Check if the error parameter exists in the URL
    if (isset($_GET['error']) && $_GET['error'] == 'exists') {
        echo "<p style='color: red;'>Username or email already exists</p>";
    }
    ?>
    <p>Please fill this form to create an account.</p>

    <form action="submit.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <div class="button-group">
            <input type="submit" value="Create Account">
            <input type="reset" value="Reset">
        </div>
    </form>

    <p>Already have an account? <a href="index.html">Login here.</a></p>
</div>

<?php include 'footer.php'; ?>

</body>
</html>