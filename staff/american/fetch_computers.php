<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $client_name = $_POST['client_name'];

    // Fetch computer names that the selected client has checked in
    $sql = "SELECT comp_name FROM computer_check_in WHERE client_name = ? AND check_out_time IS NULL";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $client_name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['comp_name']}'>{$row['comp_name']}</option>";
        }
    } else {
        echo "<option value=''>No computers available</option>";
    }
    $stmt->close();
}

