<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merged Check Out</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            width: 350px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

    </style>
</head>
<body>
<header style="background-color: #242f4b; text-align: center; color: white;">
<h1>KNLS E-RESOURCE MANAGEMENT SYSTEM</h1>
 <div class="d-flex justify-content-center flex-wrap">
     <a href="equipcheckout.php" class="btn btn-light mx-2 my-1">Equipment Checkout</a>
 <div>
</header>
    <section style="height: 700px;">
    <div class="container mt-5">
        <h1>Merged Check Out</h1>
        <form method="post" action="check_out_merged_process.php">
            <div class="form-group">
                <label for="client_name">Client Name:</label>
                <select id="client_name" name="client_name" class="form-control" required onchange="fetchComputers(this.value)">
                    <option value="">Select Client</option>
                    <?php
                    include 'db.php';

                    // Fetch client names from the database
                    $sql = "SELECT DISTINCT client_name FROM computer_check_in WHERE check_out_time IS NULL";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='{$row['client_name']}'>{$row['client_name']}</option>";
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
                    <option value="">Select Computer</option>
                </select>
            </div>
            <button type="submit" style="background-color: #242f4b; color: white">Check Out</button>
        </form>
    </div>

    <!-- JavaScript to fetch computers dynamically -->
    <script>
        function fetchComputers(clientName) {
            $.ajax({
                url: 'fetch_computers.php',
                type: 'POST',
                data: {client_name: clientName},
                success: function(data) {
                    $('#comp_name').html(data);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching computers:', error);
                    alert('Error fetching computers. Please try again later.');
                }
            });
        }
    </script>
    </section>
    <footer class="footer" style="background-color: #b52233;">
    <p>&copy; <?php echo date("Y"); ?> KNLSATTACHEES</p>
    </footer>
</body>
</html>
