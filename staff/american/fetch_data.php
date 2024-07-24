<?php
$servername = "localhost";
$username = "knls";
$password = "Knls_2020";
$dbname = "client_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = [];
$date = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];

    if ($date) {
        $sql = "SELECT id, comp_name, client_name, check_in_time, check_out_time FROM computer_check_in WHERE DATE(check_in_time) = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $date);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

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
    <title>Check in and out records</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header {
            background-color: #2D2C8E;
            color: white;
            padding: 10px 0;
            text-align: center;
        }
        .footer {
            background-color: #F48312;
            color: white;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>
    <header style="background-color: #2D2C8E; text-align: center; color: white;">
        <h1>KNLS E-RESOURCE MANAGEMENT SYSTEM</h1>
        <div class="d-flex justify-content-center flex-wrap">
            <a href="dashboard.php" class="btn btn-light mx-2 my-1">Home</a>
        </div>
        </header>
    <div class="container mt-5 mb-5">
        <div class="filter-container text-center mb-4">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="form-group">
                    <label for="date">Filter by Date:</label>
                    <input type="date" id="date" name="date" class="form-control" value="<?php echo htmlspecialchars($date); ?>">
                </div>
                <button type="submit" class="btn btn-primary">Fetch Data</button>
            </form>
        </div>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Computer Name</th>
                    <th>Client Name</th>
                    <th>Check-in Time</th>
                    <th>Check-out Time</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($data) > 0): ?>
                    <?php foreach ($data as $entry): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($entry['id']); ?></td>
                            <td><?php echo htmlspecialchars($entry['comp_name']); ?></td>
                            <td><?php echo htmlspecialchars($entry['client_name']); ?></td>
                            <td><?php echo htmlspecialchars($entry['check_in_time']); ?></td>
                            <td><?php echo htmlspecialchars($entry['check_out_time']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">No data found for the selected date.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="footer">
        <p>&copy; Developed by KNLS Attachés @ May-August 2024</p>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
