<?php
// Start the session
session_start();

// Check if the user is not logged in, redirect to index.php
if (!isset($_SESSION['name'])) {
    header("Location: login.php");
    exit; }
?>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Green Alliance";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HTML LEARNING</title>
<link href="../style/style.css" rel="stylesheet" type="text/css" />
</head>



<body>

	<!-- admin header -->

    <div class="header" style= "height=120px">

        <div class="logo"><img src="../images/herts.jpg" width="150px" hight="70px"  /></div>

        <div class="header-right" align="right">

        	<div>DATE:</div>

            <div>Welcome:Admin      <?php echo '<a href="logout.php">Logout</a>'?></div>

        </div>

        

    </div>
	

    <!-- admin header  end -->