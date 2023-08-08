<?php
if (isset($_GET['searcherror'])) {
        echo 'solv';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bekreta->Home</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="./pages/css/main.css">
        <link rel="stylesheet" href="./pages/css/phone.css">
</head>

<body>
        <header>
                <div class='navbar'>
                        <div class='nav_left'>
                                <img src='./_images/credentials_images/nav_logo.jpg' alt='navbar logo' id='website_logo'>
                        </div>
                        <div class='nav_mid'>
                                <ul>
                                        <li><a href='#'>Home</a></li>
                                        <li><a href='#'>About Us</a></li>
                                        <li><a href='#'>Contact Us</a></li>
                                        <label class='switch'>
                                                <input type='button' value='Light Mood' id='light_dark_btn'>
                                                <span class='hover_text'>change your favourite theme</span>
                                        </label>
                                </ul>
                                <form action='pages/local/product.php' id='search_form' method='GET' class='search_form'>
                                        <input type='text' name='search' placeholder='Search Here...' id='search_input' required>
                                        <input type='submit' class='fas' value='&#xF002;' id='search_btn'>
                                        <!-- <i class='fa-solid fa-magnifying-glass' value='submit'>dhabs</i> -->
                                </form>
                                <div class='hambarger'>
                                        <span class='hambar_line'></span>
                                        <span class='hambar_line'></span>
                                </div>
                        </div>
                        <!-- <div class='nav_right'></div> -->
                </div>
        </header>
        <marquee style="color: red;"> ***This Website Is Now Under Processing***</marquee>
        <div class="sub_menu">
                <div class="sub_menu1">
                        <a href="#" class="sub_menu_anchor" target="_self">
                                <span class="sub_menu_anchor_first_span"></span>
                                <span class="sub_menu_anchor_mid_span"></span>
                                <span class="sub_menu_anchor_last_span"></span>
                                <img class="sub_menu_images">
                        </a>


                        <a href="#" class="sub_menu_anchor" target="_self">
                                <span class="sub_menu_anchor_first_span"></span>
                                <span class="sub_menu_anchor_mid_span"></span>
                                <span class="sub_menu_anchor_last_span"></span>
                                <img class="sub_menu_images">
                        </a>
                        <a href="#" class="sub_menu_anchor" target="_self">
                                <span class="sub_menu_anchor_first_span"></span>
                                <span class="sub_menu_anchor_mid_span"></span>
                                <span class="sub_menu_anchor_last_span"></span>
                                <img class="sub_menu_images">
                        </a>
                        <a href="#" class="sub_menu_anchor" target="_self">
                                <span class="sub_menu_anchor_first_span"></span>
                                <span class="sub_menu_anchor_mid_span"></span>
                                <span class="sub_menu_anchor_last_span"></span>
                                <img class="sub_menu_images">
                        </a>
                        <a href="#" class="sub_menu_anchor" target="_self">
                                <span class="sub_menu_anchor_first_span"></span>
                                <span class="sub_menu_anchor_mid_span"></span>
                                <span class="sub_menu_anchor_last_span"></span>
                                <img class="sub_menu_images">
                        </a>

                </div>
                <div class="sub_menu2">
                        <img src="./_images/others_banner/background.jpg" class="sub_menu2_image" alt="">
                </div>

        </div>
        <div class="offer_heading">
                <h1>Latest Offer</h1>
        </div>
        <section class="slider">

                <div class="imgCont fade">
                        <img src="./_images/offers_banners/banner1.jpg" alt="">
                </div>
                <div class="imgCont fade" id="1">
                        <img src="./_images/offers_banners/banner2.jpg" alt="">
                </div>
                <div class="imgCont fade">
                        <img src="./_images/offers_banners/banner3.jpg" alt="">
                </div>
                <div class="pointer">
                        <a class="prev" id="prev">&#10094;</a>
                        <a class="next" id="next">&#10095;</a>
                </div>


        </section>

        <section style="height: 14rem;">

        </section>
        <script src="https://kit.fontawesome.com/37f9d47857.js" crossorigin="anonymous"></script>
        <script src="./_assets/bundle.js"></script>
        <script>
                function pageonline() {
                        console.log('online')
                        // window.location='./_assets/update.php?name=k'
                }
        </script>
        <script src="./pages/scripts/bundle.js"></script>
        <script src="./pages/scripts/demo.js"></script>
        <script src="./pages/scripts/index.js"></script>
        <script src="./pages/scripts/demo.js"></script>
</body>

</html>