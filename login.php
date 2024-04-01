<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <img src="jmclogo.png" alt="Logo" class="logo">
        <h1>Patient Record</h1>
        <h1>Management System</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <input type="submit" value="Login">
        </form>
        <p class="no-account">Don't have an account? <a href="signup.php" class="signup">Sign Up</a></p>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include 'config.php';

            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                session_start();
                $_SESSION['username'] = $username;
                header("Location: dashboard.php");
            } else {
                echo "<p class='error-message'>Invalid username or password</p>";
            }
        }
        ?>
    </div>
</body>
</html>
