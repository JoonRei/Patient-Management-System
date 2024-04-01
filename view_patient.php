<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}

include 'db_connection.php';


if(isset($_GET['id'])) {
    $patientId = $_GET['id'];
    

    $sql = "SELECT * FROM patients WHERE id = $patientId";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
      
        $patient_case_no = $row['patient_case_no'];
        $lastName = $row['lastname'];
        $firstName = $row['firstname'];
        $middleName = $row['middlename'];
        $gender = $row['gender'];
        $age = $row['age'];
        $contact = $row['contact'];
        $email = $row['email'];
        $address = $row['address'];
    } else {
        
        echo "Patient not found.";
        exit();
    }
} else {
  
    echo "Patient ID not provided.";
    exit();
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Patient Record Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="dashboard.css">
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
        <h1>Patient Details</h1>
        <div class="patient-details-container">
            <div class="patient-detail">
                <h3>Patient Case No.:</h3>
                <p><?php echo $patient_case_no; ?></p>
            </div>
            <div class="patient-detail">
                <h3>Last Name:</h3>
                <p><?php echo $lastName; ?></p>
            </div>
            <div class="patient-detail">
                <h3>First Name:</h3>
                <p><?php echo $firstName; ?></p>
            </div>
            <div class="patient-detail">
                <h3>Middle Name:</h3>
                <p><?php echo $middleName; ?></p>
            </div>
            <div class="patient-detail">
                <h3>Gender:</h3>
                <p><?php echo $gender; ?></p>
            </div>
            <div class="patient-detail">
                <h3>Age:</h3>
                <p><?php echo $age; ?></p>
            </div>
            <div class="patient-detail">
                <h3>Contact Number:</h3>
                <p><?php echo $contact; ?></p>
            </div>
            <div class="patient-detail">
                <h3>Email:</h3>
                <p><?php echo $email; ?></p>
            </div>
            <div class="patient-detail">
                <h3>Address:</h3>
                <p><?php echo $address; ?></p>
            </div>
        </div>
    </div>
    <script>
        function addFindings() {
    var caseNumber = document.getElementById("case_number").value;
    // Gather other form data similarly

    // Redirect to view_patients.php with URL parameters
    window.location.href = "view_patients.php?case_number=" + encodeURIComponent(caseNumber) + "&...";
}
    </script>

</body>

</html>
