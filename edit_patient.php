<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'db_connection.php';

if (isset($_GET['id'])) {
    $patient_id = $_GET['id'];

    $sql = "SELECT * FROM patients WHERE id = $patient_id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
    } else {
        $_SESSION['error'] = "Patient not found.";
        header("Location: patient_records.php");
        exit();
    }
} else {
    $_SESSION['error'] = "Patient ID not provided.";
    header("Location: patient_records.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Patient</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="edit_patient.css">
</head>

<body>
    <div class="top-panel">
        <div class="logo-title">
            <img src="jmclogo.png" alt="Logo" class="logo">
            <span class="title-text">Patient Record Management System</span>
        </div>
        <div class="user-info">
            <div class="user-circle"></div>
            <span class="username"><?php echo $_SESSION['username']; ?></span>
        </div>
    </div>

    <div class="content">
        <div class="action-bar">
            <div class="edit-patient-form-container">
                <div id="edit-patient-form" class="edit-patient-form">
                    <h2>Edit Patient</h2>
                    <form method="post" action="edit_patient_process.php">

                        <input type="hidden" name="patient_id" value="<?php echo $row['id']; ?>">

                        <div class="form-row">
                            <div class="form-group">
                                <label for="patient_case_no">Patient Case No.</label>
                                <input type="text" id="patient_case_no" name="patient_case_no" value="<?php echo $row['patient_case_no']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" id="lastname" name="lastname" value="<?php echo $row['lastname']; ?>" required>
                            </div>
                            <div class="form-group">
                                <br><label for="firstname">First Name</label>
                                <input type="text" id="firstname" name="firstname" value="<?php echo $row['firstname']; ?>" required>
                            </div>
                            <div class="form-group">
                                <br><label for="middlename">Middle Name</label>
                                <input type="text" id="middlename" name="middlename" value="<?php echo $row['middlename']; ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <br><label>Gender</label>
                                <div class="gender-radio">
                                    <input type="radio" id="male" name="gender" value="male" <?php if ($row['gender'] == 'male') echo 'checked'; ?> required>
                                    <label for="male">Male</label>

                                    <input type="radio" id="female" name="gender" value="female" <?php if ($row['gender'] == 'female') echo 'checked'; ?> required>
                                    <label for="female">Female</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <br><label for="age">Age</label>
                                <input type="number" id="age" name="age" value="<?php echo $row['age']; ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <br><label for="contact">Contact Number</label>
                            <input type="number" id="contact" name="contact" pattern="[0-9]*" value="<?php echo $row['contact']; ?>" required>
                        </div>

                        <div class="form-group">
                            <br><label for="email">Email</label>
                            <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>
                        </div>

                        <div class="form-group">
                            <br><label for="address">Address</label>
                            <textarea id="address" name="address" required><?php echo $row['address']; ?></textarea>
                        </div>

                        <div class="form-group">
                            <br><label for="date_added">Date</label>
                            <input type="text" id="date_added" name="date_added" value="<?php echo $row['date_added']; ?>" readonly>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="submit-btn">Save Changes</button>
                            <button type="button" class="cancel-btn" onclick="window.location.href = 'patient_records.php';">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
