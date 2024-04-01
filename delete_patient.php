<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'db_connection.php';

// Check if the patient ID is provided in the URL parameter
if (isset($_GET['id'])) {
    $patient_id = $_GET['id'];

    // Delete the patient record from the database
    $delete_query = "DELETE FROM patients WHERE id = $patient_id";
    if (mysqli_query($conn, $delete_query)) {
        // Patient record deleted successfully
        header("Location: patient_records.php"); // Redirect back to the patient records page
        exit();
    } else {
        // Error occurred while deleting the patient record
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    // Redirect if patient ID is not provided
    header("Location: patient_records.php");
    exit();
}

mysqli_close($conn);
?>
