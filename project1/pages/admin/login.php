<?php
include './dbconnect.php';
$password_error=false;
$worng_user=false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = mysqli_escape_string($connection, $_POST['username']);
    $password = mysqli_escape_string($connection, $_POST['password']);
    $sql = "SELECT * FROM `user` WHERE `username`='$user_name'";
    $result = mysqli_query($connection, $sql);





    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $pass = $row['password'];
            $slno = $row['slno'];
            $username = $row['username'];
            if (password_verify($password, $pass)) {
                session_start();
                $_SESSION['login'] = true;
                $_SESSION['password'] = true;
                $_SESSION['slno'] = $slno;
                $_SESSION['username'] = $username;
                // $_SESSION['slno_login'] = $slno;
                $_SESSION['admin_power'] = $Admin_power;
                $_SESSION['session_time']=time();
                header("location: ./admin.php?dashboard");
            } else {
$password_error=true;
}
}
} else {
    $worng_user=true;
}
}




?>
<title>Login</title>

<!-- <link rel="stylesheet" href="../css/main.css"> -->
<link rel="stylesheet" href="../css/iframe.css">
<div class="admin_list_login_div">
    <form action="login.php" method="POST" style="display: flex;flex-direction:column;width:22rem;margin:auto;justify-content:center;align-items:center;border:2px solid gray;    padding-top: 2rem;
    padding-bottom: 2rem;">
        <label for="heading" class="verify_login_heading">Login Please</label>
        <input type="text" name="username" placeholder="please enter your username" class="admin_create_inputs" required>

        <input type="password" name="password" placeholder="please enter your admin password" class="admin_create_inputs" required>
        <?php
if($password_error==true){
    echo "<p style='color:red;margin-bottom:0.5rem;'>Incorrect Password</p>";
    
}elseif($worng_user==true){
    echo "<p style='color:red;margin-bottom:0.5rem;'>Incorrect User Name And Password</p>";
    
}


?>
        <input type="submit" class="submit_btn">
    </form>

</div>