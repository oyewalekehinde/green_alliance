
<?php

ob_start();
session_start();
// Check if the user is not logged in, redirect to index.php
if (!isset($_SESSION['name'])) {
    header("Location: ./index.php");
    exit; }


?>

