<?php
$insert = false;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'commentdb';
$con = mysqli_connect($servername, $username, $password, $dbname);
if (!$con) {
    die("connection is not stable" . mysqli_connect_error());
} else {
    echo " connection is successfully";
}


?>