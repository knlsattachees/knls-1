<?php
$servername = "localhost";
$username = "knls";
$password = "Knls_2020";
$dbname = "client_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

