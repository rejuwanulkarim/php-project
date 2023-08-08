<?php
session_start();
$slno=$_SESSION['slno'];

include './dbconnect.php';
// echo $slno;
$sql="UPDATE `user` SET `alert`=0 WHERE `user`.`slno`=$slno";
$result=mysqli_query($connection,$sql);
session_unset();
session_destroy();
header('location:./login.php');
?>