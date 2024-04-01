<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $patient_id = $_POST['patient_id'];
    $patient_case_no = $_POST['patient_case_no'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $date_added = $_POST['date_added']; 

   
    $sql = "UPDATE patients SET patient_case_no='$patient_case_no', lastname='$lastname', firstname='$firstname', middlename='$middlename', gender='$gender', age='$age', contact='$contact', email='$email', address='$address' WHERE id=$patient_id";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "Patient record updated successfully.";
        echo "<script>window.alert('Patient record updated successfully.'); window.location.href = 'patient_records.php';</script>";
    } else {
        $_SESSION['error'] = "Error updating patient record: " . mysqli_error($conn);
        echo "<script>window.alert('Error updating patient record: " . mysqli_error($conn) . "');</script>";
    }

    mysqli_close($conn);
    exit();
} else {
    header("Location: edit_patient.php");
    exit();
}
?>
