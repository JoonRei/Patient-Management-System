<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}

include 'db_connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

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

  
    $sql = "INSERT INTO patients (patient_case_no, lastname, firstname, middlename, gender, age, contact, email, address, date_added) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssiisss", $patient_case_no, $lastname, $firstname, $middlename, $gender, $age, $contact, $email, $address, $date_added);


    if ($stmt->execute()) {
      
        header("Location: patient_records.php");
        exit();
    } else {
      
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

 
    $stmt->close();
    $conn->close();
}
?>
