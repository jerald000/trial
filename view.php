<!DOCTYPE html>
<html>
<head>
    <title>View Users</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">
    
    <div style="width: 80%; margin: 20px auto; background-color: #fff; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); padding: 20px;">
        <h1 style="text-align: center; color: #007bff;">All Users</h1>
        <!-- Add back button to return to the previous page -->
        <button onclick="goBack()" style="background-color: #007bff; color: #fff; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; margin-bottom: 20px;">Back</button>
        <!-- End of back button -->

        <h2 style="color: #007bff;">Normal Users</h2>
        <!-- Normal users table -->
        <table style="width: 100%; border-collapse: collapse;">
            <!-- Table headers -->
            <tr>
                <th style="padding: 10px; border: 1px solid #ccc; background-color: #f0f0f0; font-weight: bold; text-align: left;">Username</th>
                <th style="padding: 10px; border: 1px solid #ccc; background-color: #f0f0f0; font-weight: bold; text-align: left;">Email</th>
                <th style="padding: 10px; border: 1px solid #ccc; background-color: #f0f0f0; font-weight: bold; text-align: left;">Password</th>
                <th style="padding: 10px; border: 1px solid #ccc; background-color: #f0f0f0; font-weight: bold; text-align: center;">Actions</th>
            </tr>
            <?php
                // Include the database connection file
                include 'connect.php';

                // Query to retrieve all normal users from the users table
                $query = "SELECT * FROM users";
                $result = mysqli_query($con, $query);

                // Check if there are any rows returned from users table
                if (mysqli_num_rows($result) > 0) {
                    // Loop through each row of data
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td style='padding: 10px; border: 1px solid #ccc;'>" . $row['username'] . "</td>";
                        echo "<td style='padding: 10px; border: 1px solid #ccc;'>" . $row['email'] . "</td>";
                        echo "<td style='padding: 10px; border: 1px solid #ccc;'>" . $row['original_password'] . "</td>"; // Display original password
                        echo "<td style='padding: 10px; border: 1px solid #ccc; text-align: center;'>";
                        echo "<button onclick='deleteUser(" . $row['id'] . ")' style='background-color: #ff6347; color: #fff; border: none; padding: 5px 10px; border-radius: 4px; cursor: pointer; margin-right: 5px;'>Delete</button>";
                        echo "<button onclick='updateUser(" . $row['id'] . ")' style='background-color: #007bff; color: #fff; border: none; padding: 5px 10px; border-radius: 4px; cursor: pointer;'>Update</button>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' style='padding: 10px; border: 1px solid #ccc;'>No normal users found</td></tr>";
                }

                // Close the database connection
                mysqli_close($con);
            ?>
        </table>

        <h2 style="color: #007bff; margin-top: 20px;">Admin Users</h2>
        <!-- Admin users table -->
        <table style="width: 100%; border-collapse: collapse;">
            <!-- Table headers -->
            <tr>
                <th style="padding: 10px; border: 1px solid #ccc; background-color: #f0f0f0; font-weight: bold; text-align: left;">Username</th>
                <th style="padding: 10px; border: 1px solid #ccc; background-color: #f0f0f0; font-weight: bold; text-align: left;">Email</th>
                <th style="padding: 10px; border: 1px solid #ccc; background-color: #f0f0f0; font-weight: bold; text-align: left;">Password</th>
                <th style="padding: 10px; border: 1px solid #ccc; background-color: #f0f0f0; font-weight: bold; text-align: center;">Actions</th>
            </tr>
            <?php
                // Include the database connection file
                include 'connect.php';

                // Query to retrieve all admin users from the admin_users table
                $query = "SELECT * FROM admin_users";
                $result = mysqli_query($con, $query);

                // Check if there are any rows returned from admin_users table
                if (mysqli_num_rows($result) > 0) {
                    // Loop through each row of data
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td style='padding: 10px; border: 1px solid #ccc;'>" . $row['username'] . "</td>";
                        echo "<td style='padding: 10px; border: 1px solid #ccc;'>" . $row['email'] . "</td>";
                        echo "<td style='padding: 10px; border: 1px solid #ccc;'>" . $row['original_password'] . "</td>"; // Display hashed password
                        echo "<td style='padding: 10px; border: 1px solid #ccc; text-align: center;'>";
                        echo "<button onclick='deleteAdminUser(" . $row['id'] . ")' style='background-color: #ff6347; color: #fff; border: none; padding: 5px 10px; border-radius: 4px; cursor: pointer; margin-right: 5px;'>Delete</button>";
                        echo "<button onclick='updateAdminUser(" . $row['id'] . ")' style='background-color: #007bff; color: #fff; border: none; padding: 5px 10px; border-radius: 4px; cursor: pointer;'>Update</button>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' style='padding: 10px; border: 1px solid #ccc;'>No admin users found</td></tr>";
                }

                // Close the database connection
                mysqli_close($con);
            ?>
        </table>
    </div>


    <!-- JavaScript function to go back to the previous page -->
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
