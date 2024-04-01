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

    <div class="content">
        <div class="action-bar">
            <div class="add-patient-form-container">
                <div id="add-patient-form" class="add-patient-form">
                    <h2>Add Patient</h2>
                    <form method="post" action="add_patient_process.php">

                        <div class="form-row">
                            <div class="form-group">
                                <label for="patient_case_no">Patient Case No.</label>
                                <input type="text" id="patient_case_no" name="patient_case_no" required>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" id="lastname" name="lastname" required>
                            </div>
                            <div class="form-group">
                                <br><label for="firstname">First Name</label>
                                <input type="text" id="firstname" name="firstname" required>
                            </div>
                            <div class="form-group">
                                <br><label for="middlename">Middle Name</label>
                                <input type="text" id="middlename" name="middlename">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <br><label>Gender</label>
                                <div class="gender-radio">
                                    <input type="radio" id="male" name="gender" value="male" required>
                                    <label for="male">Male</label>

                                    <input type="radio" id="female" name="gender" value="female" required>
                                    <label for="female">Female</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <br><label for="age">Age</label>
                                <input type="number" id="age" name="age" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <br><label for="contact">Contact Number</label>
                            <input type="number" id="contact" name="contact" pattern="[0-9]*" required>
                        </div>

                        <div class="form-group">
                            <br><label for="email">Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <br><label for="address">Address</label>
                            <textarea id="address" name="address" required></textarea>
                        </div>

                        <div class="form-group">
                            <br><label for="date_added">Date</label>
                            <input type="text" id="date_added" name="date_added"
                                value="<?php echo date('Y-m-d H:i:s'); ?>" readonly>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="submit-btn">Submit</button>
                            <button type="button" class="cancel-btn"
                                onclick="window.location.href = 'patient_records.php';">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>

        function validateContactNumber() {
            var contactInput = document.getElementById("contact");
            contactInput.value = contactInput.value.replace(/\D/g, '');
        }

        document.getElementById("contact").addEventListener("input", validateContactNumber);
    </script>

</body>

</html>