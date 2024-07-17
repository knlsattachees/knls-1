
<style>
    .footer {
            text-align: center;
            padding: 20px 0;
            background-color: #F48312; /* Bootstrap's primary blue color */
            color: white;
        }
</style>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check In</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header style="background-color: #2D2C8E; text-align: center; color: white;">
<h1>KNLS E-RESOURCE MANAGEMENT SYSTEM</h1>
</header>
<section style="height: 700px;">
    <div class="container mt-5">
        <h1>Check In</h1>
        <form method="post" action="check_in_merged_process.php">
            <div class="form-group">
                <label for="client_name">Client Name:</label>
                <select id="client_name" name="client_name" class="form-control" required>
                    <?php
                    include 'db.php';

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
            <div class="form-group">
                <label for="comp_name">Computer Name:</label>
                <select id="comp_name" name="comp_name" class="form-control" required>
                    <?php
                    // Fetch computer names from the database
                    $sql = "SELECT comp_name FROM computer WHERE comp_name NOT IN (SELECT comp_name FROM computer_check_in WHERE check_out_time IS NULL)";
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
            <button type="submit" class="btn btn-primary">Check In</button>
        </form>
    </div>
    </section>
    <footer class="footer" style="background-color: #F48312;">
    <p>&copy; <?php echo date("Y"); ?> KNLSATTACHEES</p>
    </footer>
</body>
</html>
