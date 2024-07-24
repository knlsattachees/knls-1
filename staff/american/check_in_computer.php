<!DOCTYPE html>
<html>
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check In Computer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            margin: 0 auto;
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: #f9f9f9;
        }
        .form-group label {
            display: block;
            margin: 10px 0 5px;
        }
        .form-group select,
        .form-group input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }
        .btn-primary {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Check In Computer</h1>
        <form method="post" action="check_in_computer_process.php">
            <div class="form-group">
                <label for="comp_name">Computer Name:</label>
                <select id="comp_name" name="comp_name" class="form-control" required>
                    <?php
                    include 'db.php'; // Include your database connection

                    // Fetch computer names from the database
                    $sql = "SELECT comp_name FROM computer";
                    $result = $conn->query($sql);

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
            <div class="form-group">
                <label for="client_name">Client Name:</label>
                <select id="client_name" name="client_name" class="form-control" required>
                    <?php
                    // Fetch client names from the database
                    $sql = "SELECT name FROM clients";
                    $result = $conn->query($sql);

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
            <button type="submit" class="btn btn-primary">Check In</button>
        </form>
    </div>
</body>
</html>
