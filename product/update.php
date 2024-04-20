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
<?php include ("./include/session.php"); ?>

<body>
    <?php
    if (isset($_GET['update'])) {
        $id = $_GET['update'];
        $select_query = "SELECT * FROM product WHERE id='$id'";
        $result = $conn->query($select_query);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id = $row["id"];
            $name = $row["name"];
            $description = $row["description"];
            $size = $row["size"];
            $benefits = $row["benefits"];
            $pricing = $row["pricing_categories"];
            $price = $row["price"];
        }
    }
    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $description = $_POST["description"];
        $size = $_POST["size"];
        $benefits = $_POST["benefits"];
        $pricing = $_POST["pricing"];
        $price = $_POST["amount"];

        $update_query = "UPDATE `product` SET `name`='$name',`price`='$price',`description`='$description',`size`='$size',`benefits`='$benefits',`pricing_categories`='$pricing' WHERE `id`= $id ";
        $result = $conn->query($update_query);
        if ($result == true) {
            header("Location: index.php");
            exit;
        }


    }

    ?>

    <div class="modal">
        <div class="title">
            <h2>Update product/service</h2>

        </div>
        <form id="createProductForm" method="post" action="">
            <div class="form-group">
                <label for="name">Name</label>
                <input placeholder="Enter product/service name" type="text" id="name" name="name"
                    value="<?php echo $name; ?>" required title="Please enter a valid name">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea rows="6" cols="50" id="description" name="description" placeholder="Enter description"
                   required title="Enter description"><?php echo $description; ?></textarea>
            </div>
            <div class="form-group">
                <label for="amount">Price (GBP):</label>
                <input type="number" id="amount" name="amount" step="1" min="0" placeholder="Enter amount in pounds" ,
                    value="<?php echo $price; ?>" required>

            </div>
            <div class="form-group">
                <label for="size">Size</label>
                <select id="size" name="size" required>
                    <option value="">Please select</option>
                    <option value="Small"<?php if ($size == 'Small') echo 'selected'; ?>>Small</option>
                    <option value="Medium"<?php if ($size == 'Medium') echo 'selected'; ?>>Medium</option>
                    <option value="Large"<?php if ($size == 'Large') echo 'selected'; ?>>Large</option>
                </select>
            </div>
            <div class="form-group">
                <label for="benefits">Benefits</label>
                <textarea rows="6" cols="50" id="benefits" name="benefits" 
                    required><?php echo $benefits; ?></textarea>

            </div>
            <div class="form-group">
                <label for="pricing">Pricing Categories</label>
                <select id="pricing" name="pricing" required>
                    <option value="">Please select</option>
                    <option value="Affordable" <?php if ($pricing == 'Affordable') echo 'selected'; ?>>Affordable</option>
                    <option value="Moderate" <?php if ($pricing == 'Moderate') echo 'selected'; ?>>Moderate</option>
                    <option value="Premium" <?php if ($pricing == 'Premium') echo 'selected'; ?>>Premium</option>
                </select>
            </div>
            <input type="submit" name="submit" value="Update Product">
            <p class="signup">
                <span><?php echo '<a href="index.php"class="sign_in" >Back</a>' ?></span>
            </p>
        </form>
    </div>


</body>

</html>