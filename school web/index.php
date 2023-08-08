<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Web</title>
    <link rel="stylesheet" href="./assets/main.css">


    <link rel="stylesheet" href="./assets/footer.css">
    <link rel="stylesheet" href="./assets/phone.css">
</head>

<body class="homepage_body" pagename='home'>

    <?php
    include "./pages/navbar.php";
    ?>



    <div class="section-1">
        <div class="section-1-text">
            <p id="section-1-headig">WelCome To School</p>
            <p>Cheak Your Favourite Course <a href="#all_courses"> Details</a></p>
        </div>
    </div>
    <!-- <hr> -->
    <!-- courses details section -->

    <div class="course_heading" id="all_courses">
        All courses Here
    </div>
    <div class="course_body">
        <div class="card">
            <img class="card-img" src="./_images/webImages/form-background.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Course Name</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <button class="btn card_button">Enrole Now</button>
            </div>

        </div>
        <div class="card">
            <img class="card-img" src="./_images/webImages/form-background.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Course Name</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <button class="btn card_button">Enrole Now</button>
            </div>

        </div>
        <div class="card">
            <img class="card-img" src="./_images/webImages/form-background.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Course Name</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <button class="btn card_button">Enrole Now</button>
            </div>

        </div>
        <div class="card">
            <img class="card-img" src="./_images/webImages/form-background.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Course Name</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <button class="btn card_button">Enrole Now</button>
            </div>

        </div>
        <div class="card">
            <img class="card-img" src="./_images/webImages/form-background.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Course Name</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <button class="btn card_button">Enrole Now</button>
            </div>

        </div>
        <div class="card">
            <img class="card-img" src="./_images/webImages/form-background.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Course Name</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <button class="btn card_button">Enrole Now</button>
            </div>

        </div>
    </div>
    <div class="gallery">
        <h4 class="course_heading">Visit Our Gallery</h4>
        <div class="galery-item">
            <div class="gallery-card">
                <img class="card-img" src="./_images/webImages/form-background.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">School Tour</h5>
                    <button class="btn card_button" onclick="galleryViewer(this)" path="school_tour">Visit Now</button>
                </div>

            </div>
            <div class="gallery-card">
                <img class="card-img" src="./_images/webImages/form-background.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Sports Gallery</h5>
                    <button class="btn card_button" onclick="galleryViewer(this)" path="sports">Visit Now</button>
                </div>

            </div>
            <div class="gallery-card">
                <img class="card-img" src="./_images/webImages/form-background.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">School Staff</h5>
                    <button class="btn card_button" cardName="" onclick="galleryViewer(this)" path="staffs">Visit Now</button>
                </div>

            </div>

        </div>
    </div>

    <div class="gallery-viewer">
        <div class="viewer-image">

        </div>
        <button class="previous-btn image-action-btn" onclick="plusSlides(-1)">&lt;</button>
        <button class="next-btn image-action-btn" onclick="plusSlides(1)">&gt;</button>
        <button class="gallery-closer" onclick="galleryCloser()">&times;</button>
    </div>

    <script>
    </script>




    <?php
    require "./pages/footer.php";
    ?>





    <script>
        // let sidemanu = document.getElementById('sidemanu');

        // // function manubar() {
        // //     let hambarger_font = document.getElementsByClassName('hambarger_font');

        // //     console.log('work')
        // //     if (sidemanu.style.display == 'block') {
        // //         sidemanu.style.display = 'none'
        // //         hambarger_font[0].removeAttribute('id')
        // //         hambarger_font[1].removeAttribute('id')
        // //         hambarger_font[2].removeAttribute('id')
        // //     } else {
        // //         sidemanu.style.display = 'block'
        // //         hambarger_font[0].setAttribute('id', 'rotate1');
        // //         hambarger_font[2].setAttribute('id', 'rotate2');
        // //         hambarger_font[1].setAttribute('id', 'none');
        // //         // hambarger_font[1].style.display='none';

        // //     }

        // // }


        let pagename = document.getElementsByTagName('body')[0].getAttribute('pagename')
        let navbar = document.getElementsByClassName('nav-item')

        for (let j = 0; j < navbar.length; j++) {
            let navid = navbar[j].children[0].id
            if (navid == pagename) {
                document.getElementById(pagename).setAttribute('class', 'nav-link active')
            }
        }
    </script>
    <script src="./assets/bundle.js"></script>
</body>

</html>