<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Green Alliance";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$productListData = [];
$user_id = $_SESSION['id'];
$searchName = $_POST['searchName'];
if (isset($searchName)) {
    $productListQuery = "SELECT * FROM product WHERE name ='$searchName'";
    $productListResult = $conn->query($productListQuery);
    header("Location: index.php");
    exit;
} else {
    $productListQuery = "SELECT * FROM `product`";
    $productListResult = $conn->query($productListQuery);
}
    if ($productListResult->num_rows > 0) {
        while ($row = $productListResult->fetch_assoc()) {
            $productId = $row['id'];
            $productName = $row['name'];
            $productPrice = $row['price'];
            $productDescription = $row['description'];
            $productSize = $row['size'];
            $voteCount = $row['vote_count'];
            $productBenefits = $row['benefits'];
            $productPricingCategories = $row['pricing_categories'];
            $voteValue = "FALSE";
            $check_vote_query = "SELECT * FROM votes WHERE product = $productId AND user = $user_id";
            $check_vote_result = $conn->query($check_vote_query);
            if ($check_vote_result->num_rows > 0) {

                if ($check_vote_result == true) {
                    if (mysqli_num_rows($check_vote_result) > 0) {

                        $voteValue = mysqli_fetch_assoc($check_vote_result)["vote"];
                    }
                }
            }

            $myMap = [
                "id" => $productId,
                "name" => $productName,
                "price" => $productPrice,
                "description" => $productDescription,
                "size" => $productSize,
                "benefits" => $productBenefits,
                "vote" => $voteValue,
                "pricing_categories" => $productPricingCategories,
                "vote_count" => $voteCount,

            ];
            $productListData[] = $myMap;
            // Perform operations with resident data as needed
        }
    } else {
        // Handle case where no residents are found
    }

