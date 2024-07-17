<?php
include 'db.php';

if (isset($_POST['reset_request'])) {
    $email = $_POST['email'];

    // Check if the email exists
    $sql = "SELECT id FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Generate a unique token
        $token = bin2hex(random_bytes(50));
        $expires_at = date("Y-m-d H:i:s", strtotime('+1 hour'));

        // Store the token and expiration time in the database
        $sql = "INSERT INTO password_resets (email, token, expires_at) VALUES ('$email', '$token', '$expires_at')";
        if ($conn->query($sql) === TRUE) {
            // Send the email
            $reset_link = "http://yourwebsite.com/reset_password.php?token=$token";
            $subject = "Password Reset Request";
            $message = "Click the following link to reset your password: $reset_link";
            $headers = "From: no-reply@yourwebsite.com";

            if (mail($email, $subject, $message, $headers)) {
                echo "<div class='alert alert-success'>Password reset link has been sent to your email.</div>";
            } else {
                echo "<div class='alert alert-danger'>Failed to send the email.</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>No account found with that email.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Password Reset</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .reset-form {
            margin: 50px auto;
            max-width: 400px;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
        }
        header {
            background-color: #d76620;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
        section {
            height: 715px;
            width: 100%;
            background-size: cover;
            background-position: center;
        } 
        .fa {
            font-size: 24px;
            margin: 10px;
            color: #333;
        }
        .fa:hover {
            opacity: 0.7;
        }
        .fa-whatsapp {
            background-color: #25D366;
        }
        .fa-facebook {
            background-color: #1877F2;
        }
        .fa-google {
            background-color: #DB4437;
        }
        .fa-instagram {
            background-color: #E4405F;
        }
        .footer {
            text-align: center;
            padding: 20px 0;
            background-color: #007bff; /* Bootstrap's primary blue color */
            height: 135px;
        }
        .footer a {
            color: white; /* Ensure icons and email link are visible on blue background */
        }
    </style>
</head>
<body>
    <header class="bg-warning text-white text-center py-3">
    <h1>KNLS E-RESOURCE MANAGEMENT SYSTEM</h1>
    
    </header>
    <section>
    <div class="container">
        <h1 class="text-center my-4">Request Password Reset</h1>
        <form method="post" action="" class="reset-form">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <button type="submit" name="reset_request" class="btn btn-primary btn-block">Request Reset</button>
        </form>
    </div>
    </section>
    <footer class="footer">
        <div>
            <a href="#" class="fa fa-whatsapp"></a>
            <a href="https://www.facebook.com/KNLSKenya" class="fa fa-facebook"></a>
            <a href="mailto:knls@knls.ac.ke" class="fa fa-google"></a>
            <a href="https://www.instagram.com/knlsmedia/" class="fa fa-instagram"></a>
        </div>
        <h3><a href="mailto:knls@knls.ac.ke">EMAIL</a></h3>
        <p>&copy; <?php echo date("Y"); ?> KNLSATTACHEES</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
