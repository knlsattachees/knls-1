<?php
session_start();
include 'db.php'; // Ensure this includes your database connection script

// Check if the user is logged in and is authorized to register clients
if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'user') {
    // Redirect to login if not logged in or not authorized
    header('Location: login.php');
    exit;
}

if (isset($_POST['register_client'])) {
    $client_name = $_POST['client_name'];
    $phone_no = $_POST['phone_no'];
    $id_no = $_POST['id_no'];
    $user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null; // Check if 'id' key is set in $_SESSION array

    // Insert client into database
    $sql = "INSERT INTO clients (name, phone_no, id_no, id) VALUES ('$client_name', '$phone_no', '$id_no', '$user_id')";
    if ($conn->query($sql) === TRUE) {
        echo "Client registered successfully";
        // Optionally, you can redirect to another page after registration
        // header('Location: index.php');
        // exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Client</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .reg {
            height: 750px;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-container {
            background-color: #ebebeb;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        header {
            background-color: #2D2C8E;
            padding: 20px;
            text-align: center;
            color: white;
        }
        footer {
            background-color: #F48312;
            height: 100px;
            text-align: center;
            color: white;
            padding: 20px 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>KNLS E-RESOURCE MANAGEMENT SYSTEM</h1>
    </header>
    <section class="reg">
        <div class="form-container">
            <h2 class="text-center">Register Client</h2>
            <form method="post" action="">
                <div class="form-group">
                    <label for="client_name">Client Name:</label>
                    <input type="text" class="form-control" id="client_name" name="client_name" required>
                </div>
                <div class="form-group">
                    <label for="phone_no">Phone Number:</label>
                    <input type="text" class="form-control" id="phone_no" name="phone_no" required>
                </div>
                <div class="form-group">
                    <label for="id_no">ID Number:</label>
                    <input type="text" class="form-control" id="id_no" name="id_no" required>
                </div>
                <button type="submit" name="register_client" class="btn btn-primary btn-block">Register Client</button>
            </form>
        </div>
    </section>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> KNLSATTACHEES</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
