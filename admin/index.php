<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: admin_login.php");
    exit();
} else {
    header("location: dashboard.php");
    exit();
}