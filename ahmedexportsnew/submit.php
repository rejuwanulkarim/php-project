<?php
// $insert = false;

use LDAP\Result;

$servername = "localhost";
$username = "root";
$password = "";
$userdb = "nproject";


$con = mysqli_connect($servername, $username, $password, $userdb);
// $con2 = mysqli_connect($servername, $username, $password, $dbname2);
// $commentdbcon = mysqli_connect($servername, $username, $password, $commentdb);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {


$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
if($password==$cpassword){
$hashpassword = password_hash($password, PASSWORD_DEFAULT);
$sql="INSERT INTO `singuppage` (`slno`, `name`, `email`, `password`, `date&time`) VALUES (Null,'$name','$email','$hashpassword',current_timestamp() )";
$result=mysqli_query($con,$sql);
}
else{
    echo "Enter same password";
}
if($result){
    echo "Submited";
}
else{
    echo "not submited".mysqli_error($con);
}
}
























?>