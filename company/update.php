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
$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql);

// Store data in an array
$dropdownData = [];
while ($row = mysqli_fetch_assoc($result)) {


    $myMap = [
        "id" => $row['id'],
        "name" => $row['name'],

    ];
    $dropdownData[] = $myMap;
}


// Pass data to the template (replace with your templating method)

$templateData = array(
    "dropdownOptions" => $dropdownData,
);
?>
<!DOCTYPE html>
<html lang="en">
<?php include ("../include/session.php"); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Company</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        input[type="password"], select {
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
    <?php
    if (isset($_GET['update'])) {
        $id = $_GET['update'];
        // mysqli_query($conn, "SELECT FROM company WHERE id='$id'");
        $select_query = "SELECT * FROM company WHERE id='$id'";
        $result = $conn->query($select_query);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id = $row["id"];
            $company_name = $row["name"];
            $phone = $row["phone"];
            $address = $row["address"];
            $productId = $row['product'];
        }
    }
    if (isset($_POST["submit"])) {

        $company_name = $_POST["company_name"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $productId = $_POST["product"];
        $update_query = "UPDATE `company` SET `name`='$company_name',`phone`='$phone',`address`='$address',`product`=' $productId' WHERE `id`= $id";
        $result = $conn->query($update_query);
        if ($result == true) {
            header("Location: index.php");
        }
    }

    ?>
    <div class="modal">
        <div class="title">
            <p>Update Company Record</p>
        </div>
        <form id="updateCompanyRecord" method="post" action="">
            <div class="form-group">
                <label for="company_name">Company Name</label>
                <input placeholder="Enter the company name" type="text" id="company_name"
                    value="<?php echo $company_name; ?>" name="company_name" required title="Please enter a valid name">
            </div>
            <div class="form-group">
                <label for="phone">Phone </label>
                <input placeholder="Phone number" type="text" id="phone" value="<?php echo $phone; ?>" name="phone">
            </div>
            <div class="form-group">
                <label for="address">Address </label>
                <input placeholder="Enter your last name" type="text" id="address" name="address"
                    value="<?php echo $address; ?>" required title="Please enter a valid address">
            </div>

            <div class="form-group">
                <label for="product">Product</label>
                <?php
                $selected_value = $productId;
                ?>
                <select name="product" required>
                    <option value="">Please select</option>

                    <?php foreach ($templateData['dropdownOptions'] as $option): ?>
                        <option value="<?php echo $option["id"]; ?>" <?php if ($selected_value == $option["id"])
                               echo 'selected'; ?>><?php echo $option["name"]; ?></option>

                    <?php endforeach; ?>
                </select>
            </div>
            <input type="submit" name="submit" value="Update">
            <p class="signup">
                <span><?php echo '<a href="index.php"class="sign_in" >Back</a>' ?></span>
            </p>
        </form>
    </div>



</body>

</html>