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
        input[type="password"],
        select {
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
        
        .form-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_GET['update'])) {
        $id = $_GET['update'];
        // mysqli_query($conn, "SELECT FROM company WHERE id='$id'");
        $select_query = "SELECT * FROM resident WHERE id='$id'";
        $result = $conn->query($select_query);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id = $row["id"];
            $first_name = $row["first_name"];
            $last_name = $row["last_name"];
            $title = $row["title"];
            $gender = $row["gender"];
            $ageGroup = $row["age_group"];
            $area = $row["area"];
            $phone = $row["phone"];
            $interest = $row["interest"];
        }
    }
    if (isset($_POST["submit"])) {
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $title = $_POST["title"];
        $gender = $_POST["gender"];
        $ageGroup = $_POST["age_group"];
        $area = $_POST["area"];
        $phone = $_POST["phone"];
        $interest = $_POST["interest"];
        $update_resident = "UPDATE `resident` SET `title`=' $title',`first_name`=' $first_name',`last_name`=' $last_name',`phone`='$phone',`area`='$area',`age_group`='$ageGroup',`gender`='$gender',`interest`='$interest' WHERE `id` =$id";
        $result = $conn->query($update_resident);

        if ($result == true) {
            header("Location: index.php");
            exit;
        }
    }
    ?>

    <div class="modal">
        <div class="title">
            <p>Update Resident Record</p>
        </div>
        <form id="createResidentForm" method="post" action="">
            <div class="form-container">
                <div class="form-group">
                    <label for="title">Title</label>

                    <select id="title" , name="title" , required>
                        <option value="">Please select</option>
                        <option value="Mr" <?php if ($title == 'Mr')
                            echo 'selected'; ?>>Mr</option>
                        <option value="Ms" <?php if ($title == 'Ms') echo 'selected'; ?>>Ms</option>
                        <option value="Mrs" <?php if ($title == 'Mrs') echo 'selected'; ?>>Mrs</option>
                        <option value="Dr"<?php if ($title == 'Dr') echo 'selected'; ?>>Dr</option>
                        <option value="Prof" <?php if ($title == 'Prof') echo 'selected'; ?>>Prof</option>
                    </select>

                    <!-- <input placeholder="Enter your last name" type="text" id="last_name" name="last_name"
                        required title="Please enter a valid name"> -->
                </div>
                <div class="form-group">
                    <label for="phone">Phone </label>
                    <input placeholder="Phone number" type="text" id="phone" name="phone" value="<?php echo $phone; ?>">
                </div>
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input placeholder="Enter your first name" type="text" id="first_name" name="first_name" value="<?php echo $first_name; ?>"
                        required title="Please enter a valid name">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input placeholder="Enter your last name" type="text" id="last_name" name="last_name" value="<?php echo $last_name; ?>"
                        required title="Please enter a valid name">
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender" required>
                        <option value="">Please select</option>
                        <option value="Male" <?php if ($gender == 'Male') echo 'selected'; ?>>Male</option>
                        <option value="Female" <?php if ($gender == 'Female') echo 'selected'; ?>>Female</option>
                        <option value="Non-binary" <?php if ($gender == 'Non-binary') echo 'selected'; ?>>Non-binary</option>
                        <option value="Genderqueer" <?php if ($gender == 'Genderqueer') echo 'selected'; ?>>Genderqueer</option>
                        <option value="Agender" <?php if ($gender == 'Agender') echo 'selected'; ?>>Agender</option>
                        <option value="Bigender" <?php if ($gender == 'Bigender') echo 'selected'; ?>>Bigender</option>
                        <option value="Others" <?php if ($gender == 'Others') echo 'selected'; ?>>Others</option>
                    </select>

                    <!-- <input placeholder="Enter your last name" type="text" id="last_name" name="last_name"
                        required title="Please enter a valid name"> -->
                </div>
                <div class="form-group">
                    <label for="age_group">Age Group</label>
                    <select id="age_group" , name="age_group" required>
                        <option value="">Please select</option>
                        <option value="Child (0-12)" <?php if ($ageGroup == 'Child (0-12)') echo 'selected'; ?>>Child (0-12)</option>
                        <option value="Teenager (13-19)" <?php if ($ageGroup == 'Teenager (13-19)') echo 'selected'; ?>>Teenager (13-19)</option>
                        <option value="Young Adult (20-39)" <?php if ($ageGroup == 'Young Adult (20-39)') echo 'selected'; ?>>Young Adult (20-39)</option>
                        <option value="Middle-aged adult (40-64)" <?php if ($ageGroup == 'Middle-aged adult (40-64)') echo 'selected'; ?>>Middle-aged adult (40-64)</option>
                        <option value="Older Adult (65-74)" <?php if ($ageGroup == 'Older Adult (65-74)') echo 'selected'; ?>>Older Adult (65-74)</option>
                        <option value="Senior citizen (74+)" <?php if ($ageGroup == 'Senior citizen (74+)') echo 'selected'; ?>>Senior citizen (74+)</option>
                    </select>

                    <!-- <input placeholder="Enter your last name" type="text" id="last_name" name="last_name"
                        required title="Please enter a valid name"> -->
                </div>
                <div class="form-group">
                    <label for="area">Area</label>
                    
                    <select name="area" required>
                        <option value="">Please select</option>
                        <<?php foreach ($templateData['dropdownOptions'] as $option): ?>
                <option value="<?php echo $option["id"]; ?>" <?php if ($area == $option["id"])
                        echo 'selected'; ?>><?php echo $option["address"]; ?></option>

            <?php endforeach; ?>
                    </select>
                    <!-- <input placeholder="Enter your last name" type="text" id="last_name" name="last_name"
                        required title="Please enter a valid name"> -->
                </div>
                <div class="form-group">
                    <label for="interest">Interest</label>
                    <select id="interest" name="interest" required>
                        <option value="">Please select</option>
                        <option value="Renewable Energy"<?php if ($interest == 'Renewable Energy') echo 'selected'; ?>>Renewable Energy</option>
                        <option value="Waste Reduction"<?php if ($interest == 'Waste Reduction') echo 'selected'; ?>>Waste Reduction</option>
                        <option value="Energy"<?php if ($interest == 'Energy') echo 'selected'; ?>>Energy</option>
                        <option value="Efficiency"<?php if ($interest == 'Efficiency') echo 'selected'; ?>>Efficiency</option>
                        <option value="Transportation"<?php if ($interest == 'Transportation') echo 'selected'; ?>>Transportation</option>
                    </select>

                    <!-- <input placeholder="Enter your last name" type="text" id="last_name" name="last_name"
                        required title="Please enter a valid name"> -->
                </div>
            </div>
            <input type="submit" name="submit" value="Update">
            <p class="signup">
                <span><?php echo '<a href="index.php"class="sign_in" >Back</a>' ?></span>
            </p>
        </form>
    </div>


</body>

</html>