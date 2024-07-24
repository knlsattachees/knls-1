<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .footer {
            background-color: #F48312;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
        .nav-tabs .nav-link.active {
            background-color: #2D2C8E !important;
            color: white !important;
        }
        .nav-tabs .nav-link {
            color: #2D2C8E !important;
        }
        .watermark-container {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: -1;
        }
        .watermark-image {
            opacity: 0.2; /* Adjust opacity as needed */
            width: 300px; /* Adjust size of the watermark */
            height: auto;
        }
    </style>
</head>
<body>
    <header style="background-color: #2D2C8E; text-align: center; color: white;">
        <h1>KNLS E-RESOURCE MANAGEMENT SYSTEM</h1>
        <div class="d-flex justify-content-center flex-wrap">
            <a href="/dashboard.php" class="btn btn-light mx-2 my-1">Home</a>
        </div>
    </header>

    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title text-center">WELCOME PAGE</h1>
                <div class="col-md-9 register-right" style="margin-top: 40px; left: 80px;">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="admin-tab" data-toggle="tab" href="#admin" role="tab" aria-controls="admin" aria-selected="true">Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="staff-tab" data-toggle="tab" href="#staff" role="tab" aria-controls="staff" aria-selected="false">Staff</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-3" id="myTabContent">
                        <div class="tab-pane fade show active" id="admin" role="tabpanel" aria-labelledby="admin-tab">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><a href="/admin/index.php">Admin Dashboard</a></li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="staff" role="tabpanel" aria-labelledby="staff-tab">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><a href="staff/mezzanine/index.php">Mezzanine</a></li>
                                <li class="list-group-item"><a href="staff/american/index.php">American</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Watermark Image -->
    <div class="watermark-container">
        <img src="/staff/images/knls_logo.png" alt="Watermark" class="watermark-image">
    </div>

    <div class="footer">
        <p>&copy; Developed by KNLS Attachés @ May-August 2024</p>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

