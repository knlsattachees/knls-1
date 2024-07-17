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

    // Insert the check-in record
    $sql = "INSERT INTO computer_check_in (client_name, comp_name, check_in_time) VALUES (?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $client_name, $comp_name);

    if ($stmt->execute() === TRUE) {
        echo "Check-in successful.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $stmt->close();
    $conn->close();

    // Redirect back to the form page after processing
    header("Location: dashboard.php");
    exit();
}
