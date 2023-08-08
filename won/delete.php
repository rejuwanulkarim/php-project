<?php
// $str='Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, cupiditate Tempora odio';

// echo str_replace(" ","%",$str); 
$insert = false;
$servername = "localhost";
$username = "root";
$password = "";
$commentdb = "usertable";
$con = mysqli_connect($servername, $username, $password, $commentdb);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gmail = $_POST['demo'];
    $password = $_POST['demo2'];
    
    switch ($gmail) {
        case "\"":
            $str = str_replace("\"", "%", $gmail);
            break;
        case "'":
            $str2 = str_replace("'", "$", $gmail);
            
            break;
        case ";":
            $str3 = str_replace(";", "?", $gmail);
            
            break;
        case ",":
            $str4 = str_replace(",", "%", $gmail);
            break;
    }

    $sql = "INSERT INTO `demo` (`gmail`, `password`) VALUES ('$gmail', '$password')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo " success";
    } else {
        echo "Unsuccess" . mysqli_error($con);
    }
}



?>
<form action="delete.php" method="POST">
    <input type="text" name="demo">
    <input type="text" name="demo2">
    <input type="submit" value="submit">
</form>