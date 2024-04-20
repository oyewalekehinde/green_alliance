<?php session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration";

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

<title>Green Cities Alliance</title>



</head>

<?php




if(isset($_POST['submit'])) {
    $name = $_POST['email'];
    $password = $_POST['admin_pass'];

    $select_query = "SELECT * FROM tbl_admin WHERE admin_email='$name' AND admin_pass='$password'";
    $result = $conn->query($select_query);

    if($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['name'] = $row['admin_name']; 
        header("Location: view-students.php");
        exit;
    } else {
        $msg = "Username or password error";
    }
}
?> 



<body>

<div style="background: none repeat scroll 0 0 #CCCCCC;

    height: 200px;

    margin: 200px auto;

    width: 350px;">

<form name="admin_post" method="post" action="index.php">

  <table width="100%" height="140" border="0">

    <tr>

      <td height="41" colspan="2"><p style="color:#F00; font-weight:bold;"></p>

      Enter the  Username and Password to Login</td>

    </tr>

    <tr>

      <td width="34%" align="right">Email Address. * </td>

      <td width="66%" align="left"><input type="text" name="email" /></td>

    </tr>

    <tr>

      <td height="22" align="right">Password. *  </td>

      <td align="left"><input type="password" name="admin_pass" /></td>

    </tr>
    <img src="images/course_work.jpg" alt="Description of the image">
    <tr>

      <td height="29" align="right">

      </td>
	   
	   

      <td align="left"><input type="submit"  name="submit" value="Login"/></td>

    </tr>

  </table>

  </form>







</div>

</body>

<?php
if(isset($msg)) {
    echo "<p>$msg</p>";
}
?>