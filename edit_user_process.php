<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $id = $_POST['patient_id'];
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

    // Update patient details in the database
    $update_query = "UPDATE patients SET patient_case_no = ?, lastname = ?, firstname = ?, middlename = ?, gender = ?, age = ?, contact = ?, email = ?, address = ?, date_added = ? WHERE id = ?";

    // Prepare the update statement
    $stmt = mysqli_prepare($conn, $update_query);

    if ($stmt) {
        // Bind parameters to the statement
        mysqli_stmt_bind_param($stmt, 'sssssiisssi', $patient_case_no, $lastname, $firstname, $middlename, $gender, $age, $contact, $email, $address, $date_added, $id);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['success'] = "Patient details updated successfully.";
            header("Location: patient_records.php");
            exit();
        } else {
            $_SESSION['error'] = "Error updating patient details: " . mysqli_error($conn);
            header("Location: edit_patient.php?id=$id");
            exit();
        }
    } else {
        $_SESSION['error'] = "Error preparing update statement: " . mysqli_error($conn);
        header("Location: edit_patient.php?id=$id");
        exit();
    }
} else {
    // Redirect to the appropriate page if accessed without POST method
    header("Location: patient_records.php");
    exit();
}
?>
