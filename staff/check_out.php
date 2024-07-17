<?php
session_start();
include 'db.php'; // Ensure this includes your database connection script

// Check if the user is logged in and authorized to check out clients
if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'user') {
    // Redirect to login if not logged in or not authorized
    header('Location: login.php');
    exit;
}

// Handle form submission for check-out
if (isset($_POST['check_out'])) {
    $client_name = $_POST['client_name'];
    $sql = "UPDATE check_ins SET check_out_time = NOW() WHERE client_name = '$client_name' AND check_out_time IS NULL ORDER BY check_in_time DESC LIMIT 1";
    if ($conn->query($sql) === TRUE) {
        echo "Client checked out successfully";
        // Redirect to index.php after a short delay
        echo '<script>window.setTimeout(function(){ window.location = "dashboard.php"; }, 2000);</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch all clients who have checked in but not checked out
$sql = "SELECT DISTINCT client_name FROM check_ins WHERE check_out_time IS NULL";
$result = $conn->query($sql);
?>
<link rel="stylesheet" type="text/css" href="styles.css">
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Check-Out</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
        form {
            margin: 20px auto;
            width: 300px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        select {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }
        button {
            padding: 5px 10px;
            cursor: pointer;
        }
        section {
            height: 750;
            width: 1910
        }
        .check
        {
            height: 750;
            width: 1910;
            background-color: #2df97ca1;
        }
        form
        {
            background-color: white;
        }
    </style>
</head>
<body>
<header>
        <h1>KNLS E-RESOURCE MANAGEMENT SYSTEM</h1>
    </header>
    <section>
        <div class="check">
    <h2>Client Check-Out</h2>
    <form method="post" action="">
        <label for="client_name">Select Client:</label>
        <select id="client_name" name="client_name" required>
            <option value="">--Select Client--</option>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['client_name']}'>{$row['client_name']}</option>";
                }
            } else {
                echo "<option value=''>No clients available</option>";
            }
            ?>
        </select>
        <button type="submit" name="check_out">Check Out</button>
    </form>
    </div>
    </section>
    <footer></footer>
</body>
</html>
