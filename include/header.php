
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Green Alliance";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
session_start();
// Check if the user is not logged in, redirect to index.php
if (!isset($_SESSION['name'])) {
    header("Location: index.php");
    exit; }
$name = $_SESSION['name'];


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

?>








	<!-- admin header -->

    <div class="header" style= "height:120px">

        <div class="logo"><img src="../images/banner.png" width="150px" hight="70px"  /></div>

        <div class="header-right" align="right">

        	<div>DATE:</div>
            <h1>Hello, <?php echo $name; ?>!</h1>
            <div>Welcome:Admin      <?php echo '<a href="logout.php">Logout</a>'?></div>

        </div>

        

    </div>
	

    <!-- admin header  end -->