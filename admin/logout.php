<?php
session_start();
session_unset();
session_destroy();
header('Location: KNLS\index1.php');
exit;

