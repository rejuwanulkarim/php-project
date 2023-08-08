<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/profile.css">
    <link rel="stylesheet" href="../assets/universal.css">
    <link rel="stylesheet" href="../assets/phone.css">
    <title>Student->Profile</title>
</head>

<body>
  





<div class="profile_nav">
        <div class="nav_logo">JHM</div>
        <div class="profile_image">
            <div onclick="profileviewer()" class="profile_button  _flex flex_row flex_justify_C flex_align_c b_white p_5 pointer radius_20">
                <img src="../_images/students_photograph/JHM231906030340256-photograph.jpg" alt="" class="profile_photo">
                <div class="svg_icon">
                    <svg class="profile_svg_icon">
                        <use href="../svg_logos/svg_icons.svg#angle_down" class="profile_angle"></use>
                    </svg>
                </div>

            </div>

        </div>
    </div>


    <div class="profile_sub_nav">
        <ul class="profile_bar">
            <li>
                <svg class="profile_side_bar_svg" style="--profile_svg_color:white;">
                    <use href="../svg_logos/svg_icons.svg#profile"></use>
                </svg>
                <a href="#">Profile</a>
                <svg class="profile_side_bar_svg" style="--profile_svg_color:white;">
                    <use href="../svg_logos/svg_icons.svg#angle_right   "></use>
                </svg>
            </li>

            <li>
                <svg class="profile_side_bar_svg" style="--profile_svg_color:white;">
                    <use href="../svg_logos/svg_icons.svg#pen"></use>
                </svg>
                <a href="#">Readmision</a>
                <svg class="profile_side_bar_svg" style="--profile_svg_color:white;">
                    <use href="../svg_logos/svg_icons.svg#angle_right"></use>
                </svg>
            </li>

            <li>
                <svg class="profile_side_bar_svg" style="--profile_svg_color:white;">
                    <use href="../svg_logos/svg_icons.svg#certificate"></use>
                </svg>
                <a href="#" onclick='window.open("certificate.php","","width=1000,height=1000")'>Get Cirtificate</a>
                <svg class="profile_side_bar_svg" style="--profile_svg_color:white;">
                    <use href="../svg_logos/svg_icons.svg#angle_right"></use>
                </svg>
            </li>
            <li>
                <svg class="profile_side_bar_svg" style="--profile_svg_color:white;">
                    <use href="../svg_logos/svg_icons.svg#question_mark"></use>
                </svg>
                <a href="#">Help</a>
                <svg class="profile_side_bar_svg" style="--profile_svg_color:white;">
                    <use href="../svg_logos/svg_icons.svg#angle_right"></use>
                </svg>
            </li>


            <li>
                <svg class="profile_side_bar_svg" style="--profile_svg_color:red;">
                    <use href="../svg_logos/svg_icons.svg#power"></use>
                </svg>
                <a href="../admin/pages/logout.php">Logout</a>
                <svg class="profile_side_bar_svg" style="--profile_svg_color:white;">
                    <use href="../svg_logos/svg_icons.svg#angle_right"></use>
                </svg>
            </li>


        </ul>
    </div>






    <!-- body section start -->


    <section class="profile_section">
        <!-- <marquee class="profile_marquee" direction="left">**Readmission Only Available Only Jan-Feb**</marquee> -->


        <div class="profile_card">
            <!-- <a href="?hello" class="profile_edit">
                <svg class="">
                    <use href="../svg_logos/svg_icons.svg#profile_edit"></use>
                </svg>
            </a> -->

            <h2>Identity Card</h2>
            <h2 class="school_name">JAGANNATHPUR HIGH MADRASA(H.S)</h2>
            <img src="../classes/weblogo.jpg" alt="School Logo" class="profile_school_logo">
            <div class="_flex flex_row h_full mb_2 pb_1-5">
                <div class="card_left">
                    <div class="_flex flex_col details flex_justify_s_a">
                        <div class="_flex flex_row">
                            <label for="ID">ID: </label>
                            <input type="text" name="id" id="ID" class="profile_input" value="JHM202212456789">
                        </div>
                        <div class="_flex flex_row ">
                            <label for="Name">Name: </label>
                            <input type="text" name="name" id="name" class="profile_input" value="Md Rejuwanul Karim">
                        </div>
                        <div class="_flex flex_row">
                            <div class="_flex flex_row ">
                                <label for="Class">Class: </label>
                                <input type="text" name="class" id="class" class="profile_input" value="VIII">
                            </div>
                            <div class="_flex flex_row ">
                                <label for="Roll">Roll: </label>
                                <input type="text" name="roll" id="roll" class="profile_input" value="01">
                            </div>

                        </div>

                        <div class="_flex flex_row ">
                            <label for="Gurdian Name">Gurdian Name: </label>
                            <input type="text" name="Gurdian_name" id="Gurdian_name" class="profile_input" value="Md Khairul Islam">
                        </div>
                        <div class="_flex flex_row ">
                            <label for="Phone No">Phone No: </label>
                            <input type="text" name="Phone_no" id="Phone_no" class="profile_input" value="7478919026">
                        </div>
                        <div class="_flex flex_row ">
                            <label for="Email">Email: </label>
                            <input type="text" name="email" id="email" class="profile_input" value="rejuwanulkarim@gmail.com">
                        </div>

                        <div class="_flex flex_row">

                            <label for="Village">Village: </label>
                            <input type="text" name="village" id="village" class="profile_input" value="Jagannathpur">
                        </div>

                        <div class="_flex flex_row">
                            <label for="Post Office">Post Office: </label>
                            <input type="text" name="post_office" id="post_office" class="profile_input" value="Jagannathpur">
                        </div>
                        <div class="_flex flex_row">
                            <label for="Pin">Pin: </label>
                            <input type="text" name="pin" id="pin" class="profile_input" value="732125" disabled>
                        </div>


                    </div>
                </div>
                <div class="card_right">
                    <img src="../_images/students_photograph/profile2.png" alt="Profile Photo" class="card_profile_photo">
                    <div class="barcode">
                        <?php

                        use Picqer\Barcode\Barcode;
                        use Picqer\Barcode\BarcodeGenerator;

                        include "../librarys/vendor/autoload.php";
                        $bargen = new  Picqer\Barcode\BarcodeGeneratorHTML();
                        echo $bargen->getBarCode('JHM230513021203', $bargen::TYPE_CODE_128, 1, 20);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <div class="certificate">

    </div> -->


    <script src="../assets/bundle.js"></script>
</body>

</html>
