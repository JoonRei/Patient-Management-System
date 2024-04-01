<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'config.php'; // Include your database connection configuration

    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Password complexity validation
    if (!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+}{"\':;?\/\>.<,])(?=.*[a-zA-Z]).{8,}$/', $password)) {
        echo "<p class='error-message'>Password must contain at least one number, one uppercase letter, one lowercase letter, one symbol, and be at least 8 characters long.</p>";
        exit();
    }

    // Check if username already exists
    $check_username_sql = "SELECT * FROM users WHERE username='$username'";
    $check_username_result = $conn->query($check_username_sql);

    if ($check_username_result->num_rows > 0) {
        echo "<p class='error-message'>Username already exists. Please choose a different one.</p>";
    } else {
        // Insert new user into the database
        $insert_user_sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        
        if ($conn->query($insert_user_sql) === TRUE) {
            header("Location: login.php"); // Redirect to login page after successful sign-up
            exit();
        } else {
            echo "<p class='error-message'>Error: " . $insert_user_sql . "<br>" . $conn->error . "</p>";
        }
    }

    $conn->close(); // Close database connection
}
?>