$templateData = array(
    "result" => $productListData,
);


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
    <title>Dashboard</title>
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

        body {
            background-color: #F7F8F8;
            height: 100vh;
            flex-direction: column;
        }

        .sidebar {
            width: 300px;
            padding: 20px;
            flex-direction: column;
            display: flex;
            gap: 10px;
            background: white;
        }

        .sidebar-item {
            display: flex;
            padding: 16px;
            border-radius: 8px;
            align-items: center;
            gap: 10px;
            background: #214C3B;
            text-decoration: none;
        }

        .sidebar-item p {
            color: white;
            font-size: 16px;
            font-weight: 500;
            margin: 0;
            text-decoration: none;
        }

        .dashboard-container {
            display: flex;

        }

        .submit-btn {
            background-color: #245843;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .submit-btn:hover {
            background-color: #45a049;
        }

        thead,
        tbody {
            width: 100%;
            border-radius: 6px;
        }

        thead th {
            padding: 10px;
            color: #5E606A;
        }

        thead tr {
            border-bottom: 1px solid #F5F5F6;
        }

        tbody td {
            padding: 10px;
        }

        .search {
            width: 270px;
            padding: 10px 20px;
            display: inline-block;
            border: 1px solid #5E606A29;
            border-radius: 4px;
            box-sizing: border-box;
            background: transparent;
            outline: none;
            font-size: 16px;
        }

        .filter {
            display: flex;
            gap: 10px;
            align-content: center;
            padding: 10px;
            border: 1px solid #5E606A29;
            border-radius: 4px;
        }

        .filter p {
            color: #666974;
            font-size: 16px;
            font-weight: 500;
            margin: 0;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>
<?php include ("../include/header.php"); ?>

<body>
    <?php
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        mysqli_query($conn, "DELETE FROM product WHERE id='$id'");
        header("Location: index.php");
        exit;
    }

    if (isset($_GET['vote'])) {
        $string = $_GET['vote'];
        echo $string;
        $array = explode(",", $string);
        $product_id = $array[0];
        $vote_value = $array[1] == "yes" ? "TRUE" : "FALSE";
        echo $array[1];
        $user_id = $_SESSION['id'];
        $check_vote_query = "SELECT * FROM votes WHERE product = $product_id AND user = $user_id";
        echo $check_vote_query;
        $check_vote_result = $conn->query($check_vote_query);
        echo $vote_value;
        if ($check_vote_result == true) {
            echo " -1";
            if (mysqli_num_rows($check_vote_result) > 0) {
                // User has already voted, update their vote
                echo " -2";
                $update_vote_query = "UPDATE votes SET vote = '$vote_value' WHERE product = $product_id AND user = $user_id";
                mysqli_query($conn, $update_vote_query);
                echo " -3";
            } else {
                // User hasn't voted yet, insert new vote
                echo " -4";
                $insert_vote_query = "INSERT INTO votes (user, product, vote) VALUES ($user_id, $product_id, '$vote_value')";
                mysqli_query($conn, $insert_vote_query);
                echo " -5";
            }
            // Update vote count for the product
            echo " 1";
            if ($vote_value === 'TRUE') {
                echo " 2";
                $update_count_query = "UPDATE product SET vote_count = vote_count + 1 WHERE id = $product_id";
                echo " 3";
            } else {
                echo " 4";
                $update_count_query = "UPDATE product SET vote_count = vote_count - 1 WHERE id = $product_id";
                echo " 5";
            }
            echo " 6";
            $result = mysqli_query($conn, $update_count_query);
            echo " 7";
            if ($result == true) {
                header("Location: index.php");
                exit;
            }
        }
    }
    ?>
    <div class="dashboard-container">
        <div class="sidebar">
            <img src="../images/banner.png" alt="logo" style="width: 200px; margin: 0 auto 70px; display: block;" />
            <?php if (isset($_SESSION['role']) && ($_SESSION['role'] === 'admin')) {
                ?>
                <a href="../dashboard.php">
                    <div class="sidebar-item">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.81377 10.9535H6.13935C4.11331 10.9535 2.99982 9.84 2.99982 7.81395V6.13953C2.99982 4.11349 4.11331 3 6.13935 3H7.81377C9.83982 3 10.9533 4.11349 10.9533 6.13953V7.81395C10.9533 9.84 9.83982 10.9535 7.81377 10.9535ZM6.13935 4.25581C4.81656 4.25581 4.25563 4.81674 4.25563 6.13953V7.81395C4.25563 9.13674 4.81656 9.69767 6.13935 9.69767H7.81377C9.13656 9.69767 9.69749 9.13674 9.69749 7.81395V6.13953C9.69749 4.81674 9.13656 4.25581 7.81377 4.25581H6.13935Z"
                                fill="white" />
                            <path
                                d="M17.8606 10.9535H16.1862C14.1602 10.9535 13.0467 9.84 13.0467 7.81395V6.13953C13.0467 4.11349 14.1602 3 16.1862 3H17.8606C19.8867 3 21.0002 4.11349 21.0002 6.13953V7.81395C21.0002 9.84 19.8867 10.9535 17.8606 10.9535ZM16.1862 4.25581C14.8634 4.25581 14.3025 4.81674 14.3025 6.13953V7.81395C14.3025 9.13674 14.8634 9.69767 16.1862 9.69767H17.8606C19.1834 9.69767 19.7444 9.13674 19.7444 7.81395V6.13953C19.7444 4.81674 19.1834 4.25581 17.8606 4.25581H16.1862Z"
                                fill="white" />
                            <path
                                d="M17.8606 21.0004H16.1862C14.1602 21.0004 13.0467 19.8869 13.0467 17.8608V16.1864C13.0467 14.1604 14.1602 13.0469 16.1862 13.0469H17.8606C19.8867 13.0469 21.0002 14.1604 21.0002 16.1864V17.8608C21.0002 19.8869 19.8867 21.0004 17.8606 21.0004ZM16.1862 14.3027C14.8634 14.3027 14.3025 14.8636 14.3025 16.1864V17.8608C14.3025 19.1836 14.8634 19.7445 16.1862 19.7445H17.8606C19.1834 19.7445 19.7444 19.1836 19.7444 17.8608V16.1864C19.7444 14.8636 19.1834 14.3027 17.8606 14.3027H16.1862Z"
                                fill="white" />
                            <path
                                d="M7.81377 21.0004H6.13935C4.11331 21.0004 2.99982 19.8869 2.99982 17.8608V16.1864C2.99982 14.1604 4.11331 13.0469 6.13935 13.0469H7.81377C9.83982 13.0469 10.9533 14.1604 10.9533 16.1864V17.8608C10.9533 19.8869 9.83982 21.0004 7.81377 21.0004ZM6.13935 14.3027C4.81656 14.3027 4.25563 14.8636 4.25563 16.1864V17.8608C4.25563 19.1836 4.81656 19.7445 6.13935 19.7445H7.81377C9.13656 19.7445 9.69749 19.1836 9.69749 17.8608V16.1864C9.69749 14.8636 9.13656 14.3027 7.81377 14.3027H6.13935Z"
                                fill="white" />
                        </svg>
                        <p>Dashboard</p>
                    </div>
                </a>
                <?php
            }
            ?>

            <?php

            if (isset($_SESSION['role']) && ($_SESSION['role'] === 'admin')) {
                ?>
                <a href="../company/">
                    <div class="sidebar-item">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.25 19.5V15C14.25 14.8011 14.171 14.6103 14.0303 14.4697C13.8897 14.329 13.6989 14.25 13.5 14.25H10.5C10.3011 14.25 10.1103 14.329 9.96967 14.4697C9.82902 14.6103 9.75 14.8011 9.75 15V19.5C9.75 19.6989 9.67098 19.8897 9.53033 20.0303C9.38968 20.171 9.19891 20.25 9 20.25H4.5C4.30109 20.25 4.11032 20.171 3.96967 20.0303C3.82902 19.8897 3.75 19.6989 3.75 19.5V10.8281C3.75168 10.7243 3.77411 10.6219 3.81597 10.5269C3.85783 10.4319 3.91828 10.3463 3.99375 10.275L11.4937 3.45936C11.632 3.33287 11.8126 3.26273 12 3.26273C12.1874 3.26273 12.368 3.33287 12.5062 3.45936L20.0062 10.275C20.0817 10.3463 20.1422 10.4319 20.184 10.5269C20.2259 10.6219 20.2483 10.7243 20.25 10.8281V19.5C20.25 19.6989 20.171 19.8897 20.0303 20.0303C19.8897 20.171 19.6989 20.25 19.5 20.25H15C14.8011 20.25 14.6103 20.171 14.4697 20.0303C14.329 19.8897 14.25 19.6989 14.25 19.5Z"
                                stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p>Company Management</p>
                    </div>
                </a>
                <?php
            }
            ?>
            <?php

            if (isset($_SESSION['role']) && ($_SESSION['role'] === 'admin')) {
                ?>
                <a href="../resident/">
                    <div class="sidebar-item">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.25 19.5V15C14.25 14.8011 14.171 14.6103 14.0303 14.4697C13.8897 14.329 13.6989 14.25 13.5 14.25H10.5C10.3011 14.25 10.1103 14.329 9.96967 14.4697C9.82902 14.6103 9.75 14.8011 9.75 15V19.5C9.75 19.6989 9.67098 19.8897 9.53033 20.0303C9.38968 20.171 9.19891 20.25 9 20.25H4.5C4.30109 20.25 4.11032 20.171 3.96967 20.0303C3.82902 19.8897 3.75 19.6989 3.75 19.5V10.8281C3.75168 10.7243 3.77411 10.6219 3.81597 10.5269C3.85783 10.4319 3.91828 10.3463 3.99375 10.275L11.4937 3.45936C11.632 3.33287 11.8126 3.26273 12 3.26273C12.1874 3.26273 12.368 3.33287 12.5062 3.45936L20.0062 10.275C20.0817 10.3463 20.1422 10.4319 20.184 10.5269C20.2259 10.6219 20.2483 10.7243 20.25 10.8281V19.5C20.25 19.6989 20.171 19.8897 20.0303 20.0303C19.8897 20.171 19.6989 20.25 19.5 20.25H15C14.8011 20.25 14.6103 20.171 14.4697 20.0303C14.329 19.8897 14.25 19.6989 14.25 19.5Z"
                                stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p>Resident Management</p>

                    </div>
                </a>
                <?php
            }
            ?>
            <?php

            if (isset($_SESSION['role']) && ($_SESSION['role'] === 'admin')) {
                ?>

                <div class="sidebar-item">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 21.65C11.69 21.65 11.39 21.61 11.14 21.52C7.32 20.21 1.25 15.56 1.25 8.68998C1.25 5.18998 4.08 2.34998 7.56 2.34998C9.25 2.34998 10.83 3.00998 12 4.18998C13.17 3.00998 14.75 2.34998 16.44 2.34998C19.92 2.34998 22.75 5.19998 22.75 8.68998C22.75 15.57 16.68 20.21 12.86 21.52C12.61 21.61 12.31 21.65 12 21.65ZM7.56 3.84998C4.91 3.84998 2.75 6.01998 2.75 8.68998C2.75 15.52 9.32 19.32 11.63 20.11C11.81 20.17 12.2 20.17 12.38 20.11C14.68 19.32 21.26 15.53 21.26 8.68998C21.26 6.01998 19.1 3.84998 16.45 3.84998C14.93 3.84998 13.52 4.55998 12.61 5.78998C12.33 6.16998 11.69 6.16998 11.41 5.78998C10.48 4.54998 9.08 3.84998 7.56 3.84998Z"
                            fill="#D9D9D9" />
                    </svg>
                    <p>Product Management</p>
                </div>

                <?php
            }
            ?>
            <?php

            if (isset($_SESSION['role']) && ($_SESSION['role'] === 'admin')) {
                ?>
                <a href="../area/">
                    <div class="sidebar-item">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11 15.3125C10.9003 15.3125 10.8125 15.2247 10.8125 15.125V6.875C10.8125 6.77531 10.9003 6.6875 11 6.6875C11.0997 6.6875 11.1875 6.77531 11.1875 6.875V15.125C11.1875 15.2247 11.0997 15.3125 11 15.3125Z"
                                stroke="white" />
                            <path
                                d="M11 20.8541C5.56415 20.8541 1.14581 16.4358 1.14581 11C1.14581 5.56415 5.56415 1.14581 11 1.14581C11.3758 1.14581 11.6875 1.45748 11.6875 1.83331C11.6875 2.20915 11.3758 2.52081 11 2.52081C6.32498 2.52081 2.52081 6.32498 2.52081 11C2.52081 15.675 6.32498 19.4791 11 19.4791C15.675 19.4791 19.4791 15.675 19.4791 11C19.4791 10.6241 19.7908 10.3125 20.1666 10.3125C20.5425 10.3125 20.8541 10.6241 20.8541 11C20.8541 16.4358 16.4358 20.8541 11 20.8541Z"
                                fill="white" />
                            <path
                                d="M20.1667 6.18748C19.7908 6.18748 19.4792 5.87581 19.4792 5.49998V2.52081H16.5C16.1242 2.52081 15.8125 2.20915 15.8125 1.83331C15.8125 1.45748 16.1242 1.14581 16.5 1.14581H20.1667C20.5425 1.14581 20.8542 1.45748 20.8542 1.83331V5.49998C20.8542 5.87581 20.5425 6.18748 20.1667 6.18748Z"
                                fill="white" />
                            <path
                                d="M15.5833 7.10417C15.4091 7.10417 15.2349 7.04001 15.0974 6.90251C14.8316 6.63667 14.8316 6.19667 15.0974 5.93084L19.6808 1.34751C19.9466 1.08167 20.3866 1.08167 20.6524 1.34751C20.9183 1.61334 20.9183 2.05334 20.6524 2.31917L16.0691 6.90251C15.9316 7.04001 15.7574 7.10417 15.5833 7.10417Z"
                                fill="white" />
                        </svg>
                        <p>Area Management</p>

                    </div>
                </a>
                <?php
            }
            ?>
            <?php

            if (isset($_SESSION['role']) && ($_SESSION['role'] === 'admin')) {
                ?>
                <a href="../vote/">
                    <div class="sidebar-item">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 15.75C9.93 15.75 8.25 14.07 8.25 12C8.25 9.93 9.93 8.25 12 8.25C14.07 8.25 15.75 9.93 15.75 12C15.75 14.07 14.07 15.75 12 15.75ZM12 9.75C10.76 9.75 9.75 10.76 9.75 12C9.75 13.24 10.76 14.25 12 14.25C13.24 14.25 14.25 13.24 14.25 12C14.25 10.76 13.24 9.75 12 9.75Z"
                                fill="white" />
                            <path
                                d="M9.29506 21.6258L9.29505 21.6258L9.28974 21.6272C8.78935 21.7623 8.27942 21.6905 7.84725 21.4312L7.84729 21.4312L7.83943 21.4266L6.11942 20.4366L6.11883 20.4363C5.62587 20.1534 5.26895 19.6938 5.11296 19.1305C4.96627 18.5649 5.04116 17.9912 5.32369 17.4988L5.32465 17.4971C5.48974 17.2068 5.60884 16.9075 5.656 16.6178C5.70286 16.33 5.68369 16.0141 5.52135 15.7371C5.21133 15.2083 4.53815 15.03 3.9 15.03C2.71614 15.03 1.75 14.0638 1.75 12.88V11.12C1.75 9.93612 2.71614 8.96998 3.9 8.96998C4.53815 8.96998 5.21133 8.7917 5.52135 8.26284C5.8349 7.72797 5.64497 7.04839 5.32247 6.49903C5.04025 6.00586 4.96658 5.42239 5.11336 4.86793L5.11381 4.86619C5.25952 4.30763 5.61339 3.84901 6.1158 3.56539L6.1158 3.5654L6.11834 3.56395L7.84834 2.57395L7.84837 2.574L7.85501 2.57007C8.74208 2.0441 9.92719 2.34714 10.4696 3.26447L10.4696 3.26448L10.4713 3.26723L10.5893 3.46392C10.92 4.0341 11.4019 4.47498 12.015 4.47498C12.6294 4.47498 13.1119 4.03234 13.4427 3.4605C13.4427 3.46044 13.4428 3.46039 13.4428 3.46033L13.5513 3.27284C13.5516 3.27247 13.5518 3.27209 13.552 3.27172C14.0945 2.34774 15.277 2.04441 16.1739 2.57939L16.1738 2.57944L16.1806 2.58333L17.9006 3.57333L17.9012 3.57366C18.3941 3.85652 18.7511 4.3162 18.907 4.87945C19.0537 5.44507 18.9788 6.01875 18.6963 6.51114L18.6954 6.51283C18.5303 6.80317 18.4112 7.10244 18.364 7.39214C18.3171 7.67997 18.3363 7.99591 18.4987 8.27284C18.8087 8.8017 19.4819 8.97998 20.12 8.97998C21.3039 8.97998 22.27 9.94612 22.27 11.13V12.89C22.27 14.0738 21.3039 15.04 20.12 15.04C19.4818 15.04 18.8087 15.2183 18.4987 15.7471C18.1851 16.282 18.375 16.9616 18.6975 17.5109C18.9824 18.0086 19.0608 18.59 18.9084 19.1354L18.9084 19.1354L18.9062 19.1438C18.7605 19.7023 18.4066 20.1609 17.9042 20.4446L17.9017 20.446L16.1751 21.4341C15.8657 21.6044 15.5395 21.69 15.21 21.69C15.05 21.69 14.8823 21.6674 14.7042 21.6256C14.2097 21.4879 13.8 21.1781 13.5387 20.7427L13.4207 20.546C13.0899 19.9758 12.6081 19.535 11.995 19.535C11.3806 19.535 10.898 19.9777 10.5672 20.5496L10.4592 20.7361C10.4589 20.7366 10.4586 20.7371 10.4583 20.7376C10.1931 21.1868 9.7813 21.5004 9.29506 21.6258ZM13.8567 20.2895L13.8573 20.2905L13.9659 20.4781C13.9661 20.4785 13.9664 20.479 13.9667 20.4794C14.1561 20.81 14.4704 21.043 14.8387 21.1351C15.1931 21.2236 15.5696 21.1838 15.8933 20.9911L17.6199 19.9931C17.9901 19.7795 18.2775 19.4225 18.3931 18.9888C18.5063 18.5644 18.451 18.1178 18.2331 17.7401L18.2322 17.7386C17.7242 16.8652 17.7069 16.0506 18.0341 15.478C18.3586 14.9102 19.0688 14.52 20.09 14.52C21.0061 14.52 21.74 13.7861 21.74 12.87V11.11C21.74 10.2067 21.009 9.45998 20.09 9.45998C19.0688 9.45998 18.3586 9.0698 18.0341 8.50191C17.7069 7.92934 17.7242 7.11476 18.2322 6.24137L18.2331 6.23984C18.451 5.86217 18.5063 5.41559 18.3931 4.99115C18.2776 4.55813 18.0025 4.21595 17.642 3.99415L17.6353 3.98997L17.6283 3.98601L15.903 2.99868C15.2278 2.59474 14.3551 2.83617 13.9595 3.50562L13.9595 3.50561L13.9573 3.50946L13.8473 3.69946L13.8467 3.7005C13.3372 4.58533 12.6503 4.99998 11.99 4.99998C11.3308 4.99998 10.6449 4.58662 10.1357 3.70461L10.0281 3.50902L10.024 3.50156L10.0196 3.49424C9.6304 2.84031 8.76766 2.60925 8.09931 2.99737C8.0991 2.99749 8.0989 2.99761 8.09869 2.99773L6.37014 3.99689C6.37005 3.99694 6.36995 3.99699 6.36986 3.99705C6.36983 3.99706 6.36981 3.99708 6.36978 3.9971C5.99973 4.21071 5.7125 4.56758 5.59688 5.00115C5.4837 5.42559 5.53902 5.87217 5.7569 6.24984L5.75779 6.25137C6.26579 7.12476 6.28306 7.93934 5.95588 8.51191C5.63137 9.0798 4.9212 9.46998 3.9 9.46998C2.98386 9.46998 2.25 10.2038 2.25 11.12V12.88C2.25 13.7833 2.98103 14.53 3.9 14.53C4.9212 14.53 5.63137 14.9202 5.95588 15.4881C6.28306 16.0606 6.26579 16.8752 5.75779 17.7486L5.75691 17.7501C5.53902 18.1278 5.4837 18.5744 5.59688 18.9988C5.71235 19.4318 5.98753 19.774 6.34795 19.9958L6.35474 20L6.36166 20.0039L8.08504 20.9902C8.41615 21.1919 8.80356 21.2351 9.15373 21.1444C9.53454 21.0485 9.836 20.7987 10.0251 20.4932L10.029 20.4869L10.0327 20.4805L10.1422 20.2914C10.1423 20.2912 10.1424 20.2911 10.1424 20.291C10.6537 19.4122 11.3419 18.99 12 18.99C12.6603 18.99 13.3472 19.4046 13.8567 20.2895Z"
                                stroke="white" />
                        </svg>
                        <p>Vote Management</p>
                    </div>
                </a>
                <?php
            }
            ?>
            <a href="../logout.php">
                <div class="sidebar-item" style="margin: 100px 0 0;">

                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15.24 22.27H15.11C10.67 22.27 8.53002 20.52 8.16002 16.6C8.12002 16.19 8.42002 15.82 8.84002 15.78C9.24002 15.74 9.62002 16.05 9.66002 16.46C9.95002 19.6 11.43 20.77 15.12 20.77H15.25C19.32 20.77 20.76 19.33 20.76 15.26V8.73998C20.76 4.66998 19.32 3.22998 15.25 3.22998H15.12C11.41 3.22998 9.93002 4.41998 9.66002 7.61998C9.61002 8.02998 9.26002 8.33998 8.84002 8.29998C8.42002 8.26998 8.12001 7.89998 8.15001 7.48998C8.49001 3.50998 10.64 1.72998 15.11 1.72998H15.24C20.15 1.72998 22.25 3.82998 22.25 8.73998V15.26C22.25 20.17 20.15 22.27 15.24 22.27Z"
                            fill="white" />
                        <path
                            d="M15 12.25H3.62C3.48614 12.25 3.37 12.1339 3.37 12C3.37 11.8661 3.48614 11.75 3.62 11.75H15C15.1339 11.75 15.25 11.8661 15.25 12C15.25 12.1339 15.1339 12.25 15 12.25Z"
                            stroke="white" />
                        <path
                            d="M3.20645 11.6465L2.8529 12L3.20645 12.3536L6.02645 15.1736C6.12119 15.2683 6.12119 15.4317 6.02645 15.5265L6.02036 15.5326L6.01447 15.5389C5.98423 15.5713 5.92536 15.6 5.85 15.6C5.78545 15.6 5.72485 15.5778 5.67356 15.5265L2.32356 12.1765C2.22882 12.0817 2.22882 11.9183 2.32356 11.8236L5.67356 8.47358C5.76829 8.37884 5.93171 8.37884 6.02645 8.47358C6.12119 8.56832 6.12119 8.73174 6.02645 8.82647L3.20645 11.6465Z"
                            stroke="white" />
                    </svg>

                    <p>Logout</p>

                </div>
            </a>

        </div>
        <div style="width: 100%;">
            <div style="background: white; margin: 20px 40px; padding: 20px;">

                <div style="display: flex; justify-content: space-between;">
                    <p style="font-size: 18px; font-weight: 500; color: black;">Product Management</p>
                    <a href="./create.php"> <button class="submit-btn">Create</button></a>
                </div>

                <div style="display:flex; gap: 15px; margin: 20px 0 30px;">
                    <input placeholder="Search" class="search" name="searchName"/>
                    <button type="submit">search</button>
                    <div class="filter">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4.49992 1.75H15.4999C16.4166 1.75 17.1666 2.5 17.1666 3.41667V5.25C17.1666 5.91667 16.7499 6.75 16.3333 7.16667L12.7499 10.3333C12.2499 10.75 11.9166 11.5833 11.9166 12.25V15.8333C11.9166 16.3333 11.5833 17 11.1666 17.25L9.99992 18C8.91659 18.6667 7.41658 17.9167 7.41658 16.5833V12.1667C7.41658 11.5833 7.08325 10.8333 6.74992 10.4167L3.58325 7.08333C3.16659 6.66667 2.83325 5.91667 2.83325 5.41667V3.5C2.83325 2.5 3.58325 1.75 4.49992 1.75Z"
                                stroke="#666974" stroke-width="1.875" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M9.10833 1.75L5 8.33333" stroke="#666974" stroke-width="1.875"
                                stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p>Filter</p>
                    </div>
                    <div class="filter">
                        <svg width="24" height="20" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16 14L12 10M12 10L7.99996 14M12 10V19M20.39 16.39C21.3653 15.8583 22.1358 15.0169 22.5798 13.9986C23.0239 12.9804 23.1162 11.8432 22.8422 10.7667C22.5682 9.69016 21.9434 8.73553 21.0666 8.05346C20.1898 7.3714 19.1108 7.00075 18 7.00001H16.74C16.4373 5.82926 15.8731 4.74235 15.0899 3.82101C14.3067 2.89967 13.3248 2.16786 12.2181 1.68062C11.1113 1.19338 9.90851 0.963373 8.70008 1.0079C7.49164 1.05242 6.30903 1.37031 5.24114 1.93768C4.17325 2.50505 3.24787 3.30712 2.53458 4.2836C1.82129 5.26008 1.33865 6.38555 1.12294 7.57541C0.90723 8.76527 0.964065 9.98854 1.28917 11.1533C1.61428 12.318 2.1992 13.3939 2.99996 14.3"
                                stroke="#666974" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p>Export Table</p>
                    </div>
                </div>
                <table class="table" style="width: 100%;">
                    <thead>
                        <tr style="background: #F5F5F6;">
                            <th scope="col" style="text-align: left">S/N</th>
                            <th scope="col" style="text-align: left">Name</th>
                            <th scope="col" style="text-align: left">Price</th>
                            <th scope="col" style="text-align: left">Description</th>
                            <th scope="col" style="text-align: left">Size</th>
                            <th scope="col" style="text-align: left">Benefits</th>
                            <th scope="col" style="text-align: left">Pricing Categories</th>
                            <th scope="col" style="text-align: left">Vote Count</th>
                            <th scope="col" style="text-align: left">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($templateData['result'] as $option): ?>
                            <tr>
                                <td><?php echo $option["id"]; ?></td>
                                <td><?php echo $option["name"]; ?></td>
                                <td><?php echo "￡" . $option["price"]; ?></td>
                                <td><?php echo $option["description"]; ?></td>
                                <td><?php echo $option["size"]; ?></td>
                                <td><?php echo $option["benefits"]; ?></td>
                                <td><?php echo $option["pricing_categories"]; ?></td>
                                <td><?php echo $option["vote_count"]; ?></td>
                                <td>
                                    <div style="display: flex; gap: 20px;">
                                        <a href="update.php?update=<?php echo $option['id']; ?>">
                                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M13.7601 3.59997L5.5501 12.29C5.2401 12.62 4.9401 13.27 4.8801 13.72L4.5101 16.96C4.3801 18.13 5.2201 18.93 6.3801 18.73L9.6001 18.18C10.0501 18.1 10.6801 17.77 10.9901 17.43L19.2001 8.73997C20.6201 7.23997 21.2601 5.52997 19.0501 3.43997C16.8501 1.36997 15.1801 2.09997 13.7601 3.59997Z"
                                                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M12.3899 5.04999C12.8199 7.80999 15.0599 9.91999 17.8399 10.2"
                                                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M3.5 22H21.5" stroke="#292D32" stroke-width="1.5"
                                                    stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>

                                        <?php
                                        if ($option['vote'] === "TRUE") {
                                            ?>
                                            <a href="index.php?vote=<?php echo $option['id']; ?>,no">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M13.7 2.58301C12.1917 2.58301 10.8417 3.31634 10 4.44134C9.15835 3.31634 7.80835 2.58301 6.30002 2.58301C3.74169 2.58301 1.66669 4.66634 1.66669 7.24134C1.66669 8.23301 1.82502 9.14967 2.10002 9.99967C3.41669 14.1663 7.47502 16.658 9.48335 17.3413C9.76669 17.4413 10.2334 17.4413 10.5167 17.3413C12.525 16.658 16.5834 14.1663 17.9 9.99967C18.175 9.14967 18.3334 8.23301 18.3334 7.24134C18.3334 4.66634 16.2584 2.58301 13.7 2.58301Z"
                                                        fill="#A5272F" />
                                                </svg>
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="index.php?vote=<?php echo $option['id']; ?>,yes">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M12 21.65C11.69 21.65 11.39 21.61 11.14 21.52C7.32 20.21 1.25 15.56 1.25 8.68998C1.25 5.18998 4.08 2.34998 7.56 2.34998C9.25 2.34998 10.83 3.00998 12 4.18998C13.17 3.00998 14.75 2.34998 16.44 2.34998C19.92 2.34998 22.75 5.19998 22.75 8.68998C22.75 15.57 16.68 20.21 12.86 21.52C12.61 21.61 12.31 21.65 12 21.65ZM7.56 3.84998C4.91 3.84998 2.75 6.01998 2.75 8.68998C2.75 15.52 9.32 19.32 11.63 20.11C11.81 20.17 12.2 20.17 12.38 20.11C14.68 19.32 21.26 15.53 21.26 8.68998C21.26 6.01998 19.1 3.84998 16.45 3.84998C14.93 3.84998 13.52 4.55998 12.61 5.78998C12.33 6.16998 11.69 6.16998 11.41 5.78998C10.48 4.54998 9.08 3.84998 7.56 3.84998Z"
                                                        fill="#D9D9D9" />
                                                </svg>
                                            </a>
                                            <?php
                                        }
                                        ?>


                                        <a href="index.php?delete=<?php echo $option['id']; ?>">
                                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M19.5 7L18.6327 19.1425C18.5579 20.1891 17.687 21 16.6378 21H8.36224C7.31296 21 6.44208 20.1891 6.36732 19.1425L5.5 7M10.5 11V17M14.5 11V17M15.5 7V4C15.5 3.44772 15.0523 3 14.5 3H10.5C9.94772 3 9.5 3.44772 9.5 4V7M4.5 7H20.5"
                                                    stroke="#F15950" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>



</body>

</html>