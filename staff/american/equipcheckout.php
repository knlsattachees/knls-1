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

// Handle form submission for checking out equipment
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['check_out'])) {
        $client_id = $_POST['client_id'];

        foreach ($_POST['equipment'] as $key => $type) {
            $serial_number = $_POST['serial_number'][$key];
            $model = $_POST['model'][$key];

            // Check-out existing equipment
            $stmt = $conn->prepare("UPDATE equipment SET status = 'checked-out' WHERE client_id = ? AND type = ? AND serial_number = ? AND model = ? AND status = 'available'");
            if ($stmt) {
                $stmt->bind_param("ssss", $client_id, $type, $serial_number, $model);
                $stmt->execute();
                $stmt->close();
            } else {
                die("Statement preparation failed: " . $conn->error);
            }
        }
        $message = "Equipment checked out successfully!";
        $redirect = true;
    }

    // Retrieve equipment based on selected client ID
    if (isset($_POST['client_id_fetch'])) {
        $selected_client_id = $_POST['client_id_fetch'];
        $sql = "SELECT id, type, serial_number, model FROM equipment WHERE client_id = ? AND status = 'available'";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $selected_client_id);
        $stmt->execute();
        $equipment_result = $stmt->get_result();
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check-Out Equipment</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header {
            background-color: #2D2C8E; /* Header background color */
            color: white;
        }
        .header .btn-light {
            background-color: white; /* Button background color */
            color: black; /* Button text color */
        }
        .header .btn-light:hover {
            background-color: #1b1a6d; /* Button hover color */
            color: white;
        }
        .footer {
            text-align: center;
            padding: 20px 0;
            background-color: #F48312; /* Bootstrap's primary blue color */
            color: white;
        }
        .footer a {
            color: white; /* Ensure icons and email link are visible on blue background */
        }
    </style>
    <script>
        function redirectToDashboard() {
            window.location.href = 'dashboard.php';
        }
    </script>
</head>
<body>
    <header class="header p-3 mb-4">
        <div class="container">
            <h1 class="mb-2">AMERICAN CORNER E-RESOURCE PERSONAL EQUIPMENTS</h1>
            <a href="dashboard.php" class="btn btn-light mx-2 my-1">HOME</a>
        </div>
    </header>

    <div class="container mt-5">
        <h1 class="mb-4">Check-Out Equipment</h1>

        <!-- Equipment Check-Out Form -->
        <form method="post" action="">
            <div class="form-group">
                <label for="client_id_fetch">Client ID:</label>
                <input type="text" id="client_id_fetch" name="client_id_fetch" class="form-control" value="<?php echo htmlspecialchars($selected_client_id); ?>" required>
            </div>
            <button type="submit" name="fetch_equipment" class="btn btn-primary mt-3">Fetch Equipment</button>
        </form>

        <?php if ($selected_client_id): ?>
            <h3 class="mt-5">Select equipment to check out:</h3>
            <form method="post" action="" id="check-out-form">
                <input type="hidden" name="client_id" value="<?php echo htmlspecialchars($selected_client_id); ?>">
                <?php
                if ($equipment_result->num_rows > 0) {
                    while ($row = $equipment_result->fetch_assoc()) {
                        echo '<div class="form-check">';
                        echo '<input type="checkbox" class="form-check-input" name="equipment[]" value="' . htmlspecialchars($row['type']) . '">';
                        echo '<label class="form-check-label">Type: ' . htmlspecialchars($row['type']) . ', Serial Number: ' . htmlspecialchars($row['serial_number']) . ', Model: ' . htmlspecialchars($row['model']) . '</label>';
                        echo '<input type="hidden" name="serial_number[]" value="' . htmlspecialchars($row['serial_number']) . '">';
                        echo '<input type="hidden" name="model[]" value="' . htmlspecialchars($row['model']) . '">';
                        echo '</div>';
                    }
                } else {
                    echo "<p>No available equipment for this client.</p>";
                }
                ?>
                <button type="submit" name="check_out" class="btn btn-primary mt-3" onclick="document.getElementById('check-out-form').addEventListener('submit', redirectToDashboard);">Check Out</button>
            </form>
        <?php endif; ?>

        <?php if (isset($message)): ?>
            <div class='alert alert-success mt-3' role='alert'>
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>
    </div>
    <footer class="footer">
   <p>&copy; <?php echo date("Y"); ?>
            Developed by KNLS Attachés @ May-August 2024
        </p>
    </footer>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

