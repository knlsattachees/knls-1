
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Computer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
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
<header style="background-color: #2D2C8E; text-align: center; color: white;">
<h1>KNLS E-RESOURCE MANAGEMENT SYSTEM</h1>
</header>
<section>
    <div class="container">
        <h1>Register Computer</h1>
        <form method="post" action="register_computer_process.php">
            <div class="form-group">
                <label for="comp_name">Computer Name:</label>
                <input type="text" id="comp_name" name="comp_name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
            
        </form>
    </div>
    </section>
    <footer>

    </footer>
</body>

</html>
