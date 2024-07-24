<?php
$servername = "localhost";
$username = "knls";
$password = "Knls_2020";
$dbname = "client_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$selected_client_id = '';
$equipment_result = [];

// Handle form submission for registering or checking in equipment
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register_or_check_in'])) {
    $client_id = $_POST['client_id'];
    $action = $_POST['action'];

    foreach ($_POST['equipment'] as $key => $type) {
        $serial_number = $_POST['serial_number'][$key];
        $model = $_POST['model'][$key];

        if ($action == 'register') {
            // Register new equipment
            $stmt = $conn->prepare("INSERT INTO equipment (client_id, type, serial_number, model, status) VALUES (?, ?, ?, ?, 'available')");
            if ($stmt) {
                $stmt->bind_param("ssss", $client_id, $type, $serial_number, $model);
                $stmt->execute();
                $stmt->close();
            } else {
                die("Statement preparation failed: " . $conn->error);
            }
        } elseif ($action == 'check_in') {
            // Check-in existing equipment
            $stmt = $conn->prepare("UPDATE equipment SET status = 'checked-in' WHERE client_id = ? AND type = ? AND serial_number = ? AND model = ? AND status = 'checked-out'");
            if ($stmt) {
                $stmt->bind_param("ssss", $client_id, $type, $serial_number, $model);
                $stmt->execute();
                $stmt->close();
            } else {
                die("Statement preparation failed: " . $conn->error);
            }
        }
    }

    // Redirect after successful registration or check-in
    header("Location: check_in_merged.php");
    exit(); // Ensure no further code is executed
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register and Check-In Equipment</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <header class="header p-3 mb-4">
        <div class="container">
            <h1 class="mb-2">AMERICAN CORNER E-RESOURCE PERSONAL EQUIPMENTS</h1>
            <a href="dashboard.php" class="btn btn-light mx-2 my-1">HOME</a>
        </div>
    </header>

        <!-- Equipment Registration/Check-In Form -->
        <form method="post" action="">
            <div class="form-group">
                <label for="client_id">Client ID:</label>
                <input type="text" id="client_id" name="client_id" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="action">Action:</label>
                <select id="action" name="action" class="form-control" required>
                    <option value="register">Register Equipment</option>
                    <option value="check_in">Check-In Equipment</option>
                </select>
            </div>
            <div id="equipment-form">
                <div class="equipment-item">
                    <div class="form-group">
                        <label for="equipment-type-0">Equipment Type:</label>
                        <input type="text" id="equipment-type-0" name="equipment[]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="serial_number-0">Serial Number:</label>
                        <input type="text" id="serial_number-0" name="serial_number[]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="model-0">Model:</label>
                        <input type="text" id="model-0" name="model[]" class="form-control" required>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary" onclick="addEquipment()">Add More Equipment</button>
            </div>
            <button type="submit" name="register_or_check_in" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        let equipmentCount = 1;

        function addEquipment() {
            const equipmentForm = document.getElementById('equipment-form');
            const equipmentHtml = `
                <div class="equipment-item">
                    <div class="form-group">
                        <label for="equipment-type-${equipmentCount}">Equipment Type:</label>
                        <input type="text" id="equipment-type-${equipmentCount}" name="equipment[]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="serial_number-${equipmentCount}">Serial Number:</label>
                        <input type="text" id="serial_number-${equipmentCount}" name="serial_number[]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="model-${equipmentCount}">Model:</label>
                        <input type="text" id="model-${equipmentCount}" name="model[]" class="form-control" required>
                    </div>
                </div>
            `;
            equipmentForm.insertAdjacentHTML('beforeend', equipmentHtml);
            equipmentCount++;
        }
    </script>
</body>
</html>

