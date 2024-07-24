<?php
session_start();
include 'db.php'; // Ensure this includes your database connection script

// Check if the user is logged in and authorized to check in clients
if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'user') {
    // Redirect to login if not logged in or not authorized
    header('Location: login.php');
    exit;
}

// Handle form submission for check-in
if (isset($_POST['check_in'])) {
    $name = $_POST['name'];

    // Insert check-in entry into database
    $sql = "INSERT INTO check_ins (name, check_in_time) VALUES ('$name', NOW())";
    if ($conn->query($sql) === TRUE) {
        echo "Client checked in successfully";
        // Redirect to dashboard.php after a short delay
        echo '<script>window.setTimeout(function(){ window.location = "dashboard.php"; }, 2000);</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
// Fetch data from both tables
$sql = "SELECT 
            computer.id,
            computer.comp_name,
            clients.name AS name
        FROM 
            computer
        JOIN 
            clients ON comp_name = clients.name";
$result = $conn->query($sql);
// Fetch all clients
$sql = "SELECT id, name FROM clients";
$result = $conn->query($sql);
$sql = "SELECT id, comp_name FROM computer";
$result = $conn->query($sql);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comp_name = $_POST['comp_name'];
    $name = $_POST['name'];

    // Fetch computer ID based on computer name
    $comp_sql = "SELECT id FROM computer WHERE comp_name = '$comp_name'";
    $comp_result = $conn->query($comp_sql);
    $comp_row = $comp_result->fetch_assoc();
    $computer_id = $comp_row['id'];

    // Fetch client ID based on client name
    $client_sql = "SELECT id FROM clients WHERE name = '$name'";
    $client_result = $conn->query($client_sql);
    $client_row = $client_result->fetch_assoc();
    $name = $client_row['name'];

    // Insert check-in record
    $check_in_sql = "INSERT INTO computer_check_in (comp_name, name) VALUES ('$comp_name', '$name')";
    if ($conn->query($check_in_sql) === TRUE) {
        echo "Check-in successful.";
    } else {
        echo "Error: " . $check_in_sql . "<br>" . $conn->error;
    }

    // Redirect to the form page
    header("Location: check_in_form.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Check-In</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .check {
            height: 750px;
            background-color: #2df97ca1;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        header {
            background-color: #d76620;
            padding: 20px;
            text-align: center;
            color: white;
        }
        footer {
            background-color: #007bff;
            height: 100px;
            text-align: center;
            color: white;
            padding: 20px 0;
        }
    </style>
</head>
<body>
    <header >
        <h1>KNLS E-RESOURCE MANAGEMENT SYSTEM</h1>
    </header>
    <section class="check">
        <div class="form-container">
            <h2 class="text-center">Client Check-In</h2>
            <form method="post" action="">
                <div class="form-group">
                    <label for="name">Select Client:</label>
                    <select id="name" name="name" class="form-control" required>
                        <option value="">--Select Client--</option>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='{$row['name']}'>{$row['name']}</option>";
                            }
                        } else {
                            echo "<option value=''>No clients available</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" name="check_in" class="btn btn-primary btn-block">Check In</button>
            </form>
        </div>
        <div class="form-container">
            <h2 class="text-center">Computer Check-In</h2>
            <form method="post" action="">
                <div class="form-group">
                    <label for="name">Select Client:</label>
                    <select id="comp_name" name="comp_name" class="form-control" required>
                        <option value="">--Select Computer--</option>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='{$row['comp_name']}'>{$row['comp_name']}</option>";
                            }
                        } else {
                            echo "<option value=''>No computers available</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" name="check_in" class="btn btn-primary btn-block">Check In</button>
            </form>
    </section>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> KNLSATTACHEES</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
