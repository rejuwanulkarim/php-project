<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "notes";

$con = mysqli_connect($servername, $username, $password, $database);

if(!$con){
    die ("connected unsuccessfully!<br>".mysqli_connect_error());
}
else{
    echo "connected successfully<br>";

}


?>