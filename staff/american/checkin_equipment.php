<!DOCTYPE html>
<html>
<head>
    <title>Equipment Check-In</title>
</head>
<body>
    <h2>Equipment Check-In</h2>
    <form action="checkin_equipment.php" method="POST">
        <label for="serial_number">Serial Number:</label><br>
        <input type="text" id="serial_number" name="serial_number" required><br><br>
        
        <input type="submit" value="Check In">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $file = 'equipment_data.json';
        $serial_number = htmlspecialchars($_POST['serial_number']);

        if (file_exists($file)) {
            $data = json_decode(file_get_contents($file), true);

            $updated = false;
            foreach ($data as &$entry) {
                if ($entry['serial_number'] == $serial_number && $entry['status'] == 'checked_out') {
                    $entry['status'] = 'checked_in';
                    $updated = true;
                    break;
                }
            }

            if ($updated) {
                file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
                echo "Equipment checked in successfully.";
            } else {
                echo "Equipment not found or already checked in.";
            }
        } else {
            echo "No data file found.";
        }
    }
    ?>
</body>
</html>
