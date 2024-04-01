<?php
// Include your database connection file here
include 'db_connection.php';

// Check if case number exists
if(isset($_POST['case_number'])) {
    $caseNumber = $_POST['case_number'];
    $sql = "SELECT * FROM patients WHERE case_number = '$caseNumber'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        echo 'exists';
    } else {
        echo 'not_exists';
    }
}
?>
