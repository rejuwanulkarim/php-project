<?php


echo "
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
</div>
</header>
"





?>
<link rel="stylesheet" href="">