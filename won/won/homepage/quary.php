<?php



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="style.css">

<body>
    <style>

    </style>

    <!-- header is for navegation bar -->
    <header>
        <div>
            <div id="logo"><a href="#logo">
                    <img src="CODER FREE.png" alt="logo Here">
                    <p id="webname" style="color:#3b3732">
                        <b>FREE COURSE</b>
                    </p>
                </a>
            </div>
            <div id="nav">
                <ul class="nav_item">
                    <li class="nav"><a href="/">Home</a></li>
                    <li class="nav"><a href="/course">Course</a></li>
                    <li class="nav"><a href="/about">About</a></li>
                    <li class="nav"><a href="/contact">Contac us</a></li>
                    <li class="nav">
                        <div class="btn">
                            <a href="./karim.php"><input type="button" value="Sing up" class="login"></a>
                            <a href="/login_page.html"><input type="button" value="Sing in" class="login"></a>
                        </div>

                    </li>
                </ul>
            </div>
        </div>
    </header>
    <hr>
    <section class="main_section">

        <!-- <img src="background.jpg" alt="main Container image">  -->
        <div class="Enrol_corses">
            <h1 class="enrol_span">WANT TO LEARN LET'S GO,</h1><br>
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
            <form action="">
                <label for="name" class="comment_box_label">Name:</label>
                <input type="alphabate" name="name" id="name" placeholder="Enter your name" class="comment_form">

                <label for="name" class="comment_box_label">Gmail:</label>
                <input type="email" name="email" id="email" placeholder="Enter your Gmail" class="comment_form">

                <label for="name" class="comment_box_label">Phone No:</label>
                <input type="number" name="name" id="phone" placeholder="Enter your phone no" class="comment_form">

                <label for="comment" class="comment_box_label" id="qury">Qury:</label>
                <textarea name="comment_box" id="comment_box" cols="30" rows="10" class=""></textarea>
                <button id="form_submit_btn" value="submit">Submit</button>
            </form>
        </div>
    </div>
    <hr>

    <footer>
        <p id="footer_para">Copyright &copy; for free course.com </p>
    </footer>


</body>

</html>