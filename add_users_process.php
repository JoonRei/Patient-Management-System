<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    include 'db_connection.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $position = $_POST['position'];
    $date_added = date('Y-m-d H:i:s');

  
    $sql = "INSERT INTO users (username, password, position, date_added) VALUES ('$username', '$password', '$position', '$date_added')";

   
    if (mysqli_query($conn, $sql)) {
     
        header("Location: add_users.php");
        exit();
    } else {
      
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }


    mysqli_close($conn);
} else {
 
    header("Location: add_users.php");
    exit();
}
?>
