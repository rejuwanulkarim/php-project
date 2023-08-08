<?php

function success_alert($unic_id)
{
    echo "
    <link rel='stylesheet' href='./login.css'>
    <div class='registretion_success'>
    <div class='success_text'>
        <div class='success_head'>Success</div>
        <div class='success_body'>Your Registretion Id is <b>$unic_id</b> wait for school confermetion, any ferther details contact School office or mail on jagjdgfaahfakhfdkj@gmail.com</div>
    </div>
</div>";
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/main.css">

    <title>Success</title>
</head>

<body pagename="readmission">



    <?php
    include "./navbar.php";
    session_start();
    $registretion = $_SESSION['registretion'];
    $unic_id = $_SESSION['unic_id'];
    if ($registretion == true || $registretion != false || $registretion != "") {
        success_alert($unic_id);
    }else{
        header('location:../index.php');
    }

    ?>



  <script src='https://kit.fontawesome.com/37f9d47857.js' crossorigin='anonymous'></script>


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
</body>

</html>