<?php

$insert = false;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'usertable';
$con = mysqli_connect($servername, $username, $password, $dbname);
if (!$con) {
    die("connection is not stable" . mysqli_connect_error());
} else {
    echo " connection is successfully";
}

// $result = false;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $tablename = $_POST['tablename'];
    $name = $_POST['name'];
    $username = $_POST['username'];

    $sql = "CREATE TABLE `usertable`.`$tablename` ( `$name` VARCHAR(25) NOT NULL ,`$username` VARCHAR(50) NOT NULL)";


    if ($name == $username) {
        echo "plz enter difrent name";
    } else {
        // if ($result) {
        //     $insert = true;
        //     // echo "your comment has been sent successfully";
        // } else {
        //     echo "connection unsuccess" . mysqli_error($con);
        // }
        // if ($insert) {
        //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //     $sql = "INSERT INTO `$tablename` (`$name`, `$username`, `create Date`) VALUES ('$tablename', '$name', current_timestamp())";

        //     $result = mysqli_query($con, $sql);

        // $exist=mysqli_error($con);
        $result = mysqli_query($con, $sql);
        if ($result) {
            // echo "success";
            // $insert = true;
            // echo '';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {


                $uname = $_POST['uname'];
                $gmail = $_POST['gmail'];
                $sql = "INSERT INTO `$tablename` (`$name`, `$username`) VALUES ('$uname', '$gmail')";

                $result = mysqli_query($con, $sql);
            } else {
                echo "Exist" . mysqli_error($con);
            }
        }



        // }
        // }
    }
    // else{
    //     echo "User name exist";
    // }
    //     $insert = true;
    // }
    // if ($insert && $_SERVER['REQUEST_METHOD'] == 'POST') {
    //     if($result>0){

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo php table create</title>

</head>

<body>
    <style>
        #subform{
            display: none;
        }
        #block{
            display: block;
        }
    </style>
    <form action="index.php" method="POST">
        <div id="block">
        <label for="">table name</label>
        <input type="text" id="tablename" name="tablename">
        <label for="">name</label>
        <input type="text" id="name" name="name">
        <label for="">username</label>
        <input type="text" id="username" name="username">
        <button id="block1">submit</button>
    </div>
        <div id="subform">
      <label for="">name</label>
            <input type="text" id="tablename" name="uname">
            <label for="">gmail</label>
            <input type="text" id="name" name="gmail">
            <input type="submit">
            </div>
            
    </form>
    <br>
    <script>
        let click1 =document.getElementById('block1');
        let clickblock=document.getElementById('subform');
click1.addEventListener('click',function(){
    clickblock.style.display="block";
})
    </script>

</body>

</html>