<?php

if (isset($_POST['id'])) {
    
    include 'db_connection.php';

    
    $userId = mysqli_real_escape_string($conn, $_POST['id']);

    
    $sql = "DELETE FROM users WHERE id = '$userId'";
    if (mysqli_query($conn, $sql)) {
        
        echo "User deleted successfully";
    } else {
        
        echo "Error: " . mysqli_error($conn);
    }

    
    mysqli_close($conn);
} else {
    
    echo "User ID not provided";
}
?>
