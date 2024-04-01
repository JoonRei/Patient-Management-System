<?php
session_start();

if (!isset ($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'db_connection.php';


if(isset($_GET['id'])) {
    $userId = $_GET['id'];
    
    
    $sql = "SELECT * FROM users WHERE id = $userId";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
       
        $username = $row['username'];
        $password = $row['password']; 
        $position = $row['position'];
    } else {
        
        echo "User not found.";
        exit();
    }
} else {
   
    echo "User ID not provided.";
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Patient Record Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="add_user.css">
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

    <div class="content">
        <div class="action-bar">
            <div class="user-container">
                <div class="add-user-container">
                    <h2>Edit Users</h2>
                    <i class="fas fa-arrow-left back-arrow" onclick="goBack()" style="margin-left: 1480px; margin-top: 10px; margin-bottom: 20px; font-size: 20px;"></i>
                    <form method="post" action="edit_user_process.php">
                        <div class="input-row">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" id="username" name="username" value="<?php echo $username; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" id="password" name="password" value="<?php echo $password; ?>" required>
                            </div>
                        
                            <div class="form-group">
                                <label for="position">Position:</label>
                                <select id="position" name="position" required>
                                    <option value="" disabled>Select Position</option>
                                    <option value="Doctor" <?php if($position == "Doctor") echo "selected"; ?>>Doctor</option>
                                    <option value="Nurse" <?php if($position == "Nurse") echo "selected"; ?>>Nurse</option>
                                    <option value="Admin" <?php if($position == "Admin") echo "selected"; ?>>Admin</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $userId; ?>">
                        <button type="submit" class="add-user-btn">Update User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</body>

</html>
