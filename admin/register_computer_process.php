<?php
include 'db.php'; // Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comp_name = $_POST['comp_name'];

    // Check if the computer name already exists
    $check_sql = "SELECT * FROM computer WHERE comp_name = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("s", $comp_name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "This computer name already exists. Please choose a different name.";
    } else {
        // SQL to insert computer name into the table
        $sql = "INSERT INTO computer (comp_name) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $comp_name);

        if ($stmt->execute() === TRUE) {
            echo "Computer registered successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $stmt->close();
    $conn->close();

    // Redirect back to the form page after processing
    header("Location: dashboard.php");
    exit();
}

