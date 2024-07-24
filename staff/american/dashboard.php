<?php
session_start();
include 'db.php';

// Check if the user is logged in, if not then redirect to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

// Fetch all clients using prepared statement
$sql = "SELECT id, name, phone_no, id_no, check_in, check_out FROM clients";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html>
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .sec_img {
            min-height: 711px;
            width: 100%;
            background-image: url(images/american.jpg);
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .fa {
            font-size: 24px;
            margin: 10px;
            color: #fff;
        }
        .fa:hover {
            opacity: 0.7;
        }
        .fa-whatsapp {
            background-color: #25D366;
            padding: 10px;
            border-radius: 50%;
        }
        .fa-facebook {
            background-color: #1877F2;
            padding: 10px;
            border-radius: 50%;
        }
        .fa-google {
            background-color: #DB4437;
            padding: 10px;
            border-radius: 50%;
        }
        .fa-instagram {
            background-color: #E4405F;
            padding: 10px;
            border-radius: 50%;
        }
        .footer {
            text-align: center;
            padding: 20px 0;
            background-color: #b52233; /* Bootstrap's primary blue color */
            color: white;
        }
        .footer a {
            color: white; /* Ensure icons and email link are visible on blue background */
        }
        .table-responsive {
            max-height: 400px;
            overflow-y: auto;
        } /* Your existing styles */
    </style>
</head>
<body>
    <header style="background-color: #242f4b; text-align: center; color: white;">
        <h1>KNLS AMERICAN CORNER E-RESOURCE MANAGEMENT SYSTEM</h1>
        <div class="d-flex justify-content-center flex-wrap">
            <a href="register_client.php" class="btn btn-light mx-2 my-1">Register Client</a>
            <a href="check_in_merged.php" class="btn btn-light mx-2 my-1">Check In</a>
            <a href="check_out_merged.php" class="btn btn-light mx-2 my-1">Check Out</a>
            <a href="about.php" class="btn btn-light mx-2 my-1">About us</a>
            <a href="fetch_data.php" class="btn btn-light mx-2 my-1">Records</a>
        </div>
    </header>
    <section class="sec_img">
        <div class="container text-white">
            <h2 class="mb-4">Clients List</h2>
            <!-- Search Bar -->
            <form class="form-inline mb-4" method="post" action="">
                <div class="form-group mr-2">
                    <input type="text" class="form-control" id="search_query" name="search_query" placeholder="Search by Username" value="<?php echo htmlspecialchars($search_query); ?>">
                </div>
                <button type="submit" style="background-color: #242f4b; color: white" name="search">Search</button>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered table-striped bg-white text-dark">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone No</th>
                            <th>ID No</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . htmlspecialchars($row['id']) . "</td>
                                    <td>" . htmlspecialchars($row['name']) . "</td>
                                    <td>" . htmlspecialchars($row['phone_no']) . "</td>
                                    <td>" . htmlspecialchars($row['id_no']) . "</td>
                                    <td>" . htmlspecialchars($row['check_in']) . "</td>
                                    <td>" . htmlspecialchars($row['check_out']) . "</td>
                                  </tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <?php if ($result->num_rows === 0): ?>
                    <p class="text-center">No clients registered yet.</p>
                <?php endif; ?>
            </div>
            <div class="mt-3">
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </section>
    <footer class="footer">
        <div>
            <a href="https://wa.me/yourwhatsappnumber" class="fa fa-whatsapp"></a>
            <a href="https://www.facebook.com/KNLSKenya" class="fa fa-facebook"></a>
            <a href="mailto:knls@knls.ac.ke" class="fa fa-google"></a>
            <a href="https://www.instagram.com/knlsmedia/" class="fa fa-instagram"></a>
        </div>
        <p>&copy; <?php echo date("Y"); ?>
            Developed by KNLS Attachés @ May-August 2024
        </p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
