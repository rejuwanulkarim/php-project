<?php
include "../connections/connections.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['user-email'];
    $otp = $_POST['OTP'];
    $password = password_hash($_POST['new-password'], PASSWORD_DEFAULT);
    // $password = $_POST['new-password'];
    $sql = "SELECT * FROM `authentication` WHERE `username`='$email'";
    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result) == 1) {
        $otp_db = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $otp_db = $row['OTP'];
        }
        if ($otp_db == $otp) {
            session_start();
            $otp = rand(100000, 999999);
            $sql = "UPDATE `authentication` SET `OTP`='$otp',`password`='$password' WHERE `authentication`.`username`='$email'";
            $result = mysqli_query($connection, $sql);
            if ($result) {
                echo "success";
                header("location:../index.php");
                $_SESSION['forgot-user'] = true;
            } else {
                echo "not success";
            }
        } else {
            echo "invalid otp";
        }
    } else {
        echo "User not exist";
    }
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot</title>
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="../assets/nav.css">

</head>

<body>
    <?php
    include "./navbar.php";
    ?>

    <div class="alert-msg-nor">
        <div id="massage"></div>
    </div>

    <div class="login-section">
        <h2 class="login-heading">Login</h2>
        <form action="./forgot.php" method="POST" class="login-form">
            <div class="flex-row OTP">
                <input type="email" name="user-email" id="email" class="login-inputs" placeholder="Please Enter User Id" maxlength="50" required>
                <button type="button" class="otp-genaretor" onclick="forgotOtp(this)">Get Otp</button>
            </div>
            <input type="number" name="OTP" id="OTP" class="login-inputs" placeholder="Please Enter Otp" maxlength="6" required>
            <input type="password" name="new-password" id="password" class="login-inputs" placeholder="Please Enter New Password" maxlength="50" required>
            <button class="submit" type="submit">Submit</button>

        </form>


    </div>



    <div id="loading">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 367.136 367.136">
            <path d="M367.136,149.7V36.335l-39.14,38.953c-13.024-17.561-29.148-32.731-47.732-44.706 c-29.33-18.898-63.352-28.888-98.391-28.888C81.588,1.694,0,83.282,0,183.568s81.588,181.874,181.874,181.874 c34.777,0,68.584-9.851,97.768-28.488c28.394-18.133,51.175-43.703,65.881-73.944l-26.979-13.119 c-25.66,52.77-78.029,85.551-136.669,85.551C98.13,335.442,30,267.312,30,183.568S98.13,31.694,181.874,31.694 c49.847,0,96.439,24.9,124.571,65.042L253.226,149.7H367.136z"></path>

        </svg>
    </div>
    <script src="../assets/main.js"></script>
</body>

</html>