<!-- logout.php -->

<?php
// Start the session
session_start();

// Destroy all session data
session_destroy();

// Redirect to login.php
header("Location: index.php");
ob_end_flush();
exit;
?>