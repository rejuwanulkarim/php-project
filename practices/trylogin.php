<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "homedb";
// global $connection;
$connection = mysqli_connect($servername, $username, $password, $dbname);




if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = mysqli_escape_string($connection,$_POST['username']);
    $password = mysqli_escape_string($connection,$_POST['password']);
   
    $sql = "SELECT * FROM `all_info` WHERE `Gmail`='$user_name'";
    $result = mysqli_query($connection, $sql);

  
    $num = mysqli_num_rows($result);


    if ($num == 1) {

        while ($row = mysqli_fetch_assoc($result)) {
            $pass = $row['Password'];
            $nickname = $row['NickName'];
            $slno = $row['slno'];
            $Admin = $row['AdminPower'];
            // echo "$pass";
            if (password_verify($password, $row['Password'])) {
                session_start();
                $_SESSION['login'] = true;
                $_SESSION['password'] = true;
                $_SESSION['nickname'] = $nickname;
                $_SESSION['slno'] = $slno;
                $_SESSION['admin_power']= $Admin;
                header("location: ./accessSuccess.php");
            }else{

                echo "<p style='position:absolute;color:red;top:0'>Incorrect User Name And Password</p>";
            }
        }
    } else {

        echo "<p style='position:absolute;color:red;top:0'>Incorrect User Name And Password</p>";
    }
}




?>
<title>Login</title>

<link rel="stylesheet" href="./style.css">
<div class="admin_list_login_div">
    <form action="trylogin.php" method="POST" style="display: flex;flex-direction:column;width:22rem;margin:auto;justify-content:center;align-items:center;border:2px solid gray;    padding-top: 2rem;
    padding-bottom: 2rem;">
        <label for="heading" class="verify_login_heading">Login Please</label>
        <input type="text" name="username" placeholder="please enter your username" class="admin_create_inputs" required>

        <input type="password" name="password" placeholder="please enter your admin password" class="admin_create_inputs" required>

        <input type="submit" class="submit_btn">
    </form>

</div>