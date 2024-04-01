<?php
session_start();

if (!isset ($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Patient Record Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="dashboard.css">
    <script>
        function toggleForm() {
            var form = document.getElementById("add-patient-form");
            form.classList.toggle("show");
        }
    </script>
</head>

<body>
    <div class="top-panel">
        <div class="logo-title">
            <img src="your_logo.png" alt="Logo" class="logo">
        </div>
        <div class="user-info">
            <div class="user-circle">
            </div>
            <span class="username">
                <?php echo $_SESSION['username']; ?>
            </span>
        </div>
    </div>
    <div class="sidebar">
        <div class="header">
            <img src="jmclogo.png" alt="Logo" class="logo">
            <h2>Patient Record Management System</h2>
        </div>

        <a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="patient_records.php"><i class="fas fa-users"></i> Patient Records</a>
        <a href="add_records.php"><i class="fas fa-plus-circle"></i> Add Records</a>
        <a href="add_users.php"><i class="fas fa-user-plus"></i> Add Users</a>
        <a href="user_logs.php"><i class="fas fa-clipboard-list"></i> User Logs</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    
</body>

</html>