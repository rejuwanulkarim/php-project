<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "schooldb";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// if ($conn) {
//     // echo 'yes';
// } else {
//     echo 'no';
// }
session_start();
// $path = "";
// if (isset($_SESSION['logged_in'])==true) {
//     $path = $_SESSION['logged_in'];
//     $path = $_SESSION['path'];
//     header("location:$path");
// }
// echo $path;

function validation($username, $tablename, $path)
{
    include_once "../dbconnect.php";
    // session_start();
    $randOTP = rand(10000, 19999);
    $sql = "UPDATE `$tablename` SET `OTP`='$randOTP' WHERE `$tablename`.`email`='$username'";
    $result = mysqli_query($connection, $sql);
}
function otperror()
{
    echo " <div id='otp-error'>Invalid Otp Please Regenarate Otp &nbsp; <span id='opterror' onclick='otpalerthide(this)'>&times;</span></div>";
}
$attempt = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['unicId'];
    $otp = $_POST['otp'];
    $sql = "SELECT * FROM `admins` WHERE `email`='$username' ";
    $result = mysqli_query($conn, $sql);
    $path = "";

    if (mysqli_num_rows($result) > 0) {
        $dbotp = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $dbotp = $row['OTP'];
        }

        if ($otp == $dbotp) {

            $path = "../admin/pages/index.php?query=dashboard";
            validation($username, "admins", $path);

            $_SESSION['login'] = true;
            $_SESSION['password'] = true;
            $_SESSION['email'] = "$username";
            $_SESSION['user-type'] = "admins";
            $_SESSION['path'] = $path;

            header("location:$path");
        } else {
            otperror();
        }
    } else {
        $sql = "SELECT * FROM `students` WHERE `email`='$username'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $dbotp = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $dbotp = $row['OTP'];
            }

            if ($otp == $dbotp) {
                $path = "../profile/profile.php";
                validation($username, "students", $path);

                $_SESSION['login'] = true;
                $_SESSION['password'] = true;
                $_SESSION['email'] = "$username";
                $_SESSION['user-type'] = "students";
                header("location:$path");
            } else {
                otperror();
            }
        } else {
            $sql = "SELECT * FROM `staffs` WHERE `email`='$username'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $subject = "";
                $dbotp = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $dbotp = $row['OTP'];
                    $subject = $row['subject'];
                }

                if ($otp == $dbotp) {
                    $subject = strtolower($subject);
                    $path = "../admin/staffs/index.php?subject=$subject";
                    validation($username, "staffs", $path);

                    $_SESSION['login'] = true;
                    $_SESSION['password'] = true;
                    $_SESSION['email'] = "$username";
                    $_SESSION['user-type'] = "staffs";
                    $_SESSION['subject_name'] = $subject;
                    header("location:$path");
                } else {
                    otperror();
                }
            } else {
                echo " <div id='otp-error'>Invalid Otp Please Regenarate Otp &nbsp; <span id='opterror' onclick='otpalerthide(this)'>&times;</span></div>";
            }
        }
    }
}



if (isset($_GET['newuser'])) {
    session_start();
    session_destroy();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../assets/main.css">
    <link rel="stylesheet" href="../assets/readmission.css">
    <link rel="stylesheet" href="../assets/navbar.css">
    <link rel="stylesheet" href="../assets/footer.css">
    <link rel="stylesheet" href="../assets/phone.css">
</head>

<body pagename="login">

    <?php
    include './navbar.php';
    ?>


    <section class="readmition_section">
        <form action="./login.php" method="POST" class="readmition_form" id="login-form">
            <h4 class="form_heading">Readmission</h4>
            <div class="unic_id_sec">
                <label for="ID" class="unic_id_lable">Enter ID&nbsp;:</label>
                <input type="text" name="unicId" id="unic_id" placeholder="Enter Your Unic Id">
                <input type="button" value="Genarate Otp" name="otp_genarator" onclick="otpsender(this)">
            </div>
            <div id="massage"></div>
            <div class="otp_section">
                <label for="OTP" class="otp_lable">Enter Otp &nbsp;:</label>
                <input type="number" name="otp" id="otp" placeholder="Enter Verify OTP">
            </div>

            <input type="submit" value="Login" class="submit_btn">
        </form>
    </section>
    <div id="loading">
        <svg>
            <use href="http://localhost/karim/school web/svg_logos/svg_icons.svg#loading"></use>
        </svg>
    </div>


    <?php
    require "./footer.php";
    ?>
    <script src="../assets/bundle.js">

    </script>
    <script src="https://kit.fontawesome.com/37f9d47857.js" crossorigin="anonymous"></script>
    <script>
        let pagename = document.getElementsByTagName('body')[0].getAttribute('pagename')
        let navbar = document.getElementsByClassName('nav-item')

        for (let j = 0; j < navbar.length; j++) {
            let navid = navbar[j].children[0].id
            if (navid == pagename) {
                document.getElementById(pagename).setAttribute('class', 'nav-link active')
            }
        }
    </script>
</body>

</html>