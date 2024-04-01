<?php
session_start();

if (!isset ($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'db_connection.php';

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql = "DELETE FROM users WHERE id = $delete_id";
    if (mysqli_query($conn, $sql)) {
        echo "User deleted successfully";
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Patient Record Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="add_user.css">
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
        <div class="action-bar">
            <div class="user-container">
                <div class="add-user-container">
                    <h2>Add Users</h2>
                    <form method="post" action="add_users_process.php">
                        <div class="input-row">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" id="password" name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="position">Position:</label>
                                <select id="position" name="position" required>
                                    <option value="" disabled selected>Select Position</option>
                                    <option value="Doctor">Doctor</option>
                                    <option value="Nurse">Nurse</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="add-user-btn">Add User</button>
                    </form>
                </div>
            </div>

            <h1>User Management</h1>
            <div class="action-bar">
                <div class="add-user">
                    <div class="search-bar">
                        <input type="text" id="searchInput" placeholder="Search..." oninput="filterUsers()">
                        <button><i class="fas fa-search"></i></button>
                    </div>
                </div>
                <div class="user-table">
                    <table id="userTable">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Position</th>
                                <th>Date Added</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM users";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr id='userRow_" . $row['id'] . "'>";
                                    echo "<td>" . $row['username'] . "</td>";
                                    echo "<td>" . $row['position'] . "</td>";
                                    echo "<td>" . $row['date_added'] . "</td>";
                                    echo "<td>";
                                    echo "<a href='edit_user.php?id=" . $row['id'] . "' class='edit-btn'>Edit</a>";
                                    echo "<a href='#' onclick='deleteUser(" . $row['id'] . ")' class='delete-btn'>Delete</a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>No user records found.</td></tr>";
                            }

                            mysqli_close($conn);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function filterUsers() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("userTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0]; 
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function deleteUser(userId) {
            if (confirm("Are you sure you want to delete this user?")) {
                window.location.href = 'add_users.php?delete_id=' + userId;
            }
        }
    </script>
</body>

</html>
