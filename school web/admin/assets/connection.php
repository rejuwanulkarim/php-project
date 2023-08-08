<?php
$servername="localhost";
$username="root";
$password="";
$dbname="schooldb";
global $connection;
$connection=mysqli_connect($servername,$username,$password,$dbname);


// if($connection){
//     echo "Connected";
// }else{
//     echo "Failed Connection". mysqli_connect_error();
// }
?>
