<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $client_id = $_POST['client_id'];
    
    if (isset($_POST['equipment'])) {
        foreach ($_POST['equipment'] as $key => $type) {
            $serial_number = $_POST['serial_number'][$key];
            $model = $_POST['model'][$key];

            $stmt = $conn->prepare("INSERT INTO equipment (client_id, type, serial_number, model) VALUES (?, ?, ?, ?)");
            if (!$stmt) {
                die("Prepare failed: " . $conn->error);
            }
            $stmt->bind_param("ssss", $client_id, $type, $serial_number, $model);
            if (!$stmt->execute()) {
                die("Execute failed: " . $stmt->error);
            }
            $stmt->close();
        }
        echo "Equipment registered successfully!";
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Register Equipment</title>
    <script>
        function toggleForm(type) {
            const form = document.getElementById(type + "-form");
            form.style.display = document.getElementById(type).checked ? "block" : "none";
        }
    </script>
</head>
<body>
    <h1>Register Equipment</h1>
    <form method="post" action="">
        <label for="client_id">Client ID:</label>
        <input type="text" id="client_id" name="client_id" required><br><br>
        
        <input type="checkbox" id="laptop" name="equipment[]" value="laptop" onchange="toggleForm('laptop')"> Laptop<br>
        <div id="laptop-form" style="display:none;">
            <label for="laptop-serial">Serial Number:</label>
            <input type="text" id="laptop-serial" name="serial_number[]"><br>
            <label for="laptop-model">Model:</label>
            <input type="text" id="laptop-model" name="model[]"><br>
        </div>

        <input type="checkbox" id="mouse" name="equipment[]" value="mouse" onchange="toggleForm('mouse')"> Mouse<br>
        <div id="mouse-form" style="display:none;">
            <label for="mouse-serial">Serial Number:</label>
            <input type="text" id="mouse-serial" name="serial_number[]"><br>
            <label for="mouse-model">Model:</label>
            <input type="text" id="mouse-model" name="model[]"><br>
        </div>

        <input type="checkbox" id="charger" name="equipment[]" value="charger" onchange="toggleForm('charger')"> Charger<br>
        <div id="charger-form" style="display:none;">
            <label for="charger-serial">Serial Number:</label>
            <input type="text" id="charger-serial" name="serial_number[]"><br>
            <label for="charger-model">Model:</label>
            <input type="text" id="charger-model" name="model[]"><br>
        </div>

        <input type="submit" value="Register">
    </form>
</body>
</html>

