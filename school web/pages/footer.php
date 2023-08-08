<!-- <link rel="stylesheet" href="./footer.css"> -->

<footer class="footer_section">
    <div class="left">
        <img src="http://localhost/karim/school%20web/admin/classes/images/nav-logo.jpg" class="footer_logo">
        <div class="site_name">WWW.EXAMPLE.COM</div>
        <div class="social_accounts">
            <a href="#" class="icone_outer" style="--svg_color:red;--svg_bg_color:white;">
                <svg class="socialmedia_icons">
                    <use href="../svg_logos/svg_icons.svg#youtube">
                </svg>
            </a>
            <a href="#" class="icone_outer" style="--svg_color:blue;--svg_bg_color:white;">
                <svg class="socialmedia_icons">
                    <use href="../svg_logos/svg_icons.svg#facebook">
                </svg>
            </a>
            <a href="#" class="icone_outer"  style="--svg_color:#BB308D;--svg_bg_color:white;">
                <svg class="socialmedia_icons">
                    <use href="../svg_logos/svg_icons.svg#insta">
                </svg>
            </a>
            <a href="#" class="icone_outer" style="--svg_color:green;--svg_bg_color:white;">
                <svg class="socialmedia_icons">
                    <use href="../svg_logos/svg_icons.svg#whatsapp">
                </svg>

            </a>


        </div>
    </div>
    <div class="mid">
        <h5 style="border-bottom:2px solid white;color:white;margin-bottom: 0.5rem;">Quick Contact</h5>
        <form action="" class="quick_contact">
            <div class="name flex_row_around"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="quick_contact_form_icones">
                    <path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0S96 57.3 96 128s57.3 128 128 128zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                </svg>

                <input type="text" name="footer_name" class="footer_input" maxlength="30" placeholder="Enter Full Name" required>
            </div>
            <div class="name flex_row_around">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="quick_contact_form_icones">
                    <path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z" />
                </svg>

                <input type="text" name="footer_phoneno" class="footer_input" placeholder="Enter Phone No" maxlength="14" required>
            </div>
            <div class="name flex_row_around">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="quick_contact_form_icones">
                    <path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z" />
                </svg>
                <input type="text" name="footer_email" class="footer_input" placeholder="Enter Email" maxlength="50" required>
            </div>
            <input type="submit" value="Submit" class="footer_submit">

        </form>
    </div>
    <div class="mid2">
        <div class="map_heading">Our Location On Map</div>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14426.612023326916!2d87.86976517964013!3d25.315859791456248!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fac05f5f16695b%3A0x621e7ab46ca51c6!2sJagannathpur%2C%20West%20Bengal%20732125!5e0!3m2!1sen!2sin!4v1675260444248!5m2!1sen!2sin" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="footer_map"></iframe>
        </div>
    </div>
    <div class="right">
        <h4 class="about_heading">About Us</h4>
        <div class="aboout"> is a learning community where knowledge meets passion. Our dedicated faculty supports students' intellectual and personal growth through innovative teaching and a rigorous, relevant curriculum</div>
        <div class="copywrite">
            <div class="copywrite_para">Example.com&copy;<?= date("Y") ?></div>
            <a href="#" class="privacy">PRIVACY</a>
        </div>
    </div>
</footer>