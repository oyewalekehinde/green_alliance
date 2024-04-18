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




// Define your query to fetch dropdown data
$sql = "SELECT * FROM area";
$result = mysqli_query($conn, $sql);

// Store data in an array
$dropdownData = [];
while ($row = mysqli_fetch_assoc($result)) {


    $string1 = $row['address'];
    $string2 = $row['postcode'];
    $concatenatedString = $string1 . ", " . $string2;
    $myMap = [
        "id" => $row['id'],
        "address" => $concatenatedString,

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

        .select {
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
            <h2>Create Resident</h2>
            <p>Let’s get you started by creating an account</p>
        </div>
        <form id="createResidentForm" method="post" action="create_resident.php">

            <table>
                <tr>

                    <th>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <select id="title" , name="title">
                                <option value="Mr">Mr</option>
                                <option value="Ms">Ms</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Dr">Dr</option>
                                <option value="Prof">Prof</option>
                            </select>

                            <!-- <input placeholder="Enter your last name" type="text" id="last_name" name="last_name"
                                required title="Please enter a valid name"> -->
                        </div>

                    </th>
                    <th>
                        <div class="form-group">
                            <label for="phone">Phone </label>
                            <input placeholder="Phone number" type="text" id="phone" name="phone">
                        </div>
                    </th>

                </tr>
                <tr>
                    <th>
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input placeholder="Enter your first name" type="text" id="first_name" name="first_name"
                                required title="Please enter a valid name">
                        </div>
                    </th>
                    <th>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input placeholder="Enter your last name" type="text" id="last_name" name="last_name"
                                required title="Please enter a valid name">
                        </div>
                    </th>
                </tr>
                <tr>
                    <th>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select id="gender" name="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Non-binary">Non-binary</option>
                                <option value="Genderqueer">Genderqueer</option>
                                <option value="Agender">Agender</option>
                                <option value="Bigender">Bigender</option>
                                <option value="Others">Others</option>
                            </select>

                            <!-- <input placeholder="Enter your last name" type="text" id="last_name" name="last_name"
                                required title="Please enter a valid name"> -->
                        </div>
                    </th>
                    <th>
                        <div class="form-group">
                            <label for="age_group">Age Group</label>
                            <select id="age_group" , name="age_group">
                                <option value="Child (0-12)">Child (0-12)</option>
                                <option value="Teenager (13-19)">Teenager (13-19)</option>
                                <option value="Young Adult (20-39)">Young Adult (20-39)</option>
                                <option value="Middle-aged adult (40-64)">Middle-aged adult (40-64)</option>
                                <option value="Older Adult (65-74)">Older Adult (65-74)</option>
                                <option value="Senior citizen (74+)">Senior citizen (74+)</option>
                            </select>

                            <!-- <input placeholder="Enter your last name" type="text" id="last_name" name="last_name"
                                required title="Please enter a valid name"> -->
                        </div>
                    </th>
                </tr>
                <tr>
                    <th>
                        <div class="form-group">
                            <label for="area">Area</label>
                            <select name="area">
                                <?php foreach ($templateData['dropdownOptions'] as $option): ?>
                                    <option value="<?php echo $option["id"]; ?>"><?php echo $option["address"]; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <!-- <input placeholder="Enter your last name" type="text" id="last_name" name="last_name"
                                required title="Please enter a valid name"> -->
                        </div>
                    </th>
                    <th>
                        <div class="form-group">
                            <label for="interest">Interest</label>
                            <select id="interest" name="interest">
                                <option value="Renewable Energy">Renewable Energy</option>
                                <option value="Waste Reduction">Waste Reduction</option>
                                <option value="Energy">Energy</option>
                                <option value="Efficiency">Efficiency</option>
                                <option value="Transportation">Transportation</option>
                            </select>

                            <!-- <input placeholder="Enter your last name" type="text" id="last_name" name="last_name"
                                required title="Please enter a valid name"> -->
                        </div>
                    </th>
                </tr>
                <tr>
                    <th>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input placeholder="Enter your email" type="text" id="email" name="email" required
                                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                title="Please enter a valid email address">
                        </div>
                    </th>
                    <th>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" placeholder="Enter your password" id="password" name="password"
                                required>
                        </div>
                    </th>
                </tr>
            </table>


            <input type="submit" name="submit" value="Create Resident">
            <p class="signup">Already have an account?
                <span><?php echo '<a href="index.php"class="sign_in" >Sign in</a>' ?></span></p>
        </form>
    </div>

    <?php
    if (isset($_POST["submit"])) {
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $pass = $_POST["password"];
        $title = $_POST["title"];
        $gender = $_POST["gender"];
        $ageGroup = $_POST["age_group"];
        $area = $_POST["area"];
        $phone = $_POST["phone"];
        $interest = $_POST["interest"];
        $inert_query = "INSERT INTO `registration` (`id`, `first_name`, `last_name`, `email`, `password`, `role`) VALUES (NULL, '$first_name','$last_name','$email','$pass','resident')";
        $result = $conn->query($inert_query);
        $select_query = "SELECT * FROM registration WHERE email='$email' AND password='$pass'";
        $result = $conn->query($select_query);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $userId = $row['id'];
            $insert_resident = "INSERT INTO `resident` (`id`, `title`, `first_name`, `last_name`,`phone`, `email`, `area`, `age_group`, `gender`, `interest`, `user`,`voted_product`) VALUES (NULL, '$title', '$first_name','$last_name','$phone','$email', '$area', '$ageGroup', '$gender', '$interest', '$userId', NULL)";
            $result = $conn->query($insert_resident);
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