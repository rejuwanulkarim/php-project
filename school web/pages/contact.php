<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/main.css">
    <link rel="stylesheet" href="../assets/contact.css">
    <link rel="stylesheet" href="../assets/footer.css">
    <link rel="stylesheet" href="../assets/phone.css">
    <title>JHM->Contact</title>
</head>

<body pagename="contact">
    <?php
    include "./navbar.php";
    include "../dbconnect.php";


    ?>

    <section class="contact_main_sec">
        <h4 class="contact_main_heading">Contact Us</h4>
        <div class="contact_body">
            <div class="contact_quote">
                If you have any Question , Please feel free to ask in Bhabta Azizia High Madrasah results section Website and Also you can ask on Virtual World contacts Section for any technical error . You may also call us mail us for any Problem . We will try to reach you as soon as possible :)
            </div>
            <div class="contact_clicker">
                <div class="contact_clicker_div">
                    <div class="contact_icons" style="--svg_color:white;--svg_bg_color:green;">
                        <svg class="contact_svg_icone">
                            <use href="../svg_logos/svg_icons.svg#phone"></use>
                        </svg>
                    </div>
                    <div class="contact_details">
                        <h5 class="headingOfContact">Phone</h5>
                        <a href="tel:0123456789" class="_details"> <?php
                                                                    $sql = "SELECT * FROM `contact_info` WHERE  `contacttype`='Phone'";
                                                                    $result = mysqli_query($connection, $sql);
                                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                                        $phone = $row['contactinfo'];
                                                                        echo $phone;
                                                                    }
                                                                    ?></a>

                    </div>

                </div>
                <div class="contact_clicker_div">
                    <div class="contact_icons" style="--svg_color:white;--svg_bg_color:#0A81CF;">
                        <svg class="contact_svg_icone">
                            <use href="../svg_logos/svg_icons.svg#email"></use>
                        </svg>
                    </div>
                    <div class="contact_details">
                        <h5 class="headingOfContact">Email</h5>
                        <?php
                        $sql = "SELECT * FROM `contact_info` WHERE  `contacttype`='Email'";
                        $result = mysqli_query($connection, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $email = $row['contactinfo'];
                            echo "<a href='mailto:$email' class='_details'>$email</a>";
                        }
                        ?>


                    </div>

                </div>
                <div class="contact_clicker_div">
                    <div class="contact_icons" style="--svg_color:white;--svg_bg_color:green;">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="contact_svg_icone">
                            <use href="../svg_logos/svg_icons.svg#whatsapp"></use>
                        </svg>
                    </div>
                    <div class="contact_details">
                        <h5 class="headingOfContact">What's App</h5>
                        <?php
                        $sql = "SELECT * FROM `contact_info` WHERE  `contacttype`='Phone'";
                        $result = mysqli_query($connection, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $phone = $row['contactinfo'];
                            echo " <a href='https://wa.me/$phone' target='_blank' class='_details'>+91 $phone</a>";
                        }
                        ?>
                       

                    </div>

                </div>
            </div>
        </div>
    </section>



    <!-- clip-path:polygon(10% 0px, 100% 0%, 100% 100%, 0px 100%) -->





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
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->

</body>

</html>