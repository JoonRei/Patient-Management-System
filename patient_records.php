<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'db_connection.php';

$search = "";
if (isset($_POST['search'])) {
    $search = $_POST['search'];
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Patient Record Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="dashboard.css">
    <script>
        function filterPatients() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("patientTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                var found = false;
              
                for (var j = 0; j < tr[i].cells.length; j++) {
                    td = tr[i].cells[j];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                       
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            found = true;
                            break;
                        }
                    }
                }
               
                tr[i].style.display = found ? "" : "none";
            }
        }
    </script>
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
        <h1>Patient Records</h1>
        <div class="action-bar">
            <div class="add-patient">
                <a href="add_patient.php" class="add-patient-btn">Add Patient</a>
                <form method="post" action="patient_records.php" class="search-bar">
                    <input type="text" id="searchInput" name="search" placeholder="Search..." value="<?php echo $search; ?>" oninput="filterPatients()">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="patient-table">
                <table>
                    <thead>
                        <tr>
                            <th>Patient Case No.</th>
                            <th>Lastname</th>
                            <th>Firstname</th>
                            <th>Middle Name</th>
                            <th>Gender</th>
                            <th>Age</th>
                            <th>Date Added</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="patientTable">
                        <?php
                       $sql = "SELECT * FROM patients";

                       if (!empty($search)) {
                           $sql .= " WHERE patient_case_no LIKE '%$search%' OR lastname LIKE '%$search%' OR firstname LIKE '%$search%' OR middlename LIKE '%$search%' OR gender LIKE '%$search%' OR age LIKE '%$search%' OR date_added LIKE '%$search%'";
                       }

                       $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['patient_case_no'] . "</td>";
                                echo "<td>" . $row['lastname'] . "</td>";
                                echo "<td>" . $row['firstname'] . "</td>";
                                echo "<td>" . $row['middlename'] . "</td>";
                                echo "<td>" . $row['gender'] . "</td>";
                                echo "<td>" . $row['age'] . "</td>";
                                echo "<td>" . $row['date_added'] . "</td>";
                               

                                echo "<td>";
                                echo "<a href='view_patient.php?id=" . $row['id'] . "' class='view-btn'>View</a>";
                                echo "<a href='edit_patient.php?id=" . $row['id'] . "' class='edit-btn'>Edit</a>";
                                echo "<a href='delete_patient.php?id=" . $row['id'] . "' class='delete-btn'>Remove</a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8'>No patient records found.</td></tr>";
                        }
                        mysqli_close($conn);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



</body>

</html>
