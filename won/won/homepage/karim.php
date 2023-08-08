<?php
// include './dbconnect.php';
$insert = false;
$servername = "localhost";
$username = "root";
$password = "";
$commentdb = "commentdb";
$con = mysqli_connect($servername, $username, $password, $commentdb);



$year = date("Y");
// echo $year;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $gmail = $_POST['email'];
    $phoneno = $_POST['phoneno'];
    $comment = $_POST['comment_box'];
    $sql = "INSERT INTO `commentform` (`name`, `gmail`, `phoneno`, `comment`,`date`) VALUES ('$name', '$gmail', '$phoneno', '$comment',CURRENT_DATE())";
    $result = mysqli_query($con, $sql);

    if ($result) {
        // $insert = true;
        echo "your comment has been sent successfully";
    } else {
        echo "connection unsuccess" . mysqli_error($con);
    }
}
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    // header('location: ../login/login.php');
    $loggedin = true;
} else {
    $loggedin = false;
}

echo '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="../styleing/footer.css">
<link rel="stylesheet" href="../styleing/profile.css">
<link rel="stylesheet" href="nav_bar.css">

<body>
    <style>

    </style>

    <!-- header is for navegation bar -->
    <header>

        <div class="header-div">


            <div id="logo" class="header-div"> 
                <a href="../homepage/karim.php">
                    <img src="../homepage/CODER FREE.png" alt="logo Here">
                </a>
                <a href="">
                    <p><b>
                       FREE COURSE
                       </b>
                    </p>
                </a>
            </div>


            <!-- <div id="nav" class="header-div"> -->
                <div class="user-profile-picture header-div" id="nav">
                <ul class="nav_item">
                    <li class="nav"><a href="../homepage/karim.php">Home</a></li>
                    <li class="nav"><a href="/course">Course</a></li>
                    <li class="nav"><a href="/about">About</a></li>
                    <li class="nav"><a href="/contact">Contac us</a></li>
                </ul>
            <!-- </div> -->            
           
  ';
if (!$loggedin) {
    echo '<a href="../login/registration.php"><input type="button" value="Sing up" class="login-btn"></a>
        <a href="../login/login.php"><input type="button" value="Sing in" class="login-btn"></a>';
} else {
    if ($loggedin && $_SESSION['loggedin'] && $_SESSION['loggedin'] == true) {
        echo ' <a href="#">
           <img src="../user-profile/img_avatar.png" alt="user-profile" id="user-logo">
       </a>';
    }
}
echo '
         </div>
            </div>
                </header>
    <hr>

    <section class="main_section">
        <div class="Enrol_corses">
            <h1 class="enrol_span">WANT TO LEARN LET\'S gO </h1>
           
            <br>
            <h1 class="enrol_span">AND ENROL NOW</h1>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Distinctio, voluptas. Amet eos quam, reiciendis
                voluptatibus quidem nisi dolor adipisci aliquam mollitia officiis ullam alias at asperiores ut nihil
                deserunt provident obcaecati. Rerum, dolorem dolore?</p>
            <button id="enrol_btn" href="#Enrole">Enrol Now</button>
        </div>
    </section>
    <hr>
    <div class="comment_sec">
        <div>


            <form action="karim.php" method="POST">
                <label for="name" class="comment_box_label">Name:</label>
                <input type="text" name="name" id="name" placeholder="Enter your name" class="comment_form">

                <label for="name" class="comment_box_label">Gmail:</label>
                <input type="email" name="email" id="email" placeholder="Enter your Gmail" class="comment_form">

                <label for="name" class="comment_box_label">Phone No:</label>
                <input type="number" name="phoneno" id="phone" placeholder="Enter your phone no" class="comment_form">

                <label for="comment" class="comment_box_label" id="qury">Qury:</label>
                <textarea name="comment_box" id="comment_box" cols="30" rows="10" class=""></textarea>
                <button id="form_submit_btn" value="submit">Submit</button>
            </form>
        </div>
    </div>
    <hr>

    <div class="user-profile" id="user-pro">
        <h4>Profile</h4>
        <hr class="user-profile-underline">
        <ul id="profile-ul">
            <li class="profile-li">My Profile</li>
            <hr class="user-profile-underline">
            <li class="profile-li">Update Profile</li>
            <hr class="user-profile-underline">

            <li class="profile-li">Forget Password</li>
            <hr class="user-profile-underline">


            <li class="profile-li"><a href="../login/logout.php">Logout</a></li>
            <hr class="user-profile-underline">
        </ul>
        <span id="hide-user-profile">&times;</span>
        <hr style="width:19px;width: 19px;margin-top: 0;margin-left: 6rem;">

    </div>

';
echo "


    <script>
        let modal = document.querySelector('#user-logo');
        let hidemodal = document.querySelector('#hide-user-profile');
        let updateprofile = document.getElementsByClassName('profile-li')[0];
        console.log(updateprofile)

        let hidebtn = document.getElementById('user-pro');
        modal.addEventListener('click', function() {
            if (hidebtn.style.display === 'block') {
                hidebtn.style.display = 'none';
            } else {
                hidebtn.style.display = 'block'
            }
        })
       
        hidemodal.addEventListener('click', function() {
            document.getElementById('user-pro').style.display = 'none'
        })

       
    </script>
    ";
    echo' 
    <footer>
        <p id="footer_para">Copyright ' . $year . '  &copy; from free course.com </p>
    </footer>


</body>

<!-- <script>
    const funcDel = () => {
        // <?php
            // $sql = "DELETE FROM `commentform` WHERE `commentform`.`sl no` =$dbslno";
            // $result = mysqli_query($con, $sql);
            // 
            ?>
       // location.reload();
    } 
</script> -->

</html>';
// }
