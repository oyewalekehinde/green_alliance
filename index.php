<?php session_start();

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
// echo "Connected successfully";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">
  <style>
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-family: "Poppins", sans-serif;
    }

    p,
    span,
    a,
    label {
      font-family: "Roboto", sans-serif;
    }

    .banner {
      background-image: url('images/banner.png');
      height: 200px;
      width: 100%;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }

    body {
      background-color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;

    }

    .modal {
      min-width: 600px;
      background-color: #F1F8F4;
      /* light green */
      padding: 64px 40px;
      border-radius: 16px;
    }

    .form-group {
      margin-bottom: 15px;
      align-content: center;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-size: 16px;
      font-weight: 500;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px 20px;
      margin: 5px 0 10px 0;
      display: inline-block;
      border: 1px solid #E0E0E0;
      border-radius: 4px;
      box-sizing: border-box;
      background: transparent;
      outline: none;
      font-size: 16px;
    }

    .submit-btn-container {
      display: flex;
      justify-content: center;
    }

    input[type="submit"] {
      width: 50%;
      background-color: #245843;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width: 100%;
      font-size: 16px;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    .title h2 {
      font-size: 32px;
      font-weight: 600;
      margin: 0 0 10px;
      color: #1D1D1D;
    }

    .title p {
      font-size: 20px;
      font-weight: 500;
      color: #828282;
      margin-bottom: 30px;
    }

    .signup {
      color: #4F4F4F;
      font-size: 16px;
      font-weight: 500;
      text-align: center;
    }

    .signup span {
      color: #245843;
      font-size: 16px;
      font-weight: 600;
    }

    .form-group {
      color: #4F4F4F;
      font-size: 16px;
      font-weight: 500;
    }

    .links {
      margin-top: 20px;
    }

    .links a {
      color: #3498db;
      text-decoration: none;
      display: block;
      margin-bottom: 5px;
    }

    .links a:hover {
      text-decoration: underline;
    }


    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
      cursor: pointer;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }
  </style>
</head>


<body>
  <div class="modal">
    <div class="title">
      <h2>Login</h2>
      <p>Nice to have you here, please login to your account</p>
    </div>
    <form id="loginForm" method="post" action="">
      <div class="form-group">
        <label for="email">Email</label>
        <input placeholder="Enter your email" type="text" id="email" name="email" required
          pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email address">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" placeholder="Enter your password" id="password" name="password" required>
      </div>
      <input type="submit" name="submit" value="Login">
    </form>
    <?php

    if (isset($_POST['submit'])) {
      $name = $_POST['email'];
      $password = $_POST['password'];
      $select_query = "SELECT * FROM registration WHERE email='$name' AND password='$password'";
      $result = $conn->query($select_query);
      if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['name'] = $row['first_name'];
        $_SESSION['id'] = $row['id'];
         $_SESSION['role'] = $row['role'];
        header("Location: dashboard.php");
        exit;
      } else {
        $msg = "Username or password error";
      }
    }
    ?>
  </div>
  <div class="links">
    <a href="create_resident.php">Sign up as a Resident</a>
    <br>
    <a href="create_company.php">Sign up as a company</a>
    <br>
    <a href="registration.php">Sign up as a local council</a>
  </div>




</body>
<?php
if (isset($msg)) {
  echo "<p>$msg</p>";
}
?>

</html>