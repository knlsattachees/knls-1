<?php
include 'db.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Verify the token
    $sql = "SELECT email FROM password_resets WHERE token = '$token' AND expires_at > NOW()";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $email = $row['email'];
    } else {
        echo "Invalid or expired token.";
        exit;
    }
}

if (isset($_POST['reset_password'])) {
    $new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);
    $email = $_POST['email'];

    // Update the user's password
    $sql = "UPDATE users SET password = '$new_password' WHERE email = '$email'";
    if ($conn->query($sql) === TRUE) {
        // Delete the reset token
        $sql = "DELETE FROM password_resets WHERE email = '$email'";
        $conn->query($sql);

        echo "Your password has been reset successfully.";
    } else {
        echo "Error updating password: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Password</h2>
    <form method="post" action="">
        <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password" required>
        <button type="submit" name="reset_password">Reset Password</button>
    </form>
</body>
</html>
