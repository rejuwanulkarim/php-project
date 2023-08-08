<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styleing/profile.css">
    <!-- <link rel="stylesheet" href="profile_style.css"> -->
    <link rel="stylesheet" href="../styleing/footer.css">
    <link rel="stylesheet" href="../homepage/nav_bar.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,200,0,-25">

</head>

<body id="body">
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
                    <li class="nav"><a href="/homepage/karim.php">Home</a></li>
                    <li class="nav"><a href="/course">Course</a></li>
                    <li class="nav"><a href="/about">About</a></li>
                    <li class="nav"><a href="/contact">Contac us</a></li>
                </ul>
            <!-- </div> -->


                <a href="#">
                    <img src="./img_avatar.png" alt="user-profile" id="user-logo">
                </a>
            </div>
        </div>
    </header>



    <div class="show_profile">
        <h3 id="Profile_details_heading">Details</h3>
        <br>

        <p class="Details_title">Name : </p>
        <p class="Details_title">Username : </p>
        <p class="Details_title">Gmail : </p>
        <p class="Details_title">Address : </p>
        <a href="./update_prof.php">Update Profile</a>

    </div>







    <!-- user profile Options -->
    <div class="user-profile" id="user-pro">
        <h4>Profile</h4>
        <hr class="user-profile-underline">
        <ul id="profile-ul">
            <li class="profile-li"> <a href="./profile.php"> My Profile</a></li>
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
        // modal.addEventListener('blur', function() {
        //     hidebtn.style.display = 'none';
        // })
        hidemodal.addEventListener('click', function() {
            document.getElementById('user-pro').style.display = 'none'
        })

        // const a =window.prompt('Enter Your Password');
        // document.write(a);
    </script>
    <footer>
        <p id="footer_para">Copyright <?php
                                        $year = date("Y");
                                        echo $year;
                                        ?> &copy; from free course.com </p>
    </footer>
    <!-- show alert on user successfully account create and auto time out-->

</body>

</html>