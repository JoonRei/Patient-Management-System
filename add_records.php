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
    <link rel="stylesheet" href="add_records.css">

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include jQuery UI Datepicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <script>
        $(document).ready(function () {
            // Initialize Datepicker
            $("#date").datepicker({
                dateFormat: 'mm/dd/yy' // Set the date format
            });
        });

        function addFindings() {
            var caseNumber = document.getElementById("case_number").value;

            // Send an AJAX request to check if the case number already exists
            $.ajax({
                type: "POST",
                url: "check_case_number.php", // Change this to the PHP file that handles the AJAX request
                data: { case_number: caseNumber },
                success: function (response) {
                    if (response === "exists") {
                        // Display warning message for duplicate case number
                        document.getElementById("case_number_warning").innerHTML = "Case number already exists!";
                    } else {
                        // Reset the warning message
                        document.getElementById("case_number_warning").innerHTML = "";
                        // Display a success message in a popup dialog box
                        if (confirm("Record added successfully!")) {
                            // Reset the form for another entry
                            document.getElementById("add-records-form").reset();
                        }
                    }
                }
            });
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
                    <h2>Add Records</h2>
                    <form id="add-records-form" method="post" action="add_records_process.php">
                        <!-- Patient Information -->
                        <div class="form-group">
                            <label for="case_number">Patient Case Number:</label>
                            <input type="text" id="case_number" name="case_number" required>
                            <div id="case_number_warning" style="color: red;"></div> <!-- Warning message -->
                        </div>
                        <div class="form-group">
                            <br><label for="chief_complaint">Chief Complaint:</label>
                            <input type="text" id="chief_complaint" name="chief_complaint" required>
                        </div>
                        <div class="form-group">
                            <br><label for="present_illness">History of Present Illness:</label>
                            <textarea id="present_illness" name="present_illness" required></textarea>
                        </div>

                        <!-- Vital Signs -->
                        <h3>Vital Signs</h3>
                        <div class="form-row">
                            <div class="form-group">
                                <br><label for="blood_pressure">Blood Pressure:</label>
                                <input type="text" id="blood_pressure" name="blood_pressure">
                            </div>
                            <div class="form-group">
                                <br><label for="respiratory_rate">Respiratory Rate:</label>
                                <input type="text" id="respiratory_rate" name="respiratory_rate">
                            </div>
                            <div class="form-group">
                                <br><label for="capillary_refill">Capillary Refill:</label>
                                <input type="text" id="capillary_refill" name="capillary_refill">
                            </div>
                            <div class="form-group">
                                <br><label for="temperature">Temperature:</label>
                                <input type="text" id="temperature" name="temperature">
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <br><label for="weight">Weight:</label>
                                    <input type="text" id="weight" name="weight">
                                </div>
                                <div class="form-group">
                                    <br><label for="pulse_rate">Pulse Rate:</label>
                                    <input type="text" id="pulse_rate" name="pulse_rate">
                                </div>
                                <div class="form-group">
                                    <br><label for="date">Date:</label>
                                    <input type="text" id="date" name="date" placeholder="mm/dd/yyyy" required>
                                </div>
                            </div>

                            <!-- Physical Examination -->
                            <div class="form-group">
                                <br><label for="physical_exam">Physical Examination:</label>
                                <textarea id="physical_exam" name="physical_exam" required></textarea>
                            </div>

                            <!-- Diagnosis and Treatment -->
                            <div class="form-group">
                                <br><label for="diagnosis">Diagnosis:</label>
                                <textarea id="diagnosis" name="diagnosis" required></textarea>
                            </div>
                            <div class="form-group">
                                <br><label for="medication">Medication/Treatment:</label>
                                <textarea id="medication" name="medication" required></textarea>
                            </div>
                            <div class="form-actions">
                                <button type="button" class="submit-btn" onclick="addFindings()">Add Findings <i
                                        class="fas fa-arrow-right"></i></button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>