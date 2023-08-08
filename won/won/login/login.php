<?php

$insert = false;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'userinfo';
$dbname2 = 'usertable';

$con = mysqli_connect($servername, $username, $password, $dbname);
$con2 = mysqli_connect($servername, $username, $password, $dbname2);
// if (!$con) {
//     die("connection is not stable" . mysqli_connect_error());
// } else {
//     echo " connection is successfully";
// }


?>
<?php
$passerror = false;
$login = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // $name = $_POST["name"];
    $users = $_POST["email"];
    $userpassword = $_POST["password"];


    $sql = "SELECT * FROM `users` WHERE `username`='$users'";
    $result = mysqli_query($con, $sql);
    // $num = mysqli_num_rows($result);

    if ($num == 1) {
        // $login = true;
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($userpassword, $row['password'])) {
                $login = true;
                // session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $users;
                $userlog="INSERT INTO `$users` (`date`, `login`, `login1`) VALUES (current_timestamp(), 'Login', current_timestamp())";
                $result=mysqli_query($con2,$userlog);
               
                
            } else {
                $passerror = true;
                // echo "hello world";
            }
        }
    } else {
        $passerror = true;
    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- <link rel="stylesheet" href="login_css.css"> -->
    <link rel="stylesheet" href="../homepage/nav_bar.css">
    <link rel="stylesheet" href="../styleing/login_style.css">
    <link rel="stylesheet" href="../homepage/footer.css">
</head>

<body>
    <header>
        <div>
            <div id="logo"><a href="#logo">
                    <img src="../homepage/CODER FREE.png" alt="logo Here">
                    <p id="webname" style="color:#3b3732">
                        <b>FREE COURSE</b>
                    </p>
                </a>
            </div>
            <div id="nav">
                <ul class="nav_item">
                    <li class="nav"><a href="../homepage/karim.php">Home</a></li>
                    <li class="nav"><a href="/course">Course</a></li>
                    <li class="nav"><a href="/about">About</a></li>
                    <li class="nav"><a href="/contact">Contac us</a></li>
                    <li class="nav">
                        <div class="btn">
                            <!-- <button class="login"> Login</button> -->
                            <a href="./registration.php"><input type="button" value="Sing up" class="login"></a>

                        </div>

                    </li>
                </ul>
            </div>
        </div>
    </header>
    <hr>
    <?php
    if ($login) {
        echo '<p>username and Password match</p>';
        header('location: ../homepage/admin.php');
    }
    ?>
    <?php
    if (isset($_GET['alert'])) {
        $msg = $_GET['alert'];
        echo '<link rel="stylesheet" href="../styleing/registration_style.css">
        <div class="alert" id="alert">
        <span class="closebtn" onclick=this.parentElement.style.display="none">&times;</span>
        <strong>Congrats!</strong>' . ' ' . $msg . ' Your Account has been created.
        </div>';
    }

    ?>








    <div class="container">

        <form id="form" action="./login.php" method="POST">
            <h1 id="login-header">Login Here</h1>
            <label for="">Gmail<font color=red>★</font></label>
            <input class="login-input" type="text" name="email" id="user-id" required>
            <label for="">Password<font color=red>★</font></label>
            <input class="login-input" type="password" name="password" id="user-password" required>
            <input type="submit" value="submit" id="submit-btn">
        </form>
        <?php
        if (isset($_GET['passerror'])) {
            $msg = $_GET['passerror'];
            echo '<p id="invalid_pass_para">Invalid username and Password</p>';
        }
        if ($passerror) {
            echo '<p id="invalid_pass_para">Invalid username and Password</p>';
        }


        ?>

        <br><br>
        <div>
            <a href="./registration.php" class="login-singup-para" style="margin:auto;">Don't Have Any Account</a>
        </div>

    </div>
    <footer>
        <p id="footer_para">Copyright <?php
                                        $year = date("Y");
                                        echo $year;
                                        ?> &copy; from free course.com </p>
    </footer>
    <!-- show alert on user successfully account create and auto time out-->
    <script>
        function func() {
            setTimeout(() => {
                document.getElementById('alert').style.display = 'none';
            }, 4000);
        }
        func();
    </script>
</body>

</html>