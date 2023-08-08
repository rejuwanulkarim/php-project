<?php

session_start();
$login = $_SESSION['login'];
$password = $_SESSION['password'];
$email = $_SESSION['email'];
$user_type = $_SESSION['user-type'];


if ($login != true && $password != true) {
    header("location:../../pages/login.php");
}
$subject = "";

if (isset($_GET)) {
    $subject = $_GET['subject'];
    $subject = strtolower($subject);
    $_SESSION['subject_name'] = $subject;
}

?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/admin.css">
    <title>staff Profile</title>
</head>

<body pagename="staff-index">
    <a href="../pages/logout.php" class="result-logout-btn">
        <svg>
            <use href="http://localhost/karim/school web/svg_logos/svg_icons.svg#power"></use>
        </svg>
    </a>
    <div class="classes">
        <?php
        include "../assets/connection.php";


        $sql = "SELECT * FROM `class`";
        $result = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_row($result)) {
            $class = $row[1];
            $class_requ = explode(" ", $class);
            // echo "<pre>";
            // print_r($class_requ);
            // echo "</pre>";
            echo "<a href='../pages/result.php?class=$class_requ[1]' class='class-card'>
        <h3>$class</h3>
        </a>";
        }
        ?>
    </div>




</body>

</html>