<?php 
ob_start();
session_start();

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
        input[type="password"],   input[type="number"],select, textarea {
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
<?php include ("./include/session.php"); ?>

<body>
    <?php

    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $description = $_POST["description"];
        $size = $_POST["size"];
        $benefits = $_POST["benefits"];
        $pricing = $_POST["pricing"];
        $price = $_POST["amount"];

        $product_query = "SELECT * FROM `product` WHERE LOWER(`name`)= '$name'";
        $result = $conn->query($product_query);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $string1 = "A Product with ";
            $ng = $row["name"];
            $string2 = " Exist!";
            $generated_string = $string1 . $ng . $string2;
            $msg = $generated_string;
            ?>
            <script>
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    title: '<?php echo $msg; ?>',
                    showConfirmButton: false,
                    timer: 3000,
                    heightAuto: false,
                    iconColor: "red",
                    width: 600,

                });
            </script>
            <?php

        } else {

            $inert_query = "INSERT INTO `product` ( `name`, `description`, `size`, `benefits`, `pricing_categories`,`price`) VALUES ( '$name', '$description', '$size', '$benefits', '$pricing','$price')";

            $result = $conn->query($inert_query);


            if ($result == true) {
                header("Location: ./index.php");

            } else {

                ?>
                <script>
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        title: "something went wrong",
                        showConfirmButton: false,
                        timer: 1500,
                        heightAuto: false,
                        iconColor: "red",
                    });
                </script>
                <?php
            }
        }

    }

    ?>

    <div class="modal">
        <div class="title">
            <h2>Let's create a product/service</h2>
            <p>Let’s get you started by creating a product/service</p>
        </div>
        <form id="createProductForm" method="post" action="">
            <div class="form-group">
                <label for="company_name">Name</label>
                <input placeholder="Enter product/service name" type="text" id="name" name="name" required
                    title="Please enter a valid name">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea rows="6" cols="50" id="description" name="description" placeholder="Enter description"
                    required title="Enter description"></textarea>
            </div>
            <div class="form-group">
                <label for="amount">Price (GBP):</label>
                <input type="number" id="amount" name="amount" step="1" min="0" placeholder="Enter amount in pounds" ,
                    required>

            </div>
            <div class="form-group">
                <label for="size">Size</label>
                <select id="size" name="size" required>
                    <option value="">Please select</option>
                    <option value="Small">Small</option>
                    <option value="Medium">Medium</option>
                    <option value="Large">Large</option>
                </select>
            </div>
            <div class="form-group">
                <label for="benefits">Benefits</label>
                <textarea rows="6" cols="50" id="benefits" name="benefits" required></textarea>

            </div>
            <div class="form-group">
                <label for="pricing">Pricing Categories</label>
                <select id="pricing" name="pricing" required>
                    <option value="">Please select</option>
                    <option value="Affordable">Affordable</option>
                    <option value="Moderate">Moderate</option>
                    <option value="Premium">Premium</option>
                </select>
            </div>
            <input type="submit" name="submit" value="Create Product">
            <p class="signup">
                <span><?php echo '<a href="index.php"class="sign_in" >Back</a>' ?></span>
            </p>
        </form>
    </div>


</body>

</html>