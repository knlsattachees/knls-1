<?php
include 'db.php'; // Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comp_name = $_POST['comp_name'];
    $client_name = $_POST['client_name'];

    // SQL to insert check-in details into the table
    $sql = "INSERT INTO computer_check_in (comp_name, client_name, check_in_time) VALUES (?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $comp_name, $client_name);

    if ($stmt->execute() === TRUE) {
        echo "Computer checked in successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();

    // Redirect back to the form page after processing
    header("Location: dashboard.php");
    exit();
}
