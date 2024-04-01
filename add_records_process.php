<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}

// Include your database connection file
include 'db_connection.php';

// Retrieve form data
$caseNumber = $_POST['case_number'];
$chiefComplaint = $_POST['chief_complaint'];
$presentIllness = $_POST['present_illness'];
$bloodPressure = $_POST['blood_pressure'];
$respiratoryRate = $_POST['respiratory_rate'];
$capillaryRefill = $_POST['capillary_refill'];
$temperature = $_POST['temperature'];
$weight = $_POST['weight'];
$pulseRate = $_POST['pulse_rate'];
$date = $_POST['date'];
$physicalExam = $_POST['physical_exam'];
$diagnosis = $_POST['diagnosis'];
$medication = $_POST['medication'];

// Insert data into the patient_records table
$sql = "INSERT INTO patient_records (case_number, chief_complaint, present_illness, blood_pressure, respiratory_rate, capillary_refill, temperature, weight, pulse_rate, date, physical_exam, diagnosis, medication) 
        VALUES ('$caseNumber', '$chiefComplaint', '$presentIllness', '$bloodPressure', '$respiratoryRate', '$capillaryRefill', '$temperature', '$weight', '$pulseRate', '$date', '$physicalExam', '$diagnosis', '$medication')";
        
if (mysqli_query($conn, $sql)) {
    // Record inserted successfully
    echo "Record added successfully.";
} else {
    // Error occurred while inserting record
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
