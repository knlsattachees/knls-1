<?php
session_start();
include 'db.php';

// Check if the user is logged in, if not then redirect to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $client_name = $_POST['client_name'];
    $comp_name = $_POST['comp_name'];

    // Check if the selected computer is checked in by the selected client
    $sql_check = "SELECT * FROM computer_check_in WHERE client_name = ? AND comp_name = ? AND check_out_time IS NULL";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("ss", $client_name, $comp_name);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        // Update the check-out time for the computer
        $sql_update = "UPDATE computer_check_in SET check_out_time = NOW() WHERE client_name = ? AND comp_name = ? AND check_out_time IS NULL";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("ss", $client_name, $comp_name);

        if ($stmt_update->execute() === TRUE) {
            echo "Check-out successful.";
        } else {
            echo "Error: " . $sql_update . "<br>" . $conn->error;
        }
        $stmt_update->close();
    } else {
        echo "No matching check-in record found for this client and computer.";
    }

    $stmt_check->close();
    $conn->close();

    // Redirect back to the form page after processing
    header("Location: dashboard.php");
    exit();
}

