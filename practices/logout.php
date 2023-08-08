<?php




session_start();

$_SESSION['login'] = false;
$_SESSION['password'] = false;
$_SESSION['nickname'] = "";
$_SESSION['slno'] = "";
session_unset();
session_destroy();
header('location: trylogin.php');
// die($connection);
