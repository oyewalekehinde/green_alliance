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
      font-size: 16px;
      font-weight: 500;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-size: 16px;
      font-weight: 500;
      color: #4F4F4F
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
    }

    .placeholder {
      color: #A9A9A9;
      /* Placeholder text color */
      font-size: 16px;
      font-weight: 400;
    }

    .sign_in {
      color: #245843;
      font-weight: bold;
      text-decoration: none;
      font-family: "Roboto", sans-serif;
    }
  </style>
</head>

<body>

  <div class="modal">
    <div class="title">
      <h2>Get Started</h2>
      <p>Let’s get you started by creating an account</p>
    </div>
    <form id="registrationForm" method="post" action="create_company.php">
      <div class="form-group">
        <label for="company_name">Company Name</label>
        <input placeholder="Enter the company name" type="text" id="company_name" name="company_name" required
          title="Please enter a valid name">
      </div>
      <div class="form-group">
        <label for="address">Address </label>
        <input placeholder="Enter your last name" type="text" id="address" name="address" required
          title="Please enter a valid address">
      </div>
      <div class="form-group">
        <label for="phone">Phone </label>
        <input placeholder="Phone number" type="text" id="phone" name="phone">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input placeholder="Enter your email" type="text" id="email" name="email" required
          pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email address">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" placeholder="Enter your password" id="password" name="password" required>
      </div>
      <input type="submit" name="submit" value="Get started">
      <p class="signup">Already have an account?
        <span><?php echo '<a href="index.php"class="sign_in" >Sign in</a>' ?></span></p>
    </form>
  </div>

  <?php

  if (isset($_POST["submit"])) {
    $company_name = $_POST["company_name"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $phone = $_POST["phone"];
    $inert_query = "INSERT INTO `registration` (`id`, `first_name`, `last_name`, `email`, `password`, `role`) VALUES (NULL, '$company_name','$company_name','$email','$pass','company')";
    $result = $conn->query($inert_query);
    $select_query = "SELECT * FROM registration WHERE email='$email' AND password='$pass'";
    $result = $conn->query($select_query);
    if ($result && $result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $userId = $row['id'];
      $insert_company =
        "INSERT INTO `company` ( `name`, `phone`, `address`,  `user`) VALUES ( '$company_name', '$phone', '$address', $userId)";
      $result = $conn->query($insert_company);
    }

    if ($result == true) {
      $msg = "result successfully inserted";
    } else {
      $msg = "Error:" . $inert_query . "<br>" . $conn->error;
      ;
    }
  } else {
    echo "Form not Submitted";
  }

  ?>

</body>
<?php
if (isset($msg)) {
  echo "<p>$msg</p>";
}
?>

</html>