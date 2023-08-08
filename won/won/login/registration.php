<?php
$insert = false;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'userinfo';
$con = mysqli_connect($servername, $username, $password, $dbname);
// if (!$con) {
//     die("connection is not stable" . mysqli_connect_error());
// } else {
//     echo " connection is successfully";
// }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create_account</title>
    <!-- <link rel="stylesheet" href="create_account.css"> -->
    <link rel="stylesheet" href="../styleing/registration_style.css">
    <link rel="stylesheet" href="../homepage/nav_bar.css">
    <link rel="stylesheet" href="../homepage/footer.css">
    <!-- <link rel="stylesheet" href="../styleing/login_style.css"> -->
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
                    <li class="nav"><a href="/contactus">Contac us</a></li>
                    <li class="nav">
                        <div class="btn">
                            <!-- <button class="login"> Login</button> -->
                            <a href="./login.php"><input type="button" value="Sing in" class="login"></a>
                        </div>

                    </li>
                </ul>
            </div>
        </div>
    </header>
    <hr>


    <?php
    $showAlert = false;
    $showerror = false;
    $existuser = false;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $users = $_POST['email'];
        $userpassword = $_POST['password'];
        $cpassword = $_POST['cpassword'];


        $exists = false;
        $existsql = "SELECT * FROM `users` WHERE username='$users'";
        $Existresult = mysqli_query($con, $existsql);
        $Existnum = mysqli_num_rows($Existresult);

        if ($Existnum > 0) {
            $existuser = true;
            // echo "Hello";
        } else {
            if (($userpassword == $cpassword)) {

                $hashpassword = password_hash($userpassword, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` (`name`,`username`, `password`, `date`) VALUES ('$name','$users', '$hashpassword', current_timestamp())";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    $showAlert = true;
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = 'usertable';
                    $conn = mysqli_connect($servername, $username, $password, $dbname);
                    $usertable = "CREATE TABLE `usertable`.`$users` ( `date`DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(), `login` VARCHAR(15) NOT NULL  , `login1` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP()) ENGINE = InnoDB;
                    ";
                    $result = mysqli_query($conn, $usertable);
                }
            } else {
                $showerror = "Password is not match";
            }
        }
    }

    ?>
    <?php
    if ($showAlert) {
        header('location: ./login.php?alert=' . $name);

        exit;
    }
    if ($showerror) {
        echo "Your form is not submited! " . $showerror;
    }
    // if ($existuser) {
    //     echo "alredy Exists! " . $showerror;
    // }

    ?>
    <style>

    </style>
    <div id="container">


        <form id="form" action="registration.php" method="POST">
            <h1 id="login-header">create an Account</h1>
            <label for="">Name<font color=red>★</font></label>
            <input class="login-input" type="text" name="name" id="name" required>
            <label for="">Gmail<font color=red>★</font></label>
            <input class="login-input" type="text" name="email" id="user-id" required>
            <?php if ($existuser) {
                echo "<p id='exist_username-para'>User name alredy exist</p>";
            } ?>
            <label for="">Password<font color=red>★</font></label>
            <input class="login-input" type="password" name="password" id="password" required>
            <label for="">Confirm Password<font color=red>★</font></label>
            <input class="login-input" type="password" name="cpassword" id="conform-password" required>

            <input type="submit" id="submit-btn">
            <br>
            <br>
            <div>
                <a href="./login.php" class="login-singup-para" style="text-align: center;margin: auto 97px;">Alredy Sing Up</a>
            </div>

        </form>

    </div>
    <style>

    </style>
    </head>

    <body>


        <footer>
            <p id="footer_para">Copyright <?php
                                            $year = date("Y");
                                            echo $year;
                                            ?> &copy; from free course.com </p>
        </footer>


    </body>

</html>