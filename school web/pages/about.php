<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/main.css">
    <link rel="stylesheet" href="../assets/about.css">
    <link rel="stylesheet" href="../assets/footer.css">
    <link rel="stylesheet" href="../assets/phone.css">
    <title>JHM->About</title>
</head>

<body class="about_body" pagename="about">
    <?php
    include "./navbar.php";
    ?>
    <h3 style="width: 100%;text-align:center;color:white; margin-top:1rem;margin-bottom:1rem;">About Us</h3>

    <div class="about_details">
        <div class="inner">
            <div class="para">Welcome to [School Name], a place where knowledge meets passion and learning comes to life. Our mission is to provide a supportive and challenging educational environment that nurtures the intellectual, social, and emotional growth of every student. Our dedicated and experienced faculty members are committed to helping students reach their full potential through innovative teaching methods, individualized attention, and a curriculum that is rigorous and relevant. Our students are encouraged to explore their interests, develop critical thinking skills, and become responsible and engaged members of the community. At [School Name], we believe in creating a supportive and inclusive community where students can thrive and succeed, both academically and personally. Come and discover the opportunities that await you here!</div>
            <img src="../_images/webImages/about/side_image.jpg" alt="" class="about_image">
        </div>
    </div>

   <?php
   require "./footer.php";
   ?>
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
    <script src="../assets/bundle.js"></script>
</body>

</html>