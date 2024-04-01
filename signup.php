<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="container">
        <img src="jmclogo.png" alt="Logo" class="logo">
        <h1>Create an Account</h1>
        
        <form method="post" action="signup_process.php">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="confirm_password" id="confirm_password" required>
            <input type="submit" value="Sign Up">
        </form>
        <p class="no-account">Already have an account? <a href="login.php" class="login">Login</a></p>
        <p id="password-requirements" class="password-requirements" style="display: none;">Password must contain at least one number, one uppercase letter, one lowercase letter, one symbol, and be at least 8 characters long.</p>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var passwordInput = document.getElementById('password');
            var confirmPasswordInput = document.getElementById('confirm_password');
            var passwordRequirements = document.getElementById('password-requirements');

            passwordInput.addEventListener('focus', function() {
                passwordRequirements.style.display = 'block';
            });

            passwordInput.addEventListener('blur', function() {
                passwordRequirements.style.display = 'none';
            });

            confirmPasswordInput.addEventListener('input', function() {
                if (confirmPasswordInput.value !== passwordInput.value) {
                    confirmPasswordInput.setCustomValidity("Passwords don't match");
                } else {
                    confirmPasswordInput.setCustomValidity('');
                }
            });
        });
    </script>
</body>
</html>
